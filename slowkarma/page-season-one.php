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

echo sk_page_hero( // phpcs:ignore
	array(
		'title'  => 'Season One',
		'fill'   => 'vr-singer',
		'photos' => array( 'vr-harp', 'vr-cello', 'vr-bass-green', 'vr-keys-blue', 'vr-perc-smile', 'vr-drums', 'vr-bass-vocal', 'vr-crowd-wide' ),
		'intro'  => 'Tell Them Slow Karma Sent You. From our first single in 2024 to a sold-out Voodoo Rooms in March 2025.',
		'aside'  => array( 'Ten singles', 'A live album and concert film', 'Voodoo Rooms, Edinburgh, ' . esc_html( sk_finales()[1]['when'] ) ),
		'class'  => 'mosaic-hero--s1',
	)
);
?>

<section class="section" aria-labelledby="film-title">
	<div class="wrap">
		<div class="video-lead">
			<?php echo sk_youtube( 'UXPGUexqhyo', 'Tell Them Slow Karma Sent You: Season One finale concert film' ); // phpcs:ignore ?>
			<div>
				<h2 id="film-title" class="h-section">The finale</h2>
				<p>On <?php echo esc_html( sk_finales()[1]['when'] ); ?> we sold out the Voodoo Rooms with 14 musicians on stage. Asking people to come out is a big ask, so we wanted it to be a real spectacle. We filmed and recorded the whole night.</p>
				<ul class="cta-row">
					<li><a class="btn btn--solid" href="https://open.spotify.com/album/3K4C71GZkeWYCMVRhsueW7" target="_blank" rel="noopener"><?php echo sk_icon( 'spotify' ); // phpcs:ignore ?>Live album</a></li>
					<li><a class="btn" href="https://slowkarma.bandcamp.com/album/tell-them-slow-karma-sent-you-live-at-voodoo-rooms" target="_blank" rel="noopener"><?php echo sk_icon( 'bandcamp' ); // phpcs:ignore ?>Bandcamp</a></li>
				</ul>
			</div>
		</div>
	</div>
</section>


<section class="section section--alt" aria-labelledby="art-title">
	<div class="wrap split split--center">
		<div class="split__media">
			<?php echo sk_img( 's1-art', 'Season One artwork: Tell Them Slow Karma Sent You', array( 'sizes' => '(min-width: 900px) 50vw, 100vw' ) ); // phpcs:ignore ?>
		</div>
		<div class="prose">
			<img class="s1-mark" src="<?php echo esc_url( sk_img_url( 's1-wavy-logo' ) ); ?>" width="700" height="700" alt="Slow Karma Season One wavy logo" loading="lazy">
			<h2 id="art-title" class="h-section">Incense and dynamite</h2>
			<p>Every track came out as a single with its own video, and each one brought someone new into the family. Dara Dubh's harp on <em>Still Here</em>. Sithu Aye on <em>Sober</em>. Emma Jane Lloyd and Justyna Jablonska on <em>Ride Out</em>. Jurnalist on <em>Price Check</em>, where he just smashed it.</p>
		</div>
	</div>
</section>

<section class="section" aria-labelledby="first-five-title">
	<div class="wrap split split--center">
		<?php echo sk_gilt_portrait( 'member-jmf', 'Jack McKay Fletcher, smiling, at a candlelit table', 'Jack McKay Fletcher, percussion' ); // phpcs:ignore ?>
		<div class="prose">
			<h2 id="first-five-title" class="h-section">The first five</h2>
			<p class="lede">Season One was the first line-up: Jack Elliot, Kyle Grieve, David Lloyd, Callum Stevenson and Jack McKay Fletcher.</p>
			<p>JMF was our percussionist, and the beating heart and smile of Slow Karma.</p>
			<p>The music went all over the place, in a good way. Every single took its own twists and turns, often ones we didn't see coming.</p>
		</div>
	</div>
</section>

<section class="section section--alt" aria-labelledby="singles-title">
	<div class="wrap">
		<div class="section-head">
			<h2 id="singles-title" class="h-section">The singles</h2>
			<p class="reel__note">In order of release</p>
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

<section class="section section--paper section--tight" aria-label="Press">
	<div class="wrap press-link">
		<p class="press-link__source">The Skinny, July 2025</p>
		<a class="press-link__title" href="https://www.theskinny.co.uk/music/interviews/spotlight-on-slow-karma" target="_blank" rel="noopener">Spotlight On... Slow Karma</a>
		<p>Jack and Dave on the extended family, putting 14 musicians on one stage, and Edinburgh's jazz community.</p>
	</div>
</section>

<section class="section credits-wrap" aria-labelledby="credits-title">
	<div class="wrap">
		<h2 id="credits-title" class="h-section credits-wrap__title">Credits</h2>
		<?php get_template_part( 'template-parts/finale-credits', null, array( 'season' => 1 ) ); ?>
	</div>
</section>

<?php
echo sk_reel( // phpcs:ignore
	'On the night',
	array(
		array( 'vr-crowd-smile', 'The crowd at the Voodoo Rooms' ),
		array( 'vr-singer', 'Jurnalist on the mic under the Voodoo Rooms ceiling' ),
		array( 'vr-strings', 'Emma Jane Lloyd and Justyna Jablonska on strings' ),
		array( 'vr-band-keys', 'The band in full flow' ),
		array( 'vr-guitars', 'Guitars' ),
		array( 'vr-crowd', 'A full room' ),
	),
	'Voodoo Rooms, Edinburgh, ' . sk_finales()[1]['when']
);
?>

<section class="section section--alt section--tight">
	<div class="wrap section-head" style="margin:0">
		<p class="lede" style="margin:0">Next came the Liquid Room.</p>
		<a class="text-link" href="<?php echo esc_url( sk_page_url( 'season-two' ) ); ?>">Season Two</a>
	</div>
</section>

<?php
sk_editor_content();
get_footer();
