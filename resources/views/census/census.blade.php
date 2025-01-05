@extends('layouts.master')

@section('title', 'Trends Census')

@section('content')
        <!--**********************************
            Content body start
        ***********************************-->
		<script>
	jQuery(function ($) {
	 /****************TECG-Enrollment-girls****************/
		$('#TECG-Enrollment-girls').highcharts({
			 chart: {
			type: 'column'
		},
		title: {
			text: 'Number of class for girls , 5-Year Trend',
			align:'left'
		},
		xAxis: {
			categories: [
				'2017',
				'2018',
				'2019',
				'2020',
				'2021'
			],
			crosshair: true
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Enrollment'
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
				'<td style="padding:0"><b>{point.y}</b></td></tr>',
			footerFormat: '</table>',
			shared: true,
			useHTML: true
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0
			}
		},
		series: [{
			name: 'ECE/Kachi',
			data: [49.9, 71.5, 106.4, 129.2, 144.0],
			color:"#f33a86" 

		},{
			name: 'Class 1',
			data: [49.9, 71.5, 106.4, 129.2, 144.0],
			color:"#f781b2" 

		},{
			name: 'Class 2',
			data: [49.9, 71.5, 106.4, 129.2, 144.0],
			color:"#f8a4c6" 

		},{
			name: 'Class 3',
			data: [49.9, 71.5, 106.4, 129.2, 144.0],
			color:"#E91E63" 

		},{
			name: 'Class 4',
			data: [49.9, 71.5, 106.4, 129.2, 144.0],
			color:"#E91E63" 

		},{
			name: 'Class 5',
			data: [49.9, 71.5, 106.4, 129.2, 144.0],
			color:"#E91E63" 

		},{
			name: 'Class 6',
			data: [49.9, 71.5, 106.4, 129.2, 144.0],
			color:"#E91E63" 

		},{
			name: 'Class 7',
			data: [49.9, 71.5, 106.4, 129.2, 144.0],
			color:"#E91E63" 

		},{
			name: 'Class 8',
			data: [49.9, 71.5, 106.4, 129.2, 144.0],
			color:"#E91E63" 

		},{
			name: 'Class 9',
			data: [49.9, 71.5, 106.4, 129.2, 144.0],
			color:"#E91E63" 

		},{
			name: 'Class 10',
			data: [49.9, 71.5, 106.4, 129.2, 144.0],
			color:"#E91E63" 

		},{
			name: 'Class 11',
			data: [49.9, 71.5, 106.4, 129.2, 144.0],
			color:"#E91E63" 

		},{
			name: 'Class 12',
			data: [49.9, 71.5, 106.4, 129.2, 144.0],
			color:"#E91E63" 

		}]
	});
	/****************TECG-Enrollment-boys****************/
		$('#TECG-Enrollment-boy').highcharts({
			 chart: {
			type: 'column'
		},
		title: {
			text: 'Number of class for boys , 5-Year Trend',
			align:'left'
		},
		xAxis: {
			categories: [
				'2017',
				'2018',
				'2019',
				'2020',
				'2021'
			],
			crosshair: true
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Enrollment'
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
				'<td style="padding:0"><b>{point.y}</b></td></tr>',
			footerFormat: '</table>',
			shared: true,
			useHTML: true
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0
			}
		},
		series: [{
			name: 'ECE/Kachi',
			data: [49.9, 71.5, 106.4, 129.2, 144.0],
			color:"#1d3768"

		},{
			name: 'Class 1',
			data: [49.9, 71.5, 106.4, 129.2, 144.0],
			color:"#1d3768"

		},{
			name: 'Class 2',
			data: [49.9, 71.5, 106.4, 129.2, 144.0],
			color:"#1d3768"

		},{
			name: 'Class 3',
			data: [49.9, 71.5, 106.4, 129.2, 144.0],
			color:"#1d3768"

		},{
			name: 'Class 4',
			data: [49.9, 71.5, 106.4, 129.2, 144.0],
			color:"#1d3768"

		},{
			name: 'Class 5',
			data: [49.9, 71.5, 106.4, 129.2, 144.0],
			color:"#1d3768"

		},{
			name: 'Class 6',
			data: [49.9, 71.5, 106.4, 129.2, 144.0],
			color:"#1d3768"

		},{
			name: 'Class 7',
			data: [49.9, 71.5, 106.4, 129.2, 144.0],
			color:"#1d3768"

		},{
			name: 'Class 8',
			data: [49.9, 71.5, 106.4, 129.2, 144.0],
			color:"#1d3768"

		},{
			name: 'Class 9',
			data: [49.9, 71.5, 106.4, 129.2, 144.0],
			color:"#1d3768"

		},{
			name: 'Class 10',
			data: [49.9, 71.5, 106.4, 129.2, 144.0],
			color:"#1d3768"

		},{
			name: 'Class 11',
			data: [49.9, 71.5, 106.4, 129.2, 144.0],
			color:"#1d3768"

		},{
			name: 'Class 12',
			data: [49.9, 71.5, 106.4, 129.2, 144.0],
			color:"#1d3768"

		}]
	});
	 /****************TPSSE-School****************/
	 //< !----------------TPSSE-School Start  here-------------------->
	 $('#TPSSE-Enrollment').highcharts({ 
		chart: {
			type: 'column'
		},
		title: {
			text: 'Enrollment by Gender , 5-Year Trend',
			align:'left'
		},
		xAxis: {
			categories: [
				'2017',
				'2018',
				'2019',
				'2020',
				'2021'
			],
			crosshair: true
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Number of Students'
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:10px">School trend {point.key}</span><table>',
			pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
				'<td style="padding:0"><b>{point.y}</b></td></tr>',
			footerFormat: '</table>',
			shared: true,
			useHTML: true
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0
			}
		},
		series: [{
			name: 'Male <i class="fa fa-male"></i>',
			data: [6007228, 6122668, 5958634, 5638776, 5944935],
			color:"#1d3768"

		}, {
			name: 'Female <i class="fa fa-female"></i>',
			data: [5663345, 5839809, 5768041, 5502747, 5925984],
			color:"#E91E63"

		}]
	});
		/****************TPSSE-School****************/
		$('#enrollment-changes').highcharts({
		chart: {
        type: 'column'
			},
			title: {
				text: 'Enrollment Changes from October 2020 to October 2021',
				align:'left'
			},
			xAxis: {
				categories: [
					'ECE/Kachi',
					'Class 1',
					'Class 2',
					'Class 3',
					'Class 4',
					'Class 5',
					'Class 6',
					'Class 7',
					'Class 8',
					'Class 9',
					'Class 10',
					'Class 11',
					'Class 12'
				],
				crosshair: true
			},
			yAxis: {
				min: 0,
				title: {
					text: 'Number'
				}
			},
			tooltip: {
				headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
				pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
					'<td style="padding:0"><b>{point.y}</b></td></tr>',
				footerFormat: '</table>',
				shared: true,
				useHTML: true
			},
			plotOptions: {
				column: {
					pointPadding: 0.2,
					borderWidth: 0
				}
			},
			series: [{
				name: 'Oct 2020',
				data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4,
					194.1, 95.6, 54.4, 92.3]

			}, {
				name: 'Oct 2021',
				data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5,
					106.6, 92.3, 92.3]

			}]
		});
		
	});
