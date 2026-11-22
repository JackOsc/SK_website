<?php
/**
 * On theme activation, make sure every designed page exists, set the
 * front page and pretty permalinks. Existing pages with the same slug are
 * left alone (only their template is used).
 *
 * @package SlowKarma
 */

defined( 'ABSPATH' ) || exit;

/**
 * Pages the theme designs.
 */
function sk_required_pages() {
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
 * Create missing pages and a static home page.
 */
function sk_create_pages() {
	foreach ( sk_required_pages() as $slug => $title ) {
		if ( get_page_by_path( $slug ) ) {
			continue;
		}
		wp_insert_post(
			array(
				'post_type'    => 'page',
				'post_status'  => 'publish',
				'post_name'    => $slug,
				'post_title'   => $title,
				'post_content' => '',
			)
		);
	}

	$home = get_page_by_path( 'home' );
	if ( ! $home ) {
		$home_id = wp_insert_post(
			array(
				'post_type'   => 'page',
				'post_status' => 'publish',
				'post_name'   => 'home',
				'post_title'  => 'Home',
			)
		);
	} else {
		$home_id = $home->ID;
	}
	if ( $home_id && ! is_wp_error( $home_id ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $home_id );
	}

	if ( ! get_option( 'permalink_structure' ) ) {
		update_option( 'permalink_structure', '/%postname%/' );
	}
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'sk_create_pages' );
