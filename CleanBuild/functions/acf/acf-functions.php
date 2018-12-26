<?php

// OPTION PAGES
if( function_exists('acf_add_options_page') ) {
  $theme_options_args = array(
    'page_title' => 'Theme Options',
    'menu_title' => 'Theme Options',
    'menu_slug' 	=> 'theme_options',
    'icon_url' => 'dashicons-admin-generic',
  );

  $company_details_args = array(
    'page_title' => 'Company Details',
    'menu_title' => 'Company Details',
    'parent_slug' 	=> 'theme_options',
    'post_id' => 'company',
  );

  $footer_sections_args = array(
    'page_title' => 'Footer Sections',
    'menu_title' => 'Footer Sections',
    'parent_slug' 	=> 'theme_options',
    'post_id' => 'footer',
  );

  $post_sections_args = array(
    'page_title' => 'Post Sections',
    'menu_title' => 'Post Sections',
    'parent_slug' 	=> 'theme_options',
    'post_id' => 'post_sections',
  );

  $seasonal_opening_hours_args = array(
    'page_title' => 'Seasonal Hours',
    'menu_title' => 'Seasonal Hours',
    'parent_slug' 	=> 'theme_options',
    'post_id' => 'seasonal',
  );

  acf_add_options_page($theme_options_args);
  acf_add_options_page($company_details_args);
  acf_add_options_sub_page($footer_sections_args);
  acf_add_options_sub_page($post_sections_args);
  acf_add_options_sub_page($seasonal_opening_hours_args);
}

// ACF SYNC
 function acf_json_sync_save( $path ) {

    // Save to custom path
    $path = get_stylesheet_directory() . '/functions/acf/acf-fields-sync';

    return $path;
}

function acf_json_sync_load( $paths ) {

    // Unset default path
    unset($paths[0]);

    // Load from custom path
    $paths[] = get_stylesheet_directory() . '/functions/acf/acf-fields-sync';

    return $paths;
}

add_filter('acf/settings/save_json', 'acf_json_sync_save');
add_filter('acf/settings/load_json', 'acf_json_sync_load');

?>
