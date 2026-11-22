<?php
/**
 * Videos.
 *
 * @package SlowKarma
 */

get_header();
?>

<header class="page-hero">
	<div class="wrap">
		<h1 class="knockout page-hero__title" style="<?php echo esc_attr( sk_fill_style( 'lr-guitar-lights' ) ); ?>" data-parallax-fill>Videos</h1>
		<div class="page-hero__intro">
			<p class="lede">Everything we release comes with a film: live sessions at LOSTOSC, two full concert films, and the odd director&rsquo;s cut.</p>
			<div class="page-hero__aside">
				<p><a href="<?php echo esc_url( sk_links()['youtube']['url'] ); ?>" target="_blank" rel="noopener">Subscribe on YouTube</a></p>
				<p>Videos play from YouTube when you press play.</p>
			</div>
		</div>
	</div>
</header>

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
		<p class="lede" style="margin:0">The Liquid Room film arrives in 2027, on the anniversary of the show.</p>
		<a class="text-link" href="<?php echo esc_url( sk_page_url( 'season-two' ) ); ?>">Season Two</a>
	</div>
</section>

<?php
sk_editor_content();
get_footer();
