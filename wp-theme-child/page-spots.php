<?php
/**
 * Template Name: Spots de voile Normandie
 *
 * Assigner ce template à la page WP de slug `spots-de-voile-normandie`.
 * Stub V1 : grille de SpotCard. À enrichir par Wisewand avec un article par spot.
 *
 * @package Norlandascup
 */
get_header();
?>

<header class="wrap page-head">
	<span class="kicker"><?php esc_html_e( 'Magazine · Spots', 'norlandascup' ); ?></span>
	<h1><?php esc_html_e( 'Spots de voile en Normandie côtière', 'norlandascup' ); ?></h1>
	<p class="sub"><?php esc_html_e( 'Ports, mouillages et plans d\'eau ouverts à la voile sportive et de croisière. De Granville à Honfleur, en passant par le Cotentin et la Côte de Nacre.', 'norlandascup' ); ?></p>
</header>

<section class="editorial">
	<div class="wrap">
		<div class="mag-grid">
			<?php
			$spots = array(
				array( 'img' => 'mag-card-cherbourg.webp',       'name' => 'Cherbourg en Cotentin', 'tag' => 'Grande rade',    'desc' => __( 'Plus grande rade artificielle de France. Plan d\'eau dégagé, conditions parfois soutenues par vent d\'ouest. Spot de référence pour la régate offshore et la course au large.', 'norlandascup' ) ),
				array( 'img' => 'eq-galerie-baie-seine.webp',    'name' => 'Saint Vaast la Hougue', 'tag' => 'Bassin à flot',  'desc' => __( 'Port pittoresque du Val de Saire, accès au large via le Raz de Barfleur. Spot apprécié pour la navigation côtière et les départs de régate IRC.', 'norlandascup' ) ),
				array( 'img' => 'mag-card-portenbessin.webp',    'name' => 'Port en Bessin',        'tag' => 'Criée',          'desc' => __( 'Port de pêche actif, accès commercial à la baie de Seine. Mouillage de transit pour les bateaux remontant vers Ouistreham ou Caen.', 'norlandascup' ) ),
				array( 'img' => 'mag-card-ouistreham.webp',      'name' => 'Ouistreham',            'tag' => 'Écluse',         'desc' => __( 'Entrée du canal de Caen, écluse à programmer en fonction des marées. Spot d\'arrivée des grandes régates régionales et port de plaisance dynamique.', 'norlandascup' ) ),
				array( 'img' => 'eq-galerie-baie-seine.webp',    'name' => 'Courseulles sur Mer',   'tag' => 'Port plaisance', 'desc' => __( 'Petit port plaisance bien équipé, cœur de la Côte de Nacre. Spot accessible aux croiseurs côtiers et école de voile active.', 'norlandascup' ) ),
				array( 'img' => 'home-card-deauville.webp',      'name' => 'Deauville',             'tag' => 'Marina',         'desc' => __( 'Port plaisance haut de gamme, ouverture sur la baie de Seine. Spot d\'ouverture de saison et événements grand public.', 'norlandascup' ) ),
				array( 'img' => 'home-card-honfleur.webp',       'name' => 'Trouville Honfleur',    'tag' => 'Estuaire',       'desc' => __( 'Embouchure de la Seine, navigation tactique nécessitant une lecture fine des marées et du jusant. Spot de fin de course pour les rallyes côtiers.', 'norlandascup' ) ),
				array( 'img' => 'mag-card-maree.webp',           'name' => 'Granville',             'tag' => 'Marées',         'desc' => __( 'Plus fort marnage d\'Europe, conditions de navigation exigeantes. Spot avancé pour les régatiers expérimentés et la pratique de course à la marée.', 'norlandascup' ) ),
				array( 'img' => 'eq-galerie-retour-ponton.webp', 'name' => 'Caen Ouistreham',       'tag' => 'Bassin',         'desc' => __( 'Bassin Saint Pierre au cœur de Caen, prolongement du canal vers la mer. Spot historique de la Norlanda\'s Cup, accès au plan d\'eau de course par l\'écluse.', 'norlandascup' ) ),
			);
			foreach ( $spots as $s ) : ?>
				<article class="acard" style="display:block">
					<div class="ph r45" style="background-image:url(<?php echo esc_url( NORLANDASCUP_URI . '/assets/img/' . $s['img'] ); ?>);background-size:cover;background-position:center" data-ph="<?php echo esc_attr( sprintf( __( 'Port de %s, ratio 4:5', 'norlandascup' ), $s['name'] ) ); ?>"></div>
					<span class="ac-tag"><?php echo esc_html( $s['tag'] ); ?></span>
					<h3><?php echo esc_html( $s['name'] ); ?></h3>
					<p><?php echo esc_html( $s['desc'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
		<p style="margin-top:32px;text-align:center">
			<a class="btn btn-dark" href="<?php echo esc_url( home_url( '/magazine/?rubrique=spots' ) ); ?>">
				<?php esc_html_e( 'Lire tous les articles spots du magazine', 'norlandascup' ); ?><span class="arr">→</span>
			</a>
		</p>
	</div>
</section>

<?php get_footer();
