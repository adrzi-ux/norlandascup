// tools/fetch-pexels.mjs
// Fetch ~30 Pexels images for norlandascup theme (sailing, ports normands, equipment, skippers).
// Outputs to wp-theme-child/assets/img/ + local-preview/img/ (mirror for HTML preview).
// Generates credits.json with photographer attribution (Pexels TOS requirement).
//
// Usage: node tools/fetch-pexels.mjs

import fs from 'node:fs';
import https from 'node:https';
import path from 'node:path';

const env = Object.fromEntries(
	fs.readFileSync('.env', 'utf8').split('\n')
		.filter(l => l.includes('='))
		.map(l => { const [k, ...v] = l.split('='); return [k.trim(), v.join('=').trim()]; })
);
const API_KEY = env.PEXELS_API_KEY;
if (!API_KEY) {
	console.error('Missing PEXELS_API_KEY in .env');
	process.exit(1);
}

// Output directories (mirror : 1 dans le theme WP, 1 dans local-preview pour tests HTML)
const OUT_DIRS = [
	'wp-theme-child/assets/img',
	'local-preview/img',
];
OUT_DIRS.forEach(d => fs.mkdirSync(d, { recursive: true }));

// Mapping: slug = filename (no extension), query = Pexels search, orient = landscape or portrait.
// orient=portrait sert pour les ratios 4:5, landscape pour 16:9 et 3:2.
const IMAGES = [
	// Home
	{ slug: 'home-hero',                 query: 'sailing yacht race rough sea',           orient: 'landscape' },
	{ slug: 'home-lead-trophee',         query: 'sailboat upwind spinnaker waves',         orient: 'landscape' },
	{ slug: 'home-card-winch',           query: 'sailboat winch deck close up',            orient: 'portrait'  },
	{ slug: 'home-card-honfleur',        query: 'honfleur harbor boats',                   orient: 'portrait'  },
	{ slug: 'home-card-skipper',         query: 'sailor hands helm wheel',                 orient: 'portrait'  },
	{ slug: 'home-card-etretat',         query: 'etretat cliffs sea',                      orient: 'portrait'  },
	{ slug: 'home-card-voilerie',        query: 'sailmaker sail loft',                     orient: 'portrait'  },
	{ slug: 'home-card-deauville',       query: 'deauville marina morning',                orient: 'portrait'  },

	// Magazine page (feature + 11 cards)
	{ slug: 'mag-feature-trophee',       query: 'sailing regatta start line',              orient: 'landscape' },
	{ slug: 'mag-card-tour-belle-ile',   query: 'sailboat fleet downwind',                 orient: 'portrait'  },
	{ slug: 'mag-card-portenbessin',     query: 'port en bessin fishing harbor',           orient: 'portrait'  },
	{ slug: 'mag-card-cherbourg',        query: 'cherbourg harbor view',                   orient: 'portrait'  },
	{ slug: 'mag-card-genois',           query: 'sailboat genoa headsail',                 orient: 'portrait'  },
	{ slug: 'mag-card-compas',           query: 'nautical compass marine',                 orient: 'portrait'  },
	{ slug: 'mag-card-ciel-ouest',       query: 'normandy coast sky clouds',               orient: 'portrait'  },
	{ slug: 'mag-card-maree',            query: 'tidal current rocks sea',                 orient: 'portrait'  },
	{ slug: 'mag-card-portrait-barreur', query: 'sailor portrait helmsman boat',           orient: 'portrait'  },
	{ slug: 'mag-card-equipiere',        query: 'female sailor crew hiking',               orient: 'portrait'  },
	{ slug: 'mag-card-tableau-course',   query: 'yacht club notice board sailing',         orient: 'portrait'  },
	{ slug: 'mag-card-ouistreham',       query: 'canal lock boat',                         orient: 'portrait'  },

	// Archive Norlanda's Cup page (next-grid)
	{ slug: 'archive-next-equipages',    query: 'sailboat fleet harbor start',             orient: 'landscape' },
	{ slug: 'archive-next-format',       query: 'sailing race course chart',               orient: 'landscape' },

	// Équipage Cane Normandie page (galerie 4 photos)
	{ slug: 'eq-galerie-baie-seine',     query: 'sailboat downwind spinnaker',             orient: 'portrait'  },
	{ slug: 'eq-galerie-empannage',      query: 'sailboat gybe maneuver',                  orient: 'portrait'  },
	{ slug: 'eq-galerie-rappel',         query: 'sailing crew hiking out waves',           orient: 'portrait'  },
	{ slug: 'eq-galerie-retour-ponton',  query: 'sailboat docking marina',                 orient: 'portrait'  },
];

function get(url, headers = {}) {
	return new Promise((resolve, reject) => {
		https.get(url, { headers }, (res) => {
			if (res.statusCode >= 300 && res.statusCode < 400 && res.headers.location) {
				return get(res.headers.location, headers).then(resolve).catch(reject);
			}
			const chunks = [];
			res.on('data', c => chunks.push(c));
			res.on('end', () => resolve({ status: res.statusCode, body: Buffer.concat(chunks) }));
			res.on('error', reject);
		}).on('error', reject);
	});
}

async function pexelsSearch(query, orientation) {
	const url = `https://api.pexels.com/v1/search?query=${encodeURIComponent(query)}&per_page=3&orientation=${orientation}`;
	const { body, status } = await get(url, { Authorization: API_KEY });
	if (status !== 200) {
		throw new Error(`Pexels search failed ${status} for "${query}"`);
	}
	const json = JSON.parse(body.toString());
	return json.photos?.[0] || null;
}

async function download(srcUrl, destPath) {
	const { body, status } = await get(srcUrl);
	if (status !== 200) throw new Error(`Download failed ${status}: ${srcUrl}`);
	fs.writeFileSync(destPath, body);
}

async function main() {
	console.log(`Fetching ${IMAGES.length} images from Pexels...`);
	const credits = {};
	let count = 0;
	for (const item of IMAGES) {
		try {
			const photo = await pexelsSearch(item.query, item.orient);
			if (!photo) {
				console.warn(`  ✗ ${item.slug}: no result for "${item.query}"`);
				continue;
			}
			// Use the 'large' (preferred) or 'medium' variant for web (smaller files)
			const srcUrl = photo.src.large || photo.src.medium || photo.src.original;
			const ext = '.jpg';
			const filename = item.slug + ext;
			// Download once, write to both output dirs
			const primary = path.join(OUT_DIRS[0], filename);
			await download(srcUrl, primary);
			fs.copyFileSync(primary, path.join(OUT_DIRS[1], filename));
			credits[item.slug] = {
				file: filename,
				alt: photo.alt || item.query,
				photographer: photo.photographer,
				photographer_url: photo.photographer_url,
				pexels_url: photo.url,
				query: item.query,
			};
			count++;
			console.log(`  ✓ ${item.slug} ← ${photo.photographer} (${photo.url})`);
			await new Promise(r => setTimeout(r, 250)); // gentle pacing
		} catch (err) {
			console.error(`  ✗ ${item.slug}: ${err.message}`);
		}
	}
	// Write credits.json to both dirs
	const creditsJson = JSON.stringify(credits, null, 2);
	for (const d of OUT_DIRS) {
		fs.writeFileSync(path.join(d, 'credits.json'), creditsJson);
	}
	console.log(`\nDone. ${count}/${IMAGES.length} images saved.`);
	console.log(`Output: ${OUT_DIRS.join(' + ')}`);
	console.log(`Credits: assets/img/credits.json (Pexels TOS requires visible attribution)`);
}

main().catch(e => { console.error(e); process.exit(1); });
