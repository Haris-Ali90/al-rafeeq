<div class="modal fade bd-example-modal-lg custom-modal-style" id="bookDemo" tabindex="-1" role="dialog" aria-labelledby="bookDemoTitle" aria-hidden="true">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<button type="button" class="modal-close-btn" data-dismiss="modal"><i class="icofont-close-line"></i></button>

					<div class="hgroup seperator_left">
						<h2>Book A Demo</h2>
						<p>Please fill all the fields to book a demo, our support advisor will contact you within 24 to 48 hours.</p>
					</div>

					<div class="modal-body">
						<form action="{{route('bookADemo')}}" id="step1-form" class="needs-validation"  method="post">
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
									<input type="number" min="0" pattern="/^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$/i" class="form-control form-control-lg" placeholder="Phone number" name="phone" minlength="6" maxlength="16" required>
									<div class="invalid-feedback">
										The given data is not valid
									</div>
								</div>
								<div class="form-group style2 col-12 no-min-h">
									<input type="number" class="form-control form-control-lg" placeholder="Shipments Per Month" name="phone" required minlength="6" maxlength="16">
									<div class="invalid-feedback">
										The given data is not valid
									</div>
								</div>
								<div class="form-group style2 col-12 no-min-h">
									<textarea class="form-control form-control-lg" placeholder="Type your message here" rows="4" name="message" required></textarea>
								</div>
							</div>

							<div class="signup_buttons_wrap">
								<button type="submit" class="btn btn-primary btn-lg uppercase submitButton">Book Now</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
