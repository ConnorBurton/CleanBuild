<?php

// COMPANY NAME SHORTCODE
function company_name_func( $atts ){
	return get_field('company_name', 'company');
}
add_shortcode( 'company-name', 'company_name_func' );


// COMPANY REG NUMBER SHORTCODE
function company_reg_func( $atts ){
	return get_field('company_reg_number', 'company');
}
add_shortcode( 'company-reg-number', 'company_reg_func' );

// COMPANY OPENING HOURS SHORTCODE
function company_opening_hours_func( $atts ){
	return get_field('company_opening_hours', 'company');
}
add_shortcode( 'opening-hours', 'company_opening_hours_func' );


// EMAIL ADDRESS SHORTCODE
function company_email_address_func( $atts ){
  $a = shortcode_atts( array(
		'link'	=> 'false',
		'row'	=> '1',
		'quick-link' => 'false',
	), $atts );

	$link = esc_attr($a['link']);
	$row = esc_attr($a['row']);
	$quick = esc_attr($a['quick-link']);
	$counter = 0;
	$company = get_field('company_name', 'company');

	while ( have_rows('company_email_address', 'company') ) : the_row();
		$counter++;
		$email = antispambot(get_sub_field('email_address'), 0);

		if($row == $counter) {
			if($quick == 'true') {
				return '<a href="mailto:' . $email . '?subject='. $company .' (Website enquiry)">'. $email .'</a>';
			} else {
				if ($link == 'true'){
					return 'mailto:' . $email . '?subject='. $company .' (Website enquiry)';
				} else {
					return $email;
			  }
			}
		}

	endwhile;
}
add_shortcode( 'email', 'company_email_address_func' );


// PHONE NUMBER SHORTCODE
function company_phone_number_func( $atts ){
	$a = shortcode_atts( array(
		'link'	=> 'false',
		'row'	=> '1',
		'quick-link' => 'false',
	), $atts );

	$link = esc_attr($a['link']);
	$row = esc_attr($a['row']);
	$quick = esc_attr($a['quick-link']);
	$counter = 0;

	while ( have_rows('company_phone_number', 'company') ) : the_row();
		$counter++;
		$number = get_sub_field('phone_number');
		$first_number = substr($number, 0, 1);
		if($first_number == 0) {
			$number_short = substr($number, 1);
		  $number_space = str_replace(' ', '', $number_short);
		  $number_link = '+44' . $number_space;
		} else {
			$number_space = str_replace(' ', '', $number);
			$number_link = '+44' . $number_space;
		}

		if($row == $counter) {
			if($quick == 'true') {
				return '<a href="tel:' . $number_link . '">'. $number .'</a>';
			} else {
				if ($link == 'true'){
					return 'tel:' . $number_link;
				} else {
					return $number;
				}
			}
		}
	endwhile;


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
	$a = shortcode_atts( array(
		'row'	=> '1',
		'include-name' => 'false',
	), $atts );

	$row = esc_attr($a['row']);
	$name = esc_attr($a['include-name']);
	$counter = 0;
	$html = '';

	while ( have_rows('company_address', 'company') ) : the_row();
		$counter++;
		if($row == $counter) {
			if($name == 'true') {
				$html .= '<li>' . get_field('company_name', 'company') . '</li>';
			}
			while ( have_rows('address') ) : the_row();
		    $html .= '<li>' . get_sub_field('address_line') . '</li>';
		  endwhile;
		}
	endwhile;

  return $html;

}
add_shortcode( 'address', 'company_address_func' );


// SOCIAL LINKS SHORTCODE
function company_social_func( $atts ){
	$html = '';
  while ( have_rows('social_links','company') ) : the_row();
		$link = get_sub_field('social_link');
		$icon = get_sub_field('icon');
		$icon_type = substr($icon, 0, 3);
		if($icon_type == 'fa-') {
			$html .= '<a href="'. $link .'" rel="nofollow" target="_blank"><i class="fa ' . $icon . '" aria-hidden="true"></i></a>';
		} else if($icon_type == 'htt' || $icon_type == '/wp') {
			$html .= '<a href="'. $link .'" rel="nofollow" target="_blank"><img src="' . $icon . '"></a>';
		} else {
			$html .= '<a href="'. $link .'" rel="nofollow" target="_blank">' . $icon . '</a>';
		}
  endwhile;

  return $html;

}
add_shortcode( 'social', 'company_social_func' );

?>