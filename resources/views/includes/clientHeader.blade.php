
<!-- Start Chat -->
<input type="hidden" value="" name="chat_user_id">
<input type="hidden" value="" name="chat_other_user_id">
<input type="hidden" value="" name="chat_thread_id">
<input type="hidden" value="" name="chat_group_id">
<input type="hidden" value="guest" name="chat_user_type">
<input type="hidden" value="dashboard" name="other_user_type">
<input type="hidden" value="" name="chat_message" id="chat_message">
<input type="hidden" value="" name="userId" id="userId">
<input type="hidden" value="onboarding" name="department" id="department">
<input type="hidden" value="" name="isGroup" id="isGroup">
<input type="hidden" value="4" name="source" id="source">
<input type="hidden" value="" name="full_name" id="full_name">
<input
    type="file"
    id="attachFileInput"
    name="attachFileInput"
    accept="image/jpeg,image/gif,image/jpg,image/png,application/pdf"
    multiple class="hide">


{{--<div class="chat_stacked_icon cursor-pointer">--}}
{{--	<i class="icofont-speech-comments"></i>--}}
{{--</div>--}}

{{--<div class="chat_wrap">--}}
{{--    <div class="chat_header">--}}
{{--        <div class="info">--}}
{{--            <h4 class="name" id="name">JoeyCo Support</h4>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--	<div class="guest_chat_form">--}}
{{--		<form method="POST">--}}
{{--			@csrf--}}
{{--			<h6>How can we help?</h6>--}}
{{--			<div class="form-group no-min-h">--}}
{{--				<label for="email">Select the type of issue</label>--}}
{{--				<select class="form-control" id="reasonCategoryDD" name="type" required>--}}

{{--				</select>--}}
{{--			</div>--}}
{{--			<div class="form-group no-min-h">--}}
{{--				<label for="email">Select the reason</label>--}}
{{--				<select class="form-control" id="reasonDD" name="type" required>--}}

