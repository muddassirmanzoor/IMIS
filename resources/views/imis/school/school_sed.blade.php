@extends('layouts.master')

@section('title', 'Schools')

@section('content')

    <!-- row -->
    <div class="content-body">
        <div class="container-fluid">

            @include('partials.page_heading', ['type' => 'schools'])
            @include('partials.drop_down')
			<!-------------School By department------------>

            <!-- row -->
            <div class="row justify-content-center">
                <div class="col-xl-2 col-xxl-2 col-sm-2">
                    <div class="widget-stat card bg-left-line-green tiles-bar-tooltip-wrap">
                        <div class="card-body1">
                            <div class="media">
                                <div class="media-body text-white">
                                    <p class="mb-1 tiles-bar-title">Total Schools</p>
                                    <h3 class="tiles-bar-value">{{number_format($data['db_schools']->TotalCount)}} <span class="gender-schools-types">
									 <span
                                                class="female-color"><i class="fa fa-female" aria-hidden="true"></i><br> {{number_format($data['db_schools']->Female)}} </span>
									<span
                                                class="male-color"><i class="fa fa-male"
                                                                      aria-hidden="true"></i><br> {{number_format($data['db_schools']->Male)}} </span></span>
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
                                    <h3 class="tiles-bar-value">{{number_format($data['db_schools']->TotalPrimary)}}<span class="gender-schools-types"> <span
                                                class="female-color"><i class="fa fa-female" aria-hidden="true"></i><br> {{number_format($data['db_schools']->PrimaryFemale)}}</span>
												<span
                                                class="male-color"><i class="fa fa-male"
                                                                      aria-hidden="true"></i><br> {{number_format($data['db_schools']->PrimaryMale)}}</span></span>
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
                                    <h3 class="tiles-bar-value">{{number_format($data['db_schools']->TotalMiddle)}}<span class="gender-schools-types"> <span
                                                class="female-color"><i class="fa fa-female" aria-hidden="true"></i><br> {{number_format($data['db_schools']->MiddleFemale)}}</span><span
                                                class="male-color"><i class="fa fa-male"
                                                                      aria-hidden="true"></i><br> {{number_format($data['db_schools']->MiddleMale)}}</span></span>
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
                                    <h3 class="tiles-bar-value">{{number_format($data['db_schools']->TotalHigh)}} <span class="gender-schools-types"> <span
                                                class="female-color"><i class="fa fa-female" aria-hidden="true"></i><br> {{number_format($data['db_schools']->HighFemale)}}</span><span
                                                class="male-color"><i class="fa fa-male"
                                                                      aria-hidden="true"></i><br> {{number_format($data['db_schools']->HighMale)}}</span></span>
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
                                    <h3 class="tiles-bar-value">{{number_format($data['db_schools']->TotalHighSecondary)}}  <span class="gender-schools-types"> <span
                                                class="female-color"><i class="fa fa-female"
                                                                        aria-hidden="true"></i><br> {{number_format($data['db_schools']->HighSecondaryFemale)}} </span><span
                                                class="male-color"><i class="fa fa-male"
                                                                      aria-hidden="true"></i><br>{{number_format($data['db_schools']->HighSecondaryMale)}} </span></span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-xxl-2 col-sm-2">
                    <div class="widget-stat card bg-left-line-blue tiles-bar-tooltip-wrap">
                        <div class="card-body1">
                            <div class="media">
                                <div class="media-body text-white">
                                    <p class="mb-1 tiles-bar-title">Masjid Maktab</p>
                                    <h3 class="tiles-bar-value">{{number_format($data['db_schools']->TotalsMosque)}}  <span class="gender-schools-types"><span
                                                class="female-color"><i class="fa fa-female"
                                                                        aria-hidden="true"></i><br> {{number_format($data['db_schools']->sMosqueFemale)}}</span><span
                                                class="male-color"><i class="fa fa-male"
                                                                      aria-hidden="true"></i><br> {{number_format($data['db_schools']->sMosqueMale)}} </span></span></h3>
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
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div id="School_by_type"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--<div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div id="district_gender_schools"></div>
                                                </div>
                                            </div>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                            <!-- row END -->
                            <div class="row">
{{--                                <div class="col-md-6">--}}
{{--                                    <div class="widget-stat card bg-left-line-green">--}}
{{--                                        <div class="card-header">--}}
{{--                                            <div id="external-events" class="districts-asp">--}}
{{--                                                <h3 class="card-heading">Schools by Medium</h3>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="widget-stat card">--}}
{{--                                            <div class="card-body">--}}
{{--                                                <div class="media mb-3">--}}
{{--                                                    <img src="{{ asset('images/imis-images/alifbapa.png') }}"--}}
{{--                                                         style="width: 40px;height: auto;">--}}
{{--                                                    <div class="media-body text-blue">--}}
{{--                                                        <h4 class="School-Mdeium-Urdu-text"> Urdu <span--}}
{{--                                                                class="School-Mdeium-value">{{number_format($data['db_schools']->UrduMedium)}} </span></h4>--}}
{{--                                                        <div class="progress mb-2 School-Mdeium">--}}
{{--                                                            <div--}}
{{--                                                                class="progress-bar progress-animated bg-light School-Mdeium-Urdu-bar"--}}
{{--                                                                style="width: 30%"></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="media mb-3">--}}
{{--                                                    <img src="{{ asset('images/imis-images/abc-icon.svg') }}"--}}
{{--                                                         style="width: 40px;height: auto;">--}}
{{--                                                    <div class="media-body text-blue">--}}
{{--                                                        <h4 class="School-Mdeium-English-text"> English <span--}}
{{--                                                                class="School-Mdeium-value">{{number_format($data['db_schools']->EnglishMedium)}}</span></h4>--}}
{{--                                                        <div class="progress mb-2 School-Mdeium">--}}
{{--                                                            <div--}}
{{--                                                                class="progress-bar progress-animated bg-light School-Mdeium-English-bar"--}}
{{--                                                                style="width: 50%"></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="media mb-3">--}}
{{--                                                    <img src="{{ asset('images/imis-images/both.png') }}"--}}
{{--                                                         style="width: 40px;height: auto;">--}}
{{--                                                    <div class="media-body text-blue">--}}
{{--                                                        <h4 class="School-Mdeium-Both-text"> Both <span--}}
{{--                                                                class="School-Mdeium-value">{{number_format($data['db_schools']->BothMedium)}}</span></h4>--}}
{{--                                                        <div class="progress mb-2 School-Mdeium">--}}
{{--                                                            <div--}}
{{--                                                                class="progress-bar progress-animated bg-light School-Mdeium-Both-bar"--}}
{{--                                                                style="width: 30%"></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="col-md-6">
                                    <div class="widget-stat card bg-left-line-red">
                                        <div class="card-header">
                                            <div id="external-events" class="districts-asp">
                                                <h3 class="card-heading">Schools by Shift</h3>
                                            </div>
                                        </div>
                                        <div class="widget-stat card">
                                            <div class="card-body">
                                                <div class="media mb-3">
                                                    <img src="{{ asset('images/imis-images/moring.png') }}"
                                                         style="width: 40px;height: auto;">
                                                    <div class="media-body text-blue">
                                                        <h4 class="School-Mdeium-Urdu-text">Morning Shift Schools <br><span
                                                                class="School-Mdeium-value">
{{--                                                                {{number_format($data['db_schools']->MorningShift)}}--}}
                                                                {{number_format(41104)}}
                                                            </span></h4>
                                                    </div>
                                                </div>
                                                <div class="media mb-3">
                                                    <img src="{{ asset('images/imis-images/sun.png') }}"
                                                         style="width: 40px;height: auto;">
                                                    <div class="media-body text-blue">
                                                        <h4 class="School-Mdeium-Both-text">Afternoon School Programme <br><span
                                                                class="School-Mdeium-value">{{number_format(6484)}}</span></h4>
                                                    </div>
                                                </div>
                                                <div class="media mb-3">
                                                    <img src="{{ asset('images/imis-images/sun.png') }}"
                                                         style="width: 40px;height: auto;">
                                                    <div class="media-body text-blue">
                                                        <h4 class="School-Mdeium-English-text">Double Shift Schools
                                                            <br><span class="School-Mdeium-value">{{number_format(858)}}</span></h4>
                                                    </div>
                                                </div>
                                                <div class="media mb-3">
                                                    <img src="{{ asset('images/imis-images/double-sgift.png') }}"
                                                         style="width: 40px;height: auto;">
                                                    <div class="media-body text-blue">
                                                        <h4 class="School-Mdeium-Both-text">Evening Shift Schools <br><span
                                                                class="School-Mdeium-value">{{number_format($data['db_schools']->EveningShift)}}</span></h4>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col END -->
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div id="Schools_Area"></div>
                                        </div>
                                    </div>
                                </div><!-- col END -->
                            </div>
                            <!-- row END -->
                            @if($dropdownData['request']['school_type'] == 1)
                            <!-- row START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div id="School_Ownership"></div>
                                        </div>
                                    </div>
                                </div><!-- col END -->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div id="School_Construction_Type"></div>
                                        </div>
                                    </div>
                                </div><!-- col END -->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div id="School_Buliding_Safety"></div>
                                        </div>
                                    </div>
                                </div><!-- col END -->
                            </div>
                            <!-- row END-->
                            @endif
                        </div>
                    </div>
                </div>
{{--                @if($dropdownData['request']['school_type'] == 1)--}}
                <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-xl-3 col-xxl-3 col-sm-3">
                            <div class="widget-stat card">
                                <div class="card-body">
                                    <div class="icon-image">
                                        <img src="{{ asset('images/imis-images/icons/wall.png') }}" style="width: 50px;">
                                    </div>
                                    <h4 class="card-title">Boundary Walls</h4>
                                    <h3>
                                        <span class="facility-number green-number">{{number_format($data['db_schools']->BoundryWall)}}</span>
                                        <span class="facility-number red-number">{{number_format($data['db_schools']->TotalCount - $data['db_schools']->BoundryWall)}}</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-xxl-3 col-sm-3">
                            <div class="widget-stat card">
                                <div class="card-body">
                                    <div class="icon-image">
                                        <img src="{{ asset('images/imis-images/icons/bulb.png') }}" style="width: 50px;">
                                    </div>
                                    <h4 class="card-title">Electricity</h4>
                                    <h3>
                                        <span class="facility-number green-number">{{number_format($data['db_schools']->Electricity)}}</span>
                                        <span class="facility-number red-number">{{number_format($data['db_schools']->TotalCount - $data['db_schools']->Electricity)}}</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-xxl-3 col-sm-3">
                            <div class="widget-stat card">
                                <div class="card-body">
                                    <div class="icon-image">
                                        <img src="{{ asset('images/imis-images/icons/water-tap.png') }}" style="width: 50px;">
                                    </div>
                                    <h4 class="card-title">Water</h4>
                                    <h3>
                                        <span class="facility-number green-number">{{number_format($data['db_schools']->DrinkingWater)}}</span>
                                        <span class="facility-number red-number">{{number_format($data['db_schools']->TotalCount - $data['db_schools']->DrinkingWater)}}</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-xxl-3 col-sm-3">
                            <div class="widget-stat card">
                                <div class="card-body">
                                    <div class="icon-image">
                                        <img src="{{ asset('images/imis-images/icons/toilet.png') }}" style="width: 50px;">
                                    </div>
                                    <h4 class="card-title">Toilet</h4>
                                    <h3>
                                        <span class="facility-number green-number">{{number_format($data['db_schools']->Toilet)}}</span>
                                        <span class="facility-number red-number">{{number_format($data['db_schools']->TotalCount - $data['db_schools']->Toilet)}}</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
{{--                @endif--}}
            </div>
        </div>
    </div>
    <!-- row END -->

    @push('scripts')
        <!-- Include School Js Files -->
        @include('partials.custom_scripts')

        @include('partials.school.highcharts')
    @endpush
@endsection
