<img src="{{asset('/')}}images/under-maintenance.png" alt="" style="width: 100%; height: 100vh">
{{--
@extends('includes.layout')
         @section('content')
    <main id="main" class="page-track-order">
	 @include('includes.clientHeader')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
        @endif
		<div class="inner-page">
			<div id="main_banner" class="no-border bc1-lightester-bg">
				<div class="breadcrumb">
					<div class="container">
						<ul>
							<li><a href="{{url('/')}}">Home</a></li>
							<li><a href="#">Track Your Order</a></li>
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
								<h4 class="regular bf-color nomargin">Tracking Id</h4>
								<h1 class="nomargin">{{$data['tracking_id']}}</h1>
                                <?php if($data['latest_status_count']!=101){ ?>
								<div class="order_status_percentage">
									Your order is <span class="percentage bold">20%</span> <span class="f20">Completed</span>
								</div>
                                <div class="status_bar">
									<div class="current_status" style="width: 30%;"></div>
								</div>
                                <?php } ?>

                                @if(isset($data['expected_date']) && $data['expected_date']!='')
                                    @if(in_array($data['vendor_id'], [477625,477635,477633]))
                                        @if(isset($data['completed_date']))
                                            <div class="expected_arrival d-flex align-items-center">
                                                <div class="icon"></div>
                                                <div class="info">
                                                    <h5 class="light bf-color nomargin">Expected arrival</h5>
                                                    <div class="date_time bold">
                                                        <span class="date">{{date('d M Y', strtotime($data['completed_date']))}}</span><span class="time">{{date('h:i a ', strtotime($data['completed_time']))}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="expected_arrival d-flex align-items-center">
                                                <div class="icon"></div>
                                                <div class="info">
                                                    <h5 class="light bf-color nomargin">Expected arrival</h5>
                                                    <div class="date_time bold">
                                                        <span class="date"> {{date('d M Y', strtotime($data['expected_date']))}}</span><span class="time">{{date('h:i a ', strtotime('21:00:00'))}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @else
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
                                @endif
                                @if(isset($data['return_history']))
                                    <?php $countsReturn=[]; ?>
                                    @foreach ($data['return_history'] as $key => $return_histories)
                                        <?php array_push($countsReturn,$key) ?>
                                        @endforeach
                                        <div class="attemed_divider">

                                            <div class="col-md-6 order_detail attempted-orders">
                                                <h6 class="nomargin">Attempts  <span>{{count($countsReturn)+1}}</span> </h6>
                                            </div>
                                            <div class="col-md-6 order_detail return-orders">
                                                <h6 class="nomargin">Returns <span>{{count($countsReturn)}}</span></h6>
                                            </div>
                                        </div>
                                @endif
							</div>
							<div class="col-md-6 col-sm-12 col-12">
								<div class="steps_list trackorder_steps">
                                    <?php $count=$data['latest_status_count']; ?>
                                    @if(isset($data['return_history']) && !empty($data['return_history']))
                                       <a href="#" class="btn btn-white btn-xs mb-15" data-toggle="modal" data-target="#returnHistory">Order History</a>
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
												<span class="title bold">Hub Processing</span>
												<div class="step_info_box">
                                                    @if (isset($data['processing_date']))
                                                    <div class="info_title">Order recieved at hub:</div>
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
                                                    --}}
{{-- @if (isset($data['assigned_to_joey_date'])) --}}{{--

                                                    <div class="info_title">Your order is assigned to Joey at:</div>
                                                    --}}
{{-- @endif --}}{{--

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
                                                    --}}
{{-- @isset($data['processing_date']) --}}{{--

													<div class="info"> {{date('d M Y', strtotime($data['out_for_delivery_date']))}} <span class="time">{{date('h:i a ', strtotime($data['out_for_delivery_time']))}}</span></div>
                                                    --}}
{{-- @endisset --}}{{--

                                                    @else
                                                    --}}
{{-- <p>Your order is under process</p> --}}{{--

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
			--}}
{{-- <section class="location_map_section">
				<div class="hide_map_btn btn btn-primary btn-xs no-bottom-radius">Hide <i class="icofont-simple-down"></i></div>
				<div id="location_map" class="location_map"></div>
			</section> --}}{{--

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

                                        <button type="button" class="btn btn-basecolor1 py-1 m-auto border-dark"  style="font-size: 12px!important;" id="btn">Add info</button>
                                        @if($message = Session::get('success'))
                                            <div class="alert alert-success py-0">
                                                <p>{{$message}}</p>
                                            </div>
                                        @endif
                                        @if($message = Session::get('error'))
                                            <div class="alert alert-danger py-0">
                                                <p>{{$message}}</p>
                                            </div>
                                        @endif
                                        <div class="visibility-hidden mt-2" id="add_form">
                                            <input type="hidden" value="{{$data['tracking_id']}}" name="tracking_id">
                                            <form action="{{route('new_track-Order_add.info',$data['tracking_id'])}}" method="post" id="form"  >
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" value="{{$data['tracking_id']}}" name="tracking_id">
                                                <textarea name="add_info" id="add_info" cols="40" rows="4" maxlength="50" class="form-control" required value="{{old('add_info')}}" placeholder="Please Enter your information.."></textarea>
                                                <input type="tel" id="phone" name="phone" class="form-control visibility-hidden my-2"  placeholder="Phone Number"  maxlength="10">

                                                --}}
{{--                                                <input type="tel" id="phone" name="phone" value="+1(___)-(___)-(____)" mask="+1(___)-(___)-(____)" placeholder="+1(___)-(___)-(____)" class="form-control visibility-hidden my-2"/>--}}{{--

                                                @if ( $errors->has('phone') )
                                                    <p class="invalid-feedback text-danger py-0">{{ $errors->first('phone') }}</p>
                                                @endif
                                                @error('phone')
                                                <div class="alert alert-danger py-0">{{ $message }}</div>
                                                @enderror
                                                <input type="submit" class="btn btn-basecolor1 btn-sm  pull-right py-1 border-dark visibility-hidden" value="Submit" data-toggle="modal" data-target=".bd-example-modal-sm" id="btn-info">

                                            </form>
                                        </div>

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
										--}}
{{-- <div class="thumb circle small"><img src="{{asset('/')}}images/profile_img.jpg" alt=""></div> --}}{{--

										<div class="thumb circle small"><img src="<?php echo ($data['joey_image'] == "" || $data['joey_image'] ==null ) ?asset('images/joey.png')  : $data['joey_image'] ?>" alt=""></div>

										<div class="joey_info">
											<h6 class="nomargin">{{$data['joey_name']}}</h6>
											--}}
{{-- <p class="small nomargin">{{$data['joey_phone']}}</p>
											<a href="#" class="btn btn-basecolor1 btn-border btn-xs">Call Now</a> --}}{{--

										</div>
									</div>
                                    @endif
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="info_box d-flex">
								<div class="icon"><span class="sprite-48-message"></span></div>
								<div class="info">
									<h6 class="bf-color mb-5">Contact Support</h6>
									<p class="mb-10"><a class="none" href="mailto:support@joeyco.com">support@joeyco.com</a></p>
                                    <p><a class="btn btn-white btn-sm" href="tel:8555961833">(855) 596-1833</a></p>
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
                            <h3 class="light bf-color">{{$data['tracking_id']}}</h3>
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
--}}
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTK4viphUKcrJBSuoidDqRhVA4AWnHOo0&callback=initMap&libraries=&v=weekly&channel=2" async></script> --}}{{--

<script>

    if ('<?php echo  isset($data['return_history'])?>')
    {
        $(window).on('load', function() {
            $('#returnHistory').modal('show');
        });
    }
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
        const btn = document.getElementById('btn');

        btn.addEventListener('click', () => {
            $(`#add_form` ).addClass('visibility-visible');
            $(`#add_form` ).removeClass('visibility-hidden');

            const form = document.getElementById('form');
            const phone = document.getElementById('phone');
            const btn_info = document.getElementById('btn-info');

            if (form.style.visibility === 'visible') {
                phone.style.visibility = 'hidden';
                btn_info.style.visibility = 'hidden';
                form.style.visibility = 'hidden';



            }
            else {

                form.style.visibility = 'visible';
                phone.style.visibility = 'visible';
                btn_info.style.visibility = 'visible';
            }
        });

        var count=<?=$data['latest_status_count']?>+"%";
        update_count(count);
    });

