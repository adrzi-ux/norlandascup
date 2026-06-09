<?php
/**
 * Template Name: Article magazine
 *
 * Template générique pour les articles du magazine (enfants de la page /magazine/).
 * Lit les données depuis inc/articles-data.php via le slug de la page courante.
 *
 * @package Norlandascup
 */
get_header();
$slug    = get_post_field( 'post_name', get_post() );
$article = norlandascup_article_by_slug( $slug );
?>

<?php if ( $article ) : ?>

<?php
$img_base        = NORLANDASCUP_URI . '/assets/img/';
$rubrique_labels = array(
	'regates'   => __( 'Régates', 'norlandascup' ),
	'spots'     => __( 'Spots', 'norlandascup' ),
	'materiel'  => __( 'Matériel', 'norlandascup' ),
	'meteo'     => __( 'Météo', 'norlandascup' ),
	'portraits' => __( 'Portraits', 'norlandascup' ),
);
$rub_label = isset( $rubrique_labels[ $article['rub'] ] ) ? $rubrique_labels[ $article['rub'] ] : __( 'Magazine', 'norlandascup' );

// Articles connexes : 2 autres articles de la même rubrique.
$related_all = norlandascup_articles_by_rubrique( $article['rub'] );
unset( $related_all[ $slug ] );
$related = array_slice( $related_all, 0, 2, true );

// Schema.org Article + FAQPage (parse les <h3> dans la section "Questions fréquentes" du body).
// $article['date'] est au format JJ.MM.AAAA, plus fiable que la version longue française pour strtotime.
$date_iso = '';
if ( preg_match( '/^(\d{2})\.(\d{2})\.(\d{4})$/', $article['date'], $dm ) ) {
	$date_iso = $dm[3] . '-' . $dm[2] . '-' . $dm[1] . 'T08:00:00+02:00';
}
$schema_article = array(
	'@context'         => 'https://schema.org',
	'@type'            => 'Article',
	'headline'         => $article['title'],
	'description'      => $article['excerpt'],
	'image'            => esc_url( $img_base . $article['img'] ),
	'datePublished'    => $date_iso ?: gmdate( 'c' ),
	'author'           => array( '@type' => 'Organization', 'name' => "Norlanda's Cup, rédaction" ),
	'publisher'        => array(
		'@type' => 'Organization',
		'name'  => "Norlanda's Cup",
		'logo'  => array( '@type' => 'ImageObject', 'url' => esc_url( $img_base . 'home-hero.webp' ) ),
	),
	'mainEntityOfPage' => esc_url( home_url( '/magazine/' . $slug . '/' ) ),
);

