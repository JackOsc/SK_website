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
	<h1 id="hero-title" class="knockout knockout--hero" style="<?php echo esc_attr( sk_fill_style( 'hero-fill', 1800 ) ); ?>" data-parallax-fill>
		<span>Slow</span> <span>Karma</span>
	</h1>
	<p class="hero__now">Season Two, first release <a href="#twin-title">Twin, out now</a></p>
	<div class="hero__foot wrap">
		<p class="hero__creed">Jazz chops.<br>Punk ethos.<br>High production.</p>
		<p class="hero__where">An Edinburgh band and an extended family of Scotland&rsquo;s most exciting musicians.</p>
	</div>
</section>

<section class="feature" aria-labelledby="twin-title">
	<div class="wrap feature__grid">
		<div class="feature__text">
			<p class="kicker">Season Two, first release. Out now.</p>
			<h2 id="twin-title" class="feature__title">Twin</h2>
			<p class="lede">Breakbeats, UK garage, Miles and Bird. Played and filmed live in one take at LOSTOSC, after its first outing in front of a packed Liquid Room.</p>
			<p class="lede lede--quiet">Easier to dance to than to count.</p>
			<ul class="cta-row">
				<li><a class="btn btn--solid" href="<?php echo esc_url( $sk_twin['spotify'] ); ?>" target="_blank" rel="noopener"><?php echo sk_icon( 'spotify' ); // phpcs:ignore ?>Listen on Spotify</a></li>
				<li><a class="btn" href="<?php echo esc_url( $sk_twin['bandcamp'] ); ?>" target="_blank" rel="noopener"><?php echo sk_icon( 'bandcamp' ); // phpcs:ignore ?>Buy on Bandcamp</a></li>
				<li><a class="btn" href="<?php echo esc_url( sk_links()['apple']['url'] ); ?>" target="_blank" rel="noopener"><?php echo sk_icon( 'apple' ); // phpcs:ignore ?>Apple Music</a></li>
			</ul>
		</div>
		<div class="feature__media">
			<?php echo sk_youtube( '-nSLUTwDvPc', 'Slow Karma, Twin', 'player--feature' ); // phpcs:ignore ?>
		</div>
	</div>
</section>

<figure class="bleed" aria-label="The band">
	<div class="bleed__img" data-parallax>
		<?php echo sk_img( 'x-131', 'Slow Karma photographed in Leith for Season Two', array( 'sizes' => '100vw' ) ); // phpcs:ignore ?>
	</div>
</figure>

<section class="seasons" aria-labelledby="seasons-title">
	<div class="wrap">
		<div class="seasons__intro">
			<?php echo sk_knockout( 'The Seasons', 'lr-stage-wide', 'h2', 'knockout--section' ); // phpcs:ignore ?>
			<p class="lede">Slow Karma moves in cycles. Each year builds to one all-out hometown show, the season finale, with everything we&rsquo;ve made and everyone we&rsquo;ve made it with. Then the wheel turns, and we start again with all new music.</p>
		</div>

		<ol class="season-cards">
			<li class="season-card season-card--s1">
				<a href="<?php echo esc_url( sk_page_url( 'season-one' ) ); ?>">
					<span class="season-card__art"><?php echo sk_img( 's1-art', '', array( 'sizes' => '(min-width: 900px) 33vw, 100vw' ) ); // phpcs:ignore ?></span>
					<span class="season-card__num">Season One</span>
					<span class="season-card__title">Tell Them Slow Karma Sent You</span>
					<span class="season-card__desc">Nine singles in a year, then a sold-out Voodoo Rooms with 14 musicians on stage.</span>
				</a>
			</li>
			<li class="season-card season-card--s2">
				<a href="<?php echo esc_url( sk_page_url( 'season-two' ) ); ?>">
					<span class="season-card__art"><?php echo sk_img( 's2-poster-alt', '', array( 'sizes' => '(min-width: 900px) 33vw, 100vw' ) ); // phpcs:ignore ?></span>
					<span class="season-card__num">Season Two</span>
					<span class="season-card__title">The Liquid Room</span>
					<span class="season-card__desc">A 700-capacity room booked a year out, a whole new set, and the studio versions arriving now.</span>
				</a>
			</li>
			<li class="season-card season-card--s3">
				<div>
					<span class="season-card__art" aria-hidden="true"><?php echo sk_img( 'l1-40', '', array( 'sizes' => '(min-width: 900px) 33vw, 100vw' ) ); // phpcs:ignore ?></span>
					<span class="season-card__num">Season Three</span>
					<span class="season-card__title">Wintering</span>
					<span class="season-card__desc">Back in the studio building new sounds for a big spring and summer 2027: the hits from the first two seasons, and all new work.</span>
				</div>
			</li>
		</ol>
	</div>
