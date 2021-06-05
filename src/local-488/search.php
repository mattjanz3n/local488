<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 * @package Local_488
 */

get_header();
get_template_part('template-parts/section-hero-small');?>

	<section id="primary" class="content-area container">
		<section id="main" class="site-main search-page" role="main">
			<div class="container">

				<?php
				if ( have_posts() ) :
					?>

					<?php get_template_part('searchform'); ?>

					<header class="page-header search-page__header">
						<?php /* translators: %s: search term */ ?>
						<h2 class="page-title search-page__title"><?php printf( esc_html__( 'Search Results for: %s', 'local_488' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
					</header><!-- .page-header -->
					<?php

					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content');

					endwhile;

					get_template_part('template-parts/content-page-pagination');


					else :

						get_template_part( 'template-parts/content', 'none' );

				endif;
					?>

			</div>
		</section><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
