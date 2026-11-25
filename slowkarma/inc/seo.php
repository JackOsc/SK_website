<?php
/**
 * SEO: titles, descriptions, canonical, Open Graph, structured data.
 *
 * Stands down automatically if Yoast, Rank Math or Jetpack SEO tools are
 * printing their own tags, so nothing is duplicated.
 *
 * @package SlowKarma
 */

defined( 'ABSPATH' ) || exit;

/**
 * Is another SEO plugin handling meta tags?
 */
function sk_seo_plugin_active() {
	return defined( 'WPSEO_VERSION' ) || defined( 'RANK_MATH_VERSION' ) || defined( 'SEOPRESS_VERSION' ) || ( class_exists( 'Jetpack' ) && method_exists( 'Jetpack', 'is_module_active' ) && Jetpack::is_module_active( 'seo-tools' ) );
}

/**
 * Meta for the current request.
 */
function sk_current_meta() {
	$all  = sk_page_meta();
	$slug = '';
	if ( is_front_page() ) {
		$slug = '';
	} elseif ( sk_current_slug() ) {
		$slug = sk_current_slug();
	} elseif ( is_page() ) {
		$slug = get_post_field( 'post_name', get_queried_object_id() );
	} else {
		$slug = null;
	}
	$meta = ( null !== $slug && isset( $all[ $slug ] ) ) ? $all[ $slug ] : array();
	if ( ! $meta ) {
		$meta = array(
			'title' => wp_get_document_title(),
			'desc'  => $all['']['desc'],
		);
		if ( is_singular() && has_excerpt() ) {
			$meta['desc'] = wp_strip_all_tags( get_the_excerpt() );
		}
	}
	$meta['image'] = sk_asset( 'img/' . ( isset( $meta['image'] ) ? $meta['image'] : 'og-default.jpg' ) );
	return $meta;
}

/**
 * Document title.
 *
 * @param string $title Title.
 */
function sk_title( $title ) {
	if ( sk_seo_plugin_active() ) {
		return $title;
	}
	$all = sk_page_meta();
	if ( is_front_page() ) {
		return $all['']['title'];
	}
	if ( sk_current_slug() || is_page() ) {
		$slug = sk_current_slug() ? sk_current_slug() : get_post_field( 'post_name', get_queried_object_id() );
		if ( isset( $all[ $slug ] ) ) {
			return $all[ $slug ]['title'] . ' | Slow Karma';
		}
	}
	return $title;
}
add_filter( 'pre_get_document_title', 'sk_title' );

/**
 * Head tags.
 */
function sk_head_meta() {
	if ( sk_seo_plugin_active() || is_404() ) {
		return;
	}
	$meta = sk_current_meta();
	$url  = is_front_page() ? home_url( '/' ) : ( sk_current_slug() ? sk_page_url( sk_current_slug() ) : ( is_singular() ? get_permalink() : '' ) );
	$out  = array();

	$out[] = sprintf( '<meta name="description" content="%s">', esc_attr( $meta['desc'] ) );
	if ( $url && ! has_action( 'wp_head', 'rel_canonical' ) ) {
		$out[] = sprintf( '<link rel="canonical" href="%s">', esc_url( $url ) );
	}
	$out[] = '<meta property="og:type" content="' . ( is_front_page() ? 'music.musician' : 'website' ) . '">';
	$out[] = '<meta property="og:site_name" content="Slow Karma">';
	$out[] = '<meta property="og:locale" content="en_GB">';
	$out[] = sprintf( '<meta property="og:title" content="%s">', esc_attr( wp_get_document_title() ) );
	$out[] = sprintf( '<meta property="og:description" content="%s">', esc_attr( $meta['desc'] ) );
	if ( $url ) {
		$out[] = sprintf( '<meta property="og:url" content="%s">', esc_url( $url ) );
	}
	$out[] = sprintf( '<meta property="og:image" content="%s">', esc_url( $meta['image'] ) );
	$out[] = '<meta property="og:image:width" content="1200"><meta property="og:image:height" content="630">';
	$out[] = sprintf( '<meta property="og:image:alt" content="%s">', esc_attr( isset( $meta['alt'] ) ? $meta['alt'] : 'Slow Karma, photographed in Leith' ) );
	$out[] = '<meta name="twitter:card" content="summary_large_image">';
	$out[] = '<meta name="theme-color" content="#0f2628">';
	echo implode( "\n", $out ) . "\n"; // phpcs:ignore WordPress.Security.EscapeOutput
}
add_action( 'wp_head', 'sk_head_meta', 3 );

/**
 * Favicons (only if the site has no Site Icon set).
 */
function sk_icons() {
	if ( has_site_icon() ) {
		return;
	}
	printf( '<link rel="icon" href="%s" sizes="32x32">' . "\n", esc_url( sk_asset( 'img/icon-32.png' ) ) );
	printf( '<link rel="apple-touch-icon" href="%s">' . "\n", esc_url( sk_asset( 'img/icon-180.png' ) ) );
}
add_action( 'wp_head', 'sk_icons', 4 );

