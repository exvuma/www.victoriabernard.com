<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package simona
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
        
        <?php if ( get_theme_mod( 'simona_custom_instagram' ) ) { ?>
        <div class="simona-instagram" data-inst="<?php echo esc_html( get_theme_mod( 'simona_custom_instagram' ) ); ?>">
            <h3 class="simona-instagram-title"><?php esc_html_e( 'Follow me on Instagram!', 'simona' ); ?></h3>
            <div class="simona-instagram-wrapper"></div>
        </div>
        <?php } ?>

		<div class="site-info">
			<?php if ( ! get_theme_mod( 'simona_footer_text' ) ) { ?>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'simona' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s.', 'simona' ), 'WordPress' ); ?></a>
				<?php printf( esc_html__( '%1$s Theme, %3$s by %2$s.', 'simona' ), 'Simona', '<a href="' . esc_url( 'http://wp-themes.it/' ) . '" rel="designer">Pasquale Bucci</a>', 'crafted with <i id="cuore" class="fa fa-heart animated infinite pulse"></i>' ); ?>
			<?php } else { ?>
				<?php echo esc_html( get_theme_mod( 'simona_footer_text' ) ); ?>
			<?php } ?>
        </div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
