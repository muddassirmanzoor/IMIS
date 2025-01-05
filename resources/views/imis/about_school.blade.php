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

                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>About School</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                            <li class="breadcrumb-item active"><a href="{{url('/schools')}}">Schools</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">About School</a></li>
                        </ol>
                    </div>
                </div>

                @include('partials.drop_down')

				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-lg-12">
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header bg-primary">
										<div class="row">
											<div class="col-lg-12">
												<h3 class="mb-1 text-white">Government Pilot Secondary High School</h3>
											</div>
										</div>
									</div>
									<div class="card-body details-page-label">
										<div class="row">
											<div class="col-md-4 p-2">
													<label class="form-label"><b>District:</b></label>  <span class="form-label-value">{{$dropdownData['request']['district']}}</span>
											</div>
											<div class="col-md-4 p-2">
													<label class="form-label"><b>Tehsil:</b></label>  <span class="form-label-value">{{$dropdownData['request']['tehsil']}}</span>
											</div>
											<div class="col-md-4 p-2">
													<label class="form-label"><b>Markaz:</b></label>  <span class="form-label-value">{{$dropdownData['request']['markaz']}} </span>
											</div>
											<div class="col-md-4 p-2">
													<label class="form-label"><b>EMIS Code:</b></label>  <span class="form-label-value">{{$dropdownData['request']['emis_code']}}</span>
											</div>
											<div class="col-md-4 p-2">
													<label class="form-label"><b>Medium:</b></label> <span class="form-label-value">URDU</span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>School Gender:</b></label> <span class="form-label-value">Female</span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>Total Area:</b></label> <span class="form-label-value">3 kanal </span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>Covered Area:</b></label> <span class="form-label-value">2 kanal</span>
											</div>											
											<hr>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>Sanctioned Posts:</b></label> <span class="form-label-value">150</span>
											</div>

											<div class="col-md-4 p-2">
												<label class="form-label"><b>Filled Posts:</b></label> <span class="form-label-value">150</span>
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
												<label class="form-label"><b>Total Enrollment:</b></label> <span class="form-label-value">1500</span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><a href="{{url('/student-list')}}"><b>Female:</b></label> <span class="form-label-value">1500</span> </a>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>Male:</b></label> <span class="form-label-value">0</span>
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
												<label class="form-label"><b>&#10003;</b></label> <span class="form-label-value">Water</span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>&#10003;</b></label> <span class="form-label-value">Electricity </span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>&#10003;</b></label> <span class="form-label-value">Play Ground</span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>&#10003;</b></label> <span class="form-label-value">Boundery wall</span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>&#10003;</b></label> <span class="form-label-value">Toilets</span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>&#10003;</b></label> <span class="form-label-value">Library</span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>&#10003;</b></label> <span class="form-label-value">Labs</span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>&#10003;</b></label> <span class="form-label-value">Computer Labs </span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>&#10003;</b></label> <span class="form-label-value">Internet</span>
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
												<label class="form-label"><b>&#10003;</b></label> <span class="form-label-value">Afternoon Schools </span>
											</div>
											<div class="col-md-4 p-2">
												<label class="form-label"><b>&#10003;</b></label> <span class="form-label-value">Girls' Stipend Program </span>
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
