<?php
/**
 * Press kit (EPK).
 *
 * @package SlowKarma
 */

get_header();

$sk_contact = sk_contact();
$sk_dl      = array(
	array( 'slow-karma-press-photo-2025.jpg', 'hero-main', 'Main press photo', 'JPG, 2400px. Photo: Season Two shoot.', false ),
	array( 'slow-karma-logo-orange.png', 'logo-orange', 'Logo, orange, transparent', 'PNG, 1000px', true ),
	array( 'slow-karma-logo-on-white.jpg', 'logo-orange', 'Logo on white', 'JPG, 2000px', 'paper' ),
	array( 'slow-karma-dynamite-artwork.jpg', 'dynamite-art', 'Artwork: incense and dynamite', 'JPG, 2000px', false ),
	array( 'slow-karma-liquid-room-2026-square.jpg', 's2-poster-alt', 'Season Two poster, square', 'JPG, 2000px', false ),
	array( 'slow-karma-season-one-artwork.jpg', 's1-art', 'Season One artwork', 'JPG, 2000px', false ),
	array( 'slow-karma-stage-plot.jpg', 's2-stage-plot', 'Stage plot (Liquid Room, 2026)', 'JPG, A4 landscape', false ),
);
?>

<?php
echo sk_page_hero( // phpcs:ignore
	array(
		'title'  => 'Press kit',
		'fill'   => 'lr-crowd',
		'photos' => array( 'hero-main', 'lr-guitar-vocal', 'l1-43', 'vr-strings', 'band-wall', 'lr-dara-harp', 'l1-11', 'vr-singer', 'dynamite-art', 'lr-crowd', 'l1-39', 's2-poster-alt' ),
		'intro'  => 'Bio, live and booking info, photos, logos, the stage plot and how to reach us.',
		'aside'  => array( '<a href="#live">Live and booking</a>', '<a href="#bio">Bio</a>', '<a href="#downloads">Photos and logos</a>', '<a href="mailto:' . esc_attr( $sk_contact['email'] ) . '">' . esc_html( $sk_contact['email'] ) . '</a>' ),
	)
);
?>

<section class="section section--tight" aria-label="Key facts">
	<div class="wrap">
		<div class="facts">
			<div class="fact"><span class="fact__big">2024</span>Formed in Leith, Edinburgh.</div>
			<div class="fact"><span class="fact__big">14</span>Musicians on stage at a sold-out Voodoo Rooms.</div>
			<div class="fact"><span class="fact__big">700</span>Capacity of the Liquid Room, booked a year out and packed.</div>
			<div class="fact"><span class="fact__big">50k+</span>Streams in our first year, plus national radio play.</div>
		</div>
	</div>
</section>

