<?php

// DEQUEUE CUSTOM SCRIPTS
function remove_default_js( ){
    wp_dequeue_script( 'jquery');
    wp_dequeue_script( 'wp-embed');
    wp_deregister_script( 'jquery');
    wp_deregister_script( 'wp-embed');
}
add_filter( 'wp_enqueue_scripts', 'remove_default_js', 100 );

// DEQUEUE CUSTOM STYLES
function remove_default_css(){
  wp_dequeue_style( 'contact-form-7');
  wp_deregister_style( 'contact-form-7');
}
add_filter( 'wp_enqueue_scripts', 'remove_default_css', 100 );

// REMOVE ADDITIONAL UNWANTED SCRIPTS/STYLES
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );


?>
