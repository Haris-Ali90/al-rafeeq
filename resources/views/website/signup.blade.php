        @extends('includes.layout')
        @section('content')
        <main id="main" class="page-home">
            @include('includes.clientHeader')
		<div class="inner-page">
			<div id="main_banner" class="section-skew style3">
				<div class="container">
					<div class="hgroup page_heading align-center">
						<h1 class="main_heading">Join <span class="basecolor2">JoeyCo</span> today!</h1>
						<h3 class="sub_heading">In just a few easy steps, you’ll be cruising towards making extra money. It’s a flexible opportunity that you can customize to fit your lifestyle.</h3>
					</div>
				</div>
			</div>

			<section class="section nopadding bc1-lightester-bg">
				<div class="container">
					<div class="become_joey_form">
						<div class="row1">
							<div class="hgroup align-center seperator_center seperator_basecolor1">
								<h3>Become a Customer</h3>
								</div>
                                <form method="POST" id="step1-form" class="needs-validation" action="{{ route('register') }}">
                                    @csrf
								<div class="form-row merge-fields">
									<div class="form-group style2 col-6 no-min-h">
										<input type="text" class="form-control form-control-lg @error('first_name') is-invalid @enderror" placeholder="First name" name="first_name"  value="{{ old('first_name') }}" required autocomplete="first_name" autofocus required>
                                        @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

									</div>
									<div class="form-group style2 col-6 no-min-h">
										<input type="text" class="form-control form-control-lg @error('last_name') is-invalid @enderror" placeholder="Last name" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" required>
                                        @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
									</div>
								</div>
								<div class="form-row">
									<div class="form-group style2 col-12 no-min-h">
										<input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" required>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
									</div>
									<div class="form-group style2 col-12 no-min-h">
										<input type="tel" class="form-control form-control-lg @error('phone') is-invalid @enderror" placeholder="Phone number" name="phone"  value="{{ old('phone') }}" required autocomplete="phone"   required>
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
									</div>
									<div class="form-group style2 col-12 no-min-h">
										<input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Password" name="password"  autocomplete="new-password" required>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
									</div>
								</div>

								<div class="signup_buttons_wrap align-center">
									<button type="submit" class="btn btn-primary btn-lg col-6 nomargin uppercase">SIGN UP</button>
								</div>
							</form>
						</div>
						<div class="row2">
							<div class="signin_row align-center">
								<span class="bold">Already have an account?</span> <a href="{{route('login')}}" class="btn btn-white btn-sm ml-10">SIGN IN</a>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
          @include('includes.clientFooter')
        </main>
        @endsection
