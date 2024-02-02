@extends('includes.layout')
@section('title', 'Industries')

         @section('content')
         <main id="main" class="page-industry">

             @include('includes.clientHeader')
		<div class="inner-page">
			<div id="main_banner" class="style2 withBottomBg">
				<div class="breadcrumb">
					<div class="container">
						<ul>
							<li><a href="{{url('/')}}">Home</a></li>
							<li><a href="#">Industries</a></li>
						</ul>
					</div>
				</div>
				<div class="heading_area">
					<div class="container">
						<h1 class="main_heading">Industries</h1>
						<p>We partner with all industries</p>
					</div>
				</div>
			</div>

			<section class="section nopadding bc1-lightester-bg">
				<div class="container-fluid nopadding">
					<div class="row no-gutter align-items-center industry_row flex-row-reverse">
						<div class="col-12 col-sm-12 col-md-6">
							<div class="industry_bg" style="background-image: url({{asset('/')}}images/industry_2_bg.jpg)"></div>
						</div>
						<div class="col-12 col-sm-12 col-md-6">
							<div class="industry_box align-center">
								<div class="icon"><span class="sprite-60-grocery"></span></div>
								<h2>Grocery</h2>
								<p>Groceries are an essential service, JoeyCo offers on-demand and same-day delivery services to groceries across Canada. If it's 1 to 1 delivery or 1 to many, we got you covered. Our fleet is equipped with temperature controlled delivery bags, making sure your clients get their groceries fresh!</p>
							</div>
						</div>
					</div>
					<div class="row no-gutter align-items-center industry_row">
						<div class="col-12 col-sm-12 col-md-6">
							<div class="industry_bg" style="background-image: url({{asset('/')}}images/industry_3_bg.jpg)"></div>
						</div>
						<div class="col-12 col-sm-12 col-md-6">
							<div class="industry_box align-center">
								<div class="icon"><span class="sprite-60-retail"></span></div>
								<h2>Retail & Luxury</h2>
								<p>Business looking for secure, trackable delivery services. Take control. JoeyCo offers high value secured delivery service while wrapping our turn by turn tracking and signature capturing services to our clients.</p>
							</div>
						</div>
					</div>
					<div class="row no-gutter align-items-center industry_row flex-row-reverse">
						<div class="col-12 col-sm-12 col-md-6">
							<div class="industry_bg" style="background-image: url({{asset('/')}}images/industry_4_bg.jpg)"></div>
						</div>
						<div class="col-12 col-sm-12 col-md-6">
							<div class="industry_box align-center">
								<div class="icon"><span class="sprite-60-ecommerce"></span></div>
								<h2>eCommerce</h2>
								<p>Online fulfilment – Business selling goods online looking for one or all segments of their last mile deliveries. Pick and Pack while JoeyCo takes care of your deliveries. We offer cost effective delivery services, if it's price or speed, JoeyCo has you covered. Our sort stations are build to service 20,000 shipments a day!</p>
							</div>
						</div>
					</div>
					<div class="row no-gutter align-items-center industry_row">
						<div class="col-12 col-sm-12 col-md-6">
							<div class="industry_bg" style="background-image: url({{asset('/')}}images/industry_1_bg.jpg)"></div>
						</div>
						<div class="col-12 col-sm-12 col-md-6">
							<div class="industry_box align-center">
								<div class="icon"><span class="sprite-60-restaurant"></span></div>
								<h2>Restaurants</h2>
								<p>Food deliveries are an essential service, JoeyCo was built from the ground up to take on the unpredictability of on-demand delivery from mom and pop restaurants to multiple location franchises, we got you covered!</p>
							</div>
						</div>
					</div>
					<div class="row no-gutter align-items-center industry_row">
						<div class="col-12 col-sm-12 col-md-6">
							<div class="industry_box align-center">
								<div class="icon"><span class="sprite-60-pharmacy"></span></div>
{{--								<h2>Pharmacy</h2>--}}
                                <h2>Pharmaceutical</h2>
                                <p>JoeyCo is proud to offer our flexible fleet to service large enterprise clients in the pharmaceutical industry. Id verification, temperature control and return logistics is what we do. Servicings direct to consumer and business to business for over 10 years!</p>
{{--								<p>Pharmacy are an essential service, during the pandemic JoeyCo was the only Canadian online delivery service supporting the community.</p>--}}
							</div>
						</div>
						<div class="col-12 col-sm-12 col-md-6">
							<div class="industry_bg" style="background-image: url({{asset('/')}}images/industry_pharmacy_bg.jpg)"></div>
						</div>
					</div>
{{--					<div class="row no-gutter align-items-center industry_row">--}}
{{--						<div class="col-12 col-sm-12 col-md-6">--}}
{{--							<div class="industry_bg" style="background-image: url({{asset('/')}}images/industry_flowers.jpg)"></div>--}}
{{--						</div>--}}
{{--						<div class="col-12 col-sm-12 col-md-6">--}}
{{--							<div class="industry_box align-center">--}}
{{--								<div class="icon"><span class="sprite-60-flowershop"></span></div>--}}
{{--								<h2>Flowers</h2>--}}
{{--								<p>Flowers are an essential service, during the pandemic JoeyCo was the only Canadian online delivery service supporting the community.</p>--}}
{{--							</div>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--					<div class="row no-gutter align-items-center industry_row">--}}
{{--						<div class="col-12 col-sm-12 col-md-6">--}}
{{--							<div class="industry_box align-center">--}}
{{--								<div class="icon"><span class="sprite-60-apparel"></span></div>--}}
{{--								<h2>Apparel</h2>--}}
{{--								<p>Apparel are an essential service, during the pandemic JoeyCo was the only Canadian online delivery service supporting the community.</p>--}}
{{--							</div>--}}
{{--						</div>--}}
{{--						<div class="col-12 col-sm-12 col-md-6">--}}
{{--							<div class="industry_bg" style="background-image: url({{asset('/')}}images/industry_3_bg.jpg)"></div>--}}
{{--						</div>--}}
{{--					</div>--}}
				</div>
			</section>
		</div>
         @include('includes.clientFooter')
         </main>
@endsection

