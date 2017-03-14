<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package simona
 */

get_header(); ?>

<div class="row">
	<div id="primary" class="content-area ">
		
		<main id="main" class="site-main col-xs-12" role="main">
             
        <?php if ( is_home() && is_front_page() && ! is_paged() ) { ?>
        	<div id="home-slider">
                <?php /* The slider */ ?>
                <?php simona_slider_from_header() ?>
                <?php if ( get_header_image() ) : ?>
                    <p class="hidden-xs site-description"><?php bloginfo( 'description' ); ?></p>
                <?php endif; ?>
        	</div>
        <?php } ?>

		<?php if ( have_posts() ) : ?>
            
			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
            <?php elseif ( is_archive() ) : ?>
            <header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->
            <?php elseif ( is_search() ) : ?>
            <header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'simona' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->
			<?php endif; ?>
            
            <div class="row">

			<?php /* Start the Loop */ ?>

			<?php while ( have_posts() ) : the_post(); ?>

                <div class="col-sm-6 col-md-4 col-lg-3">
                    
                <?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>
                    
                </div>
			
            <?php endwhile; ?>
    
            </div><!-- .row -->
    
			<?php the_posts_navigation(); ?>

        <?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

</div><!-- .row -->
<?php get_footer(); ?>
