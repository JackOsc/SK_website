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
		'photos' => array( 'lr-dara-harp', 'lr-guitar-vocal', 'lr-violin', 'lr-crowd', 'lr-vocal-duo', 'lr-keys-bass', 'lr-congas-lamp', 'lr-guitar-lights', 'lr-vocal-close', 'lr-band-bow', 'lr-line-up' ),
		'intro'  => 'The Liquid Room. A new set, eleven guests and a film crew, then back into the studio to make the records.',
		'aside'  => array( 'The Liquid Room, Edinburgh, ' . esc_html( sk_finales()[2]['when'] ), 'Studio versions out monthly from November', 'First release: Twin' ),
	)
);
?>

<section class="section" aria-labelledby="how-title">
	<div class="wrap split">
		<div>
			<h2 id="how-title" class="screen-reader-text">How we made Season Two</h2>
			<ol class="steps">
				<li><span>Book an iconic 700-capacity room, a year out. Pay the large booking deposit yourselves, with no evidence you can sell anything like that.</span></li>
				<li><span>Discard all of the material you know works. Write a whole new set. Invite radical musical change. Hone the work but leave it untested for the show.</span></li>
				<li><span>Jump on Insta and DM all of your favourite musicians, poets and vocalists and line them up for collaborations. Loads of guests, loads of improv.</span></li>
				<li><span>Do all the PR, promo, logistics, ticketing and stage management yourselves.</span></li>
				<li><span>Hire an incredible crew of your best pals to record and film the show. Pack the place out and put on an unforgettable show. Then use the live recordings as demos and raw material.</span></li>
				<li><span>Go to the studio. Close the door. Develop the material. Have all the guests in to visit. Make the best stuff you've ever made.</span></li>
			</ol>
		</div>
		<div class="steps-art">
			<figure class="steps-art__plot">
				<a href="<?php echo esc_url( sk_img_url( 's2-stage-plot', 1600 ) ); ?>" target="_blank" rel="noopener">
					<?php echo sk_img( 's2-stage-plot', 'Stage plot for the Liquid Room show', array( 'sizes' => '(min-width: 900px) 45vw, 100vw' ) ); // phpcs:ignore ?>
				</a>
				<figcaption>The stage plot</figcaption>
			</figure>
			<div class="poster">
				<?php echo sk_img( 's2-poster', 'Poster for Slow Karma at the Liquid Room, Edinburgh, 21 March 2026', array( 'sizes' => '(min-width: 900px) 30vw, 70vw' ) ); // phpcs:ignore ?>
			</div>
		</div>
	</div>
</section>

<section class="section section--alt" aria-labelledby="change-title">
	<div class="wrap split split--center">
		<div class="prose">
			<h2 id="change-title" class="h-section">All change</h2>
			<p class="lede">After the Voodoo Rooms, Jack McKay Fletcher left the band and Jose Rojas joined on percussion, bringing a whole new energy and a deep rhythmic sensibility.</p>
			<p>That's part of the idea of the Seasons. Between one set of material and the next, we leave room for radical change. Season One took lots of unexpected twists and turns. The Season Two songs hang together: the lyrics share their themes, and the music has an intensity and a certainty of step that's new for us.</p>
		</div>
		<?php echo sk_gilt_portrait( 'member-jose', 'Jose Rojas with a shaker, behind the congas', 'Jose Rojas, percussion' ); // phpcs:ignore ?>
	</div>
	<div class="wrap split split--center" style="margin-top:clamp(1.5rem, 1rem + 2vw, 3rem)">
		<div class="prose">
			<h3 class="h-sub">The brief</h3>
			<p>We asked the singers to write their own lyrics for Season Two, and sent them some themes to start from.</p>
		</div>
		<div class="brief">
			<p class="brief__label">Suggested lyric themes</p>
			<ul>
				<li>Change and flux: how some changes we choose, and others happen to us apparently without our choosing.</li>
				<li>Time moving on inexorably. "You can't step in the same river once", and how "nothing in the past or future ever will feel like today".</li>
				<li>Cycles in life. Time not being linear, how history rhymes, things come back around.</li>
				<li>Samsara, the great wheel. How much agency do we really have to decide how things will be?</li>
			</ul>
			<p class="brief__more">Other broad ideas: suffering, kindness and compassion, and the relationships between them. Birth, death and rebirth. Cycles, karma, history. The speed of time. Fast-forward, rewinding, the arrow of time. The need to authentically face up to the challenges that life presents.</p>
		</div>
	</div>
