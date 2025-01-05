@extends('layouts.master')

@section('title', 'Teachers')

@section('content')
    <script>
        var teachers = @json($data['graph_data']);
        jQuery(function ($) {
            $('#TG').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                colors: ['#427ec5','#f33a86'],
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
            $('#DIS').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Disability Wise Teachers',
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
                    data: teachers.disabilities
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
                            name: 'BA',
                            y: 5266,
                            color: 'rgb(66, 126, 197, 0.84)'
                        },
                        {
                            name: 'MBA',
                            y: 8,
                            color: 'rgba(66, 126, 197, 0.74)'
                        },
                        {
                            name: 'BSC',
                            y: 16,
                            color: 'rgba(66, 126, 197, 0.64)'
                        },
                        {
                            name: 'Null',
                            y: 3623,
                            color: 'rgba(66, 126, 197, 0.54)'
                        },
                        {
                            name: 'BBA',
                            y: 3,
                            color: 'rgba(66, 126, 197, 0.44)'
                        },
                        {
                            name: 'B.SE',
                            y: 119,
                            color: 'rgba(66, 126, 197, 0.34)'
                        },
                        {
                            name: 'BSCS',
                            y: 119,
                            color: 'rgba(66, 126, 197, 0.34)'
                        },
                        {
                            name: 'Matric',
                            y: 1462,
                            color: 'rgba(66, 126, 197, 0.34)'
                        },
                        {
                            name: 'Master',
                            y: 2385,
                            color: 'rgba(66, 126, 197, 0.34)'
                        },
                        {
                            name: 'FA',
                            y: 7298,
                            color: 'rgba(66, 126, 197, 0.34)'
                        }]
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
                            name: 'M.A/M.Sc',
                            y: 125071,
                            color: 'rgb(243, 58, 134, 0.84)'
                        },
                        {
                            name: 'B.A/B.Sc',
                            y: 38153,
                            color: 'rgba(243, 58, 134, 0.74)'
                        },
                        {
                            name: 'M.Phil',
                            y: 17772,
                            color: 'rgba(243, 58, 134, 0.64)'
                        },
                        {
                            name: 'Matric',
                            y: 10884,
                            color: 'rgba(243, 58, 134, 0.54)'
                        },
                        {
                            name: 'F.A/F.Sc',
                            y: 6414,
                            color: 'rgba(243, 58, 134, 0.44)'
                        },
                        {
                            name: 'Ph.D',
                            y: 123,
                            color: 'rgba(243, 58, 134, 0.34)'
                        }]
                }]
            });
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
            <!-- row -->
            <div class="row justify-content-center">
                <div class="col-xl-2 col-xxl-2 col-sm-2">
                    <div class="widget-stat card bg-left-line-green tiles-bar-tooltip-wrap">
                        <div class="card-body1">
                            <div class="media">
                                <div class="media-body text-white">
                                    <p class="mb-1 tiles-bar-title">Total Teachers</p>
                                    <h3 class="tiles-bar-value">{{number_format($data['db_teachers']->TotalTeachers)}}  <span class="gender-schools-types"><span class="female-color">
                                                <i class="fa fa-female" aria-hidden="true"></i> {{number_format($data['db_teachers']->Female)}}</span> <span class="male-color">
                                                <i class="fa fa-male" aria-hidden="true"></i> {{number_format($data['db_teachers']->Male)}}</span></span></h3>

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
                                                    <div id="TG"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div id="DIS"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-xxl-12 col-sm-12">
                                    <div class="row">
{{--                                        <div class="col-sm-6">--}}
{{--                                            <div class="card">--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <div id="TGQ_male"></div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-sm-6">--}}
{{--                                            <div class="card">--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <div id="TGQ_female"></div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <table class="table table-striped table-bordered table-hover table-highlight table-checkable sanctioned-post-quota-table str_table">
                                                        <tbody>
                                                        <tr>
                                                            <td style="color: #ffffff; background: repeating-linear-gradient(180deg, #1d3768, transparent 195px); font-weight: bold;">#</td>
                                                            <td style="color: #ffffff; background: #7195cf; font-weight: bold;">Name of Designation</td>
                                                            <td style="color: #ffffff;background: #8faf6a;font-weight: bold;">Total Number</td>
                                                        </tr>

                                                        @foreach($data['designations'] as $key =>$designation)
                                                        <tr>
                                                            <th>{{$key+1}}</th>
                                                            <th>{{$designation['designation']}}</th>
                                                            <th>{{$designation['TeachersCount']}}</th>
                                                        </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- row END -->
                            <!--------------------------------------------------------->
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
