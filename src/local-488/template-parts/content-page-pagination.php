<?php
/**
 * Template part for displaying page pagination.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package Local_488
 */


	$previous_arrow =
		'
			<svg width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg">
				<circle r="8" transform="matrix(-1 0 0 1 9 9)" stroke="#000" stroke-width="2"/>
				<path d="M10.287 12.857L6.43 9l3.857-3.857" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		';

	$next_arrow =
		'
			<svg width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg">
				<circle cx="9" cy="9" r="8" stroke="#000" stroke-width="2"/>
				<path d="M7.713 12.857L11.57 9 7.713 5.143" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		';


	$post_pagination = get_the_posts_pagination(
		array(
			'show_all'           => false,
			'mid_size'           => 4,
			'prev_next'          => true,
			'prev_text'          => __( $previous_arrow ),
			'next_text'          => __( $next_arrow ),
			'screen_reader_text' => __( 'Posts navigation' ),
		)
	);


	if ( ! empty( $post_pagination ) ) : ?>

		<div class="loc-page-pagination">

			<?php
			$post_pagination = str_replace( '<h2 class="screen-reader-text">Posts navigation</h2>', '', $post_pagination );

			echo $post_pagination;
			?>

		</div>

	<?php endif; ?>
