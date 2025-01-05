@extends('layouts.master')

@section('title', 'L&NFBD Schools')

@section('content')
    <script>
        var schools = @json($data['graph_data']);
    jQuery(function ($) {
        $('#project_wise_center').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
       colors: ['#2f649a', '#f5c002', '#51733e', '#5a9bdb', '#8ac75f', '#3a4980', '#a07413'],
        title: {
            text: 'Project Wise Center',
            align: 'left'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y}'
                }
            }
        },
        series: [{
            name: 'Centers',
            colorByPoint: true,
            showInLegend: true,
            data: schools.school_project
        }]
    });
    $('#Centers_Location').highcharts({
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45
        }
    },
    title: {
        text: 'Centers by Location',
        align: 'left'
    },
	 tooltip: {
            pointFormat: '{series.name}: <b>{point.y} Centers</b>'
        },
    plotOptions: {
        pie: {
            innerSize: 100,
            depth: 45
        }
    },
    series: [{
        name: 'Region',
		 showInLegend: true,
        data: schools.school_by_area
    }]
    });
    $('#Building_Type').highcharts({
 chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45
        }
    },
    title: {
        text: 'Building Type',
        align: 'left'
    },
	 tooltip: {
            pointFormat: '{series.name}: <b>{point.y} Centes</b>'
        },
    plotOptions: {
        pie: {
            innerSize: 100,
            depth: 45
        }
    },
    series: [{
        name: 'Area',
		 showInLegend: true,
        data: schools.school_ownership
    }]
    });
});
</script>
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-7">
                        <div class="welcome-text">
                            <h4 style="color: #2ea762;"> L&NFBD Schools</h4>
                        </div>
                    </div>
                    <div class="col-sm-5 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Schools</a></li>
                        </ol>
                    </div>
                </div>

                <!--------Filter  bar START--------->
                @include('partials.drop_down')
                <!-- row -->
                <div class="row justify-content-center">
                <div class="col-xl-2 col-xxl-2 col-sm-2">
                    <div class="widget-stat card bg-left-line-green tiles-bar-tooltip-wrap">
                        <div class="card-body1">
                            <div class="media">
                                <div class="media-body text-white">
                                    <p class="mb-1 tiles-bar-title">Total Schools</p>
                                    <h3 class="tiles-bar-value">{{$data['db_schools']->TotalSchools}}
                                        <!-- <span class="gender-schools-types">
									 <span class="female-color"><i class="fa fa-female" aria-hidden="true"></i><br> 25,540 </span>
									<span class="male-color"><i class="fa fa-male" aria-hidden="true"></i><br> 22,932 </span></span> -->
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
                                    <p class="mb-1 tiles-bar-title">TSKL</p>
                                    <h3 class="tiles-bar-value">{{$data['db_schools']->TSKL}}
                                        <!-- <span class="gender-schools-types"> <span class="female-color"><i class="fa fa-female" aria-hidden="true"></i><br> 16,926</span>
												<span class="male-color"><i class="fa fa-male" aria-hidden="true"></i><br> 15,369</span></span> -->
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
                                    <p class="mb-1 tiles-bar-title">GPE</p>
                                    <h3 class="tiles-bar-value">{{$data['db_schools']->GPE}}
                                        <!-- <span class="gender-schools-types"> <span class="female-color"><i class="fa fa-female" aria-hidden="true"></i><br> 4,265</span><span class="male-color"><i class="fa fa-male" aria-hidden="true"></i><br> 2,960</span></span> -->
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
                                    <p class="mb-1 tiles-bar-title">NCHD</p>
                                    <h3 class="tiles-bar-value">{{$data['db_schools']->NCHD}}
                                         <!-- <span class="gender-schools-types"> <span class="female-color"><i class="fa fa-female" aria-hidden="true"></i><br> 3,931</span><span class="male-color"><i class="fa fa-male" aria-hidden="true"></i><br> 4,147</span></span> -->
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
                                    <p class="mb-1 tiles-bar-title">BECS</p>
                                    <h3 class="tiles-bar-value">{{$data['db_schools']->BECS}}
                                         <!-- <span class="gender-schools-types"> <span class="female-color"><i class="fa fa-female" aria-hidden="true"></i><br> 418 </span><span class="male-color"><i class="fa fa-male" aria-hidden="true"></i><br>394 </span></span> -->
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
                                    <p class="mb-1 tiles-bar-title">PNFEP</p>
                                    <h3 class="tiles-bar-value">{{$data['db_schools']->PNFEP}}
                                         <!-- <span class="gender-schools-types"> <span class="female-color"><i class="fa fa-female" aria-hidden="true"></i><br> 418 </span><span class="male-color"><i class="fa fa-male" aria-hidden="true"></i><br>394 </span></span> -->
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
				<!-- row START-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- row START-->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div id="project_wise_center"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div id="Centers_Location"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div id="Building_Type"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <!-- row END -->
                                        <!-- row START-->
                                        <div class="row">
							<div class="col-xl-3 col-xxl-3 col-sm-3">
								<div class="widget-stat card">
									<div class="card-body">
										<div class="icon-image">
											<img src="{{ asset('images/imis-images/icons/water-tap.png') }}" style="width: 50px;">
										</div>
										<h4 class="card-title">Water</h4>
										<h3>
											<span class="facility-number green-number">{{$data['db_schools']->Water}}</span>
                                            <span class="facility-number red-number">{{$data['db_schools']->TotalSchools-$data['db_schools']->Water}}</span>
                                        </h3>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-xxl-3 col-sm-3">
								<div class="widget-stat card">
									<div class="card-body">
										<div class="icon-image">
											<img src="{{ asset('images/imis-images/icons/Sun-Light.png') }}" style="width: 50px;">
										</div>
										<h4 class="card-title">Sun Light</h4>
										<h3>
											<span class="facility-number green-number">{{$data['db_schools']->SunLight}}</span>
                                            <span class="facility-number red-number">{{$data['db_schools']->TotalSchools-$data['db_schools']->SunLight}}</span>
                                        </h3>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-xxl-3 col-sm-3">
								<div class="widget-stat card">
									<div class="card-body">
										<div class="icon-image">
											<img src="{{ asset('images/imis-images/icons/bulb.png') }}" style="width: 50px;">
										</div>
										<h4 class="card-title">Electricity</h4>
										<h3>
											<span class="facility-number green-number">{{$data['db_schools']->Electricity}}</span>
                                            <span class="facility-number red-number">{{$data['db_schools']->TotalSchools-$data['db_schools']->Electricity}}</span>
                                        </h3>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-xxl-3 col-sm-3">
								<div class="widget-stat card">
									<div class="card-body">
										<div class="icon-image">
											<img src="{{ asset('images/imis-images/icons/ventilation.png') }}" style="width: 50px;">
										</div>
										<h4 class="card-title">Ventilation</h4>
										<h3>
											<span class="facility-number green-number">{{$data['db_schools']->Ventilation}}</span>
                                            <span class="facility-number red-number">{{$data['db_schools']->TotalSchools-$data['db_schools']->Ventilation}}</span>
                                        </h3>
									</div>
								</div>
							</div>
						</div>
                                        <!-- row END-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row END -->

                <!--**********************************
            Content body end
        ***********************************-->
    @push('scripts')
        <!-- Include School Js Files -->
        @include('partials.custom_scripts')
    @endpush
@endsection
