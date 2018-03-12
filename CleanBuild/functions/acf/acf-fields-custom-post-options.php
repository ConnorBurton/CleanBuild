<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5aa6921035841',
	'title' => 'Custom Post Options',
	'fields' => array(
		array(
			'key' => 'field_5aa6922d1d4de',
			'label' => 'Custom Excerpt Length',
			'name' => 'custom_excerpt_length',
			'type' => 'text',
			'instructions' => 'Set the max amount of characters for a post excerpt (Default is 30)',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33.333',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5aa693d51d4df',
			'label' => 'Custom Active Button Class',
			'name' => 'custom_active_button_class',
			'type' => 'text',
			'instructions' => 'Add custom classes to the active next/previous buttons',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33.333',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5aa694e51d4e0',
			'label' => 'Custom Disabled Button Class',
			'name' => 'custom_disabled_button_class',
			'type' => 'text',
			'instructions' => 'Add custom classes to the disabled next/previous buttons',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33.333',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-post-sections',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;
?>
