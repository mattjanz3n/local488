<?php
/**
 * The template for displaying archive Managers Messages posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package Local_488
 */

get_header();

get_template_part( 'template-parts/section-hero-small' );

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$args = array(
	'post_type'      => 'managers-messages',
	'posts_per_page' => 10,
	'paged'          => $paged,
);

	query_posts( $args );

if ( have_posts() ) : ?>

		<section class="managers-messages" >

			<div class="managers-messages__container container container--small">

				<div class="managers-messages__wrapper">

					<?php
					while ( have_posts() ) :
						the_post();
						?>

						<article class="managers-messages__article">
	
							<?php
							$post_title = get_the_title();
							if ( ! empty( $post_title ) ) :
								?>
	
								<h4 class="managers-messages__title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo $post_title; ?></a></h4>
							
							<?php endif; ?>

							<a class="managers-messages__post-link read-more-button" href="<?php echo esc_url( get_permalink() ); ?>">
	
								<?php _e( 'Read More', THEME_TD ); ?>
	
								<span class="single-managers-messages-article__post-link-svg read-more-button__svg">
									<svg width="19" height="18" fill="none" xmlns="http://www.w3.org/2000/svg">
										<circle cx="9.5" cy="9" r="9" fill="#000"/>
										<path d="M8.213 12.857L12.07 9 8.213 5.143" stroke="#F9F9F9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>
								</span>
							</a>

						</article>


						<?php
					endwhile;

					get_template_part( 'template-parts/content-page-pagination' );
					?>
				<!-- section with related articles -->

				</div>

			</div>

		</section>

		<?php wp_reset_query(); ?>

	<?php else : ?>

		<h2><?php _e( 'Sorry, there are no Pipeline newslatter.', THEME_TD ); ?></h2>

	<?php endif; ?>

<?php get_footer(); ?>
