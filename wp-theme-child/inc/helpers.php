<?php
/**
 * Norlandascup helper functions.
 *
 * @package Norlandascup
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Output the recurring SVG mark used in the brand logo (sailboat silhouette).
 */
function norlandascup_brand_mark_svg() {
	?>
	<svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
		<path d="M12 2 L12 19 M12 4 L20 16 L12 16 Z M12 6 L5 16 L12 16 Z" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/>
		<path d="M5 19 H19" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/>
	</svg>
	<?php
}

/**
 * Render the brand block (used in header and footer).
 */
function norlandascup_brand_block( $args = array() ) {
	$args = wp_parse_args( $args, array(
		'href'      => esc_url( home_url( '/' ) ),
		'aria_label' => __( 'Norlanda\'s Cup, accueil', 'norlandascup' ),
		'subtitle'  => __( 'Magazine de voile', 'norlandascup' ),
	) );
	?>
	<a class="brand" href="<?php echo esc_url( $args['href'] ); ?>" aria-label="<?php echo esc_attr( $args['aria_label'] ); ?>">
		<span class="mark" aria-hidden="true"><?php norlandascup_brand_mark_svg(); ?></span>
		<span class="word"><b>Norlanda's Cup</b><small><?php echo esc_html( $args['subtitle'] ); ?></small></span>
	</a>
	<?php
}

/**
 * Render the reusable ArchiveBanner component.
 * Used on /la-norlandas-cup/ and /equipage/{slug}/ pages.
 *
 * @param array $args label (top, eg "Page d'archive"), text (main message), badge_label, badge_value.
 */
function norlandascup_archive_banner( $args = array() ) {
	$args = wp_parse_args( $args, array(
		'label'        => __( 'Page d\'archive', 'norlandascup' ),
		'text'         => __( 'Page d\'archive. Édition non reconduite depuis 2018. Contenu conservé pour la postérité de la compétition.', 'norlandascup' ),
		'badge_label'  => __( 'Éditions', 'norlandascup' ),
		'badge_value'  => '2010 / 2018',
		'badge_suffix' => __( 'Manche', 'norlandascup' ),
	) );
	?>
	<section class="archive-banner" aria-label="<?php esc_attr_e( 'Statut de l\'archive', 'norlandascup' ); ?>">
		<div class="wrap">
			<span class="seal" aria-hidden="true">
				<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round">
					<circle cx="12" cy="4.3" r="1.8"/>
					<line x1="12" y1="6.1" x2="12" y2="20.5"/>
					<line x1="8.4" y1="9.6" x2="15.6" y2="9.6"/>
					<path d="M4.4 14.2 a7.6 7.6 0 0 0 15.2 0"/>
				</svg>
			</span>
			<div class="ab-txt">
				<span class="ab-label"><i></i><?php echo esc_html( $args['label'] ); ?></span>
				<p><?php echo esc_html( $args['text'] ); ?></p>
			</div>
			<div class="ab-badge"><?php echo esc_html( $args['badge_label'] ); ?><b><?php echo esc_html( $args['badge_value'] ); ?></b><?php echo esc_html( $args['badge_suffix'] ); ?></div>
		</div>
	</section>
	<?php
}

/**
 * Render a breadcrumb. Pass an ordered array of items: each item has `label`, optional `href`.
 * The last item is rendered as the current page.
 */
function norlandascup_breadcrumb( $items = array() ) {
	if ( empty( $items ) ) {
		return;
	}
	$last = count( $items ) - 1;
	?>
	<nav class="wrap crumb" aria-label="<?php esc_attr_e( 'Fil d\'ariane', 'norlandascup' ); ?>">
		<?php foreach ( $items as $i => $item ) :
			$is_last = ( $i === $last );
			if ( ! empty( $item['href'] ) && ! $is_last ) : ?>
				<a href="<?php echo esc_url( $item['href'] ); ?>"><?php echo esc_html( $item['label'] ); ?></a>
			<?php else : ?>
				<span class="cur"><?php echo esc_html( $item['label'] ); ?></span>
			<?php endif;
			if ( ! $is_last ) : ?>
				<span class="sep">/</span>
			<?php endif;
		endforeach; ?>
	</nav>
	<?php
}

/**
 * Render a conditions strip data tile (.cond .c).
 */
function norlandascup_cond_tile( $label, $value, $small = '' ) {
	?>
	<div class="c">
		<span class="lab"><?php echo esc_html( $label ); ?></span>
		<span class="val"><?php echo esc_html( $value ); ?><?php if ( $small !== '' ) : ?> <small><?php echo esc_html( $small ); ?></small><?php endif; ?></span>
	</div>
	<?php
}

/**
 * Sailboat sail SVG used in EquipageCard cartouche and elsewhere.
 */
function norlandascup_sail_svg() {
	?>
	<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
		<path d="M12 3 L12 16 M12 5 L17 14 L12 14 Z M12 6.5 L7 14 L12 14 Z M8 16 H16"/>
	</svg>
	<?php
}

/**
 * Detect the current top-level section key. Used to mark the active nav link in header.
 */
function norlandascup_current_section() {
	if ( is_front_page() ) {
		return 'magazine';
	}
	if ( is_post_type_archive( 'equipage' ) || is_singular( 'equipage' ) ) {
		return 'archive';
	}
	$slug = '';
	if ( is_page() ) {
		$slug = get_post_field( 'post_name', get_post() );
	} elseif ( is_singular() ) {
		$slug = get_post_field( 'post_name', get_post() );
	}
	$map = array(
		'magazine'                       => 'magazine',
		'calendrier-regates-normandie'   => 'regates',
		'spots-de-voile-normandie'       => 'spots',
		'materiel-voile'                 => 'materiel',
		'la-norlandas-cup'               => 'archive',
		'les-equipages'                  => 'archive',
		'format-sportif-2018'            => 'archive',
		'interview-economique'           => 'archive',
		'interview-antoine'              => 'archive',
		'contact'                        => 'contact',
	);
	return isset( $map[ $slug ] ) ? $map[ $slug ] : '';
}

/**
 * Get the top bar dynamic data. Right now it returns static info; later it can read
 * a real tide API or a transient.
 */
function norlandascup_topbar_data() {
	return array(
		'edition_label'  => sprintf( __( 'Édition du %s', 'norlandascup' ), wp_date( 'j F Y' ) ),
		'tide_label'     => __( 'Marée Cherbourg, PM 14:38', 'norlandascup' ),
		'region_label'   => __( 'Normandie côtière', 'norlandascup' ),
		'pavilion_label' => __( 'Pavillon Alpha Bravo Charlie', 'norlandascup' ),
	);
}
