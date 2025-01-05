@extends('layouts.master')

@section('title', 'Student List')

@section('content')
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">

                @include('partials.page_heading', ['type' => 'schools', 'name' => 'Search Student'])

				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-lg-12">
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header bg-primary">
										<div class="row">
											<div class="col-lg-12">
												<h3 class="mb-1 text-white">{{'Search '.$search_type .' ( '. $search_value. ' )'}}</h3>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-md-12 p-2">
												<div class="table-responsive">
													<table id="example4" class="student-list-tb" >
														<thead>
															<tr>
																<th>#</th>
																<th>Name</th>
																<th>Father Name</th>
																<th>School Name</th>
																<th>EMIS Code</th>
																<th>Class Name</th>
																<th>Admission Date</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody>
                                                        @foreach($students as $index => $student)
															<tr>
																<td><strong>{{$index+1}}</strong></td>
																<td>{{$student->s_name}}</td>
																<td>{{$student->s_father_name}}</td>
																<td>{{$student->school_name}}</td>
																<td>{{$student->s_emis_code}}</td>
																<td>{{$student->c_name}}</td>
																<td>{{$student->s_class_admission_date}}</td>
																<td>
																	<a href="{{url('about-student/'.encrypt($student->s_id))}}" class="btn btn-sm btn-primary"><i class="la la-eye"></i></a>
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
