<?php
/**
 * Sefiani functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Sefiani
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'sefiani_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function sefiani_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Sefiani, use a find and replace
		 * to change 'sefiani' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'sefiani', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'sefiani' ),
				'footer_copyright' => esc_html__( 'Footer Copyright', 'sefiani' ),
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
				'sefiani_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'sefiani_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sefiani_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sefiani_content_width', 640 );
}
add_action( 'after_setup_theme', 'sefiani_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sefiani_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'sefiani' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'sefiani' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'sefiani_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sefiani_scripts() {
	wp_enqueue_style( 'sefiani-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'sefiani-style-main', get_stylesheet_directory_uri().'/css/main.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'sefiani-style-fonts', get_stylesheet_directory_uri().'/css/fonts.min.css', array(), _S_VERSION );
	wp_style_add_data( 'sefiani-style', 'rtl', 'replace' );
    wp_enqueue_style( 'sefiani-custom', get_stylesheet_directory_uri().'/css/custom.css', array(), _S_VERSION );

	wp_enqueue_script( 'sefiani-jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.5.0/jquery.min.js', array(), _S_VERSION, false );
	wp_enqueue_script( 'sefiani-main', get_template_directory_uri() . '/js/main.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sefiani_scripts' );

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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Register ACF BLOCKS
 */
require get_template_directory() . '/inc/acf.php';

// Add custom class for body
add_filter( 'body_class','my_body_classes' );
function my_body_classes( $classes ) {


    if(get_field('thanks')) {
        $classes[] = 'theme-thanks';
    }else{
        $classes[] = 'theme-'.get_field('site_color', 'options');
    }
    return $classes;
}

//Theme Options Page
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Theme Options',
        'menu_title'    => 'Theme Options',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => TRUE
    ));
    acf_add_options_sub_page(array(
        'page_title'    => 'Header',
        'menu_title'    => 'Header',
        'parent_slug'   => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title'    => 'Socials',
        'menu_title'    => 'Socials',
        'parent_slug'   => 'theme-general-settings',
    ));
}

//Add custom class for logo link
add_filter( 'get_custom_logo', 'change_logo_class' );
function change_logo_class( $html ) {

    $html = str_replace( 'custom-logo-link', 'footer__brand', $html );

    return $html;
}

//Register Sidebar
if (function_exists('register_sidebar')){

    register_sidebar( array(
        'name'          => 'Footer 1',
        'id'            => 'footer_1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>', 
        'after_title'   => '</h4>',
    ) );
    register_sidebar( array(
        'name'          => 'Footer 2',
        'id'            => 'footer_2',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>', 
        'after_title'   => '</h4>',
    ) );
    register_sidebar( array(
        'name'          => 'Footer 3',
        'id'            => 'footer_3',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>', 
        'after_title'   => '</h4>',
    ) );
    register_sidebar( array(
        'name'          => 'Footer 4',
        'id'            => 'footer_4',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>', 
        'after_title'   => '</h4>',
    ) );
    register_sidebar( array(
        'name'          => 'Footer 5',
        'id'            => 'footer_5',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>', 
        'after_title'   => '</h4>',
    ) );
    register_sidebar( array(
        'name'          => '',
        'id'            => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>', 
        'after_title'   => '</h4>',
    ) );
}

add_filter( 'upload_mimes', 'svg_upload_allow' );
function svg_upload_allow( $mimes ) {
    $mimes['svg']  = 'image/svg+xml';

    return $mimes;
}

//SVG ALLOW
add_filter( 'wp_prepare_attachment_for_js', 'show_svg_in_media_library' );
function show_svg_in_media_library( $response ) {
    if ( $response['mime'] === 'image/svg+xml' ) {
        $response['image'] = [
            'src' => $response['url'],
        ];
    }
    return $response;
}
//SVG ALLOW
add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){
    if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) ) {
        $dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
    }
    else {
        $dosvg = ( '.svg' === strtolower( substr($filename, -4) ) );
    }
    if( $dosvg ){
        if( current_user_can('manage_options') ){
            $data['ext']  = 'svg';
            $data['type'] = 'image/svg+xml';
        }
        else {
            $data['ext'] = $type_and_ext['type'] = false;
        }
    }
    return $data;
}

//Add shorcode for socials ul li
add_shortcode('socials', 'shortcode_socials');
function shortcode_socials(){

    $html = '<ul>';
    $socials = get_field('socials', 'options');

    if($socials){
        foreach ($socials as $social){
            $html .= '<li><a href="'.$social['link']['url'].'" target="'.$social['link']['target'].'">'.$social['link']['title'].'</a></li>';
        }
    }
    $html .= '</ul>';
    return $html;
}

//Add shortcode for generation links
add_shortcode( 'a', 'shortcode_button' );
function shortcode_button( $atts, $content ){

    $atts = shortcode_atts( array(
        'href'   => '#',
        'target' => '',
        'text'   => '',
        'class'  => '',
        'download'  => '',
        'icon_class'  => '',
        'id'     => ''
    ), $atts );

    if($atts['class'] !=''){
        $atts['class'] = "class='{$atts['class']}'";
    }
    if($atts['id'] !=''){
        $atts['id'] = "id='{$atts['id']}'";
    }
    if($atts['target'] !=''){
        $atts['target'] = "target='{$atts['target']}'";
    }
    if($atts['href'] !=''){
        $atts['href'] = "href='{$atts['href']}'";
    }
    if($atts['download'] !=''){
        $atts['download'] = "download";
    }
    if($atts['icon_class'] !=''){
        $atts['icon_class'] = "<span class='{$atts['icon_class']}'></span> ";
    }

    return "<a {$atts['href']} {$atts['target']} {$atts['class']} {$atts['id']} {$atts['download']}>{$atts['icon_class']}{$atts['text']}</a>";
}
//change gravity form input type submit to button
add_filter( 'gform_submit_button', 'input_to_button', 10, 2 );
function input_to_button( $button, $form ) {
    $dom = new DOMDocument();
    $dom->loadHTML( '<?xml encoding="utf-8" ?>' . $button );
    $input = $dom->getElementsByTagName( 'input' )->item(0);
    $new_button = $dom->createElement( 'button' );
    $new_button->appendChild( $dom->createTextNode( $input->getAttribute( 'value' ) ) );
    $input->removeAttribute( 'value' );
    foreach( $input->attributes as $attribute ) {
        $new_button->setAttribute( $attribute->name, $attribute->value );
    }
    $input->parentNode->replaceChild( $new_button, $input );

    return $dom->saveHtml( $new_button );
}