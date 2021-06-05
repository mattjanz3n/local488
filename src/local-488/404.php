<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 * @package Local_488
 */

get_header();

get_template_part('template-parts/section-hero-small');?>

	<div id="primary" class="content-area">
		<section id="main" class="site-main container" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h2 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'local_488' ); ?></h2>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. You can try to search.', 'local_488' ); ?></p>

				</div><!-- .page-content -->

				<?php get_template_part('searchform'); ?>

			</section><!-- .error-404 -->

		</section><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
