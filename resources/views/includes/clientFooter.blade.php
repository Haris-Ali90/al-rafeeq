<footer id="client_footer">
	<div class="row-1">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-12 col-sm-8">
					<div class="row col_wrap align-items-center">
						<div class="col-12 col-sm-4 title">Download our app</div>
						<div class="col-12 col-sm-8 cnt app_btns d-flex align-items-center justify-content-center flex-wrap">
							<div class="sprite-app_btn_ios link-wrap"><a target="_blank" href="https://apps.apple.com/ca/app/joeyco-courier/id977224014" class="link"></a></div>
							<div class="sprite-app_btn_android link-wrap"><a target="_blank" href="https://play.google.com/store/apps/details?id=com.joeyco.joeys" class="link"></a></div>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-4">
					<div class="row col_wrap align-items-center">
						<div class="col-4 title">Follow us</div>
						<div class="col-8 cnt social_icons">
							<ul class="no-list d-flex align-items-center">
								<li><a href="https://www.youtube.com/channel/UCauaDnpXwVi41stZIuzmBMA" target="_blank"><i class="icofont-youtube"></i></a></li>
								<li><a href="https://twitter.com/joeyco_inc?lang=en" target="_blank"><i class="icofont-twitter"></i></a></li>
								<li><a href="https://ca.linkedin.com/company/joeyco" target="_blank"><i class="icofont-linkedin"></i></a></li>
								<li><a href="https://www.instagram.com/joeyco.ca/?hl=en" target="_blank"><i class="icofont-instagram"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row-2 mb-align-center">
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-3">
					<div class="logo">
						<img src="{{asset('/')}}images/logo-joeyco-dark.png" alt="">
					</div>
					<div class="support_btns mt-10">
						<a href="https://merchant.joeyco.com/" class="btn btn-white btn-xs btn-border full-w">Register Now</a>
						<a href="https://joey.joeyco.com/" class="btn btn-white btn-xs btn-border full-w">Become A Joey</a>
					</div>
					<p class="bc1-light small pt-10">
{{--						100 - 16 Four Seasons Pl<br/>--}}
{{--						Etobicoke, M9B 6E5<br/>--}}
{{--						<a href="tel:+18555961833">(855) 596-1833</a><br/>--}}
						<a href="mailto:info@joeyco.com">info@joeyco.com</a>
					</p>
				</div>
{{--				<div class="col-12 col-sm-3">--}}
{{--					<h4 class="title color-white">Business Solutions</h4>--}}
{{--					<nav class="footer_nav">--}}
{{--						<ul class="no-list">--}}
{{--							<li><a href="{{route('serviceDetail')}}">Retail to Customer</a></li>--}}
{{--							<li><a href="{{route('serviceDetail')}}">Home Delivery</a></li>--}}
{{--							<li><a href="{{route('serviceDetail')}}">Returns & Reverse Logistics</a></li>--}}
{{--							<li><a href="{{route('serviceDetail')}}">Local Same-Day</a></li>--}}
{{--							<li><a href="{{route('serviceDetail')}}">Scheduled Delivery</a></li>--}}
{{--							<li><a href="{{route('serviceDetail')}}">Same day</a></li>--}}
{{--							<li><a href="{{route('serviceDetail')}}">On-Demand Delivery</a></li>--}}
{{--							<li><a href="{{route('serviceDetail')}}">Warehouse to Consumer</a></li>--}}
{{--							<li><a href="{{route('serviceDetail')}}">Mid mile and Last mile</a></li>--}}
{{--							<li><a href="{{route('serviceDetail')}}">On-Demand Warehousing</a></li>--}}
{{--							<li><a href="{{route('serviceDetail')}}">Big and Bulky</a></li>--}}
{{--						</ul>--}}
{{--					</nav>--}}
{{--				</div>--}}
				<div class="col-12 col-sm-3 ml-2">
					<h4 class="title color-white">Industries</h4>
					<nav class="footer_nav">
						<ul class="no-list">
						<li><a href="{{route('industries')}}">Grocery</a></li>
						<li><a href="{{route('industries')}}">Retail & Luxury</a></li>
						<li><a href="{{route('industries')}}">eCommerce</a></li>
						<li><a href="{{route('industries')}}">Restaurants</a></li>
						<li><a href="{{route('industries')}}">Pharmacy</a></li>
{{--						<li><a href="{{route('industries')}}">Flowers</a></li>--}}
{{--						<li><a href="{{route('industries')}}">Apparel</a></li>--}}
						</ul>
					</nav>
				</div>
				<div class="col-12 col-sm-3">
					<h4 class="title color-white">About JoeyCo</h4>
					<nav class="footer_nav">
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

		<div class="container">
			<div class="copyright">&copy; <?php echo date("Y") ?> JoeyCo <!--<span class="divider">|</span> <a href="{{route("privacy")}}">Sitemap</a>--><span class="divider">|</span> <a href="{{route("privacy")}}">Privacy Policy</a><span class="divider">|</span><a href="{{route("terms")}}">Terms of Use</a></div>
		</div>
	</div>
</footer>

