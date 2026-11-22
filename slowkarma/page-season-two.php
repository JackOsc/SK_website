<?php
/**
 * Season Two: The Liquid Room.
 *
 * @package SlowKarma
 */

get_header();

$sk_run = sk_season_two_run();
$sk_out = count(
	array_filter(
		$sk_run,
		function ( $r ) {
			return $r['out'];
		}
	)
);

echo sk_page_hero( // phpcs:ignore
	array(
		'title'  => 'Season Two',
		'fill'   => 'lr-bass-vocal',
		'photos' => array( 'lr-dara-harp', 'lr-guitar-vocal', 'lr-violin', 'lr-crowd', 'lr-vocal-duo', 'lr-keys-bass', 'lr-congas-lamp', 'lr-guitar-lights', 'lr-vocal-close', 'lr-band-bow', 'lr-crowd-seated', 'lr-line-up' ),
		'intro'  => 'The Liquid Room. A new set, eleven guests and a film crew, then back into the studio to make the records.',
		'aside'  => array( 'The Liquid Room, Edinburgh, ' . esc_html( sk_finales()[2]['when'] ), 'Studio versions out now', 'First release: Twin' ),
	)
);
?>

<section class="section" aria-labelledby="how-title">
	<div class="wrap split">
		<div>
			<h2 id="how-title" class="h-section">We did something a little crazy</h2>
			<ol class="steps">
				<li><span>We booked the Liquid Room, an iconic 700-cap room, a year out. We had no idea if we could sell anything like that.</span></li>
				<li><span>We wrote a whole new set for the show. All new material, all untested. Loads of guests, loads of improv.</span></li>
				<li><span>We hired an incredible crew to record and film the whole night.</span></li>
				<li><span>We used the recordings as demos and took them back into the studio.</span></li>
				<li><span><em>Twin</em> is the first of the studio versions. It's the best thing we've ever made.</span></li>
			</ol>
		</div>
		<div class="poster">
			<?php echo sk_img( 's2-poster', 'Poster for Slow Karma at the Liquid Room, Edinburgh, 21 March 2026', array( 'sizes' => '(min-width: 900px) 40vw, 100vw' ) ); // phpcs:ignore ?>
		</div>
	</div>
</section>

<section class="section section--alt" aria-labelledby="twin-title">
	<div class="wrap">
		<div class="video-lead">
			<?php echo sk_youtube( '-nSLUTwDvPc', 'Slow Karma, Twin' ); // phpcs:ignore ?>
			<div>
				<p class="kicker">Out now</p>
				<h2 id="twin-title" class="h-section">Twin</h2>
				<p>Jazz chops, punk energy and UK dancefloor rhythms. Played and filmed live in one take at LOSTOSC.</p>
				<p class="voice" style="color:var(--accent)">Twin is a heater like.</p>
			</div>
		</div>
		<div class="split">
			<?php echo sk_spotify( 'album', '5T6Hz4Z63i0VTUogOy0ct4', 'Twin', 352 ); // phpcs:ignore ?>
			<?php echo sk_bandcamp( 'track', '2768887722', 'Twin', 'https://slowkarma.bandcamp.com/track/twin', 352 ); // phpcs:ignore ?>
		</div>
	</div>
</section>

<section class="section" aria-labelledby="run-title">
	<div class="wrap">
		<div class="section-head">
			<h2 id="run-title" class="h-section">The run</h2>
			<p class="reel__note"><?php echo esc_html( sprintf( '%1$d of %2$d out', $sk_out, count( $sk_run ) ) ); ?></p>
		</div>
		<p class="lede" style="margin-bottom:2rem">The studio versions come out one at a time, each with a video. A square lights up when each one lands.</p>
		<ol class="run">
			<?php foreach ( $sk_run as $sk_r ) : ?>
				<?php if ( $sk_r['out'] ) : ?>
					<li class="is-out"><a href="<?php echo esc_url( $sk_r['link'] ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $sk_r['title'] ); ?></a></li>
				<?php else : ?>
					<li><span>Coming</span></li>
				<?php endif; ?>
			<?php endforeach; ?>
		</ol>
	</div>
</section>