{{--				</select>--}}
{{--			</div>--}}
{{--			<div class="form-group no-min-h">--}}
{{--				<label for="Full name">{{ __('Full name') }}</label>--}}
{{--				<input type="text" class="form-control" name="guest_full_name" required>--}}
{{--			</div>--}}
{{--			<div class="form-group no-min-h">--}}
{{--				<label for="Email address">{{ __('Email address') }}</label>--}}
{{--				<input type="email" class="form-control" name="email" required>--}}
{{--			</div>--}}
{{--			<div class="form-group no-min-h">--}}
{{--				<button type="submit" class="btn btn-primary btn-xs">--}}
{{--					{{ __('Start Chat') }}--}}
{{--				</button>--}}
{{--				<button type="button" class="btn btn-white btn-xs chatCloseBtn">--}}
{{--					{{ __('Cancel') }}--}}
{{--				</button>--}}
{{--			</div>--}}
{{--		</form>--}}
{{--	</div>--}}
{{--	<div class="guest_chat_wrap">--}}
{{--		<div class="not-accepted d-none"></div>--}}
{{--		<div class="chat_list messageArea" id="messageArea"></div>--}}
{{--		<div class="chat_textarea">--}}
{{--			<div id="chatFiles" class="chat_files"></div>--}}
{{--			<div class="form-group no-min-h nomargin">--}}
{{--				<div class="textMessage_wrap">--}}
{{--					<textarea name="textarea" id="textMessage" class="textMessageInput form-control form-control-lg" placeholder="Write a message..."></textarea>--}}
{{--					<button id="send_msg_btn" class="send_msg_btn"><i class="icofont-paper-plane"></i></button>--}}
{{--					<button id="attachFileBtn" class="attach_btn"><i class="icofont-link-alt"></i></button>--}}
{{--				</div>--}}
{{--			</div>--}}
{{--			<div class="divider center xs"></div>--}}
{{--			<div class="end_thread align-center">--}}
{{--				<a href="#" id="endThreadBtn" class="endThreadBtn btn btn-white btn-mb">End Chat</a>--}}
{{--			</div>--}}
{{--		</div>--}}
{{--	</div>--}}
{{--</div>--}}


	<div class="modal fade hamburgerMenu custom-modal-style" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<button type="button" class="modal-close-btn" data-dismiss="modal"><i class="icofont-close-line"></i></button>

				<div class="menu_type_wrap">

					<div class="cs-accordion" id="accordion">
						<div class="card">
							<div class="card-header" id="headingOne">
								<h5 class="mb-0">
									<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										Business Solutions
									</button>
								</h5>
							</div>

							<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="card-body">
									<nav class="hamburger_nav">
										<ul class="no-list">
											<li><a href="{{route('serviceDetail')}}">Retail to Customer</a></li>
											<li><a href="{{route('serviceDetail')}}">Home Delivery</a></li>
											<li><a href="{{route('serviceDetail')}}">Returns & Reverse Logistics</a></li>
											<li><a href="{{route('serviceDetail')}}">Local Same-Day</a></li>
											<li><a href="{{route('serviceDetail')}}">Scheduled Delivery</a></li>
											<li><a href="{{route('serviceDetail')}}">Same day</a></li>
											<li><a href="{{route('serviceDetail')}}">On-Demand Delivery</a></li>
											<li><a href="{{route('serviceDetail')}}">Warehouse to Consumer</a></li>
											<li><a href="{{route('serviceDetail')}}">Mid mile and Last mile</a></li>
											<li><a href="{{route('serviceDetail')}}">On-Demand Warehousing</a></li>
											<li><a href="{{route('serviceDetail')}}">Big and Bulky</a></li>
										</ul>
									</nav>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" id="headingTwo">
							<h5 class="mb-0">
								<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									Industries
								</button>
							</h5>
							</div>
							<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
								<div class="card-body">
									<nav class="hamburger_nav">
										<ul class="no-list">
											<li><a href="{{route('industries')}}">eCommerce</a></li>
											<li><a href="{{route('industries')}}">Grocery</a></li>
											<li><a href="{{route('industries')}}">Pharmacy</a></li>
											<li><a href="{{route('industries')}}">Retail & Luxury</a></li>
											<li><a href="{{route('industries')}}">Restaurants | Meal Kits</a></li>
{{--											<li><a href="{{route('industries')}}">Automotive</a></li>--}}
										</ul>
									</nav>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" id="headingThree">
							<h5 class="mb-0">
								<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									About JoeyCo
								</button>
							</h5>
							</div>
							<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
								<div class="card-body">
									<nav class="hamburger_nav">
										<ul class="no-list">
											<li><a href="{{route('about')}}">Who we are</a></li>
											<li><a href="{{route('about')}}">What we do</a></li>
											<li><a href="{{route('about')}}">How it works</a></li>
											<li><a href="{{route('faqs')}}">FAQs</a></li>
											<li><a href="{{route('contact')}}">Contact</a></li>
											<!-- <li><a href="{{/*route('announcements')*/ '#'}}" class="bold">Announcements</a></li> -->
											<!-- <li><a href="{{/*route('testimonials')*/ '#'}}" class="bold">Testimonials</a></li> -->
											<li><a href="{{route('careers')}}">Careers</a></li>
										</ul>
									</nav>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="top_services_btn link-wrap">
		<a href="#" class="link" data-toggle="modal" data-target=".top_services_modal"></a>
		<i class="icofont-rounded-left d-flex align-items-center"></i>
		<span class="bold">OUR SERVICES</span>
	</div>
	<div class="modal fade top_services_modal custom-modal-style" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xlg modal-globe-bg">
			<div class="modal-content">
				<button type="button" class="modal-close-btn" data-dismiss="modal"><i class="icofont-close-line"></i></button>

				<div class="hgroup seperator_left">
					<h2>Our Services</h2>
				</div>

				<div class="services_list">
					<div class="container">
						<div class="custom_tabs">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Enterprise</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Small Business</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="career-tab" data-toggle="tab" href="#career" role="tab" aria-controls="career" aria-selected="false">Careers</a>
								</li>
							</ul>
							<div class="tab-content" id="myTabContent">
								<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
									<div class="row">
										<div class="col-12 col-sm-3">
											<h6 class="bf-color">Industries We Serve!</h6>
											<p class="small">JoeyCo offers same-day, scheduled and on-demand delivery solution to meet growing online customer demand expectations.</p>
											<nav class="nav">
												<ul>
													<li><a href="{{route('industries')}}">eCommerce</a></li>
													<li><a href="{{route('industries')}}">Grocery</a></li>
													<li><a href="{{route('industries')}}">Pharmacy</a></li>
													<li><a href="{{route('industries')}}">Retail & Luxury</a></li>
													<li><a href="{{route('industries')}}">Restaurants | Meal Kits</a></li>
{{--													<li><a href="{{route('serviceDetail')}}">Automotive</a></li>--}}
												</ul>
											</nav>
										</div>
										<div class="col-12 col-sm-6">
											<h6 class="bf-color">How We Help Enterprises</h6>
											<div class="row">
												<div class="col-sm-6 col-12">
													<p class="small">JoeyCo provides API and EDI integration options to streamline communication. Enterprise clients have the ability to track in real time the status of all their shipments.</p>
													<p class="small">We offer our service 7 days a week with complete customizable pick up schedules. JoeyCo can pick up from your retail locations or warehouses across the country.</p>
												</div>
												<div class="col-sm-6 col-12">
													<p class="small">JoeyCo provides white labeling solutions for your customers tracking page and gives you the ability to customized and trailer our solutions to your needs. </p>
													<p class="small">You deserve a delivery partner that can keep up with the demand for your products and services.</p>
												</div>
											</div>
											<div class="row">
												<div class="col-12 col-sm-6">
													<nav class="nav">
														<ul>
															<li><a href="{{route('serviceDetail')}}">Retail to Customer</a></li>
															<li><a href="{{route('serviceDetail')}}">Home Delivery</a></li>
															<li><a href="{{route('serviceDetail')}}">Returns & Reverse Logistics</a></li>
															<li><a href="{{route('serviceDetail')}}">Local Same-Day</a></li>
															<li><a href="{{route('serviceDetail')}}">Scheduled Delivery</a></li>
														</ul>
													</nav>
												</div>
												<div class="col-12 col-sm-6">
													<nav class="nav">
														<ul>
															<li><a href="{{route('serviceDetail')}}">Same day</a></li>
															<li><a href="{{route('serviceDetail')}}">On-Demand Delivery</a></li>
															<li><a href="{{route('serviceDetail')}}">Warehouse to Consumer</a></li>
															<li><a href="{{route('serviceDetail')}}">Mid mile and Last mile</a></li>
															<li><a href="{{route('serviceDetail')}}">On-Demand Warehousing</a></li>
															<li><a href="{{route('serviceDetail')}}">Big and Bulky</a></li>
														</ul>
													</nav>
												</div>
											</div>
										</div>
										<div class="col-12 col-sm-3 hide">
											<div class="article">
												<div class="publisher_logo"><img src="{{asset('/')}}images/forbes-logo.jpeg" alt=""></div>
												<h5>News Article</h5>
												<p class="small">This Uber For Deliveries Startup Might Actually Get Your Last-Minute Gifts Delivered On Time</p>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
									<div class="row">
									<div class="col-12 col-sm-3">
											<h6 class="bf-color">Industries We Serve!</h6>
											<p class="small">JoeyCo offers same-day, scheduled and on-demand delivery solution to meet growing online customer demand expectations</p>
											<nav class="nav">
												<ul>
													<li><a href="{{route('industries')}}">eCommerce</a></li>
													<li><a href="{{route('industries')}}">Grocery</a></li>
													<li><a href="{{route('industries')}}">Pharmacy</a></li>
													<li><a href="{{route('industries')}}">Retail & Luxury</a></li>
													<li><a href="{{route('industries')}}">Restaurants | Meal Kits</a></li>
{{--													<li><a href="{{route('serviceDetail')}}">Automotive</a></li>--}}
												</ul>
											</nav>
										</div>
										<div class="col-12 col-sm-6">
											<h5 class="bf-color">How We Can Help You!</h5>
											<div class="row">
												<div class="col-sm-6 col-12">
													<p class="small">JoeyCo helps small business with on demand and same delivery service. Weather its 1 order or 100, we have you covered.</p>
													<p class="small">JoeyCo provides you with a  easy to use portal, allowing you to book all.</p>
													<p class="small">JoeyCo provides you with a  easy to use portal, allowing you to book all delivery needs. Whether you are looking for a bike courier and a truck for your deliveries, we got you covered!. </p>
												</div>
												<div class="col-sm-6 col-12">
													<p class="small">Provide delivery services to your business without the hassle of hiring and managing a fleet of drivers! JoeyCo helps you reach clients which were never reachable! </p>
													<p class="small">JoeyCo provides transparency on all your delivery orders. Have the ability to see who your Joey is, the cost of your delivery and the delivery time. All from a single portal.</p>
												</div>
											</div>
											<div class="row">
												<div class="col-12 col-sm-6">
													<nav class="nav">
														<ul>
															<li><a href="{{route('serviceDetail')}}">Retail to Customer</a></li>
															<li><a href="{{route('serviceDetail')}}">Home Delivery</a></li>
															<li><a href="{{route('serviceDetail')}}">Returns & Reverse Logistics</a></li>
															<li><a href="{{route('serviceDetail')}}">Local Same-Day</a></li>
															<li><a href="{{route('serviceDetail')}}">Scheduled Delivery</a></li>
														</ul>
													</nav>
												</div>
												<div class="col-12 col-sm-6">
													<nav class="nav">
														<ul>
															<li><a href="{{route('serviceDetail')}}">Same day</a></li>
															<li><a href="{{route('serviceDetail')}}">On-Demand Delivery</a></li>
															<li><a href="{{route('serviceDetail')}}">Warehouse to Consumer</a></li>
															<li><a href="{{route('serviceDetail')}}">Mid mile and Last mile</a></li>
															<li><a href="{{route('serviceDetail')}}">On-Demand Warehousing</a></li>
															<li><a href="{{route('serviceDetail')}}">Big and Bulky</a></li>
														</ul>
													</nav>
												</div>
											</div>
										</div>
										<div class="col-12 col-sm-3 hide">
											<div class="article">
												<div class="publisher_logo"><img src="{{asset('/')}}images/forbes-logo.jpeg" alt=""></div>
												<h5>News Article</h5>
												<p class="small">This Uber For Deliveries Startup Might Actually Get Your Last-Minute Gifts Delivered On Time</p>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="career" role="tabpanel" aria-labelledby="career-tab">
									<div class="jobs_list">
										<ul class="no-list">
											<li><a href="{{route('careers')}}">Warehouse Supervisor (Day Shift)</a></li>
											<li><a href="{{route('careers')}}">Warehouse Supervisor (Afternoon Shift)</a></li>
											<li><a href="{{route('careers')}}">Warehouse Associate (Day Shift)</a></li>
											<li><a href="{{route('careers')}}">Warehouse Associate (Afternoon Shift)</a></li>
											<li><a href="{{route('careers')}}">Warehouse Associate (Night Shift)</a></li>
											<li><a href="{{route('careers')}}">Account Executive</a></li>
											<li><a href="{{route('careers')}}">Joey Trainer</a></li>
											<li><a href="{{route('careers')}}">Warehouse Associate (Day Shift)</a></li>
											<li><a href="{{route('careers')}}">Warehouse Associate (Afternoon Shift)</a></li>
											<li><a href="{{route('careers')}}">Warehouse Associate (Night Shift)</a></li>
											<li><a href="{{route('careers')}}">Account Executive</a></li>
											<li><a href="{{route('careers')}}">Recruitment Specialist</a></li>
											<li><a href="{{route('careers')}}">Warehouse Associate (Afternoon Shift)</a></li>
											<li><a href="{{route('careers')}}">Security Analyst</a></li>
											<li><a href="{{route('careers')}}">Route Specialist</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<header id="client_header">
			<div class="row-1">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-4 col-sm-3 col-4">
							<div id="logo">
								<a href="{{url('/')}}"><img src="{{asset('/')}}images/logo-joeyco.webp" alt=""></a>
							</div>
						</div>
						<div class="col-lg-8 col-sm-9 col-8 header_right">
							<nav id="top-nav">
								<ul class="no-list d-flex align-items-center justify-content-end">
									{{-- <li><a href="{{route('trackOrder')}}">Track your order</a> --}}
									<li class="dropdown_wrap">
										<a href="#">
											<span>Track Package <i class="icofont-rounded-down"></i></span>
										</a>

										<div class="dropdown track_order">
											<div class="close_btn cursor-pointer"><i class="icofont-close"></i></div>
											<div class="track_order_form_wrap">
												<h4 class="color-white nomargin">Track Your Order</h4>
												<p class="color-white mb-5">Please enter your tracking id</p>
												<form target="_blank" action="{{route('track-Order')}}" id="track_order_form" method="GET"  class="needs-validation" novalidate>
													<div class="form-group no-min-h nomargin">
                                                        @csrf
														<input type="text" placeholder="JCY-10909202222" class="form-control form-control-xl no-border" name="trackingId" required autocomplete="off">
													</div>
													<div class="track_btn_wrap">
														<button style="max-height: 58px;" type="submit"  class="btn btn-bc1lightest no-hover submitButton no-shadow">Track</button>
                                                        {{-- <button type="submit" onclick="location.href = 'track-order.php';" class="btn btn-bc1lightest no-hover submitButton no-shadow">Track</button> --}}
													</div>
												</form>
											</div>
										</div>
									</li>
									{{-- <li class="d-none d-sm-block"><a href="#">Create Custom Order</a></li> --}}
									<!-- <li class="d-none d-sm-block"><a href="{{route('register')}}" class="login-btn">
										<span>Login / Register</span>
									</a></li> -->
									<li class="hamburger_menu">
										<a href="#" data-toggle="modal" data-target=".hamburgerMenu">
											<span></span>
											<span></span>
											<span></span>
										</a>
									</li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>
<script src='//fw-cdn.com/2347145/2961325.js' chat='true'></script>
