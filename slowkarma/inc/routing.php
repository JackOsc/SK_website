<?php
/**
 * Makes the designed pages work at their URLs (/story/, /season-one/ ...)
 * whether or not a matching WordPress page exists. If someone deletes or
 * renames a page, or the pages were never created, the site still works.
 *
 * @package SlowKarma
 */

defined( 'ABSPATH' ) || exit;

/**
 * Slug of the designed page being shown, or '' if none.
 *
 * Works for real pages and for "virtual" ones served by sk_route().
 */
function sk_current_slug() {
	global $sk_virtual_slug;
	if ( ! empty( $sk_virtual_slug ) ) {
		return $sk_virtual_slug;
	}
	if ( is_page() && ! is_front_page() ) {
		$slug = get_post_field( 'post_name', get_queried_object_id() );
		return array_key_exists( $slug, sk_required_pages() ) ? $slug : '';
	}
	return '';
}

/**
 * Is the designed page with this slug being shown?
 *
 * @param string $slug Page slug.
 */
function sk_is( $slug ) {
	return sk_current_slug() === $slug;
}

/**
 * Designed-page slug requested in the URL, or ''.
 */
function sk_requested_slug() {
	$path = trim( (string) wp_parse_url( isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '', PHP_URL_PATH ), '/' ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput
	$home = trim( (string) wp_parse_url( home_url( '/' ), PHP_URL_PATH ), '/' );
	if ( $home && 0 === strpos( $path, $home . '/' ) ) {
		$path = substr( $path, strlen( $home ) + 1 );
	}
	return array_key_exists( $path, sk_required_pages() ) ? $path : '';
}

/**
 * A 404 at /story/ etc. becomes the designed page (status 200). Runs
 * before WordPress's own redirect guessing.
 */
function sk_route_status() {
	if ( ! is_404() ) {
		return;
	}
	$slug = sk_requested_slug();
	if ( ! $slug || ! locate_template( 'page-' . $slug . '.php' ) ) {
		return;
	}
	global $wp_query, $sk_virtual_slug;
	$sk_virtual_slug   = $slug;
	$wp_query->is_404  = false;
	$wp_query->is_page = true;
	status_header( 200 );
}
add_action( 'template_redirect', 'sk_route_status', 1 );

/**
 * Use the designed template for a virtual page.
 *
 * @param string $template Template WordPress picked.
 */
function sk_route( $template ) {
	global $sk_virtual_slug;
	if ( empty( $sk_virtual_slug ) ) {
		return $template;
	}
	return locate_template( 'page-' . $sk_virtual_slug . '.php' );
}
add_filter( 'template_include', 'sk_route', 99 );

/**
 * Document title for virtual pages.
 *
 * @param array $parts Title parts.
 */
function sk_virtual_title( $parts ) {
	global $sk_virtual_slug;
	if ( ! empty( $sk_virtual_slug ) ) {
		$parts['title'] = sk_required_pages()[ $sk_virtual_slug ];
	}
	return $parts;
}
add_filter( 'document_title_parts', 'sk_virtual_title' );

/**
 * When an admin opens the dashboard, create any missing pages once per
 * theme version. Covers hosts where the activation hook doesn't fire.
 */
function sk_maybe_create_pages() {
	if ( ! current_user_can( 'edit_pages' ) ) {
		return;
	}
	if ( get_option( 'sk_pages_version' ) === SK_VERSION ) {
		return;
	}
	sk_create_pages();
	update_option( 'sk_pages_version', SK_VERSION );
}
add_action( 'admin_init', 'sk_maybe_create_pages' );

/**
 * One address for the site: slowkarma.co.uk. Anyone arriving on another
 * of the band's domains (slowkarma.uk, with or without www) is sent to the
 * site's own address with a permanent redirect, keeping the path. On
 * WordPress.com the primary domain setting does this already; this covers
 * any host that doesn't.
 */
function sk_canonical_host() {
	$primary = wp_parse_url( home_url(), PHP_URL_HOST );
	// Only act when the site itself lives on slowkarma.co.uk, so a staging
	// copy on another domain never bounces away.
	if ( ! $primary || ! preg_match( '/(^|\.)slowkarma\.co\.uk$/', $primary ) ) {
		return;
	}
	$aliases = array( 'slowkarma.uk', 'www.slowkarma.uk', 'slowkarma.co.uk', 'www.slowkarma.co.uk' );
	$host    = isset( $_SERVER['HTTP_HOST'] ) ? strtolower( sanitize_text_field( wp_unslash( $_SERVER['HTTP_HOST'] ) ) ) : '';
	if ( $host === $primary || ! in_array( $host, $aliases, true ) ) {
		return;
	}
	$path = isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '/'; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
	wp_redirect( 'https://' . $primary . $path, 301 ); // phpcs:ignore WordPress.Security.SafeRedirect
	exit;
}
add_action( 'template_redirect', 'sk_canonical_host', 1 );
