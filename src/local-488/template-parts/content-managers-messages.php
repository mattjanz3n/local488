<?php
/**
 * Template part for displaying Managers Messages posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package Local_488
 */

?>

<article class="single-managers-messages-article">

	<a class="single-managers-messages-article__back-link single-managers-messages-article__back-link--top archive-back-link" href="<?php echo get_post_type_archive_link( 'managers-messages' ); ?>">
	
		<svg class="loc-single-post__back-link-svg archive-back-link__svg" width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg">
			<circle r="9" transform="matrix(-1 0 0 1 9 9)" fill="currentColor"/>
			<path d="M10.287 12.857L6.43 9l3.857-3.857" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
		</svg>

		<span class="loc-single-post__back-link-text archive-back-link__text">
			<?php _e( 'Back to List', THEME_TD ); ?>
		</span>
	</a>


	<?php
	$post_time = get_the_time( 'F j, Y' );

	if ( ! empty( $post_time ) ) :
		?>

		<div class="single-managers-messages-article__post-time">
			<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">

				<?php echo $post_time; ?>

			</time>
		</div>

	<?php endif; ?>



	<div class="single-managers-messages-article__content">

		<?php	the_content(); ?>

		<a class="single-managers-messages-article__back-link archive-back-link" href="<?php echo get_post_type_archive_link( 'managers-messages' ); ?>">
		
			<svg class="loc-single-post__back-link-svg archive-back-link__svg" width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg">
				<circle r="9" transform="matrix(-1 0 0 1 9 9)" fill="currentColor"/>
				<path d="M10.287 12.857L6.43 9l3.857-3.857" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>

			<span class="loc-single-post__back-link-text archive-back-link__text">
				<?php _e( 'Back to List', THEME_TD ); ?>
			</span>
		</a>

	</div>

</article>
