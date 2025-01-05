@extends('layouts.master')

@section('title', 'L&NFBD Students')

@section('content')
<script>
    var students = @json($data['graph_data']);
    jQuery(function ($) {
        $('#students_by_level').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            colors: ['#2f649a', '#f5c002', '#51733e', '#5a9bdb', '#8ac75f', '#3a4980', '#a07413'],
            title: {
                text: 'Project Wise Student',
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
                data: students.projects
            }]
        });
        /******************students_by_level END******************* */
        // Custom template helper
        Highcharts.Templating.helpers.abs = value => Math.abs(value);

        // Age categories
        const categories = [
             'Class-1', 'Class-2', 'Class-3', 'Class-4', 'Class-5', 'Nursery', 'ALC'];
        //< !----------------districts chart  chart Start here-------------------->
        $('#students_by_gender').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Gender wise Number of Students',
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
                    'Students: {(abs point.y):f}'
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
        //< !----------------Target Districts all school INFO here-------------------->
        $('#target_districts_total_school').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: 0,
                plotShadow: false
            },
            title: {
                text: 'Target Districts Total School',
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
                    dataLabels: {
                        enabled: true,
                        style: {
                            fontWeight: 'bold',
                            color: 'white'
                        }
                    },
                    startAngle: -180,
                    endAngle: 180,
                    center: ['50%', '50%'],
                    size: '110%'
                }
            },
            series: [{
                type: 'pie',
                name: 'Schools',
                innerSize: '50%',
                data: [
                    {
                        name: 'Boys',
                        y: 63.06,
                        color:'#427ec5'
                    },
                    {
                        name: 'Girls',
                        y: 19.84,
                        color: '#f33a86'
                    },
                    {
                        name: 'Other',
                        y: 4.18,
                        color: '#fcc100'
                    }]
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
         $('#Area_Emrollment').highcharts({
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45
                }
            },

            title: {
                text: 'Area Wise Enrollment',
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
                data: [{
                    name: 'Rural Area',
                    y: students.rural_count,
                    color: '#fec656'
                },
                {
                    name: 'Urban Area',
                    y: students.urban_count,
                    color: '#60c3ab'
                },
                {
                    name: 'NULL',
                    y: students.null_count,
                    color: '#3a4980'
                }     ]
            }]
        });
        //< !----------------Specialization Wise Enrollment in Higher Secondary here-------------------->
        //< !----------------Enrollment by Gender and Area here-------------------->
        $('#Age_Emrollment').highcharts({
            chart: {
                type: 'column'
            },
            colors: ['#2f649a', '#f5c002', '#51733e', '#5a9bdb', '#8ac75f', '#3a4980', '#a07413'],
            title: {
                text: 'Age Wise Emrollment',
                align: 'left'
            },
            xAxis: {
                categories: ['5 year', '6 year', '7 year', '8 year', '9 year']
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Percent'
                }
            },
            tooltip: {
                pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
                shared: true
            },
            plotOptions: {
                column: {
                    stacking: 'percent',
                    dataLabels: {
                        enabled: true,
                        format: '{point.y}'
                    }
                }
            },
            series: [{
                name: 'Class 1',
                data: [434, 290, 307, 290, 307]
            }, {
                name: 'Class 2',
                data: [272, 153, 156, 290, 307]
            }, {
                name: 'Class 3',
                data: [13, 7, 8, 290, 307]
            }, {
                name: 'Class 4',
                data: [55, 35, 41, 290, 307]
            }, {
                name: 'Class 5',
                data: [55, 35, 41, 290, 307]
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
                                                <i class="fa fa-female" aria-hidden="true"></i><br> {{number_format($data['db_students']->Female)}}</span>
                                            <span class="male-color"><i class="fa fa-male" aria-hidden="true"></i><br>  {{number_format($data['db_students']->Male)}}</span></span></h3>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    @foreach($data['project_students'] as $student)
                <div class="col-xl-2 col-xxl-2 col-sm-2">
                    <div class="widget-stat card bg-left-line-yellow tiles-bar-tooltip-wrap">
                        <div class="card-body1">
                            <div class="media">
                                <div class="media-body text-white">
                                    <p class="mb-1 tiles-bar-title">{{($student['project'])}} </p>
                                    <h3 class="tiles-bar-value">{{number_format($student['StudentsCount'])}}<span class="gender-schools-types"> <span class="female-color">
                                                <i class="fa fa-female" aria-hidden="true"></i><br>{{number_format($student['FemaleCount'])}}</span>
												<span class="male-color"><i class="fa fa-male" aria-hidden="true"></i><br> {{number_format($student['MaleCount'])}}</span></span>
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
									<div class="col-xl-12 col-xxl-12 col-sm-12">
										<div class="row">
											<div class="col-sm-12">
												<div class="card">
													<div class="card-body">
														<div id="students_by_level"></div>
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
														<div id="students_by_gender"></div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- row END -->
								<div class="row">
									<div class="col-xl-12 col-xxl-12 col-sm-12">
										<div class="widget-stat card">
											<div class="widget-stat card">
												<div class="card-body">
													<div id="Area_Emrollment"></div>
												</div>
											</div>
										</div>
									</div><!-- col END -->
								</div>
								<!-- row END -->
{{--                                <div class="row">--}}
{{--									<div class="col-xl-12 col-xxl-12 col-sm-12">--}}
{{--										<div class="widget-stat card">--}}
{{--											<div class="widget-stat card">--}}
{{--												<div class="card-body">--}}
{{--													<div id="Age_Emrollment"></div>--}}
{{--												</div>--}}
{{--											</div>--}}
{{--										</div>--}}
{{--									</div><!-- col END -->--}}
{{--								</div>--}}
								<!-- row END -->
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
