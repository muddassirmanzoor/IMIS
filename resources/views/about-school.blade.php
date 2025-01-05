@extends('layouts.master')

@section('title', 'About School')

@section('content')
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">

                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>About School</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Schools</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">About School</a></li>
                        </ol>
                    </div>
                </div>
				  @include('partials.drop_down')
				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-lg-12">
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header bg-primary">
										<div class="row">
											<div class="col-lg-12">
												<h3 class="mb-1 text-white">School Profile</h3>
											</div>
										</div>
									</div>
									<div class="card-body details-page-label">
										<div class="row">
											<div class="col-md-4 p-2">
													<label class="form-label"><b>District:</b></label>  <span class="form-label-value">Rawalpindi</span>
											</div>
											<div class="col-md-4 p-2">
													<label class="form-label"><b>Tehsil:</b></label>  <span class="form-label-value">Taxila</span>
											</div>
											<div class="col-md-4 p-2">
													<label class="form-label"><b>Markaz:</b></label>  <span class="form-label-value">TAXILA - MALE </span>
											</div>
											<div class="col-md-4 p-2">
													<label class="form-label"><b>EMIS Code:</b></label>  <span class="form-label-value">37340036</span>
											</div>
											<div class="col-md-4 p-2">
													<label class="form-label"><b>EMIS Code:</b></label>  <span class="form-label-value">37340036</span>
											</div>
											<div class="col-md-4 p-2">
													<label class="form-label"><b>Medium:</b></label> <span class="form-label-value">URDU</span>
											</div>
											<div class="col-md-8 p-2">
												<label class="form-label"><b>School Name:</b></label> <span class="form-label-value">Government Pilot Secondary High School</span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>School Gender:</b></label> <span class="form-label-value">Male</span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>Total Area:</b></label> <span class="form-label-value">3 kanal </span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>Covered Area:</b></label> <span class="form-label-value">2 kanal</span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>Total Enrollment:</b></label> <span class="form-label-value">3000</span>
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
												<h3 class="mb-1  text-white">Enrollment</h3>
											</div>
										</div>
									</div>
									<div class="card-body details-page-label">
										<div class="row">
											<div class="col-md-4 p-2">
												<label class="form-label"><b>Total Enrollment:</b></label> <span class="form-label-value">3000</span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><a href="{{url('/student-list')}}"><b>Male Student:</b></label> <span class="form-label-value">1500</span> </a>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>Female Student:</b></label> <span class="form-label-value">1500</span>
											</div>
											<hr>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>Total Sanctioned Teacher Posts:</b></label> <span class="form-label-value">150</span>
											</div>

											<div class="col-md-4 p-2">
												<label class="form-label"><b>Total Filled Teacher Posts:</b></label> <span class="form-label-value">135</span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>Male Teachers:</b></label> <span class="form-label-value">60</span>
											</div>

											<div class="col-md-4 p-2">
												<label class="form-label"><b>Female Teachers:</b></label> <span class="form-label-value">75</span>
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
												<h3 class="mb-1 text-white">Facilities</h3>
											</div>
										</div>
									</div>
									<div class="card-body details-page-label">
										<div class="row">
											<div class="col-md-4 p-2">
												<label class="form-label"><b>&#10003;</b></label> <span class="form-label-value">Water</span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>&#10003;</b></label> <span class="form-label-value">Electricity </span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>&#10003;</b></label> <span class="form-label-value">Play Ground</span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>&#10003;</b></label> <span class="form-label-value">Boundery wall</span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>&#10003;</b></label> <span class="form-label-value">Toilets</span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>&#10003;</b></label> <span class="form-label-value">Library</span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>&#10003;</b></label> <span class="form-label-value">Labs</span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>&#10003;</b></label> <span class="form-label-value">Computer Labs </span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>&#10003;</b></label> <span class="form-label-value">Internet</span>
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
												<h3 class="mb-1 text-white">Initiatives</h3>
											</div>
										</div>
									</div>
									<div class="card-body details-page-label">
										<div class="row">
											<div class="col-md-4 p-2">
												<label class="form-label"><b>&#10003;</b></label> <span class="form-label-value">Afternoon Schools </span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>&#10003;</b></label> <span class="form-label-value">Girls' Stipend Program </span>
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
												<h3 class="mb-1 text-white">Enrollment time series graph 5 years</h3>
											</div>
										</div>
									</div>
									<div class="card-body details-page-label">
										<div class="row">
											<div class="col-md-4 p-2">
												<label class="form-label"><b>&#10003;</b></label> <span class="form-label-value">Afternoon Schools </span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>&#10003;</b></label> <span class="form-label-value">Girls' Stipend Program </span>
											</div>
										</div>
									</div>
								</div> <!-----Card End----->
							</div> <!-----col-lg-12 End----->
						</div>
					</div>
				</div>
            </div>
        </div>

@endsection
