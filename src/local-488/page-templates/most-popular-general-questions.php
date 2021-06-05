<?php
/**
 * Template Name: Most Popular General Questions
 *
 * @package Local_488
 */

get_header();

the_content();

if( have_rows('general_questions') ) :
	$counter = 0; ?>
	<section class="most-popular-general-questions-accordion">
		<div class="container container--medium">

			<div class="content__accordion discounts__accordion">
				<div id="accordion" class="accordion full-page">

				<?php while( have_rows('general_questions') ) : the_row();

				$counter++; ?>


					<div class="card">

						<?php $card_question = get_sub_field('question');
						if(!empty($card_question)) : ?>

							<div class="card-header" id="heading<?php echo $counter; ?>">
								<h5 class="mb-0">
									<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse<?php echo $counter; ?>" aria-expanded="true" aria-controls="collapse<?php echo $counter; ?>">
										<?php echo $card_question; ?>
									</button>
								</h5>
							</div>

						<?php endif; ?>

						<?php $card_answer = get_sub_field('answer');
						if(!empty($card_answer)) : ?>

							<div id="collapse<?php echo $counter; ?>" class="collapse" aria-labelledby="heading<?php echo $counter; ?>" data-parent="#accordion">
								<div class="card-body">
									<?php echo $card_answer; ?>
								</div>
							</div>

						<?php endif; ?>

					</div>

				<?php endwhile; ?>

				</div>
			</div>

		</div>
	</section>


<?php endif;

get_footer();
