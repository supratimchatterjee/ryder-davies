<?php
/**
 * ryder-davies-partners functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ryder-davies-partners
 */


if ( ! function_exists( 'ryder_davies_partners_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ryder_davies_partners_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on ryder-davies-partners, use a find and replace
	 * to change 'ryder-davies-partners' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'ryder-davies-partners', get_template_directory() . '/languages' );

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

	add_image_size( 'module_img_size', 370, 230, true );
	add_image_size( 'slider-image', 894, 480, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'ryder-davies-partners' ),
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
		'video',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'ryder_davies_partners_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'ryder_davies_partners_setup' );


if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}

  function excerpt($num) {

    $limit = $num+1;

    $excerpt = explode(' ', get_the_excerpt(), $limit);

    array_pop($excerpt);

    $excerpt = implode(" ",$excerpt)." ";

    echo $excerpt;

    }



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ryder_davies_partners_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ryder_davies_partners_content_width', 640 );
}
add_action( 'after_setup_theme', 'ryder_davies_partners_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ryder_davies_partners_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ryder-davies-partners' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ryder_davies_partners_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ryder_davies_partners_scripts() {
	wp_enqueue_style( 'foundation-style', '//cdnjs.cloudflare.com/ajax/libs/foundation/6.2.0/foundation.min.css' );
	wp_enqueue_style( 'app', get_template_directory_uri() . '/css/app.css' );
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css' );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'foundation-min', get_template_directory_uri() . '/js/foundation.min.js', array(), '', true );
	wp_enqueue_script( 'responsive-slides', get_template_directory_uri() . '/js/responsiveslides.min.js', array(), '', true );

	wp_enqueue_script( 'app-js', get_template_directory_uri() . '/js/app.js', array(), '', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ryder_davies_partners_scripts' );

function customize_customtaxonomy_archive_display ( $query ) {
    if ( ( $query->is_main_query()) && ( is_tax('teams_cat') ) ){
        $query->set( 'posts_per_page', '-1' );
        return;

    }
}
add_action('pre_get_posts', 'customize_customtaxonomy_archive_display');

//Hook the function

add_action( 'pre_get_posts', 'customize_customtaxonomy_archive_display' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