// Extraction FAQ depuis le body (paires h3 + p qui suivent la dernière h2 "Questions fréquentes").
$faq_entities = array();
if ( preg_match( '#<h2>\s*Questions fréquentes\s*</h2>(.+)$#s', $article['body'], $faq_block ) ) {
	if ( preg_match_all( '#<h3>(.+?)</h3>\s*<p>(.+?)</p>#s', $faq_block[1], $qa, PREG_SET_ORDER ) ) {
		foreach ( $qa as $pair ) {
			$faq_entities[] = array(
				'@type'          => 'Question',
				'name'           => wp_strip_all_tags( $pair[1] ),
				'acceptedAnswer' => array(
					'@type' => 'Answer',
					'text'  => wp_strip_all_tags( $pair[2] ),
				),
			);
		}
	}
}
?>
<script type="application/ld+json"><?php echo wp_json_encode( $schema_article, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ); ?></script>
<?php if ( ! empty( $faq_entities ) ) : ?>
<script type="application/ld+json"><?php echo wp_json_encode( array( '@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => $faq_entities ), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ); ?></script>
<?php endif; ?>

<header class="wrap page-head">
	<span class="kicker">
		<?php esc_html_e( 'Magazine', 'norlandascup' ); ?>
		&nbsp;·&nbsp;
		<a href="<?php echo esc_url( home_url( '/magazine/?rubrique=' . $article['rub'] ) ); ?>" style="color:inherit;text-decoration:underline"><?php echo esc_html( $rub_label ); ?></a>
	</span>
	<h1><?php echo esc_html( $article['title'] ); ?></h1>
	<p class="sub"><?php echo esc_html( $article['excerpt'] ); ?></p>
	<div class="byline" style="margin-top:24px;font-family:var(--mono);font-size:12px;letter-spacing:.08em;color:#8a8175;text-transform:uppercase">
		<span><?php esc_html_e( 'Par la rédaction', 'norlandascup' ); ?></span>
		<span style="display:inline-block;width:4px;height:4px;background:currentColor;border-radius:50%;margin:0 8px;vertical-align:middle;opacity:.5"></span>
		<span><?php echo esc_html( $article['date_long'] ); ?></span>
		<span style="display:inline-block;width:4px;height:4px;background:currentColor;border-radius:50%;margin:0 8px;vertical-align:middle;opacity:.5"></span>
		<span><?php echo esc_html( $article['read'] ); ?></span>
	</div>
</header>

<section class="wrap" aria-label="<?php esc_attr_e( 'Illustration', 'norlandascup' ); ?>">
	<div class="ph r169" style="background-image:url(<?php echo esc_url( $img_base . $article['img'] ); ?>);background-size:cover;background-position:center;margin:0 0 40px;border-radius:6px;min-height:clamp(280px,40vw,520px)" data-ph="<?php echo esc_attr( $article['ph'] ); ?>"></div>
</section>

<section class="editorial">
	<div class="wrap">
		<div class="prose fx" style="max-width:760px;margin:0 auto;font-family:var(--serif);font-size:clamp(17px,1.6vw,19px);line-height:1.65;color:var(--marine)">
			<?php
			// Le body est du HTML statique géré dans articles-data.php (rédaction interne, pas de saisie utilisateur).
			echo $article['body']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			?>
		</div>
	</div>
</section>

<?php if ( ! empty( $related ) ) : ?>
<section class="editorial alt">
	<div class="wrap">
		<div class="next-head fx">
			<span class="sec-label"><?php esc_html_e( 'Poursuivre la lecture', 'norlandascup' ); ?></span>
			<h2><?php printf( esc_html__( 'Autres articles · %s', 'norlandascup' ), esc_html( $rub_label ) ); ?></h2>
		</div>
		<div class="next-grid fx">
			<?php foreach ( $related as $rel_slug => $rel ) : ?>
				<a class="next-card" href="<?php echo esc_url( home_url( '/magazine/' . $rel_slug . '/' ) ); ?>">
					<div class="ph" style="background-image:url(<?php echo esc_url( $img_base . $rel['img'] ); ?>);background-size:cover;background-position:center" data-ph="<?php echo esc_attr( $rel['ph'] ); ?>"></div>
					<div class="nc-body">
						<span class="nc-k"><?php echo esc_html( $rub_label ); ?></span>
						<h3><?php echo esc_html( $rel['title'] ); ?></h3>
						<p><?php echo esc_html( $rel['excerpt'] ); ?></p>
						<span class="read"><?php esc_html_e( "Lire l'article", 'norlandascup' ); ?><span class="arr">→</span></span>
					</div>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php endif; ?>

<section class="wrap" style="padding:40px 0 60px;text-align:center">
	<a href="<?php echo esc_url( home_url( '/magazine/' ) ); ?>" class="btn btn-dark"><?php esc_html_e( 'Tous les articles du magazine', 'norlandascup' ); ?><span class="arr">→</span></a>
</section>

<?php else : ?>

<header class="wrap page-head">
	<span class="kicker"><?php esc_html_e( 'Magazine', 'norlandascup' ); ?></span>
	<h1><?php esc_html_e( "Article en préparation", 'norlandascup' ); ?></h1>
	<p class="sub"><?php esc_html_e( "Cet article est en cours de rédaction. La rédaction le publiera prochainement.", 'norlandascup' ); ?></p>
</header>

<section class="editorial">
	<div class="wrap" style="text-align:center">
		<a href="<?php echo esc_url( home_url( '/magazine/' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Voir tous les articles', 'norlandascup' ); ?><span class="arr">→</span></a>
	</div>
</section>

<?php endif; ?>

<?php get_footer();
