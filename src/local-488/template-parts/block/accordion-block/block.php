<?php
/**
 * Block Name: Simple Accordion block
 * Description: It is 488 - Accordion block section
 * Category: common
 * Icon: list-view
 * Keywords: accordion acf block
 * Supports: { "align":false, "anchor":true }
 *
 * @package Local_488
 *
 * @var array $block
 */

$slug         = str_replace( 'acf/', '', $block['name'] );
$block_id     = $slug . '-' . $block['id'];
$align_class  = $block['align'] ? 'align' . $block['align'] : '';
$custom_class = isset( $block['className'] ) ? $block['className'] : '';
?>
<section id="<?php echo $block_id; ?>" class="<?php echo $slug; ?> <?php echo $align_class; ?> <?php echo $custom_class; ?>">
	<?php
	if ( have_rows( 'accordion_questions' ) ) :
		$counter = 0;
		?>

		<div class="container container--medium">
			<div class="content__accordion">
				<div id="accordion" class="accordion full-page">

					<?php
					while ( have_rows( 'accordion_questions' ) ) :
						the_row();

						$counter++;
						?>


						<div class="card">

							<?php
							$card_question = get_sub_field( 'question' );
							if ( ! empty( $card_question ) ) {
								?>

								<div class="card-header" id="heading<?php echo $counter; ?>">
									<h5 class="mb-0">
										<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse<?php echo $counter; ?>" aria-expanded="true" aria-controls="collapse<?php echo $counter; ?>">
											<?php echo $card_question; ?>
										</button>
									</h5>
								</div>

							<?php } ?>

							<?php
							$card_answer = get_sub_field( 'answer' );
							if ( ! empty( $card_answer ) ) {
								?>

								<div id="collapse<?php echo $counter; ?>" class="collapse" aria-labelledby="heading<?php echo $counter; ?>" data-parent="#accordion">
									<div class="card-body">
										<?php echo $card_answer; ?>
									</div>
								</div>

							<?php } ?>
						</div>

					<?php endwhile; ?>

				</div>
			</div>
		</div>


	<?php endif; ?>
</section>
