@extends('includes.layout')

         @section('content')
         <main id="main" class="page-testimonials">
          @include('includes.clientHeader')
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
							<li><a href="#">Testimonials</a></li>
						</ul>
					</div>
				</div>

				<div class="heading_area">
					<div class="container">
						<div class="row">
							<div class="col-12 col-sm-8 col-md-6">
								<h1 class="main_heading">Testimonials</h1>
								<p>Deliver same-day with us for cheaper than next day with them. Contact our sales team to receive a custom quote.</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<section class="section white-bg">
				<div class="container md">
					<div class="testimonials_list">
						<div class="testimonial_box d-flex">
							<div class="propfile_img_wrap align-center">
								<div class="propfile_img circle-radius marginauto"><img src="{{asset('/')}}images/profile_img.jpg" alt=""></div>
								<div class="profile_info align-center mt-10">
									<h5>John Doe</h5>
									<a href="#" class="btn btn-xs btn-bc1lightest">Joey</a>
								</div>
							</div>
							<div class="info">
								<div class="cnt">
									<h3 class="title">The platform is super intuitive, transparent, and easy to use.</h3>
									<p>We've only had positive experiences using JoeyCo so far. The platform is super intuitive, transparent, and easy to use and makes managing multiple shipments much, much easier, saving us a lot of time that can be spent on other business areas. The team is super attentive and helpful when it comes to shipping needs, but also with warehousing if needed. I would definitely recommend it for small, and scale-up businesses, without thinking twice!</p>
								</div>
							</div>
						</div>
						<div class="testimonial_box d-flex">
							<div class="propfile_img_wrap align-center">
								<div class="propfile_img circle-radius marginauto"><img src="{{asset('/')}}images/profile_img2.jpg" alt=""></div>
								<div class="profile_info align-center mt-10">
									<h5>John Doe</h5>
									<a href="#" class="btn btn-xs btn-bc1lightest">Joey</a>
								</div>
							</div>
							<div class="info">
								<div class="cnt">
									<h3 class="title">JoeyCo’s customer service is absolutely amazing.</h3>
									<p>JoeyCo’s customer service is absolutely amazing. Again, I identified a small problem with not being able to add an origin for the goods I send, which incurs import duties. JoeyCo are now implementing this to their platform and have added a special exception to my account so my shipments do not incorrectly attract import duties when shipping from the UK to the EU using their DDP solution.</p>
									<p>It’s almost unheard of that a company these days will go to these lengths to make improvements. It’s impressive.</p>
								</div>
							</div>
						</div>
						<div class="testimonial_box d-flex">
							<div class="propfile_img_wrap align-center">
								<div class="propfile_img circle-radius marginauto"><img src="{{asset('/')}}images/profile_img3.jpg" alt=""></div>
								<div class="profile_info align-center mt-10">
									<h5>John Doe</h5>
									<a href="#" class="btn btn-xs btn-bc1lightest">Joey</a>
								</div>
							</div>
							<div class="info">
								<div class="cnt">
									<h3 class="title">JoeyCo's customer support team is always quick and responsive.</h3>
									<p>JoeyCo's customer support team is always quick and responsive, would highly recommend as someone who has a background in support and troubleshooting.</p>
								</div>
							</div>
						</div>
						<div class="testimonial_box d-flex">
							<div class="propfile_img_wrap align-center">
								<div class="propfile_img circle-radius marginauto"><img src="{{asset('/')}}images/profile_img.jpg" alt=""></div>
								<div class="profile_info align-center mt-10">
									<h5>John Doe</h5>
									<a href="#" class="btn btn-xs btn-bc1lightest">Joey</a>
								</div>
							</div>
							<div class="info">
								<div class="cnt">
									<h3 class="title">EasyShip's customer support team is always quick and responsive.</h3>
									<p>EasyShip's customer support team is always quick and responsive, would highly recommend as someone who has a background in support and troubleshooting.</p>
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

