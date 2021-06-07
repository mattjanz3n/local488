<?php
/**
 * Block Name: Community Involvement
 * Description: It is 488 - Community Involvement Archive section
 * Category: common
 * Icon: list-view
 * Keywords: community involvement archive
 * Supports: { "align":false, "anchor":true }
 *
 * @package Local_488
 *
 * @var array $block
 */
?>

<?php $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; ?>

<?php
$args = array(
	'post_type'      => 'community-involvemen',
	'order'          => 'DESC',
	'orderby'        => 'date',
	'posts_per_page' => 8,
	'post_status'    => 'publish',
	'paged'          => $paged,
);


query_posts( $args );
global $post;
$the_query = new WP_Query( $args );

if ( have_posts() ) :
	setup_postdata( $post );
	?>

	<section class="community-involvment" >

		<div class="community-involvment__container container container--small">

			<div class="community-involvment__wrapper">

				<div class="community-involvment__buttons-wrapper">

					<?php
					$categories_args = array(
						'taxonomy' => 'community_categories',
						'orderby'  => 'name',
						'order'    => 'ASC',
					);

					$post_categories = get_categories( $categories_args );

					foreach ( $post_categories as $post_category ) :
						?>

						<a class="archive-category-button <?php echo 'archive-category-button--' . "$post_category->slug"; ?> community-involvement-button active" href="<?php echo get_category_link( $post_category->term_id ); ?>" data-slug="<?php echo $post_category->slug; ?>" id="<?php echo $post_category->slug; ?>">
							<?php echo $post_category->name; ?>
						</a>
						<?php


					endforeach;
					?>

				</div>

				<div class="community-involvment-article-wrapper">


					<?php
					while ( have_posts() ) :
						the_post();
						?>

						<article class="community-involvment__post community-involvment-article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

							<?php $thumbnail = get_the_post_thumbnail_url(); ?>

							<div class="community-involvment-article__content">

								<?php
								$post_time = get_the_time( 'l, F j, Y' );

								if ( ! empty( $post_time ) ) :
									?>

									<div class="community-involvment-article__post-time">
										<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">

											<?php echo $post_time; ?>

										</time>
									</div>

								<?php endif; ?>



								<?php $terms = get_the_terms( $post->ID, 'community_categories' ); ?>

								<?php if ( ! empty( $terms ) ) : ?>


									<div class="nav-archive-categories community-involvment-article__categories">

										<?php foreach ( $terms as $term ) : ?>

											<a class="nav-archive-categories__link community-involvment-article__categories-link <?php echo 'nav-archive-categories__link--' . "$term->slug"; ?>" href="<?php echo $term->slug; ?>"  data-slug="<?php echo $term->slug; ?>" ><?php echo "$term->name"; ?></a>

										<?php endforeach; ?>

									</div>

								<?php endif; ?>




								<?php
								$post_title = get_the_title();

								if ( ! empty( $post_title ) ) :
									?>

									<h4 class="community-involvment-article__title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo $post_title; ?></a></h4>

								<?php endif; ?>

								<a class="community-involvment-article__post-link read-more-button" href="<?php echo esc_url( get_permalink() ); ?>">

									<?php _e( 'Read More', THEME_TD ); ?>

									<span class="community-involvment-article__post-link-svg read-more-button__svg">
											<svg width="19" height="18" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="9.5" cy="9" r="9" fill="#000"/>
												<path d="M8.213 12.857L12.07 9 8.213 5.143" stroke="#F9F9F9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											</svg>
										</span>
								</a>

							</div>


							<div class="community-involvment-article__image-wrapper" <?php if ( ! empty( $thumbnail ) ) : ?>
								style="background-image: url( <?php echo $thumbnail; ?> )"
							<?php endif; ?> >


							</div>

						</article>

					<?php endwhile; ?>

					<?php
					( $pages = $the_query->max_num_pages );
					if ( $pages > 1 ) :
						?>
							<ul class="main__pagination">
								<?php for ( $i = 1; $i <= $pages; $i ++ ) : ?>
									<li class="paged-number"><a href="#"
																class="pagination 
																<?php
																if ( $i == 1 ) {
																	echo ( 'active' );}
																?>
																"
																data-paged="<?php echo $i; ?>"><?php echo $i; ?></a>
									</li>
								<?php endfor; ?>
								<li class="prev-pagination disable"><a href="#" class="page" data-value="prev">
										<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" class="pagination-icon">
											<circle r="8" transform="matrix(-1 0 0 1 9 9)" stroke="black" stroke-width="2"/>
											<path d="M10.2868 12.8571L6.42969 8.99996L10.2868 5.14282" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
										</svg></a></li>
								<li class="next-pagination"><a href="#" class="page" data-value="next"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" class="pagination-icon">
											<circle r="8" transform="matrix(-1 0 0 1 9 9)" stroke="black" stroke-width="2"/>
											<path d="M10.2868 12.8571L6.42969 8.99996L10.2868 5.14282" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
										</svg></a></li>
							</ul>
					<?php endif; ?>
				</div>

			</div>

		</div>

	</section>
	<?php
	wp_reset_query();
	?>


<?php else : ?>

	<h2><?php _e( 'Sorry, there are no Community Involvement posts.', THEME_TD ); ?></h2>

<?php endif;
wp_reset_postdata();?>
