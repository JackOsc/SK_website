<?php
/**
 * Music: every release, then where to stream.
 *
 * @package SlowKarma
 */

get_header();

$sk_all = sk_releases();

echo sk_page_hero( // phpcs:ignore
	array(
		'title'  => 'Music',
		'fill'   => 'lr-keys-bass',
		'photos' => array_map(
			function ( $r ) {
				return $r['cover'];
			},
			$sk_all
		),
		'intro'  => 'Recorded at Lost Oscillation in Leith and released ourselves.',
		'aside'  => array( 'Buying on Bandcamp supports the band most directly' ),
		'cover'  => true,
	)
);
?>

<section class="section" aria-label="Releases on Bandcamp">
	<div class="wrap">
		<ul class="release-grid">
			<?php
			foreach ( $sk_all as $sk_r ) {
				echo sk_release_card( $sk_r ); // phpcs:ignore
			}
			?>
		</ul>
	</div>
</section>

<section class="section section--alt" aria-labelledby="stream-title">
	<div class="wrap">
		<h2 id="stream-title" class="h-section">Stream</h2>
		<ul class="platforms">
			<?php foreach ( array( 'spotify', 'apple', 'tidal', 'bandcamp', 'youtube' ) as $sk_key ) : ?>
				<?php $sk_l = sk_links()[ $sk_key ]; ?>
				<li><a href="<?php echo esc_url( $sk_l['url'] ); ?>" target="_blank" rel="noopener"><?php echo sk_icon( $sk_key ); // phpcs:ignore ?><span><?php echo esc_html( $sk_l['label'] ); ?></span></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>

<?php
sk_editor_content();
get_footer();
