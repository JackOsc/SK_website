<?php
/**
 * Story page.
 *
 * @package SlowKarma
 */

get_header();

echo sk_page_hero( // phpcs:ignore
	array(
		'title'  => 'The Story',
		'fill'   => 'lr-harmonica',
		'photos' => array( 'l1-11', 'member-kyle', 'l1-39', 'member-dave', 'l1-43', 'member-cj', 'l1-70', 'member-jack', 'l1-75', 'member-jose', 'x-105', 'l1-54' ),
		'intro'  => 'Five musicians from Leith, a recording studio, and an extended family of collaborators.',
		'aside'  => array( 'Formed 2024', 'Music Base, Leith', 'Home studio: LOSTOSC Studios' ),
	)
);
?>

<section class="section">
	<div class="wrap split split--center">
		<div class="prose">
			<p class="lede">Between us we've toured the world and played on plenty of other people's records. Slow Karma is where we bring all that home.</p>
			<p>We record everything at LOSTOSC Studios, the recording studio Jack and Dave run in Music Base, a building at 125 Great Junction Street that's home to a community of music businesses, including Leith Drum Studio, which Kyle runs. Callum teaches guitar and keys. We wanted a place with real artistic freedom, where we could push ourselves to make the best music we can.</p>
			<p>We listen to everything, from spiritual jazz to hip-hop to stadium pop, and it all ends up in the band.</p>
		</div>
		<div class="split__media">
			<?php echo sk_img( 'l1-54', 'Slow Karma around a candlelit table, Season Two shoot', array( 'sizes' => '(min-width: 900px) 50vw, 100vw' ) ); // phpcs:ignore ?>
		</div>
	</div>
</section>

<section class="section section--alt">
	<div class="wrap">
		<h2 class="h-section">How we work</h2>
		<ul class="pillars">
			<li>
				<span class="pillar__name">Jazz chops</span>
				<p>Musicianship that serves the music. Improvising inside an architecture, and committing to the moment.</p>
			</li>
			<li>
				<span class="pillar__name">Punk ethos</span>
				<p>We put on our own gigs and release our own music, straight to the people who listen.</p>
			</li>
			<li>
				<span class="pillar__name">High production</span>
				<p>We record at our own studio and mix in Atmos. People's attention is precious, so we make everything as good as we can.</p>
			</li>
		</ul>
	</div>
</section>

<figure class="bleed" aria-label="Season Two finale">
	<div class="bleed__img" data-parallax>
		<?php echo sk_img( 'lr-stage-wide', 'Slow Karma and guests on stage at the Liquid Room, March 2026', array( 'sizes' => '100vw' ) ); // phpcs:ignore ?>
	</div>
</figure>

<section class="section">
	<div class="wrap">
		<h2 class="h-section">So far</h2>

		<article class="chapter">
			<p class="chapter__when">2024<small>Season One</small></p>
			<div class="chapter__body prose">
				<h3 class="h-sub">The first singles</h3>
				<p>Our first collaborator was the harpist Dara Dubh, on <em>Still Here</em>. Loam, Sithu Aye, Emma Jane Lloyd, Justyna Jablonska and Jurnalist followed. Every track came out as a single with its own video. Soweto Kinch played us on 'Round Midnight on BBC Radio 3, and we got plays on BBC Radio Scotland, BBC Introducing and Amazing Radio, festival bookings and over 50,000 streams in the first year.</p>
			</div>
		</article>

		<article class="chapter">
			<p class="chapter__when">2025<small>Season One finale</small></p>
			<div class="chapter__body prose">
				<h3 class="h-sub">Tell Them Slow Karma Sent You</h3>
				<p>In March we sold out the Voodoo Rooms with 14 musicians on stage, and filmed and recorded the night. That summer we played Kelburn Garden Party and Hidden Door and supported Knats. Our monthly slot at The Jazz Bar ended with a sold-out headline show there in August.</p>
				<p><a class="text-link" href="<?php echo esc_url( sk_page_url( 'season-one' ) ); ?>">Season One</a></p>
			</div>
		</article>

		<article class="chapter">
			<p class="chapter__when">2026<small>Season Two</small></p>
			<div class="chapter__body prose">
				<h3 class="h-sub">One thing every day that scares you</h3>
				<p>We booked the Liquid Room a year out, with no material and no idea if we could fill it. We wrote a whole new set and played it on 21 March to a packed room, with eleven guests. Some had never played with us before and didn't rehearse.</p>
				<p>We filmed it to use as demos, then took the recordings back into the studio. <em>Twin</em> came out in November.</p>
				<p><a class="text-link" href="<?php echo esc_url( sk_page_url( 'season-two' ) ); ?>">Season Two</a></p>
			</div>
		</article>

		<article class="chapter">
			<p class="chapter__when">Now<small>Season Three</small></p>
			<div class="chapter__body prose">
				<h3 class="h-sub">Wintering</h3>
				<p>We're in the studio working on new sounds for a big spring and summer 2027, playing the best of the first two seasons alongside the new stuff. If you book stages, <a href="<?php echo esc_url( sk_page_url( 'press' ) . '#live' ); ?>">get in touch</a>.</p>
			</div>
		</article>
	</div>
</section>

<section class="section section--alt">
	<div class="wrap">
		<h2 class="h-section">The core five</h2>
		<ul class="members">
			<?php foreach ( sk_members() as $sk_m ) : ?>
				<li class="member">
					<?php echo sk_img( $sk_m['photo'], $sk_m['name'], array( 'sizes' => '(min-width: 900px) 18vw, (min-width: 560px) 30vw, 46vw' ) ); // phpcs:ignore ?>
					<span class="member__name"><?php echo esc_html( $sk_m['name'] ); ?></span>
					<?php if ( $sk_m['role'] ) : ?>
						<span class="member__role"><?php echo esc_html( $sk_m['role'] ); ?></span>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>

<section class="section">
	<div class="wrap split">
		<div>
			<h2 class="h-section">The extended family</h2>
			<p class="prose">Around the five of us are some of the best musicians in Scotland. They come back season after season and shape what the band becomes. We like sharing a stage with artists we love, and helping other musicians get on. It's all love.</p>
		</div>
		<ul class="roster">
			<?php foreach ( sk_family() as $sk_f ) : ?>
				<li><span><?php echo sk_person( $sk_f[0] ); // phpcs:ignore ?></span><span><?php echo esc_html( $sk_f[1] ); ?></span></li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>

<section class="section section--paper">
	<div class="wrap split split--center">
		<blockquote class="quote">
			<p>We never serve thin gruel. Everything is gourmet.</p>
		</blockquote>
		<div class="prose">
			<h2 class="h-sub">The Seasons</h2>
			<p>Each year we put on one big finale, the best of the year as well as we can do it. Every track along the way comes out as a single. After the finale we rest, then start again with new music and new collaborators.</p>
			<p><a class="text-link" href="<?php echo esc_url( sk_page_url( 'season-one' ) ); ?>">Start with Season One</a></p>
		</div>
	</div>
</section>

<?php
sk_editor_content();
get_footer();
