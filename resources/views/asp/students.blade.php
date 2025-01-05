@extends('layouts.master')

@section('title', 'Students')

@section('content')

    <!-- row -->
    <div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-7">
                <div class="welcome-text">
                    <h4 style="color: #2ea762;">Students</h4>
                </div>
            </div>
            <div class="col-sm-5 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Students</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row justify-content-center">
            <div class="col-xl-2 col-xxl-2 col-sm-2">
                <div class="widget-stat card bg-left-line-green tiles-bar-tooltip-wrap">
                    <div class="card-body1">
                        <div class="media">
                            <div class="media-body text-white">
                                <p class="mb-1 tiles-bar-title">Students</p>
                                <h3 class="tiles-bar-value">{{$data['count_data']->TotalStudents}} <span class="gender-schools-types"><span
                                            class="male-color"><i class="fa fa-male"
                                                                  aria-hidden="true"></i> {{$data['gender_wise_data'][1]->TotalStudents}}</span> <span
                                            class="female-color"><i class="fa fa-female" aria-hidden="true"></i> {{$data['gender_wise_data'][0]->TotalStudents}}</span></span>
                                </h3>
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
                            <div class="col-xl-12 col-xxl-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <!--<h3 class="card-title">Punjab</h3>-->
                                    </div>
                                    <div class="card-body">
                                        <div id="districts_students_count"></div>
                                    </div>
                                </div>
                            </div><!-- col END -->
                        </div>
                        <!-- row END-->
                        <!-- row START-->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body"><!--Enrollment by Gender and Medium-->
                                        <div id="EGM" style="min-width: 100%; height: 450px; margin: 15 auto"></div>
                                    </div>
                                </div>
                            </div><!-- col END -->
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <!--<h3 class="card-title">Punjab</h3>-->
                                    </div>
                                    <div class="card-body">
                                        <div id="district_class_enrollment"></div>
                                    </div>
                                </div>
                            </div>
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
    <!-- Include School Js Files -->
    @push('scripts')
        @include('partials.asp.st_highcharts')
    @endpush
@endsection
