<?php
/**
 * Generic page.
 *
 * @package SlowKarma
 */

get_header();
while ( have_posts() ) :
	the_post();
	?>
<header class="page-hero">
	<div class="wrap">
		<h1 class="knockout page-hero__title page-hero__title--long" style="<?php echo esc_attr( sk_fill_style( 'lr-stage-wide' ) ); ?>" data-parallax-fill><?php the_title(); ?></h1>
	</div>
</header>
<section class="section">
	<div class="wrap prose">
		<?php the_content(); ?>
	</div>
</section>
	<?php
endwhile;
get_footer();
