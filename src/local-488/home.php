<?php
/**
 * This is Page with posts
 *
 * @link https://wordpress.com/learn/bonus-round-get-a-home-page/
 * @package Local_488
 */

get_header(); ?>

<div class="content-area news-and-events-archive">

	<?php
	get_template_part( 'template-parts/section-hero-small' );

	$query = Local488_News_Query::get_wp_query( array( 'post' => true, 'managers-messages' => true ) );

	if ( $query->have_posts() ) :
		?>

		<section class="news-and-events-content-section">
			<div class="news-and-events-content-section__container container container--small">

				<div class="news-and-events-content-section__buttons-wrapper">

					<?php
					$categories = get_categories();

					if ( $categories ) :
						foreach ( $categories as $cat ) :
							?>

							<a id="<?php echo $cat->slug; ?>" class="news-and-events-content-section__button archive-category-button <?php echo 'archive-category-button--' . "$cat->slug"; ?> active" href="<?php echo esc_url( get_category_link( $cat ) ); ?>" data-slug="<?php echo $cat->slug; ?>" >
								<?php echo "$cat->name"; ?>
							</a>

							<?php
						endforeach;

					endif;
					?>

					<a id="heytheregirl" class="news-and-events-content-section__button archive-category-button active">
						Manager's Messages
					</a>

				</div>

				<div class="news-and-events-content-section__wrapper">


					<?php
					while ( $query->have_posts() ) :
						$query->the_post();

						 get_template_part( 'template-parts/content', get_post_format() );

					endwhile;

					( $pages = $query->max_num_pages );
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
									<li class="next-pagination"><a href="#" class="page" data-value="next">
										<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" class="pagination-icon">
											<circle r="8" transform="matrix(-1 0 0 1 9 9)" stroke="black" stroke-width="2"/>
											<path d="M10.2868 12.8571L6.42969 8.99996L10.2868 5.14282" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
										</svg></a></li>
							</ul>
					<?php endif; ?>


				</div>

			</div>

		</section>

		<?php
		wp_reset_query();

	else :
		?>

		<h2><?php _e( 'Sorry, there are no posts.', THEME_TD ); ?></h2>

	<?php endif;

	get_footer(); ?>
