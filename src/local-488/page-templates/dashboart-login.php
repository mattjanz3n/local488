<?php
/**
 * Template Name: Dashboard login
 *
 * @package Local_488
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<section id="main" class="site-main" role="main">
			<section class="hero hero--small">
				<div class="container">
					<div class="hero__wrap">
						<div class="hero__wrap-title">
							<div class="hero__breadcrumbs">
								<ul class="breadcrumbs">
									<li class="breadcrumb-item">
										<a href="#" class="breadcrumb-link">Members</a>
									</li>
									<li class="breadcrumb-item">
										<a href="#" class="breadcrumb-link">Account</a>
									</li>
								</ul>
							</div>
							<h1 class="hero__title hero__title--small white-headline">
								Account
							</h1>
						</div>
					</div>
				</div>
			</section>
			<section class="login-main">
				<div class="container container--small">
					<form name="login" class="login__form" method="POST">
						<div class="input-wrap"><label for="login">Email<span class="required__input">*</span></label><input name="email" id="login" class="login_email" placeholder="Email Address"></div>
						<div class="input-wrap"><label for="password">Password<span class="required__input">*</span></label><input name="password" id="pass" class="login_pass" value="" type="password">
							<div class="notification-message">The password field is case sensitive.</div>
						</div>
						<button type="submit" class="button-primary login__button">Login</button>
					</form>
					<ul class="login__links">
						<li class="login__link-item">
							<a href="#">Request new password</a>
						</li>
						<li class="login__link-item">
							<a href="#">Create New Account</a>
						</li>
					</ul>
				</div>
			</section>
		</section><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
