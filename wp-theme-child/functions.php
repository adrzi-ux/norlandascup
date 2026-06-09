<?php
/**
 * Norlandascup Child theme functions.
 *
 * @package Norlandascup
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'NORLANDASCUP_VERSION', '0.1.0' );
define( 'NORLANDASCUP_DIR', get_stylesheet_directory() );
define( 'NORLANDASCUP_URI', get_stylesheet_directory_uri() );

/**
 * Enqueue parent + child styles, fonts and scripts.
 */
function norlandascup_enqueue_assets() {
	wp_enqueue_style(
		'kadence-parent',
		get_template_directory_uri() . '/style.css',
		array(),
		wp_get_theme( get_template() )->get( 'Version' )
	);

	wp_enqueue_style(
		'norlandascup-fonts',
		'https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500;600&family=IBM+Plex+Sans:wght@400;500;600;700&family=IBM+Plex+Serif:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'norlandascup-theme',
		NORLANDASCUP_URI . '/assets/css/theme.css',
		array( 'kadence-parent', 'norlandascup-fonts' ),
		NORLANDASCUP_VERSION
	);

	wp_enqueue_style(
		'norlandascup-child',
		get_stylesheet_uri(),
		array( 'norlandascup-theme' ),
		NORLANDASCUP_VERSION
	);

	wp_enqueue_script(
		'norlandascup-theme',
		NORLANDASCUP_URI . '/assets/js/theme.js',
		array(),
		NORLANDASCUP_VERSION,
		array( 'in_footer' => true )
	);
}
add_action( 'wp_enqueue_scripts', 'norlandascup_enqueue_assets', 20 );

/**
 * Add the `js` class to <html> as early as possible so CSS fade-in rules apply.
 */
function norlandascup_html_js_class() {
	echo "<script>document.documentElement.classList.add('js')</script>\n";
}
add_action( 'wp_head', 'norlandascup_html_js_class', 1 );

/**
 * Add a body class per template slug (handy for page-specific CSS scoping).
 */
function norlandascup_body_classes( $classes ) {
	if ( is_page() ) {
		$slug = get_post_field( 'post_name', get_post() );
		if ( $slug ) {
			$classes[] = 'page-' . sanitize_html_class( $slug );
		}
	}
	return $classes;
}
add_filter( 'body_class', 'norlandascup_body_classes' );

/**
 * Register theme supports and menus.
 */
function norlandascup_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );

	register_nav_menus(
		array(
			'primary' => __( 'Navigation principale', 'norlandascup' ),
			'footer_magazine' => __( 'Footer, colonne Magazine', 'norlandascup' ),
			'footer_archive'  => __( 'Footer, colonne Archive', 'norlandascup' ),
			'footer_redac'    => __( 'Footer, colonne Rédaction', 'norlandascup' ),
			'legal'           => __( 'Liens légaux (footer bas)', 'norlandascup' ),
		)
	);
}
add_action( 'after_setup_theme', 'norlandascup_setup' );

/**
 * Register Custom Post Type for the historic crews (équipages 2010 a 2018).
 * Slugs URLs déjà indexés Google à préserver : /equipage/{slug}/ (sauf masselin-sogea, super-u-2, l2-architectes qui sont à la racine).
 */
function norlandascup_register_cpt_equipage() {
	register_post_type(
		'equipage',
		array(
			'labels' => array(
				'name'          => __( 'Équipages', 'norlandascup' ),
				'singular_name' => __( 'Équipage', 'norlandascup' ),
				'add_new'       => __( 'Ajouter un équipage', 'norlandascup' ),
				'add_new_item'  => __( 'Ajouter un nouvel équipage', 'norlandascup' ),
				'edit_item'     => __( 'Modifier l\'équipage', 'norlandascup' ),
				'all_items'     => __( 'Tous les équipages', 'norlandascup' ),
			),
			'public'              => true,
			'has_archive'         => 'les-equipages',
			'rewrite'             => array( 'slug' => 'equipage', 'with_front' => false ),
			'show_in_rest'        => true,
			'menu_icon'           => 'dashicons-flag',
			'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'excerpt' ),
		)
	);
}
// add_action( 'init', 'norlandascup_register_cpt_equipage' ); // Désactivé en V1 : conflit avec /equipage/{slug}/ (pages WP, voir page-equipage.php)

/**
 * Helpers.
 */
require_once NORLANDASCUP_DIR . '/inc/helpers.php';
require_once NORLANDASCUP_DIR . '/inc/articles-data.php';
