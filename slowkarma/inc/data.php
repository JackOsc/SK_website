<?php
/**
 * Slow Karma site content.
 *
 * Everything the templates print lives here, so the band can update
 * releases, videos, links and EPK facts in one place.
 *
 * @package SlowKarma
 */

defined( 'ABSPATH' ) || exit;

/**
 * Social and streaming links.
 */
function sk_links() {
	return array(
		'spotify'   => array(
			'label' => 'Spotify',
			'url'   => 'https://open.spotify.com/artist/22EyKWBiQGO6JPilYLCDqz',
		),
		'apple'     => array(
			'label' => 'Apple Music',
			'url'   => 'https://music.apple.com/gb/artist/slow-karma/1738924779',
		),
		'tidal'     => array(
			'label' => 'Tidal',
			'url'   => 'https://tidal.com/artist/46883581',
		),
		'bandcamp'  => array(
			'label' => 'Bandcamp',
			'url'   => 'https://slowkarma.bandcamp.com/',
		),
		'youtube'   => array(
			'label' => 'YouTube',
			'url'   => 'https://www.youtube.com/@Slow_Karma',
		),
		'instagram' => array(
			'label' => 'Instagram',
			'url'   => 'https://www.instagram.com/slow_karma_/',
		),
	);
}

/**
 * The WhatsApp group for announcements. Wording and link live here.
 */
function sk_whatsapp() {
	return array(
		'url'    => 'https://chat.whatsapp.com/GvRiXZuR3lk4XfCNyihaWj',
		'line'   => 'We post new releases and big gigs in Scotland to a WhatsApp group. Nothing else, nae spam.',
		'button' => 'Join on WhatsApp',
	);
}

/**
 * Contact details.
 */
function sk_contact() {
	return array(
		'email'    => 'slowkarmauk@gmail.com',
		'location' => 'Leith, Edinburgh',
	);
}

/**
 * Core band, Season Two line-up (from the Liquid Room credits).
 * 'photo' is an image slug in assets/img.
 */
function sk_members() {
	return array(
		array(
			'name'  => 'Jack Elliot',
			'role'  => 'Bass',
			'photo' => 'member-jack',
		),
		array(
			'name'  => 'Kyle Grieve',
			'role'  => 'Drums',
			'photo' => 'member-kyle',
		),
		array(
			'name'  => 'David Lloyd',
			'role'  => 'Keys',
			'photo' => 'member-dave',
		),
		array(
			'name'  => 'Callum Stevenson',
			'role'  => 'Guitar',
			'photo' => 'member-cj',
		),
		array(
			'name'  => 'Jose Rojas',
			'role'  => 'Percussion',
			'photo' => 'member-jose',
		),
	);
}

/**
 * Season One line-up (from the Voodoo Rooms credits).
 */
function sk_members_s1() {
	return array(
		array( 'Callum Stevenson', 'Electric guitar & keys' ),
		array( 'David Lloyd', 'Keys' ),
		array( 'Kyle Grieve', 'Drums' ),
		array( 'Jack Elliot', 'Bass' ),
		array( 'Jack McKay Fletcher', 'Percussion & guitar' ),
	);
}

/**
 * The extended family: everyone credited across both finales and singles.
 */
function sk_family() {
	return array(
		array( 'Jack McKay Fletcher', 'Percussion' ),
		array( 'Dara Dubh', 'Harp' ),
		array( 'Sithu Aye', 'Guitar' ),
		array( 'Jurnalist', 'Vocals' ),
		array( 'Ayla Ersoy', 'Vocals' ),
		array( 'Emma Jane Lloyd', 'Violin' ),
		array( 'Justyna Jablonska', 'Cello' ),
		array( 'Luci Holland', 'Oboe' ),
		array( 'Aki Remally', 'Guitar & vocals' ),
		array( 'Becca Sloan', 'Vocals' ),
		array( 'Iona Lee', 'Vocals' ),
		array( 'Gloria Black', 'Vocals' ),
		array( 'Cathal Murphy', 'Vocals' ),
		array( 'Lesley Wilson', 'Trumpet' ),
		array( 'KC e\'Silva', 'Saxophone' ),
		array( 'Nemo Ganguli', 'Percussion' ),
		array( 'Daniel d\'Lion', 'Guitar & percussion' ),
		array( 'Loam', 'on Fast Money' ),
		array( 'Stillhound', 'on Adoring Host' ),
	);
}

/**
 * Releases, newest first.
 *
 * season: 1 or 2. cover: image slug in assets/img.
 */
