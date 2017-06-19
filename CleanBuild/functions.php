<?php

// Enqueue Custom Scripts
function custom_scripts() {
  wp_enqueue_script( 'jq-link', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js', array(), null, true );
  wp_enqueue_script( 'fa-link', 'https://use.fontawesome.com/XXXXXXXXXXXX.js', array(), null, true );
	wp_enqueue_script( 'site-script', get_stylesheet_directory_uri() . '/js/site.js', array(), filemtime( get_stylesheet_directory() . '/js/site.js' ), true );
}
add_action( 'wp_enqueue_scripts', 'custom_scripts' );

// Enqueue Custom Styles
function custom_styles() {
  wp_enqueue_style( 'site-style', get_stylesheet_directory_uri() . '/style.css', array(), filemtime( get_stylesheet_directory() . '/style.scss' ), 'all' );
}
add_action( 'wp_enqueue_scripts', 'custom_styles' );

// Remove unnecessary styles / scripts
remove_action('wp_print_styles', 'cc_tabby_css', 30);
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );


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


// Enable Thumbnails
add_theme_support( 'post-thumbnails' );

// Init Menus
register_nav_menus( array(
	'Main Navigation' => 'Main Menu',
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


// ACF functions
if( function_exists('acf_add_options_page') ) {
  $company_details_args = array(
    'page_title' => 'Company Details',
    'menu_title' => 'Company Details',
    'icon_url' => 'dashicons-id',
    'post_id' => 'company',
  );
  acf_add_options_page($company_details_args);
}


function company_name_func( $atts ){
	return get_field('company_name', 'company');
}
add_shortcode( 'company-name', 'company_name_func' );

function company_email_address_func( $atts ){
  $a = shortcode_atts( array(
		'link'	=> 'false',
	), $atts );

	$link = esc_attr($a['link']);

	if ($link == 'true'){
		return 'mailto:' . antispambot(get_field('company_email_address', 'company')) . '?subject=Website enquiry';
	} else {
		return get_field('company_email_address', 'company');
  }
}
add_shortcode( 'email', 'company_email_address_func' );

function company_phone_number_func( $atts ){
  $a = shortcode_atts( array(
		'link'	=> 'false',
	), $atts );

	$link = esc_attr($a['link']);
  $number = get_field('company_phone_number', 'company');
  $number_short = substr($number, 1);
  $number_space = str_replace(' ', '', $number_short);
  $number_link = '+44' . $number_space;
  $number_front = '+44 (0)' . $number_short;
	if ($link == 'true'){
		return $number_link;
	} else {
		return $number;
  }
}
add_shortcode( 'phone', 'company_phone_number_func' );

function company_fax_number_func( $atts ){
	return get_field('company_fax', 'company');
}
add_shortcode( 'fax', 'company_fax_number_func' );

function company_address_func( $atts ){
  $html .= '<li>' . get_field('company_name', 'company') . '</li>';
  while ( have_rows('company_address','company') ) : the_row();
    $html .= '<li>' . get_sub_field('address_line') . '</li>';
  endwhile;

  return $html;

}
add_shortcode( 'address', 'company_address_func' );

function company_social_func( $atts ){

  while ( have_rows('social_links','company') ) : the_row();
    $html .= '<a href="'. get_sub_field('social_link') .'" rel="nofollow" target="_blank">' . get_sub_field('icon') . '</a>';
  endwhile;

  return $html;

}
add_shortcode( 'social', 'company_social_func' );

// Custom styles for ACF font awesome extension
function custom_acf_fa_styles() {
  echo '<style media="screen">
  	.fa-select2-field {
  		width: calc(100% - 100px) !important;
      float: right;
      margin-top: 23px;
  	}
  	.fa-live-preview {
  		width: 75px;
      float: left;
  	}
  </style>';
}
add_action('admin_head', 'custom_acf_fa_styles');


// Custom Excerpt Function
function replace_excerpt($content) {
  $post = get_post();
  return str_replace('[&hellip;]', '... <a href="'. get_permalink($post->ID) . '">Read more</span>', $content);
}
add_filter('the_excerpt', 'replace_excerpt');

?>
