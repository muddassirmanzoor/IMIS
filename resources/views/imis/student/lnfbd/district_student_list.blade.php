﻿@extends('layouts.master')

@section('title', 'Student List')

@section('content')
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">

                @include('partials.page_heading', ['type' => 'students', 'name' => 'Student List'])

				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-lg-12">
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header bg-primary">
										<div class="row">
											<div class="col-lg-12">
                                                <h3 class="mb-1 text-white">{{$students[0]['d_name'].' '.$level.' Students ('.number_format(count($students)).')'}}</h3>
                                            </div>
										</div>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-md-12 p-2">
												<div class="table-responsive">
													<table id="example7" class="student-list-tb">
														<thead>
															<tr>
																<th>#</th>
                                                                <th>Student Name</th>
                                                                <th>Father Name</th>
                                                                <th>Gender</th>
                                                                <th>School Name</th>
                                                                <th>Project</th>
{{--																<th>Action</th>--}}
															</tr>
														</thead>
														<tbody>
                                                        @foreach($students as $index => $student)
															<tr>
																<td><strong>{{$index+1}}</strong></td>
                                                                <td>{{$student['learner_name']}}</td>
                                                                <td>{{$student['guardian_name']}}</td>
                                                                <td>{{$student['learner_gender']}}</td>
                                                                <td>{{$student['school_name']}}</td>
                                                                <td>{{$student['project']}}</td>
{{--																<td>--}}
{{--																	<a href="{{url('lnfbd/'.$request['level'].'/student-list/'.encrypt($student['d_id']))}}" class="btn btn-sm btn-primary"><i class="la la-eye"></i></a>--}}
{{--																</td>--}}
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
