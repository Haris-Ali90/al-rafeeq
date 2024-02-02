@extends('includes.layout')
@section('content')
   <main id="main" class="page-signup">
		<section id="top-section" class="signup">
		 @include('includes/clientHeader')
		</section>

		<section class="signup-form-wrap">
			<div class="container">
				<form action="" id="signup-form"  class="needs-validation ssr-validation" novalidate>
					<!-- Form section [Start] -->
					<div class="form-section">
						<h3 class="form-title">Personal Information</h3>
						<div class="form-row">
							<div class="col-12 col-sm-6 col-md-6">
								<div class="form-group no-min-h">
									<input type="text" class="form-control form-control-lg" placeholder="First Name" name="firstName" required>
									<div class="invalid-feedback">First name is required.</div>
								</div>
							</div>
							<div class="col-12 col-sm-6 col-md-6">
								<div class="form-group no-min-h">
									<input type="text" class="form-control form-control-lg" placeholder="Last Name" name="lastName" required>
								</div>
							</div>
							<div class="col-12 col-sm-6 col-md-6">
								<div class="form-group no-min-h">
									<input type="phone" class="form-control form-control-lg" placeholder="Phone" name="phone" required>
								</div>
							</div>
							<div class="col-12 col-sm-6 col-md-6">
								<div class="form-group no-min-h">
									<input type="email" class="form-control form-control-lg" placeholder="Email" name="email" required>
								</div>
							</div>
							<div class="col-12 col-sm-6 col-md-6">
								<div class="form-group no-min-h">
									<input type="password" class="form-control form-control-lg" placeholder="Password" name="password" required>
								</div>
							</div>
							<div class="col-12 col-sm-6 col-md-6">
								<div class="form-group no-min-h">
									<input type="password" class="form-control form-control-lg" placeholder="Confirm Password" name="confirmPasswor" required>
								</div>
							</div>
						</div>
					</div>
					<!-- Form section [/End]-->
					<!-- Form section [Start] -->
					<div class="form-section">
						<h3 class="form-title">Personal Information</h3>
						<div class="form-row">
							<div class="col-12 col-sm-6 col-md-6">
								<div class="form-group no-min-h">
									<input type="text" class="form-control form-control-lg" placeholder="Address" name="address" required>
								</div>
							</div>
							<div class="col-12 col-sm-6 col-md-6">
								<div class="form-group no-min-h">
									<input type="text" class="form-control form-control-lg" placeholder="Unit number" name="UnitNumber" required>
								</div>
							</div>
						</div>
					</div>
					<!-- Form section [Start] -->
					<div class="form-section">
						<h3 class="form-title">How do you move around?</h3>
						<div class="form-row vehicle_radios">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="vehicle" id="vehicle_truck" checked>
								<label for="vehicle_truck" class="vehicles-icon vehicle_sprite_truck" title="Truck"></label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="vehicle" id="vehicle_van">
								<label for="vehicle_van" class="vehicles-icon vehicle_sprite_van" title="Van"></label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="vehicle" id="vehicle_suv">
								<label for="vehicle_suv" class="vehicles-icon vehicle_sprite_suv" title="SUV"></label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="vehicle" id="vehicle_car">
								<label for="vehicle_car" class="vehicles-icon vehicle_sprite_car" title="Car"></label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="vehicle" id="vehicle_scooter">
								<label for="vehicle_scooter" class="vehicles-icon vehicle_sprite_scooter" title="Scooter"></label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="vehicle" id="vehicle_bicycle">
								<label for="vehicle_bicycle" class="vehicles-icon vehicle_sprite_bicycle" title="Bycicle"></label>
							</div>
						</div>
					</div>

					<div class="form-section">
						<h3 class="form-title">Work Preferences</h3>
						<div class="form-row">
							<div class="form-group col-md-4 col-12">
								<label for="preferred_zone">Preferred Zone:</label>
								<select class="custom-select" id="preferred_zone" name="preferred_zone" required>
									<option value="71">Calgary</option>
									<option value="30">Downtown Toronto</option>
									<option value="90">Etobicoke</option>
									<option value="118">Halifax</option>
									<option value="94">Jeddah</option>
									<option value="38">Laval</option>
									<option value="24">Mississauga East</option>
									<option value="117">Montreal 117</option>
									<option value="88">Oakville</option>
									<option value="42">Ottawa</option>
									<option value="91">Riyadh</option>
									<option value="53">Scarborough</option>
								</select>
							</div>
							<div class="form-group col-md-4 col-12">
								<label for="work_type">Work type:</label>
								<select name="work_type" class="custom-select" required>
									<option value=""></option>
									<option value="full_time">Full Time</option>
									<option value="part_time">Part Time</option>
									<option value="seasonal">Seasonal</option>
									<option value="casual">Casual</option>
								</select>
							</div>
							<div class="form-group col-md-4 col-12">
								<label for="contact_time">Best time to contact you:</label>
								<select class="custom-select" name="contact_time" required>
									<option value=""></option>
									<option value="8_12">8 AM - 12 PM</option>
									<option value="12_16">12 PM - 4 PM</option>
									<option value="16_20">4 PM - 8 PM</option>
								</select>
							</div>
						</div>
					</div>

					<div class="form-section">
						<h3 class="form-title">Other</h3>
						<label>How did you hear about us:</label>
						<div class="hearAboutUs">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="Kijiji" id="Kijiji">
								<label class="form-check-label" for="Kijiji">Kijiji</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" name="hearAboutUs[]" value="Indeed" id="Indeed">
								<label class="form-check-label" for="Indeed">Indeed</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" name="hearAboutUs[]" value="Job" id="MonsterJob">
								<label class="form-check-label" for="MonsterJob">Monster Job</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" name="hearAboutUs[]" value="Facebook" id="Facebook">
								<label class="form-check-label" for="Facebook">Facebook</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" name="hearAboutUs[]" value="Twitter" id="Twitter">
								<label class="form-check-label" for="Twitter">Twitter</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" name="hearAboutUs[]" value="Instagram" id="Instagram">
								<label class="form-check-label" for="Instagram">Instagram</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" name="hearAboutUs[]" value="Mouth" id="WordofMouth">
								<label class="form-check-label" for="WordofMouth">Word of Mouth</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" name="hearAboutUs[]" value="Article" id="Article">
								<label class="form-check-label" for="Article">News Article</label>
							</div>
							<input type="text" class="form-control" placeholder="Other" id="other" name="other">
						</div>
					</div>

					<div class="form-section">
						<h3 class="form-title">Referral</h3>
						<div class="row">
							<div class="col-12 col-sm-6">
								<div class="form-group no-min-h">
									<input type="text" class="form-control form-control-lg" placeholder="Referral Code" name="lastName" required>
								</div>
							</div>
						</div>

						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="terms-agree" required>
							<label class="form-check-label" for="terms-agree">I have read and agree the to <a href="#" data-toggle="modal" data-target="#termsAgree">Terms of Use</a></label>
						</div>

						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="privacy-agree" required>
							<label class="form-check-label" for="privacy-agree">I have read and agree the <a href="#" data-toggle="modal" data-target="#privacyAgree">Privacy Policy</a></label>
						</div>

						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="newsletter-agree">
							<label class="form-check-label" for="newsletter-agree">Sign up for news & updates by email.</label>
						</div>

						<div class="btn-group">
							<button type="submit" class="btn btn-primary submitButton">Signup</button>
						</div>

						<!-- Modal -->
						<div class="modal fade" id="termsAgree" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="termsModalLabel">JoeyCo Terms of Use</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
									<article>
										<h2 class="green">Introduction</h2>
										<ol class="decimal" start="1">
											<li>By using the JoeyCo website (<span class="bold">“JoeyCo Site“</span>) and its related JoeyCo electronic applications and services (<span class="bold">"Services"</span>), you hereby agree to these legally-binding terms and conditions (the <span class="bold">"Terms and Conditions"</span>). Do not access or use the JoeyCo Site if you are unwilling or unable to be bound by them. </li>
											<li>These Terms and Conditions constitute the entire agreement between you ("<span class="bold">you</span>" or "<span class="bold">User</span>") and JoeyCo Inc. and its affiliates, subsidiaries, partners, officers, directors, agents and employees (collectively, <span class="bold">"JoeyCo"</span>) pertaining to your use of the JoeyCo Site.</li>
											<li>For information on how user information is collected, used and disclosed by JoeyCo in connection with your use of the JoeyCo Site, please review our <a href="https://joey.joeyco.com/privacy">Privacy Policy</a>.</li>
											<li>JoeyCo reserves the right to suspend or terminate your access to the JoeyCo Site, at any time for convenience, or for any other reason, including without limitation if JoeyCo has determined in its sole discretion that the use of the JoeyCo Site was in breach of these Terms and Conditions.</li>
											<li>JoeyCo reserves the right, in its sole discretion to add to, remove from, modify or otherwise change any part of these Terms and Conditions, in whole or in part at any time. Except as expressly contemplated herein, changes will be effective when notice of such is posted on the JoeyCo Site. Please check regularly for updates.</li>
											<li>If any changes made in accordance with the above are not acceptable to you, you must discontinue your use of the JoeyCo Site immediately. Your continued use of the JoeyCo Site after any such changes are posted will constitute acceptance of them.</li>
											<li>You hereby agree to indemnify and hold harmless JoeyCo from any claims or damages (including without limitation reasonable legal fees) arising out of your breach of these Terms and Conditions, the documents they incorporate by reference, or your violation of any law or the rights of a third party.</li>
										</ol>

										<h2 class="green">Representations and Warranties</h2>
										<ol class="decimal" start="8">
											<li>
												By using the JoeyCo Site and all related services, you expressly represent and warrant that:
												<ol>
													<li>you are legally entitled to enter into this agreement; </li>
													<li>you are in compliance with any age-related restrictions in your jurisdiction and you have the right, authority and capacity to enter into this agreement and to abide by its terms and conditions;  </li>
													<li>you are either the sole and exclusive owner of all content that you make available through the Service or Application ("<span class="bold">User Content</span>") or you have all rights, licenses, consents and releases that are necessary to grant to JoeyCo and to the rights in such User Content, as contemplated under this Agreement; and</li>
													<li>neither the User Content nor your posting, uploading, publication, submission or transmittal of the User Content or JoeyCo’s use of the User Content (or any portion thereof) on, through or by means of the Service or Application will infringe, misappropriate or violate a third party’s patent, copyright, trademark, trade secret, moral rights or other intellectual property rights, or rights of publicity or privacy, or result in the violation of any applicable law or regulation.</li>
												</ol>
											</li>
										</ol>

										<h2 class="green">Access &amp; Profile</h2>
										<ol class="decimal" start="9">
											<li>To be able to access the JoeyCo Site, you must first register. Successful registration will provide you with access to material, software, information, data and other content (<span class="bold">"Content"</span>) available on the JoeyCo Site. When registering, you agree to provide accurate and current information.</li>
											<li>You may only access the JoeyCo Site using authorized means and it is your responsibility to ensure that you do have such authorization. Any use by others of your account with or without your authorization is your sole responsibility.</li>
											<li>You are solely responsible for maintaining the confidentiality of any passwords or other account identifiers which you choose or are assigned as a result of registration.  You will be responsible for all activities that occur using your account.</li>
											<li>JoeyCo reserves the right to terminate these Terms and Conditions should you be using the JoeyCo Site or the Services with an incompatible device.</li>
											<li>JoeyCo will provide you with the ability to manage your personal or business profile ("<span class="bold">Individual Profile</span>"). You hereby acknowledge that by managing and customizing your Individual Profile you are permitting User Content you provide to be shared, at your risk, with other users of the JoeyCo Site.  For any material that you upload to the JoeyCo Site, you agree that you are entirely responsible for the content of, and any harm that may result from, the User Content. </li>
											<li>JoeyCo is not responsible for the use or operation of any information contained in your Individual Profiles by third party sites.</li>
										</ol>

										<h2 class="green">License(s) Granted by JoeyCo</h2>
										<ol class="decimal" start="15">
											<li>
												Subject to your compliance with these Terms and Conditions, JoeyCo grants you a limited, non-exclusive, non-transferable license to:
												<ol>
													<li>view, download and print any JoeyCo Content solely for your personal and non-commercial purposes; and</li>
													<li>view any User Content to which you are permitted access solely for your personal and non-commercial purposes.</li>
												</ol>
											</li>
											<li>You have no right to sublicense any licenses or rights granted in these Terms and Conditions.</li>
											<li>No licenses or rights are granted to you (by implication or otherwise) in respect of any intellectual property rights owned or controlled by JoeyCo or its licensors, other than those expressly granted in this Agreement. </li>
											<li>You may not use, copy, adapt, modify, prepare derivative works based upon, distribute, license, sell, transfer, publicly display, publicly perform, transmit, stream, broadcast or otherwise exploit the Services, Application or Content, except as expressly permitted in this Agreement.</li>
										</ol>

										<h2 class="green">License(s) Granted by User</h2>
										<ol class="decimal" start="19">
											<li>JoeyCo may, in its sole discretion, permit users to post, upload, publish, submit or transmit User Content. By making available any User Content on or through the Service or Application, you hereby grant to JoeyCo a worldwide, irrevocable, perpetual, non-exclusive, transferable, royalty-free license, with the right to sublicense, to use, view, copy, adapt, modify, distribute, license, sell, transfer, publicly display, publicly perform, transmit, stream, broadcast and otherwise exploit such User Content only on, through or by means of the Service or Application. JoeyCo does not claim any ownership rights in any User Content and nothing in this Agreement will be deemed to restrict any rights that you may have to use and exploit any User Content.</li>
										</ol>

										<h2 class="green">Covenants of User</h2>
										<ol class="decimal" start="20">
											<li>
												You hereby agree to not:
												<ol>
													<li>license, sublicense, sell, resell, transfer, assign, distribute or otherwise commercially exploit or make available to any third party the Services or the Application in any way; </li>
													<li>modify or make derivative works based upon the Services; </li>
													<li>create Internet "links" to the Services or "frame" or "mirror" any Application on any other server or wireless or Internet-based device; </li>
													<li>reverse engineer or access the Application or Services in order to (a) build a competitive product or service, (b) build a product using similar ideas, features, functions or graphics of the Service or Application, or (c) copy any ideas, features, functions or graphics of the Service or Application, or (v) launch an automated program or script, including, but not limited to, web spiders, web crawlers, web robots, web ants, web indexers, bots, viruses or worms, or any program which may make multiple server requests per second, or unduly burdens or hinders the operation and/or performance of the Services;</li>
													<li>send spam or otherwise duplicative or unsolicited messages in violation of applicable laws; </li>
													<li>send or store infringing, obscene, threatening, libelous, or otherwise unlawful or tortious material, including material harmful to children or violative of third party privacy rights; </li>
													<li>introduce viruses, trojans, worms, harmful computer code, files, scripts, agents or programs, logic bombs or other material which is malicious or technologically harmful; </li>
													<li>interfere with or disrupt the integrity or performance of the Application or Service or the data contained therein;</li>
													<li>attempt to gain unauthorized access to the Application or Service or its related systems or networks;</li>
													<li>attempt to gain unauthorised access to the JoeyCo Site, the server on which the JoeyCo Website is stored or any server, computer or database connected to such site;</li>
													<li>attack the JoeyCo Site via a denial-of-service attack or a distributed denial-of service attack;</li>
													<li>post information or place an order that would constitute a criminal offence in any applicable jurisdiction;</li>
													<li>post information that would give rise to civil liability;</li>
													<li>use the JoeyCo Site and related services for anything other than your personal own or resell it or such services to a third party; or</li>
													<li>use the JoeyCo Site and Services to defame, abuse, stalk, harass, threaten or otherwise violate the legal rights of others.</li>
												</ol>
											</li>
											<li>JoeyCo will have the right to investigate, prosecute or litigate breaches of any of the above to the fullest extent of the law. JoeyCo may involve and cooperate with law enforcement authorities in prosecuting users who violate this Agreement. </li>
											<li>You acknowledge that JoeyCo has no obligation but reserves the absolute right to, at any time and without prior notice, monitor your access or use of the JoeyCo Site and Services.</li>
										</ol>

										<h2 class="green">Payment Terms</h2>
										<ol class="decimal" start="23">
											<li>Notwithstanding that JoeyCo is not the ultimate vendor or merchant (collectively "<span class="bold">Vendor Merchant</span>") in any transaction offered through the Services, JoeyCo may offer secure payment processing services for your convenience as follows:</li>
												<ol>
													<li>The payment for an order placed through the JoeyCo Site or Services shall remit payment of the amount required as provided to us by the Vendor Merchant.</li>
													<li>JoeyCo is not responsible or to be involved in any pricing dispute as between you and the Vendor Merchant and any such dispute is to be settled directly between you and said third-party Vendor Merchant;</li>
													<li>Where applicable, JoeyCo may facilitate a refund from the Vendor Merchant to you where such Vendor Merchant is voluntarily remitting such funds to you. However JoeyCo is not privy to the customer-vendor relationship arising or existing between you and such Vendor Merchant and is in no way jointly or severally responsible or liable along with the Vendor Merchant, who is solely responsible for any refund; and </li>
													<li>Any fees that JoeyCo may charge you for the Services are due immediately and are non-refundable. This no refund policy shall apply at all times regardless of your decision to terminate your usage.</li>
												</ol>

										</ol>

										<h2 class="green">Third Party Interactions</h2>
										<ol class="decimal" start="24">
											<li>Where the JoeyCo Website contains links to other sites and resources provided by third parties, these links are provided for your information only. JoeyCo has no control over the contents of those sites or resources, and accepts no responsibility for them or for any loss or damage that may arise from your use of them. In no event shall JoeyCo be responsible for any content, products, services or other materials on or available from such sites or third party providers.</li>
											<li>During use of the Services, you may enter into correspondence with, purchase goods and/or services from, or participate in promotions of third party service providers, advertisers or sponsors showing their goods and/or services through the Services. Any such activity and any terms, conditions, warranties or representations associated with such activity, is solely between you and the applicable third-party. In no event shall JoeyCo be responsible for, or deemed to be a party to, such correspondences or transactions.</li>
											<li>JoeyCo may rely on third party advertising and marketing supplied through the Services and other mechanisms to subsidize the Services. By agreeing to these Terms and Conditions you agree to receive such advertising and marketing. If you do not want to receive such advertising you must notify us in writing. JoeyCo reserves the right to charge you a higher fee for the Services should you choose not to receive these advertising services. This higher fee, if applicable, will be posted on the JoeyCo Site website located at <a href="https://www.joeyco.com/">www.joeyco.com</a>.</li>
											<li>JoeyCo may compile and release information regarding you and your use of the Application or Service on an anonymous basis as part of a customer profile or similar report or analysis. You agree that it is your responsibility to take reasonable precautions in all actions and interactions with any third party you interact with through the JoeyCo Site and Services.</li>
										</ol>

										<h2 class="green">Acknowledgements</h2>
										<ol class="decimal" start="28">
											<li>You expressly understand and agree that:
												<ol>
													<li>the JoeyCo Sites are provided on an "as is" and "as available" basis and that JoeyCo does not make any representations, warranties, as to merchantability, fitness for a particular purpose, non-infringement, title, accuracy, suitability, reliability, freedom from infections or viruses or completeness as well as any warranties arising by statue or otherwise in law or from a course of dealing or usage of trade; </li>
													<li>JoeyCo Site does not guarantee that the JoeyCo Site or Services will be provided on a uninterrupted, timely, secure, or error free basis; </li>
													<li>In no event shall JoeyCo or our suppliers be liable for any loss of use, loss of data, loss of income or profit, loss of or damage to property, or for any damages of any kind or character (including without limitation any compensatory, incidental, direct, indirect, special, punitive, or consequential damages), even if JoeyCo has been advised of the possibility of such damages or losses, arising out of or in connection with the use of the JoeyCo sites, their Contents, or any website or contents with which it is linked. In no event shall the program website’s liability for all damages, losses, and causes of action, whether in contract, tort (including, but not limited to, negligence), or otherwise, exceed the amount paid by you to use the services; and</li>
													<li>JoeyCo will not be liable for any loss or damage caused by a distributed denial-of-service attack, viruses or other technologically harmful material that may infect your computer equipment, computer programs, data or other proprietary material due to your use of our site or to your downloading of any material posted on it, or on any website linked to it.</li>
												</ol>
											</li>
										</ol>

										<h2 class="green">Reviews</h2>
										<ol class="decimal" start="29">
											<li>You are encouraged to submit reviews for products and services using the JoeyCo Site. Where JoeyCo believes a user’s review has violated these Terms and Conditions, JoeyCo may remove such review, or remove or suspend such user’s access to the JoeyCo Site.</li>
											<li>If you discover a review regarding your products, services or business that you believe contains false, misleading or inappropriate content, you may email us at <a href="mailto:review@joeyco.com">review@joeyco.com</a> with your reasons for requesting the review.  However, JoeyCo is not required to take any action in relation to any such requests.</li>
										</ol>

										<h2 class="green">Export Control</h2>
										<ol class="decimal" start="31">
											<li>While you acknowledge that JoeyCo is not a courier or shipment service, you agree to comply fully with all Canadian and foreign export laws and regulations to ensure that neither the Services nor any technical data related thereto nor any direct product thereof is exported or re-exported directly or indirectly in violation of, or used for any purposes prohibited by, such laws and regulations. By using the Services, you represent and warrant that: (i) you are not located in a country that is subject to a Canadian Government embargo, or that has been designated by the Canadian Government as a “terrorist supporting” country; and (ii) you are not listed on any Canadian Government list of prohibited or restricted parties.</li>
										</ol>

										<h2 class="green">General</h2>
										<ol class="decimal" start="32">
											<li>No joint venture, partnership, employment, or agency relationship exists between you, JoeyCo or any third party provider as a result of this Agreement or use of the Service or Application.</li>
											<li>If any of the provisions (or parts thereof) contained in these Terms and Conditions are determined to be void, invalid or otherwise unenforceable by a court of competent jurisdiction, this determination will not affect the remaining provisions of these Terms and Conditions. </li>
											<li>The use of headings and numbers in these Terms and Conditions are for ease of reference and are not to affect the interpretation of this agreement. </li>
											<li>If any provision of these Terms and Conditions is held to be invalid or unenforceable, such provision shall be struck and the remaining provisions shall be enforced to the fullest extent under law. </li>
											<li>The failure of JoeyCo to enforce any right or provision in these Terms and Conditions shall not constitute a waiver of such right or provision unless acknowledged and agreed to by JoeyCo in writing. </li>
											<li>These Terms and Conditions comprise the entire agreement between you and JoeyCo and supersede all prior or contemporaneous negotiations, discussions or agreements, whether written or oral, between the parties regarding the subject matter contained herein.</li>
											<li>These Terms and Conditions will be interpreted, construed and governed by the laws in force in the Province of Ontario, Canada.</li>
										</ol>
									</article>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>


						<!-- Modal -->
						<div class="modal fade" id="privacyAgree" tabindex="-1" aria-labelledby="privacyAgreeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="privacyAgreeModalLabel">JoeyCo Terms of Use</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
									<article>
										<h2 class="green">Private Information Protection</h2>
										<p>In order to complete your order successfully, JoeyCo™ requires your personal information. Under no circumstances will any of your personal data or personal identity be shared and will be used solely within JoeyCo. This information could possibly be used for statistical analysis and to create reports that will help us serve you better and could potentially be shared with affiliated parties, however your personal identity will not be compromised. In the unfortunate event of any legal complications, JoeyCo will be obliged to share your personal information with legal authorities. JoeyCo understands that your information shared with us is sensitive and thus acts in accordance with the Personal Information Protection and Electronic Documents Act Canada.</p>

										<h2 class="green">Geolocation Terms</h2>
										<p>As the user, you have the option of either providing your postal code or clicking on the geolocator icon. All data available to use through the geolocator will be used internally for statistical analysis and to produce reports that will help us serve you better. In no way will any of your personal information be shared or your personal identity be compromised through this system.</p>

										<h2 class="green">Payment Process</h2>
										<p>To process your payment, your credit card information is required. Through our secure servers, your credit card information will remain confidential. Once your order has been confirmed and processed, there are no refunds. A five minute grace period is made available for you to make any additions or modifications to your order. This grace period, however , is at the discretion of the merchant if your order has already been processed by them. After your payment has been processed, it can or may take up to 15 days for the amount to be credited.</p>

										<h2 class="green">Order Process</h2>
										<p>There is open accessibility to our merchant database on our website, which you can browse through and then create your order. At the point of confirming your order, you will be required to either sign in or create a new user account, which requires some of your personal information such as your name, telephone number, email address and physical address. It is your responsibility to ensure that the information on your user account is correct and kept updated. We understand that this information shared with us is confidential and will be treated as such through our secure servers and our adherence to the information protection laws in Canada. This personal information provides us with your location that we then use to ensure a swift delivery of your order.</p>
										<p>The ordering process is made up of three steps, where the order must first be confirmed by you, the user, second by the merchant and third by the Joey. Once the order has been confirmed by you, the merchant and the Joey will be notified of the order. Once they have accepted and confirmed your order, cancellation will not be permitted. Once you have confirmed your order but do not receive a confirmation email within 5 minutes, please call 1-855-5-JOEYCO.</p>
										<p>JoeyCo retains the right of refusal to any job under any circumstances that we deem fit such as where information provided to us is incorrect or mismatched and so on. Furthermore, at the time of delivery, if the Joey is unable to contact you in any manner, your order will be cancelled after a 10 minute window, but you will still be subjected to any charges affiliated with that order. JoeyCo cannot guarantee the completion of any order as the third parties involved retain their right of refusal to any job. In the event of an order cancellation or refusal, you will be notified either via email and/or by phone.</p>
										<p>JoeyCo aims in fulfilling all orders within a sixty minute window, however, in the event that the delivery cannot be completed within the estimated time given due to unforeseen circumstances, JoeyCo is not held accountable.</p>

										<h2 class="green">Merchant &amp; Charges</h2>
										<p>JoeyCo is not the same as, nor is it related to, any of the merchants or businesses appearing or linked to on this website, except those appearing expressly under the JoeyCo name.</p>
										<p>JoeyCo rates are determined by two factors; the nature of the delivery and the distance between the location of delivery and the merchant.These rates do not include gratuity. JoeyCo service charges are subject to change at any time without prior notification. The email address that you provide to us on your user account will be used as a point of contact to email you receipts and other information regarding your orders.</p>

										<h2 class="green">Return policy and Dietary Related Issues</h2>
										<p>Return policies are dependent on the policies set by the merchant. The receipt provided by JoeyCo can be used for any returns where applicable. JoeyCo is not liable for any returns or exchanges.</p>
										<p>In any circumstance where you are not satisfied with the good or service you have ordered through JoeyCo, JoeyCo can help you by connecting you with the merchant but JoeyCo is not liable.</p>
										<p>In the case for food orders and issues pertaining to dietary restrictions or allergies should be explicitly noted under the ‘additional note’ section. Users are advised to use and be aware of labelling in the menus provided. If any dietary related situation were to crop up, JoeyCo is not held responsible.</p>

										<h2 class="green">Services &amp; Changes to privacy policy</h2>
										<p>JoeyCo services are available 24 hours, 7 days a week. However, if the website is unavailable due to any unforeseen circumstances, JoeyCo will not be held liable.</p>
										<p>JoeyCo reserves the right to make any changes to our privacy policy without any notifications and it is up to you, the user, to ensure that you are in constant familiarity with our privacy policy.</p>
										<p>For any queries regarding our privacy policy, please do not hesitate to email us at <a href="mailto:info@joeyco.com">info@joeyco.com</a></p>
									</article>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</section>

		 @include('includes.clientFooter')
    </main>
    @endsection

