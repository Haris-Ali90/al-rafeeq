@extends('includes.layout')

@section('title', 'Same Day Courier, Flowers and Food Delivery Services Toronto, Ottawa')
@section('description', "If you are looking for fastest delivery service in Ottawa, Toronto,   Canada?   JoeyCo   provides   the   flower   and   food delivery service Toronto, same day grocery delivery and highest-quality courier services. For more visit our site. ")
@section('metaTitle', "Same Day Courier, Flowers and Food Delivery Services Toronto, Ottawa")
@section('keywords', "Amazon Delivery Company, Amazon Same Day Delivery Toronto, Best Courier Service, Best Delivery Montreal, Best Flower Delivery Toronto, Canadian Courier Companies, Cheap Flower Delivery, Christmas Flowers, Courier Service Toronto, Delivery Companies, Delivery Montreal, Delivery Services Toronto, Ecommerce Shipping, Ecommerce Shipping Solutions, Flower Delivery In Toronto, Flower Delivery Montreal, Flower Delivery Ottawa, Flower Delivery Toronto, Flowers Delivery Toronto, Flowers Near Me, Flowers Online, Food Delivery, Food Delivery Montreal, Food Delivery Near Me, Food Delivery Service Toronto, Food Delivery Services, Food Delivery Services Montreal, Groceries Delivery Ottawa, Grocery Delivery Near Me, Home Delivery Meals, Local Delivery Service Toronto, Meal Delivery Service, Montreal Flower Delivery, Montreal Flowers Delivery, Next Day Delivery Canada, Online Flower Delivery, Online Grocery Delivery, Online Grocery Shopping, Online Supermarket, Order Groceries Online, Ottawa Flowers Delivery, Pickup And Delivery Service Toronto, Prescription Delivery, Same Day Courier, Same Day Courier Ottawa, Same Day Courier Service, Same Day Courier Toronto, Same Day Delivery Ottawa, Same Day Flower Delivery, Same Day Flower Delivery Toronto, Same Day Grocery Delivery, Same Day Grocery Delivery Montreal, Subway Delivery, Toronto Delivery Service, Toronto Delivery Services, Toronto Food Delivery Service, Walmart Delivery, Walmart Grocery Delivery, Delivery Companies Ottawa, Delivery Express")
<style type="text/css">
    .section.white-bg .service_box {
        background: transparent;
    }
</style>

