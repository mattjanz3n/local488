<?php
/**
 * The template for displaying 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package Local_488
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<?php get_template_part('template-parts/section-hero-small'); ?>

		<div class="container container--small">

			<section id="main" class="site-main archive-page" role="main">

				<div class="archive-page__buttons-wrapper">

					<?php $categories_args = array(
						'taxonomy' => 'community_categories',
						'orderby' => 'name',
						'order'   => 'ASC'
					);

					$post_categories = get_categories($categories_args);

					if( !empty($post_categories) ) :

						foreach($post_categories as $post_category) : ?>

							<a class="archive-category-button <?php echo 'archive-category-button--' . "$post_category->slug";?> "href="<?php echo get_category_link( $post_category->term_id ) ?>">
								<?php echo $post_category->name; ?>
							</a>

						<?php endforeach;

					endif; ?>

				</div>

				<?php if ( have_posts() ) :

					while ( have_posts() ) : the_post(); ?>

						<article class="community-involvment__post community-involvment-article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
							<?php $thumbnail = get_the_post_thumbnail_url(); ?>

							<div class="community-involvment-article__content">
							
								<?php $post_time = get_the_time( 'l, F j, Y');
							
								if(!empty($post_time) ) : ?>

									<div class="community-involvment-article__post-time">
										<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">

											<?php echo $post_time; ?>

										</time>
									</div>

								<?php endif; ?>


								
								<?php $terms = get_the_terms( $post->ID , 'community_categories' ); ?>

								<?php if(!empty ($terms) ) : ?>

	
									<div class="nav-archive-categories community-involvment-article__categories">

										<?php foreach ( $terms as $term ) : ?>

											<a class="nav-archive-categories__link community-involvment-article__categories-link <?php echo 'nav-archive-categories__link--' . "$term->slug";?>" href="<?php echo esc_url( get_term_link($term->term_id) ) ?>"><?php echo "$term->name";?></a>

										<?php endforeach; ?>

									</div>

								<?php endif; ?>


								<?php $post_title = get_the_title();

								if(!empty($post_title) ) : ?>
									
									<h4 class="community-involvment-article__title"><a href="<?php echo esc_url( get_permalink() ) ?>"><?php echo $post_title; ?></a></h4>
								
								<?php endif; ?>
								
								<a class="community-involvment-article__post-link read-more-button" href="<?php echo esc_url( get_permalink() ) ?>">

									<?php _e('Read More', THEME_TD); ?>

									<span class="community-involvment-article__post-link-svg read-more-button__svg">
										<svg width="19" height="18" fill="none" xmlns="http://www.w3.org/2000/svg">
											<circle cx="9.5" cy="9" r="9" fill="#000"/>
											<path d="M8.213 12.857L12.07 9 8.213 5.143" stroke="#F9F9F9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>
									</span>
								</a>

							</div>

							
							<div class="community-involvment-article__image-wrapper" <?php if(!empty($thumbnail)) : ?>
								style="background-image: url( <?php echo $thumbnail; ?> )"
								<?php endif; ?> >

							</div>

						</article>

					<?php endwhile;

					get_template_part('template-parts/content-page-pagination');


					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>

			</section><!-- #main -->

		</div>

	</div><!-- #primary -->

<?php
get_footer();
