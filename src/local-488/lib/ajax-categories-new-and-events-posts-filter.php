<?php

function categories_news_and_events_posts_filter() {

	$paged    = (int) $_POST['paged'];

	$arg = array();

	if ( isset( $_POST['managers'] ) ) {
		$arg['managers-messages'] = true;
	}

	if ( isset( $_POST['category'] ) ) {
		$arg['post'] = array(
			'categories' => $_POST['category']
		);
	}

	$the_query_post = Local488_News_Query::get_wp_query( $arg );

	if ( $the_query_post->have_posts() ) :

		while ( $the_query_post->have_posts() ) :

			$the_query_post->the_post();

			 get_template_part( 'template-parts/content', get_post_format() );

			endwhile; ?>


			<?php
			( $pages = $the_query_post->max_num_pages );
			if ( $pages > 1 ) :
				?>
					<ul class="main__pagination">
						<?php for ( $i = 1; $i <= $pages; $i ++ ) : ?>
							<li class="paged-number"><a href="#"
														class="pagination"
														data-paged="<?php echo $i; ?>"><?php echo $i; ?></a>
							</li>
						<?php endfor; ?>
						<li class="prev-pagination 
						<?php
						if ( $paged == 1 ) {
							echo ( 'disable' );}
						?>
						"><a href="#" class="page" data-value="prev"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" class="pagination-icon">
									<circle r="8" transform="matrix(-1 0 0 1 9 9)" stroke="black" stroke-width="2"/>
									<path d="M10.2868 12.8571L6.42969 8.99996L10.2868 5.14282" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg></a></li>
						<li class="next-pagination 
						<?php
						if ( $paged == $the_query_post->max_num_pages ) {
							echo ( 'disable' );}
						?>
						"><a href="#" class="page" data-value="next"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" class="pagination-icon">
									<circle r="8" transform="matrix(-1 0 0 1 9 9)" stroke="black" stroke-width="2"/>
									<path d="M10.2868 12.8571L6.42969 8.99996L10.2868 5.14282" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
						</a></li>
					</ul>
			<?php endif; ?>

		<?php
		endif;
	wp_reset_query();
	wp_die();
	?>
	<?php
}

add_action( 'wp_ajax_categories_news_and_events_posts_filter', 'categories_news_and_events_posts_filter' );
add_action( 'wp_ajax_nopriv_categories_news_and_events_posts_filter', 'categories_news_and_events_posts_filter' );


