<?php

// SVG SHORTCODE
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
	return file_get_contents( get_stylesheet_directory() . '/assets/svg/' . $img_path . '.svg');
}
add_shortcode('svg', 'get_svg');

// Requires the svg to be in folder defined on line 15
// EXAMPLE SHORTCODE:
// [svg src="filename"]


?>
