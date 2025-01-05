@extends('layouts.master')

@section('title', 'Teachers')

@section('content')
    <script>
        var teachers = @json($data['graph_data']);
        jQuery(function ($) {
            $('#teacher-by-project').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Teachers by Project',
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
                    name: 'Teachers',
                    colorByPoint: true,
                    showInLegend: true,
                    data: teachers.projects
                }]
            });
            //< !----------------Teachers by gender  here-------------------->
            $('#TG').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Gender Wise Teachers',
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
                    name: 'Teachers',
                    colorByPoint: true,
                    showInLegend: true,
                    data: teachers.teachers_by_gender
                }]
            });

            $('#TGQ_male').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Male Teachers by Qualification',
                    align: 'left',
					style: {
						display: 'none'
					}
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
                    data: teachers.male_teachers_qualification
                }]
            });
            $('#TGQ_female').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Female Teachers by Qualification',
                    align: 'left',
					style: {
						display: 'none'
					}
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
                    data: teachers.female_teachers_qualification
                }]
            });
            /******************students_by_level END******************* */
            // Custom template helper
            Highcharts.Templating.helpers.abs = value => Math.abs(value);

            // Age categories
            const categories = [
                'M.Ed/MS.Ed', 'B.Ed/BS.Ed', 'CT', 'PTC/JV', 'None', 'Others'];
            //< !----------------districts chart  chart Start here-------------------->
            $('#TPQ').highcharts({
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Teacher by professional Qualification',
                    align: 'left',
					style: {
						display: 'none'
					}
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
                    color: 'rgba(66, 126, 197)',
                    data: [-47439, -81242, -6903, -13658, -5525, -3804]
                }, {
                    name: 'Female',
                    color: 'rgb(243, 58, 134)',
                    data: [73721, 95169, 4351, 18847, 3530,2899]
                }]
            });
            //< !----------------districts chart  chart Start here-------------------->

        });
    </script>
    <!-- row -->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            @include('partials.page_heading', ['type' => 'teachers', 'name' => 'Teachers'])
            <!--------Filter  bar START--------->

            @include('partials.drop_down')
            <!-- row -->
            <form id="teachersForm" method="POST" action="{{ '/teachers-listing' }}">
                @csrf
                <input type="hidden" name="school_type" value="{{$dropdownData['request']['school_type'] }}">
                <input type="hidden" name="district" value="{{$dropdownData['request']['district']  }}">
                <input type="hidden" name="tehsil" value="{{$dropdownData['request']['tehsil']  }}">
                <input type="hidden" name="markaz" value="{{$dropdownData['request']['markaz']  }}">
                <input type="hidden" id='teacherLevel' name="level" value="">
            </form>
            <!-- row --><div class="row justify-content-center">
                <div class="col-xl-2 col-xxl-2 col-sm-2" onclick="submitTeachersForm()">
                    <div class="widget-stat card bg-left-line-green tiles-bar-tooltip-wrap">
                        <div class="card-body1">
                            <div class="media">
                                <div class="media-body text-white">
                                    <p class="mb-1 tiles-bar-title">Total Teachers</p>
                                    <h3 class="tiles-bar-value">{{number_format($data['db_teachers']->TotalTeachers)}} <span class="gender-schools-types"><span class="female-color">
                                                <i class="fa fa-female" aria-hidden="true"></i> {{number_format($data['db_teachers']->Female)}}</span> <span class="male-color">
                                                <i class="fa fa-male" aria-hidden="true"></i> {{number_format($data['db_teachers']->Male)}}</span></span></h3>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($data['project_teachers'] as $teacher)

                <div class="col-xl-2 col-xxl-2 col-sm-2" onclick="submitTeachersForm('{{($teacher['project'])}}')">
                    <div class="widget-stat card bg-left-line-yellow tiles-bar-tooltip-wrap">
                        <div class="card-body1">
                            <div class="media">
                                <div class="media-body text-white">
                                    <p class="mb-1 tiles-bar-title">{{($teacher['project'])}} </p>
                                    <h3 class="tiles-bar-value">{{number_format($teacher['TeachersCount'])}} <span class="gender-schools-types"> <span class="female-color"><i class="fa fa-female" aria-hidden="true"></i><br> {{number_format($teacher['FemaleCount'])}}</span>
												<span class="male-color"><i class="fa fa-male" aria-hidden="true"></i><br> {{number_format($teacher['MaleCount'])}}</span></span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- row END -->

            <!-- row START-->
            <div class="row">
                <div class="col-lg-12">
					<!-- row START-->
					<div class="row">
						<div class="col-xl-12 col-xxl-12 col-sm-12">
							<div class="row">
								<div class="col-sm-12">
									<div class="card">
										<div class="card-header">
											<h3 class="card-header-heading">Teachers By Project</h3>
										</div>
										<div class="card-body">
											<div id="teacher-by-project"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-12 col-xxl-12 col-sm-12">
							<div class="row">
								<div class="col-sm-12">
									<div class="card">
										<div class="card-header">
											<h3 class="card-header-heading">Gender Wise Teachers</h3>
										</div>
										<div class="card-body">
											<div id="TG"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-12 col-xxl-12 col-sm-12">
							<div class="row">
								<div class="col-sm-6">
									<div class="card">
										<div class="card-header">
											<h3 class="card-header-heading">Male Teachers by Qualification</h3>
										</div>
										<div class="card-body">
											<div id="TGQ_male"></div>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="card">
										<div class="card-header">
											<h3 class="card-header-heading">Female Teachers by Qualification</h3>
										</div>
										<div class="card-body">
											<div id="TGQ_female"></div>
										</div>
									</div>
								</div>
{{--                                        <div class="col-sm-12">--}}
{{--                                            <div class="card">--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <div id="TPQ"></div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
							</div>
						</div>
					</div>
					<!-- row END -->
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
