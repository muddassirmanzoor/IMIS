@extends('layouts.master')

@section('title', 'Student List')

@section('content')
    <script>
        jQuery(function ($) {
            //< !--fund_allocation chart  chart start here-- >
            $('#final_assessment_analysis').highcharts({
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Final Assessment Analysis Last Five years',
                    style: {
                        display: 'none'
                    }
                },
                xAxis: {
                    categories: ['Kachi', '1', '2', '3', '4'],
                    accessibility: {
                        description: 'Assessment Class'
                    }
                },
                yAxis: {
                    title: {
                        text: 'Assessment Percentage'
                    },
                    labels: {
                        format: '{value}%'
                    },
                    max: 100,
                    tickInterval: 10
                },
                tooltip: {
                    crosshairs: true,
                    shared: true
                },
                plotOptions: {
                    spline: {
                        marker: {
                            radius: 4,
                            lineColor: '#666666',
                            lineWidth: 1
                        }
                    }
                },
                series: [{
                    name: 'Assessment Class',
                    marker: {
                        symbol: 'square'
                    },
                    data: [30, 50, 60, 90, 80]

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

            @include('partials.page_heading', ['type' => 'schools', 'name' => 'Student Profile'])

            <div class="row">
                <div class="col-lg-12 mb-2">
                    <a href="{{'/pdf-student/'.encrypt($student->s_id)}}" target="_blank" class="btn btn-primary text-white" style=" float: right;">
											<span class="mr-2"> <svg width="25" height="25" viewBox="0 0 109 123"
                                                                     fill="none" xmlns="http://www.w3.org/2000/svg">
												<path
                                                    d="M62.64 64.67C63.3457 64.672 64.0349 64.8831 64.6207 65.2765C65.2064 65.67 65.6624 66.2282 65.9311 66.8808C66.1998 67.5333 66.2691 68.2507 66.1302 68.9426C65.9913 69.6344 65.6505 70.2696 65.1508 70.7679C64.6512 71.2662 64.015 71.6052 63.3228 71.7421C62.6306 71.8791 61.9133 71.8078 61.2615 71.5373C60.6098 71.2668 60.0528 70.8092 59.661 70.2224C59.2691 69.6355 59.06 68.9457 59.06 68.24C59.06 67.7704 59.1527 67.3053 59.3327 66.8715C59.5127 66.4377 59.7766 66.0437 60.1092 65.7121C60.4417 65.3805 60.8365 65.1177 61.2708 64.9389C61.705 64.7601 62.1703 64.6687 62.64 64.67ZM17.32 1.25172e-05H91.05C92.9447 0.00529019 94.7602 0.760286 96.1 2.10003C97.4397 3.43977 98.1947 5.25534 98.2 7.15001V16.89H101.46C102.363 16.8868 103.259 17.0618 104.094 17.405C104.93 17.7482 105.69 18.2528 106.33 18.89C106.966 19.5289 107.471 20.287 107.814 21.1209C108.157 21.9548 108.332 22.8482 108.33 23.75V63.35C108.33 64.2561 108.152 65.1534 107.805 65.9905C107.458 66.8277 106.95 67.5883 106.309 68.229C105.668 68.8698 104.908 69.378 104.071 69.7248C103.233 70.0715 102.336 70.25 101.43 70.25H92.09V118.74C92.0902 119.279 91.9844 119.812 91.7785 120.309C91.5726 120.807 91.2707 121.259 90.89 121.64C90.7805 121.748 90.6636 121.848 90.54 121.94C89.817 122.521 88.9176 122.839 87.99 122.84H20.37C19.8329 122.841 19.3011 122.735 18.8051 122.529C18.3091 122.323 17.8587 122.021 17.48 121.64C17.3719 121.531 17.2716 121.414 17.18 121.29C16.5895 120.572 16.2677 119.67 16.27 118.74V70.29H6.90001C5.99655 70.2938 5.10125 70.119 4.26551 69.7758C3.42977 69.4326 2.67006 68.9277 2.03001 68.29L1.82001 68C0.659198 66.7444 0.00999958 65.1 6.76298e-06 63.39V23.79C-0.00254345 21.9633 0.716233 20.2095 2.00001 18.91L2.23001 18.71C3.50086 17.5352 5.16932 16.8849 6.90001 16.89H10.17V7.15001C10.1704 6.21147 10.3562 5.28225 10.7165 4.41565C11.0769 3.54905 11.6048 2.76213 12.27 2.10001C12.9308 1.43305 13.7175 0.903963 14.5844 0.543469C15.4513 0.182974 16.3811 -0.00175161 17.32 1.25172e-05ZM92.7 16.89V7.15001C92.6948 6.71402 92.5193 6.29734 92.211 5.98903C91.9027 5.68071 91.486 5.5052 91.05 5.50001H17.32C17.1032 5.50254 16.889 5.54803 16.6899 5.63385C16.4908 5.71967 16.3107 5.84413 16.16 6.00001C16.0059 6.15102 15.884 6.33162 15.8015 6.53097C15.719 6.73032 15.6777 6.94429 15.68 7.16001V16.9L92.7 16.89ZM31.24 99.18C30.9487 99.2 30.6564 99.1599 30.3812 99.0622C30.106 98.9644 29.8539 98.8112 29.6405 98.6119C29.4271 98.4126 29.2569 98.1715 29.1405 97.9037C29.0242 97.6359 28.9641 97.347 28.9641 97.055C28.9641 96.763 29.0242 96.4741 29.1405 96.2063C29.2569 95.9385 29.4271 95.6974 29.6405 95.4982C29.8539 95.2989 30.106 95.1456 30.3812 95.0479C30.6564 94.9501 30.9487 94.91 31.24 94.93H75.62C75.9113 94.91 76.2036 94.9501 76.4788 95.0479C76.754 95.1456 77.0061 95.2989 77.2195 95.4982C77.433 95.6974 77.6031 95.9385 77.7195 96.2063C77.8358 96.4741 77.8959 96.763 77.8959 97.055C77.8959 97.347 77.8358 97.6359 77.7195 97.9037C77.6031 98.1715 77.433 98.4126 77.2195 98.6119C77.0061 98.8112 76.754 98.9644 76.4788 99.0622C76.2036 99.1599 75.9113 99.2 75.62 99.18H31.24ZM31.24 110.02C30.6751 110.02 30.1333 109.796 29.7339 109.396C29.3344 108.997 29.11 108.455 29.11 107.89C29.11 107.325 29.3344 106.783 29.7339 106.384C30.1333 105.984 30.6751 105.76 31.24 105.76H55.37C55.9349 105.76 56.4767 105.984 56.8761 106.384C57.2756 106.783 57.5 107.325 57.5 107.89C57.5 108.455 57.2756 108.997 56.8761 109.396C56.4767 109.796 55.9349 110.02 55.37 110.02H31.24ZM76.14 89.23H32.22C31.4503 89.2097 30.7178 88.8942 30.1743 88.3488C29.6307 87.8033 29.3177 87.0698 29.3 86.3V59.66C29.3 58.8856 29.6077 58.1429 30.1553 57.5953C30.7029 57.0477 31.4456 56.74 32.22 56.74H76.14C76.9098 56.7577 77.6433 57.0707 78.1887 57.6143C78.7342 58.1578 79.0497 58.8903 79.07 59.66V86.3C79.0522 87.0715 78.7378 87.8065 78.1921 88.3521C77.6465 88.8978 76.9115 89.2122 76.14 89.23ZM33.14 85.35H39.14L47.77 71.26C47.9182 71.0224 48.1245 70.8263 48.3695 70.6904C48.6144 70.5545 48.8899 70.4832 49.17 70.4832C49.4501 70.4832 49.7256 70.5545 49.9705 70.6904C50.2155 70.8263 50.4218 71.0224 50.57 71.26L59.39 85.35H60.69L57.4 79.93L60.33 75.23C60.4581 75.0276 60.6352 74.8609 60.8451 74.7453C61.0549 74.6298 61.2905 74.5692 61.53 74.5692C61.7695 74.5692 62.0052 74.6298 62.215 74.7453C62.4248 74.8609 62.6019 75.0276 62.73 75.23L69.07 85.35H75.19V60.62H33.19V85.35H33.14ZM6.23001 44.5H102.13V23.79C102.131 23.7029 102.115 23.6165 102.083 23.5357C102.05 23.455 102.002 23.3816 101.94 23.32C101.813 23.1924 101.64 23.1205 101.46 23.12H6.90001C6.75173 23.1207 6.60775 23.1699 6.49001 23.26L6.43001 23.32C6.30389 23.4441 6.232 23.6131 6.23001 23.79V44.5ZM102.13 50.74H92.13V64.06H101.5C101.677 64.0574 101.846 63.986 101.971 63.8609C102.096 63.7358 102.167 63.5669 102.17 63.39V50.74H102.13ZM16.29 50.74H6.23001V63.39C6.22759 63.5388 6.27709 63.6838 6.37001 63.8L6.43001 63.86C6.55412 63.9861 6.72308 64.058 6.90001 64.06H16.27V50.74H16.29ZM86.6 50.74H21.76V116.65H86.6V50.74Z"
                                                    fill="white"/>
											</svg>
										</span>Print profile</a>
                </div>

                <div class="col-xl-3 col-xxl-4 col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="text-center p-3 overlay-box"
                                     style="background-image: url(images/imis-images/profile/img1.jpg);">
                                    <div class="profile-photo">
                                        <img src="{{ asset('images/theme/avatar/avatar.jpg') }}" width="100"
                                             class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <h3 class="mt-3 mb-1 text-white">{{$student->s_name}}</h3>
                                </div>
                                <ul class="list-group list-group-flush">
                                    {{--										<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Student Id</span> <strong class="text-muted">{{$student->s_id}}	</strong></li>--}}
                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Enrollment No #</span>
                                        <strong class="text-muted">{{$student->s_enrollment_number}}    </strong></li>
                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">B-form No</span>
                                        <strong class="text-muted">{{$student->s_form_b}}</strong></li>
                                </ul>
                                <!--<div class="card-footer text-center border-0 mt-0">
                                    <a href="javascript:void(0);" class="btn btn-primary btn-rounded px-4">Follow</a>
                                    <a href="javascript:void(0);" class="btn btn-warning btn-rounded px-4">Message</a>
                                </div>-->
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="mb-1 text-white">Student info</h3>
                                </div>
                                <div class="card-body pb-0">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Father Name</strong>
                                            <span class="mb-0">{{$student->s_father_name}}</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Gender</strong>
                                            <span class="mb-0">{{$student->s_gender}}</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>DOB</strong>
                                            <span class="mb-0">{{$student->s_dob}}</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Religion</strong>
                                            <span class="mb-0">{{$student->s_religion}}</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Nationality </strong>
                                            <span class="mb-0">{{$student->s_nationality}}</span>
                                        </li>
{{--                                        <li class="list-group-item d-flex px-0 justify-content-between">--}}
{{--                                            <strong>Contact #</strong>--}}
{{--                                            <span class="mb-0">123445688</span>--}}
{{--                                        </li>--}}
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Distance </strong>
                                            <span class="mb-0">{{$student->s_school_distance}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header d-block">
                                    <h3 class="mb-1 text-white">Medical Issues</h3>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Seeing</strong>
                                            <span class="mb-0">{{$student->s_seeing_difficulty}}</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Hearing</strong>
                                            <span class="mb-0">{{$student->s_hearing_difficulty}}</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Walking</strong>
                                            <span class="mb-0">{{$student->s_walking_difficulty}}</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Readwrite</strong>
                                            <span class="mb-0">{{$student->s_readwrite_difficulty}}</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Remembering</strong>
                                            <span class="mb-0">{{$student->s_remembering_difficulty}}</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Concentrating</strong>
                                            <span class="mb-0">{{$student->s_concentrating_difficulty}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--------------------->

{{--                        <div class="col-lg-12">--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-header d-block">--}}
{{--                                    <h3 class="mb-1 text-white">Final Assessment Analysis</h3>--}}
{{--                                </div>--}}
{{--                                <div class="card-body">--}}
{{--                                    <div id="final_assessment_analysis"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
                <div class="col-xl-9 col-xxl-8 col-lg-8">
                    <!---------------------->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header bg-primary">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <h3 class="mb-1  text-white">Enrollment Info.</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body  details-page-label">
                                    <div class="row">
                                        <div class="col-md-4 p-2 pl-4">
                                            <strong>District:</strong>
                                            <span class="mb-0">{{$student->d_name}} </span>
                                        </div>
                                        <div class="col-md-4 p-2 pl-4">
                                            <strong>Tehsil:</strong>
                                            <span class="mb-0">{{$student->t_name}} </span>
                                        </div>
                                        <div class="col-md-4 p-2 pl-4">
                                            <strong>Markaz:</strong>
                                            <span class="mb-0">{{$student->m_name}} </span>
                                        </div>
                                        <div class="col-md-8 p-2 pl-4">
                                            <strong>School Name:</strong>
                                            <span class="mb-0">{{$student->school_name}} </span>
                                        </div>
                                        <div class="col-md-4 p-2 pl-4">
                                            <strong>EMIS Code:</strong>
                                            <span class="mb-0">{{$student->s_emis_code}} </span>
                                        </div>
                                        <div class="col-md-4 p-2 pl-4">
                                            <strong>School Enrollment Date:</strong>
                                            <span class="mb-0">{{$student->s_school_enrollment_date}}</span>
                                        </div>
                                        <div class="col-md-4 p-2 pl-4">
                                            <strong>Current Class:</strong>
                                            <span class="mb-0">{{$student->c_name}}</span>
                                        </div>
                                        <div class="col-md-4 p-2 pl-4">
                                            <strong>Section:</strong>
                                            <span class="mb-0">{{$student->scs_name}}</span>
                                        </div>
                                        <div class="col-md-4 p-2 pl-4">
                                            <strong>Medium:</strong>
                                            <span class="mb-0">{{$student->s_medium}}</span>
                                        </div>
                                        <div class="col-md-4 p-2 pl-4">
                                            <strong>Major Subjects:</strong>
                                            <span class="mb-0">{{$student->s_major}}</span>
                                        </div>
                                        <div class="col-md-4 p-2 pl-4">
                                            <strong>School Shift:</strong>
                                            <span class="mb-0">{{$student->s_shift}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-----Card End----->
                        </div> <!-----col-lg-12 End----->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header bg-primary">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <h3 class="mb-1 text-white">Guardian Info.</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body details-page-label">
                                    <div class="row">
                                        <div class="col-md-6 p-2 pl-4">
                                            <strong>Guardian Name:</strong>
                                            <span class="mb-0">{{$student->s_student_guardian_name}}</span>
                                        </div>
                                        <div class="col-md-6 p-2 pl-4">
                                            <strong>Guardian CNIC No:</strong>
                                            <span class="mb-0">{{$student->s_student_guardian_cnic}}</span>
                                        </div>
                                        <div class="col-md-6 p-2 pl-4">
                                            <strong>Guardian Relation:</strong>
                                            <span class="mb-0">{{$student->s_fg_relation}}</span>
                                        </div>
                                        <div class="col-md-6 p-2 pl-4">
                                            <strong>Household Income:</strong>
                                            <span class="mb-0">{{$student->s_income_bracket}}</span>
                                        </div>
                                    </div><!-----Row End----->
                                </div>
                            </div> <!-----Card End----->
                        </div> <!-----col-lg-12 End----->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header bg-primary">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h3 class="mb-1  text-white">Transfer History</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body  details-page-label">
                                    <!-------Transfer list Start------->
                                    <table class="session-result-table">
                                        <tbody>
                                        <tr>
                                            <th>Sr #</th>
                                            <th>Transfer From</th>
                                            <th>EMIS Code</th>
                                            <th>Transfer Date</th>
                                        </tr>
                                        @foreach($transfer_logs as $index=> $transfer)
                                            <tr>
                                                <td>{{$index+1}}</td>
                                                <td>{{$transfer->from_school_name}}</td>
                                                <td>{{$transfer->from_school_emis_code}}</td>
                                                <td>{{$transfer->stl_transfer_date}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <!-------Transfer list Start------->
                                </div>
                            </div> <!-----Card End----->
                        </div> <!-----col-lg-12 End----->
                        <div class="col-lg-12">
                            <div class="card  details-page-label">
                                <div class="card-header bg-primary">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h3 class="mb-1  text-white">Rejoin History</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body  details-page-label">
                                    <!-------Transfer list Start------->
                                    <table class="session-result-table">
                                        <tbody>
                                        <tr>
                                            <th>Sr #</th>
                                            <th>Drop Date</th>
                                            <th>Rejoin Date</th>
                                        </tr>
                                        @foreach($rejoin_logs as $index=> $rejoin)
                                            <tr>
                                                <td>{{$index+1}}</td>
                                                <td>{{$transfer->stl_transfer_date}}</td>
                                                <td>{{$transfer->stl_transfer_in_date}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <!-------Transfer list Start------->
                                </div>
                            </div> <!-----Card End----->
                        </div> <!-----col-lg-12 End----->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header bg-primary">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h3 class="mb-1 text-white">Availed Interventions</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body  details-page-label">
                                    <div class="row">
                                        <div class="col-md-6 p-2">
                                            <b>{!! $student->s_is_insaaf_student == 1 ? '&#10003;' : '&#10007;' !!} </b>
                                            Afternoon Schools Programme(ASP)
                                        </div>
                                        <div class="col-md-6 p-2">
                                            <b>
                                                @if(in_array($student->d_name, $ztp_districts) && $student->s_gender == 'Female')
                                                    &#10003;
                                                @else
                                                    &#10007;
                                                @endif
{{--                                                {!! $student->s_is_insaaf_student == 1 ? '&#10003;' : '&#10007;' !!}--}}
                                            </b>
                                            Girls' Stipend Programme (GSP)
                                        </div>
                                        {{--													<div class="col-md-6 p-2">--}}
                                        {{--														<b>✓</b> Benazir Income Support Programme (BISP)--}}
                                        {{--													</div>--}}
                                        {{--													<div class="col-md-6 p-2">--}}
                                        {{--														<b>✓</b> Early School Childhood Education Programme (ECE)--}}
                                        {{--													</div>--}}
                                        {{--													<div class="col-md-6 p-2">--}}
                                        {{--														<b>☓</b> Free Text Books--}}
                                        {{--													</div>--}}
                                        {{--													<div class="col-md-6 p-2">--}}
                                        {{--														<b>☓</b> Free Bags--}}
                                        {{--													</div>--}}
                                    </div>
                                </div>
                            </div> <!-----Card End----->
                        </div> <!-----col-lg-12 End----->
{{--                        <div class="col-lg-12">--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-header bg-primary">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-lg-12">--}}
{{--                                            <h3 class="mb-1 text-white">Assessment </h3>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-md-12 p-2">--}}
{{--                                            <table class="session-result-table">--}}
{{--                                                <tbody>--}}
{{--                                                <tr>--}}
{{--                                                    <th>Term</th>--}}
{{--                                                    <th>Total Marks</th>--}}
{{--                                                    <th>Obtained Marks</th>--}}
{{--                                                    <th>Percentage</th>--}}
{{--                                                    <th>Remarks</th>--}}
{{--                                                </tr>--}}
{{--                                                <tr>--}}
{{--                                                    <td>1<sup>st</sup></td>--}}
{{--                                                    <td>600</td>--}}
{{--                                                    <td>480</td>--}}
{{--                                                    <td>83 %</td>--}}
{{--                                                    <td>Pass</td>--}}
{{--                                                </tr>--}}
{{--                                                <tr>--}}
{{--                                                    <td>2<sup>nd</sup></td>--}}
{{--                                                    <td>600</td>--}}
{{--                                                    <td>500</td>--}}
{{--                                                    <td>80 %</td>--}}
{{--                                                    <td>Pass</td>--}}
{{--                                                </tr>--}}
{{--                                                <tr>--}}
{{--                                                    <td>3<sup>rd</sup></td>--}}
{{--                                                    <td>600</td>--}}
{{--                                                    <td>580</td>--}}
{{--                                                    <td>97 %</td>--}}
{{--                                                    <td>Pass</td>--}}
{{--                                                </tr>--}}
{{--                                                </tbody>--}}
{{--                                            </table>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div> <!-----Card End----->--}}
{{--                        </div> <!-----col-lg-12 End----->--}}

                    </div> <!---------------------->
                </div>
            </div>

        </div>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->
@endsection
