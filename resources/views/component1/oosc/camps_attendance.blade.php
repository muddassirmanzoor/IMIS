@extends('layouts.master')

@section('title', 'Camps List')

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
                                                <h3 class="mb-1 text-white">{{' Camps Below Threshold - Last Week ('.number_format(count($attendance)).')'}}</h3>
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
																<th>Teacher Name</th>
																<th>ContactNo</th>
																<th>Days Below Threshold</th>
{{--																<th>Action</th>--}}
															</tr>
														</thead>
														<tbody>
                                                        @foreach($attendance as $index => $camp)
															<tr>
																<td><strong>{{$index+1}}</strong></td>
																<td>{{$camp['DISTRICT']}}</td>
																<td>{{$camp['TEHSIL']}}</td>
																<td>{{$camp['MARKAZ']}}</td>
																<td>{{$camp['EMISCODE']}}</td>
																<td>{{$camp['SchoolName']}}</td>
																<td>{{$camp['TeacherName']}}</td>
																<td>{{$camp['ContactNo']}}</td>
																<td>{{$camp['DaysBelowThreshold']}}</td>
{{--																<td>--}}
{{--																	<a href="{{url('class-list/'.encrypt($school['s_id']))}}" class="btn btn-sm btn-primary"><i class="la la-eye"></i></a>--}}
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
