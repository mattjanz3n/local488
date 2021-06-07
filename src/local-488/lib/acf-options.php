<?php if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page(
		array(
			'page_title' => 'Theme General Settings',
			'menu_title' => 'Theme Settings',
			'menu_slug'  => 'theme-general-settings',
			'capability' => 'edit_posts',
			'redirect'   => false,
		)
	);

	acf_add_options_sub_page(
		array(
			'page_title'  => 'Theme Header Settings',
			'menu_title'  => 'Header',
			'parent_slug' => 'theme-general-settings',
		)
	);

	acf_add_options_sub_page(
		array(
			'page_title'  => 'Theme Footer Settings',
			'menu_title'  => 'Footer',
			'parent_slug' => 'theme-general-settings',
		)
	);

}

/**
 * Copyright field functionality
 *
 * @param array $field ACF Field settings
 *
 * @return array
 */

function populate_copyright_instructions( $field ) {
	$field['instructions'] = 'Input <code>@year</code> to replace static year with dynamic, so it will always shows current year.';
	return $field;
}

add_action( 'acf/load_field/name=copyright', 'populate_copyright_instructions' );

if ( ! is_admin() ) {
	// Replace @year with current year
	add_filter(
		'acf/load_value/name=copyright',
		function ( $value ) {
			return str_replace( '@year', date( 'Y' ), $value );
		}
	);
}
