<?php
/**
 * Story page.
 *
 * @package SlowKarma
 */

get_header();
?>

<header class="page-hero">
	<div class="wrap">
		<h1 class="knockout page-hero__title" style="<?php echo esc_attr( sk_fill_style( 'lr-harmonica' ) ); ?>" data-parallax-fill>The Story</h1>
		<div class="page-hero__intro">
			<p class="lede">Five musicians from Leith, a recording studio, and an extended family of Scotland&rsquo;s most exciting players. Spiritual and explosive, meditative and unruly.</p>
			<div class="page-hero__aside">
				<p>Formed 2024</p>
				<p>Music Base, Great Junction Street, Leith</p>
				<p>Home studio: Lost Oscillation (LOSTOSC)</p>
			</div>
		</div>
	</div>
</header>

<section class="section">
	<div class="wrap split split--center">
		<div class="prose">
			<p class="lede">Between us we&rsquo;ve toured the world, headlined festivals and played on other people&rsquo;s records. Slow Karma is where we bring all of that home.</p>
			<p>Music Base in Leith is our home. Kyle runs Leith Drum Studio. Dave and Jack run Lost Oscillation, the studio where everything we release is recorded. Callum teaches guitar and keys. We wanted a space with real artistic freedom and emotional safety, to push ourselves to make the truest, best music we could.</p>
			<p>The phrase we keep coming back to is <em class="voice">the music that only we can make</em>. Our influences run from spiritual jazz to experimental hip-hop to stadium pop, and the band is what happens when they collide.</p>
		</div>
		<div class="split__media">
			<?php echo sk_img( 'l1-54', 'Slow Karma around a candlelit table, Season Two photoshoot', array( 'sizes' => '(min-width: 900px) 50vw, 100vw' ) ); // phpcs:ignore ?>
		</div>
	</div>
</section>

<section class="section section--alt">
	<div class="wrap">
		<h2 class="h-section">What we&rsquo;re about</h2>
		<ul class="pillars">
			<li>
				<span class="pillar__name">Jazz chops</span>
				<p>Technical mastery that serves the music, never shows off for its own sake. Improvisation inside an architecture. Above all, freedom: a commitment to the moment.</p>
			</li>
			<li>
				<span class="pillar__name">Punk ethos</span>
				<p>We put on our own gigs, release our own music and deliver everything direct to the people who listen. We act like it really matters, because it does.</p>
			</li>
			<li>
				<span class="pillar__name">High production</span>
				<p>Attention is precious, so we never serve thin gruel. Pristine recordings, Atmos mixes, and the best, most sympathetic professionals we can find.</p>
			</li>
		</ul>
	</div>
</section>

<figure class="bleed" aria-label="Season Two finale">
	<div class="bleed__img" data-parallax>
		<?php echo sk_img( 'lr-stage-wide', 'Slow Karma and guests on stage at the Liquid Room, Edinburgh, March 2026', array( 'sizes' => '100vw' ) ); // phpcs:ignore ?>
	</div>
</figure>

