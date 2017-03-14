<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package simona
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="loader-wrapper">
		<div id="loader"></div>
		<div class="loader-section section-left"></div>
     	<div class="loader-section section-right"></div>
    </div>
	
    <div id="overlay"></div>
	
    <nav id="site-navigation" class="main-navigation" role="navigation">
        <div class="close-menu">
            <i class="fa fa-times"></i>
        </div>
		<div class="nano">
            <div class="nano-content">
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'nav-menu' ) ); ?> 
            </div><!-- .nano-content -->
        </div><!-- .nano -->
        
    </nav><!-- #site-navigation -->

    <div id="simona-search-window" class="simona-search">
        <div class="close-search">
            <i class="fa fa-times"></i>
        </div>
        
        <?php get_search_form(); ?>
        <div class="simona-hint"><?php esc_html_e( 'Press enter to search', 'simona' ); ?></div>
    </div>
    
    <div id="page" class="hfeed site">
    
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'simona' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		
        <div class="site-branding col-sm-8 col-xs-12">
			<?php if ( is_front_page() && is_home() && ! get_theme_mod( 'simona_logo' ) ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php elseif ( ! get_theme_mod( 'simona_logo' ) ) : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php else : ?>
				<img class="simona-logo" src="<?php echo get_theme_mod( 'simona_logo' ); ?>" alt="<?php echo get_bloginfo('name'); ?>">
			<?php endif; ?>
		</div><!-- .site-branding -->
        
        <div class="col-sm-4 col-xs-12">
            <div class="icon-bar-wrapper">
                <a id="simona-search" href="#">
                    <i class="fa fa-search"></i>
                </a>
                <a id="simona-menu" href="#">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>

	</header><!-- #masthead -->

	<div id="content" class="site-content container-fluid">