</section>

<section class="section" aria-labelledby="twin-title">
	<div class="wrap">
		<div class="video-lead">
			<?php echo sk_youtube( '-nSLUTwDvPc', 'Slow Karma, Twin' ); // phpcs:ignore ?>
			<div>
				<p class="kicker">Out now</p>
				<h2 id="twin-title" class="h-section">Twin</h2>
				<p>Jazz chops, punk energy and UK dancefloor rhythms. Played and filmed live in one take at LOSTOSC Studios.</p>
				<p class="voice" style="color:var(--accent)">Twin is a heater like.</p>
			</div>
		</div>
		<div class="split">
			<?php echo sk_spotify( 'album', '5T6Hz4Z63i0VTUogOy0ct4', 'Twin', 352 ); // phpcs:ignore ?>
			<?php echo sk_bandcamp( 'track', '2768887722', 'Twin', 'https://slowkarma.bandcamp.com/track/twin', 352 ); // phpcs:ignore ?>
		</div>
	</div>
</section>

<section class="section section--alt" aria-labelledby="run-title">
	<div class="wrap">
		<div class="section-head">
			<h2 id="run-title" class="h-section">The run</h2>
			<p class="reel__note"><?php echo esc_html( sprintf( '%1$d of %2$d out', $sk_out, count( $sk_run ) ) ); ?></p>
		</div>
		<p class="lede" style="margin-bottom:2rem">The studio versions come out one at a time, each with a video. Titles from the Liquid Room film.</p>
		<ol class="run">
			<?php foreach ( $sk_run as $sk_r ) : ?>
				<?php
				$sk_title = sprintf(
					'<img class="run__title" src="%1$s" alt="%2$s" width="%3$d" loading="lazy" decoding="async" style="width:%4$s%%">',
					esc_url( sk_asset( 'img/' . $sk_r['img'] . '.webp' ) ),
					esc_attr( $sk_r['title'] ),
					(int) $sk_r['w'],
					esc_attr( round( $sk_r['w'] / 500 * 100, 1 ) )
				);
				?>
				<?php if ( $sk_r['out'] ) : ?>
					<li class="is-out"><a href="<?php echo esc_url( $sk_r['link'] ); ?>" target="_blank" rel="noopener"><?php echo $sk_title; // phpcs:ignore ?><span class="run__state"><?php echo sk_icon( 'play' ); // phpcs:ignore ?>Out now. Watch</span></a></li>
				<?php else : ?>
					<li><?php echo $sk_title; // phpcs:ignore ?><span class="run__state">Coming</span></li>
				<?php endif; ?>
			<?php endforeach; ?>
		</ol>
	</div>
</section>


<section class="section" aria-labelledby="film-title">
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

<section class="section section--alt" aria-labelledby="road-title">
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

<section class="section credits-wrap" aria-labelledby="credits-title">
	<div class="wrap">
		<h2 id="credits-title" class="h-section credits-wrap__title">Credits</h2>
		<?php get_template_part( 'template-parts/finale-credits', null, array( 'season' => 2 ) ); ?>
	</div>
</section>

<?php
echo sk_reel( // phpcs:ignore
	'On the night',
	array(
		array( 'lr-stage-wide', 'Slow Karma and guests on stage at the Liquid Room' ),
		array( 'lr-vocal-blue', 'A guest vocalist in blue light' ),
		array( 'lr-violin-pink', 'Emma Jane Lloyd on violin' ),
		array( 'lr-keys-mic', 'At the mic' ),
		array( 'lr-clarinet-red', 'Clarinet in red light' ),
		array( 'lr-perc-purple', 'Percussion through the haze' ),
		array( 'lr-drums-blue', 'Kyle Grieve on drums' ),
		array( 'lr-guitar-green', 'Guitar in silhouette' ),
		array( 'lr-guitar-lamp', 'Callum Stevenson on guitar' ),
	),
	'The Liquid Room, Edinburgh, ' . sk_finales()[2]['when']
);
?>

<section class="section section--alt section--tight">
	<div class="wrap section-head" style="margin:0">
		<p class="lede" style="margin:0">Season Three is in the studio. Live from spring 2027.</p>
		<a class="text-link" href="<?php echo esc_url( sk_page_url( 'press' ) . '#live' ); ?>">Booking info</a>
	</div>
</section>

<?php
sk_editor_content();
get_footer();
