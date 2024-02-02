
@extends('includes.layout')
@section('content')
<main id="main" class="page-home">
    @include('includes.clientHeader')
<div class="inner-page">
    <div id="main_banner" class="section-skew style3">
        <div class="container">
            <div class="hgroup page_heading align-center">
                <h1 class="main_heading">Change Password</h1>
            </div>
        </div>
    </div>

    <section class="section nopadding bc1-lightester-bg">
        <div class="container">
            <div class="become_joey_form">
                <div class="row1">
                    <div class="hgroup align-center seperator_center seperator_basecolor1">
                        <p>Please enter you Password and confirm password to reset.</p>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">
                    {{ Session::get('message') }}
                    </div>
                    @endif

                    <form action="{{ route('reset.password.post') }}" method="POST">
                    {{-- <form method="POST" action="{{ route('password.update') }}"> --}}
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group style2 col-12 no-min-h">
                            <input id="email" type="email" placeholder="mail@example.com" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group style2 col-12 no-min-h">
                            <input id="password" placeholder="Enter password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group style2 col-12 no-min-h">
                            <input id="password-confirm" placeholder="Enter confirm password" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="align-center">
                            <button type="submit" disabled class="btn btn-primary submitButton">Reset Password</button>
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