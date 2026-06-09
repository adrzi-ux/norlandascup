<?php
/**
 * Template Name: Hub Magazine
 *
 * Assigner ce template à la page WP de slug `magazine`.
 *
 * @package Norlandascup
 */
get_header();
$img_base = get_stylesheet_directory_uri() . '/assets/img/';

// Filtre serveur basé sur ?rubrique= (chips magazine + cards article du theme et des autres pages renvoient ici).
$valid_rubriques = array( 'regates', 'spots', 'materiel', 'meteo', 'portraits' );
$rubrique        = isset( $_GET['rubrique'] ) ? sanitize_key( wp_unslash( $_GET['rubrique'] ) ) : '';
if ( ! in_array( $rubrique, $valid_rubriques, true ) ) {
	$rubrique = 'all';
}
$rubrique_labels = array(
	'regates'   => __( 'Régates', 'norlandascup' ),
	'spots'     => __( 'Spots', 'norlandascup' ),
	'materiel'  => __( 'Matériel', 'norlandascup' ),
	'meteo'     => __( 'Météo', 'norlandascup' ),
	'portraits' => __( 'Portraits', 'norlandascup' ),
);

// Source unique des articles (cf. inc/articles-data.php).
$all_articles  = norlandascup_articles();
$feature_slug  = 'trophee-manche-2026-saint-vaast';
$feature       = isset( $all_articles[ $feature_slug ] ) ? $all_articles[ $feature_slug ] : null;
// Les cards du grid : tous les articles sauf la feature et le lead home (déjà mis en avant).
$grid_slugs    = array(
	'tour-belle-ile-depart-caen',
	'port-en-bessin-baie-seine',
	'cherbourg-dix-mouillages',
	'voiles-avant-tissu-cousu-membrane',
	'compas-tactiques-1500-euros',
	'lire-vent-ouest-cote-nacre',
	'maree-tourne-tactiques',
	'antoine-gouville-vingt-ans-mer',
	'equipieres-trophee-manche',
	'calendrier-regates-cotieres-2026',
	'ouistreham-franchir-ecluse',
);

if ( $rubrique === 'all' ) {
	$display_slugs = $grid_slugs;
} else {
	$display_slugs = array_values( array_filter( $grid_slugs, function ( $s ) use ( $all_articles, $rubrique ) {
		return isset( $all_articles[ $s ]['rub'] ) && $all_articles[ $s ]['rub'] === $rubrique;
	} ) );
}
$show_feature = $feature && ( $rubrique === 'all' || $rubrique === $feature['rub'] );
$total_count  = count( $display_slugs ) + ( $show_feature ? 1 : 0 );
?>

<header class="wrap mag-top">
	<span class="kicker"><?php esc_html_e( 'Le magazine', 'norlandascup' ); ?></span>
	<h1><?php esc_html_e( 'Le magazine de la voile en Normandie côtière', 'norlandascup' ); ?></h1>
	<p class="sub"><?php esc_html_e( 'Régates, spots, matériel et météo de la Manche, du Cotentin à la Côte de Nacre. Une rédaction qui couvre le littoral, sans complaisance et sans publicité.', 'norlandascup' ); ?></p>
</header>

<div class="magfilter" id="magfilter">
	<div class="wrap" role="tablist" aria-label="<?php esc_attr_e( 'Rubriques du magazine', 'norlandascup' ); ?>">
		<span class="mf-label"><?php esc_html_e( 'Rubriques', 'norlandascup' ); ?></span>
		<a class="mf-chip<?php echo $rubrique === 'regates' ? ' active' : ''; ?>" href="<?php echo esc_url( home_url( '/magazine/?rubrique=regates' ) ); ?>" data-f="regates"><?php esc_html_e( 'Régates', 'norlandascup' ); ?></a>
		<a class="mf-chip<?php echo $rubrique === 'spots' ? ' active' : ''; ?>" href="<?php echo esc_url( home_url( '/magazine/?rubrique=spots' ) ); ?>" data-f="spots"><?php esc_html_e( 'Spots', 'norlandascup' ); ?></a>
		<a class="mf-chip<?php echo $rubrique === 'materiel' ? ' active' : ''; ?>" href="<?php echo esc_url( home_url( '/magazine/?rubrique=materiel' ) ); ?>" data-f="materiel"><?php esc_html_e( 'Matériel', 'norlandascup' ); ?></a>
		<a class="mf-chip<?php echo $rubrique === 'meteo' ? ' active' : ''; ?>" href="<?php echo esc_url( home_url( '/magazine/?rubrique=meteo' ) ); ?>" data-f="meteo"><?php esc_html_e( 'Météo', 'norlandascup' ); ?></a>
		<a class="mf-chip<?php echo $rubrique === 'portraits' ? ' active' : ''; ?>" href="<?php echo esc_url( home_url( '/magazine/?rubrique=portraits' ) ); ?>" data-f="portraits"><?php esc_html_e( 'Portraits', 'norlandascup' ); ?></a>
		<a class="mf-chip<?php echo $rubrique === 'all' ? ' active' : ''; ?>" href="<?php echo esc_url( home_url( '/magazine/' ) ); ?>" data-f="all"><?php esc_html_e( 'Tous', 'norlandascup' ); ?></a>
		<span class="mf-count"><b id="mfCount"><?php echo (int) $total_count; ?></b> <?php esc_html_e( 'articles', 'norlandascup' ); ?></span>
	</div>
</div>

