<?php
/**
 * The template for displaying Community Involvemen single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package Local_488
 */

get_header();
get_template_part( 'template-parts/section-hero-small' ); ?>

	<div id="primary" class="content-area">

		<section id="main" class="single-community-involvemen" role="main">
		
			<div class="container container--small">

				<?php
				while ( have_posts() ) :
					the_post();
					?>

					<article class="single-community-involvemen-article">

						<?php
						$post_image = get_the_post_thumbnail();

						if ( ! empty( $post_image ) ) :
							?>

							<div class="single-community-involvemen-article__image-wrapper">	

								<?php echo $post_image; ?>

							</div>

						<?php endif; ?>


						<?php
						$post_title = get_the_title();

						if ( ! empty( $post_title ) ) :
							?>

							<h1 class="single-community-involvemen-article__post-title"><?php echo $post_title; ?></h1>
						
							<?php
						endif;


						$post_time = get_the_time( 'F j, Y' );

						if ( ! empty( $post_time ) ) :
							?>

							<div class="single-community-involvemen-article__post-time">
								<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">

									<?php echo $post_time; ?>

								</time>
							</div>

						<?php endif; ?>

						
						<?php
						$post_content = get_the_content();

						if ( ! empty( $post_content ) ) :
							?>

							<div class="single-community-involvemen-article__post-content">
								
								<?php echo $post_content; ?>
							
							</div>

						<?php endif; ?>

					</article>

				<?php endwhile; ?>
				
			</div>

		</section>

	</div>

<?php
get_footer();
