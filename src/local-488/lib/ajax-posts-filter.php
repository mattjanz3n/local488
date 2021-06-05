<?php

	function posts_filter () {
	?>
		<?php
		$category = $_POST['category'];

		if (!empty($category)) {
			$arg = array(
					'post_type' => 'post',
					'order'          => 'DESC',
					'orderby'        => 'date',
					'posts_per_page' => 9999,
					'post_status'    => 'publish',
					'tax_query' => array(
							array(
									'taxonomy' => 'category',
									'field' => 'slug',
									'terms' => $category,
							)
					)
			);
		}
		else {
			$arg = array(
					'post_type' => 'post',
					'order'          => 'DESC',
					'orderby'        => 'date',
					'posts_per_page' => 9999,
					'post_status'    => 'publish',
			);
		}
		$the_query_post = new WP_Query( $arg );
		if ( $the_query_post->have_posts() ) :?>
			<?php while ( $the_query_post->have_posts() ) :
				$the_query_post->the_post();
				$post_time = get_the_time( 'l, j F, Y');
				?>
				<article class="loc-single-post" id="post-<?php the_ID(); ?>">
					<div class="loc-single-post__header">
						<div class="loc-single-post__post-time">
							<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
								<?php echo $post_time; ?>
							</time>
						</div>
						<div class="nav-categories loc-single-post__categories">
							<?php $categories_list = get_the_category();
							if(!empty ($categories_list) ) :
								foreach( $categories_list as $category ){
									$category_color = get_field('category_color', $category->taxonomy . '_' . $category->cat_ID); ?>
									<a  class="nav-categories loc-single-post__categories-link <?php echo "$category->slug";?> <?= $category_color ?> .category-list__category-link" href="#<?= $category->slug; ?>" data-slug="<?= $category->slug; ?>"><?php echo "$category->name";?></a>
								<?php }
							endif; ?>
						</div>

						<?php $post_title = get_the_title();

						if(!empty($post_title)) : ?>

							<h4 class="entry-title loc-single-post__title-small">
								<a href="<?php echo esc_url( get_permalink() ) ?>">
									<?php echo $post_title; ?>
								</a>
							</h4>

						<?php endif ?>


					</div>
					<div class="entry-footer loc-single-post__footer">
						<a class="loc-single-post__post-link" href="<?php echo esc_url( get_permalink() ) ?>">

							<?php _e('Read More', THEME_TD); ?>

							<span class="loc-single-post__post-link-svg">
								<svg width="19" height="18" fill="none" xmlns="http://www.w3.org/2000/svg">
									<circle cx="9.5" cy="9" r="9" fill="#000"/>
									<path d="M8.213 12.857L12.07 9 8.213 5.143" stroke="#F9F9F9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</span>
						</a>
					</div>
				</article>
			<?php endwhile; ?>
		<?php endif;  wp_reset_query(); wp_die();?>
<?php
}

add_action( 'wp_ajax_posts_filter', 'posts_filter' );
add_action( 'wp_ajax_nopriv_posts_filter', 'posts_filter' );

