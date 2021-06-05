<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package Local_488
 */

get_header(); ?>

<div id="primary" class="content-area single-page-news-and-events">

	<?php get_template_part('template-parts/section-hero-small'); ?>

		<section id="main" class="single-page-content-section" role="main">
			<div class="container container--small">
				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', get_post_format() );


				endwhile; // End of the loop.
				?>
			</div>
		</section><!-- #main -->

			<?php get_template_part('template-parts/section-single-page-related-articles'); ?><!-- section with related articles -->

	</div><!-- #primary -->

<?php get_footer();
