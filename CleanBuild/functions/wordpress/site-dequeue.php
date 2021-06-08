<?php

// DEQUEUE CUSTOM SCRIPTS
function remove_default_js() {
  wp_dequeue_script( 'wp-embed');
  wp_deregister_script( 'wp-embed');
}
add_filter( 'wp_enqueue_scripts', 'remove_default_js', 100 );

function remove_default_css() {
  wp_dequeue_style('contact-form-7');
  wp_deregister_style('contact-form-7');

  wp_deregister_style('photoswipe-default-skin');
  wp_dequeue_style('photoswipe-default-skin');

  wp_deregister_style('multiple_vendor');
  wp_dequeue_style('multiple_vendor');

  wp_dequeue_style( 'wp-block-library' ); // WordPress core
  wp_dequeue_style( 'wp-block-library-theme' ); // WordPress core
  wp_dequeue_style( 'wc-block-style' ); // WooCommerce
  wp_dequeue_style( 'storefront-gutenberg-blocks' ); // Storefront theme
  wp_dequeue_style( 'wc-sagepaydirect' ); // Sage pay form
}
add_filter( 'wp_enqueue_scripts', 'remove_default_css', 999999 );
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

// REMOVE ADDITIONAL UNWANTED SCRIPTS/STYLES
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );


?>
