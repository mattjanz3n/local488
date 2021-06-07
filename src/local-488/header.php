<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Local_488
 */
$option_fields = get_fields( 'options' );
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header class="header">

	<?php if ( ! isset( $_COOKIE['isClosedNotice'] ) && $option_fields['bar_active'] ) : ?>
		<div class="notice-bar__wrap" style="background-color: <?php echo $option_fields['bar_color']; ?>">
			<div class="notice-bar">
				<?php if ( ! empty( $option_fields['bar_link'] ) ) : ?>
					<a class="notice-bar__link" href="<?php echo ( $option_fields['bar_link'] ); ?>">
						<?php if ( ! empty( $option_fields['bar_message'] ) ) : ?>
							<?php echo $option_fields['bar_message']; ?>
						<?php else : ?>
							<?php echo $option_fields['bar_link']; ?>
						<?php endif; ?>
					</a>
				<?php else : ?>
					<?php if ( $option_fields['bar_message'] ) : ?>
						<?php echo $option_fields['bar_message']; ?>
					<?php endif; ?>
				<?php endif; ?>
				<button class="notice-bar__close-btn"></button>
			</div>
		</div>
	<?php endif; ?>

	<div class="secondary-menu">
		<div class="container">
			<div class="secondary-menu__wrap">
				<?php
				if ( has_nav_menu( 'secondary' ) ) :
					wp_nav_menu(
						array(
							'theme_location' => 'secondary',
							'menu_id'        => 'secondary-nav',
							'menu_class'     => 'secondary-nav',
							'walker'         => new Local_488_Navwalker(),
						)
					);
				endif;
				?>
				<div class="secondary-item secondary-item__login">
					<?php if ( ! empty( $option_fields['login_link'] ) ) : ?>
						<a href="<?php echo $option_fields['login_link']['url']; ?>"><?php echo $option_fields['login_link']['title']; ?></a>
					<?php endif; ?>
				</div>
				<div class="secondary-item secondary-item__search secondary-item__search--desktop">
					<?php if ( ! empty( $option_fields['search_text'] ) ) : ?>
						<a href="#" title="<?php echo $option_fields['search_text']; ?>"><?php echo $option_fields['search_text']; ?></a>
					<?php endif; ?>
				</div>
				<?php if ( ! empty( $option_fields['socials'] ) ) : ?>
					<div class="header__social">
						<?php foreach ( $option_fields['socials'] as $social ) : ?>
							<a target="_blank" href="<?php echo $social['url']; ?>"><?php echo $social['icon']; ?></a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="header__container container">
		<div class="header__row">
			<span class="header__current-item"></span>
			<a class="header__brand brand" href="<?php echo esc_url( home_url() ); ?>">
				<?php if ( get_header_image() ) : ?>
					<img class="brand__img" src="<?php echo( get_header_image() ); ?>" alt="<?php bloginfo( 'name' ); ?>"/>
					<?php
				else :
					bloginfo( 'name' );
				endif;
				?>
			</a><!-- /.brand -->
			<a class="header__brand header__brand--white brand" href="<?php echo esc_url( home_url() ); ?>">
				<?php if ( ! empty( $option_fields['header_logo_alt'] ) ) : ?>
					<img class="brand__img" src="<?php echo $option_fields['header_logo_alt']['url']; ?>" alt="<?php bloginfo( 'name' ); ?>"/>
					<?php
				else :
					bloginfo( 'name' );
				endif;
				?>
			</a><!-- /.brand -->

			<nav class="nav-primary header__nav navbar navbar-expand-xl navbar-light">
				<div class="header__search">
					<?php get_search_form(); ?>
				</div>
				<div class="secondary-item secondary-item__login secondary-item__login--mobile">
					<?php if ( ! empty( $option_fields['login_link'] ) ) : ?>
						<a href="<?php echo $option_fields['login_link']['url']; ?>"><?php echo $option_fields['login_link']['title']; ?></a>
					<?php endif; ?>
				</div>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primaryNavBar"
						aria-controls="primaryNavBar" aria-expanded="false" aria-label="Toggle navigation"><?php echo _e( 'Menu' ); ?>
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="navbar-collapse collapse" id="primaryNavBar">
				<div class="navbar-collapse__mobile-header">
					<a class="header__brand brand" href="<?php echo esc_url( home_url() ); ?>">
						<?php if ( get_header_image() ) : ?>
							<img class="brand__img" src="<?php echo( get_header_image() ); ?>" alt="<?php bloginfo( 'name' ); ?>"/>
							<?php
						else :
							bloginfo( 'name' );
						endif;
						?>
					</a><!-- /.brand -->
				<span class="arrow-menu-up"></span>
				<span class="current-mobile-item"></span>
					<button class="navbar-toggler navbar-toggler--mobile" type="button" data-toggle="collapse" data-target="#primaryNavBar"
							aria-controls="primaryNavBar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler__title"><?php echo _e( 'Close' ); ?></span>
						<span class="navbar-toggler-icon"></span>
					</button>
				</div>
				<div class="navbar-collapse__main">
					<div class="navbar-collapse__wrap">
						<div class="header__search--mobile">
							<?php get_search_form(); ?>
						</div>
						<?php
						if ( has_nav_menu( 'primary' ) ) :
							wp_nav_menu(
								array(
									'theme_location' => 'primary',
									'menu_class'     => 'navbar-nav',
									'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'walker'         => new Local_488_Navwalker(),
								)
							);
						endif;
						?>
						<?php
						if ( ! empty( $option_fields['header_button'] ) ) :
							$link_url    = $option_fields['header_button']['url'];
							$link_title  = $option_fields['header_button']['title'];
							$link_target = $option_fields['header_button']['target'] ? $option_fields['header_button']['target'] : '_self';
							?>
							<a target="<?php echo $link_target; ?>" href="<?php echo $link_url; ?>" class="button-nav"><?php echo $link_title; ?></a>
						<?php endif; ?>
						<div class="secondary-menu secondary-menu--mobile">
							<div class="container">
								<div class="secondary-menu__wrap">
									<?php
									if ( has_nav_menu( 'secondary' ) ) :
										wp_nav_menu(
											array(
												'theme_location' => 'secondary',
												'menu_id' => 'secondary-nav',
												'menu_class' => 'secondary-nav',
												'walker'  => new Local_488_Navwalker(),
											)
										);
									endif;
									?>
									<div class="secondary-item secondary-item__login">
										<?php if ( ! empty( $option_fields['login_link'] ) ) : ?>
											<a href="<?php echo $option_fields['login_link']['url']; ?>"><?php echo $option_fields['login_link']['title']; ?></a>
										<?php endif; ?>
									</div>
									<div class="secondary-item secondary-item__search secondary-item__search--mobile">
										<?php if ( ! empty( $option_fields['search_text'] ) ) : ?>
											<a href="#" title="<?php echo $option_fields['search_text']; ?>"><?php echo $option_fields['search_text']; ?></a>
										<?php endif; ?>
									</div>
									<?php if ( ! empty( $option_fields['socials'] ) ) : ?>
										<div class="header__social">
											<?php foreach ( $option_fields['socials'] as $social ) : ?>
												<a target="_blank" href="<?php echo $social['url']; ?>"><?php echo $social['icon']; ?></a>
											<?php endforeach; ?>
										</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>
				<?php
				if ( ! empty( $option_fields['header_button'] ) ) :
					$link_url    = $option_fields['header_button']['url'];
					$link_title  = $option_fields['header_button']['title'];
					$link_target = $option_fields['header_button']['target'] ? $option_fields['header_button']['target'] : '_self';
					?>
					<a target="<?php echo $link_target; ?>" href="<?php echo $link_url; ?>" class="button-nav button-nav--mobile"><?php echo $link_title; ?></a>
				<?php endif; ?>
			</nav><!-- .nav-primary -->
		</div>
		<!-- /.header__row -->
	</div>
	<!-- /.header__container -->
</header><!-- .banner -->
<main id="content" class="site-content">
