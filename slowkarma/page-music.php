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
		'photos' => array( 'lr-keys-mic', 'vr-bass-green', 'l1-07', 'press-fisheye-bw', 'lr-drums-blue', 'vr-keys-blue', 'x-96', 'lr-guitar-lamp', 'vr-cello', 's2-fisheye', 'jb-dara', 'vr-drums' ),
		'intro'  => 'Recorded at LOSTOSC Studios in Leith and released ourselves.',
		'aside'  => array( '<a href="#releases">Every release</a>', 'Buying on Bandcamp supports the band most directly' ),
	)
);
?>

<section class="section" id="releases" aria-labelledby="releases-title">
	<div class="wrap">
		<div class="section-head">
			<h2 id="releases-title" class="h-section">Releases</h2>
			<p class="reel__note">Newest first. Each one opens on Bandcamp.</p>
		</div>
		<ul class="release-grid release-grid--all">
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
