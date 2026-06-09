<?php
/**
 * Norlandascup header. Includes top bar + main header + mobile drawer.
 *
 * @package Norlandascup
 */
$topbar = norlandascup_topbar_data();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<?php if ( is_front_page() ) : ?>
		<link rel="preload" as="image" href="<?php echo esc_url( NORLANDASCUP_URI . '/assets/img/home-hero.webp' ); ?>" fetchpriority="high">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="topbar">
	<div class="wrap">
		<div class="flags" aria-hidden="true">
			<i style="background:#C9342D"></i><i style="background:#F2EBDC"></i><i style="background:#1B4F8A"></i>
			<span style="margin-left:8px"><?php echo esc_html( $topbar['pavilion_label'] ); ?></span>
		</div>
		<div class="meta">
			<span class="hide-sm"><?php echo esc_html( $topbar['region_label'] ); ?></span>
			<span><?php echo esc_html( $topbar['tide_label'] ); ?></span>
			<span class="hide-sm"><?php echo esc_html( $topbar['edition_label'] ); ?></span>
		</div>
	</div>
</div>

<header class="site">
	<div class="wrap">
		<?php norlandascup_brand_block(); ?>
		<nav class="main" aria-label="<?php esc_attr_e( 'Navigation principale', 'norlandascup' ); ?>">
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'container'      => false,
					'items_wrap'     => '%3$s',
					'depth'          => 1,
					'fallback_cb'    => false,
				) );
			} else {
				$active = norlandascup_current_section();
				$items = array(
					'magazine'  => array( 'href' => home_url( '/magazine/' ), 'label' => __( 'Magazine', 'norlandascup' ) ),
					'regates'   => array( 'href' => home_url( '/calendrier-regates-normandie/' ), 'label' => __( 'Régates', 'norlandascup' ) ),
					'spots'     => array( 'href' => home_url( '/spots-de-voile-normandie/' ), 'label' => __( 'Spots', 'norlandascup' ) ),
					'materiel'  => array( 'href' => home_url( '/materiel-voile/' ), 'label' => __( 'Matériel', 'norlandascup' ) ),
					'archive'   => array( 'href' => home_url( '/la-norlandas-cup/' ), 'label' => __( 'Archive', 'norlandascup' ) ),
					'contact'   => array( 'href' => home_url( '/contact/' ), 'label' => __( 'Contact', 'norlandascup' ) ),
				);
				foreach ( $items as $key => $item ) {
					printf(
						'<a href="%1$s"%3$s>%2$s</a>',
						esc_url( $item['href'] ),
						esc_html( $item['label'] ),
						$active === $key ? ' class="active"' : ''
					);
				}
			}
			?>
		</nav>
		<div class="header-cta">
			<a href="#news" class="btn btn-dark"><?php esc_html_e( 'S\'abonner', 'norlandascup' ); ?><span class="arr">↗</span></a>
		</div>
		<button class="burger" aria-label="<?php esc_attr_e( 'Ouvrir le menu', 'norlandascup' ); ?>" type="button" data-drawer-open>
			<span></span><span></span><span></span>
		</button>
	</div>
</header>

<div class="drawer" id="drawer" aria-hidden="true">
	<div class="dr-top">
		<span class="word"><b style="font-family:var(--serif);font-size:20px;color:var(--creme)">Norlanda's Cup</b></span>
		<button class="close" aria-label="<?php esc_attr_e( 'Fermer', 'norlandascup' ); ?>" type="button" data-drawer-close>&times;</button>
	</div>
	<a href="<?php echo esc_url( home_url( '/magazine/' ) ); ?>"><?php esc_html_e( 'Magazine', 'norlandascup' ); ?></a>
	<a href="<?php echo esc_url( home_url( '/calendrier-regates-normandie/' ) ); ?>"><?php esc_html_e( 'Régates', 'norlandascup' ); ?></a>
	<a href="<?php echo esc_url( home_url( '/spots-de-voile-normandie/' ) ); ?>"><?php esc_html_e( 'Spots', 'norlandascup' ); ?></a>
	<a href="<?php echo esc_url( home_url( '/materiel-voile/' ) ); ?>"><?php esc_html_e( 'Matériel', 'norlandascup' ); ?></a>
	<a href="<?php echo esc_url( home_url( '/la-norlandas-cup/' ) ); ?>"><?php esc_html_e( 'Archive', 'norlandascup' ); ?></a>
	<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'norlandascup' ); ?></a>
	<div class="dr-cta">
		<a href="#news" class="btn btn-primary" style="flex:1;justify-content:center"><?php esc_html_e( 'S\'abonner', 'norlandascup' ); ?></a>
	</div>
</div>
