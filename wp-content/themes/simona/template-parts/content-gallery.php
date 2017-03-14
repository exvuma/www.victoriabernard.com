<?php
/**
 * Template part for displaying gallery posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package simona
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      
    <section class="featured">
		<?php
			// Post thumbnail.
			simona_post_thumbnail();
		?>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) { ?>
			<div class="simona-ribbon-wrapper">
				<div class="simona-ribbon"><?php esc_html_e( 'Featured', 'simona' ); ?></div>
			</div>
		<?php } ?>
        <div class="simona-post-format-wrapper" data-ot="<?php esc_html_e( 'Gallery Post', 'simona' ); ?>" data-ot-target="true" data-ot-style="dark">
            <div class="simona-post-format">
                <i class="fa fa-picture-o"></i>
            </div>
        </div>
	</section>
	
	<header class="entry-header">
        
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php simona_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

</article><!-- #post-## -->
