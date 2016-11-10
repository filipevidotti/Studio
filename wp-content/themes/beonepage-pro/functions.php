<?php
/**
 * BeOnePage functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package BeOnePage
 */

if ( ! function_exists( 'beonepage_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function beonepage_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on BeOnePage, use a find and replace
	 * to change 'beonepage' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'beonepage', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Add style sheet for WordPress visual editor.
	add_editor_style( 'layouts/editor.style.css' );
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
	add_image_size( 'featured-thumb', 720, 480, true  );
	add_image_size( 'gallery-thumb', 925, 695, true );
	add_image_size( 'gallery-thumb-sm', 100, 75, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'   => esc_html__( 'Header Menu', 'beonepage' ),
		'secondary' => esc_html__( 'Social Menu', 'beonepage' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'image',
		'gallery',
		'audio',
		'video'
	) );
}
endif; // beonepage_setup
add_action( 'after_setup_theme', 'beonepage_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function beonepage_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'beonepage_content_width', 1140 );
}
add_action( 'after_setup_theme', 'beonepage_content_width', 0 );

/**
 * Add support for WooCommerce.
 */
function beonepage_woocommerce_support() {
	add_theme_support( 'woocommerce' );
	update_option( 'shop_catalog_image_size', array( 'width' => '280', 'height' => '370', 'crop' => 1 ) );
}
add_action( 'after_setup_theme', 'beonepage_woocommerce_support' );

add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );

/**
 * Load theme updater functions.
 * Action is used so that child themes can easily disable.
 */
