<?php
/**
 * Finale credits block: line-up, guests, setlist, crew.
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
	<div>
		<h3>Slow Karma are</h3>
		<ul>
			<?php foreach ( $sk_lineup as $sk_p ) : ?>
				<li><span><?php echo esc_html( $sk_p[0] ); ?></span><span><?php echo esc_html( $sk_p[1] ); ?></span></li>
			<?php endforeach; ?>
		</ul>
		<h3 style="margin-top:2.2rem">Guest musicians</h3>
		<ul>
			<?php foreach ( $sk_f['guests'] as $sk_p ) : ?>
				<li><span><?php echo esc_html( $sk_p[0] ); ?></span><span><?php echo esc_html( $sk_p[1] ); ?></span></li>
			<?php endforeach; ?>
		</ul>
	</div>
	<div>
		<h3>The set</h3>
		<ol class="setlist">
			<?php foreach ( $sk_f['set'] as $sk_t ) : ?>
				<li><span><?php echo esc_html( $sk_t ); ?></span></li>
			<?php endforeach; ?>
		</ol>
	</div>
	<div>
		<h3>Crew</h3>
		<dl>
			<?php foreach ( $sk_f['credits'] as $sk_c ) : ?>
				<dt><?php echo esc_html( $sk_c[0] ); ?></dt>
				<dd><?php echo esc_html( $sk_c[1] ); ?></dd>
			<?php endforeach; ?>
		</dl>
		<?php if ( $sk_f['thanks'] ) : ?>
			<h3 style="margin-top:2.2rem">Special thanks</h3>
			<p><?php echo esc_html( $sk_f['thanks'] ); ?></p>
		<?php endif; ?>
	</div>
</div>
