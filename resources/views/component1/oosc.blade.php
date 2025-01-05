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
                <div class="card">
                    <!--<div class="card-header">
                        <h4 class="card-title">Improving Access and Learning at Primary Level</h4>
                    </div>-->
                    <div class="card-body">
                        <h4>Extending the Formal Schooling to Unserved: The Case of OOSC </h4>
                        <p>Improved access and provision of quality primary education opportunities for marginalized children in remote districts through focusing on improving Foundational Literacy and Numeracy (FLN).</p>
                        <!--------Tiles bar – Component 1.2  START--------->
                        <div class="row justify-content-center">
                            <div class="col-xl-2 col-xxl-2 col-sm-2">
                                <div class="widget-stat card bg-left-line-green tiles-bar-tooltip-wrap">
                                    <div class="card-body1">
                                        <div class="media">
                                            <div class="media-body text-white">
                                                <p class="mb-1 tiles-bar-title">Total Camps</p>
                                                <h3 class="tiles-bar-value ng-binding">
                                                    {{number_format($data['total_data']['FunctionalCamps'])}}
                                                </h3>
												<h3 class="tiles-bar-value ng-binding">
													<span class="target-value-types">
														<span class="target-color ng-binding">Target <br>{{number_format(1954)}}</span>
														<span class="trained-color ng-binding">Achieved<br>{{number_format($data['total_data']['FunctionalCamps'])}}</span>
													</span>
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
                                                <p class="mb-1 tiles-bar-title">Enrollment Target</p>
                                                <h3 class="tiles-bar-value ng-binding">
                                                    {{number_format($data['total_data']['TotalEnrollment'])}}
                                                    <span class="target-value-types">
																				<span class="target-color ng-binding">Target  78,160</span>
																				<span class="trained-color ng-binding"> Achieved  {{number_format($data['total_data']['TotalEnrollment'])}}</span>
																			</span>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

                            <div class="col-xl-2 col-xxl-2 col-sm-2">
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
                            <div class="col-xl-2 col-xxl-2 col-sm-2">
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
                        </div>
                        <!--------Tiles bar – Component 1.2  END--------->
                        <!--------MAP – Component 1.1  START--------->
                        <!-- row -->
                        <div class="row">

                            <div class="col-xl-6 col-xxl-6 col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <div id="external-events" class="districts-asp my-3">
                                            <div class="external-event ui-draggable ui-draggable-handle districts-asp-label" data-class="bg-aps" style="position: relative;"><i class="fa fa-move"></i>Intervention districts of punjab</div>
                                        </div>
                                        <div id="external-events" class="districts-asp my-3">
                                            <!--<div class="external-event ui-draggable ui-draggable-handle districts-asp-label" data-class="bg-notaps" style="position: relative;"><i class="fa fa-move"></i>22 Pilot Districts With No. ASP Schools</div>-->
                                        </div>
                                    </div>
                                    <div class="card-body">

                                        <!-------------SVG MAP PUNJAB START-------------->
                                        <div class="punjab-map">
                                            <svg id="map" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="840 350 650 800" style="display: inline;">

                                                <g class="model-green" id="Punjab" fill="#ffffd0" stroke="#d0c0a0" transform="translate(-27.1,-28.1)">

                                                    <a id="state_Vehari" class="state" xlink:href="" href="javascript:void()" data-target="#Vehari-Modal" data-toggle="modal">
                                                        <path id="Vehari" class="shape" d="m 1123.8,847.1 3.6,2.6 7.6,-1.2 27.6,33 6,-0.4 8,-25.2 17.2,-5.6 12.6,3.8 15.4,-13.8 12.6,-0.8 3,-28 -8.6,-12.4 -35.6,22.8 -6.8,-6.4 -18.2,7.2 -6.6,11.2 -13.2,-5.4 -9.8,11.8 -11.4,1 z" />
                                                    </a>

                                                    <a id="state_Toba_Tek_Singh" class="state" xlink:href="" href="javascript:void()" data-target="#Toba_Tek_Singh_Modal" data-toggle="modal">
                                                        <path id="Toba_Tek_Singh" class="shape" d="m 1219.8,762.3 -7.2,-3.4 2,-9.4 -5,-7.6 10,-12.8 -3.4,-8.4 9.4,-19.8 -4.8,-6.2 -16.2,10.8 -18.2,2.4 -23.2,36.8 8.4,12.8 -12.2,4.8 -5.2,13.8 40.8,-2 19.6,0.4 z" />
                                                    </a>

                                                    <a id="state_Sialkot" class="state" xlink:href="" href="#Sialkot-details" data-toggle="modal">
                                                        <path id="Sialkot" class="shape" d="m 1381.6,541.9 3,-20.8 8.4,9.2 16.6,-11.4 -4.8,14 -1.6,14.4 6.4,12.4 12,-1.2 8,2.8 -6.8,9.2 -4,9.2 -8.6,8.4 1.4,8.4 -8.4,3 -3.4,8.2 -5.8,0.4 -6.8,-8.8 -9,-2.2 -11.6,-9.6 -3.8,-13.8 -3.8,-6.4 0,-11.4 13.2,-2.8 z" />
                                                    </a>

                                                    <a id="state_Shaikhupura" class="state" xlink:href="" href="#Shaikhupura-details" data-toggle="modal">
                                                        <path id="Shaikhupura" class="shape" d="m 1368,660.3 -7.4,19.4 -9.8,10.6 -4.4,0.6 -1,-8.2 -6.6,-0.2 -0.8,-7 -22.6,-9.8 -2.8,-31.4 9.8,-10.2 8.2,-1 -2.4,11.2 25,-1.8 3.4,5.2 4.2,-6.6 18,-2.6 16,-15 -0.8,-5.4 5.8,-0.4 3.4,8 7.6,4.6 -19.4,22.8 -5.2,14.6 z" />
                                                    </a>

                                                    <a id="state_Sargodha" class="state" xlink:href="" href="#Sargodha-details" data-toggle="modal">
                                                        <path id="Sargodha" class="shape" d="m 1221.4,636.9 11.4,-14.8 23.2,9.2 12.2,-22.2 -5.2,-14.2 -8.4,-1.4 -8.4,-10.2 3.4,-6.4 -6.2,-4.8 17.2,-9.6 0,-7.6 -60.6,15 -27.8,23 -11.6,53 13.4,4.4 -12.4,15.8 21.2,-10.6 10.8,-10.8 z" />
                                                    </a>

                                                    <a id="state_Sahiwal" class="state" xlink:href="" href="#Sahiwal-details" data-toggle="modal">
                                                        <path id="Sahiwal" class="shape" d="m 1266.6,781.3 9.8,3.8 -0.8,-16.6 2.6,-8.6 -7,-5.4 -4.8,-12.6 -38.6,22.8 -8,-2.4 -5.2,12.2 -19.6,-0.4 -6.8,21.4 -1.8,20 6.8,6.4 35.6,-22.8 19.4,-2 z" />
                                                    </a>

                                                    <a id="state_Rawalpindi" class="state" xlink:href="" href="#Rawalpindi-details" data-toggle="modal">
                                                        <path id="Rawalpindi" class="shape" d="m 1278,390.2 13.2,-6 8.6,35.9 -3,8.6 6.2,11.2 -6.2,17.8 6.6,17.8 -17.6,8.4 -9.8,-2.2 -3.2,11 -18.2,3.8 -11.8,3.2 -13.8,-11.2 -30,-7.6 8.8,-18.2 17.6,-11.6 -7.8,-18.2 -9,-2.8 3.6,-6.6 -8.2,-9.6 5.8,-5.2 3.8,3.2 12,-3 -5.2,4.8 10.8,4.2 -11.8,3.6 6.4,13.8 18,-8.8 6.8,10.2 -3.8,3 6,4.8 11.2,-7.2 1.6,-9 7.8,-7.8 -3.2,-4.2 -2.8,0.2 -10.6,-7.8 16.6,-9.2 z" />
                                                    </a>

                                                    <a id="state_Rajanpur" class="nav-link state" href="#Rajanpur-details" data-toggle="modal">
                                                        <path id="Rajanpur" class="shape" d="m 972.2,870.9 -17.8,-3.2 -10.4,21 3.4,27.4 -13,26.6 -9.2,10.8 1.6,20.4 -14.4,23.2 -6.6,1 5.8,23.4 36.8,-15.2 0,-19.6 14.4,2.8 17.4,-10.2 -4.4,-12.2 15.8,-2.8 7.4,-23.8 -5,-6.8 15,-30.8 1.6,-23.4 -11.6,-8.6 -14.6,18.2 z" />
                                                    </a>

                                                    <a id="state_Rahimyar_Khan" class="state" xlink:href="" href="#RAHIM-YAR-KHAN-details" data-toggle="modal">
                                                        <path id="Rahimyar_Khan" class="shape" d="m 1020.4,944.3 -3,11.8 -25.8,8.2 -15.8,2.8 4.4,12.2 -17.4,10.2 -14.4,-2.8 0,19.6 -36.8,15.2 11.6,16.8 6.2,24.6 13,17.8 18,8.4 16,-14.4 19.6,-1.2 11,12 3.2,13.2 5.4,9.6 12.8,1.2 35.8,-16.4 -27.2,-89.8 11,-53.8 -8.4,4 -5.4,-18.6 z" />
                                                    </a>

                                                    <a id="state_Pakpattan" class="state" xlink:href="" href="#Pakpattan-details" data-toggle="modal">
                                                        <path id="Pakpattan" class="shape" d="m 1266.6,781.3 -18.4,15.8 -19.4,2 8.6,12.4 -3,28 10.8,4.4 4.6,-8 30.2,-10 26.2,-18.4 -1,-20.6 -18.2,-11.8 -10.6,10 z" />
                                                    </a>

                                                    <a id="state_Okara" class="state" xlink:href="" href="#Okara-details" data-toggle="modal">
                                                        <path id="Okara" class="shape" d="m 1278.2,759.9 -2.6,8.6 0.8,16.6 10.6,-10 18.2,11.8 1,20.6 21.2,-3.4 5.6,-11.2 10.8,-8.8 3.8,1.6 2.2,-10 13.2,-12.8 -14,-3.8 -10.8,-9.6 -12.6,-1.8 -17.8,-21.2 0,-10.8 -16.8,6 -12.4,11.8 -4.4,-0.4 -7.8,8.8 4.8,12.6 z" />
                                                    </a>

                                                    <a id="state_Narowal" class="state" xlink:href="" href="#Narowal-details" data-toggle="modal">
                                                        <path id="Narowal" class="shape" d="m 1422.8,570.5 6.8,-9.2 7.4,2.8 7.8,-5.2 7.8,8.2 6,-0.4 12.4,9.2 7,9.6 -14.8,20.4 -2.2,-4 -21.4,10.4 -6.6,-3.6 -13,13 -9.2,-1.4 -7.6,-4.6 -3.4,-8 3.4,-8.2 8.4,-3 -1.4,-8.4 8.6,-8.4 z" />
                                                    </a>

                                                    <a id="state_Nankana_Sahab" class="state" xlink:href="" href="#Nankana-Sahab-details" data-toggle="modal">
                                                        <path id="Nankana_Sahab" class="shape" d="m 1285,665.1 8,20.8 8.6,-3.8 8.6,8.8 -4,10.2 -20.8,13.8 -10,9.6 -1.2,8.6 4.4,0.4 12.4,-11.8 16.8,-6 9.2,-5.4 12,-3 5.4,-5.6 9.6,-2.4 2.4,-8.4 -1,-8.2 -6.6,-0.2 -0.8,-7 -22.6,-9.8 -2.8,-31.4 -13.2,1.8 -8.6,6.2 -22.4,7.8 z" />
                                                    </a>

                                                    <a id="state_Muzaffargarh" class="state" xlink:href="" href="#MUZAFFARGARH-details" data-toggle="modal">
                                                        <path id="Muzaffargarh" class="shape" d="m 1010.6,879.5 -1.6,23.4 -15,30.8 5,6.8 -7.4,23.8 25.8,-8.2 3,-11.8 13.8,-9.4 13.8,-25 0.8,-24.8 13.4,-6.6 -1.6,-27 30,-54 -6.4,-2 8.6,-17.4 -33.4,-21 -7,12.8 -32.6,1.6 3.8,25 -4,24.4 6.4,33 z" />
                                                    </a>

                                                    <a id="state_Multan" class="state" xlink:href="" href="#Multan-details" data-toggle="modal">
                                                        <path id="Multan" class="shape" d="m 1067.6,904.3 12.8,6.4 5.4,-41.2 21.8,-25.6 16.6,-27.6 -33.6,-18.8 -30,54 1.6,27 -13.4,6.6 -0.8,24.8 z" />
                                                    </a>

                                                    <a id="state_Mianwali" class="state" xlink:href="" href="#MIANWALI-details" data-toggle="modal">
                                                        <path id="Mianwali" class="shape" d="m 1127,556.1 -11.6,10.4 4,7.6 -9.2,12.8 1,10.8 -58.8,1 11,-21.8 10,-3.8 0.6,-18.8 -9.6,3.6 0.2,-10.6 -7.6,0 -6.4,-19 3.6,-19.6 12.8,-8 15.2,-1.6 2.2,-7.4 -6.2,-18.4 18.4,2.2 4.8,12.6 10.8,4.6 -3.6,12.8 10.8,-2.2 12,19.8 -6.8,9.8 z" />
                                                    </a>

                                                    <a id="state_Mandi_Bahauddin" class="state" xlink:href="" href="#Mandi-Bahauddin-details" data-toggle="modal">
                                                        <path id="Mandi_Bahauddin" class="shape" d="m 1293.2,588.5 -9.6,13.2 -15.4,7.4 -5.2,-14.2 -8.4,-1.4 -8.4,-10.2 3.4,-6.4 -6.2,-4.8 17.2,-9.6 0,-7.6 9.2,-4.2 5.4,3 20,-12.8 3.4,-5.8 29.2,36 -17.6,9.6 z" />
                                                    </a>

                                                    <a id="state_Lodhran" class="state" xlink:href="" href="#Lodhran-details" data-toggle="modal">
                                                        <path id="Lodhran" class="shape" d="m 1094.4,913.5 68.2,-32 -27.6,-33 -7.6,1.2 -3.6,-2.6 -16.2,-3.2 -21.8,25.6 -5.4,41.2 z" />
                                                    </a>

                                                    <a id="state_Layyah" class="state" xlink:href="" href="#Layyah-details" data-toggle="modal">
                                                        <path id="Layyah" class="shape" d="m 1120.6,739.5 -4.6,-28.6 -19.2,-8.2 -10.2,10.4 -14,1 -13.4,-21.6 -35.2,-7.6 -7.6,14.4 2.4,46.8 -4.2,9.2 5.2,16.2 32.6,-1.6 7,-12.8 33.4,21 3.6,6 6,-14 z" />
                                                    </a>

                                                    <a id="state_Lahore" class="nav-link active show state" href="#Lahore-details" data-tabName="Lahore-details" data-toggle="modal">
                                                        <path id="Lahore" class="shape" d="m 1346.4,690.9 4.4,-0.6 9.8,-10.6 7.4,-19.4 18.2,-2.6 5.2,-14.6 12.4,34 -9,19.6 -8.2,-2 -2.6,4.6 -18.2,6 -21.8,-6 z" />
                                                    </a>

                                                    <a id="state_Khushab" class="state" xlink:href="" href="#Khushab-details" data-toggle="modal">
                                                        <path id="Khushab" class="shape" d="m 1172.2,592.9 27.8,-23 -2,-15 -11.2,-13.2 -11.2,6.6 -24.6,-11.6 -4,8.4 -20,11 -11.6,10.4 4,7.6 -9.2,12.8 1,10.8 1.6,16 -14.6,19.8 13.2,21.2 24.6,18 16.8,-22.6 7.8,-4.2 z" />
                                                    </a>

                                                    <a id="state_Khanewal" class="state" xlink:href="" href="#Khanewal-details" data-toggle="modal">
                                                        <path id="Khanewal" class="shape" d="m 1107.6,843.9 16.2,3.2 3.4,-5.8 11.4,-1 9.8,-11.8 13.2,5.4 6.6,-11.2 18.2,-7.2 1.8,-20 6.8,-21.4 -40.8,2 5.2,-13.8 -43.6,13.8 -13.4,-6 -6,14 -3.6,-6 -8.6,17.4 6.4,2 33.6,18.8 z" />
                                                    </a>

                                                    <a id="state_Kasur" class="state" xlink:href="" href="#Kasur-details" data-toggle="modal">
                                                        <path id="Kasur" class="shape" d="m 1344,699.3 21.8,6 18.2,-6 2.6,-4.6 8.2,2 -0.4,18.6 11.8,3 2.4,4.8 -4.8,5 -8.6,-4.8 -0.6,8.2 -18.2,12.2 -13.4,19.2 -14,-3.8 -10.8,-9.6 -12.6,-1.8 -17.8,-21.2 0,-10.8 9.2,-5.4 12,-3 5.4,-5.6 z" />
                                                    </a>

                                                    <a id="state_Jhelum" class="state" xlink:href="" href="#Jhelum-details" data-toggle="modal">
                                                        <path id="Jhelum" class="shape" d="m 1252.8,539.3 10.2,-0.4 -4,-7.6 -10.2,-1.4 -1.2,-7 8.4,-10 -1.4,-16.4 18.2,-3.8 3.2,-11 9.8,2.2 17.6,-8.4 2.6,7 -3.2,7.2 17.6,9.8 -1,6.4 -19.2,20.8 -1.6,8.4 -3.4,5.8 -20,12.8 -5.4,-3 -9.2,4.2 -60.6,15 -2,-15 7,-4.2 3,5 5.8,-8 25,-4.8 5.4,1.4 z" />
                                                    </a>

                                                    <a id="state_Jhang" class="state" xlink:href="" href="#Jhang-details" data-toggle="modal">
                                                        <path id="Jhang" class="shape" d="m 1159.4,762.3 12.2,-4.8 -8.4,-12.8 23.2,-36.8 18.2,-2.4 16.2,-10.8 -1.2,-5.8 -8.8,4 -22.4,-14.8 -5.6,-22.6 -21.2,10.6 12.4,-15.8 -13.4,-4.4 -7.8,4.2 -16.8,22.6 -0.4,30 -10.6,-1.8 -9,10 4.6,28.6 -18.2,30.6 13.4,6 z" />
                                                    </a>

                                                    <a id="state_Hafizabad" class="state" xlink:href="" href="#Hafizabad-details" data-toggle="modal">
                                                        <path id="Hafizabad" class="shape" d="m 1290.8,642.3 -22.4,7.8 -8,-6.6 -4.4,-12.2 12.2,-22.2 15.4,-7.4 9.6,-13.2 17,-7.8 4.2,13.2 7.8,9.4 3.6,12 -3.4,8.8 -9.8,10.2 -13.2,1.8 z" />
                                                    </a>

                                                    <a id="state_Gujranwala" class="state" xlink:href="" href="#Gujranwala-details" data-toggle="modal">
                                                        <path id="Gujranwala" class="shape" d="m 1359,567.3 3.8,6.4 3.8,13.8 11.6,9.6 9,2.2 6.8,8.8 0.8,5.4 -16,15 -18,2.6 -4.2,6.6 -3.4,-5.2 -25,1.8 2.4,-11.2 -8.2,1 3.4,-8.8 -3.6,-12 -7.8,-9.4 -4.2,-13.2 17.6,-9.6 11,0.6 20.2,-15.8 z" />
                                                    </a>

                                                    <a id="state_Gujrat" class="state" xlink:href="" href="#Gujrat-details" data-toggle="modal">
                                                        <path id="Gujrat" class="shape" d="m 1327.8,571.1 -29.2,-36 1.6,-8.4 19.2,-20.8 1,-6.4 11.6,-3 9,10 30.8,15 12.8,-0.4 -3,20.8 -9.4,11.2 -13.2,2.8 -20.2,15.8 z" />
                                                    </a>

                                                    <a id="state_Faisalabad" class="state" xlink:href="" href="#Faisalabad-details" data-toggle="modal">
                                                        <path id="Faisalabad" class="shape" d="m 1216.2,720.7 3.4,8.4 -10,12.8 5,7.6 -2,9.4 7.2,3.4 8,2.4 38.6,-22.8 7.8,-8.8 1.2,-8.6 10,-9.6 20.8,-13.8 4,-10.2 -8.6,-8.8 -8.6,3.8 -8,-20.8 -16.6,-15 -8,-6.6 -40.8,45.4 1.2,5.8 4.8,6.2 z" />
                                                    </a>

                                                    <a id="state_Dera_Ghazi_Khan" class="state" xlink:href="" href="#DERA-GHAZI-KHAN-details" data-toggle="modal">
                                                        <path id="Dera_Ghazi_Khan" class="shape" d="m 979,705.5 -13.4,6.4 0.6,10 -3,0.4 -1.2,23.4 2.2,6.2 -6.2,0.8 -12,13.2 1,9.2 -10.6,20.8 -4.2,17.4 3.6,7 9.6,-3.8 -7.6,15.2 -8.2,23.8 -15.6,22.8 -13.4,5.4 -4.2,26.8 10.6,3.4 -2.2,7 4.8,6.6 5.4,-3 -4.6,24 -21,21.8 3.8,10.8 -8.6,20.2 -11.2,6.4 5,12 9.6,-4.4 23.6,6.2 -5.8,-23.4 6.6,-1 14.4,-23.2 -1.6,-20.4 9.2,-10.8 13,-26.6 -3.4,-27.4 10.4,-21 17.8,3.2 12.2,18.2 14.6,-18.2 11.6,8.6 15.4,-25.6 -6.4,-33 4,-24.4 -3.8,-25 -5.2,-16.2 4.2,-9.2 -2.4,-46.8 -7.2,-6 -13.6,-1.6 z" />
                                                    </a>

                                                    <a id="state_Chiniot" class="state" xlink:href="" href="#Chiniot-details" data-toggle="modal">
                                                        <path id="Chiniot" class="shape" d="m 1221.4,636.9 -27.8,7.8 -10.8,10.8 5.6,22.6 22.4,14.8 8.8,-4 40.8,-45.4 -4.4,-12.2 -23.2,-9.2 z" />
                                                    </a>

                                                    <a id="state_Chakwal" class="state" xlink:href="" href="#Chakwal-details" data-toggle="modal">
                                                        <path id="Chakwal" class="shape" d="m 1184.2,490.5 -23.2,2 -5.2,-4 -6.4,5.6 -7.2,-2.6 -22.8,11.8 12,19.8 -6.8,9.8 2.4,23.2 20,-11 4,-8.4 24.6,11.6 11.2,-6.6 11.2,13.2 7,-4.2 3,5 5.8,-8 25,-4.8 5.4,1.4 8.6,-5 10.2,-0.4 -4,-7.6 -10.2,-1.4 -1.2,-7 8.4,-10 -1.4,-16.4 -11.8,3.2 -13.8,-11.2 -30,-7.6 -6.6,-1.6 z" />
                                                    </a>

                                                    <a id="state_Bhakkar" class="state" xlink:href="" href="#Bhakkar-details" data-toggle="modal">
                                                        <path id="Bhakkar" class="shape" d="m 1135.6,702.7 0.4,-30 -24.6,-18 -13.2,-21.2 14.6,-19.8 -1.6,-16 -58.8,1 -9.8,30.6 -15.8,23.2 -4.4,16.6 6,1 -4.4,14.8 35.2,7.6 13.4,21.6 14,-1 10.2,-10.4 19.2,8.2 9,-10 z" />
                                                    </a>

                                                    <a id="state_Bahawalpur" class="state" xlink:href="" href="#BAHAWALPUR-details" data-toggle="modal">
                                                        <path id="Bahawalpur" class="shape" d="m 1168.6,881.1 -6,0.4 -68.2,32 -14,-2.8 -12.8,-6.4 -19.6,5.6 -13.8,25 5.4,18.6 8.4,-4 -11,53.8 27.2,89.8 50.2,-7 15.4,-6.2 2.2,-17.4 26.2,-28 11.8,-35.2 9.4,-12.8 20.8,-11.6 -8,-25.8 -12.6,0 -3.6,-12.6 6,-5.8 39.8,0 4.2,-13.8 -12,-7 8.4,-27.2 -15.8,-17 -0.2,-11.6 -12.6,-3.8 -17.2,5.6 z" />
                                                    </a>

                                                    <a id="state_Bahawalnagar" class="state" xlink:href="" href="#Bahawalnagar-details" data-toggle="modal">
                                                        <path id="Bahawalnagar" class="shape" d="m 1280,825.9 -30.2,10 -4.6,8 -10.8,-4.4 -12.6,0.8 -15.4,13.8 0.2,11.6 15.8,17 -8.4,27.2 12,7 -4.2,13.8 -39.8,0 -6,5.8 3.6,12.6 12.6,0 8,25.8 34.6,-19.6 30.8,-55.2 13.8,-47.4 40.8,-15.2 16.2,-13.8 -2.2,-13.2 -6.8,-6.4 -21.2,3.4 z" />
                                                    </a>

                                                    <a id="state_Attock" class="state" xlink:href="" href="#Attock-details" data-toggle="modal">
                                                        <path id="Attock" class="shape" d="m 1207.8,462.7 -8.8,18.2 -6.6,-1.6 -8.2,11.2 -23.2,2 -5.2,-4 -6.4,5.6 -7.2,-2.6 -22.8,11.8 -10.8,2.2 3.6,-12.8 4.2,-12.8 -5.6,-10.4 2.4,-9.4 14,-6.4 9.2,-14 7.8,-25.2 21,-2.2 0,-18.7 20.4,-9.4 17.2,9.4 -2.6,5.4 7.2,2.5 7,-7.3 8.6,5.8 2.6,8.9 -12,3 -3.8,-3.2 -5.8,5.2 8.2,9.6 -3.6,6.6 9,2.8 7.8,18.2 z" />
                                                    </a>

                                                    <path id="Punjab_Border" fill="none" stroke="#a08070" d="m 1303,439.9 -6.2,-11.2 3,-8.6 -8.6,-35.9 -13.2,6 -4.6,9.3 -16.6,9.2 10.6,7.8 2.8,-0.2 3.2,4.2 -7.8,7.8 -1.6,9 -11.2,7.2 -6,-4.8 3.8,-3 -6.8,-10.2 -18,8.8 -6.4,-13.8 11.8,-3.6 -10.8,-4.2 5.2,-4.8 -2.6,-8.9 -8.6,-5.8 -7,7.3 -7.2,-2.5 2.6,-5.4 -17.2,-9.4 -20.4,9.4 0,18.7 -21,2.2 -7.8,25.2 -9.2,14 -14,6.4 -2.4,9.4 5.6,10.4 -4.2,12.8 -10.8,-4.6 -4.8,-12.6 -18.4,-2.2 6.2,18.4 -2.2,7.4 -15.2,1.6 -12.8,8 -3.6,19.6 6.4,19 7.6,0 -0.2,10.6 9.6,-3.6 -0.6,18.8 -10,3.8 -11,21.8 -9.8,30.6 -15.8,23.2 -4.4,16.6 6,1 -4.4,14.8 -7.6,14.4 -7.2,-6 -13.6,-1.6 -16.6,13.8 -13.4,6.4 0.6,10 -3,0.4 -1.2,23.4 2.2,6.2 -6.2,0.8 -12,13.2 1,9.2 -10.6,20.8 -4.2,17.4 3.6,7 9.6,-3.8 -7.6,15.2 -8.2,23.8 -15.6,22.8 -13.4,5.4 -4.2,26.8 10.6,3.4 -2.2,7 4.8,6.6 5.4,-3 -4.6,24 -21,21.8 3.8,10.8 -8.6,20.2 -11.2,6.4 5,12 9.6,-4.4 23.6,6.2 11.6,16.8 6.2,24.6 13,17.8 18,8.4 16,-14.4 19.6,-1.2 11,12 3.2,13.2 5.4,9.6 12.8,1.2 35.8,-16.4 50.2,-7 15.4,-6.2 2.2,-17.4 26.2,-28 11.8,-35.2 9.4,-12.8 20.8,-11.6 34.6,-19.6 30.8,-55.2 13.8,-47.4 40.8,-15.2 16.2,-13.8 -2.2,-13.2 -6.8,-6.4 5.6,-11.2 10.8,-8.8 3.8,1.6 2.2,-10 13.2,-12.8 13.4,-19.2 18.2,-12.2 0.6,-8.2 8.6,4.8 4.8,-5 -2.4,-4.8 -11.8,-3 0.4,-18.6 9,-19.6 -12.4,-34 19.4,-22.8 9.2,1.4 13,-13 6.6,3.6 21.4,-10.4 2.2,4 14.8,-20.4 -7,-9.6 -12.4,-9.2 -6,0.4 -7.8,-8.2 -7.8,5.2 -7.4,-2.8 -8,-2.8 -12,1.2 -6.4,-12.4 1.6,-14.4 4.8,-14 -16.6,11.4 -8.4,-9.2 -12.8,0.4 -30.8,-15 -9,-10 -11.6,3 -17.6,-9.8 3.2,-7.2 -2.6,-7 -6.6,-17.8 z" />
                                                </g>

                                                <g id="Labels" font-size="10" font-family="DejaVu Sans" transform="translate(-27.1,-28.1)">
                                                    <text y="974.3457" x="1085.092">BAHAWALPUR</text>
                                                    <text y="904.82227" x="1151.7288">BAHAWALNAGAR •</text>
                                                    <text y="955.50684" x="937.28442">RAJANPUR</text>
                                                    <text y="792.50684" x="977.92017">• DERA GHAZI KHAN</text>
                                                    <text y="852.76074" x="1079.0706">• MULTAN</text>
                                                    <text y="788.75977" x="1204.928">SAHIWAL</text>
                                                    <text y="800.25977" x="1117.8713">KHANEWAL</text>
                                                    <text y="766.84277" x="1294.844">OKARA</text>
                                                    <text y="706.75879" x="1230.5881">FAISALABAD</text>
                                                    <text y="679.79395" x="1231.2582">NAKANA SAHAB •</text>
                                                    <text y="654.79297" x="1343.3733">• SHAIKHUPURA</text>
                                                    <text y="599.49219" x="1275.1819">GUJRANWALA •</text>
                                                    <text y="538.46094" x="1322.6311">GUJRAT</text>
                                                    <text y="575.12598" x="1370.1799">SIALKOT</text>
                                                    <text y="592.45996" x="1417.3508">NAROWAL</text>
                                                    <text y="623.12598" x="1265.9055">HAFIZABAD</text>
                                                    <text y="573.46289" x="1190.178">MANDI BAHAUDDIN •</text>
                                                    <text y="680.88281" x="1377.5959">• LAHORE</text>
                                                    <text y="730.09277" x="1337.5393">KASUR</text>
                                                    <text y="699.42773" x="1149.1526">JHANG</text>
                                                    <text y="658.76172" x="1200.8772">CHINIOT</text>
                                                    <text y="610.76172" x="1186.8147">SARGODHA</text>
                                                    <text y="751.4082" x="1106.1428">TOBA TEK SINGH •</text>
                                                    <text y="882.09375" x="1092.3186">LODHRAN</text>
                                                    <text y="844.75977" x="1166.1506">VEHARI</text>
                                                    <text y="810.75977" x="1239.0375">PAKPATTAN</text>
                                                    <text y="842.42773" x="959.29517">MUZAFFARGARH •</text>
                                                    <text y="739.42773" x="1047.0354">LAYYAH</text>
                                                    <text y="666.09375" x="1050.2034">BHAKKAR</text>
                                                    <text y="603.42676" x="1116.595">KHUSHAB</text>
                                                    <text y="526.76062" x="1064.0432">MIANWALI</text>
                                                    <text y="520.09375" x="1166.0393">CHAKWAL</text>
                                                    <text y="463.59277" x="1145.1545">ATTOCK</text>
                                                    <text y="470.09277" x="1224.9846">RAWALPINDI</text>
                                                    <text y="512.76172" x="1264.0969">JHELUM</text>
                                                    <text y="1034.8398" x="944.83813">RAHIM YAR KHAN</text>
                                                </g>
                                            </svg>
                                        </div>
                                        <!-------------SVG MAP PUNJAB END -------------->
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div id="learning_camps_established" style="height:330px; min-width: 100%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div id="enrollment_range_graph" style="height:290px; min-width: 100%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- row END -->
                        <!-- row -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div id="district_wise_enrolment_OOSC" style="height:225px; min-width: 100%; height: auto; margin: 15px auto"></div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- row END -->
                        <div class="row">

                            <div class="col-sm-12">
                                <div class="card">
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
                                    <div class="card-body">
                                        <div id="Assessment_Enrolled" style="height:225px; min-width: 100%; height: auto; margin: 15px auto"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div id="Assessment_OOSC" style="height:225px; min-width: 100%; height: auto; margin: 15px auto"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    <!-- Include Js Files -->
    @include('partials.component1.highcharts2')
@endpush
@endsection