/**
 * JSON-LD structured data: the band, the website, and page specifics.
 */
function sk_schema() {
	if ( is_404() ) {
		return;
	}
	$home  = home_url( '/' );
	$links = wp_list_pluck( sk_links(), 'url' );
	$band  = array(
		'@type'         => 'MusicGroup',
		'@id'           => $home . '#band',
		'name'          => 'Slow Karma',
		'url'           => $home,
		'logo'          => sk_asset( 'press/slow-karma-logo-orange.png' ),
		'image'         => sk_asset( 'img/og-default.jpg' ),
		'description'   => 'Edinburgh band blending jazz chops, punk ethos and high production, with an extended family of Scotland\'s most exciting musicians.',
		'foundingDate'  => '2024',
		'foundingLocation' => array(
			'@type' => 'Place',
			'name'  => 'Leith, Edinburgh, Scotland',
		),
		'genre'         => array( 'Jazz', 'Spiritual jazz', 'UK garage', 'Breakbeat', 'Hip hop' ),
		'email'         => 'mailto:' . sk_contact()['email'],
		'sameAs'        => array_values( $links ),
		'member'        => array(),
	);
	foreach ( sk_members() as $m ) {
		$entry = array(
			'@type'  => 'OrganizationRole',
			'member' => array(
				'@type' => 'Person',
				'name'  => $m['name'],
			),
		);
		if ( $m['role'] ) {
			$entry['roleName'] = $m['role'];
		}
		$band['member'][] = $entry;
	}

	$graph = array(
		$band,
		array(
			'@type'     => 'WebSite',
			'@id'       => $home . '#site',
			'url'       => $home,
			'name'      => 'Slow Karma',
			'publisher' => array( '@id' => $home . '#band' ),
			'inLanguage' => 'en-GB',
		),
	);

	if ( sk_is( 'music' ) || is_front_page() ) {
		foreach ( sk_releases() as $r ) {
			$item = array(
				'@type'    => 'album' === strtolower( substr( $r['type'], -5 ) ) ? 'MusicAlbum' : 'MusicRecording',
				'name'     => $r['title'],
				'byArtist' => array( '@id' => $home . '#band' ),
				'url'      => $r['bandcamp'],
				'image'    => sk_img_url( $r['cover'], 400 ),
				'datePublished' => $r['date'],
			);
			$graph[] = $item;
			if ( is_front_page() ) {
				break;
			}
		}
	}

	if ( sk_current_slug() ) {
		$graph[] = array(
			'@type'           => 'BreadcrumbList',
			'itemListElement' => array(
				array(
					'@type'    => 'ListItem',
					'position' => 1,
					'name'     => 'Home',
					'item'     => $home,
				),
				array(
					'@type'    => 'ListItem',
					'position' => 2,
					'name'     => sk_required_pages()[ sk_current_slug() ],
					'item'     => sk_page_url( sk_current_slug() ),
				),
			),
		);
	}

	if ( sk_is( 'videos' ) ) {
		$list = array();
		foreach ( sk_videos() as $group ) {
			foreach ( $group['videos'] as $v ) {
				if ( empty( $v[4] ) ) {
					continue;
				}
				$list[] = array(
					'@type'        => 'VideoObject',
					'name'         => 'Slow Karma - ' . $v[1],
					'description'  => $v[3] ? $v[3] : $v[1] . ' by Slow Karma.',
					'thumbnailUrl' => 'https://i.ytimg.com/vi/' . rawurlencode( $v[0] ) . '/hqdefault.jpg',
					'uploadDate'   => $v[4],
					'duration'     => sk_iso_duration( $v[2] ),
					'embedUrl'     => 'https://www.youtube.com/embed/' . rawurlencode( $v[0] ),
					'url'          => 'https://www.youtube.com/watch?v=' . rawurlencode( $v[0] ),
					'publisher'    => array( '@id' => $home . '#band' ),
				);
			}
		}
		if ( $list ) {
			$items = array();
			foreach ( $list as $i => $video ) {
				$items[] = array(
					'@type'    => 'ListItem',
					'position' => $i + 1,
					'item'     => $video,
				);
			}
			$graph[] = array(
				'@type'           => 'ItemList',
				'name'            => 'Slow Karma videos',
				'itemListElement' => $items,
			);
		}
	}

	$data = array(
		'@context' => 'https://schema.org',
		'@graph'   => $graph,
	);
	echo '<script type="application/ld+json">' . wp_json_encode( $data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n"; // phpcs:ignore WordPress.Security.EscapeOutput
}
add_action( 'wp_head', 'sk_schema', 20 );

/**
 * "4:26" or "1:01:50" as an ISO 8601 duration (PT4M26S).
 *
 * @param string $length Length as shown on the page.
 */
function sk_iso_duration( $length ) {
	$parts = array_map( 'intval', explode( ':', $length ) );
	while ( count( $parts ) < 3 ) {
		array_unshift( $parts, 0 );
	}
	list( $h, $m, $s ) = $parts;
	return 'PT' . ( $h ? $h . 'H' : '' ) . ( $m ? $m . 'M' : '' ) . $s . 'S';
}
