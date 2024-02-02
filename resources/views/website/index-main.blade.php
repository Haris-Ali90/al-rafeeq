@extends('includes.layout')

@section('title', 'Couriers Delivery Company In Ottawa, Toronto, Montreal')
@section('description', "If you are looking for a fast courier company in Ottawa, Canada? Which can give you same day home delivery service. So Joyco brings to you fast and same day delivery service. For more information call @ (855) 596-1833")
@section('metaTitle', "Couriers Delivery Company In Ottawa, Toronto, Montreal | JoeyCo")
@section('keywords', "Amazon Courier, Amazon Couriers, Amazon Deliveries, Amazon Delivery Canada, Courier Companies, Courier Companies Ottawa, Courier Companies Toronto, Courier Near Me, Courier Toronto, Delivery Companies Toronto, Delivery Flowers Toronto, Flower Delivery Near Me, Flowers Delivery In Toronto, Flowers Delivery Montreal, Flowers Delivery Ottawa, Walmart Online Grocery Shopping, Medication Delivery, Food Deliveries Near Me, Food Delivery Apps, Groceries Delivery Montreal, Home Delivery Food, Home Delivery Food Near Me, Home Delivery Grocery Near Me, Home Delivery Near Me, Medicine Delivery, Medicine Delivery Near Me, Mothers Day Flowers, Online Grocery, Order Flowers, Order Flowers Online, Ottawa Courier, Ottawa Deliveries, Ottawa Flower Delivery, Pharmacy Delivery Near Me, Send Flowers Montreal, Send Flowers Online, Send Flowers Ottawa, Send Flowers Toronto")

