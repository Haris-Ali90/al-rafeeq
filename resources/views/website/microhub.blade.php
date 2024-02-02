@extends('includes.layout')

@section('title', 'Manage your own micro-hub and earn money')
@section('content')

    <style>
        input.form-control.form-control-lg {
            text-transform: inherit !important;
        }
    </style>
    <main id="main" class="page-home">
        @include('includes.clientHeader')

        <div class="modal fade bd-example-modal-lg" id="demoJoeyApp" tabindex="-1" role="dialog" aria-labelledby="demoJoeyAppTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">JoeyCo - We Deliver You Relax</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="video_frame">
                            <video id="myVideo" width="100%" height="400px" controls>
                                <source src="/images/joeyco-video.mp4" type="video/mp4">
                                Your browser does not support HTML5 video.
                            </video>
                            <div class="play_overlay cursor-pointer">
                                <i class="icofont-ui-play play_icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-sm submitButton" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="microhub-page">
            <div id="main_banner" class="withform">
                <div class="container">
				@if (session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{ session('message') }}
                        </div>
                    @endif
					@if (session()->has('message-failed'))
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                {{ session('message-failed') }}
                            </div>
                        @endif
                    <div class="row align-items-center">
                        <div class="col-12 col-sm-5 mb-align-center">
                            <div class="hgroup page_heading">
                                <h1 class="main_heading">Earn money by utilizing your space with JoeyCo</h1>
                                <h3 class="banner_paragraph bf-color mt-20 light">
                                    JoeyCo is now giving you an opportunity to earn extra income by utilizing your extra space. Your empty space is going to be our next micro-hub for orders.
                                </h3>
                            </div>

                            <button class="moveToSection btn btn-bc1lightest mb-20" data-target="#howItWorks">How it works</button>
                        </div>
                        <div class="col-12 col-sm-7">
                            <div class="col-md-12 col-12 marginauto">
                                <div class="box-style-2 sm">
                                    <h3>Request a callback</h3>
                                    <form method="POST" action="<?=route("microhub-manager.post")?>" id="microHubForm" class="needs-validation row" novalidate>
                                        @csrf
                                        <div class="form-group no-min-h col-md-6">
                                            <input required type="text" placeholder="John Doe" name="full_name" class="form-control form-control-lg"/>
                                        </div>
                                        <div class="form-group no-min-h col-md-6">
                                            <input required type="email" placeholder="abc@example.com" name="email_address" class="form-control form-control-lg"/>

                                            <input type="hidden" id="address2" name="street"/>
                                            <input type="hidden" id="locality" name="city"/>
                                            <input type="hidden" id="state" name="state"/>
                                            <input type="hidden" id="postcode" name="postcode"/>
                                            <input type="hidden" id="country" name="country"/>
                                            <input type="hidden" id="latitude" name="latitude"/>
                                            <input type="hidden" id="longitude" name="longitude"/>
                                        </div>

                                        <div class="form-group no-min-h col-md-6">
                                            <input required type="text" placeholder="+1 604 555 5555" name="phone_no" class="form-control form-control-lg"/>
                                        </div>
                                        <div class="form-group no-min-h col-md-6">
                                            <input  id="ship-address" name="address" required autocomplete="off"  placeholder="Your address" class="form-control form-control-lg"/>
                                        </div>
                                        <div class="form-group no-min-h col-md-6">
                                            <input required type="text" placeholder="120 sqft" name="area_radius" class="form-control form-control-lg"/>
                                        </div>



                                        <label class="col-md-12 custom_labl">Personal Detail</label>
                                        <div class="form-group no-min-h col-md-6">
                                            <input  id="ship-address2" name="address22" required autocomplete="off"  placeholder="Your address" class="form-control form-control-lg"/>
                                        </div>
                                        <div class="form-group no-min-h col-md-6">
                                            <input required type="text" placeholder="+1 604 555 5555" name="phone_no2" class="form-control form-control-lg"/>
                                        </div>

                                        <input type="hidden" id="address22" name="street2"/>
                                        <input type="hidden" id="locality2" name="city2"/>
                                        <input type="hidden" id="state2" name="state2"/>
                                        <input type="hidden" id="postcode2" name="postcode2"/>
                                        <input type="hidden" id="country2" name="country2"/>
                                        <input type="hidden" id="latitude2" name="latitude2"/>
                                        <input type="hidden" id="longitude2" name="longitude2"/>



                                        <div class="form-group no-min-h  col-md-12">
                                            <label>I will manage my own riders (Joeys)</label>
                                            <div class="custom-radio form-radio custom-control-inline">
                                                <input checked class="form-radio-input" type="radio" name="own_joeys" id="yes" value="1">
                                                <label class="form-radio-label mb-0" for="yes">Yes</label>
                                            </div>
                                            <div class="custom-radio form-radio custom-control-inline">
                                                <input class="form-radio-input" type="radio" name="own_joeys" id="no" value="0">
                                                <label class="form-radio-label mb-0" for="no">No</label>
                                            </div>
                                        </div>


                                        <div class="divider xs"></div>
                                        <button type="submit" class="submitButtonAjax btn btn-lg btn-basecolor1 full-w">Request a callback</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="section bg-white section-padding-xxl bg_right_half half-bg right bg_microhubmanager">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-6 col-md-6">
                            <div class="hgroup">
                                <h2 class="mb-20">JoeyCo gives you the ability to earn more by using our comprehensive system.</h2>
                                <p>The JoeyCo platform seamlessly integrates with online stores and sales channels, providing access to a nationwide network that powers fast, reliable, omnichannel fulfillment.</p>
                            </div>
                            <h6 class="bf-color">What Makes JoeyCo Different?</h6>
                            <ul class="no-list listWithIcons">
                                <li><i class="icofont-box"></i> <span class="bold">Order Management</span></li>
                                <li><i class="icofont-chart-bar-graph"></i> <span class="bold">Inventory Planning</span></li>
                                <li><i class="icofont-network"></i> <span class="bold">Network Optimization</span></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </section>

            <section class="section bg-white section-padding-xxl bg_right_half half-bg left bg_microhubmanager">
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-12 col-lg-6 col-md-6 add_space">
                            <div class="hgroup">
                                <h2 class="mb-20">Streamline your shipping process with JoeyCo Logistics Mi-Hub and Driver services.</h2>
                                <p>JoeyCo Logistics provides "Mi-Hub and Driver" services to help businesses grow and succeed by streamlining the delivery process, reducing shipping costs, and improving customer experience.</p>
                            </div>
                            <h6 class="bf-color">What We Offer</h6>
                            <ul class="no-list listWithIcons">
                                <li><i class="icofont-box"></i> <span class="bold">Drivers Management</span></li>
                                <li><i class="icofont-chart-bar-graph"></i> <span class="bold">Finance Support</span></li>
                                <li><i class="icofont-network"></i> <span class="bold">Routing Management</span></li>
                                <li><i class="icofont-network"></i> <span class="bold">OTD Reports</span></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </section>

            <section class="section  section-padding-lg white-bg border-top brd-bc1-lightest overflow-hidden">
                <div class="container md">
                    <div class="hgroup seperator_center align-center">
                        <h2 class="lh-11"><small class="dp-block">Being a warehouse owner</small> How much you can earn?</h2>
                        <p class="mt-10 small">Earning for the warehouse owner calculates based on multiple factors, eg: frequency of orders, returns, capacity, delivery time, etc</p>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-12 align-center">
                            <p class="nomargin">Estimated earning</p>
                            <h2>$<span id="earningAmount">1,500</span>/day</h2>
                            <p class="f11 bc1-light">Terms and conditions aply</p>
                        </div>
                        <div class="col-lg-9 col-md-4 col-12">
                            <input type="text" class="order_range_slider" name="my_range" value="" />
                        </div>
                    </div>
                </div>
            </section>


            <section id="howItWorks" class="section_process section section-padding-xl bc1-lightester-bg">
                <div class="container">
                    <div class="hgroup align-center">
                        <h2>How it Works?</h2>
                    </div>

                    <div class="row no-gutter">
                        <div class="col-12 col-cs-5">
                            <div class="process_box align-center">
                                <div class="icon_wrap"><div class="icon"><i class="icofont-phone"></i></div></div>
                                <div class="h5 title">Request a callback</div>
                                <div class="cnt f15 lh-16">Fill the form above to place a callback request. Our advisor will contact you within 24-48 hours.</div>
                            </div>
                        </div>
                        <div class="col-12 col-cs-5">
                            <div class="process_box align-center">
                                <div class="icon_wrap"><div class="icon"><i class="icofont-google-map"></i></div></div>
                                <div class="h5 title">Plan our visit</div>
                                <div class="cnt f15 lh-16">Visit is the required step for approval process, please cordinate with advisor.</div>
                            </div>
                        </div>
                        <div class="col-12 col-cs-5">
                            <div class="process_box align-center">
                                <div class="icon_wrap"><div class="icon"><span class="sprite-60-application"/></div></div>
                                <div class="h5 title">Documents Submission</div>
                                <div class="cnt f15 lh-16">Submit your documents in order to get approval, It takes take usually 1 week.</div>
                            </div>
                        </div>
                        <div class="col-12 col-cs-5">
                            <div class="process_box align-center">
                                <div class="icon_wrap"><div class="icon"><span class="sprite-60-verification"/></div></div>
                                <div class="h5 title">Get Approval</div>
                                <div class="cnt f15 lh-16">One your documents have been verified, you will receive the confirmation email from JoeyCo.</div>
                            </div>
                        </div>
                        <div class="col-12 col-cs-5">
                            <div class="process_box align-center">
                                <div class="icon_wrap"><div class="icon"><span class="sprite-60-done"/></div></div>
                                <div class="h5 title">You’re done</div>
                                <div class="cnt f15 lh-16">Congratulations, You are good to manage your micro-hub.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="section section_industries bc1-lightester-bg brd-top brd-bc1-lighter">
                <div class="container">
                    @include('includes.industry')
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
                                    You name it, you got it. From groceries to dry cleaning and everything in between, if it’s in a store or restaurant in your city, we can deliver it.
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

        {{-- @stop --}}
        @include('includes.clientFooter')


        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&sensor=false&key=AIzaSyBX0Z04xF9br04EGbVWR3xWkMOXVeKvns8"></script>
        <script src="js/ion.rangeSlider.min.js"></script>
        <script type="text/javascript">
            google.maps.event.addDomListener(window, 'load', function () {
                var places = new google.maps.places.Autocomplete(document.getElementById('ship-address'));
                google.maps.event.addListener(places, 'place_changed', function () {
                    var place = places.getPlace();
                    var address = place.formatted_address;
                    var latitude = place.geometry.location.lat();
                    var longitude = place.geometry.location.lng();
                    var latlng = new google.maps.LatLng(latitude, longitude);
                    var geocoder = geocoder = new google.maps.Geocoder();
                    geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            if (results[0]) {
                                var address = results[0].formatted_address;
                                var pin = results[0].address_components[results[0].address_components.length - 1].long_name;
                                var country = results[0].address_components[results[0].address_components.length - 2].long_name;
                                var state = results[0].address_components[results[0].address_components.length - 3].long_name;
                                var city = results[0].address_components[results[0].address_components.length - 4].long_name;

                                console.log(latitude)
                                console.log(longitude)
                                console.log(address)
                                console.log(pin)
                                console.log(country)
                                console.log(state)
                                console.log(city)

                                document.getElementById('address2').value = address;
                                document.getElementById('country').value = country;
                                document.getElementById('locality').value = city;
                                document.getElementById('state').value = state;
                                document.getElementById('postcode').value = pin;
                                document.getElementById('latitude').value = latitude;
                                document.getElementById('longitude').value = longitude;

                            }
                        }
                    });
                });


            });
        </script>


        <script type="text/javascript">
            google.maps.event.addDomListener(window, 'load', function () {
                var places = new google.maps.places.Autocomplete(document.getElementById('ship-address2'));
                google.maps.event.addListener(places, 'place_changed', function () {
                    var place = places.getPlace();
                    var address = place.formatted_address;
                    var latitude = place.geometry.location.lat();
                    var longitude = place.geometry.location.lng();


                    var latlng = new google.maps.LatLng(latitude, longitude);
                    var geocoder = geocoder = new google.maps.Geocoder();
                    geocoder.geocode({ 'latLng': latlng }, function (results, status) {


                        if (status == google.maps.GeocoderStatus.OK) {
                            if (results[0]) {
                                var address = results[0].formatted_address;
                                var pin = results[0].address_components[results[0].address_components.length - 1].long_name;
                                var country = results[0].address_components[results[0].address_components.length - 2].long_name;
                                var state = results[0].address_components[results[0].address_components.length - 3].long_name;
                                var city = results[0].address_components[results[0].address_components.length - 4].long_name;

                                console.log(latitude)
                                console.log(longitude)
                                console.log(address)
                                console.log(pin)
                                console.log(country)
                                console.log(state)
                                console.log(city)

                                document.getElementById('address22').value = address;
                                document.getElementById('country2').value = country;
                                document.getElementById('locality2').value = city;
                                document.getElementById('state2').value = state;
                                document.getElementById('postcode2').value = pin;
                                document.getElementById('latitude2').value = latitude;
                                document.getElementById('longitude2').value = longitude;

                            }
                        }
                    });
                });


            });
        </script>
    </main>

@endsection



