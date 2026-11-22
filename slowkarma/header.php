<?php
/**
 * Site header.
 *
 * @package SlowKarma
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main">Skip to content</a>

<header class="masthead" data-masthead>
	<div class="masthead__bar">
		<a class="masthead__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Slow Karma, home">
			<img src="<?php echo esc_url( sk_asset( 'img/logo-cream-sm.webp' ) ); ?>" width="240" height="141" alt="Slow Karma">
		</a>

		<nav class="nav" aria-label="Main">
			<?php sk_nav( 'nav__list' ); ?>
		</nav>

		<button class="menu-toggle" type="button" aria-expanded="false" aria-controls="menu" data-menu-toggle>
			<span class="menu-toggle__label">Menu</span>
			<span class="menu-toggle__icon" aria-hidden="true"><i></i><i></i></span>
		</button>
	</div>

	<div class="menu" id="menu" data-menu hidden>
		<nav aria-label="Main (full screen)">
			<?php sk_nav( 'menu__list' ); ?>
		</nav>
		<div class="menu__foot">
			<?php echo sk_link_list( 'links--menu' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
			<a class="menu__mail" href="mailto:<?php echo esc_attr( sk_contact()['email'] ); ?>"><?php echo esc_html( sk_contact()['email'] ); ?></a>
		</div>
	</div>
</header>

<main id="main" class="site-main">
