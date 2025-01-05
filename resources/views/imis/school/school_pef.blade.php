@extends('layouts.master')

@section('title', 'PEF Schools')

@section('content')
    <script>
        var schools = @json($data['graph_data']);
        jQuery(function ($) {
            $('#district_level_schools').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Schools by level',
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
                    name: 'Schools',
                    colorByPoint: true,
                    showInLegend: true,
                    data: schools.data_levels
                }]
            });
            /**************************** */
            $('#district_gender_schools').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: 0,
                    plotShadow: false
                },
                title: {
                    text: 'Gender Wise Schools',
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
                        dataLabels: {
                            enabled: true,
                            distance: -50,
                            style: {
                                fontWeight: 'bold',
                                color: 'white'
                            }
                        },
                        startAngle: -90,
                        endAngle: 90,
                        center: ['50%', '75%'],
                        size: '110%'
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'School By Gender',
                    innerSize: '50%',
                    showInLegend: true,
                    data: schools.data_gender
                }]
            });
            //< !----------------Schools Area chart Start here-------------------->
            $('#Schools_Area').highcharts({
                chart: {
                    type: 'pie',
                    options3d: {
                        enabled: true,
                        alpha: 45
                    }
                },
                title: {
                    text: 'Area Wise Schools',
                    align: 'left'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.y}</b>'
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
                    data: schools.data_areas
                }]
            });
            //< !----------------School Ownership chart Start here-------------------->
            $('#School_Ownership').highcharts({
                chart: {
                    type: 'pie',
                    options3d: {
                        enabled: true,
                        alpha: 45
                    }
                },
                title: {
                    text: 'Ownership Wise Schools',
                    align: 'left'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        innerSize: 100,
                        depth: 45,
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.y}'
                        }
                    }
                },
                series: [{
                    name: 'Schools',
                    colorByPoint: true,
                    showInLegend: true,
                    data: schools.data_ownership
                }]
            });
            //< !----------------School_Construction_Type chart Start here-------------------->
            $('#Program_Type').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Program Wise Schools Type',
                    align: 'left'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
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
                    name: 'Program Wise Schools Type',
                    colorByPoint: true,
                    showInLegend: true,
                    data: schools.data_programs
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
                @include('partials.page_heading', ['type' => 'schools'])

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
                                        <h3 class="tiles-bar-value">{{number_format($data['db_schools']->TotalSchools)}}<span class="gender-schools-types">
									 <span class="female-color"><i class="fa fa-female" aria-hidden="true"></i><br> {{number_format($data['db_schools']->Female)}} </span>
									<span class="male-color"><i class="fa fa-male" aria-hidden="true"></i><br> {{number_format($data['db_schools']->Male)}}</span></span>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($data['data_programs'] as $program)
                    <div class="col-xl-2 col-xxl-2 col-sm-2">
                        <div class="widget-stat card bg-left-line-yellow tiles-bar-tooltip-wrap">
                            <div class="card-body1">
                                <div class="media">
                                    <div class="media-body text-white">
                                        <p class="mb-1 tiles-bar-title">{{$program->program_type}} </p>
                                        <h3 class="tiles-bar-value">{{number_format($program->SchoolsCount)}}<span class="gender-schools-types"> <span class="female-color">
                                                    <i class="fa fa-female" aria-hidden="true"></i><br> {{number_format($program->Female)}}</span>
												<span class="male-color"><i class="fa fa-male" aria-hidden="true"></i><br> {{number_format($program->Male)}}</span></span>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
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
                                                <div id="district_level_schools"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div id="district_gender_schools" style="min-width: 100%; height: 320px; margin: 15 auto"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- row END -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div id="Schools_Area"></div>
                                            </div>
                                        </div>
                                    </div><!-- col END -->
                                </div>
                                <!-- row END -->
                                <!-- row START-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div id="School_Ownership"></div>
                                            </div>
                                        </div>
                                    </div><!-- col END -->
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div id="Program_Type"></div>
                                            </div>
                                        </div>
                                    </div><!-- col END -->
                                </div>
                                <!-- row END-->
                                <div class="row">
                                    <div class="col-xl-3 col-xxl-3 col-sm-3">
                                        <div class="widget-stat card">
                                            <div class="card-body">
                                                <div class="icon-image">
                                                    <img src="{{ asset('images/imis-images/icons/wall.png') }}" style="width: 50px;">
                                                </div>
                                                <h4 class="card-title">Boundary Walls</h4>
                                                <h3>
                                                    <span class="facility-number green-number">{{number_format($data['db_schools']->BoundryWall)}}</span>
                                                    <span class="facility-number red-number">{{number_format($data['db_schools']->TotalSchools-$data['db_schools']->BoundryWall)}}</span>
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
                                                    <span class="facility-number green-number">{{number_format($data['db_schools']->Electricity)}}</span>
                                                    <span class="facility-number red-number">{{number_format($data['db_schools']->TotalSchools-$data['db_schools']->Electricity)}}</span>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-xxl-3 col-sm-3">
                                        <div class="widget-stat card">
                                            <div class="card-body">
                                                <div class="icon-image">
                                                    <img src="{{ asset('images/imis-images/icons/water-tap.png') }}" style="width: 50px;">
                                                </div>
                                                <h4 class="card-title">Water</h4>
                                                <h3>
                                                    <span class="facility-number green-number">{{number_format($data['db_schools']->Water)}}</span>
                                                    <span class="facility-number red-number">{{number_format($data['db_schools']->TotalSchools-$data['db_schools']->Water)}}</span>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-xxl-3 col-sm-3">
                                        <div class="widget-stat card">
                                            <div class="card-body">
                                                <div class="icon-image">
                                                    <img src="{{ asset('images/imis-images/icons/toilet.png') }}" style="width: 50px;">
                                                </div>
                                                <h4 class="card-title">Toilet</h4>
                                                <h3>
                                                    <span class="facility-number green-number">{{number_format($data['db_schools']->Toilets)}}</span>
                                                    <span class="facility-number red-number">{{number_format($data['db_schools']->TotalSchools-$data['db_schools']->Toilets)}}</span>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
