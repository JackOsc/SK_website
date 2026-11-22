<?php
/**
 * Finale credits, laid out like the end credits of the film:
 * centred headings, names and roles meeting at a centre line.
 * Expects $args['season'] (1 or 2).
 *
 * @package SlowKarma
 */

$sk_season = isset( $args['season'] ) ? (int) $args['season'] : 1;
$sk_f      = sk_finales()[ $sk_season ];
$sk_lineup = 1 === $sk_season ? sk_members_s1() : array_map(
	function ( $m ) {
		return array( $m['name'], $m['role'] );
	},
	sk_members()
);
?>
<div class="credits">
	<div class="credits__col">
		<?php foreach ( $sk_f['credits'] as $sk_c ) : ?>
			<div class="credits__block">
				<h3><?php echo esc_html( $sk_c[0] ); ?></h3>
				<p class="credits__solo"><?php echo esc_html( $sk_c[1] ); ?></p>
			</div>
		<?php endforeach; ?>
	</div>

	<div class="credits__col">
		<div class="credits__block">
			<h3>Slow Karma are</h3>
			<dl class="credits__pairs">
				<?php foreach ( $sk_lineup as $sk_p ) : ?>
					<dt><?php echo esc_html( $sk_p[0] ); ?></dt><dd><?php echo esc_html( $sk_p[1] ); ?></dd>
				<?php endforeach; ?>
			</dl>
		</div>
		<div class="credits__block">
			<h3><?php echo 2 === $sk_season ? 'Guest musicians, in order of appearance' : 'Guest musicians'; ?></h3>
			<dl class="credits__pairs">
				<?php foreach ( $sk_f['guests'] as $sk_p ) : ?>
					<dt><?php echo sk_person( $sk_p[0] ); // phpcs:ignore ?></dt><dd><?php echo esc_html( $sk_p[1] ); ?></dd>
				<?php endforeach; ?>
			</dl>
		</div>
	</div>

	<div class="credits__col">
		<div class="credits__block">
			<h3>Tracks</h3>
			<ol class="credits__set">
				<?php foreach ( $sk_f['set'] as $sk_t ) : ?>
					<li><?php echo esc_html( $sk_t ); ?></li>
				<?php endforeach; ?>
			</ol>
		</div>
		<?php if ( $sk_f['thanks'] ) : ?>
			<div class="credits__block">
				<h3>Special thanks</h3>
				<p class="credits__solo credits__solo--small"><?php echo esc_html( $sk_f['thanks'] ); ?></p>
			</div>
		<?php endif; ?>
	</div>
</div>