@section('title', 'Service')
         @section('content')
         <main id="main" class="page-serviceDetail">
            @include('includes.clientHeader')
            @include('includes.bookDemo')
            <div class="inner-page">
                <div id="main_banner" class="style2 withBottomBg">
                    <div class="breadcrumb">
                        <div class="container">
                            <ul>
                                <li><a href="{{url('/')}}">Home</a></li>
                                <li><a href="#">Services</a></li>
                                {{-- <li><a href="#">Same-day Delivery</a></li> --}}
                            </ul>
                        </div>
                    </div>


                    <div class="heading_area">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-sm-8 col-md-6">
                                    <h1 class="main_heading">Add on-demand delivery platform that scales with the needs of your customers</h1>
                                    <p>Deliver same-day with us for cheaper than next day with them. Contact our sales team to receive a custom quote.</p>
                                    <a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#bookDemo">BOOK A DEMO</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="bc1-lightester-bg">
                   @include('includes.whatWeDo')
                </section>

                <section class="section section_problem_overview white-bg">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-12 col-sm-6 col-md-6">
                                <img src="{{asset('/')}}images/joey.jpg" alt="">
                            </div>
                            <div class="col-12 col-sm-6 col-md-6">
                                <div class="hgroup">
                                    <h2>Solve your toughest delivery problems</h2>
                                </div>
                                <ul class="no-list custom-orderList">
                                    <li class="box d-flex">
                                        <div class="icon"><span class="sprite-48-truck"></span></div>
                                        <div class="info pl-20">
                                            <h3 class="h5 bf-color nomargin">Flexibility</h3>
                                            <p class="light f18">Offering clients with on-demand, same-day or on-demand deliveries across our network. Your clients want your products in their hand, we help make that happen.</p>
                                            <p class="light f18">With our customized pickup schedule, our clients have the ability to choose the best time and location for their pickups. Either from store or a FC, we got you covered.</p>
                                        </div>
                                    </li>
                                    <li class="box d-flex">
                                        <div class="icon"><span class="sprite-48-map"></span></div>
                                        <div class="info pl-20">
                                            <h3 class="h5 bf-color nomargin">Economical</h3>
                                            <p class="light f18">What you see is what you get, no surcharges or accessorial charges a simple flat free pricing based on weight! </p>
                                            <p class="light f18">Offering deliveries at upto 50% of what the other guys charge. Want to know how? Lets Talk! </p>
                                            <p class="light f18">Asset light operations! JoeyCo has been in business for 10 years! We have learnt a thing or two! </p>
                                        </div>
                                    </li>
                                    <li class="box d-flex">
                                        <div class="icon"><span class="sprite-48-joeyuser"></span></div>
                                        <div class="info pl-20">
                                            <h3 class="h5 bf-color nomargin">Reliability</h3>
                                            <p class="light f18">All JoeyCo Delivery Partners go through background checks and training, so you can be confident your items are in good hands from pickup to delivery.</p>
                                            <p class="light f18">Delivering 7 days a week! 365 days a year! The world might pause but our logistic network doesn't!</p>
                                            <p class="light f18">Worlds largest enterprise client trust us and so can you!</p>

                                        </div>
                                    </li>
                                    <li class="box d-flex">
                                        <div class="icon"><span class="sprite-48-hand"></span></div>
                                        <div class="info pl-20">
                                            <h3 class="h5 bf-color nomargin">Place Deliveries Easily</h3>
                                            <p class="light f18">Whether via the app or website or API, place your order on the device that is most convenient for you.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="section section_book_deliver bc1-lightester-bg">
                    <div class="container">
                        <div class="hgroup align-center">
                            <h2>How to Book a Delivery</h2>
                            <p>Get instant quotes from the app or website, and book an order in less than a minute. We’ll match you with a reliable delivery partner who will pickup and drop off your items in less than an hour.</p>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-12 col-sm-6 col-md-6">
                                <div class="screenshot align-center">
                                    <img src="{{asset('/')}}images/bookdeliver_1.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6">
                                <div class="book_delivery_process">
                                    <ul class="no-list">
                                        <li class="active d-flex align-items-center">
                                            <div class="index">1</div>
                                            <div class="info_wrap">
                                                <div class="title">Enter pickup location, drop-off destination(s)</div>
                                                <div class="info">Enter pickup location, drop-off destination(s)</div>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <div class="index">2</div>
                                            <div class="info_wrap">
                                                <div class="title">Select a vehicle that fits your delivery needs</div>
                                                <div class="info">Select a vehicle that fits your delivery needs</div>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <div class="index">3</div>
                                            <div class="info_wrap">
                                                <div class="title">Enter delivery instructions in the notes section</div>
                                                <div class="info">Enter delivery instructions in the notes section</div>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <div class="index">4</div>
                                            <div class="info_wrap">
                                                <div class="title">Choose your payment method and submit order</div>
                                                <div class="info">Choose your payment method and submit your order</div>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <div class="index">5</div>
                                            <div class="info_wrap">
                                                <div class="title">Track your order with live-tracking</div>
                                                <div class="info">Track your order with live-tracking</div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="action">
                                        <a href="#" data-toggle="modal" data-target="#bookDemo" class="btn btn-basecolor1 btn-lg">LET'S TRY</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="section section_industries white-bg">
                    <div class="container">
                    @include('includes.industry')
                    </div>
                </section>

{{--                <section class="section_process section section-padding-xl bc1-lightester-bg">--}}
{{--                    <div class="container">--}}
{{--                        <div class="hgroup align-center">--}}
{{--                            <h2>How it Works?</h2>--}}
{{--                        </div>--}}

{{--                        <div class="row no-gutter">--}}
{{--                            <div class="col-12 col-cs-5">--}}
{{--                                <div class="process_box align-center">--}}
{{--                                    <div class="icon_wrap"><div class="icon"><span class="sprite-60-signup"/></div></div>--}}
{{--                                    <div class="h5 title">Sign up</div>--}}
{{--                                    <div class="cnt f15 lh-16">Signup as Joey using our mobile app or website and verify your email address.</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-12 col-cs-5">--}}
{{--                                <div class="process_box align-center">--}}
{{--                                    <div class="icon_wrap"><div class="icon"><span class="sprite-60-application"/></div></div>--}}
{{--                                    <div class="h5 title">Online application</div>--}}
{{--                                    <div class="cnt f15 lh-16">Next step is to fill your online application and submit for approval.</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-12 col-cs-5">--}}
{{--                                <div class="process_box align-center">--}}
{{--                                    <div class="icon_wrap"><div class="icon"><span class="sprite-60-verification"/></div></div>--}}
{{--                                    <div class="h5 title">Recruiter verification</div>--}}
{{--                                    <div class="cnt f15 lh-16">One our professional recruiter will contact you for basic verification.</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-12 col-cs-5">--}}
{{--                                <div class="process_box align-center">--}}
{{--                                    <div class="icon_wrap"><div class="icon"><span class="sprite-60-quiz"/></div></div>--}}
{{--                                    <div class="h5 title">Quiz & Test</div>--}}
{{--                                    <div class="cnt f15 lh-16">Watch our helpful tutorials and pass the easy quiz test.</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-12 col-cs-5">--}}
{{--                                <div class="process_box align-center">--}}
{{--                                    <div class="icon_wrap"><div class="icon"><span class="sprite-60-done"/></div></div>--}}
{{--                                    <div class="h5 title">You’re done</div>--}}
{{--                                    <div class="cnt f15 lh-16">It's your first day to explore your city, get ready to take your first order.</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </section>--}}

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
            @include('includes.clientFooter')
         </main>
 @endsection
