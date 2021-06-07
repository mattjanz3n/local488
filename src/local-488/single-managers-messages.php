<?php
/**
 * The template for displaying Managers messages single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package Local_488
 */

get_header();
get_template_part( 'template-parts/section-hero-small' ); ?>

	<div id="primary" class="content-area">

		<section id="main" class="single-managers-messages" role="main">
		
			<div class="container container--small">

				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content-managers-messages' );

				 endwhile;
				?>

			</div>

		</section>

	</div>

<?php
get_footer();
