<?php
/**
 * Block Name: CTA Message
 * Description: It is 488 - CTA Message Archive section
 * Category: common
 * Icon: list-view
 * Keywords: cta message acf block
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
	$arg           = array(
		'post_type'      => 'managers-messages',
		'orderby'        => 'date',
		'posts_per_page' => 1,
	);
	$the_query = new WP_Query( $arg );
	if ( $the_query->have_posts() ) :
		?>
		<?php
		while ( $the_query->have_posts() ) :
			$the_query->the_post();
			$permalink = get_permalink();
			$title     = get_the_title();
			$date      = get_the_time( 'F j, Y' );
			$excerpt   = get_the_excerpt();
			?>
				<div class="cta-message__content">
					<h2 class="cta-message__title white-headline">
					<?php echo $title; ?>
					</h2>
					<h4 class="cta-message__date white-headline">
					<?php echo $date; ?>
					</h4>
					<div class="cta-message__description white-headline">
					<?php echo $excerpt; ?>
					</div>
					<a class="loc-single-post__post-link read-more-button" href="<?php echo esc_url( get_permalink() ); ?>">

					<?php _e( 'Read More', THEME_TD ); ?>

						<span class="loc-single-post__post-link-svg read-more-button__svg">
					<svg width="19" height="18" fill="none" xmlns="http://www.w3.org/2000/svg">
						<circle cx="9.5" cy="9" r="9" fill="#000"/>
						<path d="M8.213 12.857L12.07 9 8.213 5.143" stroke="#F9F9F9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				</span>
					</a>
				</div>
				<a href="<?php echo get_post_type_archive_link( 'managers-messages' ); ?>" class="button-secondary"><?php _e( 'All Messages', THEME_TD ); ?></a>
			<?php endwhile; ?>
		<?php
		endif;
		wp_reset_query();
	?>
</section>
