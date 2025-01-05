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
                            <h4>Students List</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Student</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Student List</a></li>
                        </ol>
                    </div>
                </div>

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
									<div class="card-body">
										<div class="row">
											<div class="col-md-12 p-2">
												<div class="table-responsive">
													<table id="example3" class="student-list-tb" >
														<thead>
															<tr>
																<th>#</th>
																<th>Name</th>
																<th>Father Name</th>
																<th>Class</th>
																<th>Section</th>
																<th>Admission Date</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td><strong>01</strong></td>
																<td>Fatima Ali</td>
																<td>Ali Raza</td>
																<td>3<sup>rd</sup></td>
																<td>A</td>
																<td>2011/04/25</td>
																<td>
																	<a href="{{url('/about-student')}}" class="btn btn-sm btn-primary"><i class="la la-eye"></i></a>
																</td>
															</tr>
															<tr>
																<td><strong>01</strong></td>
																<td>Fatima Ali</td>
																<td>Ali Raza</td>
																<td>3<sup>rd</sup></td>
																<td>A</td>
																<td>2011/04/25</td>
																<td>
																	<a href="{{url('/about-student')}}" class="btn btn-sm btn-primary"><i class="la la-eye"></i></a>
																</td>
															</tr>
															<tr>
																<td><strong>02</strong></td>
																<td>Fatima Ali</td>
																<td>Ali Raza</td>
																<td>3<sup>rd</sup></td>
																<td>A</td>
																<td>2011/04/25</td>
																<td>
																	<a href="{{url('/about-student')}}" class="btn btn-sm btn-primary"><i class="la la-eye"></i></a>
																</td>
															</tr>
															<tr>
																<td><strong>03</strong></td>
																<td>Fatima Ali</td>
																<td>Ali Raza</td>
																<td>3<sup>rd</sup></td>
																<td>A</td>
																<td>2011/04/25</td>
																<td>
																	<a href="{{url('/about-student')}}" class="btn btn-sm btn-primary"><i class="la la-eye"></i></a>
																</td>
															</tr>
															<tr>
																<td><strong>04</strong></td>
																<td>Fatima Ali</td>
																<td>Ali Raza</td>
																<td>3<sup>rd</sup></td>
																<td>A</td>
																<td>2011/04/25</td>
																<td>
																	<a href="{{url('/about-student')}}" class="btn btn-sm btn-primary"><i class="la la-eye"></i></a>
																</td>
															</tr>
															<tr>
																<td><strong>05</strong></td>
																<td>Fatima Ali</td>
																<td>Ali Raza</td>
																<td>3<sup>rd</sup></td>
																<td>A</td>
																<td>2011/04/25</td>
																<td>
																	<a href="{{url('/about-student')}}" class="btn btn-sm btn-primary"><i class="la la-eye"></i></a>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
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
