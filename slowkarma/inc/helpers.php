<?php
/**
 * Template helpers: responsive images, lazy media embeds, icons.
 *
 * @package SlowKarma
 */

defined( 'ABSPATH' ) || exit;

/**
 * URL of a theme asset.
 *
 * @param string $path Path relative to assets/.
 */
function sk_asset( $path ) {
	return get_theme_file_uri( 'assets/' . ltrim( $path, '/' ) );
}

/**
 * Find all sizes generated for an image slug, e.g. "hero-main" =>
 * hero-main-800.webp, hero-main-1400.webp. Falls back to slug.webp.
 *
 * @param string $slug Image slug.
 * @return array<int,array{url:string,w:int,h:int}>
 */
function sk_img_sources( $slug ) {
	static $cache = array();
	if ( isset( $cache[ $slug ] ) ) {
		return $cache[ $slug ];
	}
	$dir   = get_theme_file_path( 'assets/img/' );
	$files = glob( $dir . $slug . '-[0-9]*.webp' );
	if ( ! $files && file_exists( $dir . $slug . '.webp' ) ) {
		$files = array( $dir . $slug . '.webp' );
	}
	$out = array();
	foreach ( (array) $files as $file ) {
		$size = @getimagesize( $file ); // phpcs:ignore WordPress.PHP.NoSilencedErrors
		if ( ! $size ) {
			continue;
		}
		$out[] = array(
			'url' => sk_asset( 'img/' . basename( $file ) ),
			'w'   => (int) $size[0],
			'h'   => (int) $size[1],
		);
	}
	usort(
		$out,
		function ( $a, $b ) {
			return $a['w'] - $b['w'];
		}
	);
	$cache[ $slug ] = $out;
	return $out;
}

/**
 * URL of the largest (or nearest to $want px wide) version of an image.
 *
 * @param string $slug Image slug.
 * @param int    $want Target width.
 */
function sk_img_url( $slug, $want = 1400 ) {
	$sources = sk_img_sources( $slug );
	if ( ! $sources ) {
		return '';
	}
	$pick = end( $sources );
	foreach ( $sources as $src ) {
		if ( $src['w'] >= $want ) {
			$pick = $src;
			break;
		}
	}
	return $pick['url'];
}

/**
 * Responsive <img> with width/height to prevent layout shift.
 *
 * @param string $slug  Image slug.
 * @param string $alt   Alt text ('' for decorative).
 * @param array  $args  sizes, class, eager, attrs.
 */
function sk_img( $slug, $alt = '', $args = array() ) {
	$args    = wp_parse_args(
		$args,
		array(
			'sizes' => '100vw',
			'class' => '',
			'eager' => false,
			'attrs' => '',
		)
	);
	$sources = sk_img_sources( $slug );
	if ( ! $sources ) {
		return '';
	}
	$largest = end( $sources );
	$srcset  = array();
	foreach ( $sources as $src ) {
		$srcset[] = esc_url( $src['url'] ) . ' ' . $src['w'] . 'w';
	}
	$default = $sources[ min( 1, count( $sources ) - 1 ) ];
	$loading = $args['eager'] ? 'fetchpriority="high"' : 'loading="lazy"';
	return sprintf(
		'<img src="%1$s" srcset="%2$s" sizes="%3$s" width="%4$d" height="%5$d" alt="%6$s" class="%7$s" decoding="async" %8$s %9$s>',
		esc_url( $default['url'] ),
		esc_attr( implode( ', ', $srcset ) ),
		esc_attr( $args['sizes'] ),
		$largest['w'],
		$largest['h'],
		esc_attr( $alt ),
		esc_attr( $args['class'] ),
		$loading,
		$args['attrs']
	);
}

/**
 * Inline style that sets an image as the knockout/parallax fill.
 *
 * @param string $slug Image slug.
 * @param int    $want Width to pick.
 */
function sk_fill_style( $slug, $want = 1400 ) {
	// A "-ko" version has its shadows lifted to the brand orange so the
	// letters always read against the dark background.
	if ( file_exists( get_theme_file_path( 'assets/img/' . $slug . '-ko.webp' ) ) ) {
		return '--fill:url(' . esc_url( sk_asset( 'img/' . $slug . '-ko.webp' ) ) . ')';
	}
	return '--fill:url(' . esc_url( sk_img_url( $slug, $want ) ) . ')';
}

