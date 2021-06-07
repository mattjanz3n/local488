<?php
/**
 * Template Name: Ex Board and Committees
 *
 * @package Local_488
 */

get_header();


$page_image = get_the_post_thumbnail();

if ( ! empty( $page_image ) ) : ?>

	<section class="hero hero--large">
		<div class="container">
			<div class="hero__wrap">
				<div class="hero__wrap-title">
					<!-- <div class="hero__breadcrumbs"> -->
					<ul class="breadcrumbs">
						<?php get_breadcrumbs(); ?>
					</ul>
				</div>
					<?php
					$page_title = get_the_title();
					if ( ! empty( $page_title ) ) :
						?>
						<h1 class="hero__title hero__title--small white-headline">
							<?php echo $page_title; ?>
						</h1>
					<?php endif; ?>

				</div>
			</div>
			<a href="#" class="hero__anchor">
			</a>
		</div>
	</section>

	<?php
else :

	get_template_part( 'template-parts/section-hero-small' );

endif;

if ( have_rows( 'ex_board_and_committees' ) ) :
	$counter = 0;
	?>
	<section class="ex-board-and-committees-accordion">
		<div class="container container--medium">
			<div class="dashboard__content small-overlay">
				<div class="content__accordion discounts__accordion">
					<div id="accordion" class="accordion full-page">

					<?php
					while ( have_rows( 'ex_board_and_committees' ) ) :
						the_row();

						$counter++;
						?>


						<div class="card">

							<?php
							$card_title = get_sub_field( 'title' );
							if ( ! empty( $card_title ) ) :
								?>

								<div class="card-header" id="heading<?php echo $counter; ?>">
									<h5 class="mb-0">
										<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse<?php echo $counter; ?>" aria-expanded="true" aria-controls="collapse<?php echo $counter; ?>">
											<?php echo $card_title; ?>
										</button>
									</h5>
								</div>

							<?php endif; ?>

							<?php
							$card_description = get_sub_field( 'description' );
							if ( ! empty( $card_description ) ) :
								?>

								<div id="collapse<?php echo $counter; ?>" class="collapse" aria-labelledby="heading<?php echo $counter; ?>" data-parent="#accordion">
									<div class="card-body">
										<?php echo $card_description; ?>
									</div>
								</div>

							<?php endif; ?>
						</div>

					<?php endwhile; ?>

					</div>
				</div>
			</div>
		</div>
	</section>

<?php endif; ?>

<?php
$page_content = get_the_content();

if ( ! empty( $page_content ) ) :
	?>

	<section class="ex-board-and-committees-content">

		<?php echo $page_content; ?>

	</section>

	<?php
endif;

get_footer();
