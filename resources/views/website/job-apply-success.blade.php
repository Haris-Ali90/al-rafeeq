@extends('includes.layout')
         @section('content')
    <main id="main" class="page-track-order">
	 @include('includes.clientHeader')

    <div class="inner-page">
        <div id="main_banner" class="style2 withBottomBg">
            <div class="breadcrumb">
                <div class="container">
                    <ul>
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="#">Careers</a></li>
                    </ul>
                </div>
            </div>

            <div class="heading_area">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-8 col-md-6">
                            <h1 class="main_heading">Thank You</h1>
                            <p>Your application has been received successfully.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <h4>Thank you for applying at JoeyCo.</h4>
                        <p>Your application has been received successfully. Our representative will be contacting you soon.</p>
                        <a href="{{url('/')}}" class="btn btn-primary">Back to Home</a>
                    </div>
                </div>
            </div>
        </section>
    </div>


       	@include('includes.clientFooter')
    </main>