/**
 * A YouTube player that loads nothing from YouTube until clicked.
 *
 * @param string $id    Video ID.
 * @param string $title Accessible title.
 * @param string $class Extra classes.
 */
function sk_youtube( $id, $title, $class = '' ) {
	$thumb = 'https://i.ytimg.com/vi_webp/' . rawurlencode( $id ) . '/hqdefault.webp';
	$maxq  = 'https://i.ytimg.com/vi_webp/' . rawurlencode( $id ) . '/maxresdefault.webp';
	ob_start();
	?>
	<div class="player player--video <?php echo esc_attr( $class ); ?>" data-yt="<?php echo esc_attr( $id ); ?>" data-title="<?php echo esc_attr( $title ); ?>">
		<img src="<?php echo esc_url( $thumb ); ?>" srcset="<?php echo esc_url( $thumb ); ?> 480w, <?php echo esc_url( $maxq ); ?> 1280w" sizes="(min-width: 900px) 60vw, 100vw" alt="" loading="lazy" decoding="async" width="480" height="360">
		<button type="button" class="player__play">
			<svg viewBox="0 0 64 64" aria-hidden="true" focusable="false"><circle cx="32" cy="32" r="31" /><path d="M26 20 46 32 26 44Z" /></svg>
			<span class="screen-reader-text"><?php echo esc_html( sprintf( 'Play video: %s', $title ) ); ?></span>
		</button>
		<a class="player__fallback" href="<?php echo esc_url( 'https://www.youtube.com/watch?v=' . $id ); ?>"><?php echo esc_html( sprintf( 'Watch %s on YouTube', $title ) ); ?></a>
	</div>
	<?php
	return ob_get_clean();
}

/**
 * A Spotify or Bandcamp player that loads when clicked.
 *
 * @param string $src    Embed URL.
 * @param string $title  Accessible title.
 * @param int    $height Iframe height.
 * @param string $label  Button label.
 * @param string $link   Fallback link.
 */
function sk_audio_embed( $src, $title, $height, $label, $link ) {
	ob_start();
	?>
	<div class="player player--audio" data-src="<?php echo esc_url( $src ); ?>" data-title="<?php echo esc_attr( $title ); ?>" data-height="<?php echo (int) $height; ?>" style="--h:<?php echo (int) $height; ?>px">
		<button type="button" class="player__load">
			<?php echo sk_icon( 'play' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
			<span><?php echo esc_html( $label ); ?></span>
		</button>
		<a class="player__fallback" href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $title ); ?></a>
	</div>
	<?php
	return ob_get_clean();
}

/**
 * Spotify embed for an album/track.
 *
 * @param string $type  album|track|artist.
 * @param string $id    Spotify ID.
 * @param string $title Title.
 * @param int    $h     Height.
 */
function sk_spotify( $type, $id, $title, $h = 352 ) {
	$src  = 'https://open.spotify.com/embed/' . $type . '/' . $id . '?utm_source=generator&theme=0';
	$link = 'https://open.spotify.com/' . $type . '/' . $id;
	return sk_audio_embed( $src, $title, $h, sprintf( 'Play %s on Spotify', $title ), $link );
}

/**
 * Bandcamp embed.
 *
 * @param string $kind  album|track.
 * @param string $id    Bandcamp numeric ID.
 * @param string $title Title.
 * @param string $link  Bandcamp page.
 * @param int    $h     Height.
 */
function sk_bandcamp( $kind, $id, $title, $link, $h = 470 ) {
	$tracklist = 'album' === $kind ? 'true' : 'false';
	$src       = 'https://bandcamp.com/EmbeddedPlayer/' . $kind . '=' . $id . '/size=large/bgcol=0f2628/linkcol=e57a2e/artwork=small/tracklist=' . $tracklist . '/transparent=true/';
	return sk_audio_embed( $src, $title, $h, sprintf( 'Play %s on Bandcamp', $title ), $link );
}

/**
 * Small inline SVG icons.
 *
 * @param string $name Icon name.
 */
