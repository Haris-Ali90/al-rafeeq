@extends('includes.layout')

@section('title', 'Couriers Delivery Company In Ottawa, Toronto, Montreal')
@section('description', "If you are looking for a fast courier company in Ottawa, Canada? Which can give you same day home delivery service. So Joyco brings to you fast and same day delivery service. For more information call @ (855) 596-1833")
@section('metaTitle', "Couriers Delivery Company In Ottawa, Toronto, Montreal | JoeyCo")
@section('keywords', "Amazon Courier, Amazon Couriers, Amazon Deliveries, Amazon Delivery Canada, Courier Companies, Courier Companies Ottawa, Courier Companies Toronto, Courier Near Me, Courier Toronto, Delivery Companies Toronto, Delivery Flowers Toronto, Flower Delivery Near Me, Flowers Delivery In Toronto, Flowers Delivery Montreal, Flowers Delivery Ottawa, Walmart Online Grocery Shopping, Medication Delivery, Food Deliveries Near Me, Food Delivery Apps, Groceries Delivery Montreal, Home Delivery Food, Home Delivery Food Near Me, Home Delivery Grocery Near Me, Home Delivery Near Me, Medicine Delivery, Medicine Delivery Near Me, Mothers Day Flowers, Online Grocery, Order Flowers, Order Flowers Online, Ottawa Courier, Ottawa Deliveries, Ottawa Flower Delivery, Pharmacy Delivery Near Me, Send Flowers Montreal, Send Flowers Online, Send Flowers Ottawa, Send Flowers Toronto")

