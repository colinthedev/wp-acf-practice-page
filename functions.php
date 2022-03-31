<?php
/**
 * colinfeb2022 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package colinfeb2022
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function colinfeb2022_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on colinfeb2022, use a find and replace
		* to change 'colinfeb2022' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'colinfeb2022', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'colinfeb2022' ),
			'menu-2' => esc_html__( 'Footer Right', 'colinfeb2022' ),
			'menu-3' => esc_html__( 'Footer Left', 'colinfeb2022' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'colinfeb2022_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'colinfeb2022_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function colinfeb2022_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'colinfeb2022_content_width', 640 );
}
add_action( 'after_setup_theme', 'colinfeb2022_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function colinfeb2022_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'colinfeb2022' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'colinfeb2022' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'colinfeb2022_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function colinfeb2022_scripts() {

	wp_enqueue_style( 'aos-css', '/wp-content/themes/wp-acf-practice-page/vendor/aos/aos.css' );
	wp_enqueue_style( 'bootstrap-css', '/wp-content/themes/wp-acf-practice-page/vendor/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_style( 'aicons', '/wp-content/themes/wp-acf-practice-page/vendor/bootstrap-icons/bootstrap-icons.css' );
	wp_enqueue_style( 'boxicons', '/wp-content/themes/wp-acf-practice-page/vendor/boxicons/css/boxicons.min.css' );
	wp_enqueue_style( 'lightbox', '/wp-content/themes/wp-acf-practice-page/vendor/glightbox/css/glightbox.min.css' );
	wp_enqueue_style( 'remixicon', '/wp-content/themes/wp-acf-practice-page/vendor/remixicon/remixicon.css' );
	wp_enqueue_style( 'swiper', '/wp-content/themes/wp-acf-practice-page/vendor/swiper/swiper-bundle.min.css' );

	wp_enqueue_style( 'general-style', '/wp-content/themes/wp-acf-practice-page/css/general.css' );

	if ( is_page('Arsha') ) {
		wp_enqueue_style( 'arsha-style', '/wp-content/themes/wp-acf-practice-page/css/arsha.css' );
		wp_enqueue_style( 'google-fonts-css', 'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i' );
	}

	if ( is_page(371) ) {
		wp_enqueue_style( 'modern-style', '/wp-content/themes/wp-acf-practice-page/css/modern.css' );
	}

	wp_enqueue_script( 'aosjs', '/wp-content/themes/wp-acf-practice-page/vendor/aos/aos.js', array(), '0.0.0', true);
	wp_enqueue_script( 'bootstrapjs', '/wp-content/themes/wp-acf-practice-page/vendor/bootstrap/js/bootstrap.bundle.min.js', array(), '0.0.0', true);
	wp_enqueue_script( 'lightboxjs', '/wp-content/themes/wp-acf-practice-page/vendor/glightbox/js/glightbox.min.js', array(), '0.0.0', true);
	wp_enqueue_script( 'isotopejs', '/wp-content/themes/wp-acf-practice-page/vendor/isotope-layout/isotope.pkgd.min.js', array(), '0.0.0', true);
	wp_enqueue_script( 'formjs', '/wp-content/themes/wp-acf-practice-page/vendor/php-email-form/validate.js', array(), '0.0.0', true);
	wp_enqueue_script( 'swiper', '/wp-content/themes/wp-acf-practice-page/vendor/swiper/swiper-bundle.min.js', array(), '0.0.0', true);
	wp_enqueue_script( 'waypoints', '/wp-content/themes/wp-acf-practice-page/vendor/waypoints/noframework.waypoints.js', array(), '0.0.0', true);
	wp_enqueue_script( 'mainjs', '/wp-content/themes/wp-acf-practice-page/js/main.js', array(), '0.0.0', true);
	


}
add_action( 'wp_enqueue_scripts', 'colinfeb2022_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Options page.
 */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
	acf_add_options_sub_page('Header');
	acf_add_options_sub_page('Footer');

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
}

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

