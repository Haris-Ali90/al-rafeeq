
        @extends('includes.layout')
        @section('content')
        <main id="main" class="page-home">
                  @include('includes.clientHeader')


		<div class="inner-page">
			<div id="main_banner" class="section-skew style2">
				<div class="container">
					<div class="hgroup page_heading align-center">
						<h1 class="main_heading">Drive with <span class="basecolor2">JoeyCo</span></h1>
						<h3 class="sub_heading2">In just a few easy steps, you’ll be cruising towards making extra money. It’s a flexible opportunity that you can customize to fit your lifestyle.</h3>
					</div>
				</div>
			</div>

			<section class="section nopadding bc1-lightester-bg">
				<div class="container">
					<div class="become_joey_form success">
						<div class="row1 no-bg">
							<div class="icon"><img src="{{asset('/')}}images/success_icon.png" alt=""></div>
							<div class="cnt align-center">
								<div class="hgroup">
									<h3>Registration Successful</h3>
									<p>Congratulations! You’ve successfully registered as <strong class="basecolor1">Joey</strong>. </p>
								</div>
								<p>We’ve send you a confirmation link at <a href="mailto:youremail@gmail.com">youremail@gmail.com</a>. Please take a moment to confirm your email</p>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
          @include('includes.clientFooter')
        </main>
@endsection

