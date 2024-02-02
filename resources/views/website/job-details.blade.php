@extends('includes.layout')
@section('title', 'Human Resource Specialist')

         @section('content')
         <main id="main" class="page-careers">
          @include('includes.clientHeader')

		<div class="modal fade bd-example-modal-lg custom-modal-style" id="bookDemo" tabindex="-1" role="dialog" aria-labelledby="bookDemoTitle" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
				<div class="modal-content">
					<button type="button" class="modal-close-btn" data-dismiss="modal"><i class="icofont-close-line"></i></button>

					<div class="hgroup seperator_left">
						<h2>Apply Now</h2>
						<p>Please fill all fields to apply for this opportunity.</p>
					</div>

					<div class="modal-body">
					<form action="{{route('jobs.apply')}}" id="step1-form" class="needs-validation" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row merge-fields">
                                <div class="form-group style2 col-6 no-min-h">
                                    <input type="text" class="form-control form-control-lg" placeholder="First name" name="first_name" required>
                                </div>
                                <div class="form-group style2 col-6 no-min-h">
                                    <input type="text" class="form-control form-control-lg" placeholder="Last name" name="last_name" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group style2 col-12 no-min-h">
                                    <input type="email" class="form-control form-control-lg" placeholder="Email" name="email" required>
                                </div>
                                <div class="form-group style2 col-12 no-min-h">
                                    <input type="tel" class="form-control form-control-lg" placeholder="Phone number" name="phone" required>
                                </div>
                                <div class="form-group style2 col-12 no-min-h">
                                    <label>Upload CV</label>
                                    <input name="resume" type="file" required>
                                </div>
                            </div>
                            <div class="signup_buttons_wrap">
                                <button type="submit" class="btn btn-primary btn-lg uppercase">Apply Now</button>
                            </div>
                        </form>
					</div>
				</div>
			</div>
		</div>

		<div class="inner-page">
			<div id="main_banner" class="style2 withBottomBg">
				<div class="breadcrumb">
					<div class="container">
						<ul>
							<li><a href="{{url('/')}}">Home</a></li>
							<li><a href="{{route('careers')}}">Careers</a></li>
							<li><a href="#">Human Resource Specialist</a></li>
						</ul>
					</div>
				</div>

				<div class="heading_area">
					<div class="container">
						<div class="row">
							<div class="col-12 col-sm-10 col-md-10">
								<h1 class="main_heading">Human Resource Specialist</h1>
							</div>
						</div>
					</div>
				</div>
			</div>

			<section class="section white-bg">
				<div class="container">
					<p>At JoeyCo, we constantly seek to develop talent pipelines and sourcing strategy to bring in the best talents into the company. As part of team expansion, we’re looking for a regional talent recruiter to join our talent team on a variety of talent acquisition projects.</p>
					<p>In this role, you will work closely with the regional talent team to perform strategic sourcing assignments and help build a premier talent pipeline. You will lead the initial recruiting process from sourcing, building great relationships and pre-screening candidates and lead talent pipelining projects.</p>

					<h6>Your Team</h6>

					<p>This role reports to the Experienced Hire Leader and be part of a wider community of recruiting leaders across MEA.</p>

					<h6>What Success looks like</h6>

					<h6>After 1st Month:</h6>
					<ul>
						<li>Grasp the fundamentals of how recruiting operates in P&G</li>
						<li>Familiarise with the tools and start working on sourcing assignments</li>
						<li>Evaluate sourcing channels and determine return on investment</li>
					</ul>
					<a href="#" class="btn btn-basecolor1" data-toggle="modal" data-target="#bookDemo">Apply Now</a>
				</div>
			</section>

		</div>

         @include('includes.clientFooter')
         </main>
@endsection

