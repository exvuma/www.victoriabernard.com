<?php
/**
 * Simona Theme Customizer.
 *
 * @package simona
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function simona_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->get_section( 'colors' )->title = __( 'Theme Colors', 'simona' );
	$wp_customize->get_section( 'header_image' )->title = __( 'Header Slider', 'simona' );

	$wp_customize->get_control( 'display_header_text' )->label = __( 'Show Tagline in Header Slider', 'simona' );
	$wp_customize->get_control( 'header_textcolor' )->label = __( 'Tagline Text Color', 'simona' );
}
add_action( 'customize_register', 'simona_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function simona_customize_preview_js() {
	wp_enqueue_script( 'simona_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'simona_customize_preview_js' );