<section class="section section--alt" id="live" aria-labelledby="live-title">
	<div class="wrap">
		<div class="live-pitch">
			<div>
				<p class="kicker">Booking now for spring and summer 2027</p>
				<h2 id="live-title" class="h-section">Live</h2>
				<p class="lede">Our shows are improvised within an architecture, so no two are the same. In 2027 we'll play the best of the first two seasons and the first of Season Three.</p>
				<ul class="cta-row">
					<li><a class="btn btn--solid" href="mailto:<?php echo esc_attr( $sk_contact['email'] ); ?>?subject=<?php echo rawurlencode( 'Booking Slow Karma 2027' ); ?>"><?php echo sk_icon( 'mail' ); // phpcs:ignore ?>Booking enquiries</a></li>
					<li><a class="btn" href="<?php echo esc_url( sk_asset( 'press/slow-karma-stage-plot.jpg' ) ); ?>" download><?php echo sk_icon( 'download' ); // phpcs:ignore ?>Stage plot</a></li>
					<li><a class="btn" href="#full-show"><?php echo sk_icon( 'play' ); // phpcs:ignore ?>Watch a full show</a></li>
				</ul>
			</div>
			<div class="live-pitch__cols">
				<div>
					<h3 class="h-sub">Track record</h3>
					<ul class="proof">
						<li>Sold out the Voodoo Rooms, Edinburgh, with 14 musicians on stage (March 2025)</li>
						<li>Packed the Liquid Room, Edinburgh (700 cap) with an all-new set and 11 guests (March 2026)</li>
						<li>Sold-out headline show at The Jazz Bar, Edinburgh, after a monthly residency (August 2025)</li>
						<li>Kelburn Garden Party and Hidden Door festivals</li>
						<li>Support for Mercury Prize nominated Knats</li>
						<li>We promote our own headline shows</li>
					</ul>
				</div>
				<div>
					<h3 class="h-sub">Formats</h3>
					<dl class="formats">
						<dt>Core five</dt>
						<dd>Bass, drums, keys, guitar and percussion. Club stages and supports.</dd>
						<dt>Extended</dt>
						<dd>Add strings, horns and guest vocalists. Festival stages and headline shows.</dd>
						<dt>Full family</dt>
						<dd>A dozen or more on stage, like the Voodoo Rooms and the Liquid Room.</dd>
					</dl>
					<p class="formats__note">Full tech spec on request. Concert films of both season finales are available to programmers.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section" id="full-show" aria-labelledby="fullshow-title">
	<div class="wrap">
		<div class="video-lead">
			<?php echo sk_youtube( 'UXPGUexqhyo', 'Tell Them Slow Karma Sent You: Season One finale concert film' ); // phpcs:ignore ?>
			<div>
				<h2 id="fullshow-title" class="h-sub">Watch a full show</h2>
				<p>The Season One finale at a sold-out Voodoo Rooms, filmed in full.</p>
			</div>
		</div>
	</div>
</section>

<section class="section" id="bio" aria-labelledby="bio-title">
	<div class="wrap bios">
		<div>
			<h2 id="bio-title" class="h-section">Bio</h2>
			<p class="bio-short">Jazz chops. Punk ethos. High production.</p>
			<h3 class="h-sub" style="margin-top:2rem">Short</h3>
			<p>Edinburgh's Slow Karma blend virtuosic musicianship with underground spirit and stadium vision. Built around a core five and an extended family of Scotland's most exciting musicians, they make music that runs from spiritual jazz to UK dancefloors. Their Season Two finale packed out the Liquid Room, and the first studio release from it, <em>Twin</em>, is out now.</p>
		</div>
		<div class="prose">
			<h3 class="h-sub">Long</h3>
			<p>Slow Karma formed in Edinburgh in 2024. At the core are Jack Elliot (bass) and David Lloyd (keys), who run Lost Oscillation, a recording studio in Leith, with Kyle Grieve on drums, Callum Stevenson on guitar and Jose Rojas on percussion. Around them is an "extended family" of string and horn players and guests, including harpist Dara Dubh, guitarist Sithu Aye and rapper Jurnalist.</p>
			<p>Their influences run from spiritual jazz to experimental hip-hop to stadium pop. They put on their own shows, release their own music and record everything at their own studio.</p>
			<p>The band works in Seasons. Each year builds to a big hometown finale in March, then starts again with new music and new collaborators. Season One brought nine singles in a year, national radio play and over 50,000 streams. It ended with a sold-out Voodoo Rooms with 14 musicians on stage, released as a concert film and live album. In 2025 they played Kelburn Garden Party and Hidden Door, supported Mercury Prize nominated Knats, and sold out The Jazz Bar in August after a monthly residency.</p>
			<p>For Season Two they booked the Liquid Room, Edinburgh's 700-capacity venue, a year ahead and wrote a whole new set. On 21 March 2026 they played it to a packed room with eleven guests, some joining without a rehearsal. The show was filmed and recorded as demos for the studio. <em>Twin</em>, released 13 November 2026, is the first of the studio versions, played and filmed live in one take at LOSTOSC. The rest follow through 2027, with the Liquid Room film due on the anniversary of the show.</p>
			<p>Their shows have drawn comparisons with Snarky Puppy, Yussef Dayes and corto.alto. They're now in the studio working on Season Three, and playing live in spring and summer 2027.</p>
		</div>
	</div>
</section>

