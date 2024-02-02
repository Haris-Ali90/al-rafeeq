@extends('includes.layout')

<style>
    .joeylogo{
        width:200px
    }
    .joeyco-hd{
        margin: 0px 0px 0px 47px;
    }
    .joeyco-logo{
        width: 130px; margin: 0px 0px 0px 51px;
    }
    #main_banner{
        padding-top: 100px !important;
    }
    #client_header{
        height: 100px !important;
        padding: 13px 0;
    }
    #client_header #logo img {
        max-width: unset !important;
    }
</style
         @section('content')
    <main id="main" class="page-track-order">
        <header id="client_header">
            <div class="row-1">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-sm-2 col-4">
                            <div id="logo">
                                <img class="joeylogo"  src="<?php echo asset('images/logo-merchant.png') ?>" alt="">
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </header>

        <div class="inner-page">
			<div id="main_banner" class="no-border bc1-lightester-bg">
				<div class="breadcrumb">
					<div class="container">
						<ul>
							<li><a href="{{url('/')}}">Home</a></li>
							<li><a href="#">{{__('')}} Track Your Order</a></li>
						</ul>
					</div>
				</div>
			</div>

            <section class="section pb-0 section_track_order bc1-lightester-bg" id="partial_view_section">
				<div class="bottom_map_vector_bg">
					<div class="container">
                        <!-- <div class="alert_bar flexbox flex-center jc-center"><i class="icofont-warning"></i>Due to poor weather conditions you may expect delays</div> -->
						<div class="row align-items-center">
							<div class="col-md-6 col-sm-12 col-12">

                                <h4 class="regular bf-color nomargin">Order Id</h4>
								<h1 class="nomargin">CR-{{$data['sprint_id']}}</h1>
                                <?php if($data['latest_status_count']!=101){ ?>
								<div class="order_status_percentage">
									Your order is <span class="percentage bold">20%</span> <span class="f20">Completed</span>
								</div>
                                <div class="status_bar">
									<div class="current_status" style="width: 30%;"></div>
								</div>
                                <?php } ?>

                                @if(isset($data['expected_date']) && $data['expected_date']!='')
								<div class="expected_arrival d-flex align-items-center">
									<div class="icon"></div>
									<div class="info">
										<h5 class="light bf-color nomargin">Expected arrival</h5>
										<div class="date_time bold">
											<span class="date"> {{date('d M Y', strtotime($data['expected_date']))}}</span><span class="time">{{date('h:i a ', strtotime($data['expected_time']))}}</span>
										</div>
									</div>
								</div>
                                @endif
							</div>
							<div class="col-md-6 col-sm-12 col-12">
								<div class="steps_list trackorder_steps">
                                    <?php $count=$data['latest_status_count']; ?>
                                    @if(isset($data['return_history']) && !empty($data['return_history']))

