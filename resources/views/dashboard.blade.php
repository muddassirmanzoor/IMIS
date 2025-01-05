@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
				 <!--------Filter  bar START--------->
{{--                <form id="filterForm2" method="POST" action="{{ Request::path() }}">--}}
{{--                    @csrf--}}
{{--				<div class="row filter-label-row">--}}
{{--					<div class="col-sm-12 col-md-3 p-2">--}}
{{--						<div class="mb-3">--}}
{{--							<label>All District</label>--}}
{{--							<select class="form-select" id="district-select2" name="district">--}}
{{--								<option value="">All District</option>--}}
{{--                                @foreach($data['districts'] as $district)--}}
{{--                                    <option {{ $district->d_id == $data['request_district'] ? 'selected' : '' }} value="{{$district->d_id}}">{{$district->d_name}}</option>--}}
{{--                                @endforeach--}}
{{--							</select>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--					<div class="col-sm-12 col-md-3 p-2">--}}
{{--						<div class="mb-3">--}}
{{--							<label>All Tehsils</label>--}}
{{--							<select class="form-select" id="tehsils-select2" name="tehsil">--}}
{{--								<option value="">All Tehsils</option>--}}
{{--                                @foreach($data['tehsils'] as $tehsil)--}}
{{--                                    <option {{ $tehsil->t_id == $data['request_tehsil'] ? 'selected' : '' }} value="{{$tehsil->t_id}}">{{$tehsil->t_name}}</option>--}}
{{--                                @endforeach--}}
{{--							</select>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--                </form>--}}
                <!-- row -->
                <div class="row">
					<div class="col-xl-4 col-xxl-4 col-sm-12">
						<div class="widget-stat card bg-primary">
							<div class="card-body">
								<div class="media">
									<span class="mr-3">
									<i> <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><path fill="#1d3768" d="M337.8 5.4C327-1.8 313-1.8 302.2 5.4L166.3 96H48C21.5 96 0 117.5 0 144V464c0 26.5 21.5 48 48 48H592c26.5 0 48-21.5 48-48V144c0-26.5-21.5-48-48-48H473.7L337.8 5.4zM256 416c0-35.3 28.7-64 64-64s64 28.7 64 64v96H256V416zM96 192h32c8.8 0 16 7.2 16 16v64c0 8.8-7.2 16-16 16H96c-8.8 0-16-7.2-16-16V208c0-8.8 7.2-16 16-16zm400 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v64c0 8.8-7.2 16-16 16H512c-8.8 0-16-7.2-16-16V208zM96 320h32c8.8 0 16 7.2 16 16v64c0 8.8-7.2 16-16 16H96c-8.8 0-16-7.2-16-16V336c0-8.8 7.2-16 16-16zm400 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v64c0 8.8-7.2 16-16 16H512c-8.8 0-16-7.2-16-16V336zM232 176a88 88 0 1 1 176 0 88 88 0 1 1 -176 0zm88-48c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16s-7.2-16-16-16H336V144c0-8.8-7.2-16-16-16z"/></svg></i>
									</span>
									<div class="media-body text-white">
										<p class="mb-1">Total Schools</p>
										<div class="gender-types-tile">
											<h3 class="text-white">
{{--                                                {{number_format($data['total_data']['TotalSchools'])}}--}}
                                                {{number_format($data['total_schools'])}}
                                            </h3>
{{--											<div class="gender-types-tile-wrapper">--}}
{{--												<span class="female-color"><i class="fa fa-female" aria-hidden="true"></i><br>{{number_format($data['total_data']['Male'])}}</span>--}}
{{--												<span class="male-color"><i class="fa fa-male" aria-hidden="true"></i><br>{{number_format($data['total_data']['Female'])}}</span>--}}
{{--											</div>--}}
										</div>
									</div>
								</div>
							</div>
						</div>
                    </div>
					<div class="col-xl-4 col-xxl-4 col-sm-6">
						<div class="widget-stat card bg-secondary">
							<div class="card-body">
								<div class="media">
									<span class="mr-3">
										<i><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><path fill="#673bb7" d="M160 64c0-35.3 28.7-64 64-64H576c35.3 0 64 28.7 64 64V352c0 35.3-28.7 64-64 64H336.8c-11.8-25.5-29.9-47.5-52.4-64H384V320c0-17.7 14.3-32 32-32h64c17.7 0 32 14.3 32 32v32h64V64L224 64v49.1C205.2 102.2 183.3 96 160 96V64zm0 64a96 96 0 1 1 0 192 96 96 0 1 1 0-192zM133.3 352h53.3C260.3 352 320 411.7 320 485.3c0 14.7-11.9 26.7-26.7 26.7H26.7C11.9 512 0 500.1 0 485.3C0 411.7 59.7 352 133.3 352z"/></svg></i>
									</span>
									<div class="media-body text-white">
										<p class="mb-1">Total Teachers</p>
										<div class="gender-types-tile">
											<h3 class="text-white">{{number_format($data['total_teachers'])}}</h3>
{{--											<div class="gender-types-tile-wrapper">--}}
{{--												<span class="female-color"><i class="fa fa-female" aria-hidden="true"></i><br>No Data</span>--}}
{{--												<span class="male-color"><i class="fa fa-male" aria-hidden="true"></i><br>No Data</span>--}}
{{--											</div>--}}
										</div>
									</div>
								</div>
							</div>
						</div>
                    </div>
					<div class="col-xl-4 col-xxl-4 col-sm-6">
						<div class="widget-stat card bg-warning">
							<div class="card-body">
								<div class="media">
									<span class="mr-3">
									<i><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><path fill="#ffaa16" d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/></svg></i>
									</span>
									<div class="media-body text-white">
										<p class="mb-1">Total Students</p>
										<div class="gender-types-tile">
											<h3 class="text-white">{{number_format($data['total_students'])}} </h3>
{{--											<div class="gender-types-tile-wrapper">--}}
{{--												<span class="female-color"><i class="fa fa-female" aria-hidden="true"></i><br>No Data</span>--}}
{{--												<span class="male-color"><i class="fa fa-male" aria-hidden="true"></i><br>No Data</span>--}}
{{--											</div>--}}
										</div>
									</div>
								</div>
							</div>
						</div>
                    </div>
				</div>
					<!-- row -->
                <div class="row">
					<div class="col-xl-4 col-xxl-4 col-lg-6 col-md-6">
						<div class="card">
							<img class="img-fluid" src="{{ asset('images/imis-images/icons/SED-logo.png') }}" alt="">
							<div class="card-body">
								<!--<h4><a href="about-courses.html">PRIMARY SCHOOLS</a></h4>-->
								<ul class="list-group mb-3 list-group-flush">
									<li class="list-group-item px-0 border-top-0 d-flex justify-content-between"><span class="mb-0 text-muted">Schools:</span>
										<a href="javascript:void(0);"><strong>
{{--                                                {{number_format($data['total_data']['TotalSEDSchools'])}}--}}
                                                {{number_format($data['sed_schools'])}}
                                            </strong></a></li>
									<li class="list-group-item px-0 d-flex justify-content-between">
										<span class="mb-0">Students :</span><strong>{{number_format(11211154)}}</strong></li>
									<li class="list-group-item px-0 d-flex justify-content-between">
										<span class="mb-0">Teachers :</span><strong>{{number_format(335192)}}</strong></li>
								</ul>
{{--								<a href="#" class="btn btn-primary">More Info</a>--}}
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-xxl-4 col-lg-6 col-md-6">
						<div class="card">
							<img class="img-fluid" src="{{ asset('images/imis-images/icons/LNFBED.png') }}" alt="">
							<div class="card-body">
								<!--<h4><a href="about-courses.html">MIDDLE SCHOOLS</a></h4>-->
								<ul class="list-group mb-3 list-group-flush">
									<li class="list-group-item px-0 border-top-0 d-flex justify-content-between"><span class="mb-0 text-muted">Schools:</span>
										<a href="javascript:void(0);"><strong>{{number_format($data['lnfbd_schools'])}}</strong></a></li>
									<li class="list-group-item px-0 d-flex justify-content-between">
										<span class="mb-0">Students :</span><strong>{{number_format($data['lnfbd_students'])}}</strong></li>
									<li class="list-group-item px-0 d-flex justify-content-between">
										<span class="mb-0">Teachers :</span><strong>{{number_format($data['lnfbd_teachers'])}}</strong></li>
								</ul>
{{--								<a href="#" class="btn btn-primary">More Info</a>--}}
							</div>
						</div>
					</div>

                    <div class="col-xl-4 col-xxl-4 col-lg-6 col-md-6">
                        <div class="card">
                            <img class="img-fluid" src="{{ asset('images/imis-images/icons/spedu-logo.png') }}" alt="">
                            <div class="card-body">
                                <!--<h4><a href="about-courses.html">HIGHER SECONDARY SCHOOLS</a></h4>-->
                                <ul class="list-group mb-3 list-group-flush">
                                    <li class="list-group-item px-0 border-top-0 d-flex justify-content-between"><span class="mb-0 text-muted">Schools:</span>
                                        <a href="javascript:void(0);"><strong>{{number_format($data['sped_schools'])}}</strong></a></li>
                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                        <span class="mb-0">Students :</span><strong>{{number_format($data['sped_students'])}}</strong></li>
                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                        <span class="mb-0">Teachers :</span><strong>{{number_format($data['sped_teachers'])}}</strong></li>
                                </ul>
                                {{--								<a href="#" class="btn btn-primary">More Info</a>--}}
                            </div>
                        </div>
                    </div>
					<div class="col-xl-4 col-xxl-4 col-lg-6 col-md-6">
						<div class="card">
							<img class="img-fluid" src="{{ asset('images/imis-images/icons/peima.png') }}" alt="">
							<div class="card-body">
								<!--<h4><a href="about-courses.html">HIGH SCHOOLS</a></h4>-->
								<ul class="list-group mb-3 list-group-flush">
									<li class="list-group-item px-0 border-top-0 d-flex justify-content-between"><span class="mb-0 text-muted">Schools:</span>
										<a href="javascript:void(0);"><strong>{{number_format(4272)}}</strong></a></li>
									<li class="list-group-item px-0 d-flex justify-content-between">
										<span class="mb-0">Students :</span><strong>{{number_format(628077)}}</strong></li>
									<li class="list-group-item px-0 d-flex justify-content-between">
										<span class="mb-0">Teachers :</span><strong>{{number_format(21503)}}</strong></li>
								</ul>
{{--								<a href="#" class="btn btn-primary">More Info</a>--}}
							</div>
						</div>
					</div>
                    <div class="col-xl-4 col-xxl-4 col-lg-6 col-md-6">
						<div class="card">
							<img class="img-fluid" src="{{ asset('images/imis-images/icons/Punjab_Education_Foundation_(logo).jpg') }}" alt="">
							<div class="card-body">
								<!--<h4><a href="about-courses.html">HIGHER SECONDARY SCHOOLS</a></h4>-->
								<ul class="list-group mb-3 list-group-flush">
									<li class="list-group-item px-0 border-top-0 d-flex justify-content-between"><span class="mb-0 text-muted">Schools:</span>
										<a href="javascript:void(0);"><strong>{{number_format($data['pef_schools'])}}</strong></a></li>
									<li class="list-group-item px-0 d-flex justify-content-between">
										<span class="mb-0">Students :</span><strong>{{number_format($data['pef_students'])}}</strong></li>
									<li class="list-group-item px-0 d-flex justify-content-between">
										<span class="mb-0">Teachers :</span><strong>{{number_format($data['pef_teachers'])}}</strong></li>
								</ul>
{{--								<a href="#" class="btn btn-primary">More Info</a>--}}
							</div>
						</div>
					</div>
                    <div class="col-xl-4 col-xxl-4 col-lg-6 col-md-6">
						<div class="card">
							<img class="img-fluid" src="{{ asset('images/imis-images/icons/imgpsh_fullsize_anim.png') }}" alt="">
							<div class="card-body">
								<!--<h4><a href="about-courses.html">HIGHER SECONDARY SCHOOLS</a></h4>-->
								<ul class="list-group mb-3 list-group-flush">
									<li class="list-group-item px-0 border-top-0 d-flex justify-content-between"><span class="mb-0 text-muted">Schools:</span>
										<a href="javascript:void(0);"><strong>{{number_format(16)}}</strong></a></li>
									<li class="list-group-item px-0 d-flex justify-content-between">
										<span class="mb-0">Students :</span><strong>{{number_format(9365)}}</strong></li>
									<li class="list-group-item px-0 d-flex justify-content-between">
										<span class="mb-0">Teachers :</span><strong>{{number_format(526)}}</strong></li>
								</ul>
{{--								<a href="#" class="btn btn-primary">More Info</a>--}}
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        @push('scripts')
            <!-- Include School Js Files -->
            @include('partials.custom_scripts')
        @endpush
@endsection
