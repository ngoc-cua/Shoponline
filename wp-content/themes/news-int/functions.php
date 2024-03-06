<?php
/**
 * Theme functions and definitions
 *
 * @package News-int
 */
if ( ! function_exists( 'newsint_enqueue_styles' ) ) :
	/**
	 * @since 0.1
	 */
	function newsint_enqueue_styles() {
		wp_enqueue_style( 'newsup-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'newsint-style', get_stylesheet_directory_uri() . '/style.css', array( 'newsup-style-parent' ), '1.0' );
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
		wp_dequeue_style( 'newsup-default',get_template_directory_uri() .'/css/colors/default.css');
		wp_enqueue_style( 'newsint-default-css', get_stylesheet_directory_uri()."/css/colors/default.css" );
		if(is_rtl()){
		wp_enqueue_style( 'newsup_style_rtl', trailingslashit( get_template_directory_uri() ) . 'style-rtl.css' );
	    }
		
	}

endif;
add_action( 'wp_enqueue_scripts', 'newsint_enqueue_styles', 9999 );


add_action( 'customize_register', 'newsint_customizer_rid_values', 1000 );
function newsint_customizer_rid_values($wp_customize) {

	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

  $wp_customize->remove_control('main_banner_section_background_image');

  $wp_customize->remove_control('tabbed_section_title');

  $wp_customize->remove_control('latest_tab_title');

  $wp_customize->remove_control('popular_tab_title');

  $wp_customize->remove_control('trending_tab_title');

  $wp_customize->remove_control('select_trending_tab_news_category');

  $wp_customize->remove_control('newsup_select_slider_setting');  

  $wp_customize->remove_control('newsup_center_logo_title'); 

  $wp_customize->selective_refresh->add_partial('newsup_header_fb_link', array(
				'selector'        => '.mg-social',
  ));


		    

 }

function newsint_theme_setup() {

//Load text domain for translation-ready
load_theme_textdomain('newsint', get_stylesheet_directory() . '/languages');

require( get_stylesheet_directory() . '/hooks/hooks.php' );
require( get_stylesheet_directory() . '/hooks/hook-header-section.php' );


// custom header Support
			$args = array(
			'default-image'		=>  '',
			'width'			=> '1600',
			'height'		=> '600',
			'flex-height'		=> false,
			'flex-width'		=> false,
			'header-text'		=> true,
			'default-text-color'	=> '#eee'
		);
		add_theme_support( 'custom-header', $args );


    $args = array(
    'default-color' => '#eee',
    'default-image' => '',
	);
	add_theme_support( 'custom-background', $args );
} 
add_action( 'after_setup_theme', 'newsint_theme_setup' );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function newsint_widgets_init() {
	

	register_sidebar( array(
		'name'          => esc_html__( 'Front-Page Left Sidebar Section', 'news-int'),
		'id'            => 'front-left-page-sidebar',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="mg-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="mg-wid-title"><h6>',
		'after_title'   => '</h6></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front-Page Right Sidebar Section', 'news-int'),
		'id'            => 'front-right-page-sidebar',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="mg-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="mg-wid-title"><h6>',
		'after_title'   => '</h6></div>',
	) );

	

}
add_action( 'widgets_init', 'newsint_widgets_init' );


function newsint_remove_some_widgets(){
// Unregister Frontpage sidebar
unregister_sidebar( 'front-page-sidebar' );
}
add_action( 'widgets_init', 'newsint_remove_some_widgets', 11 );

function newsint_menu(){ ?>
<script>
jQuery('a,input').bind('focus', function() {
    if(!jQuery(this).closest(".menu-item").length && ( jQuery(window).width() <= 992) ) {
    jQuery('.navbar-collapse').removeClass('show');
}})
</script>
<?php }
add_action( 'wp_footer', 'newsint_menu' );