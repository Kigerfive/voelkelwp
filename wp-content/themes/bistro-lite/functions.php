<?php 
/**
 * Bistro Lite functions and definitions
 *
 * @package Bistro Lite
 */
 
 global $content_width;
 if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */ 

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'bistro_lite_setup' ) ) : 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
 
function bistro_lite_setup() {
	load_theme_textdomain( 'bistro-lite', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_post_type_support( 'page', 'excerpt' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'custom-logo', array(
		'height'      => 50,
		'width'       => 250,
		'flex-height' => true,
	) );	
 
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'bistro-lite' ),		
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_editor_style( 'editor-style.css' );
} 
endif; // bistro_lite_setup

add_action( 'after_setup_theme', 'bistro_lite_setup' );

function bistro_lite_widgets_init() { 	
	
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'bistro-lite' ),
		'description'   => esc_html__( 'Appears on blog page sidebar', 'bistro-lite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '',		
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Header Right Widget', 'bistro-lite' ),
		'description'   => esc_html__( 'Appears on top of the header', 'bistro-lite' ),
		'id'            => 'header-right-widget',
		'before_widget' => '',		
		'before_title'  => '<h3 class="widget-title" style="display:none">',
		'after_title'   => '</h3>',
		'after_widget'  => '',
	) );		
	
}
add_action( 'widgets_init', 'bistro_lite_widgets_init' );


function bistro_lite_font_url(){
		$font_url = '';		
		
		/* Translators: If there are any character that are not
		* supported by Roboto Condensed, trsnalate this to off, do not
		* translate into your own language.
		*/
		$robotocondensed = _x('on','Roboto Condensed:on or off','bistro-lite');		
		
		
		/* Translators: If there has any character that are not supported 
		*  by Scada, translate this to off, do not translate
		*  into your own language.
		*/
		$scada = _x('on','Scada:on or off','bistro-lite');	
		$lato = _x('on','Lato:on or off','bistro-lite');	
		$roboto = _x('on','Roboto:on or off','bistro-lite');
		$oleo = _x('on','Oleo Script:on or off','bistro-lite');
		$vibes = _x('on','Great Vibes:on or off','bistro-lite');
		$lobster = _x('on','Lobster:on or off','bistro-lite');
		$merriweather = _x('on','Merriweather:on or off','bistro-lite');
		
		if('off' !== $robotocondensed ){
			$font_family = array();
			
			if('off' !== $robotocondensed){
				$font_family[] = 'Roboto Condensed:300,400,600,700,800,900';
			}
			
			if('off' !== $lato){
				$font_family[] = 'Lato:100,100i,300,300i,400,400i,700,700i,900,900i';
			}
			
			if('off' !== $roboto){
				$font_family[] = 'Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i';
			}
			
			if('off' !== $oleo){
				$font_family[] = 'Oleo Script:400,700';
			}	
			
			if('off' !== $vibes){
				$font_family[] = 'Great Vibes:400';
			}	
			
			if('off' !== $lobster){
				$font_family[] = 'Lobster:400';
			}
			
			if('off' !== $merriweather){
				$font_family[] = 'Merriweather:400';
			}															
						
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}
		
	return $font_url;
	}


function bistro_lite_scripts() {
	wp_enqueue_style('bistro-lite-font', bistro_lite_font_url(), array());
	wp_enqueue_style( 'bistro-lite-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'bistro-lite-editor-style', get_template_directory_uri()."/editor-style.css" );
	wp_enqueue_style( 'nivo-slider', get_template_directory_uri()."/css/nivo-slider.css" );
	wp_enqueue_style( 'bistro-lite-main-style', get_template_directory_uri()."/css/responsive.css" );		
	wp_enqueue_style( 'bistro-lite-base-style', get_template_directory_uri()."/css/style_base.css" );
	wp_enqueue_script( 'jquery-nivo', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'bistro-lite-custom-js', get_template_directory_uri() . '/js/custom.js' );	
		

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bistro_lite_scripts' );

define('BISTRO_LITE_URL','https://www.pinnaclethemes.net','bistro-lite');
define('BISTRO_LITE_PRO_THEME_URL','https://www.pinnaclethemes.net/product/restaurant-wordpress-theme/','bistro-lite');
define('BISTRO_LITE_FREE_THEME_URL','https://www.pinnaclethemes.net/product/bistro-lite/','bistro-lite');
define('BISTRO_LITE_THEME_DOC','https://pinnaclethemes.net/themedocumentation/food-documentation/','bistro-lite');
define('BISTRO_LITE_LIVE_DEMO','https://www.pinnaclethemes.net/themedemos/food/','bistro-lite');
define('BISTRO_LITE_THEMES','https://www.pinnaclethemes.net/cool-wordpress-themes/','bistro-lite');

function bistro_lite_new_excerpt_length($length) {
	if ( is_admin() ) {
			return $length;
	}	
    return 50;
}
add_filter('excerpt_length', 'bistro_lite_new_excerpt_length');

/**
 * Custom template for about theme.
 */
require get_template_directory() . '/inc/about-themes.php';

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

if ( ! function_exists( 'bistro_lite_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function bistro_lite_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

require_once get_template_directory() . '/customize-pro/example-1/class-customize.php';

/**
 * Filter the except length to 13 words.
 *
 * @param int $excerpt_length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function bistro_lite_custom_excerpt_length( $excerpt_length ) {
	if ( is_admin() ) {
			return $excerpt_length;
	}	
    return 13;
}
add_filter( 'excerpt_length', 'bistro_lite_custom_excerpt_length', 999 );

/**
 *
 * Style For About Theme Page
 *
 */
function bistro_lite_admin_about_page_css_enqueue($hook) {
   if ( 'appearance_page_bistro_lite_guide' != $hook ) {
        return;
    }
    wp_enqueue_style( 'bistro-lite-about-page-style', get_template_directory_uri() . '/css/bistro-lite-about-page-style.css' );
}
add_action( 'admin_enqueue_scripts', 'bistro_lite_admin_about_page_css_enqueue' );