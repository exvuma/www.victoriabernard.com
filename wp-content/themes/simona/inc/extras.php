<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package simona
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function simona_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	if ( get_theme_mod( 'simona_custom_instagram' ) ) {
		$classes[] = 'simona-insta-ok';
	}
	if ( is_front_page() ) {
		$classes[] = 'simona-front-page';
	}

	return $classes;
}
add_filter( 'body_class', 'simona_body_classes' );
