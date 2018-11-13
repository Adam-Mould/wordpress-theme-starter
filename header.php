<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="site" class="site-content">
	<a class="sr-only sr-only-focusable" href="#site"><?php esc_html_e( 'Skip to content', 'text-domain' ); ?></a>

	<header class="site-header">
		<?php the_custom_logo(); ?>

		<nav id="siteNavigation" class="site-navigation">
			<button class="site-navigation-toggle" aria-controls="headerMenu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'text-domain' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'header-menu',
				'menu_id' => 'headerMenu',
				'container' => null,
			) );
			?>
		</nav><!-- #site-navigation -->

		<div><?php	the_company_telephone(); ?></div>
	</header>

	<div id="content" class="page-content">
