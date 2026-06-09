// tools/build-local-preview.mjs
// Generate 4 HTML files in local-preview/ from the Claude Design proto, replacing the
// .ph data-ph placeholders with real <img> via inline background-image. Use as a quick
// "Option A" visual test without installing WordPress.
//
// Usage: node tools/build-local-preview.mjs

import fs from 'node:fs';
import path from 'node:path';

const MAPPING = {
	// Home
	'Photo régate gros temps, Côte de Nacre, ratio 16:9':            'home-hero',
	'Voilier au près serré sous spi, embruns, ratio 3:2':            'home-lead-trophee',
	'Cabestan et winch, gros plan cordage, 4:5':                      'home-card-winch',
	'Port de Honfleur à marée basse, 4:5':                            'home-card-honfleur',
	'Portrait skipper mains gantées à la barre, 4:5':                 'home-card-skipper',
	'Ciel de grain au large d\'Étretat, 4:5':                         'home-card-etretat',
	'Voilerie, coupe de grand voile à plat, 4:5':                     'home-card-voilerie',
	'Pontons de Deauville, mâts alignés au petit matin, 4:5':         'home-card-deauville',
	// Magazine
	'Départ du Trophée Manche à Saint Vaast la Hougue, 16:9':         'mag-feature-trophee',
	'Convoyage au portant, flotte de croiseurs, 4:5':                 'mag-card-tour-belle-ile',
	'Port en Bessin, criée et bassin à flot, 4:5':                    'mag-card-portenbessin',
	'Grande rade de Cherbourg vue du large, 4:5':                     'mag-card-cherbourg',
	'Génois en cours de réglage au près, 4:5':                        'mag-card-genois',
	'Compas de pont, gros plan instrument, 4:5':                      'mag-card-compas',
	'Ciel d\'ouest sur la Côte de Nacre, 4:5':                        'mag-card-ciel-ouest',
	'Courant de marée sur un caillou balisé, 4:5':                    'mag-card-maree',
	'Portrait barreur à la godille, 4:5':                             'mag-card-portrait-barreur',
	'Équipière au rappel sous le vent, 4:5':                          'mag-card-equipiere',
	'Tableau officiel de course au club, 4:5':                        'mag-card-tableau-course',
	'Écluse de Ouistreham, sas ouvert, 4:5':                          'mag-card-ouistreham',
	// Archive
	'Pontons, flotte d\'équipages au départ, 16:9':                   'archive-next-equipages',
	'Instructions de course, marques du parcours, 16:9':              'archive-next-format',
	// Équipage galerie
	'Cane 2 au portant, sortie de la baie de Seine, 4:5':             'eq-galerie-baie-seine',
	'Empannage sous spi devant Ouistreham, 4:5':                      'eq-galerie-empannage',
	'Équipage au rappel par mer formée, 4:5':                         'eq-galerie-rappel',
	'Retour au ponton de Caen Ouistreham, 4:5':                       'eq-galerie-retour-ponton',
};

const SRC_DIR = 'design-bundles/norlandascup-v2/project';
const DST_DIR = 'local-preview';
const FILES = ['Norlandas Cup Home.html', 'Le Magazine.html', 'La Norlandas Cup.html', 'Equipage Cane Normandie.html'];

function escapeRegExp(s) {
	return s.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
}

let totalSubs = 0;
let missed = new Set();

for (const f of FILES) {
	const srcPath = path.join(SRC_DIR, f);
	let html = fs.readFileSync(srcPath, 'utf8');

	// Replace each known data-ph by inline background-image (with cover + center) and empty data-ph
	for (const [dataPh, slug] of Object.entries(MAPPING)) {
		const re = new RegExp(`data-ph="${escapeRegExp(dataPh)}"`, 'g');
		const before = html;
		html = html.replace(
			re,
			`style="background-image:url(img/${slug}.webp);background-size:cover;background-position:center" data-ph=""`
		);
		if (html !== before) totalSubs++;
	}

	// Detect remaining data-ph that were not in our mapping (so we can extend MAPPING)
	const remaining = [...html.matchAll(/data-ph="([^"]+)"/g)].map(m => m[1]).filter(v => v !== '');
	remaining.forEach(r => missed.add(r));

	fs.writeFileSync(path.join(DST_DIR, f), html);
	console.log(`✓ ${f}`);
}

console.log(`\n${totalSubs} placeholders replaced across 4 files.`);
if (missed.size > 0) {
	console.log(`\n⚠ ${missed.size} data-ph still need a mapping:`);
	missed.forEach(m => console.log(`  - "${m}"`));
} else {
	console.log('\nAll data-ph mapped. Open local-preview/*.html in a browser.');
}