function sk_releases() {
	$releases = array(
		array(
			'title'    => 'Twin',
			'date'     => '2026-11-13',
			'with'     => '',
			'type'     => 'Single',
			'year'     => '2026',
			'season'   => 2,
			'cover'    => 'cover-twin',
			'bandcamp' => 'https://slowkarma.bandcamp.com/track/twin',
			'spotify'  => 'https://open.spotify.com/album/5T6Hz4Z63i0VTUogOy0ct4',
			'video'    => '-nSLUTwDvPc',
			'note'     => 'The first studio version from the Liquid Room set. Played and filmed live in one take at LOSTOSC Studios.',
		),
		array(
			'title'    => 'Mystery Of Love',
			'date'     => '2026-03-06',
			'with'     => 'Aki Remally',
			'type'     => 'Live single',
			'year'     => '2026',
			'season'   => 2,
			'cover'    => 'cover-mystery-of-love',
			'bandcamp' => 'https://slowkarma.bandcamp.com/track/mystery-of-love-w-aki-remally-live',
			'spotify'  => '',
			'video'    => '',
			'note'     => '',
		),
		array(
			'title'    => 'Tell Them Slow Karma Sent You',
			'date'     => '2026-01-30',
			'with'     => '',
			'type'     => 'Live album',
			'year'     => '2026',
			'season'   => 1,
			'cover'    => 'cover-tell-them-live',
			'bandcamp' => 'https://slowkarma.bandcamp.com/album/tell-them-slow-karma-sent-you-live-at-voodoo-rooms',
			'spotify'  => 'https://open.spotify.com/album/3K4C71GZkeWYCMVRhsueW7',
			'video'    => 'UXPGUexqhyo',
			'note'     => 'The Season One finale at the Voodoo Rooms, recorded and filmed in full.',
		),
		array(
			'title'    => 'Vogelen',
			'date'     => '2025-10-31',
			'with'     => '',
			'type'     => 'Single',
			'year'     => '2025',
			'season'   => 2,
			'cover'    => 'cover-vogelen',
			'bandcamp' => 'https://slowkarma.bandcamp.com/track/vogelen',
			'spotify'  => '',
			'video'    => 'v9_36MHTrCI',
			'note'     => '',
		),
		array(
			'title'    => 'Price Check',
			'date'     => '2025-07-31',
			'with'     => 'Jurnalist',
			'type'     => 'Single',
			'year'     => '2025',
			'season'   => 1,
			'cover'    => 'cover-price-check',
			'bandcamp' => 'https://slowkarma.bandcamp.com/track/price-check-with-jurnalist',
			'spotify'  => '',
			'video'    => '',
			'note'     => '',
		),
		array(
			'title'    => 'Playing For Keeps',
			'date'     => '2025-02-21',
			'with'     => '',
			'type'     => 'Single',
			'year'     => '2025',
			'season'   => 1,
			'cover'    => 'cover-playing-for-keeps',
			'bandcamp' => 'https://slowkarma.bandcamp.com/track/playing-for-keeps-2',
			'spotify'  => '',
			'video'    => 'pvA22xz3JPg',
			'note'     => '',
		),
		array(
			'title'    => 'Everything Everywhere / Nothing Nowhere',
			'date'     => '2024-11-07',
			'with'     => '',
			'type'     => 'Single',
			'year'     => '2024',
			'season'   => 1,
			'cover'    => 'cover-everything-everywhere',
			'bandcamp' => 'https://slowkarma.bandcamp.com/album/everything-everywhere-nothing-nowhere',
			'spotify'  => '',
			'video'    => '-ueufPT2ilA',
			'note'     => '',
		),
		array(
			'title'    => 'Ride Out',
			'date'     => '2024-10-07',
			'with'     => 'Justyna Jablonska & Emma Jane Lloyd',
			'type'     => 'Single',
			'year'     => '2024',
			'season'   => 1,
			'cover'    => 'cover-ride-out',
			'bandcamp' => 'https://slowkarma.bandcamp.com/album/ride-out-with-justyna-jablonska-emma-jane-lloyd',
			'spotify'  => '',
			'video'    => 'HBezhAfeYC0',
			'note'     => '',
		),
		array(
			'title'    => 'Sober',
			'date'     => '2024-08-30',
			'with'     => 'Sithu Aye',
			'type'     => 'Single',
			'year'     => '2024',
			'season'   => 1,
			'cover'    => 'cover-sober',
			'bandcamp' => 'https://slowkarma.bandcamp.com/track/sober-with-sithu-aye',
			'spotify'  => '',
			'video'    => 'w0IEuABva2o',
			'note'     => '',
		),
		array(
			'title'    => 'Fast Money',
			'date'     => '2024-02-08',
			'with'     => 'Loam',
			'type'     => 'Single',
			'year'     => '2024',
			'season'   => 1,
			'cover'    => 'cover-fast-money',
			'bandcamp' => 'https://slowkarma.bandcamp.com/track/fast-money-with-loam',
			'spotify'  => '',
			'video'    => 'QwJLi84Kmtg',
			'note'     => '',
		),
		array(
			'title'    => 'Don\'t Believe',
			'date'     => '2024-12-07',
			'with'     => '',
			'type'     => 'Single',
			'year'     => '2024',
			'season'   => 1,
			'cover'    => 'cover-dont-believe',
			'bandcamp' => 'https://slowkarma.bandcamp.com/track/dont-believe',
			'spotify'  => '',
			'video'    => 'NO5tqWzc5lU',
			'note'     => '',
		),
		array(
			'title'    => 'Gold Aura',
			'date'     => '2024-06-21',
			'with'     => '',
			'type'     => 'Single',
			'year'     => '2024',
			'season'   => 1,
			'cover'    => 'cover-gold-aura',
			'bandcamp' => 'https://slowkarma.bandcamp.com/track/gold-aura',
			'spotify'  => '',
			'video'    => 'v29_0vhzLIw',
			'note'     => '',
		),
		array(
			'title'    => 'Hot Club',
			'date'     => '2024-05-29',
			'with'     => '',
			'type'     => 'Single',
			'year'     => '2024',
			'season'   => 1,
			'cover'    => 'cover-hot-club',
			'bandcamp' => 'https://slowkarma.bandcamp.com/track/hot-club',
			'spotify'  => '',
			'video'    => 'O9XObnV0BS4',
			'note'     => '',
		),
		array(
			'title'    => 'Still Here',
			'date'     => '2024-04-26',
			'with'     => 'Dara Dubh',
			'type'     => 'Single',
			'year'     => '2024',
			'season'   => 1,
			'cover'    => 'cover-still-here',
			'bandcamp' => 'https://slowkarma.bandcamp.com/track/still-here-with-dara-dubh',
			'spotify'  => '',
			'video'    => 'bLuDLFJb-ds',
			'note'     => 'Their first collaboration: Celtic harp meets spiritual jazz.',
		),
	);
	usort(
		$releases,
		function ( $a, $b ) {
			return strcmp( $b['date'], $a['date'] );
		}
	);
	return $releases;
}