//this code runs every 10 second
    setInterval(function(){
        $.ajax({
            /* the route pointing to the post function */
            url: '<?=route("track-Order-ajax")?>',
            type: 'POST',
            /* send the csrf-token and the input to the controller */
            data: {_token: '<?= csrf_token() ?>', trackingId:'<?=$data["tracking_id"]?>' ,ajax:'ajax' },
            // dataType: 'JSON',
            /* remind that 'data' is the response of the AjaxController */
            success: function (res) {
                response=JSON.parse(res);
                // replace html in partial_view_section(div)
                $('#partial_view_section').html(response.partial_view);
                update_count(response.count);
                // if lat and long differ from the last response , reinitializes the map
                // if(latt!=response.joey_lat ||  longg!=response.joey_long){
                //     latt=response.joey_lat;
                //     longg=response.joey_long;
                //     myLatLng = { lat: latt, lng: longg };
                //     initMap();
                // }


            }
        });
    }, 10000);

</script>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script type="text/javascript">
    $(document).ready(function (){

        $('#add_info').on('keydown, keyup', function () {
            let x = document.forms["form"]["add_info"].value;
            let y = document.forms["form"]["phone"].value;

            if(x.length > 3)
            {
                // var d =$('.phone-us').mask('+1(000)-(000)-(0000)', {placeholder: "+1(___)-(___)-(____)"});
                // console.log(d,'data');
                $(`#phone,#btn-info` ).addClass('visibility-visible phone-us');

                $(`#phone,#btn-info` ).removeClass('visibility-hidden');

            }
            else
            {
                $(`#phone,#btn-info` ).removeClass('visibility-visible phone-us');

                $(`#phone,#btn-info` ).addClass('visibility-hidden');

            }

        })

    });
    $(document).ready(function () {

        function phoneFormatter() {
            $('#phone').on('input', function() {
                var number = $(this).val().replace(/[^\d]/g, '')
                if (number.length == 10) {
                    number = number.replace(/(\d{10)/, "$1");
                }
                $(this).val(number)
            });
        };

        $(phoneFormatter);

    });

</script>
--}}
