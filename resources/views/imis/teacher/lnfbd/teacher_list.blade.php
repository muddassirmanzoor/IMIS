@extends('layouts.master')

@section('title', 'Teacher List')

@section('content')
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">

                @include('partials.page_heading', ['type' => 'teachers', 'name' => 'Teacher List'])

				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-lg-12">
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
{{--									<div class="card-header bg-primary">--}}
{{--										<div class="row">--}}
{{--											<div class="col-lg-12">--}}
{{--                                                <h3 class="mb-1 text-white">{{$request['level'] .' Schools ('.number_format(count($schools)).')'}}</h3>--}}
{{--                                            </div>--}}
{{--										</div>--}}
{{--									</div>--}}
									<div class="card-body">
										<div class="row">
											<div class="col-md-12 p-2">
												<div class="table-responsive">
													<table id="example6" class="student-list-tb">
														<thead>
															<tr>
																<th>#</th>
                                                                <th>Teacher Name</th>
                                                                <th>District</th>
																<th>Tehsil</th>
																<th>School Name</th>
																<th>School Code</th>
															</tr>
														</thead>
														<tbody>
                                                        @foreach($teachers as $index => $teacher)
															<tr>
																<td><strong>{{$index+1}}</strong></td>
                                                                <td>{{$teacher['teacher_name']}}</td>
                                                                <td>{{$teacher['d_name']}}</td>
																<td>{{$teacher['t_name']}}</td>
																<td>{{$teacher['school_name']}}</td>
																<td>{{$teacher['school_code']}}</td>
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
