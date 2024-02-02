@extends('includes.layout')

         @section('content')
         <main id="main" class="page-announcements">
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
							<li><a href="#">Announcements</a></li>
						</ul>
					</div>
				</div>

				<div class="heading_area">
					<div class="container">
						<div class="row">
							<div class="col-12 col-sm-8 col-md-6">
								<h1 class="main_heading">Announcements</h1>
								<p>Deliver same-day with us for cheaper than next day with them. Contact our sales team to receive a custom quote.</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<section class="section white-bg">
				<div class="container md">
					<div class="announcements_list">
						<div class="announcement_box">
							<div class="date">
								12 August 2021
							</div>
							<div class="cnt">
								<h3 class="title">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
							</div>
							<div class="action mt-10">
								<a href="#" class="btn btn-bc1lightest btn-border" data-toggle="modal" data-target="#announcement">View Detail</a>
							</div>
						</div>

						<div class="announcement_box">
							<div class="date">
								12 August 2021
							</div>
							<div class="cnt">
								<h3 class="title">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
							</div>
							<div class="action mt-10">
								<a href="#" class="btn btn-bc1lightest btn-border" data-toggle="modal" data-target="#announcement">View Detail</a>
							</div>
						</div>

						<div class="announcement_box">
							<div class="date">
								12 August 2021
							</div>
							<div class="cnt">
								<h3 class="title">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
							</div>
							<div class="action mt-10">
								<a href="#" class="btn btn-bc1lightest btn-border" data-toggle="modal" data-target="#announcement">View Detail</a>
							</div>
						</div>

						<div class="announcement_box">
							<div class="date">
								12 August 2021
							</div>
							<div class="cnt">
								<h3 class="title">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
							</div>
							<div class="action mt-10">
								<a href="#" class="btn btn-bc1lightest btn-border" data-toggle="modal" data-target="#announcement">View Detail</a>
							</div>
						</div>

						<div class="announcement_box">
							<div class="date">
								12 August 2021
							</div>
							<div class="cnt">
								<h3 class="title">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
							</div>
							<div class="action mt-10">
								<a href="#" class="btn btn-bc1lightest btn-border" data-toggle="modal" data-target="#announcement">View Detail</a>
							</div>
						</div>

						<div class="announcement_box">
							<div class="date">
								12 August 2021
							</div>
							<div class="cnt">
								<h3 class="title">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
							</div>
							<div class="action mt-10">
								<a href="#" class="btn btn-bc1lightest btn-border" data-toggle="modal" data-target="#announcement">View Detail</a>
							</div>
						</div>

						<div class="announcement_box">
							<div class="date">
								12 August 2021
							</div>
							<div class="cnt">
								<h3 class="title">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
							</div>
							<div class="action mt-10">
								<a href="#" class="btn btn-bc1lightest btn-border" data-toggle="modal" data-target="#announcement">View Detail</a>
							</div>
						</div>
					</div>
				</div>
			</section>

		</div>
         @include('includes.clientFooter')
    </main>
@endsection

