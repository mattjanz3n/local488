<?php

/**
 * Query posts for the news and events page.
 *
 * Usage: $query = Local488_News_Query::get_wp_query( array( ... ) );
 */
class Local488_News_Query {

	/** @var WP_Query Query results. */
	protected $query = null;

	/**
	 * Get a WP_Query for News & Events page.
	 *
	 * @param array $args {
	 *     @type bool $managers_messages Whether to include managers-messages post type.
	 *     @type array $post Array of categories from 'post' post type to include.
	 * }
	 * @param array $query_options Optional. Additional options to pass to WP_Query.
	 * @return WP_Query results.
	 */
	public static function get_wp_query( $args, $query_options = array() ) {
		$obj = new self( $args, $query_options );
		return $obj->query;
	}

	/**
	 * Escapes PHP array values and converts them into SQL array.
	 *
	 * @param array $arr PHP array to convert into SQL array.
	 * @return string SQL array.
	 */
	public function to_sql_array( $arr ) {
		$arr = array_map(function( $elem ) {
			$elem = sanitize_title_for_query( $elem );
			$elem = "'". $elem ."'";
			return $elem;
		}, $arr);

		return '('. implode(',', $arr) .')';
	}

	protected function __construct( $args, $query_options = array() ) {
		global $wpdb;
		$posts_per_page = 6;
		if ( wp_is_mobile() ) {
			$posts_per_page = 8;
		}

		if ( empty($args['post']) && empty($args['managers_messages']) ) {
			// No results.
			$this->query = new WP_Query();
			return;
		}

		if ( empty($args['post'])) {
			$query_args = wp_parse_args(
				$query_options,
				array(
					'post_type' => 'managers-messages',
					'posts_per_page' => $posts_per_page,
					'orderby' => 'date',
					'post_status' => 'publish'
				)
			);
			$this->query = new WP_Query( $query_args );
			return;
		} else if ( empty($args['managers_messages']) ) {
			$query_args = wp_parse_args(
				$query_options,
				array(
					'post_type' => 'post',
					'tax_query' => array(
						array(
							'taxonomy' => 'category',
							'terms' => $args['post'],
							'field' => 'slug',
						)
					),
					'posts_per_page' => $posts_per_page,
					'orderby' => 'date',
					'post_status' => 'publish'
				)
			);
			$this->query = new WP_Query($query_args);
			return;
		}

		$select = "SELECT {$wpdb->posts}.id AS post_id";
		$from = "FROM {$wpdb->posts}";
		$join = <<<SQL
JOIN {$wpdb->term_relationships}
ON {$wpdb->posts}.id = {$wpdb->term_relationships}.object_id
JOIN {$wpdb->terms}
ON {$wpdb->terms}.term_id = {$wpdb->term_relationships}.term_taxonomy_id
JOIN {$wpdb->term_taxonomy}
ON {$wpdb->term_relationships}.term_taxonomy_id = {$wpdb->term_taxonomy}.term_id
SQL;
		$where = <<<SQL
WHERE {$wpdb->posts}.post_type = 'managers-messages'
OR {$wpdb->term_taxonomy}.taxonomy = 'category'
AND {$wpdb->posts}.post_type = 'post'
AND {$wpdb->terms}.slug IN {$this->to_sql_array($args['post'])}
SQL;
		$group_by = 'GROUP BY post_id';

		$sql = "${select} ${from} ${join} ${where} ${group_by}";

		$results = $wpdb->get_results( $sql, ARRAY_A );

		// I'll see how to best transform results into IDs.
		var_dump($results);
		var_dump($sql);
		exit;
	}
}
