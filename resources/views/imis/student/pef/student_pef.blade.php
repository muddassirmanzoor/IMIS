@extends('layouts.master')

@section('title', 'PEF Students')

@section('content')
    <script>
        jQuery(function ($) {
            $('#students_by_progrom').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                colors: ['#2f649a', '#f5c002', '#51733e', '#5a9bdb', '#8ac75f', '#3a4980', '#a07413'],
                title: {
                    text: 'Program Wise Students Enrollment',
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
                    name: 'Students',
                    colorByPoint: true,
                    showInLegend: true,
                    data: [{
                        name: 'NSP',
                        y: 7367794,
                        sliced: true,
                        selected: true
                    }, {
                        name: 'EVS',
                        y: 2818486
                    },  {
                        name: 'FAS',
                        y: 128489
                    }]
                }]
            });
            $('#students_by_level').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                // colors: ['#2f649a', '#f5c002', '#51733e', '#5a9bdb', '#8ac75f', '#3a4980', '#a07413'],
                title: {
                    text: 'Level Wise Students Enrollment',
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
                    name: 'Students',
                    colorByPoint: true,
                    showInLegend: true,
                    data: [{
                        name: 'Primary',
                        y: 7367794,
                        sliced: true,
                        selected: true
                    }, {
                        name: 'Elementary',
                        y: 2818486
                    },  {
                        name: 'Secondary',
                        y: 1556150
                    }, {
                        name: 'H.Secondary',
                        y: 128489
                    }, {
                        name: 'H.Secondary',
                        y: 128489
                    }]
                }]
            });
            /*************************** */
            $('#students_by_age').highcharts({
                chart: {
                    type: 'column'
                },
                colors: ['#2f649a', '#f5c002', '#51733e', '#5a9bdb', '#8ac75f', '#3a4980', '#a07413'],
                title: {
                    text: 'Age Wise Student Enrollment',
                    align: 'left',
					style: {
						display: 'none'
					}
                },
                xAxis: {
                    categories: ['5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20','other']
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Number of Students'
                    },
                    stackLabels: {
                        enabled: true
                    }
                },
                legend: {
                    align: 'center',
                },
                tooltip: {
                    headerFormat: '<b>{point.x}</b><br/>',
                    pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
                },
                plotOptions: {
                    column: {
                        stacking: 'normal',
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                series: [{
                    name: 'PREP',
                    data: [3, 5, 1, 13, 5, 1, 13, 5, 1, 13, 5, 1, 13, 5, 1, 13,15],
                    visible: true
                }, {
                    name: '1 class',
                    data: [3, 5, 1, 13, 5, 1, 13, 5, 1, 13, 5, 1, 13, 5, 1, 13,15],
                    visible: false
                }, {
                    name: '2 class',
                    data: [3, 5, 1, 13, 5, 1, 13, 5, 1, 13, 5, 1, 13, 5, 1, 13,15],
                    visible: false
                }, {
                    name: '3 class',
                    data: [3, 5, 1, 13, 5, 1, 13, 5, 1, 13, 5, 1, 13, 5, 1, 13,15],
                    visible: false
                }, {
                    name: '4 class',
                    data: [3, 5, 1, 13, 5, 1, 13, 5, 1, 13, 5, 1, 13, 5, 1, 13,15],
                    visible: false
                }, {
                    name: '5 class',
                    data: [3, 5, 1, 13, 5, 1, 13, 5, 1, 13, 5, 1, 13, 5, 1, 13,15],
                    visible: false
                }, {
                    name: '6 class',
                    data: [3, 5, 1, 13, 5, 1, 13, 5, 1, 13, 5, 1, 13, 5, 1, 13,15],
                    visible: false
                }, {
                    name: '7 class',
                    data: [3, 5, 1, 13, 5, 1, 13, 5, 1, 13, 5, 1, 13, 5, 1, 13,15],
                    visible: false
                }, {
                    name: '8 class',
                    data: [3, 5, 1, 13, 5, 1, 13, 5, 1, 13, 5, 1, 13, 5, 1, 13,15],
                    visible: false
                }, {
                    name: '9 class',
                    data: [3, 5, 1, 13, 5, 1, 13, 5, 1, 13, 5, 1, 13, 5, 1, 13,15],
                    visible: false
                }, {
                    name: '10 class',
                    data: [3, 5, 1, 13, 5, 1, 13, 5, 1, 13, 5, 1, 13, 5, 1, 13,15],
                    visible: false
                }, {
                    name: '11 class',
                    data: [3, 5, 1, 13, 5, 1, 13, 5, 1, 13, 5, 1, 13, 5, 1, 13,15],
                    visible: false
                }, {
                    name: '12 class',
                    data: [3, 5, 1, 13, 5, 1, 13, 5, 1, 13, 5, 1, 13, 5, 1, 13,15],
                    visible: false
                }]
            });
            // Custom template helper
            Highcharts.Templating.helpers.abs = value => Math.abs(value);

            // Age categories
            const categories = [
                'ECE', 'Kachi', 'Class-1', 'Class-2', 'Class-3', 'Class-4', 'Class-5', 'Class-6',
                'Class-7', 'Class-8', 'Class-9', 'Class-10', 'Class-11', 'Class-12'];
            //< !----------------districts chart  chart Start here-------------------->
            $('#students_by_gender').highcharts({
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Gender wise Number of Students',
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
                    color: '#3F51B5',
                    data: [-95411, -657334, -517644, -587781, -577922, -628770, -591046, -510501, -472399, -453320, -406265,-360954, -34133, -38504]
                }, {
                    name: 'Female',
                    color: '#E91E63',
                    data: [95189, 683868, 548049, 613246, 582824,624737, 569973, 480839, 461014, 440413, 410984, 377947, 26631, 29221]
                }]
            });
            /******************************************* */
            $('#AWMS_male').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Area Wise Male Students',
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
                    data: [
                        {
                            name: 'Slum',
                            y: 89717,
                            color: 'rgb(63 81 181 / 80%)'
                        },
                        {
                            name: 'Rural',
                            y: 37014,
                            color: 'rgb(63 81 181 / 60%)'
                        },
                        {
                            name: 'Urban',
                            y: 17220,
                            color: 'rgb(63 81 181 / 35%)'
                        }]
                }]
            });
            $('#AWMS_female').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Area Wise Female Students',
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
                    data: [
                        {
                            name: 'Slum',
                            y: 89717,
                            color: 'rgb(233 30 99 / 80%)'
                        },
                        {
                            name: 'Rural',
                            y: 37014,
                            color: 'rgb(233 30 99 / 60%)'
                        },
                        {
                            name: 'Urban',
                            y: 17220,
                            color: 'rgb(233 30 99 / 35%)'
                        }]
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
                @include('partials.page_heading', ['type' => 'students', 'name' => 'Students'])
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
                                        <h3 class="tiles-bar-value">11870919 <span class="gender-schools-types"><span class="male-color"><i class="fa fa-male" aria-hidden="true"></i> 5944935</span> <span class="female-color"><i class="fa fa-female" aria-hidden="true"></i> 5925984</span></span></h3>

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
                                        <p class="mb-1 tiles-bar-title">NSP </p>
                                        <h3 class="tiles-bar-value">32,285<span class="gender-schools-types"> <span class="female-color"><i class="fa fa-female" aria-hidden="true"></i><br> 16,969</span>
												<span class="male-color"><i class="fa fa-male" aria-hidden="true"></i><br> 15,316</span></span>
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
                                        <p class="mb-1 tiles-bar-title">EVS </p>
                                        <h3 class="tiles-bar-value">7,175<span class="gender-schools-types"> <span class="female-color"><i class="fa fa-female" aria-hidden="true"></i><br> 4,230</span><span class="male-color"><i class="fa fa-male" aria-hidden="true"></i><br> 2,945</span></span>
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
                                        <p class="mb-1 tiles-bar-title">FAS</p>
                                        <h3 class="tiles-bar-value">8,047 <span class="gender-schools-types"> <span class="female-color"><i class="fa fa-female" aria-hidden="true"></i><br> 3,909</span><span class="male-color"><i class="fa fa-male" aria-hidden="true"></i><br> 4,138</span></span>
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
							<div class="col-xl-12 col-xxl-12 col-sm-12">
								<div class="row">
									<div class="col-sm-12">
										<div class="card">
											<div class="card-header">
												<h3 class="card-header-heading">Program Wise Students Enrollment</h3>
											</div>
											<div class="card-body">
												<div id="students_by_progrom"></div>
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
												<h3 class="card-header-heading">Level Wise Students Enrollment</h3>
											</div>
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
											<div class="card-header">
												<h3 class="card-header-heading">Age Wise Student Enrollment</h3>
											</div>
											<div class="card-body">
												<div id="students_by_age"></div>
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
												<h3 class="card-header-heading">Gender Wise Number of Students</h3>
											</div>
											<div class="card-body">
												<div id="students_by_gender"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-6 col-xxl-6 col-sm-6">
								<div class="row">
									<div class="col-sm-12">
										<div class="card">
											<div class="card-header">
												<h3 class="card-header-heading">Area Wise Female Students</h3>
											</div>
											<div class="card-body">
												<div id="AWMS_female"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-6 col-xxl-6 col-sm-6">
								<div class="row">
									<div class="col-sm-12">
										<div class="card">
											<div class="card-header">
												<h3 class="card-header-heading">Area Wise Male Students</h3>
											</div>
											<div class="card-body">
												<div id="AWMS_male"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- row END -->
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
