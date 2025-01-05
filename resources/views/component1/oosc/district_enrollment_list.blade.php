@extends('layouts.master')

@section('title', 'Enrollment List')

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
                                                <h3 class="mb-1 text-white">{{' Total Enrollment ('.number_format(count($enrollment)).')'}}</h3>
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
																<th>Tehsil</th>
																<th>Markaz</th>
																<th>EMIS</th>
																<th>School Name</th>
																<th>Name</th>
																<th>Father name</th>
																<th>Class</th>
																<th>Baseline</th>
															</tr>
														</thead>
														<tbody>
                                                        @foreach($enrollment as $index => $student)
															<tr>
																<td><strong>{{$index+1}}</strong></td>
																<td>{{$student['District']}}</td>
																<td>{{$student['Tehsil']}}</td>
																<td>{{$student['Markaz']}}</td>
																<td>{{$student['EMISCODE']}}</td>
																<td>{{$student['SchoolName']}}</td>
																<td>{{$student['Name']}}</td>
																<td>{{$student['FatherName']}}</td>
																<td>{{$student['EnrolledInClass']}}</td>
																<td>{{$student['BaselineAssessmentTaken']}}</td>
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
