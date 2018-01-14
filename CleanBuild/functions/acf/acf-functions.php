<?php

// OPTION PAGES
if( function_exists('acf_add_options_page') ) {
  $company_details_args = array(
    'page_title' => 'Company Details',
    'menu_title' => 'Company Details',
    'icon_url' => 'dashicons-id',
    'post_id' => 'company',
  );
  acf_add_options_page($company_details_args);
}

?>
