@extends('includes.layout')

@section('content')
<main id="main" class="page-home">
     @include('includes.clientHeader')
<div class="inner-page">
    <div id="main_banner" class="style2 withBottomBg">
        <div class="breadcrumb">
            <div class="container">
                <ul>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="#">FAQs</a></li>
                </ul>
            </div>
        </div>

        <div class="heading_area">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-8 col-md-6">
                        <h1 class="main_heading">FAQs</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="faqs_section section section-padding-lg white-bg">
        <div class="container md">
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
</div>
 @include('includes.clientFooter')
 </main>
@endsection

