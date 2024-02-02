@extends('includes.layout')

@section('content')
    <main id="main" class="page-serviceDetail">
        @include('includes.clientHeader')

        @include('includes.bookDemo')

        <div class="inner-page inner-joey">
            <div id="main_banner" class="section-skew">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 col-sm-6 mb-align-center">
                            <div class="hgroup page_heading">
                                <h1 class="main_heading">Drive With JoeyCo</h1>
                                <h2 class="sub_heading">We deliver a stable job with flexibility... <br>and you deliver the orders!</h2>
                            </div>
                            <div class="actions d-block d-sm-flex align-items-center">
                                <a href="https://joey.joeyco.com/signup" class="btn btn-primary btn-lg uppercase">Become A Joey</a>
                                <a href="https://www.joeyco.com/register" class="watch_video_btn play-video has_thumb" data-toggle="modal" data-target="#demoJoeyApp">
                                    <!-- <i class="icofont-ui-play"></i> -->
                                    <div class="thumbnail"><img src="https://www.joeyco.com/images/video_thumb.jpg" alt=""></div>
                                    Watch Video <span>00:49</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 mb-align-center align-right d-none d-sm-block">
                            <div class="main_page_img">
                                <img src="images/joey_banner.png  " alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="section why_section bc1-lightester-bg">
                <div class="container">
                    <div class="hgroup align-center mb-25" style="display: table">
                        <h2>Why JoeyCo?</h2>
                        <p>Join a supportive community of independent riders and enjoy flexible hours &amp; competitive earnings:</p>
                    </div>
                    <div class="row justify-content-center" style="">
                        <div class="col-12 col-sm-4 mb-30">
                            <div class="why_box base-radius">
                                <div class="title d-flex align-items-center mb-20">
                                    <span class="sprite-60-wallet"></span>
                                    <h4 class="nomargin pl-10">Flexibility</h4>
                                </div>
                                <div class="cnt">
                                    <ul class="list-check">
                                        <li>Find the contract type that fits your lifestyle.</li>
                                        <li>And work the shifts that suit you best.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 mb-30">
                            <div class="why_box base-radius">
                                <div class="title d-flex align-items-center mb-20">
                                    <span class="sprite-60-moneyhand"></span>
                                    <h4 class="nomargin pl-10">Reward of Hard Work</h4>
                                </div>
                                <div class="cnt">
                                    <ul class="list-check">
                                        <li>The more orders you deliver, the bigger your bonus!</li>
                                        <li>You’ll receive your tips as part of your payslip.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 mb-30">
                            <div class="why_box base-radius">
                                <div class="title d-flex align-items-center mb-20">
                                    <span class="sprite-60-award"></span>
                                    <h4 class="nomargin pl-10">Streamlined Sign-Up</h4>
                                </div>
                                <div class="cnt">
                                    <ul class="list-check">
                                        <li>Quick, easy and hassle-free application process</li>
                                        <li>And work the shifts that suit you best.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section section-padding-xxl section_mid_mile">
                <div class="container">
                    <div class="row justify-content-left">
                        <div class="col-12 col-sm-7">
                            <h3 class="change_clr">Mid Mile Delivery</h3>
                            <h2 class="h1">Are You Travelling With Empty Space In Your Vehicle?</h2>
                            <h4 class="change_clr">Earn money by picking our order and drop to our micro-hub</h4>
                            <p>Earn money by utilizing empty space in your Vehicle, you can simply pick our orders and drop them at our micro-hub.</p>
                            <a href="https://joey.joeyco.com/signup" class="btn btn-primary btn-lg uppercase" style="user-select: auto;">Become A Joey</a>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section section-padding-xxl section_joey_requirement">
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-12 col-sm-6">
                            <h2 class="h1"><span class="thin">What you'll need to become a</span> Joey?</h2>
                            <ul class="list-check">
                                <li>Scooter, bike or car (with licence and insurance)
                                </li><li>Safety equipment (e.g. helmet)</li>
                                <li>Smartphone with iOS 12 / Android 6 or above</li>
                                <li>Proof of your right to work self-employed in the Canada</li>
                                <li>Age 18+</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section_process section section-padding-xl bc1-lightester-bg">
                <div class="container">
                    <div class="hgroup align-center">
                        <h2>Hassle-free Application Process</h2>
                    </div>

                    <div class="row no-gutter">
                        <div class="col-12 col-cs-5">
                            <div class="process_box align-center">
                                <div class="icon_wrap"><div class="icon"><span class="sprite-60-signup"></span></div></div>
                                <div class="h5 title">Sign up</div>
                                <div class="cnt f15 lh-17">Signup as Joey using our mobile app or website and verify your email address</div>
                            </div>
                        </div>
                        <div class="col-12 col-cs-5">
                            <div class="process_box align-center">
                                <div class="icon_wrap"><div class="icon"><span class="sprite-60-application"></span></div></div>
                                <div class="h5 title">Online application</div>
                                <div class="cnt f15 lh-17">Next step is to fill your online application and submit for approval</div>
                            </div>
                        </div>
                        <div class="col-12 col-cs-5">
                            <div class="process_box align-center">
                                <div class="icon_wrap"><div class="icon"><span class="sprite-60-verification"></span></div></div>
                                <div class="h5 title">Recruiter verification</div>
                                <div class="cnt f15 lh-17">One our professional recruiter will contact you for basic verification.</div>
                            </div>
                        </div>
                        <div class="col-12 col-cs-5">
                            <div class="process_box align-center">
                                <div class="icon_wrap"><div class="icon"><span class="sprite-60-quiz"></span></div></div>
                                <div class="h5 title">Quiz &amp; Test</div>
                                <div class="cnt f15 lh-17">Watch our helpful tutorials and pass the easy quiz test</div>
                            </div>
                        </div>
                        <div class="col-12 col-cs-5">
                            <div class="process_box align-center">
                                <div class="icon_wrap"><div class="icon"><span class="sprite-60-done"></span></div></div>
                                <div class="h5 title">You’re done</div>
                                <div class="cnt f15 lh-17">Its your first day to explore your city, get ready to take your first order.</div>
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
