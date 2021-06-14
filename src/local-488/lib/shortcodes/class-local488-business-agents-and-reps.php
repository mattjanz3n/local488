<?php

defined( 'ABSPATH' ) || exit;

/**
 * Handles registration and rendering of the [local488_agents_and_reps] shortcode.
 *
 * Usage:
 * [local488_agents_and_reps id="<id here>"]
 * [local488_agents_and_reps slug="<slug here>"]
 *
 * Providing an ID is slightly better for performance. An ID of a Business
 * Agents and Reps post type can be found in the URL when you open a post.
 */
class Local488_Business_Agents_And_Reps {

	public function __construct() {
		add_action( 'init', array( $this, 'register_shortcode' ) );
	}

	public function register_shortcode() {
		add_shortcode( 'local488_agents_and_reps', array( $this, 'render' ) );
	}

	/**
	 * @param array  $atts Shortcode attributes. Read class description for information.
	 * @param string $content Shortcode content. Has no effect.
	 * @return string Expanded shortcode.
	 */
	public function render( $atts, $content = null ) {
		if ( empty( $atts['id'] ) && empty( $atts['slug'] ) ) {
			return '';
		}
		if ( ! empty( $atts['id'] ) ) {
			$args = array(
				'post_type'   => 'agents-and-reps',
				'numberposts' => 1,
				'p'           => (int) $atts['id'],
			);

		} elseif ( ! empty( $atts['slug'] ) ) {
			$args = array(
				'post_type'   => 'agents-and-reps',
				'numberposts' => 1,
				'name'        => $atts['slug'],
			);
		}

		$query_results = get_posts( $args );
		if ( empty( $query_results ) ) {
			return '';
		}

		$post  = $query_results[0];
		$html  = '<div class="agents-and-reps-data">';
		$html .= '<p>';
		$html .= '<strong>' . $post->post_title . '</strong>';
		$html .= '</p>';
		$html .= $post->post_content;
		$html .= '</div>';
		return $html;
	}

}

return new Local488_Business_Agents_And_Reps();