<section class="section">
	<div class="wrap">
		<h2 class="h-section">How it&rsquo;s gone so far</h2>

		<article class="chapter">
			<p class="chapter__when">2024<small>Season One begins</small></p>
			<div class="chapter__body prose">
				<h3 class="h-sub">Joyful collisions</h3>
				<p>Our first collaborator was the Celtic harpist Dara Dubh. On <em>Still Here</em> we put her harp together with our love of Alice Coltrane and Dorothy Ashby, and found something new. Then came Sithu Aye, the Burmese-Scottish guitar hero, on a track with more to do with UK dancefloors than prog. Loam, Jurnalist, Emma Jane Lloyd and Justyna Jablonska followed.</p>
				<p>Nine singles in the first year, each released with the full works: video, campaign, everything. National radio play, festival bookings, and over 50,000 streams.</p>
			</div>
		</article>

		<article class="chapter">
			<p class="chapter__when">2025<small>Season One finale</small></p>
			<div class="chapter__body prose">
				<h3 class="h-sub">Tell Them Slow Karma Sent You</h3>
				<p>In March 2025 we sold out the Voodoo Rooms with 14 musicians on stage. We filmed and recorded the whole night; it became a feature-length concert film and a live album, and it closed Season One.</p>
				<p>Along the way we played Kelburn Garden Party and Hidden Door, supported the Mercury-nominated Knats, and sharpened the sound in a monthly slot at The Jazz Bar. That ended in August 2025 with a sold-out headline show there, packed with friends from the extended family.</p>
				<p><a class="text-link" href="<?php echo esc_url( sk_page_url( 'season-one' ) ); ?>">Season One</a></p>
			</div>
		</article>

		<article class="chapter">
			<p class="chapter__when">2026<small>Season Two</small></p>
			<div class="chapter__body prose">
				<h3 class="h-sub">Something a bit scary</h3>
				<p>We booked The Liquid Room, Edinburgh&rsquo;s 700-capacity institution, a year out, with no material and no guarantee of filling it. We wrote an entirely new set, promoted it ourselves, and on 21 March 2026 played it to a packed room with eleven guest musicians, some joining us for the first time without a single rehearsal.</p>
				<p>The show was filmed and recorded as demos. We took those recordings back into the studio, and the studio versions started arriving in November with <em>Twin</em>.</p>
				<p><a class="text-link" href="<?php echo esc_url( sk_page_url( 'season-two' ) ); ?>">Season Two</a></p>
			</div>
		</article>

		<article class="chapter">
			<p class="chapter__when">Now<small>Season Three</small></p>
			<div class="chapter__body prose">
				<h3 class="h-sub">Wintering</h3>
				<p>We&rsquo;re in the studio developing new sounds, building towards a big spring and summer 2027: all the hits from the first two seasons, and new work with all new sounds. If you book stages, <a href="<?php echo esc_url( sk_page_url( 'press' ) . '#live' ); ?>">we&rsquo;d love to hear from you</a>.</p>
			</div>
		</article>
	</div>
</section>

<section class="section section--alt">
	<div class="wrap">
		<div class="section-head">
			<h2 class="h-section">The core five</h2>
		</div>
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
			<blockquote class="quote">
				<p>It&rsquo;s all love.</p>
			</blockquote>
		</div>
		<div class="prose">
			<p>We don&rsquo;t do guest slots. Around the five of us is a recurring constellation of collaborators: Scotland&rsquo;s most exciting harpists, singers, MCs, string players, horn players and poets, who come back season after season and shape what the band becomes.</p>
			<p>It comes from believing in sharing platforms with artists we love, and using what we&rsquo;ve learned to help other musicians get on and enjoy making music. Day to day that means running studios and teaching the next generation at Music Base. On stage it means fourteen people at the Voodoo Rooms, and a stage full of guests at the Liquid Room.</p>
			<ul class="roster">
				<?php foreach ( sk_family() as $sk_f ) : ?>
					<li><span><?php echo esc_html( $sk_f[0] ); ?></span><span><?php echo esc_html( $sk_f[1] ); ?></span></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</section>

<section class="section section--paper">
	<div class="wrap split split--center">
		<blockquote class="quote">
			<p>We never serve thin gruel. Everything we serve is gourmet.</p>
			<footer>Slow Karma</footer>
		</blockquote>
		<div class="prose">
			<h2 class="h-sub">The Seasons</h2>
			<p>Each year we put on one special, spectacular, all-out finale: the best of the year, as well as we can do it. Throughout the year every track goes out as a single with full support, then gets collected into the season. After the finale comes rest, reflection and renewal. The wheel turns, and we start making all new music with new influences and new collaborators.</p>
			<p><a class="text-link" href="<?php echo esc_url( sk_page_url( 'season-one' ) ); ?>">Start with Season One</a></p>
		</div>
	</div>
</section>

<?php
sk_editor_content();
get_footer();
