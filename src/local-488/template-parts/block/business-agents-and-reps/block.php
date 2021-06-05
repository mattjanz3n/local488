<?php
/**
 * Block Name: Business Agents and Reps
 * Description: It is 488 - Business Agents and Reps archive section
 * Category: common
 * Icon: list-view
 * Keywords: business agents and reps acf block example
 * Supports: { "align":false, "anchor":true }
 *
 * @package Local_488
 *
 * @var array $block
 */
?>

<section class="about-managers">

		<?php $terms = get_terms(
			array(
					'taxonomy'   => 'agents_and_reps',
					'hide_empty' => true,
					'hierarchical' => false,
					'orderby' => 'none',
					'order' => 'DESC',
			)
		);

		foreach ( $terms as $term ) { ?>

			<div class="about-managers__content">

				<div class="container">

					<h2 class="about-managers__category-title"><?php echo $term->name; ?></h2>

					<div class="about-managers__posts-wrapper">

						<?php $args = array(
							'post_type' => 'agents-and-reps',
							'post_status' => 'publish',
							'posts_per_page' => -1,
							'orderby' => 'name',
							'order' => 'ASC',
							'tax_query' => array(
							array(
								'taxonomy' => 'agents_and_reps',
								'field' => 'name',
								'terms' => $term->name
							)
							)
						);

						$partnersList = new WP_Query( $args );

						if($partnersList->have_posts()) {

							while($partnersList->have_posts()) {

							$partnersList->the_post(); ?>

								<article class="about-managers__post about-managers-article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

									<?php $thumbnail = get_the_post_thumbnail_url(); ?>


									<div class="about-managers-article__image-wrapper" <?php if(!empty($thumbnail)) : ?>
										style="background-image: url( <?php echo $thumbnail; ?> )"
										<?php endif; ?> >


									</div>

									<div class="about-managers-article__content">


										<?php $post_title = get_the_title();

										if(!empty($post_title) ) : ?>

											<h3 class="about-managers-article__title"><?php echo $post_title; ?></h3>

										<?php endif;



										the_content(); ?>



									</div>


								</article>

							<?php }
						}

						wp_reset_postdata(); ?>

					</div>

				</div>

			</div>

		<?php } ?>

</section>
