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
</nav>