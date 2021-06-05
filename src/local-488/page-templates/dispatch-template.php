<?php
/**
 * Template Name: Dispatch template
 *
 * @package Local_488
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<section id="main" class="site-main" role="main">
			<section class="hero hero--small hero-dispatch">
				<div class="container">
					<div class="hero__wrap">
						<div class="hero__wrap-title">
							<div class="hero__breadcrumbs">
								<ul class="breadcrumbs">
									<li class="breadcrumb-item">
										<a href="#" class="breadcrumb-link">Dispatch</a>
									</li>
								</ul>
							</div>
							<h1 class="hero__title hero__title--small white-headline">
								Dispatch
							</h1>
						</div>
						<h4 class="hero__wrap-notice white-headline">
							To apply for a job, you must submit your request between 5:00 pm (previous day) and 7:00 am MST (MDT when applicable) -same day-to be accepted for that day's call out.
						</h4>
					</div>
				</div>
			</section>
			<section class="dashboard dispatch">
					<div class="container">
						<div class="dashboard__wrap">
							<div class="dashboard__main">
								<div class="dispatch__header">
									<h3 class="dispatch__title">
										Call Update for <span class="dispatch__update-date">JANUARY 18, 2021</span>
									</h3>
									<div class="dispatch__header-desc dispatch__steam">Steam: <span>NO CALLS</span></div>
									<div class="dispatch__header-desc dispatch__welder">Welders: MARCH <span>03, 2020</span></div>
									<div class="dispatch__header-desc dispatch__apprentices">Apprentices: <span>NO CALLS</span></div>
								</div>
								<div class="dispatch__notice">
									<h3 class="notice__title">
										Important Notice
									</h3>
									<div class="notice__desc">
										With the upcoming shutdown season looming, we ask that you ensure that your safety tickets are up-to-date. Your certificates need to be good for at least 60 days after the job start date.
									</div>
									<div class="notice__subtitle">
										Here is a list of what you will need
									</div>
									<ul class="notice__list">
										<li class="notice__list-item">
											CSTS-09 or CSTS-2020
										</li>
										<li class="notice__list-item">
											OSSA Regional or OSSA BSO or Energy Safety Canada (CSO)
										</li>
										<li class="notice__list-item">
											BTATS Fall Protection or ESC Fall Protection
										</li>
										<li class="notice__list-item">
											BTATS Mobile Elevated Work Platform or OSSA - EWP - Elevated Work Platform
										</li>
										<li class="notice__list-item">
											BTATS Confined Space or OSSA Confined Space
										</li>
										<li class="notice__list-item">
											Half Mask Fit Test
										</li>
									</ul>
								</div>
								<div class="content__accordion dispatch__accordion">
									<div id="accordion" class="accordion dispatch-accordion">
										<div class="card">
											<div class="card-header" id="headingOne">
												<h3 class="mb-0">
													<button class="btn btn-link btn-dispatch" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
														Important Dispatch Info
														<div class="open-close-btn">
															<span class="open">Re-open</span>
															<span class="hide">Hide</span>
														</div>
													</button>
												</h3>
											</div>
											<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
												<div class="card-body">
													<div class="row">
														<div class="col-lg-4 col-md-12">
															<div class="dispatch__info-column">
																<h5 class="dispatch__info-subtitle">
																	<svg class="icon-column">
																		<use xlink:href="#envelope"></use>
																	</svg>Confirmation Emails
																</h5>
																<div class="dispatch__info-desc">
																	Please add <a href="mailto:noreply.website@local488.ca">noreply.website@local488.ca</a> to either your contacts or trusted senders list to ensure that you receive the automated response email.
																</div>
															</div>
														</div>
														<div class="col-lg-4 col-md-12">
															<div class="dispatch__info-column">
																<h5 class="dispatch__info-subtitle">
																	<svg class="icon-column">
																		<use xlink:href="#card-icon"></use>
																	</svg>Travel Cards/Permit Holders
																</h5>
																<div class="dispatch__info-desc">
																	You MUST create a <a href="http://local488.ca">local488.ca account</a> to be eligible to pull a slip.
																</div>
															</div>
														</div>
														<div class="col-lg-4 col-md-12">
															<div class="dispatch__info-column">
																<h5 class="dispatch__info-subtitle">
																	<svg class="icon-column">
																		<use xlink:href="#user"></use>
																	</svg>UA Members
																</h5>
																<div class="dispatch__info-desc">
																	Creating an account IS NOW required to pull a slip. Read more about the benefits of creating a <a href="http://local488.ca">local488.ca account</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="dashboard__content">
									<div class="dispatch__last-update">
										Dispatch Last Updated: <span>Wednesday, January 13, 2021 - 2:15:05 pm</span>
									</div>
									<form action="#" class="dispatch__form">
										<div class="form__left">
											<div class="input-wrap dispatch">
												<label>Filter by Qualification and Trade
													<select name="member-info-province" type="text" id="dispatch-apprentices" class="member-info__province">
														<option value="Apprentices">Apprentices</option>
													</select>
													<select name="member-info-province" type="text" id="dispatch-journeymen" class="member-info__province">
														<option value="Journeymen">Journeymen</option>
													</select>
													<select name="member-info-province" type="text" id="dispatch-production-workers" class="member-info__province">
														<option value="Production Workers">Production Workers</option>
													</select>
													<select name="member-info-province" type="text" id="dispatch-qqc" class="member-info__province">
														<option value="QCC">QCC</option>
													</select>
												</label>
											</div>
											<div class="input-wrap">
												<label>Advanced Filtering
													<select name="member-info-province" type="text" id="dispatch-filter-by-job-site" class="member-info__province">
														<option value="Filter by Job Site">Filter by Job Site</option>
													</select>
													<select name="member-info-province" type="text" id="dispatch-filter-by-employer" class="member-info__province">
														<option value="Filter by Employer">Filter by Employer</option>
													</select>
												</label>
											</div>
											<button class="button-primary dispatch__button">Search</button>
											<button class="button-secondary dispatch__button">Compare Selections</button>
										</div>
										<div class="form__right">
											<div class="form__right-text">
												Select any filter and click on Apply to see results
											</div>
										</div>
									</form>
								</div>
							</div>
							<aside class="dashboard__aside dispatch__aside">
								<div class="aside__header">
									<h3 class="aside__title white-headline">
										Upcoming General Meetings
									</h3>
									<div class="aside__content white-headline">
										Meeting Will Be Rescheduled For A Later Date
									</div>
								</div>
								<h3 class="aside__title dispatch__aside-title white-headline">
									Electronic Version of</br> Out-of-Work-Board Form
								</h3>
								<div class="aside__row dispatch__row">
									<div class="aside__content white-headline">
										As part of our continuing effort to make things easier for our members, Local 488 is proud to announce that you can now sign the Out-Of-Work-Board electronically.
									</div>
									<a href="#" class="aside__link button-secondary">Out of Work Form</a>
								</div>
								<div class="aside__row">
									<h4 class="aside__row-title white-headline">
										Dispatch Documents
									</h4>
									<ul class="aside__row-list">
										<li class="aside__row-list-item">
											<svg class="icon-download">
												<use xlink:href="#pdf-icon"></use>
											</svg><a href="#" class="aside__row-list-link download" download>DISPATCH RULES</a>
										</li>
										<li class="aside__row-list-item">
											<svg class="icon-download">
												<use xlink:href="#pdf-icon"></use>
											</svg><a href="#" class="aside__row-list-link download" download>HOW TO GUIDE FOR ONLINE DISPATCH REQUESTS</a>
										</li>
										<li class="aside__row-list-item">
											<svg class="icon-download">
												<use xlink:href="#pdf-icon"></use>
											</svg><a href="#" class="aside__row-list-link download" download>OUT-OF-WORK FAX FORM</a>
										</li>
										<li class="aside__row-list-item">
											<svg class="icon-download">
												<use xlink:href="#pdf-icon"></use>
											</svg><a href="#" class="aside__row-list-link download" download>TRAVEL CARD RECIPROCITY AUTHORIZATION FORM</a>
										</li>
									</ul>
								</div>
								<div class="aside__row">
									<h4 class="aside__row-title white-headline">
										Safety Information
									</h4>
									<ul class="aside__row-list">
										<li class="aside__row-list-item">
											<a href="#" class="aside__row-list-link">Work Ready Work Force Safety Information</a>
										</li>
									</ul>
								</div>
						</div>
							</aside>
						</div>
					</div>
			</section>
		</section><!-- #main -->
	</div><!-- #primary -->
<div class="svg-sprites" style="display: none">
	<svg width="0" height="0" class="hidden">
		<symbol fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11 13" id="user">
			<path d="M.293 13h10.414a.29.29 0 00.293-.286V11.68c0-2.962-2.467-5.372-5.5-5.372S0 8.72 0 11.681v1.033A.29.29 0 00.293 13zM3.449.835a2.805 2.805 0 00-.855 2.02c0 .765.304 1.483.855 2.02a2.941 2.941 0 002.069.835c.783 0 1.518-.296 2.069-.834a2.805 2.805 0 00.854-2.02c0-.766-.303-1.483-.854-2.021A2.941 2.941 0 005.517 0C4.736 0 4 .296 3.45.835z" fill="#000"></path>
		</symbol>
	</svg>
	<svg width="0" height="0" class="hidden">
		<symbol fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 12" id="envelope">
			<path d="M1.741.47c-.167 0-.327.033-.473.092l6.963 6.376c.299.274.567.274.867 0L16.073.562a1.274 1.274 0 00-.472-.091H1.741zM.494 1.55a1.277 1.277 0 00-.013.169v8.736c0 .69.562 1.248 1.26 1.248h13.86c.698 0 1.26-.557 1.26-1.248V1.718a1.36 1.36 0 00-.013-.17l-6.89 6.306a1.933 1.933 0 01-2.586 0L.494 1.55z" fill="#000"></path>
		</symbol>
	</svg>
	<svg width="0" height="0" class="hidden">
		<symbol fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19 13" id="card-icon">
			<path d="M18.264 0H.678C.299 0 0 .3 0 .678v11.644c0 .379.3.678.678.678h17.586c.379 0 .678-.3.678-.678V.678c0-.379-.3-.678-.678-.678z" fill="#000"></path>
			<path d="M3.23 10.03h5.642c.1 0 .2-.08.2-.2v-.838c0-.997-.818-1.814-1.815-1.814H4.864A1.82 1.82 0 003.05 8.992v.838c0 .12.08.2.18.2zM6.041 6.6a1.814 1.814 0 100-3.63 1.814 1.814 0 000 3.63zm4.506-2.233h5.124c.12 0 .22-.1.22-.22V3.25c0-.12-.1-.22-.22-.22h-5.124c-.12 0-.22.1-.22.22v.897c0 .1.1.22.22.22zm0 2.811h5.124c.12 0 .22-.1.22-.22v-.897c0-.12-.1-.219-.22-.219h-5.124c-.12 0-.22.1-.22.22v.897c0 .12.1.219.22.219zm0 2.812h5.124c.12 0 .22-.1.22-.22v-.897c0-.12-.1-.22-.22-.22h-5.124c-.12 0-.22.1-.22.22v.897c0 .12.1.22.22.22z" fill="#fff"></path>
		</symbol>
	</svg>
	<svg width="0" height="0" class="hidden">
		<symbol fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 22" id="pdf-icon">
			<path fill-rule="evenodd" clip-rule="evenodd" d="M4.656 5.624H.931l3.725-3.73v3.73zM9 15.178a13.792 13.792 0 01-1.766-2.202c-.33.983-.766 2.043-1.234 3.004a25.901 25.901 0 013-.802zM6.766 9.234c-.04.015-.073.04-.102.113-.108.279-.023.809.143 1.377.136-.98.063-1.397 0-1.502a.233.233 0 00-.041.012z" fill="#fff"></path>
			<mask id="a" maskUnits="userSpaceOnUse" x="0" y="0" width="15" height="22">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M0 .962h14.527v20.274H0V.962z" fill="#fff"></path>
			</mask>
			<g mask="url(#a)">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M11.899 16.04c-.235.327-.556.5-.932.5-.51 0-1.103-.323-1.766-.96-1.19.25-2.58.694-3.702 1.186-.35.744-.687 1.344-.999 1.784-.43.603-.8.884-1.167.884a.671.671 0 01-.405-.137c-.437-.327-.496-.692-.468-.94.076-.685.92-1.4 2.51-2.129a28.207 28.207 0 001.588-4.513c-.418-.912-.825-2.095-.529-2.789a.888.888 0 01.806-.543c.212 0 .401.093.533.26.123.158.496.634-.065 2.997.566 1.169 1.366 2.36 2.134 3.175a8.09 8.09 0 011.408-.15c.657 0 1.054.153 1.217.468.135.26.08.566-.163.907zM5.588.962v5.595H0v14.68h14.527V.961h-8.94z" fill="#fff"></path>
			</g>
			<path fill-rule="evenodd" clip-rule="evenodd" d="M3.002 18.68c-.005.04-.019.147.21.304.073-.02.497-.194 1.288-1.502-1.043.525-1.468.956-1.498 1.199zm6.748-3.361c.389.426.732.661.985.661.113 0 .26-.038.407-.333.07-.142.098-.234.108-.282-.057-.045-.229-.136-.653-.136-.24 0-.526.03-.847.09z" fill="#fff"></path>
		</symbol>
	</svg>
</div>
<?php
get_footer();
