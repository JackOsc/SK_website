<?php
/**
 * Season One: Tell Them Slow Karma Sent You.
 *
 * @package SlowKarma
 */

get_header();

$sk_s1 = array_values(
	array_filter(
		sk_releases(),
		function ( $r ) {
			return 1 === $r['season'] && 'Live album' !== $r['type'];
		}
	)
);
usort(
	$sk_s1,
	function ( $a, $b ) {
		return strcmp( $a['date'], $b['date'] );
	}
);
?>

<header class="page-hero">
	<div class="wrap">
		<img class="s1-mark" src="<?php echo esc_url( sk_img_url( 's1-wavy-logo' ) ); ?>" width="700" height="700" alt="Slow Karma Season One wavy logo">
		<h1 class="knockout page-hero__title" style="<?php echo esc_attr( sk_fill_style( 'vr-crowd-smile' ) ); ?>" data-parallax-fill>Season One</h1>
		<div class="page-hero__intro">
			<p class="lede">Tell Them Slow Karma Sent You. The joyful collisions and unexpected harmonies of a band&rsquo;s first wild steps, from the first single in early 2024 to a sold-out Voodoo Rooms in March 2025.</p>
			<div class="page-hero__aside">
				<p>2024 to March 2025</p>
				<p>Ten singles, a live album and a concert film</p>
				<p>Finale: The Voodoo Rooms, Edinburgh, <?php echo esc_html( sk_finales()[1]['when'] ); ?></p>
			</div>
		</div>
	</div>
</header>

<section class="section">
	<div class="wrap split split--center">
		<div class="prose">
			<h2 class="h-display" style="margin-bottom:1.5rem">A stick of incense in one hand. A stick of dynamite in the other.</h2>
			<p>Season One was about finding out what this band could be. We released every track as a &ldquo;loosie&rdquo;: a single with full support, its own video and its own campaign. Each one brought in someone new. Dara Dubh&rsquo;s harp on <em>Still Here</em>. Loam on <em>Fast Money</em>. Sithu Aye on <em>Sober</em>. Emma Jane Lloyd and Justyna Jablonska&rsquo;s strings on <em>Ride Out</em>. Jurnalist&rsquo;s bars on <em>Price Check</em>.</p>
			<p>Spiritual and explosive, meditative and unruly. Underground spirit, stadium vision.</p>
		</div>
		<div class="split__media">
			<?php echo sk_img( 's1-art', 'Season One artwork: Tell Them Slow Karma Sent You', array( 'sizes' => '(min-width: 900px) 50vw, 100vw' ) ); // phpcs:ignore ?>
		</div>
	</div>
</section>

<section class="section section--alt" aria-labelledby="film-title">
	<div class="wrap">
		<div class="video-lead">
			<?php echo sk_youtube( 'UXPGUexqhyo', 'Tell Them Slow Karma Sent You: Season One finale concert film' ); // phpcs:ignore ?>
			<div>
				<h2 id="film-title" class="h-section">The finale</h2>
				<p>On <?php echo esc_html( sk_finales()[1]['when'] ); ?> we sold out the Voodoo Rooms with fourteen musicians on stage, and filmed the whole thing. This is the night, start to finish.</p>
				<p class="voice" style="color:var(--accent)">A very special evening.</p>
			</div>
		</div>
	</div>
</section>

