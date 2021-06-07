<?php
/**
 * Register theme support for languages, menus, post-thumbnails, post-formats etc.
 *
 * @link https://codex.wordpress.org/Function_Reference/add_theme_support
 * @package Local_488
 */

if ( ! function_exists( 'local_488_theme_support' ) ) :
	/**
	 * Add theme supports
	 */
	function local_488_theme_support() {
		// Add language support: @link {https://codex.wordpress.org/Multilingual_WordPress}
		load_theme_textdomain( 'local_488', get_template_directory() . '/languages' );

		// Add menu support
		add_theme_support( 'menus' );

		// Let WordPress manage the document title
		add_theme_support( 'title-tag' );

		// Add post thumbnail support: @link {http://codex.wordpress.org/Post_Thumbnails}
		add_theme_support( 'post-thumbnails' );

		// RSS thingy
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Add post formarts support: @link {http://codex.wordpress.org/Post_Formats}
		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );

		// Declare WooCommerce support per @link {http://docs.woothemes.com/document/third-party-custom-theme-compatibility/}
		add_theme_support( 'woocommerce' );
		// Add widget support shortcodes
		add_filter( 'widget_text', 'do_shortcode' );

		// Custom Background
		add_theme_support( 'custom-background', array( 'default-color' => 'fff' ) );

		// Custom Header
		add_theme_support(
			'custom-header',
			array(
				'default-image' => get_template_directory_uri() . '/assets/dist/images/custom-logo.png',
				'height'        => '200',
				'flex-height'   => true,
				'uploads'       => true,
				'header-text'   => false,
			)
		);

		// add_theme_support( 'disable-custom-colors' );
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => esc_html__( 'Blue', THEME_TD ),
					'slug'  => 'blue',
					'color' => '#131f5f',
				),
				array(
					'name'  => esc_html__( 'Red', THEME_TD ),
					'slug'  => 'red',
					'color' => '#db2222',
				),
				array(
					'name'  => esc_html__( 'Light Gray', THEME_TD ),
					'slug'  => 'light-gray',
					'color' => '#edeef0',
				),
				array(
					'name'  => esc_html__( 'Gray', THEME_TD ),
					'slug'  => 'gray',
					'color' => '#6c7178',
				),
				array(
					'name'  => esc_html__( 'White', THEME_TD ),
					'slug'  => 'White',
					'color' => '#ffffff',
				),
				array(
					'name'  => esc_html__( 'Black', THEME_TD ),
					'slug'  => 'Black',
					'color' => '#000000',
				),

			)
		);

		add_filter(
			'excerpt_length',
			function() {
				return 65;
			}
		);

		add_filter(
			'excerpt_more',
			function( $more ) {
				return '.';
			}
		);

	}

	add_action( 'after_setup_theme', 'local_488_theme_support' );

	/**
	 * Register support for Gutenberg wide images in your theme
	 */
	function mytheme_setup() {
		add_theme_support( 'align-wide' );
	}
	add_action( 'after_setup_theme', 'mytheme_setup' );
endif;


if ( ! function_exists( 'limited_excerpt' ) ) :
	function limited_excerpt( $limit ) {
			$excerpt = explode( ' ', get_the_excerpt(), $limit );

		if ( count( $excerpt ) >= $limit ) {
			array_pop( $excerpt );
			$excerpt = implode( ' ', $excerpt ) . ' ...';
		} else {
			$excerpt = implode( ' ', $excerpt );
		}

			$excerpt = preg_replace( '`\[[^\]]*\]`', '', $excerpt );

			return $excerpt;
	};
endif;


if ( ! function_exists( 'local_acf_google_map_api' ) ) :

	function local_acf_google_map_api( $api ) {
		$api['key'] = get_field( 'google_api_key', 'option' );
		return $api;
	}
	add_filter( 'acf/fields/google_map/api', 'local_acf_google_map_api' );

endif;