/**
 * YouTube videos, grouped. id => title, length.
 */
function sk_videos() {
	// Each video: YouTube ID, title, length, note, and (optional) the date it
	// went up on YouTube as YYYY-MM-DD. Videos with a date are described to
	// Google on /videos/ so they can show as video results.
	return array(
		'season-two'  => array(
			'title'  => 'Season Two',
			'videos' => array(
				array( '-nSLUTwDvPc', 'Twin', '4:26', 'Live in one take at LOSTOSC Studios.', '2026-11-17' ),
				array( 'v9_36MHTrCI', 'Vogelen', '4:09', '' ),
			),
		),
		'finale'      => array(
			'title'  => 'Season One finale',
			'videos' => array(
				array( 'UXPGUexqhyo', 'Tell Them Slow Karma Sent You', '1:01:50', 'The full concert film. Voodoo Rooms, Edinburgh, 29 March 2025.' ),
				array( '0vWwf4h83LM', 'Adoring Host, with Stillhound (live)', '3:33', 'From the Voodoo Rooms film.' ),
			),
		),
		'season-one'  => array(
			'title'  => 'Season One singles and sessions',
			'videos' => array(
				array( 'pvA22xz3JPg', 'Playing For Keeps (YouTube-only live version)', '4:28', '' ),
				array( '-ueufPT2ilA', 'Everything Everywhere / Nothing Nowhere', '4:23', '' ),
				array( 'HBezhAfeYC0', 'Ride Out, with Justyna Jablonska & Emma Jane Lloyd', '5:16', '' ),
				array( 'w0IEuABva2o', 'Sober, with Sithu Aye', '5:32', '' ),
				array( 'QwJLi84Kmtg', 'Fast Money, with Loam', '4:25', '' ),
				array( 'z_MLchS6JAg', 'Fast Money, with Loam (director\'s cut)', '4:25', '' ),
				array( 'v29_0vhzLIw', 'Gold Aura', '4:42', '' ),
				array( 'O9XObnV0BS4', 'Hot Club', '3:42', '' ),
				array( 'bLuDLFJb-ds', 'Still Here, with Dara Dubh', '6:07', '' ),
				array( 'NO5tqWzc5lU', 'Don\'t Believe (live at LOSTOSC Studios)', '3:54', '' ),
			),
		),
	);
}

