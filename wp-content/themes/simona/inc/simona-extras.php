<?php
/**
 * Custom functions for this theme.
 *
 * @package simona
 */

if ( ! function_exists( 'simona_slider_from_header' ) ) :
	/**
	 * Build a slider form custom header uploads.
	 */
	function simona_slider_from_header() {
		if ( get_header_image() ) :

			$headers = get_uploaded_header_images();

			if ( is_random_header_image() ) {
				shuffle( $headers );
			} ?>

				<div class="header-slider">
  
                <?php foreach ( $headers as $header ) { ?>
                    <img src="<?php echo esc_url( $header['url'] ); ?>">
                <?php } ?>
                  
				</div>
                
		<?php endif;
	}
endif;

if ( ! function_exists( 'simona_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog
	 *
	 * @see simona_custom_header_setup().
	 */
	function simona_header_style() {
		$header_text_color = get_header_textcolor();

		// If no custom options for text are set, let's bail
		// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value.
		if ( HEADER_TEXTCOLOR === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
        .site-description {
            clip: rect(1px, 1px, 1px, 1px);
        }
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
        .site-description {
            color: #<?php echo esc_attr( $header_text_color ); ?>;
            border-color: #<?php echo esc_attr( $header_text_color ); ?>;
            clip: auto;
        }
	<?php endif; ?>
    </style>
	<?php
	}
endif; // Simona_header_style.

if ( ! function_exists( 'simona_comment_form_fields' ) ) :
	/**
	 * Custom comment form fields
	 * @param array $fields The default comment fields.
	 */
	function simona_comment_form_fields( $fields ) {
		// Include these if you intend to use them.
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );

		// Your code here!
		$fields = array(

		'author' =>
		'<div class="row"><div class="comment-form-author col-md-4"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
		'" placeholder="' . esc_html__( 'Your full name', 'simona' ) . ( $req ? '*' : '' ) . '" /></div>',

		'email' =>
		'<div class="comment-form-email col-md-4"><input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) .
		'" placeholder="' . esc_html__( 'Email address', 'simona' ) . ( $req ? '*' : '' ) . '" /></div>',

		'url' =>
		'<div class="comment-form-url col-md-4"><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
		'" placeholder="' . esc_html__( 'Website', 'simona' ) . '" /></div></div>',
		);
		// Return.
		return $fields;
	}
endif;
add_filter( 'comment_form_default_fields', 'simona_comment_form_fields' );

if ( ! function_exists( 'simona_gallery_atts' ) ) :
	/**
	 * Custom comment form fields
	 *
	 * @param array $output The shortcode_atts() merging of $pairs and $atts.
	 * @param array $pairs The default attributes defined for the shortcode.
	 * @param array $atts The attributes supplied by the user within the shortcode.
	 */
	function simona_gallery_atts( $output, $pairs, $atts ) {
		$output['size'] = 'gallery-thumb';
		return $output;
	}
endif;
add_filter( 'shortcode_atts_gallery', 'simona_gallery_atts', 10, 3 );

if ( ! function_exists( 'simona_prepend_attachment' ) ) :
	/**
	 * Set default image size on the attachment pages.
	 */
	function simona_prepend_attachment() {
		return '<p>' . wp_get_attachment_link( 0, 'full', false ) . '</p>';
	}
endif;
add_filter( 'prepend_attachment', 'simona_prepend_attachment' );
