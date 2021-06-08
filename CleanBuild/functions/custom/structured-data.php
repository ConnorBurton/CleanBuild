<?php

function structured_data() {

  // Gets the company name from comapany details
  $name = get_field('company_name', 'company');

  // Gets the company logo from comapany details
  $logo = get_field('company_logo', 'company');

  // Gets the company name from comapany details
  $fax = get_field('company_fax', 'company');

  // Gets the page featured image
  $featured_image = get_the_post_thumbnail_url();

  // Gets the publish date
  $publish_date = get_the_date();

  // Gets the modified date
  $modified_date = get_the_modified_date();

  // Gets the page title
  $page_title = get_the_title();

  // Gets the page url
  $page_url = get_permalink();

  // Gets the blog type
  $blog_type = get_field('blog_type');

  // Gets the first phone number from company details
  if(get_field('company_phone_number', 'company')) {
    while ( have_rows('company_phone_number', 'company') ) : the_row();
      $phone_count++;
      if($phone_count === 1) { $phone = get_sub_field('phone_number'); }
    endwhile;
  }

  // Gets the first email address from company details
  if(get_field('company_email_address', 'company')) {
    while ( have_rows('company_email_address', 'company') ) : the_row();
      $email_count++;
      if($email_count === 1) { $email = get_sub_field('email_address'); }
    endwhile;
  }
  

  // Gets the first address row and automaticly sorts with the correct type
  if(get_field('company_address', 'company')) {
    while ( have_rows('company_address', 'company') ) : the_row();
      $address_count++;
      while ( have_rows('address') ) : the_row();
        $address = get_sub_field('address_line');
        $type = get_sub_field('type');
        if($type) {
          $address_line .= '"'. $type .'": "'. $address .'",';
        }
      endwhile;
    endwhile;
  }
  

  // Gets the social accounts
  if(get_field('social_links', 'company')) {
    $social_total = count(get_field('social_links', 'company'));
    while ( have_rows('social_links', 'company') ) : the_row();
      $social_count++;
      $social_links .= '"'. get_sub_field('social_link') .'"';
      if($social_total != $social_count) {
        $social_links .= ',';
      }
    endwhile;
  }

  // Gets the opening hours from company details
  if(get_field('company_opening_structured_data', 'company')) {
    $open_total = count(get_field('company_opening_structured_data', 'company'));
    while ( have_rows('company_opening_structured_data', 'company') ) : the_row();
      $open_count++;
      $days = null;
      $day_count = null;
      $open_time = get_sub_field('opening_time');
      $close_time = get_sub_field('closing_time');
      $day_total = count(get_sub_field('days'));
      while ( have_rows('days') ) : the_row();
        $day_count++;
        $days .= '"'. get_sub_field('day') .'"';
        if($day_total != $day_count) {
          $days .= ',';
        }
      endwhile;
      $opening_hours .= '{ "@type": "OpeningHoursSpecification",';
      $opening_hours .= '"dayOfWeek": ['. $days .'],"opens": "'. $open_time .'", "closes": "'. $close_time .'"';
      $opening_hours .= '}';
      if($open_total != $open_count) {
        $opening_hours .= ',';
      }
    endwhile;
  }


  $json = '';


  //  START JSON
  $json .= '[';

  //  OPENING LOCAL BUSINESS STRUCTURED DATA

  $json .= '{';
  $json .= '"@context": "http://schema.org",';
  $json .= '"@type": "LocalBusiness",';

  if($name)           { $json .= '"name": "'. $name .'",'; }
  if($logo)           { $json .= '"logo": "'. $logo .'",'; }
  if($featured_image) { $json .= '"image": "' . $featured_image . '",'; }
  if($phone)          { $json .= '"telephone": "'. $phone .'",'; }
  if($email)          { $json .= '"email": "'. $email .'",'; }
  if($fax)            { $json .= '"faxNumber": "'. $fax .'",'; }

  if($address_line) {
    $json .= '"address": {';
    $json .= '"@type": "PostalAddress",';
    $json .= $address_line;
    $json .= '"addressCountry": "UK"';
    $json .= '},';
  }

  if($opening_hours) {
    $json .= '"openingHoursSpecification": [';
    $json .= $opening_hours;
    $json .= '],';
  }

  $json .= '"url" : "'. get_site_url() .'",';

  if($social_links) {
    $json .= '"sameAs": [';
    $json .= $social_links;
    $json .= ']';
  }

  $json .= '}';

  // CLOSING LOCAL BUSINESS STRUCTURED DATA


  if(is_singular('post')) {

    $json .= ',';
    $json .= '{';
    $json .= '"@context": "https://schema.org",';

    if($blog_type) {
      $json .= '"@type": "'. $blog_type .'",';
    } else {
      $json .= '"@type": "Article",';
    }


    $json .= '"headline": "'. $page_title .'",';

    if($name) {
      $json .= '"author": {';
      $json .= '"@type": "Organization",';
      $json .= '"name": "'. $name .'"';
      $json .= '},';

      $json .= '"publisher": {';
      $json .= '"@type": "Organization",';
      $json .= '"name": "'. $name .'",';
      if($logo) { $json .= '"logo": "'. $logo .'"'; }
      $json .= '},';
    }

    $json .= '"mainEntityOfPage": {';
    $json .= '"@type": "WebPage",';
    $json .= '"@id": "'. $page_url .'"';
    $json .= '},';

    $json .= '"dateModified": "'. $modified_date .'",';
    $json .= '"datePublished": "'. $publish_date .'",';
    if($featured_image) { $json .= '"image": ["' . $featured_image . '"]'; }
    $json .= '}';

  }


  $json .= ']';
  //  END JSON


  echo '<script type="application/ld+json">';
  echo $json;
  echo '</script>';

}
add_action( 'wp_footer', 'structured_data' );

?>