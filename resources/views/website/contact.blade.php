@extends('includes.layout')
@section('title', 'Contact JoeyCo')

@section('content')
<main id="main" class="page-home">
     @include('includes.clientHeader')
<div class="inner-page">
    <div id="main_banner" class="style2 withBottomBg">
        <div class="breadcrumb">
            <div class="container">
                <ul>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </div>

        <div class="heading_area">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-8 col-md-6">
                        <h1 class="main_heading">Contact JoeyCo</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section bc1-lightester-bg section-padding-lg">
        <div class="container">
            <div>
                <div class="row">
                    <div class="col-sm-4 col-12">
                        <div class="box-style-2 mb-30">
                            <h4 class="mb-5">General Inquiries</h4>
                            <p><a class="none" href="mailto:info@joeyco.com">info@joeyco.com</a></p>
                            <p><a class="btn btn-bc1lightest btn-sm" href="tel:8555961833">(855) 596-1833</a></p>
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="box-style-2 mb-30">
                            <h4 class="mb-5">Merchant Inquiries</h4>
                            <p><a class="none" href="mailto:sales@joeyco.com">sales@joeyco.com</a></p>
                            <p><a class="btn btn-bc1lightest btn-sm" href="tel:8555961833">(855) 596-1833</a></p>
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="box-style-2 mb-30">
                            <h4 class="mb-5">Joey Inquiries</h4>
                            <p><a class="none" href="mailto:joeyjobs@joeyco.com">joeyjobs@joeyco.com</a></p>
                            <p><a class="btn btn-bc1lightest btn-sm" href="tel:8555961833">(855) 596-1833</a></p>
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="box-style-2 mb-30">
                            <h4 class="mb-5">Press & Media</h4>
                            <p><a class="none" href="mailto:press@joeyco.com">press@joeyco.com</a></p>
                            <p><a class="btn btn-bc1lightest btn-sm" href="tel:8555961833">(855) 596-1833</a></p>
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="box-style-2 mb-30">
                            <h4 class="mb-5">Support</h4>
                            <p><a class="none" href="mailto:support@joeyco.com">support@joeyco.com</a></p>
                            <p><a class="btn btn-bc1lightest btn-sm" href="tel:8555961833">(855) 596-1833</a></p>
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

