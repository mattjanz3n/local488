<?php
	if ( has_nav_menu( 'primary' ) ) :
		wp_nav_menu(
				[
					'theme_location'  => 'primary',
					'menu_class'      => 'navbar-nav',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'walker'          => new Local_488_Navwalker(),
				]
		);
	endif;
?>

<?php
if ( has_nav_menu( 'secondary' ) ) :
	wp_nav_menu(
			[
				'theme_location' => 'secondary',
				'menu_id'        => 'secondary-nav',
				'menu_class'      => 'secondary-nav',
				'walker'         => new Local_488_Navwalker(),
			]
	);
endif;	?>
