@extends('layouts.master')

@section('title', 'Students')

@section('content')

    <!-- row -->
    <div class="content-body">
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
                                <p class="mb-1 tiles-bar-title">Students</p>
                                <h3 class="tiles-bar-value">{{number_format(12079279)}} <span class="gender-schools-types"> <span
                                            class="female-color"><i class="fa fa-female" aria-hidden="true"></i><br> {{number_format(6121028)}}</span><span
                                            class="male-color"><i class="fa fa-male"
                                                                  aria-hidden="true"></i><br> {{number_format(5958251)}}</span></span>
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
                                <p class="mb-1 tiles-bar-title">Primary</p>
                                <h3 class="tiles-bar-value">{{number_format(4245385)}}<span class="gender-schools-types"> <span
                                            class="female-color"><i class="fa fa-female" aria-hidden="true"></i><br> {{number_format(2047027)}}</span><span
                                            class="male-color"><i class="fa fa-male"
                                                                  aria-hidden="true"></i><br> {{number_format(2198358)}}</span></span>
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
                                <p class="mb-1 tiles-bar-title">Middle</p>
                                <h3 class="tiles-bar-value">{{number_format(2062969)}}<span class="gender-schools-types"> <span
                                            class="female-color"><i class="fa fa-female" aria-hidden="true"></i><br> {{number_format(1110557)}}</span><span
                                            class="male-color"><i class="fa fa-male"
                                                                  aria-hidden="true"></i><br> {{number_format(952412)}}</span></span>
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
                                <p class="mb-1 tiles-bar-title">High</p>
                                <h3 class="tiles-bar-value">{{number_format(4859410)}} <span class="gender-schools-types"> <span
                                            class="female-color"><i class="fa fa-female" aria-hidden="true"></i><br> {{number_format(2446955)}}</span><span
                                            class="male-color"><i class="fa fa-male"
                                                                  aria-hidden="true"></i><br> {{number_format(2412455)}}</span></span>
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
                                <p class="mb-1 tiles-bar-title">Higher Secondary</p>
                                <h3 class="tiles-bar-value">{{number_format(908038)}} <span class="gender-schools-types"> <span
                                            class="female-color"><i class="fa fa-female"
                                                                    aria-hidden="true"></i><br> {{number_format(515134)}}</span><span
                                            class="male-color"><i class="fa fa-male"
                                                                  aria-hidden="true"></i><br> {{number_format(392904)}}</span></span></h3>
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
                                <div class="card">
									<div class="card-body">
										<div id="students_by_level"></div>
									</div>
								</div>
                            </div>
                            <div class="col-xl-12 col-xxl-12 col-sm-12  my-3">
                                <div id="students_by_gender"></div>
                            </div>
							<div class="col-xl-12 col-xxl-12 col-sm-12  my-3">
                                <div id="students_by_age"></div>
                            </div>
							<div class="col-xl-12 col-xxl-12 col-sm-12  my-3">
                                <div id="students_by_age_class"></div>
                            </div>
                        </div>
                        <!-- row END -->
{{--                        <div class="row">--}}
{{--                            <div class="col-xl-6 col-xxl-6 col-sm-6">--}}
{{--                                <div class="widget-stat card bg-left-line-green">--}}
{{--                                    <div class="card-header">--}}
{{--                                        <div id="external-events" class="districts-asp">--}}
{{--                                            <h3 class="card-heading">Specialization Wise Enrollment in Secondary (9<sup>th</sup>--}}
{{--                                                Class)</h3>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="widget-stat card">--}}
{{--                                        <div class="card-body">--}}
{{--                                            <!-----------Specialization subject Wrapper Start---------->--}}
{{--                                            <div class="specialization-subject-wrapper">--}}
{{--                                                <!-----------Specialization Wrapper Start---------->--}}
{{--                                                <div class="specialization-wrapper">--}}
{{--                                                    <div class="subject-title"><!--Science--> <img--}}
{{--                                                            src="{{ asset('images/imis-images/science.png') }}" tooltip="Science"--}}
{{--                                                            style="width: 40px;height: auto;"></div>--}}
{{--                                                    <div class="subject-gender-wrapper">--}}
{{--                                                        <div class="subject-gender-inner-wrapper">--}}
{{--                                                            <div class="type-gender-inner-wrapper">--}}
{{--                                                                <i class="fa fa-male" aria-hidden="true"></i>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="number-gender-inner-wrapper">--}}
{{--                                                                364,119--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <!----------------->--}}
{{--                                                        <div class="subject-gender-inner-wrapper">--}}
{{--                                                            <div class="type-gender-inner-wrapper">--}}
{{--                                                                <i class="fa fa-female" aria-hidden="true"></i>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="number-gender-inner-wrapper">--}}
{{--                                                                276,822--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <!-----------Specialization Wrapper End---------->--}}
{{--                                            </div>--}}
{{--                                            <!-----------Specialization subject Wrapper End---------->--}}
{{--                                            <!-----------Specialization subject Wrapper Start---------->--}}
{{--                                            <div class="specialization-subject-wrapper">--}}
{{--                                                <!-----------Specialization Wrapper Start---------->--}}
{{--                                                <div class="specialization-wrapper">--}}
{{--                                                    <div class="subject-title"><!-- Arts--> <img--}}
{{--                                                            src="{{ asset('images/imis-images/arts.png') }}" tooltip="Arts"--}}
{{--                                                            style="width: 40px;height: auto;"></div>--}}
{{--                                                    <div class="subject-gender-wrapper">--}}
{{--                                                        <div class="subject-gender-inner-wrapper">--}}
{{--                                                            <div class="type-gender-inner-wrapper">--}}
{{--                                                                <i class="fa fa-male" aria-hidden="true"></i>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="number-gender-inner-wrapper">--}}
{{--                                                                364,119--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <!----------------->--}}
{{--                                                        <div class="subject-gender-inner-wrapper">--}}
{{--                                                            <div class="type-gender-inner-wrapper">--}}
{{--                                                                <i class="fa fa-female" aria-hidden="true"></i>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="number-gender-inner-wrapper">--}}
{{--                                                                276,822--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <!-----------Specialization Wrapper End---------->--}}
{{--                                            </div>--}}
{{--                                            <!-----------Specialization subject Wrapper End---------->--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-xl-6 col-xxl-6 col-sm-6">--}}
{{--                                <div class="widget-stat card bg-left-line-green">--}}
{{--                                    <div class="card-header">--}}
{{--                                        <div id="external-events" class="districts-asp">--}}
{{--                                            <h3 class="card-heading">Specialization Wise Enrollment in Secondary--}}
{{--                                                (10<sup>th</sup> Class)</h3>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="widget-stat card">--}}
{{--                                        <div class="card-body">--}}
{{--                                            <!-----------Specialization subject Wrapper Start---------->--}}
{{--                                            <div class="specialization-subject-wrapper">--}}
{{--                                                <!-----------Specialization Wrapper Start---------->--}}
{{--                                                <div class="specialization-wrapper">--}}
{{--                                                    <div class="subject-title"><!--Science--> <img--}}
{{--                                                            src="{{ asset('images/imis-images/science.png') }}" tooltip="Science"--}}
{{--                                                            style="width: 40px;height: auto;"></div>--}}
{{--                                                    <div class="subject-gender-wrapper">--}}
{{--                                                        <div class="subject-gender-inner-wrapper">--}}
{{--                                                            <div class="type-gender-inner-wrapper">--}}
{{--                                                                <i class="fa fa-male" aria-hidden="true"></i>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="number-gender-inner-wrapper">--}}
{{--                                                                334,330--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <!----------------->--}}
{{--                                                        <div class="subject-gender-inner-wrapper">--}}
{{--                                                            <div class="type-gender-inner-wrapper">--}}
{{--                                                                <i class="fa fa-female" aria-hidden="true"></i>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="number-gender-inner-wrapper">--}}
{{--                                                                245,618--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <!-----------Specialization Wrapper End---------->--}}
{{--                                            </div>--}}
{{--                                            <!-----------Specialization subject Wrapper End---------->--}}
{{--                                            <!-----------Specialization subject Wrapper Start---------->--}}
{{--                                            <div class="specialization-subject-wrapper">--}}
{{--                                                <!-----------Specialization Wrapper Start---------->--}}
{{--                                                <div class="specialization-wrapper">--}}
{{--                                                    <div class="subject-title"><!-- Arts--> <img--}}
{{--                                                            src="{{ asset('images/imis-images/arts.png') }}" tooltip="Arts"--}}
{{--                                                            style="width: 40px;height: auto;"></div>--}}
{{--                                                    <div class="subject-gender-wrapper">--}}
{{--                                                        <div class="subject-gender-inner-wrapper">--}}
{{--                                                            <div class="type-gender-inner-wrapper">--}}
{{--                                                                <i class="fa fa-male" aria-hidden="true"></i>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="number-gender-inner-wrapper">--}}
{{--                                                                43505--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <!----------------->--}}
{{--                                                        <div class="subject-gender-inner-wrapper">--}}
{{--                                                            <div class="type-gender-inner-wrapper">--}}
{{--                                                                <i class="fa fa-female" aria-hidden="true"></i>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="number-gender-inner-wrapper">--}}
{{--                                                                115448--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <!-----------Specialization Wrapper End---------->--}}
{{--                                            </div>--}}
{{--                                            <!-----------Specialization subject Wrapper End---------->--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-xl-12 col-xxl-12 col-sm-12">--}}
{{--                                <div id="SWHS"></div>--}}
{{--                            </div><!-- col END -->--}}
{{--                        </div>--}}
                        <!-- row END -->
                        <!-- row START-->
{{--                        <div class="row">--}}
{{--                            <div class="col-md-12 my-3">--}}
{{--                                <h3 class="card-heading">Enrollment by Gender and Shift</h3>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-4">--}}
{{--                                <div class="card">--}}
{{--                                    <div class="card-body EGS-wrapper"><!--Enrollment by Gender and Shift-->--}}
{{--                                        <div id="EGS1"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div><!-- col END -->--}}
{{--                            <div class="col-md-4">--}}
{{--                                <div class="card">--}}
{{--                                    <div class="card-body  EGS-wrapper"><!--Enrollment by Gender and Shift-->--}}
{{--                                        <div id="EGS2"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div><!-- col END -->--}}
{{--                            <div class="col-md-4">--}}
{{--                                <div class="card">--}}
{{--                                    <div class="card-body  EGS-wrapper"><!--Enrollment by Gender and Shift-->--}}
{{--                                        <div id="EGS3"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div><!-- col END -->--}}
{{--                        </div>--}}
                        <!-- row END-->
                        <!-- row START-->
{{--                        <div class="row">--}}
{{--                            <div class="col-md-6">--}}
{{--                                <div id="EGM"></div>--}}
{{--                            </div><!-- col END -->--}}
{{--                            <div class="col-sm-6">--}}
{{--                                <div id="EGA"></div>--}}
{{--                            </div><!-- col END -->--}}
{{--                        </div>--}}
                        <!-- row END-->
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

        @include('partials.student.highcharts')
    @endpush
@endsection