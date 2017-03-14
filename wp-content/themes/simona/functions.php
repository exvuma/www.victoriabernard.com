<?php
/**
 * Simona functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package simona
 */

if ( ! function_exists( 'simona_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function simona_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on simona, use a find and replace
		 * to change 'simona' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'simona', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 800, 500, array( 'center', 'top' ) );
		add_image_size( 'simona-index-thumb', 390, 450, array( 'center', 'top' ) );
		add_image_size( 'simona-gallery-thumb', 800, 600, array( 'center', 'top' ) );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'simona' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * Enable support for Post Formats.
		 * See https://developer.wordpress.org/themes/functionality/post-formats/
		 */
		add_theme_support( 'post-formats', array(
			'audio',
			'gallery',
			'video',
		) );

		/**
	* Set up the WordPress core custom header feature.
	*
	* @uses simona_header_style()
	*/
		add_theme_support( 'custom-header', apply_filters( 'simona_custom_header_args', array(
			'default-text-color'     => 'ffffff',
			'width'                  => 1600,
			'height'                 => 800,
			'flex-height'            => true,
			'wp-head-callback'       => 'simona_header_style',
		) ) );

	}
endif; // Simona_setup.
add_action( 'after_setup_theme', 'simona_setup' );

if ( ! function_exists( 'simona_fonts_url' ) ) :
	/**
	 * Register Google fonts for Simona.
	 */
	function simona_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/*
		 * Translators: If there are characters in your language that are not supported,
		 * translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Raleway font: on or off', 'simona' ) ) {
			$fonts[] = 'Raleway:300,400,600';
		}

		/*
	 	* Translators: If there are characters in your language that are not supported,
	 	* translate this to 'off'. Do not translate into your own language.
	 	*/
		if ( 'off' !== _x( 'on', 'Playfair Display font: on or off', 'simona' ) ) {
			$fonts[] = 'Playfair+Display:400,400italic';
		}

		/*
	 	* Translators: If there are characters in your language that are not supported,
	 	* translate this to 'off'. Do not translate into your own language.
	 	*/
		if ( 'off' !== _x( 'on', 'Domine font: on or off', 'simona' ) ) {
			$fonts[] = 'Vidaloka:400';
		}

		/*
		 * Translators: To add an additional character subset specific to your language,
		 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
		 */
		$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'simona' );

		if ( 'cyrillic' === $subset ) {
			$subsets .= ',cyrillic,cyrillic-ext';
		} elseif ( 'greek' === $subset ) {
			$subsets .= ',greek,greek-ext';
		} elseif ( 'devanagari' === $subset ) {
			$subsets .= ',devanagari';
		} elseif ( 'vietnamese' === $subset ) {
			$subsets .= ',vietnamese';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), '//fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}
endif;


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function simona_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'simona_content_width', 640 );
}
add_action( 'after_setup_theme', 'simona_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function simona_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'simona' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'simona_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function simona_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'simona-fonts', simona_fonts_url(), array(), null );

	wp_enqueue_style( 'simona-style', get_stylesheet_uri() );

	// Load bootstrap stylesheet.
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '3.3.5' );

	// Load fontawesome.
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css', array(), '4.4.0' );

	// Load Slick style.
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/css/slick.css', array(), '1.5.7' );

	// Load Swipebox stylesheet.
	wp_enqueue_style( 'swipebox', get_template_directory_uri() . '/css/swipebox.css', array(), '1.3.0' );

	// Load Opentip style.
	wp_enqueue_style( 'opentip', get_template_directory_uri() . '/css/opentip.css', array(), '2.4.6' );

	// Load Nanoscroller style.
	wp_enqueue_style( 'nanoscroller', get_template_directory_uri() . '/css/nanoscroller.css', array(), '0.8.7' );

	// Load Simona custom stylesheet.
	wp_enqueue_style( 'simona-custom-style', get_template_directory_uri() . '/css/simona.css', array(), '1.0.0' );

	wp_enqueue_script( 'skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	// Load Slick Carousel js.
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery' ), '1.5.7', true );

	// Load Opentip js.
	wp_enqueue_script( 'opentip', get_template_directory_uri() . '/js/opentip-jquery.min.js', array( 'jquery' ), '2.4.6', true );

	// Load Slabtext js.
	wp_enqueue_script( 'slabtext', get_template_directory_uri() . '/js/jquery.slabtext.min.js', array( 'jquery' ), '2.3.1', true );

	// Load Fitvids js.
	wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '1.1', true );

	// Load Swipebox js.
	wp_enqueue_script( 'swipebox', get_template_directory_uri() . '/js/jquery.swipebox.min.js', array( 'jquery' ), '1.3.0', true );

	// Load Match-Height js.
	wp_enqueue_script( 'matchHeight', get_template_directory_uri() . '/js/jquery.matchHeight-min.js', array( 'jquery' ), '0.6.0', true );

	// Load Nanoscroller js.
	wp_enqueue_script( 'nanoscroller', get_template_directory_uri() . '/js/jquery.nanoscroller.min.js', array( 'jquery' ), '0.8.7', true );

	// Load Simona custom js.
	wp_enqueue_script( 'simona-js', get_template_directory_uri() . '/js/simona.js', array( 'jquery' ), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'simona_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Custom extra functions theme.
 */
require get_template_directory() . '/inc/simona-extras.php';