<?php
echo sk_reel( // phpcs:ignore
	'On the night',
	array(
		array( 'lr-stage-wide', 'Slow Karma and guests on stage at the Liquid Room' ),
		array( 'lr-guitar-vocal', 'Guitar and vocals under purple light' ),
		array( 'lr-dara-harp', 'Dara Dubh on harp' ),
		array( 'lr-keys-bass', 'Keys and bass' ),
		array( 'lr-violin', 'Strings' ),
		array( 'lr-crowd', 'A packed Liquid Room' ),
		array( 'lr-congas-lamp', 'Jose Rojas on percussion' ),
		array( 'lr-guitar-lights', 'Guitar under the lighting rig' ),
		array( 'lr-band-bow', 'The band take a bow' ),
	),
	'The Liquid Room, Edinburgh, ' . sk_finales()[2]['when']
);
?>

<section class="section section--alt" aria-labelledby="film-title">
	<div class="wrap split split--center">
		<div>
			<h2 id="film-title" class="h-section">The film</h2>
			<p class="lede">The full Liquid Room film comes out in 2027, on the anniversary of the show.</p>
			<p>Follow on <a href="<?php echo esc_url( sk_links()['youtube']['url'] ); ?>" target="_blank" rel="noopener">YouTube</a> and <a href="<?php echo esc_url( sk_links()['instagram']['url'] ); ?>" target="_blank" rel="noopener">Instagram</a> for each new release.</p>
		</div>
		<div class="split__media">
			<?php echo sk_img( 'lr-crowd-seated', 'The Liquid Room crowd', array( 'sizes' => '(min-width: 900px) 50vw, 100vw' ) ); // phpcs:ignore ?>
		</div>
	</div>
</section>

<section class="section" aria-labelledby="road-title">
	<div class="wrap split">
		<div class="prose">
			<h2 id="road-title" class="h-section">Before the show</h2>
			<p>In August 2025 we sold out Slow Karma &amp; Friends at The Jazz Bar, with Sithu Aye, Ayla Ersoy, Dara Dubh, Jurnalist and more. <em>Vogelen</em> came out that October. In March 2026, just before the show, we put out a live recording of <em>Mystery Of Love</em> with Aki Remally.</p>
			<ul class="cta-row">
				<li><a class="btn" href="https://slowkarma.bandcamp.com/track/vogelen" target="_blank" rel="noopener"><?php echo sk_icon( 'bandcamp' ); // phpcs:ignore ?>Vogelen</a></li>
				<li><a class="btn" href="https://slowkarma.bandcamp.com/track/mystery-of-love-w-aki-remally-live" target="_blank" rel="noopener"><?php echo sk_icon( 'bandcamp' ); // phpcs:ignore ?>Mystery Of Love</a></li>
			</ul>
		</div>
		<ul class="duo">
			<li><?php echo sk_img( 'jb-ayla-cj-sithu', 'Ayla Ersoy, Callum Stevenson and Sithu Aye at The Jazz Bar', array( 'sizes' => '(min-width: 900px) 25vw, 50vw' ) ); // phpcs:ignore ?></li>
			<li><?php echo sk_img( 'jb-dave-harp', 'David Lloyd, seen through the harp', array( 'sizes' => '(min-width: 900px) 25vw, 50vw' ) ); // phpcs:ignore ?></li>
			<li><?php echo sk_img( 'jb-bass-face-band', 'The band at The Jazz Bar', array( 'sizes' => '(min-width: 900px) 25vw, 50vw' ) ); // phpcs:ignore ?></li>
			<li><?php echo sk_img( 'jb-jack-kyle-jurn', 'Jack, Kyle and Jurnalist', array( 'sizes' => '(min-width: 900px) 25vw, 50vw' ) ); // phpcs:ignore ?></li>
		</ul>
	</div>
</section>

<section class="section section--alt credits-wrap" aria-labelledby="credits-title">
	<div class="wrap">
		<h2 id="credits-title" class="h-section credits-wrap__title">Credits</h2>
		<?php get_template_part( 'template-parts/finale-credits', null, array( 'season' => 2 ) ); ?>
		<figure class="plot">
			<a href="<?php echo esc_url( sk_img_url( 's2-stage-plot', 1600 ) ); ?>" target="_blank" rel="noopener">
				<?php echo sk_img( 's2-stage-plot', 'Liquid Room stage plot', array( 'sizes' => '(min-width: 900px) 60vw, 100vw' ) ); // phpcs:ignore ?>
			</a>
			<figcaption>Stage plot</figcaption>
		</figure>
	</div>
</section>

<section class="section section--tight">
	<div class="wrap section-head" style="margin:0">
		<p class="lede" style="margin:0">Season Three is in the studio. Live from spring 2027.</p>
		<a class="text-link" href="<?php echo esc_url( sk_page_url( 'press' ) . '#live' ); ?>">Booking info</a>
	</div>
</section>

<?php
sk_editor_content();
get_footer();
