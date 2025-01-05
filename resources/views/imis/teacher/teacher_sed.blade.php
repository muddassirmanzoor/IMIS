@extends('layouts.master')

@section('title', 'Teachers')

@section('content')

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
                                    <p class="mb-1 tiles-bar-title">Teachers</p>
                                    <h3 class="tiles-bar-value">{{number_format(335192)}} <span class="gender-schools-types"> <span class="female-color"><i class="fa fa-female" aria-hidden="true"></i><br> {{number_format(188322)}}</span><span class="male-color"><i class="fa fa-male" aria-hidden="true"></i><br> {{number_format(146870)}}</span></span></h3>
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
                                    <p class="mb-1 tiles-bar-title">PST</p>
                                    <h3 class="tiles-bar-value">{{number_format(179413)}}<span class="gender-schools-types"> <span class="female-color"><i class="fa fa-female" aria-hidden="true"></i><br> {{number_format(108385)}}</span><span class="male-color"><i class="fa fa-male" aria-hidden="true"></i><br>  {{number_format(71028)}}</span></span></h3>
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
                                    <p class="mb-1 tiles-bar-title">ESTs</p>
                                    <h3 class="tiles-bar-value">{{number_format(104770)}}<span class="gender-schools-types"> <span class="female-color"><i class="fa fa-female" aria-hidden="true"></i><br> {{number_format(56209)}}</span><span class="male-color"><i class="fa fa-male" aria-hidden="true"></i><br> {{number_format(48561)}}</span></span></h3>
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
                                    <p class="mb-1 tiles-bar-title">SSTs</p>
                                    <h3 class="tiles-bar-value">{{number_format(44516)}}<span class="gender-schools-types"><span class="female-color"><i class="fa fa-female" aria-hidden="true"></i><br>{{number_format(20768)}}</span><span class="male-color"><i class="fa fa-male" aria-hidden="true"></i><br>  {{number_format(23748)}} </span> </span></h3>
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
                                    <p class="mb-1 tiles-bar-title">SS/SSS</p>
                                    <h3 class="tiles-bar-value">{{number_format(3467)}} <span class="gender-schools-types"> <span class="female-color"><i class="fa fa-female" aria-hidden="true"></i><br>  {{number_format(1545)}}</span><span class="male-color"><i class="fa fa-male" aria-hidden="true"></i><br>  {{number_format(1922)}}</span></span></h3>
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
                                    <p class="mb-1 tiles-bar-title">HRMs/Principals</p>
                                    <h3 class="tiles-bar-value">{{number_format(2981)}} <span class="gender-schools-types"> <span class="female-color"><i class="fa fa-female" aria-hidden="true"></i><br> {{number_format(1401)}}</span><span class="male-color"><i class="fa fa-male" aria-hidden="true"></i><br> {{number_format(1580)}}</span></span></h3>
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
                                    <p class="mb-1 tiles-bar-title">Imam/Qari</p>
                                    <h3 class="tiles-bar-value">{{number_format(33)}} <span class="gender-schools-types"> <span class="female-color"><i class="fa fa-female" aria-hidden="true"></i><br> {{number_format(9)}}</span><span class="male-color"><i class="fa fa-male" aria-hidden="true"></i><br> {{number_format(24)}}</span></span></h3>
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
                                                    <div id="teacher-by-level"></div>
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
                                                <div class="card-body">
                                                    <div id="TGQ_male"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card">
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

        @include('partials.teacher.highcharts')
    @endpush

@endsection
