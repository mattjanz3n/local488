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
	 * @return WP_Query results.
	 */
	public static function get_wp_query( $args ) {
		$obj = new self( $args );
		return $obj->query;
	}

	protected function __construct( $args ) {
		$this->args = $args;
		$posts_per_page = 6;
		$paged = get_query_var('paged', 1);

		if (wp_is_mobile()) {
			$posts_per_page = 8;
		}

		add_filter('posts_results', array( $this, 'results_filter' ));

		$this->query = new WP_Query(array(
			'post_type' => array_keys($args),
			'paged' => $paged,
			'posts_per_page' => $posts_per_page,
			'orderby' => 'date',
			'post_status' => 'publish'
		));

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
