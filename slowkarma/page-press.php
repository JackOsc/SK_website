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
	array( 'slow-karma-dynamite-artwork-dark.jpg', 'dynamite-dark', 'Artwork: incense and dynamite, gold on dark', 'JPG, 2000px', false ),
	array( 'slow-karma-liquid-room-2026-square.jpg', 's2-poster-sq', 'Season Two poster, square', 'JPG, 2000px', false ),
	array( 'slow-karma-season-one-artwork.jpg', 's1-art', 'Season One artwork', 'JPG, 2000px', false ),
	array( 'slow-karma-stage-plot.jpg', 's2-stage-plot', 'Stage plot (Liquid Room, 2026)', 'JPG, A4 landscape', false ),
);
?>

<header class="epk-top" id="live" aria-labelledby="epk-title">
	<div class="wrap">
		<div class="epk-top__grid">
			<div class="epk-top__pitch">
				<p class="kicker">Press kit. Booking now for spring and summer 2027</p>
				<h1 id="epk-title" class="knockout epk-top__title" style="<?php echo esc_attr( sk_fill_style( 'lr-crowd' ) ); ?>" data-parallax-fill>Slow Karma<span class="screen-reader-text"> press kit (EPK)</span></h1>
				<p class="epk-top__creed">Jazz chops. Punk ethos. High production.</p>
				<p class="lede">A five-piece from Leith and an extended family of Scotland's best musicians, running from spiritual jazz to UK dancefloors. Every show is improvised within an architecture, so no two are the same.</p>
				<ul class="epk-proof">
					<li>Packed the 700-cap Liquid Room with an all-new set</li>
					<li>Sold out the Voodoo Rooms and The Jazz Bar</li>
					<li>Kelburn Garden Party, Hidden Door, support for Knats</li>
					<li>Played by Soweto Kinch on BBC Radio 3</li>
				</ul>
				<p class="epk-top__ffo"><span>For fans of</span> Snarky Puppy, Yussef Dayes, corto.alto</p>
				<ul class="cta-row">
					<li><a class="btn btn--solid btn--big" href="mailto:<?php echo esc_attr( $sk_contact['email'] ); ?>?subject=<?php echo rawurlencode( 'Booking Slow Karma 2027' ); ?>"><?php echo sk_icon( 'mail' ); // phpcs:ignore ?>Book us</a></li>
					<li><a class="btn" href="<?php echo esc_url( sk_asset( 'press/slow-karma-stage-plot.jpg' ) ); ?>" download><?php echo sk_icon( 'download' ); // phpcs:ignore ?>Stage plot</a></li>
					<li><a class="btn" href="#full-show"><?php echo sk_icon( 'play' ); // phpcs:ignore ?>Full show</a></li>
				</ul>
			</div>
			<div class="epk-top__clip">
				<?php echo sk_youtube( '-nSLUTwDvPc', 'Slow Karma, Twin', 'player--feature' ); // phpcs:ignore ?>
				<p class="epk-top__caption"><strong>Twin</strong>, the new single, played live in one take at LOSTOSC Studios. 4:26</p>
				<blockquote class="epk-top__quote">
					<p>Slow Karma's bold vision, high energy and prolific output have set them apart.</p>
					<footer><a href="https://www.theskinny.co.uk/music/interviews/spotlight-on-slow-karma" target="_blank" rel="noopener">The Skinny, July 2025</a></footer>
				</blockquote>
			</div>
		</div>

		<div class="epk-top__history">
			<h2 class="h-sub">Ticket history</h2>
			<ol class="tickets">
				<li><span class="tickets__when">Mar 2026</span><span class="tickets__where">The Liquid Room, Edinburgh</span><span class="tickets__cap">700 cap</span><span class="tickets__result">Packed. All-new set, 11 guests</span></li>
				<li><span class="tickets__when">Aug 2025</span><span class="tickets__where">The Jazz Bar, Edinburgh</span><span class="tickets__cap">Headline</span><span class="tickets__result">Sold out, after a monthly residency</span></li>
				<li><span class="tickets__when">Mar 2025</span><span class="tickets__where">The Voodoo Rooms, Edinburgh</span><span class="tickets__cap">Headline</span><span class="tickets__result">Sold out, 14 musicians on stage</span></li>
			</ol>
			<p class="tickets__note">All self-promoted. Also in 2025: Kelburn Garden Party and Hidden Door festivals, and support for Mercury Prize nominated Knats.</p>
			<ul class="epk-top__jump">
				<li><a href="#formats">Live formats</a></li>
				<li><a href="#bio">Bio</a></li>
				<li><a href="#downloads">Photos and logos</a></li>
				<li><a href="#contact">Contact</a></li>
			</ul>
		</div>
	</div>
</header>

