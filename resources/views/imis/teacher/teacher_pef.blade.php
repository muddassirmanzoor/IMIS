@extends('layouts.master')

@section('title', 'Teachers')

@section('content')
    <script>
        var teachers = @json($data['graph_data']);
        jQuery(function ($) {
            $('#teacher-by-role').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Role Wise Teachers',
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
                    name: 'Role',
                    colorByPoint: true,
                    showInLegend: true,
                    data: teachers.teachers_roles
                }]
            });
            //< !----------------Teachers by gender  here-------------------->
            $('#gender-teachers').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Gender Wise Teachers',
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
                    name: 'Teachers',
                    colorByPoint: true,
                    showInLegend: true,
                    data: teachers.teachers_by_gender
                }]
            });

            $('#gender_teachers_qualification_male').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Male Teachers by Qualification',
                    align: 'left'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
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
                    colorByPoint: true,
                    showInLegend: true,
                    type: 'pie',
                    name: 'Qualification',
                    innerSize: '50%',
                    data: teachers.teachers_male_qualification
                }]
            });
            $('#gender_teachers_qualification_female').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Female Teachers by Qualification',
                    align: 'left'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
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
                    colorByPoint: true,
                    showInLegend: true,
                    type: 'pie',
                    name: 'Qualification',
                    innerSize: '50%',
                    data: teachers.teachers_female_qualification
                }]
            });
            /******************students_by_level END******************* */
            // Custom template helper
            Highcharts.Templating.helpers.abs = value => Math.abs(value);

            // Age categories
            const categories = teachers.qualifications;
            //< !----------------districts chart  chart Start here-------------------->
            $('#TPQ').highcharts({
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Teacher By Professional Qualification',
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
                    format: '<b>{series.name}, {point.category}</b><br/>' +
                        'Teachers: {(abs point.y):f} '
                },

                series: [{
                    name: 'Male',
                    color: '#3F51B5',
                    data: teachers.male_class_students
                }, {
                    name: 'Female',
                    color: '#E91E63',
                    data: teachers.female_class_students
                }]
            });
            //< !----------------districts chart  chart Start here-------------------->

        });
    </script>
    <!-- row -->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            @include('partials.page_heading', ['type' => 'teachers'])
            <!--------Filter  bar START--------->

            @include('partials.drop_down')
            <!-- row -->
            <div class="row justify-content-center">
                <div class="col-xl-2 col-xxl-2 col-sm-2">
                    <div class="widget-stat card bg-left-line-green tiles-bar-tooltip-wrap">
                        <div class="card-body1">
                            <div class="media">
                                <div class="media-body text-white">
                                    <p class="mb-1 tiles-bar-title">Total Teachers</p>
                                    <h3 class="tiles-bar-value">{{number_format($data['db_teachers']->TotalTeachers)}} <span class="gender-schools-types"><span class="female-color">
                                                <i class="fa fa-female" aria-hidden="true"></i> {{number_format($data['db_teachers']->Female)}} </span> <span class="male-color">
                                                <i class="fa fa-male" aria-hidden="true"></i> {{number_format($data['db_teachers']->Male)}} </span></span></h3>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row END -->
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
                                                    <div id="teacher-by-role"></div>
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
                                                    <div id="gender-teachers"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-xxl-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div id="gender_teachers_qualification_male"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div id="gender_teachers_qualification_female"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div id="TPQ"></div>
                                                </div>
                                            </div>
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

        </div>

    </div>
    <!-- row END -->
    <!-- Include School Js Files -->
    @push('scripts')
        @include('partials.custom_scripts')
    @endpush

@endsection
