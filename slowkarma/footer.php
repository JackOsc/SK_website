<?php
/**
 * Site footer.
 *
 * @package SlowKarma
 */

$sk_contact = sk_contact();
?>
</main>

<footer class="footer">
	<div class="wrap footer__grid">
		<div class="footer__sign">
			<p class="footer__line">Tell them Slow Karma sent you.</p>
			<img class="footer__logo" src="<?php echo esc_url( sk_asset( 'img/logo-orange.webp' ) ); ?>" width="720" height="422" alt="" loading="lazy" decoding="async">
		</div>

		<div class="footer__col">
			<h2 class="footer__head">Listen and follow</h2>
			<?php echo sk_link_list( 'links--footer' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
		</div>

		<div class="footer__col">
			<h2 class="footer__head">Bookings, press and everything else</h2>
			<p><a class="footer__mail" href="mailto:<?php echo esc_attr( $sk_contact['email'] ); ?>"><?php echo esc_html( $sk_contact['email'] ); ?></a></p>
			<p>Based at Music Base, 125 Great Junction Street, <?php echo esc_html( $sk_contact['location'] ); ?>.</p>
			<p><a href="<?php echo esc_url( sk_page_url( 'press' ) ); ?>">Press kit, photos and logos</a></p>
		</div>
	</div>
	<div class="wrap footer__base">
		<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> Slow Karma</p>
		<?php sk_nav( 'footer__nav' ); ?>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