</section>

<section class="story-teaser" aria-labelledby="story-title">
	<div class="wrap story-teaser__grid">
		<div class="story-teaser__img">
			<?php echo sk_img( 'l1-07', 'Jack Elliot pouring a drink over a chessboard, incense smoke behind him', array( 'sizes' => '(min-width: 900px) 50vw, 100vw' ) ); // phpcs:ignore ?>
		</div>
		<div class="story-teaser__text">
			<h2 id="story-title" class="h-display">A stick of incense in one hand, a stick of dynamite in the other.</h2>
			<p>Slow Karma started in 2024 at Music Base in Leith, where the band run studios, teach, and make records for other people. The band is the place we use everything we&rsquo;ve learned to make the music that only we can make.</p>
			<p>Around the core five is an extended family: harpists and MCs, string players and prog guitar heroes, poets and singers. It&rsquo;s not a guest list. It&rsquo;s the band.</p>
			<p><a class="text-link" href="<?php echo esc_url( sk_page_url( 'story' ) ); ?>">Read the story</a></p>
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
		<?php echo sk_link_list( 'links--platforms', array( 'spotify', 'apple', 'bandcamp', 'youtube' ) ); // phpcs:ignore ?>
	</div>
</section>

<section class="film-feature" aria-labelledby="film-title">
	<div class="wrap film-feature__grid">
		<div class="film-feature__text">
			<h2 id="film-title" class="h-section">Watch the Season One finale</h2>
			<p>Sixty-one minutes, fourteen musicians, one sold-out room. The full concert film from the Voodoo Rooms.</p>
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
				<li><span class="family__name"><?php echo esc_html( $sk_f[0] ); ?></span> <span class="family__role"><?php echo esc_html( $sk_f[1] ); ?></span></li>
			<?php endforeach; ?>
		</ul>
		<p class="family__love">It&rsquo;s all love.</p>
	</div>
</section>

<section class="live" aria-labelledby="live-title">
	<div class="wrap live__grid">
		<?php echo sk_knockout( 'Live', 'lr-bass-vocal', 'h2', 'knockout--live' ); // phpcs:ignore ?>
		<div class="live__text">
			<p class="kicker">Spring and summer 2027</p>
			<p class="lede">Two seasons of hits and the first sounds of Season Three. From a tight core five to a full extended-family show with a dozen or more on stage.</p>
			<ul class="proof">
				<li>Sold out the Voodoo Rooms with 14 on stage</li>
				<li>Packed the 700-capacity Liquid Room with an all-new set</li>
				<li>Sold out The Jazz Bar</li>
				<li>Kelburn Garden Party, Hidden Door, support for Knats</li>
			</ul>
			<ul class="cta-row">
				<li><a class="btn btn--solid" href="<?php echo esc_url( sk_page_url( 'press' ) . '#live' ); ?>">Booking info</a></li>
				<li><a class="btn" href="mailto:<?php echo esc_attr( sk_contact()['email'] ); ?>?subject=<?php echo rawurlencode( 'Booking Slow Karma 2027' ); ?>"><?php echo sk_icon( 'mail' ); // phpcs:ignore ?>Get in touch</a></li>
			</ul>
			<p class="live__follow">Fans: follow <a href="<?php echo esc_url( sk_links()['instagram']['url'] ); ?>" target="_blank" rel="noopener">@slow_karma_</a> to hear about dates first.</p>
		</div>
	</div>
</section>

<?php
get_footer();
