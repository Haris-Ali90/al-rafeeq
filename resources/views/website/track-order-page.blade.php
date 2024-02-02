


 @extends('includes.layout')
         @section('content')
         <main id="main" class="page-track-order">
              @include('includes.clientHeader')
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

			<section class="section pb-0 section_track_order bc1-lightester-bg">
				<div class="bottom_map_vector_bg">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-md-6 col-sm-12 col-12">
								<h4 class="regular bf-color nomargin">Tracking id</h4>
								<h1 class="nomargin">JCY-190202202</h1>
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
											<span class="date">12 March 2021</span><span class="time">12:30pm</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-12 col-12">
								<div class="steps_list trackorder_steps">
									<a href="#" class="btn btn-white btn-xs mb-15">Return History</a>
									<ul class="no-list">
										<li class="row_success">
											<div class="status"><i class="icofont-check"></i></div>
											<div class="step_info no-flex">
												<span class="title bold">Order Confirmed</span>
												<div class="step_info_box">
													<div class="info_title">Order confirmed at:</div>
													<div class="info">16 August 2021 <span class="time">12:40pm</span></div>
												</div>
											</div>
										</li>
										<li class="row_active">
											<div class="status"><i class="icofont-rounded-right"></i></div>
											<div class="step_info no-flex">
												<span class="title bold">Processing</span>
												<div class="step_info_box">
													<p>Your order is under process, your Joey will be assigned once route will be created for your order</p>
												</div>
											</div>
										</li>
										<li class="row_disabled">
											<div class="status"><i class="icofont-close"></i></div>
											<div class="step_info no-flex">
												<span class="title bold">Assigned to Joey</span>
											</div>
										</li>
										<li class="row_disabled">
											<div class="status"><i class="icofont-close"></i></div>
											<div class="step_info no-flex">
												<span class="title bold">On the way</span>
											</div>
										</li>
										<li class="row_disabled">
											<div class="status"><i class="icofont-close"></i></div>
											<div class="step_info no-flex">
												<span class="title bold">Delivered</span>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="section section_track_order_info bc1-lightester-bg brd-top brd-bc1-lighter">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<div class="info_box d-flex">
								<div class="icon"><i class="icofont-map-pins"></i></div>
								<div class="info">
									<h6 class="bf-color">Delivery Address</h6>
									<p>25 Cheriton Rd WEST LITTLETON SN14 0UR<br/> <strong>City:</strong> Toronto</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="info_box d-flex">
								<div class="icon"><span class="sprite-48-joey"></span></div>
								<div class="info">
									<h6 class="bf-color">Joey Information</h6>
									<div class="joey_box d-flex align-items-center">
										<div class="thumb circle small"><img src="{{asset('/')}}images/profile_img.jpg" alt=""></div>
										<div class="joey_info">
											<h6 class="nomargin">Steven A. Williamson</h6>
											<p class="small nomargin">KY66 Yvc</p>
											<a href="#" class="btn btn-basecolor1 btn-border btn-xs">Call Now</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="info_box d-flex">
								<div class="icon"><span class="sprite-48-message"></span></div>
								<div class="info">
									<h6 class="bf-color">Special instructions</h6>
									<p>No Instructions found</p>
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

