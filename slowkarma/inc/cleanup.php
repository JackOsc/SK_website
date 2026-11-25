<?php
/**
 * Housekeeping: keep WordPress's starter content and user details out of
 * search, tidy the sitemap, send basic security headers, and mark the
 * site as British English.
 *
 * @package SlowKarma
 */

defined( 'ABSPATH' ) || exit;

/**
 * Slugs of the content WordPress creates on install. If they are still
 * published they are kept out of search and the sitemap. Deleting them in
 * the dashboard is still the tidy fix.
 */
function sk_starter_slugs() {
	return array( 'hello-world', 'sample-page' );
}

/**
 * Is this request one of the starter pages, the empty "Uncategorized"
 * archive, or another archive nobody should land on from search?
 */
function sk_is_starter_request() {
	if ( is_singular() ) {
		return in_array( get_post_field( 'post_name', get_queried_object_id() ), sk_starter_slugs(), true );
	}
	return is_category( 'uncategorized' ) || is_date() || is_tag() || is_search();
}

/**
 * noindex for starter content and thin archives.
 *
 * @param array $robots Robots directives.
 */
function sk_robots( $robots ) {
	if ( sk_is_starter_request() ) {
		$robots['noindex'] = true;
		$robots['follow']  = true;
	}
	return $robots;
}
add_filter( 'wp_robots', 'sk_robots' );

/**
 * Author archives only repeat the site and show the login name, so send
 * them home.
 */
function sk_no_author_archives() {
	if ( is_author() ) {
		wp_safe_redirect( home_url( '/' ), 301 );
		exit;
	}
}
add_action( 'template_redirect', 'sk_no_author_archives', 1 );

/**
 * Sitemap: no users list, no category/tag archives.
 *
 * @param WP_Sitemaps_Provider $provider Provider.
 * @param string               $name     Provider name.
 */
function sk_sitemap_providers( $provider, $name ) {
	return 'users' === $name ? false : $provider;
}
add_filter( 'wp_sitemaps_add_provider', 'sk_sitemap_providers', 10, 2 );

/**
 * Drop category and tag archives from the sitemap.
 *
 * @param array $taxonomies Taxonomies.
 */
function sk_sitemap_taxonomies( $taxonomies ) {
	unset( $taxonomies['category'], $taxonomies['post_tag'] );
	return $taxonomies;
}
add_filter( 'wp_sitemaps_taxonomies', 'sk_sitemap_taxonomies' );

/**
 * Leave the starter post and page out of the sitemap.
 *
 * @param array  $args      Query args.
 * @param string $post_type Post type.
 */
function sk_sitemap_posts( $args, $post_type ) {
	$ids = get_posts(
		array(
			'post_type'      => $post_type,
			'post_name__in'  => sk_starter_slugs(),
			'fields'         => 'ids',
			'posts_per_page' => 10,
		)
	);
	if ( $ids ) {
		$args['post__not_in'] = array_merge( isset( $args['post__not_in'] ) ? (array) $args['post__not_in'] : array(), $ids );
	}
	return $args;
}
add_filter( 'wp_sitemaps_posts_query_args', 'sk_sitemap_posts', 10, 2 );

/**
 * The REST API's user list shows login names to anyone. Only signed-in
 * people (the editor uses it) get it.
 *
 * @param mixed           $result  Response so far.
 * @param WP_REST_Server  $server  Server.
 * @param WP_REST_Request $request Request.
 */
function sk_rest_users( $result, $server, $request ) {
	if ( 0 === strpos( $request->get_route(), '/wp/v2/users' ) && ! is_user_logged_in() ) {
		return new WP_Error( 'rest_forbidden', 'Not available.', array( 'status' => 401 ) );
	}
	return $result;
}
add_filter( 'rest_pre_dispatch', 'sk_rest_users', 10, 3 );

/**
 * Basic security headers on every page, and no PHP version banner.
 */
function sk_security_headers() {
	if ( headers_sent() ) {
		return;
	}
	header_remove( 'X-Powered-By' );
	header( 'X-Content-Type-Options: nosniff' );
	header( 'Referrer-Policy: strict-origin-when-cross-origin' );
	header( 'X-Frame-Options: SAMEORIGIN' );
	header( 'Permissions-Policy: camera=(), microphone=(), geolocation=()' );
}
add_action( 'send_headers', 'sk_security_headers' );

/**
 * Mark pages as British English (lang="en-GB") whatever the WordPress
 * language setting says.
 *
 * @param string $output Attributes.
 */
function sk_language_attributes( $output ) {
	return preg_replace( '/lang="en(-[A-Za-z]+)?"/', 'lang="en-GB"', $output );
}
add_filter( 'language_attributes', 'sk_language_attributes' );
