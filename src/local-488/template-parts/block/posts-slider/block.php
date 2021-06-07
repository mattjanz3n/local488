<?php
/**
 * Block Name: Posts Slider
 * Description: It is 488 - Posts Slider block.
 * Category: common
 * Icon: slides
 * Keywords: posts slider acf block
 * Supports: { "align":false, "anchor":true }
 *
 * @package Local_488
 *
 * @var array $block
 */

?>
<section class="posts-list">
	<div class="posts-list__header">
		<div class="posts-list__category">
			<?php
			$categories = get_categories();
			?>
			<ul class="category-list">
				<?php
				foreach ( $categories as $category ) :
					$category_color = get_field( 'category_color', $category->taxonomy . '_' . $category->cat_ID );
					?>
					<li class="category-list__item">
						<a class="category-list__button category-button category-button--<?php echo $category_color; ?> <?php echo 'active'; ?>" href="#" data-slug="<?php echo $category->slug; ?>">
							<?php echo $category->name; ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="posts-list__link button-secondary"><?php _e( 'Read All News', THEME_TD ); ?></a>
	</div>
	<div class="post-list__wrap">
		<div class="single-page-posts-section__wrapper posts-list__slider" id="single-page-posts-section__wrapper">
			<?php
			$arg       = array(
				'post_type'      => 'post',
				'order'          => 'DESC',
				'orderby'        => 'date',
				'posts_per_page' => 500,
				'post_status'    => 'publish',
			);
			$the_query = new WP_Query( $arg );
			if ( $the_query->have_posts() ) :
				?>
				<?php
				while ( $the_query->have_posts() ) :
					$the_query->the_post();
					$post_time = get_the_time( 'F j, Y' );
					?>
					<article class="loc-single-post" id="post-<?php the_ID(); ?>">
						<div class="loc-single-post__header">
							<div class="loc-single-post__post-time">
								<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
									<?php echo $post_time; ?>
								</time>
							</div>
							<div class="nav-categories loc-single-post__categories">
								<?php
								$categories_list = get_the_category();
								if ( ! empty( $categories_list ) ) :
									foreach ( $categories_list as $category ) {
										$category_color = get_field( 'category_color', $category->taxonomy . '_' . $category->cat_ID );
										?>
										<a  class="nav-categories loc-single-post__categories-link <?php echo "$category->slug"; ?> <?php echo $category_color; ?> .category-list__category-link" href="#<?php echo $category->slug; ?>" data-slug="<?php echo $category->slug; ?>"><?php echo "$category->name"; ?></a>
										<?php
									}
								endif;
								?>
							</div>


							<?php
							$post_title = get_the_title();

							if ( ! empty( $post_title ) ) :
								?>

								<h4 class="entry-title loc-single-post__title-small">
									<a href="<?php echo esc_url( get_permalink() ); ?>">
										<?php echo $post_title; ?>
									</a>
								</h4>

							<?php endif ?>


						</div>
						<div class="entry-footer loc-single-post__footer">
							<a class="loc-single-post__post-link read-more-button" href="<?php echo esc_url( get_permalink() ); ?>">

								<?php _e( 'Read More', THEME_TD ); ?>

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
				<?php
			endif;
			wp_reset_query();
			?>
		</div>
		<div class="slick-arrow-custom">
			<button class="slick-arrow-prev">
				<svg class="slick-arrow-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52" id="arrow-slick">
					<circle cx="26" cy="26" r="25" stroke="black" stroke-width="2"></circle>
					<path d="M22 38l11-12-11-12" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
				</svg>
			</button>
			<button class="slick-arrow-next">
				<svg class="slick-arrow-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52" id="arrow-slick">
					<circle cx="26" cy="26" r="25" stroke="black" stroke-width="2"></circle>
					<path d="M22 38l11-12-11-12" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
				</svg>
			</button>
		</div>
		<div class="single-page-posts-section__wrapper single-page-posts-section__wrapper--mobile">
			<?php
			$firs_category = $categories[0]->slug;
			$arg           = array(
				'post_type'      => 'post',
				'order'          => 'DESC',
				'orderby'        => 'date',
				'posts_per_page' => 4,
				'post_status'    => 'publish',
				'category_name'  => $firs_category,
			);
			$the_query     = new WP_Query( $arg );
			if ( $the_query->have_posts() ) :
				?>
				<?php
				while ( $the_query->have_posts() ) :
					$the_query->the_post();
					$post_time = get_the_time( 'F j, Y' );
					?>
					<article class="loc-single-post" id="post-<?php the_ID(); ?>">
						<div class="loc-single-post__header">
							<div class="loc-single-post__post-time">
								<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
									<?php echo $post_time; ?>
								</time>
							</div>
							<div class="nav-categories loc-single-post__categories">
								<?php
								$categories_list = get_the_category();
								if ( ! empty( $categories_list ) ) :
									foreach ( $categories_list as $category ) {
										$category_color = get_field( 'category_color', $category->taxonomy . '_' . $category->cat_ID );
										?>
										<a  class="nav-categories loc-single-post__categories-link <?php echo "$category->slug"; ?> <?php echo $category_color; ?>" href="<?php echo esc_url( get_category_link( $category ) ); ?>"><?php echo "$category->name"; ?></a>
										<?php
									}
								endif;
								?>
							</div>

							<?php
							$post_title = get_the_title();

							if ( ! empty( $post_title ) ) :
								?>

								<h4 class="entry-title loc-single-post__title-small">
									<a href="<?php echo esc_url( get_permalink() ); ?>">
										<?php echo $post_title; ?>
									</a>
								</h4>

							<?php endif ?>

						</div>
						<div class="entry-footer loc-single-post__footer">
							<a class="loc-single-post__post-link read-more-button" href="<?php echo esc_url( get_permalink() ); ?>">

								<?php _e( 'Read More', THEME_TD ); ?>

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
				<?php
			endif;
			wp_reset_query();
			?>
		</div>
	</div>
	<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="posts-list__link posts-list__link--mobile button-secondary"><?php _e( 'Read All News', THEME_TD ); ?></a>
<div class="svg_sprite" style="display: none">
	<svg width="0" height="0" class="hidden">
		<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52" id="arrow-slick">
			<circle cx="26" cy="26" r="25" stroke="black" stroke-width="2"></circle>
			<path d="M22 38l11-12-11-12" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
		</symbol>
	</svg>
</div>
</section>
