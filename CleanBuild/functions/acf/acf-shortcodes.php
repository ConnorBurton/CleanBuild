<?php

// COMPANY NAME SHORTCODE
function company_name_func( $atts ){
	return get_field('company_name', 'company');
}
add_shortcode( 'company-name', 'company_name_func' );

// EMAIL ADDRESS SHORTCODE
function company_email_address_func( $atts ){
  $a = shortcode_atts( array(
		'link'	=> 'false',
	), $atts );

	$link = esc_attr($a['link']);

	if ($link == 'true'){
		return 'mailto:' . antispambot(get_field('company_email_address', 'company'), 0) . '?subject='. get_field('company_name', 'company') .' (Website enquiry)';
	} else {
		return antispambot(get_field('company_email_address', 'company'), 0);
  }
}
add_shortcode( 'email', 'company_email_address_func' );


// PHONE NUMBER SHORTCODE
function company_phone_number_func( $atts ){
  $a = shortcode_atts( array(
		'link'	=> 'false',
	), $atts );

	$link = esc_attr($a['link']);
  $number = get_field('company_phone_number', 'company');
  $number_short = substr($number, 1);
  $number_space = str_replace(' ', '', $number_short);
  $number_link = '+44' . $number_space;
	if ($link == 'true'){
		return $number_link;
	} else {
		return $number;
  }
}
add_shortcode( 'phone', 'company_phone_number_func' );

// COMPANY FAX SHORTCODE
function company_fax_number_func( $atts ){
	return get_field('company_fax', 'company');
}
add_shortcode( 'fax', 'company_fax_number_func' );


// COMPANY ADDRESS SHORTCODE
function company_address_func( $atts ){
  $html .= '<li>' . get_field('company_name', 'company') . '</li>';
  while ( have_rows('company_address','company') ) : the_row();
    $html .= '<li>' . get_sub_field('address_line') . '</li>';
  endwhile;

  return $html;

}
add_shortcode( 'address', 'company_address_func' );

// SOCIAL LINKS SHORTCODE
function company_social_func( $atts ){

  while ( have_rows('social_links','company') ) : the_row();
    $html .= '<a href="'. get_sub_field('social_link') .'" rel="nofollow" target="_blank">' . get_sub_field('icon') . '</a>';
  endwhile;

  return $html;

}
add_shortcode( 'social', 'company_social_func' );

?>