<section class="section" aria-labelledby="album-title">
	<div class="wrap split">
		<div>
			<h2 id="album-title" class="h-section">The live album</h2>
			<p>The whole night, recorded live by Laurie Corlett-Donald and produced by David Lloyd and Jack Elliot.</p>
			<ul class="cta-row">
				<li><a class="btn btn--solid" href="https://open.spotify.com/album/3K4C71GZkeWYCMVRhsueW7" target="_blank" rel="noopener"><?php echo sk_icon( 'spotify' ); // phpcs:ignore ?>Spotify</a></li>
				<li><a class="btn" href="https://slowkarma.bandcamp.com/album/tell-them-slow-karma-sent-you-live-at-voodoo-rooms" target="_blank" rel="noopener"><?php echo sk_icon( 'bandcamp' ); // phpcs:ignore ?>Bandcamp</a></li>
				<li><a class="btn" href="<?php echo esc_url( sk_links()['apple']['url'] ); ?>" target="_blank" rel="noopener"><?php echo sk_icon( 'apple' ); // phpcs:ignore ?>Apple Music</a></li>
			</ul>
			<div class="poster" style="margin-top:2.5rem;max-width:340px">
				<?php echo sk_img( 's1-poster', 'Poster for Slow Karma live at the Voodoo Rooms, 29 March 2025', array( 'sizes' => '340px' ) ); // phpcs:ignore ?>
			</div>
		</div>
		<div>
			<?php echo sk_spotify( 'album', '3K4C71GZkeWYCMVRhsueW7', 'Tell Them Slow Karma Sent You (Live at Voodoo Rooms)', 552 ); // phpcs:ignore ?>
		</div>
	</div>
</section>

<section class="section section--alt" aria-labelledby="photos-title">
	<div class="wrap">
		<h2 id="photos-title" class="h-section">On the night</h2>
		<ul class="gallery">
			<li class="g-wide"><?php echo sk_img( 'vr-crowd-smile', 'The crowd at the Voodoo Rooms', array( 'sizes' => '(min-width: 700px) 66vw, 100vw' ) ); // phpcs:ignore ?></li>
			<li><?php echo sk_img( 'vr-jurnalist', 'Jurnalist on the mic', array( 'sizes' => '(min-width: 700px) 33vw, 50vw' ) ); // phpcs:ignore ?></li>
			<li><?php echo sk_img( 'vr-band-keys', 'The band in full flow', array( 'sizes' => '(min-width: 700px) 33vw, 50vw' ) ); // phpcs:ignore ?></li>
			<li><?php echo sk_img( 'vr-keys-hands', 'Keys', array( 'sizes' => '(min-width: 700px) 33vw, 50vw' ) ); // phpcs:ignore ?></li>
			<li><?php echo sk_img( 'vr-kyle-perc', 'Percussion', array( 'sizes' => '(min-width: 700px) 33vw, 50vw' ) ); // phpcs:ignore ?></li>
			<li><?php echo sk_img( 'vr-guitars', 'Guitars', array( 'sizes' => '(min-width: 700px) 33vw, 50vw' ) ); // phpcs:ignore ?></li>
			<li class="g-wide"><?php echo sk_img( 'vr-crowd', 'A full room at the Voodoo Rooms', array( 'sizes' => '(min-width: 700px) 66vw, 100vw' ) ); // phpcs:ignore ?></li>
		</ul>
	</div>
</section>

<section class="section" aria-labelledby="singles-title">
	<div class="wrap">
		<div class="section-head">
			<h2 id="singles-title" class="h-section">The singles</h2>
			<p class="voice" style="margin:0;color:var(--muted)">In the order they came out</p>
		</div>
		<ul class="release-grid">
			<?php
			foreach ( $sk_s1 as $sk_r ) {
				echo sk_release_card( $sk_r ); // phpcs:ignore
			}
			?>
		</ul>
	</div>
</section>

<section class="section section--alt" aria-labelledby="credits-title">
	<div class="wrap">
		<h2 id="credits-title" class="h-section">Credits</h2>
		<?php get_template_part( 'template-parts/finale-credits', null, array( 'season' => 1 ) ); ?>
	</div>
</section>

<section class="section section--tight">
	<div class="wrap section-head" style="margin:0">
		<p class="lede" style="margin:0">Then the wheel turned.</p>
		<a class="text-link" href="<?php echo esc_url( sk_page_url( 'season-two' ) ); ?>">Season Two</a>
	</div>
</section>

<?php
sk_editor_content();
get_footer();
