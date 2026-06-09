// tools/optimize-images.mjs
// Convert every .jpg in wp-theme-child/assets/img/ and local-preview/img/ to .webp
// (quality 80), mirror the result in both dirs, then delete the .jpg sources.
//
// Usage: node tools/optimize-images.mjs

import fs from 'node:fs';
import path from 'node:path';
import sharp from 'sharp';

const DIRS = [
	'wp-theme-child/assets/img',
	'local-preview/img',
];

async function convertDir(dir) {
	const files = fs.readdirSync(dir).filter(f => /\.(jpg|jpeg|png)$/i.test(f));
	let totalSrc = 0, totalDst = 0;
	for (const f of files) {
		const src = path.join(dir, f);
		const dst = path.join(dir, path.parse(f).name + '.webp');
		const srcSize = fs.statSync(src).size;
		await sharp(src)
			.webp({ quality: 88, effort: 6 })
			.toFile(dst);
		const dstSize = fs.statSync(dst).size;
		totalSrc += srcSize;
		totalDst += dstSize;
		const ratio = ((1 - dstSize / srcSize) * 100).toFixed(0);
		console.log(`  ${f} ${(srcSize / 1024).toFixed(0)} KB → ${(dstSize / 1024).toFixed(0)} KB webp (-${ratio}%)`);
		fs.unlinkSync(src); // remove .jpg after successful conversion
	}
	console.log(`\n  Total ${dir}: ${(totalSrc / 1024).toFixed(0)} KB → ${(totalDst / 1024).toFixed(0)} KB (-${((1 - totalDst / totalSrc) * 100).toFixed(0)}%)`);
}

for (const d of DIRS) {
	console.log(`\n=== ${d} ===`);
	await convertDir(d);
}
console.log('\nDone. All images now in .webp.');
