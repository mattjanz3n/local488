<?php
/**
 * Register navigation menus
 *
 * @link https://codex.wordpress.org/Function_Reference/register_nav_menus
 * @package Local_488
 */

add_action( 'after_setup_theme', 'register_theme_menus' );

/**
 * register_theme_menus
 *
 * @return void
 */
function register_theme_menus() {
	register_nav_menus(
		array(
			'primary'     => __( 'Primary Menu', 'local_488' ),
			'secondary'     => __( 'Secondary Menu', 'local_488' ),
			'footer_menu' => __( 'Footer Menu', 'local_488' ),
		)
	);
}
