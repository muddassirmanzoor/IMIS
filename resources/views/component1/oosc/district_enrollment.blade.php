@extends('layouts.master')

@section('title', 'District List')

@section('content')
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">


				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-lg-12">
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header bg-primary">
										<div class="row">
											<div class="col-lg-12">
                                                <h3 class="mb-1 text-white">{{' Total District ('.number_format(count($enrollment)).')'}}</h3>
                                            </div>
										</div>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-md-12 p-2">
												<div class="table-responsive">
													<table id="example3" class="student-list-tb">
														<thead>
															<tr>
																<th>#</th>
																<th>District</th>
																<th>Total Enrollment</th>
																<th>Male Enrollment</th>
																<th>Female Enrollment</th>
																<th>Intermediate Enrollment</th>
																<th>Beginner Enrollment</th>
																<th>OOSC Enrollment</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody>
                                                        @foreach($enrollment as $index => $district)
															<tr>
																<td><strong>{{$index+1}}</strong></td>
																<td>{{$district['xAxis']}}</td>
																<td>{{$district['TotalEnrollment']}}</td>
																<td>{{$district['TotalMaleEnrollment']}}</td>
																<td>{{$district['TotalFemaleEnrollment']}}</td>
																<td>{{$district['TotalIntermediateEnrollment']}}</td>
																<td>{{$district['TotalBeginnerEnrollment']}}</td>
																<td>{{$district['TotalEnrollmentOOSC']}}</td>
																<td>
																	<a href="{{url('fln/district-enrollment-list/'.encrypt($district['xAxis']))}}" class="btn btn-sm btn-primary"><i class="la la-eye"></i></a>
																</td>
															</tr>
                                                        @endforeach
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
