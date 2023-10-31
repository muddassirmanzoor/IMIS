@include('dealer.layouts.header')
@include('dealer.layouts.partial.header')
@include('dealer.layouts.partial.sidebar')

					<div class="col-11 deshbord-inner-body min-vh-100" id ="uiNavbar">
						<!-- content -->
						<div class="main-content">
							<!--------------page-title-wrapper------------>
							<div class="row">
								<div class="col-md-12">
										<div class="submitted-car-wrapper">
											<div class="submitted-car-details">
												<div class="submitted-preson"><b>Submitted by</b>: <span class="new-person-name">Alex</span></div>
												<h4 class="submitted-car-name"><b>Car Name</b>: BMW X1</h4>
												<div class="submitted-car-date"><b>Request Date</b>: 12:00 PM 26-04-2022</div>
												<div class="submitted-car-payment-status"><b>Request Status</b>: New</div>
											</div>
											<div class="submitted-car-img">
												<img class="submitted-car-main-img" src="{{asset('assets/images/image/alerts-product-img.svg')}}">
												<div class="submitted-car-code"><b>Code</b>: QLD0001</div>
											</div>
										</div>
								</div><!---------------->
								<div class="col-md-12">
									<!------------------------->
									<form class="edit-car-main-form">
										<div class="accordion" id="edit_car_accordion">
											<div class="accordion-item">
												<h2 class="accordion-header" id="edit_car_uploaded_scratch_history">
												  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
													<span class="edit-car-accordion-img"><img src="{{asset('assets/images/image/add-car.svg')}}"></span><span class="edit-car-accordion-heading">Uploaded Scratch History</span>
												  </button>
												</h2>
												<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="edit_car_uploaded_scratch_history" data-bs-parent="#edit_car_accordion">
												  <div class="accordion-body">
														<div class="edit-car-form-wrapper">
															<div class="row justify-content-around">
																<div class="col-md-9">
																	<!----------------->
																		<div class="row">
																			<div class="col-md-3">
																				<div class="uplode-image">
																					<img  class="uplode-main-image" src="{{asset('assets/images/image/uplode-image.svg')}}">
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="uplode-image">
																					<img  class="uplode-main-image" src="{{asset('assets/images/image/uplode-image.svg')}}">
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="uplode-image">
																					<img  class="uplode-main-image" src="{{asset('assets/images/image/uplode-image.svg')}}">
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="uplode-image">
																					<img  class="uplode-main-image" src="{{asset('assets/images/image/uplode-image.svg')}}">
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="uplode-image">
																					<img  class="uplode-main-image" src="{{asset('assets/images/image/uplode-image.svg')}}">
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="uplode-image">
																					<img  class="uplode-main-image" src="{{asset('assets/images/image/uplode-image.svg')}}">
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="uplode-image">
																					<img  class="uplode-main-image" src="{{asset('assets/images/image/uplode-image.svg')}}">
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="uplode-image">
																					<img  class="uplode-main-image" src="{{asset('assets/images/image/uplode-image.svg')}}">
																				</div>
																			</div>
																		</div>
																	<!----------------->
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="accordion-item">
												<h2 class="accordion-header" id="edit_car_new_scratch_request">
												  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
													<span class="edit-car-accordion-img"><img src="{{asset('assets/images/image/add-car.svg')}}"></span><span class="edit-car-accordion-heading">New Scratch Request</span>
												  </button>
												</h2>
												<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="edit_car_img_acc" data-bs-parent="#edit_car_accordion">
													<div class="accordion-body">
														<div class="row justify-content-around">
															<div class="col-md-9">
																<!----------------->
																	<div class="row">
																		<div class="col-md-3">
																			<div class="uplode-image">
																				<img  class="uplode-main-image" src="{{asset('assets/images/image/uplode-image.svg')}}">
																			</div>
																		</div>
																		<div class="col-md-3">
																			<div class="uplode-image">
																				<img  class="uplode-main-image" src="{{asset('assets/images/image/uplode-image.svg')}}">
																			</div>
																		</div>
																		<div class="col-md-3">
																			<div class="uplode-image">
																				<img  class="uplode-main-image" src="{{asset('assets/images/image/uplode-image.svg')}}">
																			</div>
																		</div>
																		<div class="col-md-3">
																			<div class="uplode-image">
																				<img  class="uplode-main-image" src="{{asset('assets/images/image/uplode-image.svg')}}">
																			</div>
																		</div>
																		<div class="col-md-3">
																			<div class="uplode-image">
																				<img  class="uplode-main-image" src="{{asset('assets/images/image/uplode-image.svg')}}">
																			</div>
																		</div>
																		<div class="col-md-3">
																			<div class="uplode-image">
																				<img  class="uplode-main-image" src="{{asset('assets/images/image/uplode-image.svg')}}">
																			</div>
																		</div>
																		<div class="col-md-3">
																			<div class="uplode-image">
																				<img  class="uplode-main-image" src="{{asset('assets/images/image/uplode-image.svg')}}">
																			</div>
																		</div>
																		<div class="col-md-3">
																			<div class="uplode-image">
																				<img  class="uplode-main-image" src="{{asset('assets/images/image/uplode-image.svg')}}">
																			</div>
																		</div>
																	</div>
																<!----------------->
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="accordion-item">
												<h2 class="accordion-header" id="edit_user_comment">
												  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
													<span class="edit-car-accordion-img"><img src="{{asset('assets/images/image/add-car.svg')}}"></span><span class="edit-car-accordion-heading">User Comment</span>
												  </button>
												</h2>
												<div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="edit_scratch_history" data-bs-parent="#edit_car_accordion">
													<div class="accordion-body">
														<div class="row">
															<div class="col-md-12">
																<p class="user-comments">The car has a large dent at the right fender.	</p>
															</div>
														</div>
													</div>
												</div>
											</div>
												<button type="submit" class="btn edit-cat-cta-btn"><span class="edit-cat-cta-btn-wrapper"><i class="fa fa-edit" aria-hidden="true"></i>Approve Request</span></button>
												<button type="submit" class="btn edit-cat-cta-btn"><span class="disapproved-car-cta-btn-wrapper"><i class="fa fa-close" aria-hidden="true"></i>Cancel Request</span></button>

										</div>
									</form>
									<!------------------------->
								</div>
							</div>
							<!-------------------------->
						</div>
					</div>
				</div>
			</div>
			<footer>
				<div class="main-footer">All rights reserved by the QLavish.</div>
			</footer>
			<!--Logout Modal Start -->
			<div class="modal user-logout-model" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Logout</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="main-logo-logout"><img src="{{asset('assets/images/image/logo.svg')}}"> </div>
						<h3 class="logout-heading">Do you want to logout?</h3>
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-logout-no" data-bs-dismiss="modal">No</button>
					<button type="button" class="btn btn-logout-yes">Yes</button>
					</div>
				</div>
				</div>
			</div>
			<!--Logout Modal Start -->
		</main>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="{{asset('assets/dealer/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
	<script>
      function openNav() {

            var myNav = document.getElementById("navbarToggleExternalContent");

            myNav.style.display = myNav.style.display === 'none' ? '' : 'none';

            document.getElementById("demo").onclick = closeNav;

            var element = document.getElementById("uiNavbar");

            var x = window.matchMedia("(max-width: 700px)");

            if (x.matches) {

                  element.classList.remove("col-12");

                  element.classList.remove("col-md-12");

                  element.classList.edit("col-6");

                  element.classList.edit("col-6");


            } else{

                  element.classList.remove("col-md-12");

                  element.classList.remove("col-12");

                  element.classList.edit("col-md-10");

                  element.classList.edit("col-6");


            }

      }

      function closeNav() {

            document.getElementById("navbarToggleExternalContent").style.display = "none";

            document.getElementById("demo").onclick = openNav;

            var element = document.getElementById("uiNavbar");

            var x = window.matchMedia("(max-width: 700px)");

            if (x.matches) {

                  element.classList.remove("col-md-10");

                  element.classList.remove("col-6");

                  element.classList.edit("col-12");

                  element.classList.edit("col-md-12");


            } else{

                  element.classList.remove("col-sm-10");

                  element.classList.remove("col-md-10");

                  element.classList.edit("col-md-12");

                  element.classList.edit("col-12");

            }


      }
	  /********************************/

    </script>

  </body>
</html>
