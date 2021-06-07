<?php
/**
 * Template part for displaying Our offices posts on Our offices page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package Local_488
 */

 $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$args = array(
	'post_type'      => 'our-offices',
	'posts_per_page' => 6,
	'paged'          => $paged,
);


	query_posts( $args );

if ( have_posts() ) : ?>

		<section class="our-offices" >

			<div class="our-offices__container container container--medium">

				<div class="our-offices__wrapper">

					<?php
					while ( have_posts() ) :
						the_post();
						?>

						<article class="our-offices__article our-offices-article">

							<div class="our-offices-article__content">
	
								<?php
								$post_title = get_the_title();
								if ( ! empty( $post_title ) ) :
									?>
		
									<h4 class="our-offices-article__title"><?php echo $post_title; ?></h4>
								
									<?php
								endif;

								$excerpt = get_the_excerpt();

								if ( ! empty( $excerpt ) ) :
									?>

									<div class="our-offices-article__excerpt">

										<?php echo $excerpt; ?>

									</div>

								<?php endif; ?>


								<a class="our-offices-article__direction-link read-more-button" target="_blank" href="https://www.google.com.ua/maps/">

									<?php _e( 'Get Directions', THEME_TD ); ?>

									<span class="read-more-button__svg our-offices-article__direction-svg">
										<svg width="19" height="18" fill="none" xmlns="http://www.w3.org/2000/svg">
											<circle cx="9.5" cy="9" r="9" fill="#000"/>
											<path d="M8.213 12.857L12.07 9 8.213 5.143" stroke="#F9F9F9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>
									</span>
								</a>

								<?php
								$article_content = get_the_content();
								if ( ! empty( $article_content ) ) :
									?>

									<div class="our-offices-article__text-content">

										<?php echo $article_content; ?>

									</div>

								<?php endif; ?>

							</div>

							<div class="our-offices-article__view-map-link">
								<span class="our-offices-article__view-map-text">
									<?php _e( 'View Map', THEME_TD ); ?>
								</span>

								<span class="our-offices-article__view-map-svg">
									<svg width="19" height="18" fill="none" xmlns="http://www.w3.org/2000/svg">
										<circle cx="9.5" cy="9" r="9" fill="#000"/>
										<path d="M8.032 9.065l-.496-.135 3.516-1.482-1.481 3.517-.135-.496a2 2 0 00-1.404-1.404zm1.921 3.304l.002.005h0l-.002-.005z" stroke="#fff" stroke-width="2"/>
									</svg>
								</span>
							</div>

							<?php
							$location  = get_field( 'google_map' );
							$image_url = get_field( 'google_map_pointer' );

							if ( ! empty( $location ) ) :
								?>

								<div class="acf-map" data-zoom="14">
									<div class="marker" data-lat="<?php echo esc_attr( $location['lat'] ); ?>" data-lng="<?php echo esc_attr( $location['lng'] ); ?>" data-marker="<?php echo $image_url; ?>" ></div>
								</div>

							<?php endif; ?>
				
						</article>

						<?php
					endwhile;

					get_template_part( 'template-parts/content-page-pagination' );
					?>

				</div>

			</div>

		</section>

		<?php
		wp_reset_query();


	else :
		?>

		<h2><?php _e( 'Sorry, there are no Pipeline newslatter.', THEME_TD ); ?></h2>

	<?php endif; ?>
