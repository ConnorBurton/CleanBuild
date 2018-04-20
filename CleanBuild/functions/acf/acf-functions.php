<?php

// OPTION PAGES
if( function_exists('acf_add_options_page') ) {
  $company_details_args = array(
    'page_title' => 'Company Details',
    'menu_title' => 'Company Details',
    'icon_url' => 'dashicons-id',
    'post_id' => 'company',
  );
  $footer_sections_args = array(
    'page_title' => 'Footer Sections',
    'menu_title' => 'Footer Sections',
    'icon_url' => 'dashicons-editor-kitchensink',
    'post_id' => 'footer',
  );
  $post_sections_args = array(
    'page_title' => 'Post Sections',
    'menu_title' => 'Post Sections',
    'icon_url' => 'dashicons-welcome-write-blog',
    'post_id' => 'post_sections',
  );
  acf_add_options_page($company_details_args);
  acf_add_options_page($footer_sections_args);
  acf_add_options_page($post_sections_args);
}

?>
