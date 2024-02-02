@extends('includes.layout')

@section('title', 'Find the Best Delivery Driver Jobs In Ottawa, Toronto, Montreal, Canada | JoeyCo')
@section('description', "Are you looking for delivery driver jobs in Toronto, Canada? Apply by visiting our website. And start your career from here. For more information call now @(855) 596-1833")
@section('metaTitle', "Find the Best Delivery Driver Jobs In Ottawa, Toronto, Montreal, Canada | JoeyCo")
@section('keywords', "Deliveries Jobs, Delivery Driver Jobs")


@section('title', 'Careers | Job Openings')
         @section('content')
         <main id="main" class="page-careers">
          @include('includes.clientHeader')

		<div class="modal fade bd-example-modal-lg custom-modal-style" id="applyNow" tabindex="-1" role="dialog" aria-labelledby="applyNowTitle" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
				<div class="modal-content">
					<button type="button" class="modal-close-btn" data-dismiss="modal"><i class="icofont-close-line"></i></button>

					<div class="hgroup seperator_left">
						<h2>Apply Now</h2>
						<p>Please fill all fields to apply for this opportunity.</p>
					</div>

					<div class="modal-body">
						<form action="{{route('jobs.apply')}}" id="careerForm" class="needs-validation" method="POST" enctype="multipart/form-data">
                            @csrf
							<input type="hidden" name="job_title" value="">
							<input type="hidden" name="city" value="">
							
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

		<div class="modal fade bd-example-modal-lg" id="announcement" tabindex="-1" role="dialog" aria-labelledby="announcementTitle" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
						<p><strong>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</strong>, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. <a href="#">Hey, It's a dummy link</a>. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Close</button>
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
							<li><a href="#">Careers</a></li>
						</ul>
					</div>
				</div>

				<div class="heading_area">
					<div class="container">
						<div class="row">
							<div class="col-12 col-sm-8 col-md-6">
								<h1 class="main_heading">Careers</h1>
							</div>
						</div>
					</div>
				</div>
			</div>

			<section class="section white-bg">
				<div class="container sm">
					<div class="testimonials_list custom_tabs style2" id="careerCityTabs">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item" role="presentation">
								<a class="nav-link active" id="Ottawa-tab" data-toggle="tab" href="#Ottawa" role="tab" aria-controls="Ottawa" aria-selected="true">Ottawa</a>
							</li>
							<li class="nav-item" role="presentation">
								<a class="nav-link" id="Montreal-tab" data-toggle="tab" href="#Montreal" role="tab" aria-controls="Montreal" aria-selected="false">Montreal</a>
							</li>
							<li class="nav-item" role="presentation">
								<a class="nav-link" id="Toronto-tab" data-toggle="tab" href="#Toronto" role="tab" aria-controls="Toronto" aria-selected="false">Toronto</a>
							</li>
							<li class="nav-item" role="presentation">
								<a class="nav-link" id="Pakistan-tab" data-toggle="tab" href="#Pakistan" role="tab" aria-controls="Pakistan" aria-selected="false">Pakistan</a>
							</li>
						</ul>
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="Ottawa" role="tabpanel" aria-labelledby="Ottawa-tab">
								<div class="cs-accordion" id="accordionExample1">
									<div class="card">
										<div class="card-header" id="heading1">
										<h5 class="mb-0">
											<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
											Warehouse Supervisor (Day Shift)
											</button>
										</h5>
										</div>

										<div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordionExample1">
											<div class="card-body">
												<h5>Summary: </h5>
												<p>Come join one of the fastest growing startups in Canada, JoeyCo. We are a
														last-mile delivery platform that services enterprise clients across the country. Apply quickly If you want
														to be part of a dynamic, passionate team that works on a range of exciting projects, in partnership
														with. An optimal high-performing outbound team is well
														organized, diligent and managed by a leader who is able to motivate, manage and support their team
														throughout the day. The Warehouse Supervisor ensures their team is set up for success, while maintaining the
														JoeyCo standard and following company processes and procedures. Warehouse Supervisor is essentially
														quarterbacking the Joeys, ensuring they are set up and organized, following process and procedures with the
														warehouse. You must thrive in fast paced high pressure environments! </p>
												
												<h5>Responsibilities: </h5>
												<ul class="c9 lst-kix_uydglvjjl57-0 start">
													<li>Oversee route assignments.</li>
													<li>Building out scheduling and coordinate the use of necessary Brokers,
															communicate with Assistant manager to ensure route coverage.</li>
													<li>Gauge need of on-call joeys, incase of no shows. Work with
															Dispatcher and Scheduler to bring in additional Joeys. </li>
													<li>Ensure no cars are parked in the no parking zone (clear of the fuel
															and ramp area).</li>
													<li>Oversee Joey support &amp; communication &nbsp;(through Whatsapp).
														</li>
													<li>Update daily manifest sheet and additionally reporting </li>
													<li>Ensure the problem solving routes are being scanned, sorted and
															dispatched/</li>
													<li>Monitor and check in are being done on Joeys that are considered
															&ldquo;high risk&rdquo; every 3 hours.</li>
													<li>Audit &ldquo;route information&rdquo; to make sure orders are being
															scanned and marked correctly by the Joey.</li>
													<li>Rack organization and distribution of parcels.</li>
													<li>Oversee &nbsp;and support other departments such as;
															&nbsp;Dispatchers, Parcel Controllers, Traffic Controllers, Floor Manager, Joey Inbounder.</li>
													<li>Ensure all Joeys are following procedure ( i.e. checking out with
															the outbound team, packages are being scanned, etc.).</li>
													<li>Investigate any missing packages or unwarranted returns</li>
													<li>Communicate daily earnings with Joey&#39;s prior to leaving the
															warehouse. </li>
												</ul>
												
												<p class="c14">Requirements: No experience needed! Just a good Attitude!. </p>
												
												<p>If you are a good fit for this position - please email us at <a class="c26" href="mailto:hr@joeyco.com">hr@joeyco.com</a>&nbsp;with your resume and the job description as the subject line and the city you would like to
														work in.</p>
												<a href="#" class="btn btn-basecolor1" data-toggle="modal" data-target="#applyNow">Apply Now</a>
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-header" id="heading2">
										<h5 class="mb-0">
											<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
											Warehouse Supervisor (Afternoon Shift)
											</button>
										</h5>
										</div>
										<div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordionExample1">
											<div class="card-body">
												<h5>Summary: </h5>
												<p>Come join one of the fastest growing startups in Canada, JoeyCo. We are a
														last-mile delivery platform that services enterprise clients across the country. Apply quickly If you want
														to be part of a dynamic, passionate team that works on a range of exciting projects, in partnership
														with. The Outbound Supervisor is the point-of-contact
														(&ldquo;right hand&rdquo;) to the Outbound Manager. The Outbound Supervisor must be a multi-tasker, and
														problem solver who seeks out challenges that others may not. The Outbound Supervisor must bring a high level
														of energy, enthusiasm and flexibility to adapt to any circumstance that is thrown at them. The Outbound
														Supervisor must always have a pulse on his team&rsquo;s needs and be able to step in whenever and wherever
														needed to lead his team to success. </p>
												
												<h5>Responsibilities: </h5>
												<ul>
													<li>Monitor support communication (through chat system) and ensure
															prompt and attentive responses for any live support issues.</li>
													<li>Continual inspection of the cleanliness of the facilities (both
															inside and outside) and ensure Joeys are following cleanliness and sanitation procedures.</li>
													<li>Manage &amp; monitor Joey processes including checking in/out of
															shifts, scanning packages, etc. </li>
													<li>Train and review JoeyCo app features with Joey&#39;s prior to
															departure. </li>
												</ul>
												<ul>
													<li>Manage daily manifest sheets. </li>
													<li>Process returns and unattempted orders that are brought back to
															the sort station.</li>
													<li>Follow up with Joeys on returns orders.</li>
													<li>Monitor performance of warehouse associate </li>
													<li>Review KPI with employees and keep things on track. </li>
												</ul>
												<p>Requirements: No experience needed! Just a good Attitude! </p>
												
												<p>If you are a good fit for this position - please email us at <a href="mailto:hr@joeyco.com">hr@joeyco.com</a>&nbsp;with your resume and the job description as the subject line and the city you would like to
														work in.</p>
												<a href="#" class="btn btn-basecolor1" data-toggle="modal" data-target="#applyNow">Apply Now</a>
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-header" id="heading3">
										<h5 class="mb-0">
											<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
											Warehouse Associate (Day Shift)
											</button>
										</h5>
										</div>
										<div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordionExample1">
											<div class="card-body">
				
												<h5>Summary:</h5>
												<p>Come join one of the fastest growing startups in Canada, JoeyCo. We are a
														last-mile delivery platform that services enterprise clients across the country. Apply quickly If you want
														to be part of a dynamic, passionate team that works on a range of exciting projects, in partnership
														with. The Warehouse Associate works closely with the
														Outbounding Team to work in harmony for a smooth operation. The Warehouse Associate controls all direction
														and movement once Joey has left the warehouse. The Warehouse Associate assumes responsibility for the
														management of route distributions amongst the Joeys and Brokers. The Day Warehouse Associate must possess a
														winning attitude, with an eye for detail. The Day Warehouse Associate is responsible for supporting the
														fleet, and must always be ready to coach, support and assist the team throughout the day. </p>
												<h5>Responsibilities</h5>
												<ul>
													<li>Route assignment for the Joeys </li>
													<li>Troubleshooting problematic routes </li>
													<li>Monitoring hourly status reports, pulse checks at 10:00AM, 12:00PM,
															4:00PM</li>
													<li>Arranging contingency routes/plans and managing a roster of
															&lsquo;on-call&rsquo; Joeys</li>
													<li>Troubleshooting live issues with any Joeys who are lagging on their
															route; deploying a contingency plan and communicating issues with a Manager</li>
													<li>Monitoring new hires, guiding them through their first few
															weeks/routes, offering support and coaching</li>
													<li>Continuously be proactive and seek out error-avoidance plans and
															solutions</li>
													<li>Continual inspection of the cleanliness of the facilities (both
															inside and outside) and ensure Joeys are following cleanliness and sanitation procedures.</li>
												</ul>
												
												<p>Requirements: No experience needed! Just a good Attitude! </p>
												
												<p>If you are a good fit for this position - please email us at <a href="mailto:hr@joeyco.com">hr@joeyco.com</a>&nbsp;with your resume and the job description as the subject line and the city you would like to
														work in.</p>
												<a href="#" class="btn btn-basecolor1" data-toggle="modal" data-target="#applyNow">Apply Now</a>
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-header" id="heading3">
										<h5 class="mb-0">
											<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
											Warehouse Associate (Afternoon Shift)
											</button>
										</h5>
										</div>
										<div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordionExample1">
											<div class="card-body">
				
												<h5>Summary: </h5>
												<p>Come join one of the fastest growing startups in Canada, JoeyCo. We are a
														last-mile delivery platform that services enterprise clients across the country. Apply quickly If you want
														to be part of a dynamic, passionate team that works on a range of exciting projects, in partnership
														with. The Afternoon Warehouse Associate must have an
														meticulous eye for detail. This role serves as an integral link of interdepartmental communication. The
														Warehouse Associate is the last line of defense in ensuring information has been properly relayed throughout
														the warehouse as necessary. The Warehouse Associate is in addition, the last line of defense in regards to
														quality assurance and customer satisfaction. </p>
												
												<h5>Responsibilities:</h5>
												
												<ul>
													<li>Monitor fleet progress</li>
													<li>Contact &amp; troubleshoot Joeys on route with a high quantity of
															unattempted deliveries </li>
													<li>&ldquo;Send &nbsp;Backup&rdquo; is sent to Joey&#39;s if needed
															before 6pm</li>
													<li>Complete hourly status reports monitor the progress of any new or
															&lsquo;at risk&rsquo; Joeys &nbsp;on route, maintain a pulse check prior to ending shift</li>
													<li>Review the Joeys app and ensure all orders have been
															closed</li>
													<li>Ensure Process returned orders in the system through the
															tracking history</li>
													<li>Ensure all ORDER Statuses have been updated accordingly </li>
													<li>Continual inspection of the cleanliness of the facilities (both
															inside and outside) and ensure Joeys are following cleanliness and sanitation procedures.</li>
												</ul>
												
												<p>Requirements: No experience needed! Just a good Attitude! </p>
												
												<p>If you are a good fit for this position - please email us at <a href="mailto:hr@joeyco.com">hr@joeyco.com</a>&nbsp;with your resume and the job description as the subject line and the city you would like to
														work in.</p>
												<a href="#" class="btn btn-basecolor1" data-toggle="modal" data-target="#applyNow">Apply Now</a>
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-header" id="heading4">
										<h5 class="mb-0">
											<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
											Warehouse Associate (Night Shift)
											</button>
										</h5>
										</div>
										<div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordionExample1">
											<div class="card-body">
				
												<h5>Summary: </h5>
												<p>Come join one of the fastest growing startups in Canada, JoeyCo. We are a
														last-mile delivery platform that services enterprise clients across the country. Apply quickly If you want
														to be part of a dynamic, passionate team that works on a range of exciting projects, in partnership
														with. The Inbound Team must move as one well-oiled machine.
														The team must work in harmony to optimize productivity and efficiency. The team is only as strong as the
														weakest link, therefore it is a shared responsibility of the team to coach, and motivate each other. 
												</p>
												
												<h5>Loader &amp; Pallet Controller</h5>
												<ul>
													<li>Load packages for labelling team </li>
													<li>Set and maintain a strong pace for packages being loaded onto the
															conveyor belt </li>
													<li>Feed packages to sortering team </li>
													<li>Clean up skids and surrounding areas</li>
													<li>Put skids away and the appropriate area </li>
													<li>Break down boxes and put in the recycling bin</li>
												</ul>
												
												<h5>Labelers </h5>
												<ul>
													<li>Label each package using tools provided </li>
													<li>Ensure invalid orders are put aside and managed by problem
															solving rep</li>
													<li>Control the pace of the belt and sort<br></li>
												</ul>
												<h5>Sorters </h5>
												<ul>
													<li>Start &amp; stop equipment as necessary </li>
													<li>Assist with production lines in factories </li>
													<li>Clean production area (sweep, mop, remove debris) 
													</li>
													<li>Load and unload items from machines, carts, and
															dollies</li>
													<li>Sort items on conveyor belts.</li>
													<li>Remove defective item </li>
													<li>Feed or place items onto equipment for processing
													</li>
												</ul>
												
												
												<p>Requirements: No experience needed! Just a good Attitude! </p>
												
												<p>If you are a good fit for this position - please email us at <a href="mailto:hr@joeyco.com">hr@joeyco.com</a>&nbsp;with your resume and the job description as the subject line and the city you would like to
														work in.</p>
												<a href="#" class="btn btn-basecolor1" data-toggle="modal" data-target="#applyNow">Apply Now</a>
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-header" id="heading5">
										<h5 class="mb-0">
											<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
											Account Executive
											</button>
										</h5>
										</div>
										<div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordionExample1">
											<div class="card-body">
												<h5>Summary: </h5>
												<p>Come join one of the fastest growing startups in Canada, JoeyCo. We are a
														last-mile delivery platform that services enterprise clients across the country. Apply quickly If you want
														to be part of a dynamic, passionate team that works on a range of exciting projects, in partnership
														with.&nbsp;Joeyco is
														growing again and looking for an Account Executive that is eager to join one of Canada&#39;s fastest-growing
														last-mile delivery company. As our Account Executive, your mission is to increase JoeyCo Inc&rsquo;s
														customer base through inbound and outbound lead management, prospect qualification, and procurement through
														an effective demonstration of our product while continuously working through your pipeline of
														opportunities.</p>
												<h5>Day to day responsibilities:</h5>
												<ul>
													<li>Represent JoeyCo Inc in a positive and professional
															manner</li>
													<li>Continually increase your product and industry knowledge through
															self-education and working with our Customer Success team and other departments</li>
													<li>Source new sales opportunities through outbound cold calls,
															networking and social media</li>
													<li>Quickly understand prospects requirements, offering
															appropriate JoeyCo Inc solutions to meet their needs and timelines</li>
													<li>Move opportunities through the sales cycle to become a paying
															customer through proper pipeline management</li>
													<li>Meet and exceed sales targets set by the Director of
															Sales</li>
													<li>Follow-up with product literature, videos, and other campaign
															materials</li>
													<li>Create, maintain, and update CRM records with complete
															opportunity information, prospect communication and next step details</li>
													<li>Prepare and maintain accurate funnel reports for Business
															Managers</li>
													<li>Provide weekly updates and reports on a one to one meeting with
															the Director of Sales</li>
													<li>Any other tasks assigned to you</li>
												</ul>
												<h5>Requirements:</h5>
												<ul>
													<li>2+ years of experience in a logistics/ courier role within a
															fast, high-paced environment</li>
													<li>Be driven, self-motivated and hungry for success</li>
													<li>Provide a proven track record of meeting and exceeding sales
															targets</li>
													<li>Possess a strong desire and ambition to help generate revenue
															for the business</li>
													<li>Exhibit a strong phone presence with superior communication and
															presentation skills</li>
													<li>Maintain a flexible attitude and demonstrated ability, as well
															as a willingness to go above and beyond the job description to achieve success</li>
													<li>Ability to multi-task, prioritize, and manage time
															effectively</li>
													<li>Ability to work independently and in a remote environment</li>
												</ul>
												
												<p>If you are a good fit for this position - please email us at <a href="mailto:hr@joeyco.com">hr@joeyco.com</a>&nbsp;with your resume and the job description as the subject line and the city you would like to
														work in.</p>
												<a href="#" class="btn btn-basecolor1" data-toggle="modal" data-target="#applyNow">Apply Now</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="Montreal" role="tabpanel" aria-labelledby="Montreal-tab">
								<div class="cs-accordion" id="accordionExample2">
									<div class="card">
										<div class="card-header" id="heading6">
										<h5 class="mb-0">
											<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
											Joey Trainer
											</button>
										</h5>
										</div>
										<div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#accordionExample2">
											<div class="card-body">
												<h5>Summary: </h5>
												<p>Come join one of the fastest growing startups in Canada, JoeyCo. We are a
														last-mile delivery platform that services enterprise clients across the country. Apply quickly If you want
														to be part of a dynamic, passionate team that works on a range of exciting projects, in partnership
														with. JoeyCo is currently seeking a hardworking, dedicated,
														and motivated individual to join our growing team. You will be part of a dynamic, fast-paced work
														environment alongside a team of ambitious industry leaders. Reporting to the
														Recruitment Manager, the Joey Trainer &amp; Manager will oversee all training delivery activities virtually
														and in a field environment. </p>
												
												<h5>Responsibilities: </h5>
												<ul class="c9 lst-kix_o0082a9bzn5m-0 start">
													<li class="c4 li-bullet-0">Screen resumes, schedule interviews and conduct interviews
													</li>
													<li class="c4 li-bullet-0">Monitor the hiring needs of each city and maintain the hiring
															standards</li>
													<li class="c4 li-bullet-0">Assisting with the recruitment and on-boarding of contractors
													</li>
													<li class="c4 li-bullet-0">Manage all hiring reports and
															documents&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
													<li class="c4 li-bullet-0">Organize, conduct and oversee training, coaching and Joey
															performances</li>
													<li class="c4 li-bullet-0">Facilitate ongoing training programs and assist with the on-time
															execution of training requirements</li>
													<li class="c4 li-bullet-0">Develop training modules and support continuous improvement
															initiatives</li>
													<li class="c4 li-bullet-0">Maintain an open line of communications to ensure the hiring
															criterias and requirements are met</li>
													<li class="c4 li-bullet-0">Ensure that training resources are managed efficiently and aligned
															with the business plan</li>
													<li class="c4 li-bullet-0">Coordinate with teams to effectively manage training inventory and
															make recommendations on process improvements</li>
													<li class="c4 li-bullet-0">Coordinate additional training for new Joeys as necessary
													</li>
													<li class="c4 li-bullet-0">Assist in maintaining a roster of back up or &nbsp;&lsquo;On
															call&rsquo; Joeys to fill scheduling gaps</li>
													<li class="c4 li-bullet-0">Administrative duties, document verification, filing</li>
												</ul>
												
												<h5>Requirements:</h5>
												<ul class="c9 lst-kix_o0082a9bzn5m-0">
													<li class="c4 li-bullet-0">Minimum three (3) years experience as a Recruiter in the courier
															/ transportation, distribution industry specifically in large teams</li>
													<li class="c4 li-bullet-0">Some experience managing, developing, and delivering training
													</li>
													<li class="c4 li-bullet-0">Excellent written and verbal communication skills </li>
													<li class="c4 li-bullet-0">High degree of accuracy and attention to detail required</li>
													<li class="c4 li-bullet-0">Comfortable working in a fast-paced environment</li>
													<li class="c4 li-bullet-0">Experience working both independently and in a team-oriented,
															collaborative environment</li>
													<li class="c4 li-bullet-0">Strong technical aptitude, and experience working with Windows OS
															and MS Office suite</li>
													<li class="c4 li-bullet-0">Ability to work under pressure, prioritize and to deliver against
															deadline<br></li>
												</ul>
												<p>If you are a good fit for this position - please email us at <a href="mailto:hr@joeyco.com">hr@joeyco.com</a>&nbsp;with your resume and the job description as the subject line and the city you would like to
														work in.</p>
												<a href="#" class="btn btn-basecolor1" data-toggle="modal" data-target="#applyNow">Apply Now</a>
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-header" id="heading7">
										<h5 class="mb-0">
											<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
											Warehouse Associate (Day Shift)
											</button>
										</h5>
										</div>
										<div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#accordionExample2">
											<div class="card-body">
				
												<h5>Summary:</h5>
												<p>Come join one of the fastest growing startups in Canada, JoeyCo. We are a
														last-mile delivery platform that services enterprise clients across the country. Apply quickly If you want
														to be part of a dynamic, passionate team that works on a range of exciting projects, in partnership
														with. The Warehouse Associate works closely with the
														Outbounding Team to work in harmony for a smooth operation. The Warehouse Associate controls all direction
														and movement once Joey has left the warehouse. The Warehouse Associate assumes responsibility for the
														management of route distributions amongst the Joeys.<br>Responsibilities</p>
												<ul class="c9 lst-kix_1uavfxvhuebp-0">
													<li>Route assignment for the Joeys </li>
													<li>Troubleshooting problematic routes </li>
													<li>Monitoring hourly status reports, pulse checks at 10:00AM, 12:00PM,
															4:00PM</li>
													<li>Arranging contingency routes/plans and managing a roster of
															&lsquo;on-call&rsquo; Joeys</li>
													<li>Troubleshooting live issues with any Joeys who are lagging on their
															route; deploying a contingency plan and communicating issues with a Manager</li>
													<li>Monitoring new hires, guiding them through their first few
															weeks/routes, offering support and coaching</li>
													<li>Continuously be proactive and seek out error-avoidance plans and
															solutions</li>
													<li>Continual inspection of the cleanliness of the facilities (both
															inside and outside) and ensure Joeys are following cleanliness and sanitation procedures.</li>
												</ul>
												
												<p>Requirements: No experience needed! Just a good Attitude! </p>
												
												<p>If you are a good fit for this position - please email us at <a href="mailto:hr@joeyco.com">hr@joeyco.com</a>&nbsp;with your resume and the job description as the subject line and the city you would like to
														work in.</p>
												<a href="#" class="btn btn-basecolor1" data-toggle="modal" data-target="#applyNow">Apply Now</a>
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-header" id="heading8">
										<h5 class="mb-0">
											<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
											Warehouse Associate (Afternoon Shift)
											</button>
										</h5>
										</div>
										<div id="collapse8" class="collapse" aria-labelledby="heading8" data-parent="#accordionExample2">
											<div class="card-body">
												<h5>Summary: </h5>
												<p>Come join one of the fastest growing startups in Canada, JoeyCo. We are a
														last-mile delivery platform that services enterprise clients across the country. Apply quickly If you want
														to be part of a dynamic, passionate team that works on a range of exciting projects, in partnership
														with. The Afternoon Warehouse Associate must have an
														meticulous eye for detail. This role serves as an integral link of interdepartmental communication. The
														Warehouse Associate is the last line of defense in ensuring information has been properly relayed throughout
														the warehouse as necessary. TheWarehouse Associate is in addition, the last line of defense in regards to
														quality assurance and customer satisfaction. </p>
												
												<h5>Responsibilities:</h5>
												
												<ul class="c9 lst-kix_bukwpqk0a66b-0">
													<li>Monitor fleet progress</li>
													<li>Contact &amp; troubleshoot Joeys on route with a high quantity of
															unattempted deliveries </li>
													<li>&ldquo;Send &nbsp;Backup&rdquo; is sent to Joey&#39;s if needed
															before 6pm</li>
													<li>Complete hourly status reports, monitor the progress of any new or
															&lsquo;at risk&rsquo; Joeys &nbsp;on route, maintain a pulse check prior to ending shift</li>
													<li>Review the Joeys app and ensure all orders have been
															closed</li>
													<li>Ensure Process returned orders in the system through the
															tracking history</li>
													<li>Ensure all ORDER Statuses have been updated accordingly </li>
													<li>Continual inspection of the cleanliness of the facilities (both
															inside and outside) and ensure Joeys are following cleanliness and sanitation procedures.</li>
												</ul>
												
												<p>Requirements: No experience needed! Just a good Attitude! </p>
												
												<p>If you are a good fit for this position - please email us at <a href="mailto:hr@joeyco.com">hr@joeyco.com</a>&nbsp;with your resume and the job description as the subject line and the city you would like to
														work in.</p>
												<a href="#" class="btn btn-basecolor1" data-toggle="modal" data-target="#applyNow">Apply Now</a>
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-header" id="heading9">
										<h5 class="mb-0">
											<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
											Warehouse Associate (Night Shift)
											</button>
										</h5>
										</div>
										<div id="collapse9" class="collapse" aria-labelledby="heading9" data-parent="#accordionExample2">
											<div class="card-body">
												<h5>Summary: </h5>
												<p>Come join one of the fastest growing startups in Canada, JoeyCo. We are a
														last-mile delivery platform that services enterprise clients across the country. Apply quickly If you want
														to be part of a dynamic, passionate team that works on a range of exciting projects, in partnership
														with. The Inbound Team must move as one well-oiled machine.
														The team must work in harmony to optimize productivity and efficiency. The team is only as strong as the
														weakest link, therefore it is a shared responsibility of the team to coach, and motivate each other. 
												</p>
												
												<h5>Loader &amp; Pallet Controller</h5>
												<ul class="c9 lst-kix_wokxb6yhorg3-0">
													<li>Load packages for labelling team </li>
													<li>Set and maintain a strong pace for packages being loaded onto the
															conveyor belt </li>
													<li>Feed packages to sortering team </li>
													<li>Clean up skids and surrounding areas</li>
													<li>Put skids away and the appropriate area </li>
													<li>Break down boxes and put in the recycling bin</li>
												</ul>
												
												<h5>Labelers </h5>
												<ul class="c9 lst-kix_n6my6p8jpzsk-0">
													<li>Label each package using tools provided </li>
													<li>Ensure invalid orders are put aside and managed by problem
															solving rep</li>
													<li>Control the pace of the belt and sort<br></li>
												</ul>
												<h5>Sorters </h5>
												<ul class="c9 lst-kix_ajfcvoqmghcu-0">
													<li>Start &amp; stop equipment as necessary </li>
													<li>Assist with production lines in factories </li>
													<li>Clean production area (sweep, mop, remove debris) 
													</li>
													<li>Load and unload items from machines, carts, and
															dollies</li>
													<li>Sort items on conveyor belts.</li>
													<li>Remove defective item </li>
													<li class="c6 c12 c20 li-bullet-0">Feed or place items onto equipment for processing
													</li>
												</ul>
												<p><br>Requirements: No experience needed! Just a good Attitude! </p>
												
												<p>If you are a good fit for this position - please email us at <a href="mailto:hr@joeyco.com">hr@joeyco.com</a>&nbsp;with your resume and the job description as the subject line and the city you would like to
														work in.</p>
												<a href="#" class="btn btn-basecolor1" data-toggle="modal" data-target="#applyNow">Apply Now</a>
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-header" id="heading10">
										<h5 class="mb-0">
											<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
											Account Executive
											</button>
										</h5>
										</div>
										<div id="collapse10" class="collapse" aria-labelledby="heading10" data-parent="#accordionExample2">
											<div class="card-body">
												<h5>Summary: </h5>
												<p>Come join one of the fastest growing startups in Canada, JoeyCo. We are a
														last-mile delivery platform that services enterprise clients across the country. Apply quickly If you want
														to be part of a dynamic, passionate team that works on a range of exciting projects, in partnership
														with. Joeyco is growing again and looking for an
														Account Executive that is eager to join one of Canada&#39;s fastest-growing last-mile delivery company. As
														our Account Executive, your mission is to increase JoeyCo Inc&rsquo;s customer base through inbound and
														outbound lead management, prospect qualification, and procurement through an effective demonstration of our
														product while continuously working through your pipeline of opportunities.</p>
												<h5>Day to day responsibilities:</h5>
												<ul class="c9 lst-kix_j35zpbmelbgc-0">
													<li>Represent JoeyCo Inc in a positive and professional
															manner</li>
													<li>Continually increase your product and industry knowledge through
															self-education and working with our Customer Success team and other departments</li>
													<li>Source new sales opportunities through outbound cold calls,
															networking and social media</li>
													<li>Quickly understand prospects requirements, offering
															appropriate JoeyCo Inc solutions to meet their needs and timelines</li>
													<li>Move opportunities through the sales cycle to become a paying
															customer through proper pipeline management</li>
													<li>Meet and exceed sales targets set by the Director of
															Sales</li>
													<li>Follow-up with product literature, videos, and other campaign
															materials</li>
													<li>Create, maintain, and update CRM records with complete
															opportunity information, prospect communication and next step details</li>
													<li>Prepare and maintain accurate funnel reports for Business
															Managers</li>
													<li>Provide weekly updates and reports on a one to one meeting with
															the Director of Sales</li>
													<li>Any other tasks assigned to you</li>
												</ul>
												<h5>Requirements</h5>
												<ul class="c9 lst-kix_5v1d09hxqguv-0">
													<li>2+ years of experience in a logistics/ courier role within a
															fast, high-paced environment</li>
													<li>Be driven, self-motivated and hungry for success</li>
												</ul>
												<ul class="c9 lst-kix_6ae3582vu8ao-0">
													<li>Provide a proven track record of meeting and exceeding sales
															targets</li>
													<li>Possess a strong desire and ambition to help generate revenue
															for the business</li>
													<li>Exhibit a strong phone presence with superior communication and
															presentation skills</li>
													<li>Maintain a flexible attitude and demonstrated ability, as well
															as a willingness to go above and beyond the job description to achieve success</li>
													<li>Ability to multi-task, prioritize, and manage time
															effectively</li>
													<li>Ability to work independently and in a remote
															environment</li>
												</ul>
												<p>If you are a good fit for this position - please email us at <a href="mailto:hr@joeyco.com">hr@joeyco.com</a>&nbsp;with your resume and the job description as the subject line and the city you would like to
														work in.</p>
												<a href="#" class="btn btn-basecolor1" data-toggle="modal" data-target="#applyNow">Apply Now</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="Toronto" role="tabpanel" aria-labelledby="Toronto-tab">
								<div class="cs-accordion" id="accordionExample3">
									<div class="card">
										<div class="card-header" id="heading11">
										<h5 class="mb-0">
											<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse11" aria-expanded="false" aria-controls="collapse11">
											Recruitment Specialist
											</button>
										</h5>
										</div>
										<div id="collapse11" class="collapse" aria-labelledby="heading11" data-parent="#accordionExample3">
											<div class="card-body">
												
												<h5>Summary: </h5>
												
												<p>Come join one of the fastest growing startups in Canada, JoeyCo. We are a
														last-mile delivery platform that services enterprise clients across the country. Apply quickly If you want
														to be part of a dynamic, passionate team that works on a range of exciting projects, in partnership
														with. JoeyCo is currently seeking a hardworking,
														dedicated, and motivated individual to join our growing team. You will be part of a dynamic, fast-paced work
														environment alongside a team of ambitious industry leaders.</p>
												<h5>Responsibilities:</h5>
												<ul class="c9 lst-kix_qllah6wn4g9p-0 start">
													<li class="c3 li-bullet-0">Booking and managing calendars</li>
													<li>Booking training and information sessions</li>
													<li>Calling up new signups</li>
													<li class="c3 li-bullet-0">Drafting internal &amp; external communications - emails, reports,
															presentations, etc.</li>
													<li class="c3 li-bullet-0">Assisting with the recruitment and onboarding of drivers
													</li>
													<li class="c3 li-bullet-0">Managing &amp; filing sensitive documents</li>
													<li class="c3 li-bullet-0">Audit summary reports</li>
													<li class="c3 li-bullet-0">Conducting background checks</li>
												</ul>
												<h5>Requirements:</h5>
												<ul class="c9 lst-kix_99ycrlvfnsh-0 start">
													<li>Previous calling/dialing experience is required</li>
													<li class="c3 li-bullet-0">Highly organized with attention to detail </li>
													<li class="c3 li-bullet-0">Excellent written and verbal communication skills - must be very
															comfortable with speaking on the phone &amp; fluent in English</li>
													<li class="c3 li-bullet-0">Ability to work under pressure, prioritize and to deliver against
															deadlines</li>
													<li class="c3 li-bullet-0">Aptitude for internet tools and the ability to learn quickly
													</li>
													<li class="c3 li-bullet-0">Proficient in Microsoft Word, Excel, Powerpoint, Google
															Suite</li>
													<li class="c3 li-bullet-0">Problem solver, adaptable, confident &amp; motivated worker</li>
												</ul>
												<p>** Must be willing to work some evenings / weekends ***</p>
												<p>If you are a good fit for this position - please email us at <a href="mailto:hr@joeyco.com">hr@joeyco.com</a>&nbsp;with your resume and the job description as the subject line and the city you would like to
														work in.</p>
												<a href="#" class="btn btn-basecolor1" data-toggle="modal" data-target="#applyNow">Apply Now</a>
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-header" id="heading12">
										<h5 class="mb-0">
											<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
											Warehouse Associate (Afternoon Shift)
											</button>
										</h5>
										</div>
										<div id="collapse12" class="collapse" aria-labelledby="heading12" data-parent="#accordionExample3">
											<div class="card-body">
												<h5>Summary: </h5>
												<p>Come join one of the fastest growing startups in Canada, JoeyCo. We are a
														last-mile delivery platform that services enterprise clients across the country. Apply quickly If you want
														to be part of a dynamic, passionate team that works on a range of exciting projects, in partnership
														with The Inbound Team must move as one well-oiled machine. The team must work in
														harmony to optimize productivity and efficiency. The team is only as strong as the weakest link, therefore
														it is a shared responsibility of the team to coach, and motivate each other. </p>
												
												<h5>Loader &amp; Pallet Controller</h5>
												<ul class="c9 lst-kix_wokxb6yhorg3-0">
													<li>Load packages for labelling team </li>
													<li>Set and maintain a strong pace for packages being loaded onto the
															conveyor belt </li>
													<li>Feed packages to sortering team </li>
													<li>Clean up skids and surrounding areas</li>
													<li>Put skids away and the appropriate area </li>
													<li>Break down boxes and put in the recycling bin</li>
												</ul>
												
												<h5>Labelers </h5>
												<ul class="c9 lst-kix_n6my6p8jpzsk-0">
													<li>Label each package using tools provided </li>
													<li>Ensure invalid orders are put aside and managed by problem
															solving rep</li>
													<li>Control the pace of the belt and sort<br></li>
												</ul>
												<h5>Sorters </h5>
												<ul class="c9 lst-kix_ajfcvoqmghcu-0">
													<li>Start &amp; stop equipment as necessary </li>
													<li>Assist with production lines in factories </li>
													<li>Clean production area (sweep, mop, remove debris) 
													</li>
													<li>Load and unload items from machines, carts, and
															dollies</li>
													<li>Sort items on conveyor belts.</li>
													<li>Remove defective item </li>
													<li>Feed or place items onto equipment for processing
													</li>
												</ul>
												
												<p>Requirements: No experience needed! Just a good Attitude! </p>
												
												<p>If you are a good fit for this position - please email us at <a href="mailto:hr@joeyco.com">hr@joeyco.com</a>&nbsp;with your resume and the job description as the subject line and the city you would like to
														work in.</p>
												<a href="#" class="btn btn-basecolor1" data-toggle="modal" data-target="#applyNow">Apply Now</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="Pakistan" role="tabpanel" aria-labelledby="Pakistan-tab">
								<div class="cs-accordion" id="accordionExample4">
									<div class="card">
										<div class="card-header" id="heading13">
										<h5 class="mb-0">
											<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse13" aria-expanded="false" aria-controls="collapse13">
											Security Analyst
											</button>
										</h5>
										</div>
										<div id="collapse13" class="collapse" aria-labelledby="heading13" data-parent="#accordionExample4">
											<div class="card-body">
												{{--<p>Pakistan</p>--}}
												<h5>Summary:</h5>
												<p>Come join one of the fastest
														growing startups in Canada, JoeyCo. We are a last-mile delivery platform that services enterprise clients
														across the country. Apply quickly If you want to be part of a dynamic, passionate team that works on a range
														of exciting projects, in partnership with. We are looking for a skilled Security Analyst to analyze software
														design and implementations from a security perspective, and to identify and resolve security issues. Your
														day to day will include, but is not limited to the appropriate security analysis, defenses and
														countermeasures at each phase of the software development lifecycle, and to help produce a robust and
														reliable software system.</p>
												<h5>Responsibilities:</h5>
												<ul class="c9 lst-kix_m9ytupq1gsnc-0 start">
													<li>Perform on-going security testing and code review to improve
															software security and provide recommended remediation steps</li>
													<li>Find cost-effective solutions to cyber security problems</li>
													<li>Provide new and effective solutions to mitigate
															vulnerabilities</li>
													<li>Develop and maintain technical documents on security
															systems</li>
													<li>Develop a familiarity with new tools and best practices in cyber
															security</li>
													<li>Have a good understanding of in all domains of cyber security
															e.g. Risk assessment and vulnerabilities</li>
													<li>Should be knowledgeable about penetration tests</li>
												</ul>
												<h5>Requirement: </h5>
												<ul class="c9 lst-kix_z86qe762h3m-0 start">
													<li>One of the following certifications: CISSP, OSCP, OSCE, CCSP,
															GSEC, Security+</li>
													<li>Participation in Capture the Flag (CTFs) or other
															cyber security competitions</li>
													<li>Bachelor&#39;s degree or equivalent in Informational Technology
															(IT), Computer Science or related discipline.</li>
													<li>Strong knowledge and understanding of the PHP languages.
													</li>
													<li>At least 2-5 years experience in the cyber security
															industry</li>
													<li class="c11 c30 li-bullet-0">Comfortable working in a fast-paced environment
													</li>
													<li class="c11 c30 li-bullet-0">Well Organized individuals with strong communication
															will be given preference.</li>
													<li class="c11 c30 li-bullet-0">Critical thinking skills and the ability to solve
															problems as they arise</li>
												</ul>
												<p>If you are a good fit for this position - please email us at <a href="mailto:hr@joeyco.com">hr@joeyco.com</a>&nbsp;with your resume and the job description as the subject line and the city you would like to
														work in.</p>
											
											
												<a href="#" class="btn btn-basecolor1" data-toggle="modal" data-target="#applyNow">Apply Now</a>
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-header" id="heading15">
										<h5 class="mb-0">
											<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse15" aria-expanded="false" aria-controls="collapse15">
											Route Specialist
											</button>
										</h5>
										</div>
										<div id="collapse15" class="collapse" aria-labelledby="heading15" data-parent="#accordionExample4">
											<div class="card-body">
												<h5>Summary:</h5>
												<p>We are looking for a committed and hardworking individual who will be
														responsible for logistics administration, assisting with daily routing and routing-related tasks. We are
														looking for a candidate who is tech-savvy and proficient in using technology. Must be comfortable using
														several programs to create routes. The candidate must be thorough and pay attention to detail while working
														at all times.</p>
												<h5>Responsibilities:</h5>
												<p>The day-to-day responsibilities include:</p>
												<ul class="c9 lst-kix_oh1x8t2xnzt4-0 start">
													<li>To prepare information on required transportation schedules and
															route planning</li>
													<li>Ensure that routes being created are the most
															time-efficient</li>
													<li>Able to determine any errors or problems in the routes being
															created, and find solutions to the errors or problems in a prompt and efficient manner</li>
													<li>Fixing addresses and any other client information on orders
															where the information is invalid or incomplete</li>
													<li>To ensure maintenance of a route in case of any derailment &amp;
															responsible for any other changes regarding different routes</li>
													<li>Research and obtain further information for incomplete
															documents</li>
													<li>Respond to queries for information and access relevant
															files</li>
													<li>Comply with data integrity and security policies</li>
													<li>Thorough and pay close attention to detail while working at all
															times</li>
													<li>Use several different programs to assist with route creation and
															ensure that all the routes created are the most efficient</li>
												</ul>
												<h5>Requirements:</h5>
												<ul class="c9 lst-kix_se900fdlpa6-0 start">
													<li>No prior experience is required</li>
													<li>Bachelor&rsquo;s degree</li>
													<li>Candidates familiar with Data Entry, Route Auditing,
															Logistics, Ecommerce (Last Mile) will be preferred</li>
												</ul>
												<ul class="c9 lst-kix_s6opb725htsz-0 start">
													<li>Tech Savvy</li>
													<li>Thorough and attention to detail</li>
													<li>Reliable and Punctual</li>
													<li>Committed and Hardworking</li>
													<li>Problem solver</li>
													<li>Looking to grow within the organization</li>
												</ul>
												<ul class="c9 lst-kix_crt70ekc4e90-0 start">
													<li>Comfortable working in a fast-paced environment</li>
													<li>Well Organized individuals with strong communication will be
															given preference</li>
													<li>Comfortable adapting to changes as required</li>
												</ul>
												<p class="c20 c12 c19 c28"></p>
												<p>If you are a good fit for this position - please email us at <a href="mailto:hr@joeyco.com">hr@joeyco.com</a>&nbsp;with your resume and the job description as the subject line and the city you would like to
														work in.</p>
												<a href="#" class="btn btn-basecolor1" data-toggle="modal" data-target="#applyNow">Apply Now</a>
											</div>
										</div>
									</div>
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

