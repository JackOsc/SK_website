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
?>

<header class="page-hero">
	<div class="wrap">
		<h1 class="knockout page-hero__title" style="<?php echo esc_attr( sk_fill_style( 'lr-bass-vocal' ) ); ?>" data-parallax-fill>Season Two</h1>
		<div class="page-hero__intro">
			<p class="lede">The Liquid Room. A 700-capacity room booked a year out, a whole set of new music nobody had heard, eleven guests, and a film crew. Then back into the studio to make the records.</p>
			<div class="page-hero__aside">
				<p>Finale: The Liquid Room, Edinburgh, <?php echo esc_html( sk_finales()[2]['when'] ); ?></p>
				<p>Studio versions arriving now</p>
				<p>First release: Twin</p>
			</div>
		</div>
	</div>
</header>

<section class="section" aria-labelledby="how-title">
	<div class="wrap split">
		<div>
			<h2 id="how-title" class="h-section">How we made it</h2>
			<ol class="steps">
				<li><span><strong>We booked the Liquid Room a year out,</strong> with no idea if we could sell anything like it.</span></li>
				<li><span><strong>We wrote a whole new set for the show.</strong> All new material, all untested. Loads of guests, loads of improvisation.</span></li>
				<li><span><strong>We hired an incredible crew</strong> to record and film the whole night.</span></li>
				<li><span><strong>We used the show as our demos,</strong> taking the recordings back into the studio to build the season.</span></li>
				<li><span><strong>Twin is the first release from the studio versions.</strong> It&rsquo;s the best thing we&rsquo;ve ever made.</span></li>
			</ol>
		</div>
		<div>
			<blockquote class="quote">
				<p>We booked The Liquid Room a year out, with no material in mind and no guarantee we&rsquo;d get near filling it. As it was, we packed the place out, had a bunch of amazing guests join us on stage and were really stoked with the film.</p>
				<footer>Jack Elliot, Slow Karma</footer>
			</blockquote>
			<div class="poster" style="max-width:420px">
				<?php echo sk_img( 's2-poster', 'Poster for Slow Karma at the Liquid Room, Edinburgh, 21 March 2026', array( 'sizes' => '420px' ) ); // phpcs:ignore ?>
			</div>
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
				<p>Jazz virtuosity, punk intensity, and the rhythms of UK dancefloors. It owes as much to breakbeats and UK garage as it does to Miles and Bird. Played and filmed live in one take at LOSTOSC in Leith.</p>
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
			<p class="voice" style="margin:0;color:var(--muted)"><?php echo esc_html( sprintf( '%1$d of %2$d out', $sk_out, count( $sk_run ) ) ); ?></p>
		</div>
		<p class="lede" style="margin-bottom:2rem">The studio versions of the Liquid Room set arrive one at a time, each with its own video, through 2027. Each square lights up as it lands.</p>
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

<figure class="bleed" aria-label="The Liquid Room">
	<div class="bleed__img" data-parallax>
		<?php echo sk_img( 'lr-stage-wide', 'Slow Karma and guests on stage at the Liquid Room', array( 'sizes' => '100vw' ) ); // phpcs:ignore ?>
	</div>
</figure>

<section class="section" aria-labelledby="night-title">
	<div class="wrap">
		<div class="section-head">
			<h2 id="night-title" class="h-section">On the night</h2>
			<p class="voice" style="margin:0;color:var(--muted)">The Liquid Room, <?php echo esc_html( sk_finales()[2]['when'] ); ?></p>
		</div>
		<ul class="gallery">
			<li class="g-wide"><?php echo sk_img( 'lr-guitar-vocal', 'Guitar and vocals under purple light', array( 'sizes' => '(min-width: 700px) 66vw, 100vw' ) ); // phpcs:ignore ?></li>
			<li class="g-tall"><?php echo sk_img( 'lr-dara-harp', 'Dara Dubh on harp', array( 'sizes' => '(min-width: 700px) 33vw, 50vw' ) ); // phpcs:ignore ?></li>
			<li><?php echo sk_img( 'lr-keys-bass', 'Keys and bass', array( 'sizes' => '(min-width: 700px) 33vw, 50vw' ) ); // phpcs:ignore ?></li>
			<li><?php echo sk_img( 'lr-crowd', 'A packed room', array( 'sizes' => '(min-width: 700px) 33vw, 50vw' ) ); // phpcs:ignore ?></li>
			<li class="g-tall"><?php echo sk_img( 'lr-vocal-duo', 'Guest vocalist', array( 'sizes' => '(min-width: 700px) 33vw, 50vw' ) ); // phpcs:ignore ?></li>
			<li><?php echo sk_img( 'lr-crowd-seated', 'The crowd at the Liquid Room', array( 'sizes' => '(min-width: 700px) 33vw, 50vw' ) ); // phpcs:ignore ?></li>
			<li><?php echo sk_img( 'lr-guitar-lights', 'Guitar under the lighting rig', array( 'sizes' => '(min-width: 700px) 33vw, 50vw' ) ); // phpcs:ignore ?></li>
			<li class="g-tall"><?php echo sk_img( 'lr-violin', 'Strings', array( 'sizes' => '(min-width: 700px) 33vw, 50vw' ) ); // phpcs:ignore ?></li>
			<li class="g-tall"><?php echo sk_img( 'lr-congas-lamp', 'Percussion by lamplight', array( 'sizes' => '(min-width: 700px) 33vw, 50vw' ) ); // phpcs:ignore ?></li>
			<li class="g-tall"><?php echo sk_img( 'lr-vocal-close', 'Guest vocalist', array( 'sizes' => '(min-width: 700px) 33vw, 50vw' ) ); // phpcs:ignore ?></li>
			<li class="g-wide"><?php echo sk_img( 'lr-band-bow', 'The band take a bow', array( 'sizes' => '(min-width: 700px) 66vw, 100vw' ) ); // phpcs:ignore ?></li>
		</ul>
	</div>
