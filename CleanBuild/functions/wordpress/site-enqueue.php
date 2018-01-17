<?php

// ENQUEUE CUSTOM SCRIPTS
function custom_scripts() {
  wp_enqueue_script( 'jq-link', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js', array(), null, true );
  wp_enqueue_script( 'fa-link', 'https://use.fontawesome.com/a46d3aa7ee.js', array(), null, true );
  wp_enqueue_script( 'slick-link', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array(), null, true );
  wp_enqueue_script( 'backstretch-script', get_stylesheet_directory_uri() . '/js/vendor/backstretch.min.js', array(), null, true );
  wp_enqueue_script( 'fancybox-script', get_stylesheet_directory_uri() . '/js/vendor/fancybox.min.js', array(), null, true );
	wp_enqueue_script( 'site-script', get_stylesheet_directory_uri() . '/js/site.js', array(), filemtime( get_stylesheet_directory() . '/js/site.js' ), true );
}
add_action( 'wp_enqueue_scripts', 'custom_scripts' );

// ENQUEUE CUSTOM STYLES
function custom_styles() {
  wp_enqueue_style( 'site-style', get_stylesheet_directory_uri() . '/style.css', array(), filemtime( get_stylesheet_directory() . '/style.scss' ), 'all' );
}
add_action( 'wp_enqueue_scripts', 'custom_styles' );

?>