<!--                                       <a href="#" class="btn btn-white btn-xs mb-15" data-toggle="modal" data-target="#returnHistory">Order History</a>-->
                                    @endif
									<ul class="no-list">
                                        <li class=" <?php  if($count==0){  ?> row_active <?php }elseif($count>=20){  ?> row_success <?php } ?> ">
											<div class="status"><i class="<?php if($count==0){ ?> icofont-rounded-right <?php }elseif($count>=20){ ?> icofont-check <?php } ?>"></i></div>
											<div class="step_info no-flex">
												<span class="title bold">Preparing Order</span>

                                                @if(isset($data['order_confirmed_date']) && $count>=20)

                                                    <div class="step_info_box">
                                                        <div class="info_title">Order created at:</div>
                                                        <div class="info"> {{date('d M Y', strtotime($data['order_confirmed_date']))}} <span class="time">{{date('h:i a ', strtotime($data['order_confirmed_time']))}}</span></div>
                                                    </div>
                                                @endif
											</div>
										</li>
										<li class=" <?php  if($count==20){  ?> row_active <?php }elseif($count>20){  ?> row_success <?php }else{ ?> row_disabled <?php } ?> ">
											<div class="status"><i class="<?php if($count==20){ ?> icofont-rounded-right <?php }elseif($count>20){ ?> icofont-check <?php }else{ ?>  icofont-close <?php } ?>"></i></div>
											<div class="step_info no-flex">
												<span class="title bold">Order Processing</span>
												<div class="step_info_box">

                                                    @if (isset($data['processing_date']))
                                                    <div class="info_title">Order Processing:</div>
                                                    @isset($data['processing_date'])
													<div class="info"> {{date('d M Y', strtotime($data['processing_date']))}} <span class="time">{{date('h:i a ', strtotime($data['processing_time']))}}</span></div>
                                                    @endisset
                                                    @elseif($count==20)
                                                    <p>Your order is under process</p>
                                                    @endif
												</div>
											</div>
										</li>
                                        @if (isset($data['assigned_to_joey_date']))
										<li class="<?php if($count==40){ ?> row_active <?php }elseif($count<40){ ?>  row_disabled <?php }else{ ?> row_success <?php } ?>">
											<div class="status"><i class="<?php if($count==40){ ?> icofont-rounded-right <?php }elseif($count<40){ ?>  icofont-close <?php }else{ ?>  icofont-check <?php } ?>"></i></div>
											<div class="step_info no-flex">
												<span class="title bold">Assigned To Joey</span>
                                                <?php if(isset($data['assigned_to_joey_date']) && $count>=40){  ?>
                                                <div class="step_info_box">
                                                    {{-- @if (isset($data['assigned_to_joey_date'])) --}}
                                                    <div class="info_title">Your order is assigned to Joey at:</div>
                                                    {{-- @endif --}}
													<div class="info"> {{date('d M Y', strtotime($data['assigned_to_joey_date']))}} <span class="time">{{date('h:i a ', strtotime($data['assigned_to_joey_time']))}}</span></div>
												</div>
                                                <?php }elseif($count==40){ ?>
                                                <p>Joey will be assigned once route will be created for your order</p>
                                                <?php } ?>

											</div>
										</li>
                                        @endif
										<li class="<?php if($count==60){  ?> row_active <?php }elseif($count<60){ ?>row_disabled<?php }else{ ?> row_success <?php } ?>">
											<div class="status"><i class="<?php if($count==60){ ?> icofont-rounded-right <?php }elseif($count<60){ ?>  icofont-close <?php }else{ ?>  icofont-check <?php } ?>"></i></div>
											<div class="step_info no-flex">
												<span class="title bold">Out For Delivery</span>
                                                <div class="step_info_box">
                                                    @if (isset($data['out_for_delivery_date']))
                                                    <div class="info_title">Order is out for delivery at:</div>
                                                    {{-- @isset($data['processing_date']) --}}
													<div class="info"> {{date('d M Y', strtotime($data['out_for_delivery_date']))}} <span class="time">{{date('h:i a ', strtotime($data['out_for_delivery_time']))}}</span></div>
                                                    {{-- @endisset --}}
                                                    @else
                                                    {{-- <p>Your order is under process</p> --}}
                                                    @endif

												</div>
											</div>
										</li>
										<li class="<?php if($count==80){  ?> row_active <?php }elseif($count<80){ ?>row_disabled<?php }else{ ?> row_success <?php } ?>">
											<div class="status"><i class="<?php if($count==80){ ?> icofont-rounded-right <?php }elseif($count<80){ ?>  icofont-close <?php }else{ ?>  icofont-check <?php } ?>"></i></div>
											<div class="step_info no-flex">

												<span class="title bold"><?php if($count==101){ echo 'Returned';}else{ ?>Delivered<?php } ?></span>
                                                <?php if($count>80){  ?>
                                                    <div class="step_info_box">
                                                        <div class="info_title">{{$data['delivered_success_message']}} at:</div>

                                                        <div class="info"> {{date('d M Y', strtotime($data['completed_date']))}} <span class="time">{{date('h:i a ', strtotime($data['completed_time']))}}</span></div>
                                                        <?php if (isset($data['current_attachment'])) { ?>

                                                                <div class="proof_img">
                                                                    <img src="{{$data['current_attachment']}}" alt="">
                                                                </div>
                                                            <?php } ?>
                                                    </div>
                                                <?php } ?>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
            @if(isset($data['joey_lat']) && isset($data['joey_long']))
			{{-- <section class="location_map_section">
				<div class="hide_map_btn btn btn-primary btn-xs no-bottom-radius">Hide <i class="icofont-simple-down"></i></div>
				<div id="location_map" class="location_map"></div>
			</section> --}}
            @endif

			<section class="section section_track_order_info bc1-lightester-bg brd-top brd-bc1-lighter">
				<div class="container">
                    <div class="row">
                        @if($data['is_amazon']==0)
                            <div class="col-md-6">
                                <div class="info_box d-flex">
                                    <div class="icon"><i class="icofont-map-pins"></i></div>
                                    <div class="info">
                                        <h6 class="bf-color">Delivery Address</h6>

                                        @if (isset($data['delivery_address']))
                                        <p>{{$data['delivery_address']}}<br/> <strong>City:</strong> {{$data['cityname']}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
						<div class="col-md-6">
							<div class="info_box d-flex">
								<div class="icon"><span class="sprite-48-joey"></span></div>
								<div class="info">
									<h6 class="bf-color">Joey Information</h6>
                                    @if (!isset($data['joey_name']))
                                    <h6 class="nomargin">No Joey Assigned</h6>
                                    @else


									<div class="joey_box d-flex align-items-center">
										{{-- <div class="thumb circle small"><img src="{{asset('/')}}images/profile_img.jpg" alt=""></div> --}}
										<div class="thumb circle small"><img src="<?php echo ($data['joey_image'] == "" || $data['joey_image'] ==null ) ?asset('images/joey.png')  : $data['joey_image'] ?>" alt=""></div>

										<div class="joey_info">
											<h6 class="nomargin">{{$data['joey_name']}}</h6>
											{{-- <p class="small nomargin">{{$data['joey_phone']}}</p>
											<a href="#" class="btn btn-basecolor1 btn-border btn-xs">Call Now</a> --}}
										</div>
									</div>
                                    @endif
								</div>
							</div>

						</div>
						<div class="col-md-6" style="margin: 10px 0px 0px 0px;">
							<div class="info_box d-flex">
								<div class="icon"><span class="sprite-48-message"></span></div>
								<div class="info">
									<h6 class="bf-color mb-5">Contact Support</h6>
									<p class="mb-10"><a class="none" href="mailto:support@joeyco.com">support@joeyco.com</a></p>
                                    <p><a class="btn btn-white btn-sm" href="tel:8555961833">(855) 596-1833</a></p>
								</div>
							</div>
						</div>
                            <div class="col-md-6" style="margin: 10px 0px 0px 0px;">
                                <div class="info_box d-flex " >
                                    <div class="info">
                                        <h6 class="bf-color joeyco-hd">Powered by JoeyCo</h6>

                                                <img class="joeyco-logo" src="{{asset('/')}}images/logo-joeyco.webp" alt="">



                                    </div>
                                </div>

                            </div>
					</div>
				</div>
			</section>
		</div>
<!-- Order history modal-->
        <div class="steps_list trackorder_steps">
            <div class="modal fade bd-example-modal-lg custom-modal-style" id="returnHistory" tabindex="-1" role="dialog" aria-labelledby="returnHistoryTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <button type="button" class="modal-close-btn" data-dismiss="modal"><i class="icofont-close-line"></i></button>

                        <div class="hgroup full-w">
                            <h2>Order History</h2>
                            <h3 class="light bf-color">CR-{{$data['sprint_id']}}</h3>
                        </div>

                        <div class="modal-body">
                            @isset($data['return_history'])
                            @foreach ($data['return_history'] as $key => $return_histories)
                            <?php //$countforhistory=$return_history['count']; ?>
                            @if($key==1)
                                <h3>Second Attempt</h3>
                            @endif
                            @if($key==0)
                                <h3>First Attempt</h3>
                            @endif
                            <ul class="no-list">
                                @foreach ($return_histories as $return_history)
                                <li class="row_success">
                                    <div class="status"><i class="icofont-check"></i></div>
                                    <div class="step_info no-flex">
                                        <span class="title bold">{{$return_history['status_msg']}}</span>
                                            <div class="info"> {{date('d M Y', strtotime($return_history['date']))}} <span class="time">{{date('h:i a ', strtotime($return_history['time']))}}</span></div>
                                    </div>
                                </li>
                                @endforeach
                                <li>
                                    <?php

                                    if (isset($data['reattempt_first_attachment'])&&$key==0) { ?>

                                        <div class="proof_img">
                                            <img src="{{$data['reattempt_first_attachment']}}" alt="">
                                        </div>

                                    <?php } ?>

                                </li>
                                <li>
                                    <?php

                                    if (isset($data['reattempt_second_attachment'])&&$key==1) { ?>

                                        <div class="proof_img">
                                            <img src="{{$data['reattempt_second_attachment']}}" alt="">
                                        </div>

                                    <?php } ?>

                                </li>
                            </ul>
                            @endforeach
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>

       	@include('includes.clientFooter')
    </main>
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTK4viphUKcrJBSuoidDqRhVA4AWnHOo0&callback=initMap&libraries=&v=weekly&channel=2" async></script> --}}
<script>


// initialize lat , long, and marker value(myLatLng)
    var latt=<?=(isset($data['joey_lat']))?$data['joey_lat']:0?>;
    var longg=<?=(isset($data['joey_long']))?$data['joey_long']:0?>;
    var myLatLng = { lat: <?=(isset($data['joey_lat']))?$data['joey_lat']:0?>, lng: <?=(isset($data['joey_long']))?$data['joey_long']:0?> };
    // initialize maps
	var map;
    // function initMap() {
    //     map = new google.maps.Map(document.getElementById('location_map'), {
	//     center: {lat: latt, lng: longg},
	//     zoom: 8,
	//     disableDefaultUI: true,
    //     });
    //     new google.maps.Marker({
    //     position: myLatLng,
    //     map,
    //     title: "Joey",
    //     });
    // }

// updates total completed percentage of order
    function update_count(count){
        $('span.percentage.bold').text(count);
        $('div.status_bar div.current_status').css("width", count);
    }

// runs at page load(ready)
    $( document ).ready(function() {
        // gets total count(total completed percentage of order)
        var count=<?=$data['latest_status_count']?>+"%";
        update_count(count);
    });

//this code runs every 10 second
{{--    setInterval(function(){--}}
{{--        $.ajax({--}}

{{--            /* the route pointing to the post function */--}}
{{--            url: '<?=route("new-track-Order-ajax")?>',--}}
{{--            type: 'POST',--}}
{{--            /* send the csrf-token and the input to the controller */--}}
{{--            data: {_token: '<?= csrf_token() ?>', trackingId:'<?=$data["sprint_id"]?>' ,ajax:'ajax' },--}}
{{--            // dataType: 'JSON',--}}
{{--            /* remind that 'data' is the response of the AjaxController */--}}
{{--            success: function (res) {--}}

{{--                 response =JSON.parse(res);--}}

{{--                // replace html in partial_view_section(div)--}}

{{--                $('#partial_view_section').html(response.partial_view);--}}
{{--                update_count(response.count);--}}
{{--                // if lat and long differ from the last response , reinitializes the map--}}
{{--                // if(latt!=response.joey_lat ||  longg!=response.joey_long){--}}
{{--                //     latt=response.joey_lat;--}}
{{--                //     longg=response.joey_long;--}}
{{--                //     myLatLng = { lat: latt, lng: longg };--}}
{{--                //     initMap();--}}
{{--                // }--}}


{{--            }--}}
{{--        });--}}
{{--    }, 10000);--}}

</script>
@endsection

