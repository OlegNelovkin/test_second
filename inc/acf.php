<?php
add_theme_support('align-wide');

function load_custom_wp_admin_style() {
    wp_enqueue_style('admin-style', get_template_directory_uri() . '/admin-style.css', array(), _S_VERSION);

	wp_enqueue_script( 'admin-custom-js', get_stylesheet_directory_uri() . '/js/custom-admin.js', array(), _S_VERSION, true );
}
add_action('acf/input/admin_enqueue_scripts', 'load_custom_wp_admin_style');

function custom_block_categories($categories, $post) {
    return array_merge(
        $categories,
        array(
            array(
                'slug'  => 'acf-custom-blocks',
                'title' => __('Custom Blocks', 'acf'),
            ),
        )
    );
}
add_filter('block_categories', 'custom_block_categories', 10, 2);

function register_blocks() {
    // check function exists
    if (function_exists('acf_register_block')) {

	    acf_register_block(array(
		    'name'              => 'jumbotron',
		    'title'             => __('Jumbotron'),
		    'description'       => __('Jumbotron'),
		    'render_template'   => get_template_directory() . '/template-parts/blocks/block-jumbotron.php',
		    'category'          => 'acf-custom-blocks',
		    'icon'              => 'desktop',
		    'mode'              => 'auto',
		    'keywords'          => array('jumbotron', 'main', 'hero', 'form')
	    ));

	    acf_register_block(array(
		    'name'              => 'summary',
		    'title'             => __('Summary'),
		    'description'       => __('Summary'),
		    'render_template'   => get_template_directory() . '/template-parts/blocks/block-summary.php',
		    'category'          => 'acf-custom-blocks',
		    'icon'              => 'desktop',
		    'mode'              => 'auto',
		    'keywords'          => array('summary', '2 col', 'images', 'content')
	    ));

	    acf_register_block(array(
		    'name'              => 'reviews',
		    'title'             => __('Reviews'),
		    'description'       => __('Reviews'),
		    'render_template'   => get_template_directory() . '/template-parts/blocks/block-reviews.php',
		    'category'          => 'acf-custom-blocks',
		    'icon'              => 'desktop',
		    'mode'              => 'auto',
		    'keywords'          => array('reviews', 'slider')
	    ));

	    acf_register_block(array(
		    'name'              => 'section-key',
		    'title'             => __('Section key'),
		    'description'       => __('Section key'),
		    'render_template'   => get_template_directory() . '/template-parts/blocks/block-section-key.php',
		    'category'          => 'acf-custom-blocks',
		    'icon'              => 'desktop',
		    'mode'              => 'auto',
		    'keywords'          => array('section key', 'key', 'feature')
	    ));

	    acf_register_block(array(
		    'name'              => 'values',
		    'title'             => __('Values'),
		    'description'       => __('Values'),
		    'render_template'   => get_template_directory() . '/template-parts/blocks/block-values.php',
		    'category'          => 'acf-custom-blocks',
		    'icon'              => 'desktop',
		    'mode'              => 'auto',
		    'keywords'          => array('values')
	    ));

	    acf_register_block(array(
		    'name'              => 'details',
		    'title'             => __('Details'),
		    'description'       => __('Details'),
		    'render_template'   => get_template_directory() . '/template-parts/blocks/block-details.php',
		    'category'          => 'acf-custom-blocks',
		    'icon'              => 'desktop',
		    'mode'              => 'auto',
		    'keywords'          => array('details')
	    ));

	    acf_register_block(array(
		    'name'              => 'news',
		    'title'             => __('News'),
		    'description'       => __('News'),
		    'render_template'   => get_template_directory() . '/template-parts/blocks/block-news.php',
		    'category'          => 'acf-custom-blocks',
		    'icon'              => 'desktop',
		    'mode'              => 'auto',
		    'keywords'          => array('news', 'posts')
	    ));

	    acf_register_block(array(
		    'name'              => 'thanks',
		    'title'             => __('Thanks'),
		    'description'       => __('Thanks'),
		    'render_template'   => get_template_directory() . '/template-parts/blocks/block-thanks.php',
		    'category'          => 'acf-custom-blocks',
		    'icon'              => 'desktop',
		    'mode'              => 'auto',
		    'keywords'          => array('thanks')
	    ));

	    acf_register_block(array(
		    'name'              => 'partners',
		    'title'             => __('Partners'),
		    'description'       => __('Partners'),
		    'render_template'   => get_template_directory() . '/template-parts/blocks/block-partners.php',
		    'category'          => 'acf-custom-blocks',
		    'icon'              => 'desktop',
		    'mode'              => 'auto',
		    'keywords'          => array('partners', 'logo', 'gallery')
	    ));

	    acf_register_block(array(
		    'name'              => 'text',
		    'title'             => __('Text'),
		    'description'       => __('Text'),
		    'render_template'   => get_template_directory() . '/template-parts/blocks/block-text.php',
		    'category'          => 'acf-custom-blocks',
		    'icon'              => 'desktop',
		    'mode'              => 'auto',
		    'keywords'          => array('text', 'content')
	    ));


    }    
}

add_action('acf/init',  __NAMESPACE__ . '\\register_blocks');
