<?php
/**
 * Slow Karma theme setup.
 *
 * @package SlowKarma
 */

defined( 'ABSPATH' ) || exit;

define( 'SK_VERSION', '1.11.0' );

require get_template_directory() . '/inc/data.php';
require get_template_directory() . '/inc/helpers.php';
require get_template_directory() . '/inc/seo.php';
require get_template_directory() . '/inc/setup-pages.php';
require get_template_directory() . '/inc/routing.php';

/**
 * Theme supports.
 */
function sk_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script', 'navigation-widgets' ) );
	add_theme_support( 'responsive-embeds' );
	register_nav_menus( array( 'primary' => __( 'Main menu', 'slowkarma' ) ) );
}
add_action( 'after_setup_theme', 'sk_setup' );

/**
 * Styles and scripts. One stylesheet, one small deferred script.
 */
function sk_assets() {
	$css = get_theme_file_path( 'assets/css/main.css' );
	$js  = get_theme_file_path( 'assets/js/main.js' );
	wp_enqueue_style( 'sk-main', get_theme_file_uri( 'assets/css/main.css' ), array(), SK_VERSION . '.' . filemtime( $css ) );
	wp_enqueue_script(
		'sk-main',
		get_theme_file_uri( 'assets/js/main.js' ),
		array(),
		SK_VERSION . '.' . filemtime( $js ),
		array(
			'in_footer' => true,
			'strategy'  => 'defer',
		)
	);

	// Nothing on the front end uses block styles, so skip their weight.
	if ( ! is_singular( 'post' ) ) {
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'wp-block-library-theme' );
		wp_dequeue_style( 'classic-theme-styles' );
		wp_dequeue_style( 'global-styles' );
	}
}
add_action( 'wp_enqueue_scripts', 'sk_assets', 20 );

/**
 * Preload the fonts used above the fold.
 */
function sk_preload() {
	foreach ( array( 'niagara-solid', 'literata-400' ) as $font ) {
		printf(
			'<link rel="preload" href="%s" as="font" type="font/woff" crossorigin>' . "\n",
			esc_url( sk_asset( 'fonts/' . $font . '.woff' ) )
		);
	}
	if ( is_front_page() ) {
		printf( '<link rel="preload" as="image" href="%s" fetchpriority="high">' . "\n", esc_url( sk_img_url( 'hero-fill', 1800 ) ) );
	}
	echo '<link rel="preconnect" href="https://i.ytimg.com">' . "\n";
}
add_action( 'wp_head', 'sk_preload', 1 );

/**
 * Inline font-face rules so text renders without waiting for main.css.
 */
function sk_font_faces() {
	$fonts = array(
		array( 'Niagara Solid', 'niagara-solid', 400, 'normal' ),
		array( 'Literata', 'literata-400', 400, 'normal' ),
		array( 'Literata', 'literata-600', 600, 'normal' ),
		array( 'Literata', 'literata-400i', 400, 'italic' ),
	);
	$css = '';
	foreach ( $fonts as $f ) {
		$css .= sprintf(
			'@font-face{font-family:"%1$s";src:url(%2$s) format("woff");font-weight:%3$d;font-style:%4$s;font-display:swap}',
			$f[0],
			esc_url( sk_asset( 'fonts/' . $f[1] . '.woff' ) ),
			$f[2],
			$f[3]
		);
	}
	echo '<style id="sk-fonts">' . $css . '</style>' . "\n"; // phpcs:ignore WordPress.Security.EscapeOutput
}
add_action( 'wp_head', 'sk_font_faces', 2 );

/**
 * Remove front-end weight WordPress adds by default.
 */
function sk_cleanup() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
	remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
	remove_action( 'wp_footer', 'wp_enqueue_global_styles', 1 );
	add_filter( 'emoji_svg_url', '__return_false' );
}
add_action( 'init', 'sk_cleanup' );

/**
 * Body classes for the season colour themes.
 *
 * @param array $classes Classes.
 */
function sk_body_class( $classes ) {
	if ( sk_is( 'season-one' ) ) {
		$classes[] = 'theme-s1';
	} elseif ( sk_is( 'season-two' ) ) {
		$classes[] = 'theme-s2';
	}
	return $classes;
}
add_filter( 'body_class', 'sk_body_class' );

/**
 * Main navigation items. Uses the "Main menu" location if the band has
 * built one in Appearance > Menus, otherwise this default.
 */
function sk_nav_items() {
	return array(
		'story'      => 'Story',
		'season-one' => 'Season One',
		'season-two' => 'Season Two',
		'videos'     => 'Videos',
		'music'      => 'Music',
		'press'      => 'Press kit',
	);
}

/**
 * Print the main menu.
 *
 * @param string $class List class.
 */
function sk_nav( $class = 'nav__list' ) {
	if ( has_nav_menu( 'primary' ) ) {
		wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => $class,
				'depth'          => 1,
			)
		);
		return;
	}
	echo '<ul class="' . esc_attr( $class ) . '">';
	foreach ( sk_nav_items() as $slug => $label ) {
		$current = sk_is( $slug ) ? ' aria-current="page"' : '';
		printf( '<li><a href="%1$s"%2$s>%3$s</a></li>', esc_url( sk_page_url( $slug ) ), $current, esc_html( $label ) ); // phpcs:ignore WordPress.Security.EscapeOutput
	}
	echo '</ul>';
}

/**
 * Print any content the band adds to a page in the editor, below the
 * designed sections. Lets them add notes without touching templates.
 */
function sk_editor_content() {
	while ( have_posts() ) {
		the_post();
		if ( trim( get_the_content() ) ) {
			echo '<section class="section section--editor"><div class="wrap prose">';
			the_content();
			echo '</div></section>';
		}
	}
}
