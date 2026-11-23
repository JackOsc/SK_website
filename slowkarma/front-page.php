<?php
/**
 * Home page.
 *
 * @package SlowKarma
 */

get_header();

$sk_releases = sk_releases();
$sk_twin     = $sk_releases[0];
?>

<section class="hero" aria-labelledby="hero-title">
	<h1 id="hero-title" class="knockout knockout--hero" style="<?php echo esc_attr( sk_fill_style( 'hero-fill', 2600 ) ); ?>" data-parallax-fill>Slow Karma</h1>
	<div class="hero__foot wrap">
		<p class="hero__creed">Jazz chops. Punk ethos. High production.</p>
		<p class="hero__where"><a class="btn btn--solid btn--big" href="https://www.youtube.com/watch?v=-nSLUTwDvPc" target="_blank" rel="noopener"><?php echo sk_icon( 'play' ); // phpcs:ignore ?>Hear THE NEW now</a></p>
	</div>
</section>

<section class="feature" aria-labelledby="twin-title">
	<div class="wrap feature__grid feature__grid--split">
		<div>
			<p class="kicker">Out now</p>
			<h2 id="twin-title" class="feature__title">Twin</h2>
		</div>
		<div class="feature__text">
			<p class="lede">The first release of Season Two. Breakbeats, UK garage, Miles and Bird, played live in one take at LOSTOSC Studios.</p>
			<ul class="cta-row">
				<li><a class="btn btn--solid" href="https://www.youtube.com/watch?v=-nSLUTwDvPc" target="_blank" rel="noopener"><?php echo sk_icon( 'youtube' ); // phpcs:ignore ?>Watch on YouTube</a></li>
				<li><a class="btn" href="<?php echo esc_url( $sk_twin['spotify'] ); ?>" target="_blank" rel="noopener"><?php echo sk_icon( 'spotify' ); // phpcs:ignore ?>Spotify</a></li>
				<li><a class="btn" href="<?php echo esc_url( $sk_twin['bandcamp'] ); ?>" target="_blank" rel="noopener"><?php echo sk_icon( 'bandcamp' ); // phpcs:ignore ?>Bandcamp</a></li>
				<li><a class="btn" href="<?php echo esc_url( sk_links()['apple']['url'] ); ?>" target="_blank" rel="noopener"><?php echo sk_icon( 'apple' ); // phpcs:ignore ?>Apple Music</a></li>
			</ul>
		</div>
	</div>
</section>

<figure class="bleed" aria-label="The band">
	<div class="bleed__img" data-parallax>
		<?php echo sk_img( 'band-wall', 'Slow Karma against a plaster wall, Season Two shoot', array( 'sizes' => '100vw' ) ); // phpcs:ignore ?>
	</div>
</figure>

<section class="seasons" aria-labelledby="seasons-title">
	<div class="wrap">
		<div class="seasons__intro">
			<h2 id="seasons-title" class="knockout knockout--section" style="<?php echo esc_attr( sk_fill_style( 'lr-stage-wide' ) ); ?>" data-parallax-fill>The Seasons</h2>
			<p class="lede">Each year builds to one big hometown show. Then we start again with all new music.</p>
		</div>

		<ol class="season-cards">
			<li class="season-card season-card--s1">
				<a href="<?php echo esc_url( sk_page_url( 'season-one' ) ); ?>">
					<span class="season-card__art"><?php echo sk_img( 's1-art', '', array( 'sizes' => '(min-width: 900px) 33vw, 100vw' ) ); // phpcs:ignore ?></span>
					<span class="season-card__num">Season One</span>
					<span class="season-card__title">Tell Them Slow Karma Sent You</span>
					<span class="season-card__desc">Ten singles, then a sold-out Voodoo Rooms with 14 of us on stage.</span>
				</a>
			</li>
			<li class="season-card season-card--s2">
				<a href="<?php echo esc_url( sk_page_url( 'season-two' ) ); ?>">
					<span class="season-card__art"><?php echo sk_img( 's2-poster-sq', 'Season Two poster: an evening with Slow Karma at the Liquid Room, 21 March 2026', array( 'sizes' => '(min-width: 900px) 33vw, 100vw' ) ); // phpcs:ignore ?></span>
					<span class="season-card__num">Season Two</span>
					<span class="season-card__title">The Liquid Room</span>
					<span class="season-card__desc">A new set, a packed 700-cap room, and studio versions out monthly from November.</span>
				</a>
			</li>
			<li class="season-card season-card--s3">
				<div>
					<span class="season-card__art" aria-hidden="true"><?php echo sk_img( 'l1-40', '', array( 'sizes' => '(min-width: 900px) 33vw, 100vw' ) ); // phpcs:ignore ?></span>
					<span class="season-card__num">Season Three</span>
					<span class="season-card__title">Wintering</span>
					<span class="season-card__desc">In the studio making new sounds. Live from spring 2027.</span>
				</div>
			</li>
		</ol>
	</div>
