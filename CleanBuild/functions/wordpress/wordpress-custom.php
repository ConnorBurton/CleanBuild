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
function disable_srcset( $sources ) {
    return false;
}
add_filter( 'wp_calculate_image_srcset', 'disable_srcset' );


// CUSTOM EXCERPT LENGTH
function custom_excerpt_length( $length ) {
  if(get_field('custom_excerpt_length', 'post_sections')) {
    $length = get_field('custom_excerpt_length', 'post_sections');
  } else {
    $length = 30;
  }
	return $length;
}
add_filter( 'excerpt_length', 'custom_excerpt_length');


// CUSTOM PREVIOUS / NEXT POST BUTTON CLASSES
function posts_link_attributes() {
  if(get_field('custom_active_button_class', 'post_sections')) {
    return 'class="'. get_field('custom_active_button_class', 'post_sections') .'"';
  }
}
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');


function post_link_attributes($output) {
    if(get_field('custom_active_button_class', 'post_sections')) {
      $code = 'class="'. get_field('custom_active_button_class', 'post_sections') .'"';
      return str_replace('<a href=', '<a '.$code.' href=', $output);
    }
}
add_filter('next_post_link', 'post_link_attributes');
add_filter('previous_post_link', 'post_link_attributes');


// CUSTOM IMAGE SIZES
add_image_size( 'small-on-page', 150, 60 );


// MOVE YOAST META BOX TO THE BOTTOM
function yoasttobottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');


// HAS CHILDREN FUNCTION
function has_children() {
  global $post;
  $children = get_pages( array( 'child_of' => $post->ID ) );
  if( count( $children ) == 0 ) {
    return false;
  } else {
    return true;
  }
}

add_filter( 'plugin_action_links', 'disable_plugin_deactivation', 10, 4 );
function disable_plugin_deactivation( $actions, $plugin_file, $plugin_data, $context ) {
    // Remove edit link for all plugins
    if ( array_key_exists( 'edit', $actions ) )
        unset( $actions['edit'] );
        // Remove deactivate link for important plugins
        if ( array_key_exists( 'deactivate', $actions ) && in_array( $plugin_file, array(
            'advanced-custom-fields-pro/acf.php',
            // 'akismet/akismet.php'
        )))
    unset( $actions['deactivate'] );
    return $actions;
}


?>
