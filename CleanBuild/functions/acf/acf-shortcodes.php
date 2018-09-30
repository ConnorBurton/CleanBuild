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
add_shortcode( 'reg-number', 'company_reg_func' );

// COMPANY OPENING HOURS SHORTCODE
function company_opening_hours_func( $atts ){
	$a = shortcode_atts( array(
		'container' => 'false',
		'single-line' => 'false',
	), $atts );
	$container = esc_attr($a['container']);
	$single_line = esc_attr($a['single-line']);
	$html = '';
	if($container == 'true') {
		$html .= '<div class="opening-hours">';
	}
	if($single_line == 'true') {
		$html .= '<p>';
	}
  while ( have_rows('company_opening_hours','company') ) : the_row();
		if($single_line == 'true') {
			$html .= get_sub_field('time') .' ';
		} else {
			$html .= '<p>'. get_sub_field('time') .'</p>';
		}
  endwhile;
	if($single_line == 'true') {
		$html .= '</p>';
	}
	if($container == 'true') {
		$html .= '</div>';
	}

  return $html;
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
	$html = '';

	while ( have_rows('company_email_address', 'company') ) : the_row();
		$counter++;
		$email = antispambot(get_sub_field('email_address'), 0);

		if($row == $counter) {
			if($quick == 'true') {
				$html .= '<a href="mailto:' . $email . '?subject='. $company .' (Website enquiry)" class="email-link">'. $email .'</a>';
			} else {
				if ($link == 'true'){
					$html .= 'mailto:' . $email . '?subject='. $company .' (Website enquiry)';
				} else {
					$html .= $email;
			  }
			}
		}

	endwhile;
	return $html;
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
	$html = '';

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
				$html .= '<a href="tel:' . $number_link . '" class="phone-link">'. $number .'</a>';
			} else {
				if ($link == 'true'){
					$html .= 'tel:' . $number_link;
				} else {
					$html .= $number;
				}
			}
		}
	endwhile;

	return $html;

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
		'container' => 'true',
	), $atts );

	$row = esc_attr($a['row']);
	$name = esc_attr($a['include-name']);
	$container = esc_attr($a['container']);
	$counter = 0;
	$html = '';
	if($container == 'true') {
		$html .= '<ul class="address-list">';
	}
	while ( have_rows('company_address', 'company') ) : the_row();
		$counter++;
		if($row == $counter) {
			if($name == 'true') {
				$html .= '<li class="address-item address-name">' . get_field('company_name', 'company') . '</li>';
			}
			while ( have_rows('address') ) : the_row();
		    $html .= '<li class="address-item">' . get_sub_field('address_line') . '</li>';
		  endwhile;
		}
	endwhile;
	if($container == 'true') {
		$html .= '</ul>';
	}

  return $html;

}
add_shortcode( 'address', 'company_address_func' );


// SOCIAL LINKS SHORTCODE
function company_social_func( $atts ){
	$a = shortcode_atts( array(
		'container' => 'true',
	), $atts );
	$container = esc_attr($a['container']);
	$html = '';
	if($container == 'true') {
		$html .= '<div class="social-links">';
	}
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
	if($container == 'true') {
		$html .= '</div>';
	}

  return $html;

}
add_shortcode( 'social', 'company_social_func' );

?>