</section>

<section class="story-teaser" aria-labelledby="story-title">
	<div class="wrap story-teaser__grid">
		<div class="story-teaser__img story-teaser__img--art">
			<figure class="gilt" data-gilt>
				<div class="gilt__frame">
					<div class="gilt__mat">
						<?php echo sk_img( 'dynamite-dark', 'Slow Karma artwork drawn in gold: a crate of dynamite and fireworks, a snake, a horseshoe, incense and candles', array( 'sizes' => '(min-width: 900px) 38vw, 80vw', 'class' => 'gilt__art' ) ); // phpcs:ignore ?>
						<span class="gilt__glare" aria-hidden="true"></span>
					</div>
				</div>
			</figure>
		</div>
		<div class="story-teaser__text">
			<h2 id="story-title" class="h-display">Incense and dynamite</h2>
			<p>We started in 2024 at Music Base in Leith, where we run studios and teach, and we record everything at LOSTOSC Studios. Slow Karma is where we use everything we've learned to make the music only we can make.</p>
			<p>Around the core five is an extended family of harpists, MCs, string players, singers and poets, who come back season after season.</p>
			<p><a class="text-link" href="<?php echo esc_url( sk_page_url( 'story' ) ); ?>">Our story</a></p>
		</div>
	</div>
</section>

<section class="releases-strip" aria-labelledby="releases-title">
	<div class="wrap">
		<div class="section-head">
			<h2 id="releases-title" class="h-section">Releases</h2>
			<a class="text-link" href="<?php echo esc_url( sk_page_url( 'music' ) ); ?>">All music</a>
		</div>
		<ul class="release-grid release-grid--strip">
			<?php
			foreach ( array_slice( $sk_releases, 0, 6 ) as $sk_r ) {
				echo sk_release_card( $sk_r ); // phpcs:ignore
			}
			?>
		</ul>
		<?php echo sk_link_list( 'links--platforms', array( 'spotify', 'apple', 'tidal', 'bandcamp', 'youtube' ) ); // phpcs:ignore ?>
	</div>
</section>

<section class="film-feature" aria-labelledby="film-title">
	<div class="wrap film-feature__grid">
		<div class="film-feature__text">
			<h2 id="film-title" class="h-section">The Season One finale</h2>
			<p>The full concert film from a sold-out Voodoo Rooms.</p>
			<p><a class="text-link" href="<?php echo esc_url( sk_page_url( 'videos' ) ); ?>">All videos</a></p>
		</div>
		<div class="film-feature__media">
			<?php echo sk_youtube( 'UXPGUexqhyo', 'Tell Them Slow Karma Sent You: Season One finale concert film' ); // phpcs:ignore ?>
		</div>
	</div>
</section>

<section class="family" aria-labelledby="family-title">
	<div class="wrap">
		<h2 id="family-title" class="h-section">The extended family</h2>
		<ul class="family__list">
			<?php foreach ( sk_family() as $sk_f ) : ?>
				<li><span class="family__name"><?php echo sk_person( $sk_f[0] ); // phpcs:ignore ?></span> <span class="family__role"><?php echo esc_html( $sk_f[1] ); ?></span></li>
			<?php endforeach; ?>
		</ul>
		<p class="family__love">It's all love.</p>
	</div>
</section>

<section class="live" aria-labelledby="live-title">
	<div class="wrap live__grid">
		<h2 id="live-title" class="knockout knockout--live" style="<?php echo esc_attr( sk_fill_style( 'lr-bass-vocal' ) ); ?>" data-parallax-fill>Live</h2>
		<div class="live__text">
			<p class="kicker">Next: spring and summer 2027</p>
			<p class="lede">The first of Season Three and the best of the first two seasons. Dates to be announced.</p>
			<h3 class="live__sofar">So far</h3>
			<ul class="proof">
				<li>2026: packed the Liquid Room (700 cap) with an all-new set and 11 guests</li>
				<li>2025: sold out the Voodoo Rooms with 14 musicians on stage</li>
				<li>2025: sold out The Jazz Bar after a monthly residency</li>
				<li>2025: Kelburn Garden Party, Hidden Door, and support for Knats</li>
			</ul>
			<ul class="cta-row">
				<li><a class="btn btn--solid" href="<?php echo esc_url( sk_page_url( 'press' ) . '#live' ); ?>">Booking info</a></li>
				<li><a class="btn" href="mailto:<?php echo esc_attr( sk_contact()['email'] ); ?>?subject=<?php echo rawurlencode( 'Booking Slow Karma 2027' ); ?>"><?php echo sk_icon( 'mail' ); // phpcs:ignore ?>Get in touch</a></li>
			</ul>
			<p class="live__follow">Follow <a href="<?php echo esc_url( sk_links()['instagram']['url'] ); ?>" target="_blank" rel="noopener">@slow_karma_</a> to hear about dates first.</p>
		</div>
	</div>
</section>

<?php
get_footer();