</section>

<section class="section section--alt" aria-labelledby="film-title">
	<div class="wrap split split--center">
		<div>
			<h2 id="film-title" class="h-section">The film</h2>
			<p class="lede">The full Liquid Room film arrives in 2027, on the anniversary of the show.</p>
			<p>Until then, the studio versions are coming out one by one. Follow along on <a href="<?php echo esc_url( sk_links()['youtube']['url'] ); ?>" target="_blank" rel="noopener">YouTube</a> and <a href="<?php echo esc_url( sk_links()['instagram']['url'] ); ?>" target="_blank" rel="noopener">Instagram</a>.</p>
		</div>
		<div class="split__media">
			<?php echo sk_img( 'lr-crowd', 'A packed Liquid Room', array( 'sizes' => '(min-width: 900px) 50vw, 100vw' ) ); // phpcs:ignore ?>
		</div>
	</div>
</section>

<section class="section" aria-labelledby="road-title">
	<div class="wrap">
		<h2 id="road-title" class="h-section">The road to the Liquid Room</h2>
		<div class="split">
			<div class="prose">
				<p>The road ran through a sold-out Slow Karma &amp; Friends at The Jazz Bar in August 2025, with Sithu Aye, Ayla Ersoy, Dara Dubh, Jurnalist and more, and <em>Vogelen</em>, released that October. In March 2026, just before the show, we put out <em>Mystery Of Love</em> with Aki Remally, recorded live.</p>
				<ul class="cta-row">
					<li><a class="btn" href="https://slowkarma.bandcamp.com/track/vogelen" target="_blank" rel="noopener"><?php echo sk_icon( 'bandcamp' ); // phpcs:ignore ?>Vogelen</a></li>
					<li><a class="btn" href="https://slowkarma.bandcamp.com/track/mystery-of-love-w-aki-remally-live" target="_blank" rel="noopener"><?php echo sk_icon( 'bandcamp' ); // phpcs:ignore ?>Mystery Of Love</a></li>
				</ul>
			</div>
			<ul class="gallery" style="grid-template-columns:repeat(2,minmax(0,1fr))">
				<li style="grid-column:span 1"><?php echo sk_img( 'jb-ayla-cj-sithu', 'Ayla Ersoy, Callum Stevenson and Sithu Aye at The Jazz Bar', array( 'sizes' => '(min-width: 900px) 25vw, 50vw' ) ); // phpcs:ignore ?></li>
				<li style="grid-column:span 1"><?php echo sk_img( 'jb-bass-face-band', 'The band at The Jazz Bar', array( 'sizes' => '(min-width: 900px) 25vw, 50vw' ) ); // phpcs:ignore ?></li>
				<li style="grid-column:span 1"><?php echo sk_img( 'jb-dave-harp', 'David Lloyd, seen through the harp', array( 'sizes' => '(min-width: 900px) 25vw, 50vw' ) ); // phpcs:ignore ?></li>
				<li style="grid-column:span 1"><?php echo sk_img( 'jb-jack-kyle-jurn', 'Jack, Kyle and Jurnalist', array( 'sizes' => '(min-width: 900px) 25vw, 50vw' ) ); // phpcs:ignore ?></li>
			</ul>
		</div>
	</div>
</section>

<section class="section section--alt" aria-labelledby="credits-title">
	<div class="wrap">
		<h2 id="credits-title" class="h-section">Credits</h2>
		<?php get_template_part( 'template-parts/finale-credits', null, array( 'season' => 2 ) ); ?>
		<div class="split" style="margin-top:4rem">
			<div>
				<h3 class="h-sub">The stage plot</h3>
				<p>The plan for getting the band, the guests and all those lamps onto one stage.</p>
			</div>
			<a href="<?php echo esc_url( sk_img_url( 's2-stage-plot', 1600 ) ); ?>" target="_blank" rel="noopener">
				<?php echo sk_img( 's2-stage-plot', 'Liquid Room stage plot', array( 'sizes' => '(min-width: 900px) 50vw, 100vw' ) ); // phpcs:ignore ?>
			</a>
		</div>
	</div>
</section>

<section class="section section--tight">
	<div class="wrap section-head" style="margin:0">
		<p class="lede" style="margin:0">And now, Season Three: wintering in the studio, live from spring 2027.</p>
		<a class="text-link" href="<?php echo esc_url( sk_page_url( 'story' ) ); ?>">The whole story</a>
	</div>
</section>

<?php
sk_editor_content();
get_footer();
