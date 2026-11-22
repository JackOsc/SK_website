<?php
/**
 * Not found.
 *
 * @package SlowKarma
 */

get_header();
?>
<section class="lost">
	<div class="wrap">
		<p class="knockout page-hero__title" style="<?php echo esc_attr( sk_fill_style( 'lr-crowd-seated' ) ); ?>" data-parallax-fill>Lost</p>
		<h1 class="h-section">This page has gone walkabout.</h1>
		<p class="lede">The link may be old, or mistyped. Try the <a href="<?php echo esc_url( home_url( '/' ) ); ?>">home page</a>, the <a href="<?php echo esc_url( sk_page_url( 'music' ) ); ?>">music</a> or the <a href="<?php echo esc_url( sk_page_url( 'videos' ) ); ?>">videos</a>.</p>
	</div>
</section>
<?php
get_footer();
