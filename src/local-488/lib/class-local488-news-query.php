<?php

/**
 * Query posts for the news and events page.
 *
 * Usage: $query = Local488_News_Query::get_wp_query( array( ... ) );
 */
class Local488_News_Query {

	/** @var WP_Query Query results. */
	protected $query = null;

	/** @var array Filtering arguments. */
	protected $args = null;

	/**
	 * $args is an array specifying what will be returned in the results. Keys are
	 * post types (e.g. 'post'), values are either 'true', or a arrays further
	 * specifying which posts from a post type are allowed (post type specifiers).
	 *
	 * Currently, post type specifiers only support the 'categories' parameter,
	 * which takes an array of categories from which posts will be returned.
	 *
	 * @param array $args Query parameters. See description.
	 * @param array $query_options Optional. Additional query options.
	 * @return WP_Query results.
	 */
	public static function get_wp_query( $args, $query_options = array() ) {
		$obj = new self( $args, $query_options );
		return $obj->query;
	}

	protected function __construct( $args, $query_options = array() ) {
		$this->args = $args;
		$posts_per_page = 6;

		if (wp_is_mobile()) {
			$posts_per_page = 8;
		}

		add_filter('posts_results', array( $this, 'results_filter' ));

		$query_args = wp_parse_args($query_options,
									array(
			'post_type' => array_keys($args),
			'posts_per_page' => $posts_per_page,
			'orderby' => 'date',
			'post_status' => 'publish'
		));

		error_log('Arguments are...');
		error_log( print_r( $query_args, true ) );

		$this->query = new WP_Query($query_args);

		remove_filter('posts_results', array( $this, 'results_filter' ));
	}

	/**
	 * @param WP_Post[] $posts Post results.
	 */
	public function results_filter( $posts ) {
		return array_filter( $posts, function( $post ) {
			$spec = $this->args[$post->post_type];
			if ( is_array( $spec ) ) {
				if ( ! in_category($spec['categories'], $post) ) {
					return false;
				}
			}
			return true;
		} );
	}

}