function sk_icon( $name ) {
	$icons = array(
		'spotify'   => '<circle cx="12" cy="12" r="10.5" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M6.8 9.3c3.6-1 7.6-.7 10.6 1M7.4 12.4c3-.8 6.1-.5 8.6.9M8 15.3c2.4-.6 4.6-.4 6.6.7" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>',
		'apple'     => '<path d="M9 18.5a2.5 2.5 0 1 1-2.5-2.5H9V6.2l10-2.2v12.5a2.5 2.5 0 1 1-2.5-2.5H19" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="M9 9.5 19 7.3" stroke="currentColor" stroke-width="1.6"/>',
		'bandcamp'  => '<path d="M7.5 6h15l-6 12h-15Z" fill="currentColor"/>',
		'youtube'   => '<rect x="1.5" y="4.5" width="21" height="15" rx="4" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M10 8.8 15.5 12 10 15.2Z" fill="currentColor"/>',
		'instagram' => '<rect x="2.5" y="2.5" width="19" height="19" rx="5.5" fill="none" stroke="currentColor" stroke-width="1.6"/><circle cx="12" cy="12" r="4.3" fill="none" stroke="currentColor" stroke-width="1.6"/><circle cx="17.6" cy="6.4" r="1.2" fill="currentColor"/>',
		'mail'      => '<rect x="2" y="4.5" width="20" height="15" rx="2" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="m3 6 9 7 9-7" fill="none" stroke="currentColor" stroke-width="1.6"/>',
		'play'      => '<path d="M7 4.5 19.5 12 7 19.5Z" fill="currentColor"/>',
		'download'  => '<path d="M12 3v12m-5-5 5 5 5-5M4 20h16" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>',
	);
	if ( ! isset( $icons[ $name ] ) ) {
		return '';
	}
	return '<svg class="icon icon--' . esc_attr( $name ) . '" viewBox="0 0 24 24" width="24" height="24" aria-hidden="true" focusable="false">' . $icons[ $name ] . '</svg>';
}

/**
 * List of streaming/social links.
 *
 * @param string $class Extra class.
 * @param array  $only  Keys to include.
 */
function sk_link_list( $class = '', $only = array() ) {
	$links = sk_links();
	if ( $only ) {
		$links = array_intersect_key( $links, array_flip( $only ) );
	}
	$out = '<ul class="links ' . esc_attr( $class ) . '">';
	foreach ( $links as $key => $link ) {
		$out .= sprintf(
			'<li><a href="%1$s" rel="me noopener" target="_blank">%2$s<span>%3$s</span></a></li>',
			esc_url( $link['url'] ),
			sk_icon( $key ),
			esc_html( $link['label'] )
		);
	}
	return $out . '</ul>';
}

/**
 * Knockout display title: big type filled with a photo.
 *
 * @param string $text  Title text.
 * @param string $slug  Image slug for the fill.
 * @param string $tag   Heading tag.
 * @param string $class Extra class.
 */
function sk_knockout( $text, $slug, $tag = 'h2', $class = '' ) {
	$tag = in_array( $tag, array( 'h1', 'h2', 'h3', 'p' ), true ) ? $tag : 'h2';
	return sprintf(
		'<%1$s class="knockout %2$s" style="%3$s" data-parallax-fill>%4$s</%1$s>',
		$tag,
		esc_attr( $class ),
		esc_attr( sk_fill_style( $slug ) ),
		esc_html( $text )
	);
}

/**
 * Permalink of a page by slug, with a fallback.
 *
 * @param string $slug Page slug.
 */
function sk_page_url( $slug ) {
	$page = get_page_by_path( $slug );
	return $page ? get_permalink( $page ) : home_url( '/' . $slug . '/' );
}

/**
 * Release card markup.
 *
 * @param array $r Release.
 */
