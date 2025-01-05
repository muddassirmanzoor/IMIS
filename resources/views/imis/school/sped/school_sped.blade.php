@extends('layouts.master')

@section('title', 'SPED Schools')

@section('content')
    <script>
        var schools = @json($data['graph_data']);
        jQuery(function ($) {
            $('#type_wise_institutes').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                colors: ['#2f649a', '#f5c002', '#51733e', '#5a9bdb', '#8ac75f', '#3a4980', '#a07413'],
                title: {
                    text: 'Type Wise Institutes',
                    align: 'left',
					style: {
					display: 'none'
				}
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
                    data: schools.schools
                }]
            });
            $('#gender_schools').highcharts({
                chart: {
                    type: 'pie',
                    options3d: {
                        enabled: true,
                        alpha: 45
                    }
                },
                title: {
                    text: 'Gender wis Schools',
                    align: 'left',
					style: {
					display: 'none'
				}
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
                    data: [
                        {
                            name: 'Boys',
                            y: 17919,
                            color: '#3F51B5'
                        },
                        {
                            name: 'Girls',
                            y: 2018,
                            color: '#E91E63'
                        }]
                }]
            });
            $('#divisions-wise-schools').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Divisions Wise Schools',
					align: 'left',
					style: {
					display: 'none'
				}
                },
                xAxis: {
                    type: 'category',
                    labels: {
                        autoRotation: [-45, -90],
                        style: {
                            fontSize: '13px',
                            //fontFamily: 'Verdana, sans-serif'
                        }
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Number of schools'
                    }
                },
                legend: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: 'Total Schools :<b>{point.y:.1f}</b>'
                },
                series: [{
                    name: 'Population',
                    //colors: ['#2f649a', '#f5c002', '#51733e', '#5a9bdb', '#8ac75f', '#3a4980', '#a07413'],
                    colorByPoint: true,
                    groupPadding: 0,
                    data: schools.division_institute,
                    dataLabels: {
                        enabled: true,
                        rotation: -90,
                        color: '#FFFFFF',
                        align: 'right',
                        format: '{point.y:.1f}', // one decimal
                        y: 10, // 10 pixels down from the top
                        style: {
                            fontSize: '13px',
                            //fontFamily: 'Verdana, sans-serif'
                        }
                    }
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
                @include('partials.page_heading', ['type' => 'schools', 'name' => 'Schools'])

                <!--------Filter  bar START--------->
                @include('partials.drop_down')
                <form id="schoolsForm" method="POST" action="{{ '/schools-listing' }}">
                    @csrf
                    <input type="hidden" name="school_type" value="{{$dropdownData['request']['school_type'] }}">
                    <input type="hidden" name="district" value="{{$dropdownData['request']['district']  }}">
                    <input type="hidden" name="tehsil" value="{{$dropdownData['request']['tehsil']  }}">
                    <input type="hidden" name="markaz" value="{{$dropdownData['request']['markaz']  }}">
                    <input type="hidden" id='schoolLevel' name="level" value="">
                </form>
                <!-- row -->
                <div class="row justify-content-center">
                    <div class="col-xl-2 col-xxl-2 col-sm-2" onclick="submitSchoolsForm()">
                        <div class="widget-stat card bg-left-line-green tiles-bar-tooltip-wrap">
                            <div class="card-body1">
                                <div class="media">
                                    <div class="media-body text-white">
                                        <p class="mb-1 tiles-bar-title">Total Institutes</p>
                                        <h3 class="tiles-bar-value">{{number_format($data['db_schools']->TotalSchools)}}
                                            <!-- <span class="gender-schools-types">
                                         <span class="female-color"><i class="fa fa-female" aria-hidden="true"></i><br> 25,540 </span>
                                        <span class="male-color"><i class="fa fa-male" aria-hidden="true"></i><br> 22,932 </span></span> -->
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-xxl-2 col-sm-2" onclick="submitSchoolsForm('Visually Impaired Children')">
                        <div class="widget-stat card bg-left-line-yellow tiles-bar-tooltip-wrap">
                            <div class="card-body1">
                                <div class="media">
                                    <div class="media-body text-white">
                                        <p class="mb-1 tiles-bar-title">Visually Impaired</p>
                                        <h3 class="tiles-bar-value">{{number_format($data['db_schools']->VisuallyImpairedChildren)}}
                                            <!-- <span class="gender-schools-types"> <span class="female-color"><i class="fa fa-female" aria-hidden="true"></i><br> 16,926</span>
                                                    <span class="male-color"><i class="fa fa-male" aria-hidden="true"></i><br> 15,369</span></span> -->
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-xxl-2 col-sm-2" onclick="submitSchoolsForm('Hearing Impaired Children')">
                        <div class="widget-stat card bg-left-line-purple tiles-bar-tooltip-wrap">
                            <div class="card-body1">
                                <div class="media">
                                    <div class="media-body text-white">
                                        <p class="mb-1 tiles-bar-title">Hearing Impaired</p>
                                        <h3 class="tiles-bar-value">{{number_format($data['db_schools']->HearingImpairedChildren)}}
                                            <!-- <span class="gender-schools-types"> <span class="female-color"><i class="fa fa-female" aria-hidden="true"></i><br> 4,265</span><span class="male-color"><i class="fa fa-male" aria-hidden="true"></i><br> 2,960</span></span> -->
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-xxl-2 col-sm-2" onclick="submitSchoolsForm('Slow Learner')">
                        <div class="widget-stat card bg-left-line-lgreen tiles-bar-tooltip-wrap">
                            <div class="card-body1">
                                <div class="media">
                                    <div class="media-body text-white">
                                        <p class="mb-1 tiles-bar-title">Slow Learners</p>
                                        <h3 class="tiles-bar-value">{{number_format($data['db_schools']->SlowLearner)}}
                                            <!-- <span class="gender-schools-types"> <span class="female-color"><i class="fa fa-female" aria-hidden="true"></i><br> 3,931</span><span class="male-color"><i class="fa fa-male" aria-hidden="true"></i><br> 4,147</span></span> -->
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-xxl-2 col-sm-2" onclick="submitSchoolsForm('Mentally Challenged Children')">
                        <div class="widget-stat card bg-left-line-red  tiles-bar-tooltip-wrap">
                            <div class="card-body1">
                                <div class="media">
                                    <div class="media-body text-white">
                                        <p class="mb-1 tiles-bar-title">Mentally Challenged</p>
                                        <h3 class="tiles-bar-value">{{number_format($data['db_schools']->MentallyChallengedChildren)}}
                                            <!-- <span class="gender-schools-types"> <span class="female-color"><i class="fa fa-female" aria-hidden="true"></i><br> 418 </span><span class="male-color"><i class="fa fa-male" aria-hidden="true"></i><br>394 </span></span> -->
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-xxl-2 col-sm-2" onclick="submitSchoolsForm('Physically Handicapped Children')">
                        <div class="widget-stat card bg-left-line-red  tiles-bar-tooltip-wrap">
                            <div class="card-body1">
                                <div class="media">
                                    <div class="media-body text-white">
                                        <p class="mb-1 tiles-bar-title">Physically Disabled</p>
                                        <h3 class="tiles-bar-value">{{number_format($data['db_schools']->PhysicallyHandicappedChildren)}}
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
                                <!-- row START-->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
											<div class="card-header">
												<h3 class="card-header-heading">Type Wise Institutes</h3>
											</div>
                                            <div class="card-body">
                                                <div id="type_wise_institutes"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
{{--                                <div class="row">--}}
{{--                                    <div class="col-sm-12">--}}
{{--                                        <div class="card">--}}
{{--                                            <div class="card-body">--}}
{{--                                                <div id="gender_schools"></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
											<div class="card-header">
												<h3 class="card-header-heading">Divisions Wise Schools</h3>
											</div>
                                            <div class="card-body">
                                                <div id="divisions-wise-schools"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- row END -->
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
