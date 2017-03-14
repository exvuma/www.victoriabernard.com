<?php
/**
 * Template part for displaying single post date.
 *
 * @package simona
 */

?>
    
<?php if ( 'post' === get_post_type() ) : ?>
	<div class="entry-meta">
		<?php simona_single_posted_on(); ?>
	</div><!-- .entry-meta -->
<?php endif; ?>