function beonepage_theme_updater() {
	require_once( get_template_directory() . '/updater/theme-updater.php' );
}
add_action( 'after_setup_theme', 'beonepage_theme_updater' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function beonepage_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'beonepage' ),
		'id'            => 'sidebar-right',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'WooCommerce', 'beonepage' ),
		'id'            => 'sidebar-woocommerce',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	$widgets = Kirki::get_option( 'front_page_widget_module_widget' );

	if ( ! empty( $widgets ) ) {
		foreach ( $widgets as $widget ) {
			register_sidebar( array(
				'name'          => $widget['widget_name'],
				'id'            => str_replace( ' ', '-', $widget['widget_name'] ),
				'description'   => esc_html__( 'Widget Areas for Front Page', 'beonepage' ),
				'before_widget' => '<aside id="%1$s" class="col-md-' . 12 / $widget['widget_num'] . ' %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			) );
		}
	}
}
add_action( 'widgets_init', 'beonepage_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function beonepage_scripts() {
	wp_enqueue_style( 'beonepage-bootstrap-style', get_template_directory_uri() . '/layouts/bootstrap.min.css', array(), '3.3.6' );

	wp_enqueue_style( 'beonepage-font-awesome-style', get_template_directory_uri() . '/layouts/font.awesome.min.css', array(), '4.5.0' );

	wp_enqueue_style( 'beonepage-animate-style', get_template_directory_uri() . '/layouts/animate.min.css', array(), '3.5.0' );

	wp_enqueue_style( 'beonepage-magnific-popup-style', get_template_directory_uri() . '/layouts/magnific.popup.css', array(), '1.0.1' );

	wp_enqueue_style( 'beonepage-owl-carousel-style', get_template_directory_uri() . '/layouts/owl.carousel.min.css', array(), '2.0.0-beta.3' );

	wp_enqueue_style( 'beonepage-swiper-style', get_template_directory_uri() . '/layouts/idangerous.swiper.css', array(), '2.7.6' );

	wp_enqueue_style( 'beonepage-style', get_stylesheet_uri() );

	wp_enqueue_style( 'beonepage-responsive-style', get_template_directory_uri() . '/layouts/responsive.css', array(), beonepage_get_version() );

	wp_enqueue_script( 'beonepage-bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.6', true );

	wp_enqueue_script( 'beonepage-jRespond-script', get_template_directory_uri() . '/js/jrespond.min.js', array(), '0.10', true );

	wp_enqueue_script( 'beonepage-smoothscroll-script', get_template_directory_uri() . '/js/smooth.scroll.js', array(), '1.4.1', true );

	wp_enqueue_script( 'beonepage-stellar-script', get_template_directory_uri() . '/js/jquery.stellar.min.js', array(), '0.6.2', true );

	wp_enqueue_script( 'beonepage-wow-script', get_template_directory_uri() . '/js/wow.min.js', array(), '1.1.2', true );

	wp_enqueue_script( 'beonepage-transit-script', get_template_directory_uri() . '/js/jquery.transit.js', array(), '0.9.12', true );

	wp_enqueue_script( 'beonepage-easing-script', get_template_directory_uri() . '/js/jquery.easing.min.js', array(), '1.3.2', true );

	wp_enqueue_script( 'beonepage-ytplayer-script', get_template_directory_uri() . '/js/jquery.mb.ytplayer.min.js', array(), '2.9.9', true );

	wp_enqueue_script( 'beonepage-imagesloaded-script', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), '4.0.0', true );

	wp_enqueue_script( 'beonepage-isotope-script', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array(), '2.2.2', true );

	wp_enqueue_script( 'beonepage-nicescroll-script', get_template_directory_uri() . '/js/jquery.nicescroll.min.js', array(), '3.6.6', true );

	wp_enqueue_script( 'beonepage-smooth-scroll-script', get_template_directory_uri() . '/js/jquery.smooth.scroll.min.js', array(), '1.6.1', true );

	wp_enqueue_script( 'beonepage-magnific-popup-script', get_template_directory_uri() . '/js/jquery.magnific.popup.min.js', array(), '1.0.1', true );

	wp_enqueue_script( 'beonepage-owl-carousel-script', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '2.0.0-beta.3', true );

	wp_enqueue_script( 'beonepage-flexslider-script', get_template_directory_uri() . '/js/jquery.flexslider.min.js', array(), '2.6.0', true );

	wp_enqueue_script( 'beonepage-swiper-script', get_template_directory_uri() . '/js/idangerous.swiper.min.js', array(), '2.7.6', true );

	wp_enqueue_script( 'beonepage-validate-script', get_template_directory_uri() . '/js/jquery.validate.min.js', array(), '1.14.0', true );

	wp_enqueue_script( 'beonepage-count-script', get_template_directory_uri() . '/js/jquery.count.to.js', array(), '1.2.0', true );

	wp_enqueue_script( 'beonepage-waypoint-script', get_template_directory_uri() . '/js/jquery.waypoints.min.js', array(), '4.0.0', true );

	wp_enqueue_script( 'beonepage-gmaps-script', '//maps.googleapis.com/maps/api/js?key=' . Kirki::get_option( 'front_page_contact_module_gmap_api_key' ), array(), '3', true );

	wp_enqueue_script( 'beonepage-app-script', get_template_directory_uri() . '/js/app.js', array( 'jquery' ), beonepage_get_version(), true );

	// Localize the script with new data.
	wp_localize_script( 'beonepage-app-script', 'app_vars', array(
		'ajax_url'                 => admin_url( 'admin-ajax.php' ),
		'home_url'                 => esc_url( home_url( '/' ) ),
		'current_page_url'         => beonepage_get_current_url(),
		'page_transition_spinner'  => kirki_get_option( 'page_transition_spinner' ),
		'loading_spinner_color'    => kirki_get_option( 'loading_spinner_color' ),
		'loading_background_color' => kirki_get_option( 'loading_background_color' ),
		'progress_bar_color'       => kirki_get_option( 'progress_bar_color' ),
		'accent_color'             => kirki_get_option( 'blog_page_accent_color' ),
		'btn_style'                => kirki_get_option( 'blog_page_button_style' ),
		'close_map'                => esc_attr__( 'Close the map', 'beonepage' ),
		'play'                     => esc_attr__( 'Play', 'beonepage' ),
		'pause'                    => esc_attr__( 'Pause', 'beonepage' ),
		'mute'                     => esc_attr__( 'Mute', 'beonepage' ),
		'unmute'                   => esc_attr__( 'Unmute', 'beonepage' ),
		'popup'                    => esc_attr__( 'Show player in popup window', 'beonepage' ),
		'added_to_cart'            => esc_html__( 'Added to cart', 'beonepage' )
	) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'beonepage_scripts' );

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/inc/tgmpa/tgm-plugin-activation.php';

/**
 * Load Kirki Customizer Toolkit.
 */
require_once get_template_directory() . '/inc/kirki/kirki.php';

/**
 * Load Customizer configuration.
 */
require_once get_template_directory() . '/inc/kirki/config.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Comments Callback.
 */
require_once get_template_directory() . '/inc/comments-callback.php';

/**
 * Add breadcrumb.
 */
require_once get_template_directory() . '/inc/breadcrumb.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';
