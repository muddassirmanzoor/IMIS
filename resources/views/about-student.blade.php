@extends('layouts.master')

@section('title', 'Student List')

@section('content')
        <!--**********************************
            Content body start
        ***********************************-->
         <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
				    
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Student Profile</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Students</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Student Profile</a></li>
                        </ol>
                    </div>
                </div>
				
				<div class="row">
					<div class="col-xl-3 col-xxl-4 col-lg-4">
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="text-center p-3 overlay-box" style="background-image: url(images/imis-images/profile/img1.jpg);">
										<div class="profile-photo">
											<img src="{{ asset('images/imis-images/profile/profile.png') }}" width="100" class="img-fluid rounded-circle" alt="">
										</div>
										<h3 class="mt-3 mb-1 text-white">Fatima Ali</h3>
									</div>
									<ul class="list-group list-group-flush">
										<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Student Id</span> <strong class="text-muted">0200122	</strong></li>
										<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Enrollment No #</span> <strong class="text-muted">0200122	</strong></li>
										<li class="list-group-item d-flex justify-content-between"><span class="mb-0">B-form No</span> <strong class="text-muted">37340-3335036-1</strong></li>
									</ul>
									<!--<div class="card-footer text-center border-0 mt-0">								
										<a href="javascript:void(0);" class="btn btn-primary btn-rounded px-4">Follow</a>
										<a href="javascript:void(0);" class="btn btn-warning btn-rounded px-4">Message</a>
									</div>-->
								</div>
							</div>
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header">
										<h3 class="mb-1 text-primary">Student info</h3>
									</div>
									<div class="card-body pb-0">
										<ul class="list-group list-group-flush">
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Father Name</strong>
												<span class="mb-0">Ali</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Gender</strong>
												<span class="mb-0">Female</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>DOB</strong>
												<span class="mb-0">13-04-2018</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Religion</strong>
												<span class="mb-0">Muslim</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Nationality </strong>
												<span class="mb-0">Pakistani</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Contact #</strong>
												<span class="mb-0">+01 123 456 7890</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Distance </strong>
												<span class="mb-0">15km</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header d-block">
										<h3 class="mb-1 text-primary">Physical Profile</h3>
									</div>
									<div class="card-body">
										<ul class="list-group list-group-flush">
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Age</strong>
												<span class="mb-0">16</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Hight</strong>
												<span class="mb-0">4.5 ft</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Weight</strong>
												<span class="mb-0">45kg</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Blood Groups</strong>
												<span class="mb-0">B<sup>+</sup></span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Medical Issues</strong>
												<span class="mb-0">Medical Issues</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-9 col-xxl-8 col-lg-8">
						<div class="card">
                            <div class="card-body">
								<!---------------------->
								<div class="row">								
									<div class="col-lg-12">
										<div class="card">
											<div class="card-header bg-primary">
												<div class="row">
													<div class="col-lg-8">
														<h3 class="mb-1  text-white">Enrollment Info.</h3>
													</div>
												</div>
											</div>
											<div class="card-body  details-page-label">
												<div class="row">
													<div class="col-md-8 p-2 pl-4">
														<strong>School Name:</strong>
															<span class="mb-0">Govt. Pilot Secondary School for Girls </span>
													</div>
													<div class="col-md-4 p-2 pl-4">
														<strong>EMIS Code:</strong>
															<span class="mb-0">1122334</span>
													</div>
													<div class="col-md-4 p-2 pl-4">
														<strong>Enrollment Date:</strong>
															<span class="mb-0">13-04-2018</span>
													</div>
													<div class="col-md-4 p-2 pl-4">
														<strong>Current Class:</strong>
															<span class="mb-0">3<sup>rd</sup></span>
													</div>
													<div class="col-md-4 p-2 pl-4">
														<strong>Section:</strong>
															<span class="mb-0">A</span>
													</div>
													<div class="col-md-4 p-2 pl-4">
														<strong>Medium:</strong>
															<span class="mb-0">Urdu</span>
													</div>
													<div class="col-md-4 p-2 pl-4">
														<strong>Major Subjects:</strong>
															<span class="mb-0">Biology</span>
													</div>
												</div>
											</div>
										</div> <!-----Card End----->
									</div> <!-----col-lg-12 End----->
									<div class="col-lg-12">
										<div class="card">
											<div class="card-header bg-primary">
												<div class="row">
													<div class="col-lg-8">
														<h3 class="mb-1 text-white">Guardian Info.</h3>
													</div>
												</div>
											</div>
											<div class="card-body details-page-label">
												<div class="row">
													<div class="col-md-3 p-2 pl-4">
														<strong>Guardian Name:</strong>
															<span class="mb-0">Ali Raza</span>
													</div>
													<div class="col-md-5 p-2 pl-4">
														<strong>Guardian CNIC No:</strong>
															<span class="mb-0">37340-3335036-1</span>
													</div>
													<div class="col-md-3 p-2 pl-4">
														<strong>Guardian Relation:</strong>
															<span class="mb-0">Uncle</span>
													</div>
													<div class="col-md-4 p-2 pl-4">
														<strong>Household Income:</strong>
															<span class="mb-0">120,000/-</span>
													</div>
												</div><!-----Row End----->
											</div>
										</div> <!-----Card End----->
									</div> <!-----col-lg-12 End----->
									<div class="col-lg-12">
										<div class="card">
											<div class="card-header bg-primary">
												<div class="row">
													<div class="col-lg-12">
														<h3 class="mb-1  text-white">Transfer History</h3>
													</div>
												</div>
											</div>
											<div class="card-body  details-page-label">
														<!-------Transfer list Start------->
														<table class="session-result-table">
															<tbody>
																<tr>
																  <th>Sr #</th>
																   <th>Transfer From</th>
																  <th>EMIS Code</th>
																  <th>Transfer Date</th>
																</tr>
																<tr>
																	<td>1</td>
																  <td>Govt.Pilot Higher Secondary School for Boys </td>
																  <td>122312</td>
																  <td>12-4-2019</td>
																</tr>
																<tr>
																	<td>2</td>
																	<td>Govt.Pilot Higher Secondary School for Boys2</td>
																	<td>122312</td>
																	<td>12-4-2013</td>
																  </tr>
																  <tr>
																	<td>3</td>
																	<td>Govt.Pilot Higher Secondary School for Boys3</td>
																	<td>122312</td>
																	<td>12-4-2013</td>
																  </tr>
															</tbody>
														</table>
												<!-------Transfer list Start------->
											</div>
										</div> <!-----Card End----->
									</div> <!-----col-lg-12 End----->
									<div class="col-lg-12">
										<div class="card  details-page-label">
											<div class="card-header bg-primary">
												<div class="row">
													<div class="col-lg-12">
														<h3 class="mb-1  text-white">Rejoin History</h3>
													</div>
												</div>
											</div>
											<div class="card-body  details-page-label">
														<!-------Transfer list Start------->
														<table class="session-result-table">
															<tbody>
																<tr>
																  <th>Sr #</th>
																   <th>Drop Date</th>
																  <th>Rejoin Date</th>
																</tr>
																<tr>
																	<td>1</td>
																	<td>12-4-2019</td>
																	<td>12-4-2019</td>
																</tr>
																<tr>
																	<td>2</td>
																	<td>12-4-2019</td>
																	<td>12-4-2019</td>
																</tr>
																<tr>
																	<td>3</td>
																	<td>12-4-2019</td>
																	<td>12-4-2019</td>
																</tr>
															</tbody>
														</table>
												<!-------Transfer list Start------->
											</div>
										</div> <!-----Card End----->
									</div> <!-----col-lg-12 End----->
									<div class="col-lg-12">
										<div class="card">
											<div class="card-header bg-primary">
												<div class="row">
													<div class="col-lg-12">
														<h3 class="mb-1 text-white">Availed Interventions</h3>
													</div>
												</div>
											</div>
											<div class="card-body  details-page-label">
												<div class="row">
													<div class="col-md-6 p-2">
														<b>✓</b> Afternoon Schools Programme(ASP)
													</div>
													<div class="col-md-6 p-2">
														<b>✓</b> Girls' Stipend Programme (GSP)
													</div>
													<div class="col-md-6 p-2">
														<b>✓</b> Benazir Income Support Programme (BISP)
													</div>
													<div class="col-md-6 p-2">
														<b>✓</b> Early School Childhood Education Programme (ECE)
													</div>
													<div class="col-md-6 p-2">
														<b>☓</b> Free Text Books
													</div>
													<div class="col-md-6 p-2">
														<b>☓</b> Free Bags
													</div>
												</div>
											</div>
										</div> <!-----Card End----->
									</div> <!-----col-lg-12 End----->
									<div class="col-lg-12">
										<div class="card">
											<div class="card-header bg-primary">
												<div class="row">
													<div class="col-lg-12">
														<h3 class="mb-1 text-white">Assessment </h3>
													</div>
												</div>
											</div>
											<div class="card-body">
												<div class="row">
													<div class="col-md-12 p-2">
														<table class="session-result-table">
															<tbody>
																<tr>
																  <th>Session</th>
																  <th>Total Marks %</th>
																  <th>Obtan Marks %</th>
																  <th>Remarks</th>
																</tr>
																<tr>
																  <td>1<sup>st</sup></td>
																  <td>100</td>
																  <td>89</td>
																  <td>Pass</td>
																</tr>
																<tr>
																	<td>2<sup>nd</sup></td>
																	<td>100</td>
																	<td>89</td>
																	<td>Pass</td>
																  </tr>
																  <tr>
																	<td>3<sup>rd</sup></td>
																	<td>100</td>
																	<td>89</td>
																	<td>Pass</td>
																  </tr>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div> <!-----Card End----->
									</div> <!-----col-lg-12 End----->
								</div>
								<!---------------------->
                            </div>
						</div>
					</div>
				</div>
				
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
@endsection
