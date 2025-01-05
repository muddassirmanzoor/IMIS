@extends('layouts.master')

@section('title', 'FLN - Foundational Literacy and Numeracy')

@section('content')

<!---Map CSS Start---->
<style>

path#Muzaffargarh,path#Mianwali,path#Bahawalpur,path#Rahimyar_Khan,path#Dera_Ghazi_Khan{
    fill: #5d9649 !important;
}

path#Muzaffargarh:hover,path#Mianwali:hover,path#Bahawalpur:hover,path#Rahimyar_Khan:hover,path#Dera_Ghazi_Khan:hover {
    fill: #cddc39 !important;
}

</style>
<!---Map CSS END---->

        <!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row filter-label-row">
            <div class="col-sm-12 col-md-2 p-2">
                <div class="mb-3">
                    <label>FLN Districts</label>
                    <select class="form-select" id="fln-district-select" name="district">
                        <option value="">FLN Districts</option>
                        @foreach($districts as $district)
                            <option {{ $district == $selectedDistrict ? 'selected' : '' }} value="{{ url('OOSC_2024/' . encrypt($district)) }}">{{$district}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-12 col-md-2 p-2">
                <div class="mb-3">
                    <label> Tehsils</label>
                    <select class="form-select" id="fln-tehsil-select" name="tehsil">
                        <option value=""> Tehsils</option>
                        @foreach($tehsils as $tehsil)
                            <option {{ $tehsil == $selectedTehsil ? 'selected' : '' }} value="{{ url('OOSC_2024/' . encrypt($selectedDistrict).'/'.encrypt($tehsil)) }}">{{$tehsil}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-12 col-md-2 p-2">
                <div class="mb-3">
                    <label> Markaz</label>
                    <select class="form-select" id="fln-markaz-select" name="tehsil">
                        <option value=""> Markaz</option>
                        @foreach($markazs as $markaz)
                            <option {{ $markaz == $selectedMarkaz ? 'selected' : '' }} value="{{ url('OOSC_2024/' . encrypt($selectedDistrict).'/'.encrypt($selectedTehsil).'/'.encrypt($markaz)) }}">{{$markaz}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <!--------Filter  bar START--------->
{{--        <div class="row filter-label-row  justify-content-end">--}}
{{--            <div class="col-sm-12 col-md-3 p-2">--}}
{{--                <div class="mb-3">--}}
{{--                    <label>Year Wise Report</label>--}}
{{--                    <select class="form-select" id="report-type-select">--}}
{{--                        <option>Year 1</option>--}}
{{--                        <option>Year 2</option>--}}
{{--                        <option>Year 3</option>--}}
{{--                        <option>Year 4</option>--}}
{{--                        <option>Year 5</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-----row  End----->
        <div class="row">
            <div class="col-md-12">
                <div class="card1">
                    <!--<div class="card-header">
                        <h4 class="card-title">Improving Access and Learning at Primary Level</h4>
                    </div>-->
                    <div class="card-body">
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-12 mb-3">--}}
{{--                                    <div class="component-content-wrapper">--}}
{{--										<h4 class="sub-component-title">Extending the Formal Schooling to Unserved: The Case of OOSC </h4>--}}
{{--										<p>Improved access and provision of quality primary education opportunities for marginalized children in remote districts through focusing on improving Foundational Literacy and Numeracy (FLN).</p>--}}
{{--									</div>--}}
{{--								</div>--}}
{{--							</div>--}}
						<!--------Tiles bar – Component 1.2  START--------->
                        <form id="FLNCampsForm" method="POST" action="{{ '/fln/camps-listing' }}">
                            @csrf
                            <input type="hidden" name="district" value="{{$selectedDistrict}}">
                            <input type="hidden" name="tehsil" value="{{$selectedTehsil}}">
                            <input type="hidden" name="markaz" value="{{$selectedMarkaz}}">
                        </form>
                        <form id="FLNAttendanceForm" method="GET" action="{{ '/fln/camps-attendance/'.encrypt($selectedDistrict).'/'.encrypt($selectedTehsil).'/'.encrypt($selectedMarkaz)  }}">
                            @csrf
                            <input type="hidden" name="district" value="{{$selectedDistrict}}">
                        </form>
                        <form id="FLNComplaintsForm" method="GET" action="{{ '/fln/camps-complaints/'.encrypt($selectedDistrict).'/'.encrypt($selectedTehsil).'/'.encrypt($selectedMarkaz)  }}">
                            @csrf
                            <input type="hidden" name="district" value="{{$selectedDistrict}}">
                        </form>
                        <form id="FLNOOSCEnrollmentForm" method="GET" action="{{ '/fln/oosc-enrollment-list/'.encrypt($selectedDistrict).'/'.encrypt($selectedTehsil) .'/'.encrypt($selectedMarkaz) }}">
                            @csrf
                            <input type="hidden" name="district" value="{{$selectedDistrict}}">
                        </form>
                        @if($selectedDistrict)
                            <form id="FLNDistrictWiseEnrollmentForm" method="GET" action="{{ '/fln/district-enrollment-list/'.encrypt($selectedDistrict).'/'.encrypt($selectedTehsil) .'/'.encrypt($selectedMarkaz) }}">
                                @csrf
                                <input type="hidden" name="district" value="{{$selectedDistrict}}">
                            </form>

                            @else
                        <form id="FLNDistrictWiseEnrollmentForm" method="POST" action="{{ '/fln/district-wise-enrollment' }}">
                            @csrf
                            <input type="hidden" name="district" value="{{$selectedDistrict}}">
                        </form>
                        @endif
                        <div class="row justify-content-center">
                            <div class="col-xl-2 col-xxl-2 col-sm-2" onclick="submitFLNCampsForm()">
                                <div class="widget-stat card bg-left-line-green tiles-bar-tooltip-wrap">
                                    <div class="card-body1">
                                        <div class="media">
                                            <div class="media-body text-white">
                                                <p class="mb-1 tiles-bar-title">Total Camps</p>
                                                <h3 class="tiles-bar-value ng-binding">
                                                    {{number_format($data['total_data']['TotalCamps'])}}
                                                </h3>
                                                @if($selectedDistrict == null)
                                                <h3 class="tiles-bar-value ng-binding">
													<span class="target-value-types">
														<span class="target-color ng-binding">Target <br>{{number_format(6060)}}</span>
														<span class="trained-color ng-binding">Achieved<br>{{number_format($data['total_data']['TotalCamps'])}}</span>
													</span>
                                                </h3>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($selectedDistrict == null)
                            <div class="col-xl-2 col-xxl-2 col-sm-2">
                                <div class="widget-stat card bg-left-line-yellow tiles-bar-tooltip-wrap">
                                    <div class="card-body1">
                                        <div class="media">
                                            <div class="media-body text-white">
                                                <p class="mb-1 tiles-bar-title">Enrollment Target</p>
                                                <h3 class="tiles-bar-value ng-binding">
                                                    {{number_format(147280)}}
                                                    <span class="target-value-types">
																				<span class="target-color ng-binding">Achieved  {{number_format($data['total_data']['TotalEnrollment'])}}</span>
																				<span class="trained-color ng-binding">Pending  0</span>
																			</span>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <!--<div class="col-xl-2 col-xxl-2 col-sm-2">
                                <div class="widget-stat card bg-left-line-red  tiles-bar-tooltip-wrap">
                                    <div class="card-body1">
                                        <div class="media">
                                            <div class="media-body text-white">
                                                <p class="mb-1 tiles-bar-title">Teachers Trained</p>
                                                <h3 class="tiles-bar-value ng-binding">
                                                    2051
                                                    <span class="target-value-types">
																				<span class="target-color ng-binding">  Target : 1954</span>
																				<span class="trained-color ng-binding"> Achieved : 2051</span>
																			</span>
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
                                                <p class="mb-1 tiles-bar-title">Total Teachers</p>
                                                <h3 class="tiles-bar-value ng-binding">
                                                    {{$data['teacher_data']['TotalTeacher']}}
                                                </h3>
                                                <h3 class="tiles-bar-value ng-binding">
																			<span class="gender-schools-types">
																				<span class="female-color ng-binding">F<br>{{$data['teacher_data']['FemaleTeacher']}}</span>
																				<span class="male-color ng-binding">M <br>{{$data['teacher_data']['MaleTeacher']}}</span>
																			</span>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>-->

                            <div class="col-xl-2 col-xxl-2 col-sm-2" onclick="FLNDistrictWiseEnrollmentForm()">
                                <div class="widget-stat card bg-left-line-yellow tiles-bar-tooltip-wrap">
                                    <div class="card-body1">
                                        <div class="media">
                                            <div class="media-body text-white">
                                                <p class="mb-1 tiles-bar-title">Total Enrollment</p>
                                                <h3 class="tiles-bar-value ng-binding">
                                                    {{number_format($data['total_data']['TotalEnrollment'])}}
                                                    <span class="gender-schools-types">
																				<span class="female-color ng-binding"><i class="fa fa-female" aria-hidden="true"></i> {{number_format($data['total_data']['TotalFemale'])}}
                                                                                    ({{round(($data['total_data']['TotalFemale'] / $data['total_data']['TotalEnrollment']) * 100, 2)}}%)
                                                                                </span>
																				<span class="male-color ng-binding"><i class="fa fa-male" aria-hidden="true"></i> {{number_format($data['total_data']['TotalMale'])}}
                                                                                    ({{round(($data['total_data']['TotalMale'] / $data['total_data']['TotalEnrollment']) * 100, 2)}}%)</span>

																			</span>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-xxl-2 col-sm-2" onclick="FLNOOSCEnrollmentForm()">
                                <div class="widget-stat card bg-left-line-purple tiles-bar-tooltip-wrap">
                                    <div class="card-body1">
                                        <div class="media">
                                            <div class="media-body text-white">
                                                <p class="mb-1 tiles-bar-title">OOSC</p>
                                                <h3 class="tiles-bar-value ng-binding">
                                                    {{number_format($data['total_data']['TotalEnrollmentOOSC'])}}
                                                    <span class="gender-schools-types">
																				<span class="female-color ng-binding"><i class="fa fa-female" aria-hidden="true"></i> {{number_format($data['total_data']['FemaleOOSC'])}}
                                                                                    ({{round(($data['total_data']['FemaleOOSC'] / $data['total_data']['TotalEnrollmentOOSC']) * 100, 2)}}%)
                                                                                </span>

																				<span class="male-color ng-binding"><i class="fa fa-male" aria-hidden="true"></i> {{number_format($data['total_data']['MaleOOSC'])}}
                                                                                    ({{round(($data['total_data']['MaleOOSC'] / $data['total_data']['TotalEnrollmentOOSC']) * 100, 2)}}%)
                                                                                </span>
																			</span>
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
                                                <p class="mb-1 tiles-bar-title">Beginner Level</p>
                                                <h3 class="tiles-bar-value ng-binding">
                                                    {{number_format($data['total_data']['TotalBeginnerEnrollment'])}}
                                                    <span class="gender-schools-types">
																				<span class="female-color ng-binding"><i class="fa fa-female" aria-hidden="true"></i> {{number_format($data['total_data']['TotalFemaleBeginner'])}}
                                                                                </span>
																				<span class="male-color ng-binding"><i class="fa fa-male" aria-hidden="true"></i> {{number_format($data['total_data']['TotalMaleBeginner'])}}
                                                                                </span>
																			</span>
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
                                                <p class="mb-1 tiles-bar-title">Intermediate Level</p>
                                                <h3 class="tiles-bar-value ng-binding">
                                                    {{number_format($data['total_data']['TotalIntermediateEnrollment'])}}
                                                    <span class="gender-schools-types">
																				<span class="female-color ng-binding"><i class="fa fa-female" aria-hidden="true"></i> {{number_format($data['total_data']['TotalFemaleIntermediate'])}}
                                                                                </span>
																				<span class="male-color ng-binding"><i class="fa fa-male" aria-hidden="true"></i> {{number_format($data['total_data']['TotalMaleIntermediate'])}}
                                                                                </span>
																			</span>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
{{--                            <div class="col-xl-2 col-xxl-2 col-sm-2" onclick="FLNAttendanceForm()">--}}
{{--                                <div class="widget-stat card bg-left-line-purple tiles-bar-tooltip-wrap">--}}
{{--                                    <div class="card-body1">--}}
{{--                                        <div class="media">--}}
{{--                                            <div class="media-body text-white">--}}
{{--                                                <p class="mb-1 tiles-bar-title">Camps Below Threshold</p>--}}
{{--                                                <h3 class="tiles-bar-value ng-binding">--}}
{{--                                                    {{number_format($data['total_data']['campsBelowThreshold'])}}--}}
{{--                                                </h3>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col-xl-2 col-xxl-2 col-sm-2" onclick="FLNComplaintsForm()">
                                <div class="widget-stat card bg-left-line-purple tiles-bar-tooltip-wrap">
                                    <div class="card-body1">
                                        <div class="media">
                                            <div class="media-body text-white">
                                                <p class="mb-1 tiles-bar-title">Total Complaints</p>
                                                <h3 class="tiles-bar-value ng-binding">
                                                    {{number_format($data['total_data']['totalComplaints'])}}
                                                    <span class="target-value-types">
														<span class="target-color ng-binding">Resolved <br>{{number_format($data['total_data']['resolvedComplaints'])}}</span>
														<span class="trained-color ng-binding">Pending<br>{{number_format($data['total_data']['pendingComplaints'])}}</span>
													</span>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--------Tiles bar – Component 1.2  END--------->
                        <!--------MAP – Component 1.1  START--------->
                        <!-- row -->
                        <div class="row">
                            <div class="col-lg-6 col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <a href="" class="report-link">
                                            <div dir="ltr">
                                                <div id="functiona_NonFunctional_Camps" class="apex-charts" style="min-width: 250px; height: 350px; margin: 15 auto"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- end card body-->
                                </div>
                                <!-- end card -->
                            </div> <!-- end col-->
                            <div class="col-lg-6 col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <a href="" class="report-link">
                                            <div dir="ltr">
                                                <div id="target_districts1" class="apex-charts" style="min-width: 250px; height: 350px; margin: 15 auto"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- end card body-->
                                </div>
                                <!-- end card -->
                            </div> <!-- end col-->
{{--                            <div class="col-lg-12 col-xl-12">--}}
{{--                                <div class="card">--}}
{{--                                    <div class="card-body">--}}
{{--                                        <a href="" class="report-link">--}}
{{--                                            <div dir="ltr">--}}
{{--                                                <div id="enrollment_camp" class="apex-charts" style="min-width: 250px; height: 350px; margin: 15 auto"></div>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                    </div> <!-- end card-body -->--}}
{{--                                </div> <!-- end card -->--}}
{{--                            </div> <!-- end col -->--}}
{{--                            <div class="col-lg-6 col-xl-6">--}}
{{--                                <div class="card">--}}
{{--                                    <div class="card-body">--}}
{{--                                        <a href=""  class="report-link">--}}
{{--                                            <div dir="ltr">--}}
{{--                                                <div id="support_tickets" class="apex-charts" style="min-width: 250px; height:350px; margin: 15 auto"></div>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                    </div> <!-- end card-body -->--}}
{{--                                </div> <!-- end card -->--}}
{{--                            </div> <!-- end col -->--}}
                        </div>
                        <div class="row">

{{--                            <div class="col-sm-12">--}}
{{--                                <div class="card">--}}
{{--                                    <div class="card-header">--}}
{{--                                        <h3 class="card-header-heading">District Wise Camps</h3>--}}
{{--                                    </div>--}}
{{--                                    <div class="card-body">--}}
{{--                                        <div id="learning_camps_established" style="height:290px;"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col-sm-12">
                                <div class="card">

                                <div class="card-header">
                                    <h3 class="card-header-heading">Enrollment Range Wise Camps</h3>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div id="enrollment_range_graph" style="height:290px;"></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div><!-- row END -->
                        <!-- row -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
									<div class="card-header">
											<h3 class="card-header-heading">Gender Wise Enrollment</h3>
										</div>
                                    <div class="card-body">
                                        <div id="district_wise_enrolment_OOSC" style="height:225px; min-width: 100%; height: auto; margin: 15px auto"></div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- row END -->
                        <div class="row">

                            <div class="col-sm-12">
                                <div class="card">
									<div class="card-header">
											<h3 class="card-header-heading">Age Wise Distribution</h3>
										</div>
                                    <div class="card-body">
                                        <div id="age_wise_distribution">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
									<div class="card-header">
										<h3 class="card-header-heading">Assessment Result of Enrolled Students (Beginner)</h3>
									</div>
                                    <div class="card-body">
                                        <div id="Assessment_Enrolled_Beginner" style="height:225px; min-width: 100%; height: auto; margin: 15px auto"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
									<div class="card-header">
										<h3 class="card-header-heading">Assessment Result of Enrolled Students (Intermediate)</h3>
									</div>
                                    <div class="card-body">
                                        <div id="Assessment_Enrolled_Intermediate" style="height:225px; min-width: 100%; height: auto; margin: 15px auto"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
									<div class="card-header">
										<h3 class="card-header-heading">Assessment Result Of OOSC (Beginner)</h3>
									</div>
                                    <div class="card-body">
                                        <div id="Assessment_OOSC_Beginner" style="height:225px; min-width: 100%; height: auto; margin: 15px auto"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
									<div class="card-header">
										<h3 class="card-header-heading">Assessment Result Of OOSC (Intermediate)</h3>
									</div>
                                    <div class="card-body">
                                        <div id="Assessment_OOSC_Intermediate" style="height:225px; min-width: 100%; height: auto; margin: 15px auto"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
{{--                    <div class="card-body">--}}
{{--                        <a href="#">--}}
{{--                            <div dir="ltr">--}}
{{--                                <div id="Assessment_Stats" class="apex-charts" style="min-width: 100%; height: 350px; margin: 15px auto"></div>--}}
{{--                            </div>--}}
{{--                        </a>--}}

{{--                    </div>--}}
                    <!-- end card-body -->
                </div>
                <!-- end card-->
            </div>
            <!-- end col -->
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
{{--                        <a href="#">--}}
                            <div dir="ltr">
                                <div id="district_attendance" class="apex-charts" style="min-width: 100%; height: 350px; margin: 15px auto"></div>
                            </div>
{{--                        </a>--}}

                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card-->
            </div>
            <!-- end col -->
        </div>
    </div>
</div>
<!--**********************************
    Content body end
***********************************-->

<!---------->
<!-- State Modal Start -->
@foreach($data['district_tehsil_data'] as $key =>$tehsils)
    <div class="modal bd-example-modal-lg" id="{{$key}}-details" tabindex="-1" role="dialog" aria-labelledby="{{$key}}ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><strong>{{$key}}</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-xxl-12 col-sm-12">
                            <table class="table table-striped table-bordered table-hover table-highlight table-checkable sanctioned-post-quota-table str_table">
                                <tbody>
                                <tr>
                                    <!--<td rowspan="2" colspan="1" style="color: #ffffff; background: repeating-linear-gradient(180deg, #1d3768, transparent 195px); font-weight: bold;">DISTRICT</td>-->
                                    <td rowspan="2" colspan="1" style="color: #ffffff; background: repeating-linear-gradient(180deg, #1d3768, transparent 195px); font-weight: bold;">TEHSIL</td>
                                    <td rowspan="2" colspan="1" style="color: #ffffff; background: #7195cf; font-weight: bold;">Total Camps</td>
                                    <td colspan="3" style="color: #ffffff;background: #8faf6a;font-weight: bold;">Total Enrollment</td>
                                    <td colspan="3" style="color: #ffffff;background: #cd7291; font-weight: bold;">OOSC</td>
                                </tr>
                                <tr>
                                    <th style=" background: #8faf6a96;">Total</th>
                                    <th style=" background: #8faf6a96;">Female</th>
                                    <th style=" background: #8faf6a96;">Male</th>
                                    <th style=" background: #cd729196;">Total</th>
                                    <th style=" background: #cd729196;">Female</th>
                                    <th style=" background: #cd729196;">Male</th>
                                </tr>
                                @foreach($tehsils as $tehsil)
                                <tr>
                                    <!--<th>{{$tehsil['District']}}</th>-->
                                    <th>{{$tehsil['Tehsil']}}</th>
                                    <th>{{$tehsil['TotalCamps']}}</th>
                                    <th>{{$tehsil['TotalEnrolled']}}</th>
                                    <th>{{$tehsil['EnrolledMale']}} ({{round(($tehsil['EnrolledMale']/ $tehsil['TotalEnrolled']) * 100, 2)}}%)</th>
                                    <th>{{$tehsil['EnrolledFemale']}} ({{round(($tehsil['EnrolledFemale']/ $tehsil['TotalEnrolled']) * 100, 2)}}%) </th>
                                    <th>{{$tehsil['TotalOOSC']}}</th>
                                    <th>{{$tehsil['OOSCMale']}} ({{round(($tehsil['OOSCMale']/ $tehsil['TotalOOSC']) * 100, 2)}}%)</th>
                                    <th>{{$tehsil['OOSCFemale']}} ({{round(($tehsil['OOSCFemale']/ $tehsil['TotalOOSC']) * 100, 2)}}%)</th>
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

@endforeach
<!-- State Modal  END -->
@push('scripts')
    <script>
        document.getElementById('fln-district-select').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            if (selectedOption.value !== '') {
                window.location.href = selectedOption.value;
            }
        });
        document.getElementById('fln-tehsil-select').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            if (selectedOption.value !== '') {
                window.location.href = selectedOption.value;
            }
        });
        document.getElementById('fln-markaz-select').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            if (selectedOption.value !== '') {
                window.location.href = selectedOption.value;
            }
        });
    </script>
    <!-- Include Js Files -->
    @include('partials.custom_scripts')

    @include('partials.component1.highcharts2024')
@endpush
@endsection
