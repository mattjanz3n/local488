<?php
/**
 * Template Name: Members Dashboard
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
										<a href="#" class="breadcrumb-link">Dashboard</a>
									</li>
								</ul>
							</div>
							<h1 class="hero__title hero__title--small white-headline">
								Dashboard
							</h1>
						</div>
						<h4 class="hero__wrap-notice white-headline">
							MEMBERS AREA NOTICE (OPTIONAL IN HEADER) To apply for a job, you must submit your request between 5:00 pm (previous day) and 7:00 am MST (MDT when applicable) -same day-to be accepted for that day's call out.
						</h4>
					</div>
				</div>
			</section>
			<section class="dashboard">
					<div class="container">
						<div class="dashboard__wrap">
							<div class="dashboard__main">
								<div class="dashboard__header">
									<div class="dashboard__title">
										<h2 class="dashboard__user">
											Hello, <span class="dashboard__user-name">Mathew Janzen</span>
										</h2>
										<div class="dashboard__user-login">
											Your Username: <span class="dashboard__user-login-name">mjjanzen</span>
										</div>
									</div>
									<div class="dashboard__logout">
										<a href="#" class="dashboard__logout-link">LOG OUT</a>
									</div>
								</div>
								<div class="dashboard__content">
									<h2 class="content__title">
										My Union Information
									</h2>
									<div class="content__accordion">
										<div id="accordion" class="accordion">
											<div class="card">
												<div class="card-header" id="headingOne">
													<h5 class="mb-0">
														<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
															Dues
														</button>
													</h5>
												</div>
												<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
													<div class="card-body">
														<p class="dashboard__dues">Credit on file: <span class="dues__credit-file">Unknown</span></p>
														<p class="dashboard__dues">Paid for date: <span class="dues__date">January 21, 2021</span></p>
													</div>
												</div>
											</div>
											<div class="card">
												<div class="card-header" id="headingTwo">
													<h5 class="mb-0">
														<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
															Work Status
														</button>
													</h5>
												</div>
												<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
													<div class="card-body">
														<p class="dashboard__work-status">Work Flag: <span class="work-status__flag">Unknown</span></p>
														<p class="dashboard__work-status">Last Known Work Location: <span class="work-status__location">January 21, 2021</span></p>
													</div>
												</div>
											</div>
											<div class="card">
												<div class="card-header" id="headingThree">
													<h5 class="mb-0">
														<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
															My Information
														</button>
													</h5>
												</div>
												<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
													<div class="card-body">
														<div class="dashboard__member-info">
															<h5 class="member-info__title">Member Info</h5>
															<form name="member-info-form" action="#" class="member-info__form" method="POST">
																<div class="input-wrap"><label for="member-info-first-name">First Name<span class="required__input">*</span></label><input name="member-info-first-name" type="text" id="member-info-firs-name" class="member-info__first-name"></div>
																<div class="input-wrap"><label for="member-info-last-name">Last Name<span class="required__input">*</span></label><input name="member-info-last-name" type="text" id="member-info-last-name" class="member-info__last-name"></div>
																<div class="input-wrap"><label for="member-info-address">Address</label><input name="member-info-address" type="text" id="member-info-address" class="member-info__address"></div>
																<div class="input-wrap"><label for="member-info-city">City</label><input name="member-info-city" type="text" id="member-info-city" class="member-info__city"></div>
																<div class="input-wrap"><label for="member-info-province">Province</label><select name="member-info-province" type="text" id="member-info-province" class="member-info__province">
																		<option value="Edmonton">Edmonton</option>
																	</select>
																</div>
																<div class="input-wrap"><label for="member-info-postal-code">Postal Code</label><input name="member-info-postal-code" type="text" id="member-info-postal-code" class="member-info__postal-code"></div>
																<div class="input-wrap"><label for="member-info-phone-number">Phone Number</label><input name="member-info-phone-number" type="text" id="member-info-phone-number" class="member-info__phone-number"></div>
																<div class="member-info__row">
																	<p class="member-info__birthdate">Birthdate: <span class="member-info__birthdate-number">1982-07-17</span>
																		<a href="#" class="member-info__link">Instructions on how to change.</a>
																	</p>
																</div>
																<div class="member-info__row">
																	<h5 class="member-info__title">Trade Info</h5>
																	<div class="trade-info__wrap">
																		<p class="trade-info__year">Year: <span class="trade-info__year-info">Journeyman</span></p>
																		<p class="trade-info__trade">Trade: <span class="member-info__birthdate">Welder</span>
																			<a href="#" class="member-info__link">Instructions on how to change.</a></p>
																	</div>
																	<div class="trade-info__wrap">
																		<p class="trade-info__year">Year: <span class="trade-info__year-info">Journeyman</span></p>
																		<p class="trade-info__trade">Trade: <span class="member-info__birthdate">Electrical</span>
																			<a href="#" class="member-info__link">Instructions on how to change.</a></p>
																	</div>
																	<div class="trade-info__wrap">
																		<p class="trade-info__union-status">Union Status: <span class="trade-info__union-status-info">Permit/Non UA Member</span></p>
																		<p class="trade-info__home-local">Home Local: <span class="member-info__home-local-info">Home Local: 488</span>
																			<a href="#" class="member-info__link">Instructions on how to change.</a></p>
																	</div>
																</div>
																<div class="member-info__row">
																	<h5 class="member-info__title">Work Status</h5>
																	<p class="work-status__flag-date">Work Flag Date: <span class="work-status__flag-date-info">2020-11-19</span></p>
																	<p class="work-status__paid-date">Paid for Date: <span class="work-status__paid-date-info">2020-11-19</span>
																		<a href="#" class="member-info__link">Instructions on how to change.</a>
																	</p>
																</div>
																<div class="member-info__row">
																	<h5 class="member-info__title">Subscribe</h5>
																	<label class="checkbox__label"><input class="checkbox" type="checkbox" name="subscribe" value="value"><span>Do you wish to receive updates from Local 488 by email?</span></label>
																	<a href="#" class="member-info__link">Click this check-box if you would like to receive emails and updates from local488.</a>
																</div>
																<div class="member-info__row">
																	<h5 class="member-info__title">Terms & Conditions</h5>
																	<label class="checkbox__label"><input class="checkbox" type="checkbox" name="terms-conditions" value="value"><span>I agree to Local 488 Terms & Condition</span></label>
																	<p class="member-info__terms">Please read the Local 488 <a href="#" class="member-info__link no-image">Terms & Conditions.</a></p>
																</div>
																<button type="submit" class="button-primary member-info__button-submit" formaction="#">Update Information</button>
															</form>
														</div>
													</div>
												</div>
											</div>
											<div class="card">
												<div class="card-header" id="headingFour">
													<h5 class="mb-0">
														<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
															Certificates
														</button>
													</h5>
												</div>
												<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
													<div class="card-body">
														<div class="dashboard__certificates">
															<div class="certificate__desc">To view your certificates, please enter your UA Card Number and either your SIN Number <span>OR</span> Date of Birth</div>
															<form name="certificates-form" action="#" class="certificates__form" method="POST">
																<div class="input-wrap"><label for="certificate-card-number">UA Card Number<span class="required__input">*</span></label><input name="certificate-card-number" type="text" id="certificate-card-number" class="certificate__card-number" placeholder="1234576789"></div>
																<ul class="certificate__numbers">
																	<li class="certificate__number"><button class="certificate__button category-button category-button--notice active" value="sin">Sin</button></li>
																	<li class="certificate__number"><button class="certificate__button category-button category-button--notice" value="dob">Dob</button></li>
																</ul>
																<div class="input-wrap"><label for="certificate-sin-number"><span class="certificate-type-number">SIN</span> Number<span class="required__input">*</span></label><input name="certificate-sin-number" id="certificate-sin-number" class="certificate__sin-number" type="text" placeholder="1234576789"></div>
																<button type="submit" class="button-primary certificates__button-submit" formaction="#">Show Certificates</button>
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<aside class="dashboard__aside">
								<h3 class="aside__title white-headline">
									Electronic Version of</br> Out-of-Work-Board Form
								</h3>
								<div class="aside__content white-headline">
									As part of our continuing effort to make things easier for our members, Local 488 is proud to announce that you can now sign the Out-Of-Work-Board electronically.
								</div>
								<a href="#" class="aside__link button-secondary">Out of Work Form</a>
							</aside>
						</div>
					</div>
			</section>
		</section><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
