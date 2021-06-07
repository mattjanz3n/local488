<?php
/**
 * Template part for displaying Related articles section on Single page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package Local_488
 */

$categories_list = get_the_category();

if ( ! empty( $categories_list ) ) :

	$first_category = $categories_list[0]->name;
	$post_args      = array(
		'posts_per_page' => 5,
		'category_name'  => $first_category,
		'post_status'    => 'publish',
	);
	?>


	<?php
	query_posts( $post_args );
	if ( have_posts() ) :
		?>

			<section class="single-page-posts-section">

				<div class="single-page-posts-section__container">

					<h2 class="single-page-posts-section__title"><?php _e( 'Related Articles', THEME_TD ); ?></h2>

					<div class="single-page-posts-section__wrapper">

						<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content' );

						endwhile;
						?>

					</div>

				</div>

			</section>
		<?php
		endif;
	wp_reset_query();
endif;
?>