@section('content')
    <main id="main" class="page-home">
        @include('includes.clientHeader')

		<div class="modal fade bd-example-modal-lg" id="demoJoeyApp" tabindex="-1" role="dialog" aria-labelledby="demoJoeyAppTitle" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">JoeyCo - We Deliver You Relax</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="video_frame">
							<video id="myVideo" width="100%" height="400px" controls>
								<source src="/images/joeyco-video.mp4" type="video/mp4">
								Your browser does not support HTML5 video.
							</video>
							<div class="play_overlay cursor-pointer">
								<i class="icofont-ui-play play_icon"></i>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<div class="home-page">
			<div id="main_banner" class="banner_home">
				<div class="container">
					<div class="canada_stamp d-none d-sm-block">
						<img src="{{asset('/')}}images/canada-stamp.gif" alt="">
					</div>
					<div class="row align-items-center">
						<div class="col-12 col-sm-6 mb-align-center">
							<div class="hgroup page_heading">
								<h1 class="main_heading">Think Delivery. Think Joey</h1>
								<h2 class="sub_heading">Power-up your business with JoeyCo’s delivery solutions. You schedule, we deliver!</h2>
								<h3 class="banner_paragraph bf-color mt-20 light">JoeyCo offers, on-demand, same-day, next-day, province wide and even coast to coast delivery solutions for online retailers.</h3>
							</div>
							<div class="actions d-block d-sm-flex align-items-center">
								<a href="{{route('register')}}" class="watch_video_btn play-video has_thumb" data-toggle="modal" data-target="#demoJoeyApp">
									<!-- <i class="icofont-ui-play"></i> -->
									<div class="thumbnail"><img src="{{asset('/')}}images/video_thumb.jpg" alt=""></div>
									Watch Video <span>00:49</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<section class="section joy_business_options bc1-lightester-bg">
				<div class="container md options_container">
					<div class="row no-gutter">
						<div class="col-12 col-sm-6">
							<div class="option_box joey_option">
								<div class="icon"><span class="sprite-70-joey"></span></div>
								<div class="info align-center">
									<h4>Joeys</h4>
									<p>Join the crew, we help each other and we enable businesses</p>
								</div>
								<div class="action">
									<a href="https://joey.joeyco.com/" class="btn btn-primary full-w">Become A Joey</a>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-6">
							<div class="option_box business_option">
								<div class="icon"><span class="sprite-70-business"></span></div>
								<div class="info align-center">
									<h4 class="basecolor2">Businesses</h4>
									<p>“There’s no traffic on the extra mile” – JoeyCo will help you grow and satisfy your customer delivery demand</p>
								</div>
								<div class="action">
									<a href="https://merchant.joeyco.com/" class="btn btn-secondary full-w">Register Now</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="section section-padding-xs section_partners bc1-lightester-bg">
				<div class="container partners_section">
					<div class="custom_tabs style2">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="partners-tab" data-toggle="tab" href="#partners" role="tab" aria-controls="partners" aria-selected="true">
									Trusted Clients
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="customers-tab" data-toggle="tab" href="#customers" role="tab" aria-controls="customers" aria-selected="false">
									Customers
								</a>
							</li>
						</ul>
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="partners" role="tabpanel" aria-labelledby="partners-tab">
								<div class="hgroup align-center">
									<h4>Place an order with our clients below and a Joey will be delivering it!</h4>
								</div>
								<div class="partners_list d-flex align-items-center justify-content-center flex-wrap">
									<div class="partner_box"><img src="{{asset('/')}}images/partner_1.png" alt=""></div>
									<div class="partner_box"><img src="{{asset('/')}}images/partner_2.png" alt=""></div>
									<div class="partner_box"><img src="{{asset('/')}}images/partner_3.png" alt=""></div>
									<div class="partner_box"><img src="{{asset('/')}}images/partner_4.png" alt=""></div>
									<div class="partner_box"><img src="{{asset('/')}}images/partner_5.png" alt=""></div>
									<div class="partner_box"><img src="{{asset('/')}}images/partner_6.png" alt=""></div>
								</div>
							</div>
							<div class="tab-pane fade" id="customers" role="tabpanel" aria-labelledby="customers-tab">
								<div class="hgroup align-center">
									<h4>Customers</h4>
								</div>
								<div class="partners_list d-flex align-items-center justify-content-center flex-wrap">
									<div class="partner_box"><img src="{{asset('/')}}images/partner_2.png" alt=""></div>
									<div class="partner_box"><img src="{{asset('/')}}images/partner_3.png" alt=""></div>
									<div class="partner_box"><img src="{{asset('/')}}images/partner_4.png" alt=""></div>
									<div class="partner_box"><img src="{{asset('/')}}images/partner_6.png" alt=""></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>


			@include('includes.whatWeDo')

			<section class="section bc1-lightest-bg">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-sm-5">
							<div class="hgroup">
								<h2 class="mb-10">Delivery Coverage Map</h2>
								<h3 class="h4 regular bf-color">If you're looking for a delivery partner that can provide you with tailored logistics solutions <a href="{{route('contact')}}">get in touch today</a>.</h3>
							</div>
							<p>JoeyCo is currently available in Ontario, Quebec, Alberta, Nova Scotia, British Columbia and New Brunswick.</p>
						</div>
						<div class="col-sm-7">
							<img src="{{asset('/')}}images/coverage_map.png" alt="">
						</div>
					</div>
				</div>
			</section>

			<section class="section section_overview section-padding-xl bc1-lightester-bg">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-12 col-lg-5 col-sm-6">
							<div class="hgroup mb-align-center">
								<h2 class="h1 mb-10">Delivery Solutions Tailored For You</h2>
								<h4 class="regular bf-color">We have the right product for you.</h4>
							</div>
							<div class="list">
								<ul class="list-check">
									<li>Real time instant quote with no hidden charges</li>
									<li>Quick, easy-to-use online booking to save you time and money</li>
									<li>Access a national network of trusted Joeys which are trained to handle your product and know what your customers are looking for.</li>
									<li>Custom-built mobility solutions for diverse sectors: Real time tracking for both yourself and your clients. You now know exactly who and where your package is</li>
								</ul>
							</div>
						</div>
						<div class="col-12 col-lg-7 col-sm-6">
							<img src="{{asset('/')}}images/home_solution.png" alt="">
						</div>
					</div>
				</div>
			</section>

			<section class="section section_techreview nopadding hide">
				<div class="container mb-align-center">
					<div class="tech_review_box d-sm-flex d-block align-items-center">
						<div class="icon">
							<span class="sprite-60-review"></span>
						</div>
						<div class="cnt">
							<p>It’s easy to use, clear and self-explanatory. The ability to search for loads is one of the best systems I have used, (the) invoicing side takes care of itself so (it’s) less work.”</p>
							<h5 class="basecolor1 nomargin">Estella V. Fells  <span class="bf-color">(Four Leaf Clover)</span></h5>
						</div>
						<div class="action">
							<a href="{{route('testimonials')}}" class="btn btn-primary full-w">Read More</a>
						</div>
					</div>
				</div>
			</section>

			<section class="section section_industries white-bg">
				<div class="container">
					@include('includes.industry')
				</div>
			</section>

			<section class="section section_becomejoey nopadding bc1-lightester-bg">
					<div class="container-fluid">
						<div class="row align-items-center">
							<div class="joeycustomer_bg col-sm-6 col-12">
							</div>
							<div class="col-sm-6 col-12">
								<div class="become_joey_cnt align-center">
									<h3 class="h1">Become A Joey</h3>
									<p>You want to become a courier partner? Join the community today and start earning money!</p>
									<a href="https://joey.joeyco.com/" class="btn btn-primary">Become A Joey</a>
								</div>
							</div>
						</div>
					</div>
			</section>

			<section class="section section-padding-xl section_business">
				<div class="container">
					<div class="hgroup full-w align-center">
						<h3 class="h1 basecolor2">How We Can Help Your Business</h3>
					</div>

					<div class="row">
						<div class="col-12 col-sm-3">
							<h6 class="bf-color">Industries We Serve!</h6>
							<p class="small">JoeyCo offers same-day, scheduled and on-demand delivery solution to meet growing online customer demand expectations.</p>
							<nav class="nav">
								<ul class="no-list">
									<li><a href="{{route('industries')}}">eCommerce</a></li>
									<li><a href="{{route('industries')}}">Grocery</a></li>
									<li><a href="{{route('industries')}}">Pharmacy</a></li>
									<li><a href="{{route('industries')}}">Retail & Luxury</a></li>
									<li><a href="{{route('industries')}}">Restaurants | Meal Kits</a></li>
{{--									<li><a href="{{route('serviceDetail')}}">Automotive</a></li>--}}
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
										<ul class="no-list">
											<li><a href="{{route('serviceDetail')}}">Retail to Customer</a></li>
											<li><a href="{{route('serviceDetail')}}">Home Delivery</a></li>
											<li><a href="{{route('serviceDetail')}}">Return & Reverse Logistics</a></li>
											<li><a href="{{route('serviceDetail')}}">Local Same-Day</a></li>
											<li><a href="{{route('serviceDetail')}}">Scheduled Delivery</a></li>
										</ul>
									</nav>
								</div>
								<div class="col-12 col-sm-6">
									<nav class="nav">
										<ul class="no-list">
											<li><a href="{{route('serviceDetail')}}">Same day</a></li>
											<li><a href="{{route('serviceDetail')}}">On-Demand Delivery</a></li>
											<li><a href="{{route('serviceDetail')}}">Warehouse to Consumer</a></li>
											<li><a href="{{route('serviceDetail')}}">Mid mile and Last mile</a></li>
											<li><a href="{{route('serviceDetail')}}">On-Demand warehousing</a></li>
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

					<div class="action align-center">
						<a href="https://merchant.joeyco.com/" class="btn btn-secondary btn-lg">Register Now</a>
					</div>
				</div>
			</section>

			{{-- <section class="section section-padding-xl section_publisher bc1-lightester-bg">
				<div class="arrowDown"><i class="icofont-rounded-down"></i></div>
				<div class="container">
					<div class="hgroup align-center">
						<h1>We are in the news</h1>
					</div>
					<div class="publisher_list d-flex flex-wrap align-items-center justify-content-center">
						<div class="publisher_box"><img src="{{asset('/')}}images/publisher_logo1.jpg" alt=""></div>
						<div class="publisher_box"><img src="{{asset('/')}}images/publisher_logo2.jpg" alt=""></div>
						<div class="publisher_box"><img src="{{asset('/')}}images/publisher_logo3.jpg" alt=""></div>
						<div class="publisher_box"><img src="{{asset('/')}}images/publisher_logo4.jpg" alt=""></div>
					</div>
				</div>
			</section> --}}

		</div>

        {{-- @stop --}}
        @include('includes.clientFooter')
    </main>
@endsection



