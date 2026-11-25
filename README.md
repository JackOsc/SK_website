# slowkarma.co.uk

Custom WordPress theme for Slow Karma. The theme lives in `slowkarma/`.

## What's in it

| Page | Template | What it does |
| --- | --- | --- |
| Home | `front-page.php` | Knockout hero, Twin with YouTube player, the Seasons, story teaser, releases, concert film, live |
| Story | `page-story.php` | Who the band are, the three pillars, timeline, core five, extended family, the Seasons |
| Season One | `page-season-one.php` | Voodoo Rooms finale: film, artwork, the first five (Jack McKay Fletcher portrait), singles, credits and setlist |
| Season Two | `page-season-two.php` | Liquid Room: how it was made, All change (Jose Rojas portrait, the lyric brief), Twin players, the release run, photos, credits, stage plot |
| Videos | `page-videos.php` | Every YouTube video, grouped by season |
| Music | `page-music.php` | Photo header, then every release as one grid (cover links to Bandcamp, title and year under it), then Spotify, Apple Music, Tidal, Bandcamp, YouTube |
| Press kit | `page-press.php` | EPK. The top (`/press/#live`, for festival applications) is built to work in 30 seconds: pitch, four proof points, Twin, The Skinny quote and the booking button, then ticket history. Then the Edinburgh Jazz and Blues Festival photo (shows once `assets/img/ejbf-mardi-gras-<width>.webp` exists), facts, live formats, full show, bio, line-up, downloads, contact |

Pages are matched by slug (`story`, `season-one`, `season-two`, `videos`, `music`, `press`). Those URLs work even if the WordPress pages don't exist (see `inc/routing.php`). On activation, and on the first dashboard visit after each theme update, the theme creates any missing pages so they appear in the editor. Anything typed into a page in the WordPress editor appears below the designed sections.

## Updating content

Almost everything lives in **`slowkarma/inc/data.php`**:

- `sk_releases()`: add a new release at any position (they sort by `date`). Put its cover in `assets/img/cover-<slug>.webp` (400x400).
- `sk_season_two_run()`: Season Two release order, with title cards from the Liquid Room film (`assets/img/title-*.webp`, all scaled to the same letter height). Set `'out' => true` and add the YouTube `link` as each track lands.
- `sk_videos()`: YouTube IDs, titles, lengths.
- `sk_members()`, `sk_family()`, `sk_finales()`: line-ups, collaborators, credits and setlists. `sk_people_links()`: where each collaborator's name links to.
- `sk_page_meta()`: SEO titles and descriptions per page.

Plain captioned portraits use `sk_portrait( $slug, $alt, $caption )`. Page headers use `sk_page_hero()` (title plus three drifting photo columns) and galleries use `sk_reel()` (a row of photos that slides sideways as you scroll), both in `inc/helpers.php`. Images are WebP in `assets/img/` named `<slug>-<width>.webp`; the theme builds `srcset` automatically from whatever widths exist. Knockout headings use `<slug>-ko.webp` when present (the photo with its shadows lifted to orange).

The Dynamite artwork on the homepage is a "magic painting" that comes alive as you scroll past it: the stars twinkle and light runs out along the rays, the two fuses catch and burn down to the sticks (scrolling back un-burns them), the incense smokes and the smoke bends with the scroll, the candles flicker, the snake's tail flicks when the page moves, its tongue tastes the air and a soft sheen slides along its scales (faster while you scroll). The clock bell rattles now and then, the paper crane rocks on its wingtip, the candle flames stretch and lean, and the pig on the Maya packet winks. The glow is kept low so the movement leads. The tail tip and tongue are separate images cut from the artwork (`magic-*.webp`, with `magic-light` and `magic-skin` as masks for what may glow), the rest is drawn on a canvas in `assets/js/main.js`. To rebuild those images from the original drawing, run `python3 tools/magic_painting.py`. Visitors with reduced motion turned on see the still artwork.

## Performance and SEO

- No jQuery, no page builder, no block CSS on the front end. One CSS file (~30KB) and one small deferred script.
- Fonts self-hosted and subset: Niagara Solid (headings, the band's own font; needs a webfont licence), Literata (body and italic voice lines), SIL OFL.
- YouTube, Spotify and Bandcamp players load nothing from those sites until someone presses play.
- Titles, meta descriptions, canonical links, Open Graph / Twitter cards, and JSON-LD (`MusicGroup`, members, `sameAs` socials, releases, breadcrumbs). Stands down if Yoast, Rank Math or Jetpack SEO is active.
- Images have width/height set, so there is no layout shift.

## Domain

The site's address is **slowkarma.co.uk**. In WordPress.com, set it as the primary domain and add slowkarma.uk to the same site, so it redirects there. `sk_canonical_host()` in `inc/routing.php` also sends slowkarma.uk visitors to the site's own address, if the host ever serves both.

## Installing

Zip the `slowkarma` folder (or use the release zip) and upload it in **Appearance > Themes > Add New > Upload Theme**. On WordPress.com this needs a paid plan (Personal or above).
