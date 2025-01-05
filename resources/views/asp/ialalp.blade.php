@extends('layouts.master')

@section('title', 'IALALP')

@section('content')

    <!-- row -->
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-7">
                    <div class="welcome-text">
                        <h4>Students</h4>
                    </div>
                </div>
                <div class="col-sm-5 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Students</a></li>
                    </ol>
                </div>
            </div>
            <!--------Filter  bar START--------->

            <div class="row filter-label-row">
                <div class="col-sm-12 col-md-2 p-2">
                    <div class="mb-3">
                        <label>Report Type</label>
                        <select class="form-select" id="report-type-select">
                            <option>Report Type</option>
                            <option>Live</option>
                            <option>Census</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-2 p-2">
                    <div class="mb-3">
                        <label>School Type</label>
                        <select class="form-select" id="School-type-select">
                            <option>School Type</option>
                            <option>SED</option>
                            <option>PEIMA</option>
                            <option>PEF</option>
                            <option>SPED</option>
                            <option>NFBED</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-2 p-2">
                    <div class="mb-3">
                        <label>All District</label>
                        <select class="form-select" id="district-select">
                            <option>All District</option>
                            <option>Bahawalpur</option>
                            <option>D.G Khan</option>
                            <option>Mianwali</option>
                            <option>Muzaffargarh</option>
                            <option>Rahim Yar Khan</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-2 p-2">
                    <div class="mb-3">
                        <label>All Tehsils</label>
                        <select class="form-select" id="tehsils-select">
                            <option>All Tehsils</option>
                            <option>Bahawalpur</option>
                            <option>D.G Khan</option>
                            <option>Mianwali</option>
                            <option>Muzaffargarh</option>
                            <option>Rahim Yar Khan</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-2 p-2">
                    <div class="mb-3">
                        <label>All Marakez</label>
                        <select class="form-select" id="marakez-select">
                            <option>All Marakez</option>
                            <option>Marakez1</option>
                            <option>Marakez2</option>
                            <option>Marakez3</option>
                            <option>Marakez4</option>
                            <option>Marakez5</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-2 p-2">
                    <div class="mb-3">
                        <label>EMIS CODE</label>
                        <select class="form-select" id="emis-code-select">
                            <option>EMIS CODE</option>
                            <option>Schools 1</option>
                            <option>Schools 2</option>
                            <option>Schools 3</option>
                            <option>Schools 4</option>
                            <option>Schools 5</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- row -->
            <!-- row -->
            <div class="row justify-content-center">
                <div class="col-xl-2 col-xxl-2 col-sm-2">
                    <div class="widget-stat card bg-left-line-green tiles-bar-tooltip-wrap">
                        <div class="card-body1">
                            <div class="media">
                                <div class="media-body text-white">
                                    <p class="mb-1 tiles-bar-title">Students</p>
                                    <h3 class="tiles-bar-value">11870919 <span class="gender-schools-types"><span
                                                class="male-color"><i class="fa fa-male"
                                                                      aria-hidden="true"></i> 5944935</span> <span
                                                class="female-color"><i class="fa fa-female" aria-hidden="true"></i> 5925984</span></span>
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
                                    <h3 class="tiles-bar-value">7367794<span class="gender-schools-types"><span
                                                class="male-color"><i class="fa fa-male"
                                                                      aria-hidden="true"></i> 3717886</span> <span
                                                class="female-color"><i class="fa fa-female" aria-hidden="true"></i> 3649908</span></span>
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
                                    <h3 class="tiles-bar-value">2818486<span class="gender-schools-types"><span
                                                class="male-color"><i class="fa fa-male"
                                                                      aria-hidden="true"></i> 1382266</span> <span
                                                class="female-color"><i class="fa fa-female" aria-hidden="true"></i> 1436220</span></span>
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
                                    <h3 class="tiles-bar-value">1556150 <span class="gender-schools-types"><span
                                                class="male-color"><i class="fa fa-male"
                                                                      aria-hidden="true"></i> 788931</span> <span
                                                class="female-color"><i class="fa fa-female" aria-hidden="true"></i> 767219</span></span>
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
                                    <h3 class="tiles-bar-value">128489 <span class="gender-schools-types"><span
                                                class="male-color"><i class="fa fa-male"
                                                                      aria-hidden="true"></i> 55852</span> <span
                                                class="female-color"><i class="fa fa-female"
                                                                        aria-hidden="true"></i> 72637</span></span></h3>
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
                                                    <div id="students_by_gender"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- row END -->
                            <div class="row">
                                <div class="col-xl-6 col-xxl-6 col-sm-6">
                                    <div class="widget-stat card bg-left-line-green">
                                        <div class="card-header">
                                            <div id="external-events" class="districts-asp">
                                                <h3 class="card-heading">Specialization Wise Enrollment in Secondary
                                                    (9<sup>th</sup>
                                                    Class)</h3>
                                            </div>
                                        </div>
                                        <div class="widget-stat card">
                                            <div class="card-body">
                                                <!-----------Specialization subject Wrapper Start---------->
                                                <div class="specialization-subject-wrapper">
                                                    <!-----------Specialization Wrapper Start---------->
                                                    <div class="specialization-wrapper">
                                                        <div class="subject-title"><!--Science--> <img
                                                                src="{{ asset('images/imis-images/science.png') }}" tooltip="Science"
                                                                style="width: 40px;height: auto;"></div>
                                                        <div class="subject-gender-wrapper">
                                                            <div class="subject-gender-inner-wrapper">
                                                                <div class="type-gender-inner-wrapper">
                                                                    <i class="fa fa-male" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="number-gender-inner-wrapper">
                                                                    364,119
                                                                </div>
                                                            </div>
                                                            <!----------------->
                                                            <div class="subject-gender-inner-wrapper">
                                                                <div class="type-gender-inner-wrapper">
                                                                    <i class="fa fa-female" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="number-gender-inner-wrapper">
                                                                    276,822
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-----------Specialization Wrapper End---------->
                                                </div>
                                                <!-----------Specialization subject Wrapper End---------->
                                                <!-----------Specialization subject Wrapper Start---------->
                                                <div class="specialization-subject-wrapper">
                                                    <!-----------Specialization Wrapper Start---------->
                                                    <div class="specialization-wrapper">
                                                        <div class="subject-title"><!-- Arts--> <img
                                                                src="{{ asset('images/imis-images/arts.png') }}" tooltip="Arts"
                                                                style="width: 40px;height: auto;"></div>
                                                        <div class="subject-gender-wrapper">
                                                            <div class="subject-gender-inner-wrapper">
                                                                <div class="type-gender-inner-wrapper">
                                                                    <i class="fa fa-male" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="number-gender-inner-wrapper">
                                                                    364,119
                                                                </div>
                                                            </div>
                                                            <!----------------->
                                                            <div class="subject-gender-inner-wrapper">
                                                                <div class="type-gender-inner-wrapper">
                                                                    <i class="fa fa-female" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="number-gender-inner-wrapper">
                                                                    276,822
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-----------Specialization Wrapper End---------->
                                                </div>
                                                <!-----------Specialization subject Wrapper End---------->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-xxl-6 col-sm-6">
                                    <div class="widget-stat card bg-left-line-green">
                                        <div class="card-header">
                                            <div id="external-events" class="districts-asp">
                                                <h3 class="card-heading">Specialization Wise Enrollment in Secondary
                                                    (10<sup>th</sup> Class)</h3>
                                            </div>
                                        </div>
                                        <div class="widget-stat card">
                                            <div class="card-body">
                                                <!-----------Specialization subject Wrapper Start---------->
                                                <div class="specialization-subject-wrapper">
                                                    <!-----------Specialization Wrapper Start---------->
                                                    <div class="specialization-wrapper">
                                                        <div class="subject-title"><!--Science--> <img
                                                                src="{{ asset('images/imis-images/science.png') }}" tooltip="Science"
                                                                style="width: 40px;height: auto;"></div>
                                                        <div class="subject-gender-wrapper">
                                                            <div class="subject-gender-inner-wrapper">
                                                                <div class="type-gender-inner-wrapper">
                                                                    <i class="fa fa-male" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="number-gender-inner-wrapper">
                                                                    334,330
                                                                </div>
                                                            </div>
                                                            <!----------------->
                                                            <div class="subject-gender-inner-wrapper">
                                                                <div class="type-gender-inner-wrapper">
                                                                    <i class="fa fa-female" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="number-gender-inner-wrapper">
                                                                    245,618
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-----------Specialization Wrapper End---------->
                                                </div>
                                                <!-----------Specialization subject Wrapper End---------->
                                                <!-----------Specialization subject Wrapper Start---------->
                                                <div class="specialization-subject-wrapper">
                                                    <!-----------Specialization Wrapper Start---------->
                                                    <div class="specialization-wrapper">
                                                        <div class="subject-title"><!-- Arts--> <img
                                                                src="{{ asset('images/imis-images/arts.png') }}" tooltip="Arts"
                                                                style="width: 40px;height: auto;"></div>
                                                        <div class="subject-gender-wrapper">
                                                            <div class="subject-gender-inner-wrapper">
                                                                <div class="type-gender-inner-wrapper">
                                                                    <i class="fa fa-male" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="number-gender-inner-wrapper">
                                                                    43505
                                                                </div>
                                                            </div>
                                                            <!----------------->
                                                            <div class="subject-gender-inner-wrapper">
                                                                <div class="type-gender-inner-wrapper">
                                                                    <i class="fa fa-female" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="number-gender-inner-wrapper">
                                                                    115448
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-----------Specialization Wrapper End---------->
                                                </div>
                                                <!-----------Specialization subject Wrapper End---------->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-xxl-12 col-sm-12">
                                    <div class="widget-stat card">
                                        <!--<div class="card-header">
                                             <div id="external-events" class="districts-asp">
                                                 <h3 class="card-heading">Specialization Wise Enrollment in Higher Secondary</h3>
                                             </div>
                                         </div>-->
                                        <div class="widget-stat card">
                                            <div class="card-body">
                                                <div id="SWHS"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col END -->
                            </div>
                            <!-- row END -->
                            <!-- row START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="card-heading">Enrollment by Gender and Shift</h3>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body EGS-wrapper"><!--Enrollment by Gender and Shift-->
                                            <div id="EGS1"></div>
                                        </div>
                                    </div>
                                </div><!-- col END -->
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body  EGS-wrapper"><!--Enrollment by Gender and Shift-->
                                            <div id="EGS2"></div>
                                        </div>
                                    </div>
                                </div><!-- col END -->
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body  EGS-wrapper"><!--Enrollment by Gender and Shift-->
                                            <div id="EGS3"></div>
                                        </div>
                                    </div>
                                </div><!-- col END -->
                            </div>
                            <!-- row END-->
                            <!-- row START-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body"><!--Enrollment by Gender and Medium-->
                                            <div id="EGM" style="min-width: 100%; height: 450px; margin: 15 auto"></div>
                                        </div>
                                    </div>
                                </div><!-- col END -->
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div id="EGA"></div>
                                        </div>
                                    </div>
                                </div><!-- col END -->
                            </div>
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
    @push('scripts')
        <!-- Include School Js Files -->
        @include('partials.student.highcharts')
    @endpush
@endsection
