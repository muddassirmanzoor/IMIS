@extends('layouts.master')

@section('title', 'About School')

@section('content')
<script>
		jQuery(function ($) {
			Highcharts.setOptions({
				lang: {
				thousandsSep: ""
			  }
			})
			$('#series_graph_5years').highcharts({
			chart: {
					type: 'line'
				},

			title: {
				text: '',
				align: 'left',
				enabled: false
			},
			yAxis: {
				title: {
					text: 'Number of Enrollment'
				}
			},

			xAxis: {
				accessibility: {
					rangeDescription: 'Range: 2010 to 2020'
				}
			},

			legend: {
				layout: 'vertical',
				align: 'right',
				verticalAlign: 'middle'
			},

			plotOptions: {
				series: {
					label: {
						connectorAllowed: false
					},
					pointStart: 2018
				}
			},

			series: [{
				name: 'Students',
				data: [161454, 154610,112224, 154610,112224]
			}],

			responsive: {
				rules: [{
					condition: {
						maxWidth: 500
					},
					chartOptions: {
						legend: {
							layout: 'horizontal',
							align: 'center',
							verticalAlign: 'bottom'
						}
					}
				}]
			}

			});
		});
	</script>
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">

                @include('partials.page_heading', ['type' => 'schools', 'name' => 'School Profile'])


                @include('partials.drop_down')

				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-lg-12">
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header bg-primary">
										<div class="row">
											<div class="col-lg-12">
												<h3 class="mb-1 text-white">{{$data['school']->s_name}}</h3>
											</div>
										</div>
									</div>
									<div class="card-body details-page-label">
										<div class="row">
											<div class="col-md-4 p-2">
													<label class="form-label"><b>District:</b></label>  <span class="form-label-value">{{$data['district']->d_name}}</span>
											</div>
											<div class="col-md-4 p-2">
													<label class="form-label"><b>Tehsil:</b></label>  <span class="form-label-value">{{$data['tehsil']->t_name}}</span>
											</div>
											<div class="col-md-4 p-2">
													<label class="form-label"><b>Markaz:</b></label>  <span class="form-label-value">{{$data['markaz']->m_name}} </span>
											</div>
											<div class="col-md-4 p-2">
													<label class="form-label"><b>EMIS Code:</b></label>  <span class="form-label-value">{{$dropdownData['request']['emis_code']}}</span>
											</div>
											<div class="col-md-4 p-2">
													<label class="form-label"><b>Medium:</b></label> <span class="form-label-value">{{$data['school']->s_medium}}</span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>School Gender:</b></label> <span class="form-label-value">{{$data['school']->s_type}}</span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>Total Area:</b></label> <span class="form-label-value">{{$data['school']->si_total_area_kanal}} Kanal</span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>Covered Area:</b></label> <span class="form-label-value">{{$data['school']->si_total_area_kanal - $data['school']->si_uncovered_area_kanal}} Kanal</span>
											</div>
											<hr>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>Sanctioned Posts:</b></label> <span class="form-label-value">{{$data['school']->total_posts}}</span>
											</div>

											<div class="col-md-4 p-2">
												<label class="form-label"><b>Filled Posts:</b></label> <span class="form-label-value">{{$data['school']->filled_posts}}</span>
											</div>
										</div>
									</div>
								</div> <!-----Card End----->
							</div> <!-----col-lg-12 End----->
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header bg-primary">
										<div class="row">
											<div class="col-lg-12">
												<h3 class="mb-1  text-white">Enrollment</h3>
											</div>
										</div>
									</div>
									<div class="card-body details-page-label">
										<div class="row">
											<div class="col-md-4 p-2">
												<label class="form-label"><b>Total Enrollment:</b></label><span class="form-label-value">{{$data['school']->enrolled_students}}</span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>Female:</b></label> <span class="form-label-value">{{$data['school']->female_students}}</span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>Male:</b></label> <span class="form-label-value">{{$data['school']->male_students}}</span>
											</div>
											<div class="col-md-8 p-2">
                                                <b><a href="{{url('class-list/'.encrypt($data['school']->s_id))}}">
                                                            Click here for Enrollment Detail</a></b></div>
											</div>

										</div>
									</div>
								</div> <!-----Card End----->
							</div> <!-----col-lg-12 End----->
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header bg-primary">
										<div class="row">
											<div class="col-lg-12">
												<h3 class="mb-1 text-white">Facilities</h3>
											</div>
										</div>
									</div>
									<div class="card-body details-page-label">
										<div class="row">
											<div class="col-md-4 p-2">
												<label class="form-label"><b>{!! $data['school']->si_has_drinking_water == 1 ? '&#10003;' : '&#10007;' !!}  </b></label> <span class="form-label-value">Water</span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>{!! $data['school']->si_has_electricity == 1 ? '&#10003;' : '&#10007;' !!}</b></label> <span class="form-label-value">Electricity </span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>{!! $data['school']->si_has_playing_ground == 1 ? '&#10003;' : '&#10007;' !!}</b></label> <span class="form-label-value">Play Ground</span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>{!! $data['school']->si_has_boundary == 1 ? '&#10003;' : '&#10007;' !!}</b></label> <span class="form-label-value">Boundary wall</span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>{!!$data['school']->si_has_toilet == 1 ? '&#10003;' : '&#10007;' !!}</b></label> <span class="form-label-value">Toilets</span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>{!! $data['school']->si_has_library == 1 ? '&#10003;' : '&#10007;' !!}</b></label> <span class="form-label-value">Library</span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>{!! $data['school']->si_has_science_lab == 1 ? '&#10003;' : '&#10007;' !!}</b></label> <span class="form-label-value">Science Lab</span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>{!! $data['school']->si_has_computer_lab == 1 ? '&#10003;' : '&#10007;' !!}</b></label> <span class="form-label-value">Computer Lab </span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>{!! $data['school']->si_has_internet == 1 ? '&#10003;' : '&#10007;' !!}</b></label> <span class="form-label-value">Internet</span>
											</div>
										</div>
									</div>
								</div> <!-----Card End----->
							</div> <!-----col-lg-12 End----->
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header bg-primary">
										<div class="row">
											<div class="col-lg-12">
												<h3 class="mb-1 text-white">Initiatives</h3>
											</div>
										</div>
									</div>
									<div class="card-body details-page-label">
										<div class="row">
											<div class="col-md-4 p-2">
												<label class="form-label"><b>{!! $data['school']->s_is_iasp == 1 ? '&#10003;' : '&#10007;' !!}</b></label> <span class="form-label-value">Afternoon Schools </span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>
                                                        @if(in_array($data['district']->d_name, $ztp_districts) && $data['school']->s_type == 'Female')
                                                            &#10003;
                                                        @else
                                                            &#10007;
                                                        @endif
                                                    </b></label> <span class="form-label-value">Girls' Stipend Program </span>
											</div>
										</div>
									</div>
								</div> <!-----Card End----->
							</div> <!-----col-lg-12 End----->
                            <div class="col-lg-12">
								<div class="card">
									<div class="card-header bg-primary">
										<div class="row">
											<div class="col-lg-12">
												<h3 class="mb-1 text-white">Enrollment time series graph 5 years</h3>
											</div>
										</div>
									</div>
									<div class="card-body details-page-label">
										<div class="row">
											<div class="col-md-12 p-2">
												<div id="series_graph_5years"></div>
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
        @push('scripts')
            <!-- Include School Js Files -->
            @include('partials.custom_scripts')
        @endpush
@endsection