/**
 * Finale credits per season (from the film credits).
 */
function sk_finales() {
	return array(
		1 => array(
			'venue'   => 'The Voodoo Rooms',
			'when'    => '29 March 2025',
			'credits' => array(
				array( 'Video produced by', 'Jamie McLardy' ),
				array( 'Audio produced by', 'David Lloyd & Jack Elliot' ),
				array( 'Camera operators', 'Gavin White & Graham Pritz-Bennet' ),
				array( 'Live sound and recording', 'Laurie Corlett-Donald' ),
			),
			'guests'  => array(
				array( 'Dara Dubh', 'Harp' ),
				array( 'Ayla Ersoy', 'Vocals' ),
				array( 'Stillhound', 'Vocals & synthesiser' ),
				array( 'Jurnalist', 'Vocals' ),
				array( 'Lesley Wilson', 'Trumpet' ),
				array( 'KC e\'Silva', 'Saxophone' ),
				array( 'Nemo Ganguli', 'Percussion' ),
				array( 'Sithu Aye', 'Guitar' ),
				array( 'Daniel d\'Lion', 'Guitar' ),
				array( 'Emma Jane Lloyd', 'Violin' ),
				array( 'Justyna Jablonska', 'Cello' ),
			),
			'set'     => array( 'Gold Aura', 'Still Here', 'Drifting Away', 'Adoring Host', 'Tea Ceremony', 'Love Jones (cover)', 'Price Check', 'Playing For Keeps', 'Ride Out', 'Hot Club', 'Sober', 'Everything Everywhere' ),
			'thanks'  => 'Daniel d\'Lion, Laurence De Clippele, Fergus Cook, Jamie McLardy, The Voodoo Rooms, and most importantly everyone who came along to a very special evening.',
		),
		2 => array(
			'venue'   => 'The Liquid Room',
			'when'    => '21 March 2026',
			'credits' => array(
				array( 'Video produced by', 'Jamie McLardy' ),
				array( 'Audio produced by', 'David Lloyd' ),
				array( 'Camera operators', 'Kaung-Myat Aye & Michele Masiello' ),
				array( 'Live sound and recording', 'Laurie Corlett-Donald & Goretti Castellano' ),
				array( 'Production manager', 'Jamie McLardy' ),
				array( 'Lighting', 'Lee Kennedy' ),
				array( 'Stage manager', 'Claire Docherty' ),
			),
			'guests'  => array(
				array( 'Emma Jane Lloyd', 'Violin' ),
				array( 'Justyna Jablonska', 'Cello' ),
				array( 'Luci Holland', 'Oboe' ),
				array( 'Becca Sloan', 'Vocals' ),
				array( 'Iona Lee', 'Vocals' ),
				array( 'Gloria Black', 'Vocals' ),
				array( 'Dara Dubh', 'Harp' ),
				array( 'Aki Remally', 'Guitar & vocals' ),
				array( 'Ayla Ersoy', 'Vocals' ),
				array( 'Cathal Murphy', 'Vocals' ),
				array( 'Sithu Aye', 'Guitar' ),
			),
			'set'     => array( 'Firstborn', 'Vogelen', 'Sour', 'Get Free', 'Neimhidh', 'Unravel', 'New Money', 'Foreverchanging', 'In a Bad Way', 'Sleepwalker', 'Twin' ),
			'thanks'  => '',
		),
	);
}


/**
 * Page meta for SEO. Keyed by page slug ('' = front page).
 */
