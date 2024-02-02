        @extends('includes.layout')
        @section('content')
        <main id="main" class="page-home">
            @include('includes.clientHeader')
		<div class="inner-page">
			<div id="main_banner" class="section-skew style2">
				<div class="container">
					<div class="hgroup page_heading align-center">
						<h1 class="main_heading">Drive with <span class="basecolor2">JoeyCo</span></h1>
						<h3 class="sub_heading">In just a few easy steps, you’ll be cruising towards making extra money. It’s a flexible opportunity that you can customize to fit your lifestyle.</h3>
					</div>
				</div>
			</div>

			<section class="section nopadding bc1-lightester-bg">
				<div class="container">
					<div class="become_joey_form">
						<div class="row1">
							<div class="hgroup align-center seperator_center seperator_basecolor1">
								<h3>Become A Joey</h3>
								<p>Join a vibrant community of independent Riders</p>
							</div>
							<form action="" id="step1-form" class="needs-validation" novalidate>
								<div class="form-row merge-fields">
									<div class="form-group style2 col-6 no-min-h">
										<input type="text" class="form-control form-control-lg" placeholder="First name" name="color" required>
									</div>
									<div class="form-group style2 col-6 no-min-h">
										<input type="text" class="form-control form-control-lg" placeholder="Last name" name="color" required>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group style2 col-12 no-min-h">
										<input type="email" class="form-control form-control-lg" placeholder="Email" name="color" required>
									</div>
									<div class="form-group style2 col-12 no-min-h">
										<input type="tel" class="form-control form-control-lg" placeholder="Phone number" name="color" required>
									</div>
									<div class="form-group style2 col-12 no-min-h">
										<input type="password" class="form-control form-control-lg" placeholder="Password" name="color" required>
									</div>
								</div>

								<div class="signup_buttons_wrap align-center">
									<a href="{{route('become-joey-success')}}" class="btn btn-primary btn-lg col-6 nomargin uppercase">SIGN UP</a>
								</div>
							</form>
						</div>
						<div class="row2">
							<div class="signin_row align-center">
								<span class="bold">Already have an account?</span> <a href="#" class="btn btn-white btn-sm ml-10">SIGN IN</a>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
          @include('includes.clientFooter')
        </main>
        @endsection
