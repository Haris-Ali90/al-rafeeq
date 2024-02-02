<img src="{{asset('/')}}images/under-maintenance.png" alt="" style="width: 100%; height: 100vh">
{{--
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
                        <li><a href="#">Track Order</a></li>
                    </ul>
                </div>
            </div>

            <div class="heading_area">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-8 col-md-6">
                            <h1 class="main_heading">Sorry, No order found</h1>
                            <p>We're sorry, you've entered incorrect tracking id. Please enter the correct tracking id below.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <form action="{{route('track-Order')}}" method="GET"  class="needs-validation" novalidate>
                            @csrf
                            <div class="form-group no-min-h">
                                <label>Please enter your tracking id</label>
                                <input type="text" placeholder="JCY-10909202222" class="form-control form-control-lg" value="{{$track_id}}" name="trackingId" required>
                            </div>
                            <div class="track_btn_wrap">
                                <button tpe="submit"  class="btn btn-primary submitButton">Track</button>
                                --}}
{{-- <button type="submit" onclick="location.href = 'track-order.php';" class="btn btn-bc1lightest no-hover submitButton no-shadow">Track</button> --}}{{--

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>


       	@include('includes.clientFooter')
    </main>
--}}
