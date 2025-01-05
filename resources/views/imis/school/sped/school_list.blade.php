@extends('layouts.master')

@section('title', 'Class List')

@section('content')
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">

                @include('partials.page_heading', ['type' => 'schools', 'name' => 'School List'])

				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-lg-12">
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header bg-primary">
										<div class="row">
											<div class="col-lg-12">
                                                <h3 class="mb-1 text-white">{{$request['level'] .' Schools ('.number_format(count($schools)).')'}}</h3>
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
																<th>School Name</th>
																<th>Institution Type</th>
																<th>Emis Code</th>
{{--																<th>Action</th>--}}
															</tr>
														</thead>
														<tbody>
                                                        @foreach($schools as $index => $school)
															<tr>
																<td><strong>{{$index+1}}</strong></td>
																<td>{{$school['d_name']}}</td>
																<td>{{$school['t_name']}}</td>
																<td>{{$school['institution_name']}}</td>
																<td>{{$school['institution_type']}}</td>
																<td>{{$school['EMIS_code']}}</td>
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
