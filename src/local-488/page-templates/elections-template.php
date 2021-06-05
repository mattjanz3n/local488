<?php
/**
 * Template Name: Elections template
 *
 *
 * @package Local_488
 */
$fields = get_fields( get_the_ID() );

get_header();
get_template_part('template-parts/section-hero-small'); ?>
	<section class="elections-main">
		<?php  the_content(); ?>
	</section>
	<section class="elections-downloads">
		<div class="container container--middle">
			<?php if ($fields['title_above_download_links']) : ?>
			<h3 class="elections-downloads__title"><?=$fields['title_above_download_links'] ?></h3>
			<?php endif;?>
			<?php if ( $fields['download_links'] ): ?>
				<div class="elections-downloads__items">
						<?php foreach( $fields['download_links'] as $field ) :?>
						<div class="elections-downloads__item">
							<?php if (!empty($field['title_above_link'])) : ?>
								<div class="downloads-item__title"><?=$field['title_above_link'] ?></div>
							<?php endif;?>
							<?php if (!empty($field['download_file'])) :
								$file = $field['download_file'];
								$file_url = $file['url'];
								$file_title = $file['title'];
								$file_name = basename($file['title']);
								if (strlen($file_name) > 20) {
									$name_start = substr("$file_name",0, 9);
									$name_end = substr("$file_name", -9);
									$short_name = $name_start . '...' . $name_end;
								} else {
									$short_name = $file_name;
								}
								?>
								<div class="loc-single-post__download-wrapper">
									<a class="loc-single-post__download-link" download href="<?php echo esc_attr($file_url); ?>" title="<?php echo esc_attr($file_title); ?>">
										<span class="loc-single-post__download-icon">
											<svg width="20" height="27" viewBox="0 0 20 27" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" clip-rule="evenodd" d="M6.20911 6.20868H1.24219L6.20911 1.24176V6.20868Z" fill="black"/>
												<path fill-rule="evenodd" clip-rule="evenodd" d="M12 18.9313C11.1679 18.1021 10.3389 17.0666 9.64568 16C9.20556 17.308 8.62389 18.7201 8 20C9.28674 19.5705 10.6859 19.1969 12 18.9313Z" fill="black"/>
												<path fill-rule="evenodd" clip-rule="evenodd" d="M9.02127 11.0158C8.967 11.036 8.92353 11.0691 8.88492 11.1659C8.74128 11.5375 8.85495 12.243 9.07581 13C9.25779 11.6942 9.16059 11.1391 9.07554 11C9.06285 11.0027 9.04557 11.0063 9.02127 11.0158Z" fill="black"/>
												<mask id="mask0" mask-type="alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="20" height="27">
												<path fill-rule="evenodd" clip-rule="evenodd" d="M0 4.57764e-05H19.3692V27H0V4.57764e-05Z" fill="white"/>
												</mask>
												<g mask="url(#mask0)">
												<path fill-rule="evenodd" clip-rule="evenodd" d="M15.865 20.0792C15.5523 20.5152 15.1246 20.7452 14.6227 20.7452C13.9426 20.7452 13.1523 20.3157 12.268 19.4673C10.682 19.7994 8.82929 20.391 7.33268 21.0463C6.86477 22.0375 6.41657 22.8369 6.0005 23.422C5.42729 24.2258 4.93427 24.6003 4.44449 24.6003C4.25063 24.6003 4.06325 24.5377 3.90368 24.4178C3.32129 23.9817 3.24245 23.4952 3.27944 23.1644C3.38123 22.2535 4.50767 21.302 6.6269 20.3308C7.46741 18.488 8.26796 16.2171 8.74451 14.3201C8.18642 13.1059 7.64399 11.5299 8.03927 10.6057C8.17805 10.2822 8.42186 10.0541 8.74262 9.94633C8.87141 9.90367 8.99615 9.88207 9.11387 9.88207C9.39629 9.88207 9.6482 10.0057 9.82343 10.2287C9.98813 10.4393 10.486 11.0728 9.73757 14.2199C10.492 15.7767 11.5593 17.3619 12.582 18.4481C13.3159 18.3142 13.9458 18.2475 14.4596 18.2475C15.3363 18.2475 15.866 18.4524 16.0834 18.8714C16.2627 19.2192 16.1892 19.6261 15.865 20.0792ZM7.45038 4.57764e-05V7.45043H0V27H19.3693V4.57764e-05H7.45038Z" fill="black"/>
												</g>
												<path fill-rule="evenodd" clip-rule="evenodd" d="M4.00249 23.597C3.99652 23.6498 3.97799 23.7909 4.28233 24C4.37969 23.9727 4.94534 23.742 6 22C4.60897 22.6993 4.04332 23.2735 4.00249 23.597Z" fill="black"/>
												<path fill-rule="evenodd" clip-rule="evenodd" d="M13 19.119C13.518 19.6869 13.9764 20 14.3139 20C14.4639 20 14.6588 19.9499 14.8558 19.5564C14.9506 19.3676 14.9868 19.2451 15 19.1805C14.9242 19.1217 14.695 19 14.1292 19C13.8082 18.9996 13.4274 19.0387 13 19.119Z" fill="black"/>
											</svg>
										</span>
										<span class="loc-single-post__download-text"><?php echo $short_name . '.pdf'?></span>
									</a>


									<?php $filesize = filesize( get_attached_file( $file['ID'] ) );

									$fileSizeInKb = round($filesize / 1000, 2); ?>

									<div class="loc-single-post__download-text-size"><?php echo $fileSizeInKb; ?><?php _e(' KB', THEME_TD); ?></div>
								</div>
							<?php endif; ?>
						</div>
						<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</section>





<?php
get_footer();
