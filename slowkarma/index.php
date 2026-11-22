<?php
/**
 * Fallback template (blog posts, archives).
 *
 * @package SlowKarma
 */

get_header();
?>
<header class="page-hero">
	<div class="wrap">
		<h1 class="knockout page-hero__title page-hero__title--long" style="<?php echo esc_attr( sk_fill_style( 'lr-stage-wide' ) ); ?>" data-parallax-fill><?php echo esc_html( is_singular() ? get_the_title() : wp_strip_all_tags( get_the_archive_title() ) ); ?></h1>
	</div>
</header>
<section class="section">
	<div class="wrap prose">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				if ( is_singular() ) {
					the_content();
				} else {
					printf( '<h2><a href="%s">%s</a></h2>', esc_url( get_permalink() ), esc_html( get_the_title() ) );
					the_excerpt();
				}
			}
			the_posts_pagination();
		} else {
			echo '<p>Nothing here yet.</p>';
		}
		?>
	</div>
</section>
<?php
get_footer();