</script>
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">

                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Census</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Census</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Trends Census</a></li>
                        </ol>
                    </div>
                </div>
				<!-----Row Start----->
			<div class="row justify-content-center">
                <div class="col-xl-2 col-xxl-2 col-sm-2">
                    <div class="widget-stat card bg-left-line-green tiles-bar-tooltip-wrap">
                        <div class="card-body1">
                            <div class="media">
                                <div class="media-body text-white">
                                    <p class="mb-1 tiles-bar-title">2017</p>
                                    <h3 class="tiles-bar-value">48132 <span class="gender-schools-types"><span class="male-color"><i class="fa fa-male" aria-hidden="true"></i><br> 49% </span> <span class="female-color"><i class="fa fa-male" aria-hidden="true"></i><br> 51% </span></span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-xxl-2 col-sm-2">
                    <div class="widget-stat card bg-left-line-yellow tiles-bar-tooltip-wrap">
                        <div class="card-body1">
                            <div class="media">
                                <div class="media-body text-white">
                                    <p class="mb-1 tiles-bar-title">2018</p>
                                    <h3 class="tiles-bar-value">48200<span class="gender-schools-types"><span class="male-color"><i class="fa fa-male" aria-hidden="true"></i><br> 48%</span> <span class="female-color"><i class="fa fa-male" aria-hidden="true"></i><br> 52%</span></span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-xxl-2 col-sm-2">
                    <div class="widget-stat card bg-left-line-purple tiles-bar-tooltip-wrap">
                        <div class="card-body1">
                            <div class="media">
                                <div class="media-body text-white">
                                    <p class="mb-1 tiles-bar-title">2019</p>
                                    <h3 class="tiles-bar-value">48207<span class="gender-schools-types"><span class="male-color"><i class="fa fa-male" aria-hidden="true"></i><br> 48%</span> <span class="female-color"><i class="fa fa-male" aria-hidden="true"></i><br> 52%</span></span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-xxl-2 col-sm-2">
                    <div class="widget-stat card bg-left-line-lgreen tiles-bar-tooltip-wrap">
                        <div class="card-body1">
                            <div class="media">
                                <div class="media-body text-white">
                                    <p class="mb-1 tiles-bar-title">2020</p>
                                    <h3 class="tiles-bar-value">48238 <span class="gender-schools-types"><span class="male-color"><i class="fa fa-male" aria-hidden="true"></i><br> 47%</span> <span class="female-color"><i class="fa fa-male" aria-hidden="true"></i><br> 53%</span></span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-xxl-2 col-sm-2">
                    <div class="widget-stat card bg-left-line-red  tiles-bar-tooltip-wrap">
                        <div class="card-body1">
                            <div class="media">
                                <div class="media-body text-white">
                                    <p class="mb-1 tiles-bar-title">2021</p>
                                    <h3 class="tiles-bar-value">48240  <span class="gender-schools-types"><span class="male-color"><i class="fa fa-male" aria-hidden="true"></i><br> 47% </span> <span class="female-color"><i class="fa fa-male" aria-hidden="true"></i><br> 53% </span></span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
				<!-----Row END----->

				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-lg-12">
						<div class="row">
							<div class="col-lg-12">
								<div class="card">									
									<div class="card-body details-page-label">
										<div class="row">
                                            <div class="col-md-12 p-2 pl-3">
												<div id="TPSSE-Enrollment"></div>
                                            </div>
										</div><!-----Row End----->
									</div>
								</div> <!-----Card End----->
							</div> <!-----col-lg-12 End----->
						</div>
					</div>
					<div class="col-xl-12 col-xxl-12 col-lg-12">
						<div class="row">
							<div class="col-lg-12">
								<div class="card">									
									<div class="card-body details-page-label">
										<div class="row">
                                            <div class="col-md-12 p-2 pl-3">
												<div id="TECG-Enrollment-girls"></div>
                                            </div>
										</div><!-----Row End----->
									</div>
								</div> <!-----Card End----->
							</div> <!-----col-lg-12 End----->
						</div>
					</div>
					<div class="col-xl-12 col-xxl-12 col-lg-12">
						<div class="row">
							<div class="col-lg-12">
								<div class="card">									
									<div class="card-body details-page-label">
										<div class="row">
                                            <div class="col-md-12 p-2 pl-3">
												<div id="TECG-Enrollment-boy"></div>
                                            </div>
										</div><!-----Row End----->
									</div>
								</div> <!-----Card End----->
							</div> <!-----col-lg-12 End----->
						</div>
					</div>
					<div class="col-xl-12 col-xxl-12 col-lg-12">
						<div class="row">
							<div class="col-lg-12">
								<div class="card">									
									<div class="card-body details-page-label">
										<div class="row">
                                            <div class="col-md-12 p-2 pl-3">
												<div id="enrollment-changes"></div>
                                            </div>
										</div><!-----Row End----->
									</div>
								</div> <!-----Card End----->
							</div> <!-----col-lg-12 End----->
						</div>
					</div>
				</div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
@endsection
