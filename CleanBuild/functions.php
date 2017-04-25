<?php

// Enqueue Custom Scripts
function custom_scripts() {
  wp_enqueue_script( 'jq-link', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js', array(), null, true );
	wp_enqueue_script( 'site-script', get_stylesheet_directory_uri() . '/js/site.js', array(), '0.0.1', true );
}
add_action( 'wp_enqueue_scripts', 'custom_scripts' );

// Enqueue Custom Styles
function custom_styles() {
  wp_enqueue_style( 'site-style', get_stylesheet_directory_uri() . '/style.css', array(), filemtime( get_stylesheet_directory() . '/style.scss' ), 'all' );
}
add_action( 'wp_enqueue_scripts', 'custom_styles' );

// SVG Shortcode
function get_svg( $atts, $content = null ) {
	$a = shortcode_atts( array(
		'img' 			=> ''
	), $atts );

	$img_path = esc_attr($atts['img']);
	$ctx = stream_context_create(array('http'=>
	    array(
	        'timeout' => 30,
	    )
	));
	return file_get_contents( get_stylesheet_directory() . '/images/svg/' . $img_path);
}
add_shortcode('svg', 'get_svg');


// Enable Thumbnails
add_theme_support( 'post-thumbnails' );

// Init Menus
register_nav_menus( array(
	'Main Navigation' => 'Main menu navigation',
) );


// Init Sidebar
add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
  register_sidebar( array(
    'name' => __( 'Main Sidebar', 'theme-slug' ),
    'id' => 'sidebar-1',
    'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>',
  ) );
}


?>
