<?php
/**
 * Videos.
 *
 * @package SlowKarma
 */

get_header();
?>

<?php
echo sk_page_hero( // phpcs:ignore
	array(
		'title'  => 'Videos',
		'fill'   => 'lr-guitar-lights',
		'photos' => array( 'lr-guitar-vocal', 'vr-singer', 'lr-violin', 'vr-keys-blue', 'lr-dara-harp', 'vr-strings', 'lr-congas-lamp', 'vr-drums', 'lr-vocal-close', 'vr-bass-green', 'lr-keys-bass', 'vr-cello' ),
		'intro'  => 'Every release comes with a film. Live sessions at LOSTOSC Studios and a full concert film.',
		'aside'  => array( '<a href="' . esc_url( sk_links()['youtube']['url'] ) . '" target="_blank" rel="noopener">Subscribe on YouTube</a>' ),
	)
);
?>

<section class="section">
	<div class="wrap">
		<?php foreach ( sk_videos() as $sk_key => $sk_group ) : ?>
			<?php
			$sk_vids = $sk_group['videos'];
			$sk_lead = array_shift( $sk_vids );
			?>
			<div class="video-group" id="<?php echo esc_attr( $sk_key ); ?>">
				<h2 class="h-section"><?php echo esc_html( $sk_group['title'] ); ?></h2>
				<div class="video-lead">
					<?php echo sk_youtube( $sk_lead[0], $sk_lead[1] ); // phpcs:ignore ?>
					<div>
						<h3 class="h-sub"><?php echo esc_html( $sk_lead[1] ); ?></h3>
						<p class="video-card__meta"><?php echo esc_html( $sk_lead[2] ); ?></p>
						<?php if ( $sk_lead[3] ) : ?>
							<p><?php echo esc_html( $sk_lead[3] ); ?></p>
						<?php endif; ?>
					</div>
				</div>
				<?php if ( $sk_vids ) : ?>
					<ul class="video-grid">
						<?php foreach ( $sk_vids as $sk_v ) : ?>
							<li class="video-card">
								<?php echo sk_youtube( $sk_v[0], $sk_v[1] ); // phpcs:ignore ?>
								<p class="video-card__title"><?php echo esc_html( $sk_v[1] ); ?></p>
								<p class="video-card__meta"><?php echo esc_html( $sk_v[2] . ( $sk_v[3] ? '. ' . $sk_v[3] : '' ) ); ?></p>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>
	</div>
</section>

<section class="section section--alt section--tight">
	<div class="wrap section-head" style="margin:0">
		<p class="lede" style="margin:0">The Liquid Room film comes out in 2027.</p>
		<a class="text-link" href="<?php echo esc_url( sk_page_url( 'season-two' ) ); ?>">Season Two</a>
	</div>
</section>

<?php
sk_editor_content();
get_footer();
