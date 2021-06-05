<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Local_488
 */
$option_fields = get_fields( 'options' );
$fields = get_fields( get_the_ID() );
?>

</main><!-- #content -->

<footer id="footer-container" class="footer" role="contentinfo"
	<?php if (!empty($fields['footer_bg'])) : ?>
		style="background-color: <?= $fields['footer_bg']; ?>"
	<?php endif; ?>>
	<div class="container container-relative">
		<?php if(!empty($option_fields['large_tagline_text'])): ?>
			<div class="footer__large-text">
				<?= $option_fields['large_tagline_text']; ?>
			</div>
		<?php endif; ?>
	</div>
	<div class="footer__wrap">
		<div class="container">
			<div class="footer__main">
				<div class="footer__column">
					<?php if(!empty($option_fields['column_1_title'])): ?>
						<h6 class="footer__title white">
							<?= $option_fields['column_1_title']; ?>
						</h6>
					<?php endif; ?>
					<?php if(!empty($option_fields['column_1_image'])): ?>
					<div class="footer__logo">
						<img src="<?= $option_fields['column_1_image']['url']; ?>" alt="<?= $option_fields['column_1_image']['title']; ?>">
						</h6>
						<?php endif; ?>
					</div>
					<?php if(!empty($option_fields['copyright'])): ?>
						<div class="footer__copyright">
							<?= $option_fields['copyright']; ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="footer__column">
					<?php if(!empty($option_fields['column_2_title'])): ?>
						<h6 class="footer__title white">
							<?= $option_fields['column_2_title']; ?>
						</h6>
					<?php endif; ?>
					<nav class="footer__menu">
						<?php
						if ( has_nav_menu( 'footer_menu' ) ) :
							wp_nav_menu(
									[
											'theme_location' => 'footer_menu',
											'menu_id'        => 'footer-menu',
											'walker'         => new local_488_navwalker(),
									]
							);
						endif;
						?>
					</nav><!-- .nav-primary -->
					<?php if (!empty($option_fields['socials'])) : ?>
						<div class="footer__socials">
							<?php foreach ($option_fields['socials'] as $social) : ?>
								<a target="_blank" href="<?= $social['url'] ?>"><?= $social['icon'] ?></a>
							<?php endforeach; ?>
						</div>
					<?php endif;?>
				</div>
				<div class="footer__column">
					<?php if(!empty($option_fields['column_3_title'])): ?>
						<h6 class="footer__title white">
							<?= $option_fields['column_3_title']; ?>
						</h6>
					<?php endif; ?>
					<?php if (!empty($option_fields['links'])) : ?>
						<div class="footer__links">
							<?php foreach ($option_fields['links'] as $link) :
								$link_url = $link['footer_link']['url'];
								$link_title = $link['footer_link']['title'];
								$link_target = $link['footer_link']['target'] ? $link['footer_link']['target'] : '_self';
								?>
								<a target="<?= $link_target; ?>" href="<?= $link_url; ?>" class="button-secondary footer__button"><?= $link_title; ?></a>
							<?php endforeach; ?>
						</div>
					<?php endif;?>
				</div>
			</div>
		</div>
</footer><!-- #colophon -->
<?php wp_footer(); ?>
</body>
</html>
