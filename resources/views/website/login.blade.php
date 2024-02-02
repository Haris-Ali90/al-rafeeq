
        @extends('includes.layout')
        @section('content')
        <main id="main" class="page-home">
            @include('includes.clientHeader')
		<div class="inner-page">
			<div id="main_banner" class="section-skew style3">
				<div class="container">
					<div class="hgroup page_heading align-center">
                        <h1 class="main_heading">Login to <span class="basecolor2">JoeyCo</span></h1>
						<h3 class="sub_heading">In just a few easy steps, you’ll be cruising towards making extra money. It’s a flexible opportunity that you can customize to fit your lifestyle.</h3>
					</div>
				</div>
			</div>

			<section class="section nopadding bc1-lightester-bg">
				<div class="container">
					<div class="become_joey_form">
						<div class="row1">
							<div class="hgroup align-center seperator_center seperator_basecolor1">
                                <h3>Login to your account</h3>
								<p>Please enter you email address and password to login.</p>
                            </div>
                            <form method="POST" action="{{ route('login') }}" id="login-form"  class="needs-validation">
                                    @csrf
                                <div class="form-group style2 col-12 no-min-h">
                                    <input type="email" placeholder="mail@domain.com" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="form-group style2 col-12 no-min-h">
                                    <input id="password" placeholder="Enter your password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="align-center">
                                    <button type="submit" disabled class="btn btn-primary submitButton">Login</button>
                                    <p class="mt-20"><a href="{{route('forget.password.get')}}">Lost your password?</a></p>
                                </div>
                            </form>
						</div>
						<div class="row2">
							<div class="signin_row align-center">
								<span class="bold">Don't have an account?</span> <a href="{{route('register')}}" class="btn btn-white btn-sm ml-10">SIGN UP</a>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
          @include('includes.clientFooter')
        </main>
        @endsection