function sk_page_meta() {
	return array(
		''           => array(
			'title' => 'Slow Karma | Edinburgh band. Jazz chops, punk ethos, high production',
			'desc'  => 'Edinburgh band Slow Karma and their extended family. Season Two is out now, starting with Twin.',
			'image' => 'og-default.jpg',
			'alt'   => 'Slow Karma, photographed in Leith',
		),
		'story'      => array(
			'title' => 'Story',
			'desc'  => 'Five musicians from Leith, a studio, and an extended family of collaborators. How Slow Karma started and how the Seasons work.',
			'image' => 'og-story.jpg',
			'alt'   => 'Slow Karma taking a bow on stage at the Liquid Room',
		),
		'season-one' => array(
			'title' => 'Season One: Tell Them Slow Karma Sent You',
			'desc'  => 'Slow Karma\'s first season: ten singles, then a sold-out Voodoo Rooms with 14 musicians on stage. Watch the full concert film.',
			'image' => 'og-season-one.jpg',
			'alt'   => 'Season One artwork: Tell Them Slow Karma Sent You',
		),
		'season-two' => array(
			'title' => 'Season Two: The Liquid Room',
			'desc'  => 'Slow Karma booked the Liquid Room a year out, wrote a new set and filmed it. Twin is the first studio release.',
			'image' => 'og-season-two.jpg',
			'alt'   => 'Season Two poster: Slow Karma at the Liquid Room, 21 March 2026',
		),
		'videos'     => array(
			'title' => 'Videos',
			'desc'  => 'Twin, the Season One concert film from the Voodoo Rooms, and every Slow Karma single and live session.',
			'image' => 'og-videos.jpg',
			'alt'   => 'Slow Karma playing live at the Liquid Room',
		),
		'music'      => array(
			'title' => 'Music',
			'desc'  => 'Every Slow Karma release, from Still Here with Dara Dubh to Twin. On Bandcamp, Spotify, Apple Music and Tidal.',
			'image' => 'og-music.jpg',
			'alt'   => 'Slow Karma release covers',
		),
		'press'      => array(
			'title' => 'Press kit (EPK)',
			'desc'  => 'Slow Karma press kit (EPK): bio, live and booking info, photos, logos, stage plot and contact.',
			'image' => 'og-press.jpg',
			'alt'   => 'Slow Karma press photo',
		),
	);
}

/**
 * Season Two release order (from the release schedule). The order is
 * fixed; dates are not, so none are shown. 'img' is the title card from
 * the Liquid Room film; 'w' is its width in pixels, used to keep every
 * title at the same letter height. Set 'out' to true and add 'link'
 * (the YouTube video) as each one lands.
 */
function sk_season_two_run() {
	return array(
		array( 'title' => 'Twin', 'img' => 'title-twin', 'w' => 249, 'out' => true, 'link' => 'https://www.youtube.com/watch?v=-nSLUTwDvPc' ),
		array( 'title' => 'Get Free', 'img' => 'title-get-free', 'w' => 404, 'out' => false ),
		array( 'title' => 'Unravel', 'img' => 'title-unravel', 'w' => 368, 'out' => false ),
		array( 'title' => 'Firstborn', 'img' => 'title-firstborn', 'w' => 455, 'out' => false ),
		array( 'title' => 'In a Bad Way', 'img' => 'title-in-a-bad-way', 'w' => 614, 'out' => false ),
		array( 'title' => 'Sleepwalker', 'img' => 'title-sleepwalker', 'w' => 483, 'out' => false ),
		array( 'title' => 'Sour', 'img' => 'title-sour', 'w' => 224, 'out' => false ),
		array( 'title' => 'Foreverchanging', 'img' => 'title-foreverchanging', 'w' => 444, 'out' => false ),
		array( 'title' => 'New Money', 'img' => 'title-new-money', 'w' => 298, 'out' => false ),
	);
}

/**
 * Where to find the extended family. Names in lists link here.
 */
function sk_people_links() {
	return array(
		'Dara Dubh'         => 'https://www.daraplaysharp.com/',
		'Sithu Aye'         => 'https://sithuaye.scot/',
		'Jurnalist'         => 'https://www.youtube.com/@jurnalist_',
		'Ayla Ersoy'        => 'https://www.instagram.com/dreamonenight/',
		'Emma Jane Lloyd'   => 'https://emmajanelloyd.com/',
		'Justyna Jablonska' => 'https://justynacello.com/home',
		'Luci Holland'      => 'https://luciholland.com/',
		'Aki Remally'       => 'https://akiremally.com/',
		'Becca Sloan'       => 'https://www.instagram.com/beccasloan_',
		'Iona Lee'          => 'https://www.ionalee.com/',
		'Gloria Black'      => 'https://www.instagram.com/glo.black/',
		'Cathal Murphy'     => 'https://www.instagram.com/cathalmurphy_music',
		'Lesley Wilson'     => 'https://www.instagram.com/wilson_imsorry/',
		'KC e\'Silva'       => 'https://www.instagram.com/kclou_25/',
		'Nemo Ganguli'      => 'https://www.youtube.com/watch?v=K6V4MWsHqoU&t=249',
		'Daniel d\'Lion'    => 'https://open.spotify.com/artist/6MWP6N6l5uQ3vFbmLLAwYs',
		'Loam'              => 'https://loam-music.bandcamp.com/',
		'Stillhound'        => 'https://stillhound.start.page/',
	);
}
