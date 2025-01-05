@extends('layouts.master')

@section('title', 'Class List')

@section('content')
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">

                @include('partials.page_heading', ['type' => 'schools', 'name' => 'Class List'])

				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-lg-12">
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header bg-primary">
										<div class="row">
											<div class="col-lg-12">
                                                <h3 class="mb-1 text-white">{{$classes[0]->sgc_school_name .' ( '.$classes[0]->sgc_school_type.' ) - ' .$classes[0]->sgc_school_emis_code}}</h3>
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
																<th>Class Name</th>
																<th>Male Enrollment</th>
																<th>Female Enrollment</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody>
                                                        @foreach($classes as $index => $class)
															<tr>
																<td><strong>{{$index+1}}</strong></td>
																<td>{{$class->sgc_class}}</td>
																<td>{{$class->sgc_male}}</td>
																<td>{{$class->sgc_female}}</td>
																<td>
																	<a href="{{url('about-class/'.encrypt($class->sgc_school_idFk).'/'.encrypt($class->sgc_class_idFk))}}" class="btn btn-sm btn-primary"><i class="la la-eye"></i></a>
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
