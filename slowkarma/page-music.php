<?php
/**
 * Music: every release, plus where to listen.
 *
 * @package SlowKarma
 */

get_header();

$sk_all = sk_releases();
?>

<header class="page-hero">
	<div class="wrap">
		<h1 class="knockout page-hero__title" style="<?php echo esc_attr( sk_fill_style( 'lr-keys-bass' ) ); ?>" data-parallax-fill>Music</h1>
		<div class="page-hero__intro">
			<p class="lede">Recorded at Lost Oscillation in Leith, released ourselves, one song at a time.</p>
			<div class="page-hero__aside">
				<?php echo sk_link_list( '', array( 'spotify', 'apple', 'bandcamp' ) ); // phpcs:ignore ?>
			</div>
		</div>
	</div>
</header>

<section class="section" aria-labelledby="latest-title">
	<div class="wrap split split--center">
		<div>
			<p class="kicker">Latest</p>
			<h2 id="latest-title" class="h-section">Twin</h2>
			<p class="lede">The first release of Season Two. Easier to dance to than to count.</p>
			<p>Buying on Bandcamp puts the most money in the band&rsquo;s pocket.</p>
		</div>
		<?php echo sk_spotify( 'album', '5T6Hz4Z63i0VTUogOy0ct4', 'Twin', 352 ); // phpcs:ignore ?>
	</div>
</section>

<section class="section section--alt" aria-labelledby="all-title">
	<div class="wrap">
		<div class="section-head">
			<h2 id="all-title" class="h-section">Every release</h2>
			<p class="voice" style="margin:0;color:var(--muted)">Newest first</p>
		</div>
		<ul class="release-grid">
			<?php
			foreach ( $sk_all as $sk_r ) {
				echo sk_release_card( $sk_r ); // phpcs:ignore
			}
			?>
		</ul>
	</div>
</section>

<section class="section" aria-labelledby="everything-title">
	<div class="wrap split">
		<div>
			<h2 id="everything-title" class="h-section">Everything, in one place</h2>
			<p>The full catalogue on Spotify, from <em>Fast Money</em> to <em>Twin</em>.</p>
			<?php echo sk_link_list( 'links--platforms', array( 'spotify', 'apple', 'bandcamp', 'youtube' ) ); // phpcs:ignore ?>
		</div>
		<?php echo sk_spotify( 'artist', '22EyKWBiQGO6JPilYLCDqz', 'Slow Karma on Spotify', 552 ); // phpcs:ignore ?>
	</div>
</section>

<?php
sk_editor_content();
get_footer();
