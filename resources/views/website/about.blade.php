@extends('includes.layout')

    @section('content')
    <main id="main" class="page-serviceDetail">
        @include('includes.clientHeader')

		@include('includes.bookDemo')

		<div class="inner-page">
			<div id="main_banner" class="style2 withBottomBg">
				<div class="breadcrumb">
					<div class="container">
						<ul>
							<li><a href="{{url('/')}}">Home</a></li>
							<li><a href="#">About JoeyCo</a></li>
						</ul>
					</div>
				</div>

				<div class="heading_area">
					<div class="container">
						<div class="row">
							<div class="col-12 col-sm-8 col-md-6">
								<h1 class="main_heading">JoeyCo’s Story</h1>
								<p>How to keep delivering.</p>
								<a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#bookDemo">BOOK A DEMO</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<section class="section white-bg">
				<div class="container sm">
					<div class="hgroup align-center">
						<h2 class="">The Story of JoeyCo</h2>
						<h2 class="light">Our values are at the core of everything we do</h2>
					</div>
					<div class="align-center">
						<p>When Toronto needed online restaurant deliveries, JoeyCo was born. When Ontario needed better online grocery logistics, JoeyCo learned and delivered. When the nation needed essential services and logistics support, JoeyCo kept delivering. Now the world awaits on JoeyCo’s next delivery. JoeyCo’s technology has learned and evolved through many verticals since it’s first official delivery in Toronto in 2014, 9yrs later JoeyCo has built a network capable of offering a service unlike any other.  JoeyCo’s team has also evolved, grown and learned how to offer better customer delivery experiences, while preparing for what’s next with consumer expectations.</p>
						<p>The key to JoeyCo’s success and its main strength is in its diverse fleet of Joeys. JoeyCo’s pursuit to answer the travelling salesman problem to return better job opportunities for gig workers, intuitive business tools, secure and advanced technology integration tools for enterprises to benefit from a robust network of couriers and JoeyCo Sort Stations to scale any business nationwide.</p>
						<p>Joeys, the couriers, the supporting staff and even the leadership team. We are all Joeys, helping one another grow and learn. Our suite of mobile apps and integrated systems unlock even more jobs and opportunities for Joeys. A company of Joeys, hence “JoeyCo”.</p>
					</div>
				</div>
			</section>

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

			<section class="section section_problem_overview">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-12 col-sm-6 col-md-6">
							<img src="{{asset('/')}}images/joey.jpg" alt="">
						</div>
						<div class="col-12 col-sm-6 col-md-6">
							<div class="hgroup">
								<h2>Driven by technology</h2>
							</div>
							<ul class="no-list">
								<li class="box d-flex">
									<div class="icon"><span class="sprite-48-truck"></span></div>
									<div class="info pl-20">
										<h3 class="h5 bf-color nomargin">Ditch Your Delivery Fleet</h3>
										<p class="light f18">Instead of managing your own vehicles and drivers, joeyCo works as an extension of your team.</p>
									</div>
								</li>
								<li class="box d-flex">
									<div class="icon"><span class="sprite-48-map"></span></div>
									<div class="info pl-20">
										<h3 class="h5 bf-color nomargin">Ready When You Are</h3>
										<p class="light f18">Place orders on-demand for same-day delivery, or schedule for the future.</p>
									</div>
								</li>
								<li class="box d-flex">
									<div class="icon"><span class="sprite-48-joeyuser"></span></div>
									<div class="info pl-20">
										<h3 class="h5 bf-color nomargin">Drivers You Can Count On</h3>
										<p class="light f18">All JoeyCo Delivery Partners go through background checks and training, so you can be confident your items are in good hands from pickup to delivery.</p>
									</div>
								</li>
								<li class="box d-flex">
									<div class="icon"><span class="sprite-48-hand"></span></div>
									<div class="info pl-20">
										<h3 class="h5 bf-color nomargin">Place Deliveries Easily</h3>
										<p class="light f18">Whether via the app or website, place your order on the device that is most convenient for you.</p>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</section>

			<section class="section section_industries bc1-lightester-bg">
				<div class="container">
					@include('includes.industry')
				</div>
			</section>

			<section class="section_process section section-padding-xl">
				<div class="container">
					<div class="hgroup align-center">
						<h2>Hassle-free Application Process</h2>
					</div>

					<div class="row no-gutter">
						<div class="col-12 col-cs-5">
							<div class="process_box align-center">
								<div class="icon_wrap"><div class="icon"><span class="sprite-60-signup"/></div></div>
								<div class="h5 title">Signup</div>
								<div class="cnt f15 lh-16">Signup as Joey using our mobile app or website and verify your email address.</div>
							</div>
						</div>
						<div class="col-12 col-cs-5">
							<div class="process_box align-center">
								<div class="icon_wrap"><div class="icon"><span class="sprite-60-application"/></div></div>
								<div class="h5 title">Online application</div>
								<div class="cnt f15 lh-16">Next step is to fill your online application and submit for approval.</div>
							</div>
						</div>
						<div class="col-12 col-cs-5">
							<div class="process_box align-center">
								<div class="icon_wrap"><div class="icon"><span class="sprite-60-verification"/></div></div>
								<div class="h5 title">Recruiter verification</div>
								<div class="cnt f15 lh-16">One our professional recruiter will contact you for basic verification.</div>
							</div>
						</div>
						<div class="col-12 col-cs-5">
							<div class="process_box align-center">
								<div class="icon_wrap"><div class="icon"><span class="sprite-60-quiz"/></div></div>
								<div class="h5 title">Quiz & Test</div>
								<div class="cnt f15 lh-16">Watch our helpful tutorials and pass the easy quiz test.</div>
							</div>
						</div>
						<div class="col-12 col-cs-5">
							<div class="process_box align-center">
								<div class="icon_wrap"><div class="icon"><span class="sprite-60-done"/></div></div>
								<div class="h5 title">You’re done</div>
								<div class="cnt f15 lh-16">It's your first day to explore your city, get ready to take your first order.</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="faqs_section section section-padding-lg white-bg">
				<div class="container md">
					<div class="hgroup color-white align-center">
						<h2>Frequently asked questions</h2>
					</div>

					<div id="accordion" class="cs-accordion">
						<div class="card">
							<div class="card-header" id="headingOne">
								<h5 class="mb-0">
									<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									What cities is JoeyCo available in?
									</button>
								</h5>
							</div>

							<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="card-body">
								JoeyCo is currently available in Great Toronto, Montreal, Ottawa and Calgary. Coming soon: Vancouver, Edmonton and Halifax.
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" id="headingTwo">
								<h5 class="mb-0">
									<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									What can I have delivered with JoeyCo?
									</button>
								</h5>
							</div>
							<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
								<div class="card-body">
									You name it, you got it. From grocery to dry cleaning and everything in between, if it’s in a store or restaurant in your city, we can deliver it.
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" id="headingThree">
								<h5 class="mb-0">
									<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									Who makes the deliveries?
									</button>
								</h5>
							</div>
							<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
								<div class="card-body">
									Delivery Agents, known as “Joey’s” are enthusiastic members of your neighbourhood. When your delivery is accepted, you are immediately introduced to your Joey through their profile, delivery records and their ratings.
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="testimonials_section section section-padding-lg basecolor1-bg">
				<div class="container">
					<div class="hgroup color-white align-center">
						<h2 class="color-white thin">What our <strong class="bold">Joeys</strong> Say about <strong class="bold">JoeyCo</strong></h2>
					</div>

					<div class="testimonials_list_wrap">
						<div class="testimonials_list">
							<div class="testimonials_box d-flex align-items-center">
								<div class="img">
									<img src="{{asset('/')}}images/profile_img.jpg" alt="">
								</div>
								<div class="cnt">
									<p>It's the first job I really enjoy. I feel free when I work outside. What I enjoy the most about working for Joeyco is the flexibility and the lovely community.</p>
									<h6>Emily K. Nye  <span class="name light">Joey</span></h6>

								</div>
							</div>
						</div>
						<div class="box-shade one"></div>
						<div class="box-shade two"></div>
					</div>
				</div>
			</section>

		</div>
        @include('includes.clientFooter')
    </main>
@endsection
