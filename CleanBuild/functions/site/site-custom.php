<?php


// Hides the admin bar
add_filter('show_admin_bar', '__return_false');


// SVG Shortcode
function get_svg( $atts, $content = null ) {
	$a = shortcode_atts( array(
		'src' 			=> ''
	), $atts );

	$img_path = esc_attr($atts['src']);
	$ctx = stream_context_create(array('http'=>
	    array(
	        'timeout' => 30,
	    )
	));
	return file_get_contents( get_stylesheet_directory() . '/images/svg/' . $img_path . '.svg');
}
add_shortcode('svg', 'get_svg');
// [svg src="filename"]




// Custom Excerpt Function
function replace_excerpt($content) {
  $post = get_post();
  return str_replace('[&hellip;]', '... <a href="'. get_permalink($post->ID) . '">Read more</span>', $content);
}
add_filter('the_excerpt', 'replace_excerpt');


?>