<section class="section section--paper" aria-label="Press">
	<div class="wrap split split--center">
		<blockquote class="quote">
			<p>Slow Karma's bold vision, high energy and prolific output have set them apart.</p>
			<footer><a href="https://www.theskinny.co.uk/music/interviews/spotlight-on-slow-karma" target="_blank" rel="noopener">The Skinny, Spotlight on Slow Karma</a></footer>
		</blockquote>
		<blockquote class="quote">
			<p>Twin is a heater like.</p>
			<footer>Jack Elliot, Slow Karma, on the first Season Two release</footer>
		</blockquote>
	</div>
</section>

<section class="section" aria-labelledby="latest-title">
	<div class="wrap">
		<div class="video-lead">
			<?php echo sk_youtube( '-nSLUTwDvPc', 'Slow Karma, Twin' ); // phpcs:ignore ?>
			<div>
				<p class="kicker">Latest release, 13 November 2026</p>
				<h2 id="latest-title" class="h-section">Twin</h2>
				<p>Jazz chops, punk energy and UK dancefloor rhythms. Played and filmed live in one take at LOSTOSC, after its first outing at the Liquid Room.</p>
				<ul class="cta-row">
					<li><a class="btn" href="https://open.spotify.com/album/5T6Hz4Z63i0VTUogOy0ct4" target="_blank" rel="noopener"><?php echo sk_icon( 'spotify' ); // phpcs:ignore ?>Spotify</a></li>
					<li><a class="btn" href="https://slowkarma.bandcamp.com/track/twin" target="_blank" rel="noopener"><?php echo sk_icon( 'bandcamp' ); // phpcs:ignore ?>Bandcamp</a></li>
				</ul>
			</div>
		</div>
	</div>
</section>

<section class="section section--alt" aria-labelledby="lineup-title">
	<div class="wrap">
		<h2 id="lineup-title" class="h-section">Line-up</h2>
		<ul class="members">
			<?php foreach ( sk_members() as $sk_m ) : ?>
				<li class="member">
					<?php echo sk_img( $sk_m['photo'], $sk_m['name'], array( 'sizes' => '(min-width: 900px) 18vw, (min-width: 560px) 30vw, 46vw' ) ); // phpcs:ignore ?>
					<span class="member__name"><?php echo esc_html( $sk_m['name'] ); ?></span>
					<span class="member__role"><?php echo esc_html( $sk_m['role'] ); ?></span>
				</li>
			<?php endforeach; ?>
		</ul>
		
	</div>
</section>

<section class="section" id="downloads" aria-labelledby="downloads-title">
	<div class="wrap">
		<div class="section-head">
			<h2 id="downloads-title" class="h-section">Photos, logos and artwork</h2>
			<p class="reel__note">Free to use for press. Hi-res originals on request.</p>
		</div>
		<ul class="downloads">
			<?php foreach ( $sk_dl as $sk_d ) : ?>
				<li class="download">
					<a href="<?php echo esc_url( sk_asset( 'press/' . $sk_d[0] ) ); ?>" download>
						<span class="download__thumb<?php echo $sk_d[4] ? ' download__thumb--contain' : ''; ?><?php echo 'paper' === $sk_d[4] ? ' download__thumb--paper' : ''; ?>">
							<?php echo sk_img( $sk_d[1], '', array( 'sizes' => '(min-width: 900px) 22vw, 45vw' ) ); // phpcs:ignore ?>
						</span>
						<span class="download__label"><?php echo sk_icon( 'download' ); // phpcs:ignore ?><?php echo esc_html( $sk_d[2] ); ?></span>
						<span class="download__meta"><?php echo esc_html( $sk_d[3] ); ?></span>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>

<section class="section section--alt" aria-labelledby="contact-title">
	<div class="wrap split split--center">
		<div class="contact-block">
			<h2 id="contact-title" class="h-section">Contact</h2>
			<p>Bookings, press and everything else:</p>
			<a class="contact-block__mail" href="mailto:<?php echo esc_attr( $sk_contact['email'] ); ?>"><?php echo esc_html( $sk_contact['email'] ); ?></a>
		</div>
		<div>
			<h3 class="h-sub">Links</h3>
			<?php echo sk_link_list( 'links--footer' ); // phpcs:ignore ?>
		</div>
	</div>
</section>

<?php
sk_editor_content();
get_footer();
