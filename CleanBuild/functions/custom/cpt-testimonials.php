<?php

// REGISTER TESTIMONIALS POST TYPE
function register_cpt_testimonial() {
  $labels = array(
    'name' 									=> _x( 'Testimonials', 'testimonials' ),
    'singular_name' 				=> _x( 'Testimonials', 'testimonials' ),
    'add_new' 							=> _x( 'Add Testimonial', 'testimonials' ),
    'add_new_item' 					=> _x( 'Add New Testimonial', 'testimonials' ),
    'edit_item' 						=> _x( 'Edit Testimonial', 'testimonials' ),
    'new_item' 							=> _x( 'New Testimonial', 'testimonials' ),
    'view_item' 						=> _x( 'View Testimonial', 'testimonials' ),
    'search_items' 					=> _x( 'Search Testimonials', 'testimonials' ),
    'not_found' 						=> _x( 'No Testimonials found', 'testimonials' ),
    'not_found_in_trash' 		=> _x( 'No Testimonials found in Trash', 'testimonials' ),
    'parent_item_colon' 		=> _x( 'Parent Testimonial:', 'testimonials' ),
    'menu_name'							=> _x( 'Testimonials', 'testimonials' ),
    'name_admin_bar'				=> _x( 'Testimonial', 'testimonials' ),
    'all_items' 						=> _x( 'All Testimonials', 'testimonials'),
  );
  $args = array(
    'labels' 								=> $labels,
    'hierarchical' 					=> true,
    'description' 					=> 'Testimonials filterable by testimonial',
    'supports' 							=> array( 'title', 'editor' ),
    'public' 								=> true,
    'show_ui' 							=> true,
    'show_in_menu' 					=> true,
    'menu_icon' 						=> 'dashicons-format-quote',
    'show_in_nav_menus'			=> true,
    'publicly_queryable' 		=> true,
    'exclude_from_search' 	=> false,
    'has_archive' 					=> true,
    'query_var' 						=> true,
    'can_export' 						=> true,
    'rewrite' 							=> true,
    'capability_type' 			=> 'post',
  );
  register_post_type( 'testimonials', $args );
}
add_action( 'init', 'register_cpt_testimonial' );

// REMOVE YOAST META BOX FROM TESTIMONIALS
function remove_yoast_metabox_reservations(){
    remove_meta_box('wpseo_meta', 'testimonials', 'normal');
}
add_action( 'add_meta_boxes', 'remove_yoast_metabox_reservations',11 );

 ?>
