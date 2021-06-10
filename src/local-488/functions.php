<?php
/**
 * Theme functions and definitions.
 *
 * @package Local_488
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

/**
 * Text domain definition
 */
defined( 'THEME_TD' ) ? THEME_TD : define( 'THEME_TD', 'local_488' );

// Load modules
$theme_includes = array(
	'/lib/helpers.php',
	'/lib/class-local488-news-query.php',
	'/lib/cleanup.php',                                             // Clean up default theme includes
	'/lib/enqueue-scripts.php',                                     // Enqueue styles and scripts
	'/lib/protocol-relative-theme-assets.php',                  // Protocol (http/https) relative assets path
	'/lib/framework.php',                                          // Css framework related stuff (content width, nav walker class, comments, pagination, etc.)
	'/lib/theme-support.php',                                      // Theme support options
	'/lib/template-tags.php',                                      // Custom template tags
	'/lib/menu-areas.php',                                         // Menu areas
	'/lib/widget-areas.php',                                       // Widget areas
	'/lib/customizer.php',                                         // Theme customizer
	'/lib/vc_shortcodes.php',                                      // Visual Composer shortcodes
	'/lib/jetpack.php',                                            // Jetpack compatibility file
	'/lib/acf_field_groups_type.php',                              // ACF Field Groups Organizer
	'/lib/acf_blocks_loader.php',                                  // ACF Blocks Loader
	'/lib/wp_dashboard_customizer.php',                            // WP Dashboard customizer
	'/lib/acf-options.php',                                         // Acf options page
	'/lib/ajax-posts-filter.php',                                   // Ajax Posts Filter
	'/lib/ajax-categories-posts-filter.php',                        // Ajax Categories Community Involvement Posts Filter
	'/lib/ajax-categories-new-and-events-posts-filter.php',         // Ajax Categories New and Events Posts Filter
	'/lib/ajax-get-new-post.php',
	'/lib/breadcrumbs.php',                                         // Breadcrumbs
);

foreach ( $theme_includes as $file ) {
	if ( ! locate_template( $file ) ) {
		/* translators: %s error*/
		trigger_error( esc_html( sprintf( esc_html( __('Error locating %s for inclusion', 'local_488') ), $file ) ), E_USER_ERROR ); // phpcs:ignore
		continue;
	}
	require_once locate_template( $file );
}
unset( $file, $filepath );

// Remove Comments//
function hide_menu() {

	 /* REMOVE DEFAULT MENUS */
	 remove_menu_page( 'edit-comments.php' ); // Comments
	 remove_menu_page( 'plugins.php' ); // Plugins
}

add_action( 'admin_head', 'hide_menu' );

function remove_dashboard_meta() {
		remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );// since 3.8
}
add_action( 'admin_init', 'remove_dashboard_meta' );

/**
 * wp_has_sidebar Add body class for active sidebar
 *
 * @param array $classes - classes
 * @return array
 */
function wp_has_sidebar( $classes ) {
	if ( is_active_sidebar( 'sidebar' ) ) {
		// add 'class-name' to the $classes array
		$classes[] = 'has_sidebar';
	}
	return $classes;
}

add_filter( 'body_class', 'wp_has_sidebar' );

// Remove the version number of WP
// Warning - this info is also available in the readme.html file in your root directory - delete this file!
remove_action( 'wp_head', 'wp_generator' );


/**
 * Obscure login screen error messages
 *
 * @return string
 */
function wp_login_obscure() {
	return printf(
		'<strong>%1$s</strong>: %2$s',
		__( 'Error' ),
		__( 'wrong username or password' )
	);
}

add_filter( 'login_errors', 'wp_login_obscure' );

/**
 * Require Authentication for All WP REST API Requests
 *
 * @param WP_Error|null|true $result WP_Error if authentication error, null if authentication method wasn't used, true if authentication succeeded.
 * @return WP_Error
 */
function rest_authentication_require( $result ) {
	if ( true === $result || is_wp_error( $result ) ) {
		return $result;
	}

	if ( ! is_user_logged_in() ) {
		return new WP_Error(
			'rest_not_logged_in',
			__( 'You are not currently logged in.' ),
			array( 'status' => 401 )
		);
	}

	return $result;
}

add_filter( 'rest_authentication_errors', 'rest_authentication_require' );


// Disable the theme / plugin text editor in Admin
define( 'DISALLOW_FILE_EDIT', true );

/**
 * Json Request
 */
function runJsonRequest() {
	include 'lib/request-json.php';
	exit();
}

if ( isset( $_GET['json_request'] ) ) {
	add_action( 'init', 'runJsonRequest' );
}