<?php if ( $show_feature ) : ?>
<section class="wrap" aria-label="<?php esc_attr_e( 'Article à la une', 'norlandascup' ); ?>">
	<article class="feature">
		<a class="feat-media" href="<?php echo esc_url( home_url( '/magazine/' . $feature_slug . '/' ) ); ?>" aria-label="<?php esc_attr_e( "Lire l'article à la une", 'norlandascup' ); ?>">
			<div class="ph r169" style="background-image:url(<?php echo esc_url( $img_base . $feature['img'] ); ?>);background-size:cover;background-position:center" data-ph="<?php echo esc_attr( $feature['ph'] ); ?>"></div>
		</a>
		<div class="feat-body">
			<div class="feat-flag"><?php esc_html_e( 'À la une', 'norlandascup' ); ?><span class="sep">/</span><span class="rub"><?php echo esc_html( $feature['tag'] ); ?></span></div>
			<h2><a href="<?php echo esc_url( home_url( '/magazine/' . $feature_slug . '/' ) ); ?>" style="color:inherit;text-decoration:none"><?php echo esc_html( $feature['title'] ); ?></a></h2>
			<p class="chapo"><?php echo esc_html( $feature['excerpt'] ); ?></p>
			<div class="feat-meta">
				<span><?php echo esc_html( $feature['date'] ); ?></span>
				<span class="dot"></span>
				<span><?php printf( esc_html__( '%s de lecture', 'norlandascup' ), esc_html( $feature['read'] ) ); ?></span>
			</div>
			<a href="<?php echo esc_url( home_url( '/magazine/' . $feature_slug . '/' ) ); ?>" class="read"><?php esc_html_e( "Lire l'article", 'norlandascup' ); ?><span class="arr">→</span></a>
		</div>
	</article>
</section>
<?php endif; ?>

<section class="wrap" aria-label="<?php esc_attr_e( 'Derniers articles', 'norlandascup' ); ?>">
	<div class="mag-grid-head">
		<h2 id="gridTitle">
			<?php if ( $rubrique === 'all' ) : ?>
				<?php esc_html_e( 'Tous les articles', 'norlandascup' ); ?>
			<?php else : ?>
				<?php printf( esc_html__( 'Articles · %s', 'norlandascup' ), esc_html( $rubrique_labels[ $rubrique ] ) ); ?>
			<?php endif; ?>
		</h2>
		<span class="hint">
			<?php if ( $rubrique === 'all' ) : ?>
				<?php esc_html_e( 'Photo, rubrique, titre, date', 'norlandascup' ); ?>
			<?php else : ?>
				<a href="<?php echo esc_url( home_url( '/magazine/' ) ); ?>" style="color:inherit"><?php esc_html_e( '← Voir toutes les rubriques', 'norlandascup' ); ?></a>
			<?php endif; ?>
		</span>
	</div>
	<div class="mag-grid" id="magGrid">
		<?php if ( empty( $display_slugs ) ) : ?>
			<p style="grid-column:1/-1;text-align:center;color:#6a6f75;padding:40px 20px;font-style:italic;font-size:16px"><?php esc_html_e( 'Aucun article publié dans cette rubrique pour le moment. La rédaction y travaille.', 'norlandascup' ); ?></p>
		<?php endif; ?>
		<?php foreach ( $display_slugs as $slug ) :
			if ( empty( $all_articles[ $slug ] ) ) {
				continue;
			}
			$a = $all_articles[ $slug ];
			?>
			<a class="acard fx" href="<?php echo esc_url( home_url( '/magazine/' . $slug . '/' ) ); ?>" data-rub="<?php echo esc_attr( $a['rub'] ); ?>" style="text-decoration:none;color:inherit;display:block">
				<div class="ph r45" style="background-image:url(<?php echo esc_url( $img_base . $a['img'] ); ?>);background-size:cover;background-position:center" data-ph="<?php echo esc_attr( $a['ph'] ); ?>"></div>
				<span class="ac-tag"><?php echo esc_html( $a['tag'] ); ?></span>
				<h3><?php echo esc_html( $a['title'] ); ?></h3>
				<p><?php echo esc_html( $a['excerpt'] ); ?></p>
				<span class="ac-date"><?php printf( esc_html__( '%1$s · %2$s', 'norlandascup' ), esc_html( $a['date'] ), esc_html( $a['read'] ) ); ?></span>
			</a>
		<?php endforeach; ?>
	</div>

</section>

<section class="mag-cta">
	<div class="wrap">
		<div class="fx">
			<span class="kicker"><?php esc_html_e( 'La lettre du magazine', 'norlandascup' ); ?></span>
			<h2><?php esc_html_e( 'Recevoir le calendrier des régates et nos dernières enquêtes', 'norlandascup' ); ?></h2>
		</div>
		<form class="fx" action="<?php echo esc_url( home_url( '/contact/?sujet=newsletter' ) ); ?>" method="get">
			<input type="hidden" name="sujet" value="newsletter">
			<div class="row">
				<input type="email" name="email" placeholder="<?php esc_attr_e( 'Votre adresse de messagerie', 'norlandascup' ); ?>" aria-label="<?php esc_attr_e( 'Adresse de messagerie', 'norlandascup' ); ?>" required>
				<button class="btn btn-primary" type="submit"><?php esc_html_e( 'Je m\'abonne', 'norlandascup' ); ?><span class="arr">→</span></button>
			</div>
			<span class="fine"><?php esc_html_e( 'Une lettre par mois. Désinscription en un clic.', 'norlandascup' ); ?></span>
		</form>
	</div>
</section>

<?php get_footer();
