<div class="bottom_map_vector_bg">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-sm-12 col-12">
                <h4 class="regular bf-color nomargin">Tracking Id</h4>
                <h1 class="nomargin">{{$data['tracking_id']}}</h1>
                <div class="order_status_percentage">
                    Your order is <span class="percentage bold">20%</span> <span class="f20">Completed</span>
                </div>
                <div class="status_bar">
                    <div class="current_status" style="width: 30%;"></div>
                </div>
                <div class="expected_arrival d-flex align-items-center">
                    <div class="icon"></div>
                    <div class="info">
                        <h5 class="light bf-color nomargin">Expected arrival</h5>
                        <div class="date_time bold">
                            <span class="date"> {{date('d M Y', strtotime($data['expected_date']))}}</span><span class="time">{{date('h:i a ', strtotime($data['expected_time']))}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-12">
                <div class="steps_list trackorder_steps">
                    <?php $count=$data['latest_status_count']; ?>
                    @if(isset($data['return_history']) && !empty($data['return_history']))
                    <a href="#" class="btn btn-white btn-xs mb-15" data-toggle="modal" data-target="#returnHistory">Order History</a>
                    @endif
                    <ul class="no-list">
                        <li class=" <?php  if($count==0){  ?> row_active <?php }elseif($count>=20){  ?> row_success <?php } ?> ">
                            <div class="status"><i class="icofont-check"></i></div>
                            <div class="step_info no-flex">
                                <span class="title bold">Preparing Order</span>
                                @if(isset($data['order_confirmed_date']))
                                    <div class="step_info_box">
                                        <div class="info_title">Order created at:</div>
                                        <div class="info"> {{date('d M Y', strtotime($data['order_confirmed_date']))}} <span class="time">{{date('h:i a ', strtotime($data['order_confirmed_time']))}}</span></div>
                                    </div>
                                @endif
                            </div>
                        </li>
                        {{-- <li class=" <?php  if($count==20){  ?> row_active <?php }elseif($count>20){  ?> row_success <?php } ?> ">
                            <div class="status"><i class="<?php if($count==20){ ?> icofont-rounded-right <?php }elseif($count>20){ ?> icofont-check <?php } ?>"></i></div>
                            <div class="step_info no-flex">
                                <span class="title bold">Hub Processing</span>
                                <div class="step_info_box">
                                    @if (isset($data['assigned_to_joey_date']))
                                    <p>Order Reached at hub {time}</p>
                                    @else
                                    <p>Your order is under process</p>
                                    @endif

                                </div>
                            </div>
                        </li> --}}
                        <li class=" <?php  if($count==20){  ?> row_active <?php }elseif($count>20){  ?> row_success <?php } ?> ">
                            <div class="status"><i class="<?php if($count==20){ ?> icofont-rounded-right <?php }elseif($count>20){ ?> icofont-check <?php } ?>"></i></div>
                            <div class="step_info no-flex">
                                <span class="title bold">Hub Processing</span>
                                <div class="step_info_box">
                                    @if (isset($data['processing_date']))
                                    <div class="info_title">Order received at hub:</div>
                                    @isset($data['processing_date'])
                                    <div class="info"> {{date('d M Y', strtotime($data['processing_date']))}} <span class="time">{{date('h:i a ', strtotime($data['processing_time']))}}</span></div>
                                    @endisset
                                    @elseif($count==20)
                                    <p>Your order is under process</p>
                                    @endif

                                </div>
                            </div>
                        </li>
                        <li class="<?php if($count==40){ ?> row_active <?php }elseif($count<40){ ?>  row_disabled <?php }else{ ?> row_success <?php } ?>">
                            <div class="status"><i class="<?php if($count==40){ ?> icofont-rounded-right <?php }elseif($count<40){ ?>  icofont-close <?php }else{ ?>  icofont-check <?php } ?>"></i></div>
                            <div class="step_info no-flex">
                                <span class="title bold">Assigned To Joey</span>
                                <?php if(isset($data['assigned_to_joey_date']) && $count>=40){  ?>
                                    <div class="step_info_box">
                                        @if (isset($data['assigned_to_joey_date']))
                                        <div class="info_title">Your order is assigned to Joey at:</div>
                                        @endif
                                        <div class="info"> {{date('d M Y', strtotime($data['assigned_to_joey_date']))}} <span class="time">{{date('h:i a ', strtotime($data['assigned_to_joey_time']))}}</span></div>
                                    </div>
                                    <?php }else{ ?>
                                    <p>Joey will be assigned once route will be created for your order</p>
                                    <?php } ?>

                            </div>
                        </li>
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
                                <span class="title bold">Delivered</span>
                                <?php if($count>80){  ?>
                                    <div class="step_info_box">
                                        <div class="info_title">{{$data['delivered_success_message']}} at:</div>
                                        <div class="info"> {{date('d M Y', strtotime($data['completed_date']))}} <span class="time">{{date('h:i a ', strtotime($data['completed_time']))}}</span></div>
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
