@extends('layouts.master')

@section('title', 'L&NFBD Students')

@section('content')
    <script>
        var students = @json($data['graph_data']);

        jQuery(function ($) {
            $('#students_by_disablity').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                colors: ['#2f649a', '#f5c002', '#51733e', '#5a9bdb', '#8ac75f', '#3a4980', '#a07413'],
                title: {
                    text: 'Disablity Wise Enrollment',
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
                    name: 'Students',
                    colorByPoint: true,
                    showInLegend: true,
                    data: students.students_by_disability
                }]
            });
            /******************students_by_level END******************* */
            Highcharts.Templating.helpers.abs = value => Math.abs(value);

            // Age categories
            const categories = students.classes;
            //< !----------------districts chart  chart Start here-------------------->
            $('#students_by_gender').highcharts({
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Gender wise Class Wise Students',
                    align: 'left'
                },
                accessibility: {
                    point: {
                        valueDescriptionFormat: '{index}. Age {xDescription}, {value} Number.'
                    }
                },
                xAxis: [{
                    categories: categories,
                    reversed: false,
                    labels: {
                        step: 1
                    },
                    accessibility: {
                        description: 'Class (male)'
                    }
                }, { // mirror axis on right side
                    opposite: true,
                    reversed: false,
                    categories: categories,
                    linkedTo: 0,
                    labels: {
                        step: 1
                    },
                    accessibility: {
                        description: 'Class (female)'
                    }
                }],
                yAxis: {
                    title: {
                        text: null
                    },
                    labels: {
                        format: '{abs value}'
                    },
                    accessibility: {
                        description: 'Percentage Students',
                        rangeDescription: 'Range: 0 to 5%'
                    }
                },

                plotOptions: {
                    series: {
                        stacking: 'normal',
                        borderRadius: '50%'
                    }
                },

                tooltip: {
                    format: '<b>{series.name}, Class {point.category}</b><br/>' +
                        'Students: {(abs point.y):.1f} Number'
                },

                series: [{
                    name: 'Male',
                    color: '#3F51B5',
                    data: students.male_class_students
                }, {
                    name: 'Female',
                    color: '#f33a86',
                    data: students.female_class_students
                }]
            });
            //< !----------------Target Districts all Schools INFO here-------------------->
            //< !----------------Target Districts all Enrollement INFO here-------------------->
            $('#Gender_Count').highcharts({
                chart: {
                    type: 'pie',
                    options3d: {
                        enabled: true,
                        alpha: 45
                    }
                },
                colors:['#3F51B5','#E91E63', '#f5c002'],
                title: {
                    text: 'Gender Wise Enrollment',
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
                    data: students.students_by_gender
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
                @include('partials.page_heading', ['type' => 'students'])
                  <!--------Filter  bar START--------->

                @include('partials.drop_down')
                <!-- row -->
                <div class="row justify-content-center">
                    <div class="col-xl-2 col-xxl-2 col-sm-2">
                        <div class="widget-stat card bg-left-line-green tiles-bar-tooltip-wrap">
                            <div class="card-body1">
                                <div class="media">
                                    <div class="media-body text-white">
                                        <p class="mb-1 tiles-bar-title">Total Students</p>
                                        <h3 class="tiles-bar-value">{{number_format($data['db_students']->TotalStudents)}} <span class="gender-schools-types"><span class="female-color">
                                                    <i class="fa fa-female" aria-hidden="true"></i> {{number_format($data['db_students']->Female)}}</span>
                                                <span class="male-color"><i class="fa fa-male" aria-hidden="true"></i> {{number_format($data['db_students']->Male)}}</span></span></h3>

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
                                        <p class="mb-1 tiles-bar-title">VISUALLY IMPAIRED </p>
                                        <h3 class="tiles-bar-value">{{number_format($data['db_students']->VisuallyImpaired)}}<span class="gender-schools-types"> <span class="female-color">
                                                    <i class="fa fa-female" aria-hidden="true"></i><br> {{number_format($data['db_students']->FemaleVisuallyImpaired)}}</span>
												<span class="male-color"><i class="fa fa-male" aria-hidden="true"></i><br> {{number_format($data['db_students']->MaleVisuallyImpaired)}}</span></span>
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
                                        <p class="mb-1 tiles-bar-title">HEARING IMPAIRED</p>
                                        <h3 class="tiles-bar-value">{{number_format($data['db_students']->HearingImpaired)}}<span class="gender-schools-types"> <span class="female-color">
                                                    <i class="fa fa-female" aria-hidden="true"></i><br> {{number_format($data['db_students']->FemaleHearingImpaired)}}</span><span class="male-color">
                                                    <i class="fa fa-male" aria-hidden="true"></i><br> {{number_format($data['db_students']->MaleHearingImpaired)}}</span></span>
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
                                        <p class="mb-1 tiles-bar-title">SLOW LEARNERS</p>
                                        <h3 class="tiles-bar-value">{{number_format($data['db_students']->SlowLearners)}}  <span class="gender-schools-types"> <span class="female-color">
                                                    <i class="fa fa-female" aria-hidden="true"></i><br> {{number_format($data['db_students']->FemaleSlowLearners)}}</span><span class="male-color">
                                                    <i class="fa fa-male" aria-hidden="true"></i><br>{{number_format($data['db_students']->MaleSlowLearners)}} </span></span>
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
                                        <p class="mb-1 tiles-bar-title">MENTALLY CHALLENGED</p>
                                        <h3 class="tiles-bar-value">{{number_format($data['db_students']->MentallyChallenged)}}   <span class="gender-schools-types">
                                                <span class="female-color"><i class="fa fa-female" aria-hidden="true"></i><br> {{number_format($data['db_students']->FemaleMentallyChallenged)}}  </span><span class="male-color">
                                                    <i class="fa fa-male" aria-hidden="true"></i><br>{{number_format($data['db_students']->MaleMentallyChallenged)}}  </span></span>
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
                                        <p class="mb-1 tiles-bar-title">PHYSICALLY DISABLED</p>
                                        <h3 class="tiles-bar-value">{{number_format($data['db_students']->PhysicallyHandicapped)}}   <span class="gender-schools-types"> <span class="female-color">
                                                    <i class="fa fa-female" aria-hidden="true"></i><br> {{number_format($data['db_students']->FemalePhysicallyHandicapped)}}  </span><span class="male-color">
                                                    <i class="fa fa-male" aria-hidden="true"></i><br>{{number_format($data['db_students']->MalePhysicallyHandicapped)}}  </span></span>
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
                                    <div class="col-xl-12 col-xxl-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div id="students_by_disablity"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-xxl-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div id="Gender_Count"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-xxl-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div style="height: 800px" id="students_by_gender"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--------------------------------------------------------->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row END -->

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
