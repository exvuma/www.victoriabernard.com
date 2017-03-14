<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package simona
 */

if ( ! function_exists( 'simona_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function simona_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			esc_html_x( 'Posted on %s', 'post date', 'simona' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			esc_html_x( 'by %s', 'post author', 'simona' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'simona_single_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author on single and excerpt.
	 */
	function simona_single_posted_on() {
		printf( '<div class="simona-data published updated" datetime="%1$s"><p class="simona-slab">%2$s</p><p class="simona-slab">%3$s</p><p class="simona-slab">%4$s</p></div>',
			esc_attr( get_the_date( 'c' ) ),
			esc_attr( get_the_date( 'M' ) ),
			esc_attr( get_the_date( 'd' ) ),
			esc_attr( get_the_date( 'Y' ) )
		);

	}
endif;

if ( ! function_exists( 'simona_entry_categories' ) ) :
	/**
	 * Prints HTML with meta information for the categories.
	 */
	function simona_entry_categories() {
		// Hide category text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ' &bull; ', 'simona' ) );
			if ( $categories_list && simona_categorized_blog() ) {
				printf( '<div class="cat-links-wrap"><span class="cat-links">' . esc_html__( 'in %1$s', 'simona' ) . '</span></div>', $categories_list ); // WPCS: XSS OK.
			}

			printf(
				esc_html_x( 'by %s', 'post author', 'simona' ),
				'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
			);
		}
	}
endif;

if ( ! function_exists( 'simona_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the tags and comments.
	 */
	function simona_entry_footer() {
		// Hide tag text for pages.
		if ( 'post' === get_post_type() && is_single() ) {

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( '', 'simona' ) );
			if ( $tags_list ) {
				printf( '<div class="row"><div class="col-sm-7"><span class="tags-links">' . esc_html__( '%1$s', 'simona' ) . '</span></div>', $tags_list ); // WPCS: XSS OK.
			} else {
			?>
				<div class="row"><div class="col-md-6"></div>
				<?php
			}

		?>
			<div class="col-sm-5 post-social-wrapper">
            <div class="post-social-title show-social-share">
                <a><i class="fa fa-share-alt"></i> Share</a>
            </div>
            <div class="post-social">
                <a class="facebook-share" data-title="<?php echo esc_html( get_the_title() ); ?>" href="<?php echo esc_html( get_the_permalink() ); ?>" title="<?php esc_html_e( 'Share this', 'simona' ); ?>"> <i class="fa fa-facebook"></i></a>
                <a class="twitter-share" data-title="<?php echo esc_html( get_the_title() ); ?>" href="<?php echo esc_html( get_the_permalink() ); ?>" title="<?php esc_html_e( 'Tweet this', 'simona' ); ?>"> <i class="fa fa-twitter"></i></a>
                <a class="googleplus-share" data-title="<?php echo esc_html( get_the_title() ); ?>" href="<?php echo esc_html( get_the_permalink() ); ?>" title="<?php esc_html_e( 'Share with Google Plus', 'simona' ); ?>"> <i class="fa fa-google-plus"></i></a>
                
            </div>
        </div>
            </div><!-- .row -->
            <?php

		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( esc_html__( 'Leave a comment', 'simona' ), esc_html__( '1 Comment', 'simona' ), esc_html__( '% Comments', 'simona' ) );
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'simona' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function simona_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'simona_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'simona_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so simona_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so simona_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in simona_categorized_blog.
 */
function simona_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'simona_categories' );
}
add_action( 'edit_category', 'simona_category_transient_flusher' );
add_action( 'save_post',     'simona_category_transient_flusher' );

if ( ! function_exists( 'simona_post_thumbnail' ) ) :
	/**
	 * Display an optional post thumbnail.
	 */
	function simona_post_thumbnail() {
		if ( post_password_required() || is_attachment() ) {
			return;
		}

		if ( is_single() ) :
		?>

		<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div><!-- .post-thumbnail -->

	<?php else : ?>

	<div class="post-thumbnail" >
        
        <a href="<?php the_permalink(); ?>">
            <div class="figure">
                <?php if ( ! has_post_thumbnail() ) { ?>
                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/no-image.png" alt="<?php echo get_the_title(); ?>">
                <?php } else {
					the_post_thumbnail( 'index-thumb', array( 'alt' => get_the_title() ) );
} ?>
                
            </div>
        </a>
</div>

	<?php endif; // End is_singular().
	}
endif;