function sk_release_card( $r ) {
	ob_start();
	?>
	<li class="release">
		<a class="release__link" href="<?php echo esc_url( $r['bandcamp'] ); ?>" target="_blank" rel="noopener">
			<?php echo sk_img( $r['cover'], '', array( 'sizes' => '(min-width: 1100px) 22vw, (min-width: 640px) 30vw, 45vw', 'class' => 'release__cover' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
			<span class="release__title"><?php echo esc_html( $r['title'] ); ?></span>
			<?php if ( $r['with'] ) : ?>
				<span class="release__with">with <?php echo esc_html( $r['with'] ); ?></span>
			<?php endif; ?>
			<span class="release__meta"><?php echo esc_html( $r['type'] . ', ' . $r['year'] ); ?></span>
		</a>
	</li>
	<?php
	return ob_get_clean();
}

/**
 * Page header: big knockout title beside columns of photos that drift
 * at different speeds as the page scrolls.
 *
 * @param array $args title, fill, photos (slugs), intro, aside (array of lines), class.
 */
function sk_page_hero( $args ) {
	$args   = wp_parse_args(
		$args,
		array(
			'title'  => '',
			'fill'   => 'lr-stage-wide',
			'photos' => array(),
			'intro'  => '',
			'aside'  => array(),
			'class'  => '',
			'cover'  => false,
		)
	);
	$photos = array_values( $args['photos'] );
	$cols   = array( array(), array(), array() );
	foreach ( $photos as $i => $p ) {
		$cols[ $i % 3 ][] = $p;
	}
	$words = preg_split( '/\s+/', $args['title'] );
	ob_start();
	?>
	<header class="mosaic-hero <?php echo esc_attr( $args['class'] ); ?>">
		<div class="mosaic-hero__text">
			<h1 class="knockout mosaic-hero__title" style="<?php echo esc_attr( sk_fill_style( $args['fill'] ) ); ?>" data-parallax-fill>
				<?php foreach ( $words as $w ) : ?>
					<span><?php echo esc_html( $w ); ?></span>
				<?php endforeach; ?>
			</h1>
			<?php if ( $args['intro'] ) : ?>
				<p class="mosaic-hero__intro"><?php echo wp_kses_post( $args['intro'] ); ?></p>
			<?php endif; ?>
			<?php if ( $args['aside'] ) : ?>
				<ul class="mosaic-hero__aside">
					<?php foreach ( $args['aside'] as $line ) : ?>
						<li><?php echo wp_kses_post( $line ); ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
		<div class="mosaic-hero__photos<?php echo $args['cover'] ? ' mosaic-hero__photos--covers' : ''; ?>" aria-hidden="true">
			<?php foreach ( $cols as $ci => $col ) : ?>
				<div class="mosaic-col" data-drift="<?php echo esc_attr( array( '-0.12', '0.1', '-0.22' )[ $ci ] ); ?>">
					<?php foreach ( $col as $j => $p ) : ?>
						<?php echo sk_img( $p, '', array( 'sizes' => '(min-width: 900px) 20vw, 40vw', 'eager' => ( 0 === $j && 0 === $ci ) ) ); // phpcs:ignore ?>
					<?php endforeach; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</header>
	<?php
	return ob_get_clean();
}

/**
 * Photo reel: a row of large photos that moves sideways as you scroll
 * down. Falls back to a swipeable row on touch screens and for reduced
 * motion.
 *
 * @param string $title Heading.
 * @param array  $items Arrays of slug, alt.
 * @param string $note  Small line under the heading.
 */
function sk_reel( $title, $items, $note = '' ) {
	ob_start();
	?>
	<section class="reel" data-reel aria-label="<?php echo esc_attr( $title ); ?>">
		<div class="reel__sticky">
			<div class="reel__head wrap">
				<h2 class="h-section"><?php echo esc_html( $title ); ?></h2>
				<?php if ( $note ) : ?>
					<p class="reel__note"><?php echo esc_html( $note ); ?></p>
				<?php endif; ?>
			</div>
			<ul class="reel__track" data-reel-track>
				<?php foreach ( $items as $it ) : ?>
					<li><?php echo sk_img( $it[0], $it[1], array( 'sizes' => '(min-width: 900px) 50vw, 85vw' ) ); // phpcs:ignore ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>
	<?php
	return ob_get_clean();
}

/**
 * A collaborator's name, linked to their site if we have one.
 *
 * @param string $name Name.
 */
function sk_person( $name ) {
	$links = sk_people_links();
	if ( empty( $links[ $name ] ) ) {
		return esc_html( $name );
	}
	return sprintf( '<a class="person" href="%1$s" target="_blank" rel="noopener">%2$s</a>', esc_url( $links[ $name ] ), esc_html( $name ) );
}
