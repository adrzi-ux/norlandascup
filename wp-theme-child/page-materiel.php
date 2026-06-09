<?php
/**
 * Template Name: Matériel voile (hub)
 *
 * Assigner ce template à la page WP de slug `materiel-voile`.
 * Stub V1 : 4 rubriques + grille des derniers tests. À enrichir par Wisewand.
 *
 * @package Norlandascup
 */
get_header();
?>

<header class="wrap page-head">
	<span class="kicker"><?php esc_html_e( 'Magazine · Matériel', 'norlandascup' ); ?></span>
	<h1><?php esc_html_e( 'Le matériel pour la voile côtière', 'norlandascup' ); ?></h1>
	<p class="sub"><?php esc_html_e( 'Guides, essais et choix de matériel pour les croiseurs côtiers et habitables. Voilerie, électronique, sécurité et vêtements techniques, testés en conditions réelles de Manche.', 'norlandascup' ); ?></p>
</header>

<section class="editorial">
	<div class="wrap">
		<div class="fx" style="margin-bottom:30px;max-width:620px">
			<span class="sec-label"><?php esc_html_e( 'Les rubriques', 'norlandascup' ); ?></span>
			<h2 style="font-family:var(--serif);font-weight:600;font-size:clamp(25px,3vw,36px);line-height:1.08;color:var(--marine);letter-spacing:-.01em"><?php esc_html_e( 'Quatre familles à parcourir', 'norlandascup' ); ?></h2>
		</div>
		<div class="next-grid fx" style="grid-template-columns:repeat(4,1fr);gap:18px">
			<?php
			$rubriques = array(
				array( 'img' => 'home-card-voilerie.webp',    'slug' => 'voilerie',             'name' => __( 'Voilerie', 'norlandascup' ),            'desc' => __( 'Voiles d\'avant, grand voile, spinnaker. Choix des tissus, coupes et entretien.', 'norlandascup' ) ),
				array( 'img' => 'mag-card-compas.webp',       'slug' => 'electronique',         'name' => __( 'Électronique', 'norlandascup' ),        'desc' => __( 'Compas, lecteurs de vent, centrale de navigation et instruments de course.', 'norlandascup' ) ),
				array( 'img' => 'eq-galerie-rappel.webp',     'slug' => 'securite',             'name' => __( 'Sécurité', 'norlandascup' ),            'desc' => __( 'Équipements individuels, dispositifs de bord et matériel de survie obligatoire.', 'norlandascup' ) ),
				array( 'img' => 'mag-card-equipiere.webp',    'slug' => 'vetements-techniques', 'name' => __( 'Vêtements techniques', 'norlandascup' ), 'desc' => __( 'Vestes de quart, vêtements de pluie, gants, bottes. Pour la mer formée de la Manche.', 'norlandascup' ) ),
			);
			foreach ( $rubriques as $r ) : ?>
				<a class="next-card" href="<?php echo esc_url( home_url( '/materiel-voile/' . $r['slug'] . '/' ) ); ?>">
					<div class="ph" style="background-image:url(<?php echo esc_url( NORLANDASCUP_URI . '/assets/img/' . $r['img'] ); ?>);background-size:cover;background-position:center;aspect-ratio:4/3" data-ph="<?php echo esc_attr( $r['name'] ); ?>"></div>
					<div class="nc-body">
						<span class="nc-k"><?php esc_html_e( 'Rubrique', 'norlandascup' ); ?></span>
						<h3><?php echo esc_html( $r['name'] ); ?></h3>
						<p><?php echo esc_html( $r['desc'] ); ?></p>
						<span class="read"><?php esc_html_e( 'Explorer', 'norlandascup' ); ?><span class="arr">→</span></span>
					</div>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="editorial alt">
	<div class="wrap">
		<div class="fx" style="margin-bottom:30px;max-width:620px">
			<span class="sec-label"><?php esc_html_e( 'Derniers tests', 'norlandascup' ); ?></span>
			<h2 style="font-family:var(--serif);font-weight:600;font-size:clamp(25px,3vw,36px);line-height:1.08;color:var(--marine);letter-spacing:-.01em"><?php esc_html_e( 'Banc d\'essai du moment', 'norlandascup' ); ?></h2>
			<p style="margin-top:14px;color:#4a4f55;font-size:16px;line-height:1.6"><?php esc_html_e( 'Les essais matériel récents publiés par la rédaction, classés par fraîcheur.', 'norlandascup' ); ?></p>
		</div>
		<div class="mag-grid">
			<?php
			// V1 : grille placeholder. Sera remplacée par WP_Query sur category=materiel après que
			// Wisewand publie les premiers articles.
			$tests = array(
				array( 'img' => 'mag-card-genois.webp',          'slug' => 'voilerie',             'tag' => 'Voilerie',             'title' => __( 'Voiles d\'avant, le débat du tissu cousu contre la membrane', 'norlandascup' ),    'date' => '29 mai' ),
				array( 'img' => 'home-card-voilerie.webp',       'slug' => 'voilerie',             'tag' => 'Voilerie',             'title' => __( 'Garde robe de voiles pour la Manche : laize lourde et tissus membranés', 'norlandascup' ), 'date' => '25 mai' ),
				array( 'img' => 'mag-card-compas.webp',          'slug' => 'electronique',         'tag' => 'Électronique',         'title' => __( 'Compas tactiques sous 1500 euros, le tour des modèles', 'norlandascup' ),         'date' => '27 mai' ),
				array( 'img' => 'mag-card-tableau-course.webp',  'slug' => 'electronique',         'tag' => 'Électronique',         'title' => __( 'Centrales de navigation 2026, ce qui change pour la régate côtière', 'norlandascup' ), 'date' => '20 mai' ),
				array( 'img' => 'eq-galerie-rappel.webp',        'slug' => 'securite',             'tag' => 'Sécurité',             'title' => __( 'Gilets gonflables, comparatif des modèles 150 newtons à 275 newtons', 'norlandascup' ), 'date' => '18 mai' ),
				array( 'img' => 'mag-card-equipiere.webp',       'slug' => 'vetements-techniques', 'tag' => 'Vêtements techniques', 'title' => __( 'Vestes de quart Manche, six modèles testés en mer formée', 'norlandascup' ),       'date' => '14 mai' ),
			);
			foreach ( $tests as $t ) : ?>
				<a class="acard" href="<?php echo esc_url( home_url( '/materiel-voile/' . $t['slug'] . '/' ) ); ?>" style="text-decoration:none;color:inherit;display:block">
					<div class="ph r45" style="background-image:url(<?php echo esc_url( NORLANDASCUP_URI . '/assets/img/' . $t['img'] ); ?>);background-size:cover;background-position:center" data-ph="<?php echo esc_attr( $t['tag'] . ', test matériel' ); ?>"></div>
					<span class="ac-tag"><?php echo esc_html( $t['tag'] ); ?></span>
					<h3><?php echo esc_html( $t['title'] ); ?></h3>
					<span class="ac-date"><?php echo esc_html( $t['date'] ); ?></span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php get_footer();
