<div class="notice-bar__wrap" style="background-color: <?php the_field('bar_color', 'option'); ?>">
	<div class="notice-bar">
		
		<?php if (!empty(the_field('bar_link', 'option'))): ?>
			
			<a class="notice-bar__link" href="<?php echo (the_field('bar_link', 'option'))?>">
				<?php if (!empty(the_field('bar_message', 'option'))): ?>
					<?php the_field('bar_message', 'option');?>
				<?php else : ?>
					<?php the_field('bar_link', 'option');?>
				<?php endif;?>
			</a>
			
		<?php else : ?>
		
			<?php if (the_field('bar_message', 'option')): ?>
				<?php the_field('bar_message', 'option');?>
			<?php endif; ?>
			
		<?php endif; ?>
		
		<button class="notice-bar__close-btn"></button>
	</div>
</div>

	