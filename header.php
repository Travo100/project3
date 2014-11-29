<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package mat225-thompson
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'mat225-thompson' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
	 
    
     
     <nav id="site-navigation" class="main-navigation" role="navigation">
      <div class="container">
      <div class="tt-blog-name col-sm-2">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
      </div>
      <button class="fa fa-bars menu-toggle"></button>
      <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'sf-menu', ) ); ?>
      </div>
    </nav><!-- #site-navigation -->
    <!--<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div>-->

		
	</header><!-- #masthead -->
  <div class="container">
	<div id="content" class="site-content">