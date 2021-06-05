<?php

function news_get_new_post()
{
	$today = getdate();
	$lastDate = $_POST['lastDate'];

	$arg = array(
		'post_type' => 'post',
		'order' => 'DESC',
		'orderby' => 'date',
		'posts_per_page' => 20,
		'post_status' => 'publish',
		'date_query' => array(
			'after' => array(
				'year' => $lastDate['year'],
				'month' => $lastDate['month'],
				'day' => $lastDate['day'],
			),
			'before' => array(
				'year' => $today['year'],
				'month' => $today['mon'],
				'day' => $today['mday'],
			),
			'inclusive' => true,
		),
	);

	$the_query_post = new WP_Query($arg);

	echo $the_query_post->post_count;
	wp_die();
}

add_action('wp_ajax_news_get_new_post', 'news_get_new_post');
add_action('wp_ajax_nopriv_news_get_new_post', 'news_get_new_post');


