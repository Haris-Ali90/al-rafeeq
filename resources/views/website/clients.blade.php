@extends('includes.layout')

@section('content')
    <main id="main" class="page-serviceDetail">
        @include('includes.clientHeader')

        @include('includes.bookDemo')

        <div class="inner-page">

            <section class="section white-bg" style="border-bottom: solid 1px #eae6e4;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-sm-6  mb-align-center mb-gap">
                            <div class="hgroup d_gap">
                                <h2 class="mb-10">Expand Your Business</h2>
                                <h3 class="h4 regular bf-color">We offer our service 7 days a week with completely customizable pickup schedules.</h3>
                            </div>
                            <p> JoeyCo provides last mile services from your retail locations or warehouses across the country. <span style="float: left;">Take control of your shipments with our shipment status API and never be left in the dark with our live shipment notifications.</span></p>
                            <h4 class="benifits_heading">We Are Supporting:</h4>
                            <ul class="benifits_list">
                                <li><span>1) </span>Small Business</li>
                                <li><span>2) </span>Medium Business</li>
                                <li><span>3) </span>Enterprise Business</li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <img src="{{asset('/')}}images/business.png" alt="">
                        </div>
                    </div>
                </div>
            </section>

            <section class="section section_clints section-padding-xl bc1-lightester-bg">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-md-6 col-12 ">
                            <div class="postBox" data-aos="fade-right">
                                <img src="{{asset('/')}}images/small-business.jpg">
                            </div>
                        </div>
                        <div class="col-md-6 col-12 mb-align-center mb-gap">
                            <div class="contentBox" data-aos="fade-left">
                                <div class="hgroup">
                                    <h2 class="mb-10">Small business</h2>
                                    <h3 class="h4 regular bf-color">Are you a Small-sized Business looking for a reliable and efficient logistics partner?</h3>
                                </div>
                                <p> Access to our client portal for all your order creation and label printing needs.
                                    <span style="float: left;">Track your shipments in real-time with JoeyCo Logistics: the solution for businesses looking to improve their delivery processes.</span>
                                </p>
                                <div class="action">
                                    <a href="#" class="btn btn-secondary full-w">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section section_clints section-padding-xl bg-white">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-12  mb-align-center mb-gap">
                            <div class="contentBox" data-aos="fade-up-right">
                                <div class="hgroup">
                                    <h2 class="mb-10">Medium Business</h2>
                                    <h3 class="h4 regular bf-color">JoeyCo provides last mile services from your retail locations or warehouses across the country.</h3>
                                </div>
                                <p>JoeyCo offers same-day, scheduled, and on-demand delivery solutions to meet growing online customer demand expectations.</p>
                                <div class="action">
                                    <a href="#" class="btn btn-primary full-w">Read More</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="postBox"  data-aos="fade-up-left">
                                <img src="{{asset('/')}}images/medium-business.jpg">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section section_clints section-padding-xl bc1-lightester-bg">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-12  mb-align-center mb-gap">
                            <div class="postBox"  data-aos="fade-down-right">
                                <img src="{{asset('/')}}images/enterprise-business.jpg">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="contentBox" data-aos="fade-down-left">
                                <div class="hgroup">
                                    <h2 class="mb-10">Enterprise Business</h2>
                                    <h3 class="h4 regular bf-color">JoeyCo provides API and EDI integration options to streamline communication.</h3>
                                </div>
                                <p> Enterprise clients have the ability to track in real-time the status of all their shipments.
                                    JoeyCo can pick up from your retail locations or warehouses across the country.
                                    We provides white labeling solutions for your customer's tracking page and gives you the ability to customize and trailer our solutions to your needs.
                                    You deserve a delivery partner that can keep up with the demand for your products and services.</p>
                                <div class="action">
                                    <a href="#" class="btn btn-secondary full-w">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section section_overview section-padding-xl bc1-lightest-bg">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-5 col-sm-6  mb-align-center mb-gap">
                            <div class="hgroup mb-align-center">
                                <h2 class="h1 mb-10">Delivery Solutions Tailored For You</h2>
                                <h4 class="regular bf-color">We have the right product for you.</h4>
                            </div>
                            <div class="list">
                                <ul class="list-check">
                                    <li>Real time instant quote with no hidden charges</li>
                                    <li>Quick, easy-to-use online booking to save you time and money</li>
                                    <li>Access a national network of trusted Joeys which are trained to handle your product and know what your customers are looking for.</li>
                                    <li>Custom-built mobility solutions for diverse sectors: Real time tracking for both yourself and your clients. You now know exactly who and where your package is</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-lg-7 col-sm-6">
                            <img src="https://www.joeyco.com/images/home_solution.png" alt="">
                        </div>
                    </div>
                </div>
            </section>

            <section class="faqs_section section section-padding-lg white-bg">
                <div class="container md">
                    <div class="hgroup color-white align-center">
                        <h2>Frequently Asked Questions</h2>
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

        </div>
        @include('includes.clientFooter')
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

        <script>
            AOS.init();
        </script>
        <script>
            function changeImage(anything) {
                document.getElementById('slider').src = anything;
            }
        </script>
    </main>
@endsection