@section('content')
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
                        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="home-page">
            <div id="main_banner" class="banner_home">
                <div class="container">
                    <div class="canada_stamp d-none d-sm-block">
                        <img src="{{asset('/')}}images/canada-stamp.gif" alt="">
                    </div>
                    <div class="row align-items-center">
                        <div class="col-12 col-sm-6 mb-align-center" data-aos="fade-up">
                            <div class="hgroup page_heading">
                                <h1 class="main_heading">Think Delivery. Think Joey</h1>
                                <h2 class="sub_heading">Power-up your business with JoeyCo’s delivery solutions. You schedule, we deliver!</h2>
                                <h3 class="banner_paragraph bf-color mt-20 light">JoeyCo offers, on-demand, same-day, next-day, province wide and even coast to coast delivery solutions for online retailers.</h3>
                            </div>
                            <div class="actions d-block d-sm-flex align-items-center">
                                <a href="{{route('register')}}" class="watch_video_btn play-video has_thumb" data-toggle="modal" data-target="#demoJoeyApp">
                                    <!-- <i class="icofont-ui-play"></i> -->
                                    <div class="thumbnail"><img src="{{asset('/')}}images/video_thumb.jpg" alt=""></div>
                                    Watch Video <span>00:49</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="section white-bg">
                <div class="container sm">
                    <div class="hgroup align-center">
                        <h2 class="">The Story of JoeyCo</h2>
                        <h2 class="light">Our values are at the core of everything we do</h2>
                    </div>
                    <div class="align-center">
                        <p>Joeys, the couriers, the supporting staff and even the leadership team. We are all Joeys, helping one another grow and learn. Our suite of mobile apps and integrated systems unlock even more jobs and opportunities for Joeys. A company of Joeys, hence “JoeyCo”.</p>
                    </div>
                </div>
            </section>

            <section class="section section_clints section-padding-xl bc1-lightester-bg">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-md-6 col-12">
                            <div class="postBox" data-aos="fade-right">
                                <img src="{{asset('/')}}images/clients.png">
                            </div>
                        </div>
                        <div class="col-md-6 col-12 mb-align-center mb-gap">
                            <div class="contentBox" data-aos="fade-left">
                                <div class="hgroup">
                                    <h2 class="mb-10">Empower your business</h2>
                                    <h3 class="h4 regular bf-color">Are you a Small Medium-sized Business looking for a reliable and efficient logistics partner? Look no further.</h3>
                                </div>
                                <p> JoeyCo provides white labeling solutions for your customer's tracking page and gives you the ability to customize and trailer our solutions to your needs.
                                    You deserve a delivery partner that can keep up with the demand for your products and services</p>
                                <div class="action">
                                    <a href="client" class="btn btn-secondary full-w">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section section_clints section-padding-xl bg-white">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-12 mb-align-center  mb-gap">
                            <div class="contentBox" data-aos="fade-up-right">
                                <div class="hgroup">
                                    <h2 class="mb-10">Earn With Us</h2>
                                    <h3 class="h4 regular bf-color">Own your Neighborhood with your own Micro-hub become an owner today.</h3>
                                </div>
                                <p>JoeyCo offers customers the opportunity to earn extra income by utilizing their empty space as a micro-hub for orders. They offer unlimited earning potential at their own hours, 3 months of free subscription, and financing options.</p>
                                <div class="action">
                                    <a href="microhub-manager" class="btn btn-primary full-w">Read More</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="postBox"  data-aos="fade-up-left">
                                <img src="{{asset('/')}}images/mi-hub.png">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section section_clints section-padding-xl bc1-lightester-bg">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-12 mb-align-center mb-gap">
                            <div class="postBox"  data-aos="fade-down-right">
                                <img src="{{asset('/')}}images/joey_banner2.png">
                            </div>
                        </div>
                        <div class="col-md-6 col-12 mb-align-center">
                            <div class="contentBox" data-aos="fade-down-left">
                                <div class="hgroup">
                                    <h2 class="mb-10">Become A Courier Partner</h2>
                                    <h3 class="h4 regular bf-color">Join the fleet, we help each other and we enable businesses to connect with customers in a new way - by delivering products and services directly to their door.</h3>
                                </div>
                                <p> We deliver a stable job with flexibility...and you deliver the orders. Join a supportive community of independent riders and enjoy flexible hours & competitive earnings. The more orders you deliver, the bigger your bonus! You'll receive your tips as part of your payslip.</p>
                                <div class="action">
                                    <a href="joey" class="btn btn-secondary full-w">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section section_clints bc1-lightest-bg">
                <div class="container">
                    <div class="navigation">
                        <div class="navArea mb-align-center" data-aos="zoom-in-down">
                            <div class="contentBox">
                                <div class="hgroup">
                                    <h2 class="mb-10">Our Expertise</h2>
                                </div>
                            </div>
                            <ul>
                                <li>
                                    <a onmouseenter="changeImage('{{asset('/')}}images/services/last-mile-delivery.jpg')">Last Mile Delivery</a>
                                </li>
                                <li>
                                    <a onmouseenter="changeImage('{{asset('/')}}images/services/customer-tracking.jpg')">Customer Tracking</a>
                                </li>
                                <li>
                                    <a onmouseenter="changeImage('{{asset('/')}}images/services/operations.jpg')">Operations</a>
                                </li>
                                <li>
                                    <a onmouseenter="changeImage('{{asset('/')}}images/services/insurance.jpg')">Insurance</a>
                                </li>
                                <li>
                                    <a onmouseenter="changeImage('{{asset('/')}}images/services/customers-supports.jpg')">Customers Supports</a>
                                </li>
                                <li>
                                    <a onmouseenter="changeImage('{{asset('/')}}images/services/prrof-delivery.jpg')">Prof Of Delivery</a>
                                </li>
                            </ul>
                        </div>
                        <div class="imgArea" data-aos="zoom-in-left">
                            <div class="img-overlay" style=""></div>
                            <img src="{{asset('/')}}images/services/last-mile-delivery.jpg" alt="" id="slider">
                        </div>
                    </div>
                </div>
            </section>

            <section class="section bg-white">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-sm-5" data-aos="flip-up">
                            <div class="hgroup">
                                <h2 class="mb-10">Delivery Coverage Map</h2>
                                <h3 class="h4 regular bf-color">If you're looking for a delivery partner that can provide you with tailored logistics solutions <a href="{{route('contact')}}">get in touch today</a>.</h3>
                            </div>
                            <p>JoeyCo is currently available in Ontario, Quebec, Alberta, Nova Scotia, British Columbia and New Brunswick.</p>
                        </div>
                        <div class="col-sm-7" data-aos="flip-down">
                            <img src="{{asset('/')}}images/coverage_map.png" alt="">
                        </div>
                    </div>
                </div>
            </section>

            <section class="section section-padding-xs section_partners bc1-lightester-bg">
                <div class="container partners_section">
                    <div class="custom_tabs style2">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="partners-tab" data-toggle="tab" href="#partners" role="tab" aria-controls="partners" aria-selected="true">
                                    Trusted Clients
                                </a>
                            </li>
                            {{--							<li class="nav-item">--}}
                            {{--								<a class="nav-link" id="customers-tab" data-toggle="tab" href="#customers" role="tab" aria-controls="customers" aria-selected="false">--}}
                            {{--									Customers--}}
                            {{--								</a>--}}
                            {{--							</li>--}}
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="partners" role="tabpanel" aria-labelledby="partners-tab">
                                <div class="hgroup align-center">
                                    <h4>Place an order with our clients below and a Joey will be delivering it!</h4>
                                </div>
                                <div class="partners_list d-flex align-items-center justify-content-center flex-wrap">
                                    <div class="partner_box"><img src="{{asset('/')}}images/partner_1.png" alt=""></div>
                                    <div class="partner_box"><img src="{{asset('/')}}images/partner_2.png" alt=""></div>
                                    <div class="partner_box"><img src="{{asset('/')}}images/partner_3.png" alt=""></div>
                                    <div class="partner_box"><img src="{{asset('/')}}images/partner_4.png" alt=""></div>
                                    <div class="partner_box"><img src="{{asset('/')}}images/partner_5.png" alt=""></div>
                                    <div class="partner_box"><img src="{{asset('/')}}images/partner_6.png" alt=""></div>
                                </div>
                            </div>
                            {{--							<div class="tab-pane fade" id="customers" role="tabpanel" aria-labelledby="customers-tab">--}}
                            {{--								<div class="hgroup align-center">--}}
                            {{--									<h4>Customers</h4>--}}
                            {{--								</div>--}}
                            {{--								<div class="partners_list d-flex align-items-center justify-content-center flex-wrap">--}}
                            {{--									<div class="partner_box"><img src="{{asset('/')}}images/partner_2.png" alt=""></div>--}}
                            {{--									<div class="partner_box"><img src="{{asset('/')}}images/partner_3.png" alt=""></div>--}}
                            {{--									<div class="partner_box"><img src="{{asset('/')}}images/partner_4.png" alt=""></div>--}}
                            {{--									<div class="partner_box"><img src="{{asset('/')}}images/partner_6.png" alt=""></div>--}}
                            {{--								</div>--}}
                            {{--							</div>--}}
                        </div>
                    </div>
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
                                    You name it, you got it. From grocery to dry cleaning and everything in between, if it’s in a store or restaurant in your city, we can deliver it.
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
                                    <img src="images/profile_img.jpg" alt="">
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
    </main>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>
    <script>
        function changeImage(anything) {
            document.getElementById('slider').src = anything;
        }
    </script>
    {{--<script>--}}
    {{--    jQuery(".menu-list li a").mouseover(function () { // Changes the .image-holder's img src to the src defined in .list a's data attribute.--}}
    {{--        var value = $(this).attr('data-src');--}}
    {{--        jQuery("#section3 .homeimg img").attr("src", value);--}}
    {{--    })--}}

    {{--    jQuery(".menu-list li a").mouseout(function () {--}}
    {{--        jQuery('#section3 .homeimg img').attr("src", "images/Office-Wall-Corporate-Logo-Mockup.png");--}}
    {{--    });--}}

    {{--    function changeImage(anything) {--}}
    {{--        document.getElementById("slider2").src = anything;--}}
    {{--    }--}}

    {{--    var image = ["black"];--}}
    {{--    jQuery(".navArea").hover(function () {--}}
    {{--        var value = $(this).index();--}}
    {{--        hoverContent(value);--}}
    {{--    });--}}
    {{--    function hoverContent(value) {--}}
    {{--        jQuery(".imgArea").removeClass('show');--}}
    {{--        jQuery(".imgArea" + "(" + value + ")").addClass("show");--}}
    {{--        jQuery(".imgArea").removeClass();--}}
    {{--        jQuery(".imgArea").addClass(image[value]);--}}
    {{--    }--}}
    {{--</script>--}}




