// tools/refetch-one.mjs
// Re-fetch a single image by slug with a new Pexels query, convert to WebP, overwrite.
//
// Usage: node tools/refetch-one.mjs <slug> "<query>" [orient]
// Example: node tools/refetch-one.mjs home-lead-trophee "yacht race fleet open sea" landscape

import fs from 'node:fs';
import https from 'node:https';
import path from 'node:path';
import sharp from 'sharp';

const [slug, query, orientArg, pickArg] = process.argv.slice(2);
if (!slug || !query) {
	console.error('Usage: node tools/refetch-one.mjs <slug> "<query>" [orient=landscape|portrait] [pick=1..3]');
	process.exit(1);
}
const orient = orientArg || 'landscape';
const pickIndex = Math.max(1, Math.min(3, parseInt(pickArg || '1', 10))) - 1;

const env = Object.fromEntries(
	fs.readFileSync('.env', 'utf8').split('\n')
		.filter(l => l.includes('='))
		.map(l => { const [k, ...v] = l.split('='); return [k.trim(), v.join('=').trim()]; })
);
const API_KEY = env.PEXELS_API_KEY;

const OUT_DIRS = ['wp-theme-child/assets/img', 'local-preview/img'];

function get(url, headers = {}) {
	return new Promise((resolve, reject) => {
		https.get(url, { headers }, (res) => {
			if (res.statusCode >= 300 && res.statusCode < 400 && res.headers.location) {
				return get(res.headers.location, headers).then(resolve).catch(reject);
			}
			const chunks = [];
			res.on('data', c => chunks.push(c));
			res.on('end', () => resolve({ status: res.statusCode, body: Buffer.concat(chunks), headers: res.headers }));
			res.on('error', reject);
		}).on('error', reject);
	});
}

const url = `https://api.pexels.com/v1/search?query=${encodeURIComponent(query)}&per_page=3&orientation=${orient}`;
const { body, status } = await get(url, { Authorization: API_KEY });
if (status !== 200) {
	console.error(`Pexels search failed ${status}`);
	process.exit(1);
}
const photos = JSON.parse(body.toString()).photos || [];
console.log(`Found ${photos.length} candidates for "${query}":`);
photos.forEach((p, i) => console.log(`  [${i + 1}] ${p.photographer} - ${p.alt || '(no alt)'} - ${p.url}`));
if (photos.length === 0) {
	console.error('No results, aborting.');
	process.exit(1);
}

// Take the chosen index (default #1)
const photo = photos[pickIndex] || photos[0];
// Use large2x (~1880px) for hero shots ; large (~940px) was too soft when stretched full-width.
const srcUrl = photo.src.large2x || photo.src.original || photo.src.large || photo.src.medium;
console.log(`\nUsing #${pickIndex + 1}: ${photo.photographer} (${photo.url})`);

const { body: imgBuf } = await get(srcUrl);
// Resize to max 1800px width (sharp keeps aspect ratio), convert to webp q=82 effort=6.
const webpBuf = await sharp(imgBuf)
	.resize({ width: 1800, withoutEnlargement: true })
	.webp({ quality: 82, effort: 6 })
	.toBuffer();

for (const d of OUT_DIRS) {
	const dst = path.join(d, slug + '.webp');
	fs.writeFileSync(dst, webpBuf);
	console.log(`  ✓ wrote ${dst} (${(webpBuf.length / 1024).toFixed(0)} KB)`);

	// Update credits.json
	const creditsPath = path.join(d, 'credits.json');
	if (fs.existsSync(creditsPath)) {
		const credits = JSON.parse(fs.readFileSync(creditsPath, 'utf8'));
		credits[slug] = {
			file: slug + '.webp',
			alt: photo.alt || query,
			photographer: photo.photographer,
			photographer_url: photo.photographer_url,
			pexels_url: photo.url,
			query: query,
		};
		fs.writeFileSync(creditsPath, JSON.stringify(credits, null, 2));
	}
}

console.log('\nDone. Refresh the local-preview HTML in your browser.');
