<?php


// HIDE THE WORDPRESS ADMIN BAR
add_filter('show_admin_bar', '__return_false');


// REPLACE EXCERPT TRAILING [...]
function replace_excerpt_trail($content) {
  $post = get_post();
  return str_replace('[&hellip;]', '... <a href="'. get_permalink($post->ID) . '">Read more</span>', $content);
}
add_filter('the_excerpt', 'replace_excerpt_trail');


// ALLOW SVGS TO BE UPLOADED TO THE MEDIA LIBRARY
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


// DISABLE SRCSET ON EMBEDDED IMAGES
function meks_disable_srcset( $sources ) {
    return false;
}
add_filter( 'wp_calculate_image_srcset', 'meks_disable_srcset' );

?>
