<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package Local_488
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<?php get_template_part( 'template-parts/section-hero-small' ); ?>

		<div class="container container--small">

			<section id="main" class="site-main archive-page" role="main">

				<div class="archive-page__buttons-wrapper">


					<?php
					$categories = get_categories();

					if ( ! empty( $categories ) ) :

						foreach ( $categories as $cat ) :
							?>

							<a class="archive-category-button <?php echo 'archive-category-button--' . "$cat->slug"; ?>" href="<?php echo esc_url( get_category_link( $cat ) ); ?>"><?php echo "$cat->name"; ?></a>

							<?php
						endforeach;

					endif;
					?>


				</div>

				<?php
				if ( have_posts() ) :

					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						* Include the Post-Format-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Format name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content', get_post_format() );

					endwhile;

					get_template_part( 'template-parts/content-page-pagination' );


					else :

						get_template_part( 'template-parts/content', 'none' );

				endif;
					?>

			</section><!-- #main -->

		</div>

	</div><!-- #primary -->

<?php
get_footer();
