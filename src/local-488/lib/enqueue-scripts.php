<?php
/**
 * Enqueue all styles and scripts.
 *
 * Learn more about enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 * Learn more about enqueue_style: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_style}
 *
 * @package Local_488
 */

if ( ! function_exists( 'local_488_scripts' ) ) :
	/**
	 * local_488_scripts
	 *
	 * @return void
	 */
	function local_488_scripts() {
		// Enqueue the main Stylesheet.
		wp_enqueue_style( 'main-stylesheet', asset_path( 'styles/main.css' ), false, '1.0.3', 'all' );

		// Deregister the jquery version bundled with WordPress.
		wp_deregister_script( 'jquery' );

		// CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
		wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-2.2.4.min.js', [], '2.2.4', false );

		// Enqueue the main JS file.
		wp_enqueue_script( 'main-javascript', asset_path( 'scripts/main.js' ), [ 'jquery' ], '1.0.0', true );

		// Enqueue the notification cookie script
		wp_enqueue_script( 'notice-bar-script', asset_path( 'scripts/notice-bar.js' ), [ 'jquery' ], '1.0.0', true );

		// Enqueue the Google maps JS file.
		$key = get_field('google_api_key', 'option');
		wp_enqueue_script( 'maps-javascript', "//maps.googleapis.com/maps/api/js?key=$key&language=en", array( 'jquery' ), '1.0.0', true );

		// Throw variables from back to front end.
		$theme_vars = array(
			'home'   => get_home_url(),
			'isHome' => is_front_page(),
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
		);
		wp_localize_script( 'main-javascript', 'themeVars', $theme_vars );

		// Comments reply script
		if ( is_singular() && comments_open() ) :
			wp_enqueue_script( 'comment-reply' );
		endif;

		// Enqueue the Select2 JS file.
		wp_enqueue_script( 'select2', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', array( 'jquery' ), '2.2.4', false );

		// Enqueue the Select2 Stylesheet. file.
		wp_enqueue_style( 'select2-stylesheet', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css', false, '0.2.12', 'all' );
	}

	add_action( 'wp_enqueue_scripts', 'local_488_scripts' );
endif;