<?php
// Edinburgh Jazz and Blues Festival, Mardi Gras 2026. Shows once assets/img/ejbf-mardi-gras-*.webp exists.
$sk_ejbf = sk_img( 'ejbf-mardi-gras', 'Slow Karma playing the Mardi Gras at Edinburgh Jazz and Blues Festival, 2026', array( 'sizes' => '100vw' ) );
if ( $sk_ejbf ) :
	?>
	<figure class="epk-photo">
		<?php echo $sk_ejbf; // phpcs:ignore ?>
		<figcaption>Edinburgh Jazz and Blues Festival, Mardi Gras, 2026</figcaption>
	</figure>
<?php endif; ?>

<section class="section section--tight" aria-label="Key facts">
	<div class="wrap">
		<div class="facts">
			<div class="fact"><span class="fact__big">2024</span>Formed in Leith, Edinburgh.</div>
			<div class="fact"><span class="fact__big">50k+</span>Streams in our first year.</div>
			<div class="fact"><span class="fact__big">Radio 3</span>Played by Soweto Kinch on 'Round Midnight, BBC Radio 3, plus BBC Radio Scotland, BBC Introducing and Amazing Radio.</div>
			<div class="fact"><span class="fact__big"><?php echo (int) count( sk_family() ); ?></span>Musicians in the extended family so far.</div>
		</div>
	</div>
</section>

<section class="section section--alt" id="formats" aria-labelledby="formats-title">
	<div class="wrap">
		<div class="live-pitch">
			<div>
				<h2 id="formats-title" class="h-section">Live formats</h2>
				<p class="lede">In 2027 we'll play the best of the first two seasons and the first of Season Three, scaled to the stage.</p>
				<ul class="cta-row">
					<li><a class="btn btn--solid" href="mailto:<?php echo esc_attr( $sk_contact['email'] ); ?>?subject=<?php echo rawurlencode( 'Booking Slow Karma 2027' ); ?>"><?php echo sk_icon( 'mail' ); // phpcs:ignore ?>Booking enquiries</a></li>
				</ul>
			</div>
			<div>
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

<section class="section section--alt" id="bio" aria-labelledby="bio-title">
	<div class="wrap bios">
		<div>
			<h2 id="bio-title" class="h-section">Bio</h2>
			<p class="bio-short">Jazz chops. Punk ethos. High production.</p>
			<h3 class="h-sub" style="margin-top:2rem">Short</h3>
			<p>Edinburgh's Slow Karma blend virtuosic musicianship with underground spirit and stadium vision. Built around a core five and an extended family of Scotland's most exciting musicians, they make music that runs from spiritual jazz to UK dancefloors. Their Season Two finale packed out the Liquid Room, and the first studio release from it, <em>Twin</em>, is out now.</p>
		</div>
		<div class="prose">
			<h3 class="h-sub">Long</h3>
			<p>Slow Karma formed in Edinburgh in 2024. At the core are Jack Elliot (bass) and David Lloyd (keys), who run LOSTOSC Studios, a recording studio in Leith, with Kyle Grieve on drums, Callum Stevenson on guitar and Jose Rojas on percussion. Around them is an "extended family" of string and horn players and guests, including harpist Dara Dubh, guitarist Sithu Aye and rapper Jurnalist.</p>
			<p>Their influences run from spiritual jazz to experimental hip-hop to stadium pop. They put on their own shows, release their own music and record everything at their own studio.</p>
			<p>The band works in Seasons. Each year builds to a big hometown finale in March, then starts again with new music and new collaborators. Season One brought ten singles, each with its own video, and over 50,000 streams in the first year, with radio play from Soweto Kinch on 'Round Midnight (BBC Radio 3), BBC Radio Scotland, BBC Introducing and Amazing Radio. It ended with a sold-out Voodoo Rooms with 14 musicians on stage, released as a concert film and live album. In 2025 they played Kelburn Garden Party and Hidden Door, supported Mercury Prize nominated Knats, and sold out The Jazz Bar in August after a monthly residency.</p>
			<p>For Season Two they booked the Liquid Room, Edinburgh's 700-capacity venue, a year ahead and wrote a whole new set. On 21 March 2026 they played it to a packed room with eleven guests, some joining without a rehearsal. The show was filmed and recorded as demos for the studio. <em>Twin</em>, released 13 November 2026, is the first of the studio versions, played and filmed live in one take at LOSTOSC Studios. The rest follow through 2027, with the Liquid Room film due on the anniversary of the show.</p>
			<p>They're now in the studio working on Season Three, and playing live in spring and summer 2027.</p>
		</div>
	</div>
</section>

<section class="section" aria-labelledby="lineup-title">
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

<section class="section section--alt" id="downloads" aria-labelledby="downloads-title">
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

<section class="section" id="contact" aria-labelledby="contact-title">
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
