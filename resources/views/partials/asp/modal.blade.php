<!-- State Modal Start -->
<div class="modal bd-example-modal-lg" id="Rawalpindi-details" tabindex="-1" role="dialog" aria-labelledby="VehariModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Rawalpindi</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-----------Filter Start------------->
                <div class="form-validation">
                    <form class="form-valide" action="#" method="post" novalidate="novalidate">
                        <div class="row">
                            <div class="col-xl-12 mb-3">
                                <div class="form-group row mb-0 district-filter">
                                    <div class="col-lg-3">
                                        <div class="dropdown bootstrap-select form-control dropup">
                                            <select class="tehsils form-control" name="tehsil">
                                                <option value="" selected="">All Tehsils</option>
                                                <option value="5">ATTOCK</option>
                                                <option value="28">FATEH JANG</option>
                                                <option value="38">HASSANABDAL</option>
                                                <option value="39">HAZRO</option>
                                                <option value="44">JAND </option>
                                                <option value="96">PINDI GHEB</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="dropdown bootstrap-select form-control dropup">
                                            <select class="markazes form-control" name="markaz">
                                                <option value="" selected="">All Marakez</option>
                                                <option value="1581">ATTOCK SADDAR - FEMALE</option>
                                                <option value="1580">ATTOCK SADDAR - MALE</option>
                                                <option value="4302">BARYAR - FEMALE</option>
                                                <option value="1587">BOLIAN WAL - FEMALE</option>
                                                <option value="1583">BOLIAN WAL - MALE</option>
                                                <option value="1585">KAMRA - FEMALE</option>
                                                <option value="1589">KAMRA - MALE</option>
                                                <option value="3122">SECONDARY-WING</option>
                                                <option value="1591">SHAKARDARA - FEMALE</option>
                                                <option value="4301">SHAKARDARA - MALE</option>
                                                <option value="4303">SURG - FEMALE</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="dropdown bootstrap-select form-control dropup">
                                            <select class="schools form-control" name="school">
                                                <option value="" selected="">All Schools</option>
                                                <option value="38784">37110045 - GES SHEEN BAGH KALAN</option>
                                                <option value="38807">37110092 - GPS ATTOCK SADAR</option>
                                                <option value="38812">37110097 - GPS (MC) CHOI WEST ATTOCK CITY</option>
                                                <option value="38813">37110098 - GPS (MC) ATTOCK NO.3</option>
                                                <option value="38835">37110129 - GPS DHOK JAWANDA</option>
                                                <option value="38836">37110131 - GES JASSIAN</option>
                                                <option value="38837">37110132 - GPS DHOK PATTA</option>
                                                <option value="38839">37110134 - GPS SARWALA</option>
                                                <option value="38842">37110137 - GPS DHOK MOCHIAN AKHORI</option>
                                                <option value="38845">37110141 - GPS DHOK NAWAZ</option>
                                                <option value="38847">37110145 - GPS BARYAR</option>
                                                <option value="38848">37110146 - GPS PINDWAL</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 emis-code-filter pr-0">
                                        <div class="dropdown bootstrap-select form-control dropup">
                                            <input type="text" value="" name="emis_code" id="emis_code" placeholder="EMIS Code" class="emis_code form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="submit" class="btn btn-primary">Apply	</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!----------- Filter End  ------------>
                <div class="row align-items-center">
                    <div class="col-xl-6 col-xxl-6 col-sm-6">
                        <figure class="highcharts-figure">
                            <div id="target_districts_total_school" style="min-width:250px; height: 250px; margin: 15 auto"></div>
                        </figure>
                    </div>
                    <div class="col-xl-6 col-xxl-6 col-sm-6">
                        <figure class="highcharts-figure">
                            <div id="target_districts_total_enrollement" style="min-width:250px; height: 250px; margin: 15 auto"></div>
                        </figure>
                    </div>
                    <div class="col-xl-6 col-xxl-6 col-sm-6">
                        <figure class="highcharts-figure">
                            <div id="target_districts_total_teachers" style="min-width:250px; height: 250px; margin: 15 auto"></div>
                        </figure>
                    </div>
                    <div class="col-xl-6 col-xxl-6 col-sm-6">
                        <figure class="highcharts-figure">
                            <div id="year_district_enrollment" style="min-width: 100%; height: 250px; margin: 15 auto">4</div>
                        </figure>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="school-info-box">
                            <h3>Government Pilot Secondary High School</h3>
                            <p><b>Address:</b> Wahdat Rd, Asif Block Allama Iqbal Town, Lahore, Punjab, Pakistan</p>
                            <p><b>Map location:</b> 33.893789,73.379889 </p>
                            <p><b>Areas served:</b> Rawalpindi and nearby areas</p>
                            <p><b>EMIS code:</b> 1234</p>
                            <p><b>Phone:</b> (051) 111 555 666</p>
                            <p><b>Hours:</b> Monday-Thursday Open 8:00am Closes 9:00pm & Friday Open 8:00am Close 9:00pm</p>
                        </div>
                    </div>
                </div>
                <!-- <div class="modal-footer">
                     <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                     <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                 </div>-->
            </div>
        </div>
    </div>
</div>
<div class="modal" id="Toba_Tek_Singh_Modal" tabindex="-1" role="dialog" aria-labelledby="TobaTekSinghModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Toba Tek Singh</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-xxl-12 col-sm-12">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Schools</th>
                                <th scope="col">Enrollment</th>
                                <th scope="col">Teachers</th>
                                <th scope="col">Trained</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>48</td>
                                <td>2210</td>
                                <td>154</td>
                                <td>154</td>
                            </tr>
                            </tbody>
                        </table>
                        <!--<div id="external-events" class="my-3">
                            <div class="gender-info-label"><img src="images/imis-images/trained.svg"> Total Trained Teachers : 2858</div>
                            <div class="gender-info-label sub-label"><i class="fa fa-male" style="color: #427ec6;"></i> 2330</div>
                            <div class="gender-info-label sub-label"><i class="fa fa-female" style="color: #f33a86;"></i> 1330</div>
                        </div>-->
                        <figure class="highcharts-figure">
                            <div id="target_districts" style="min-width: 250px; height: 250px; margin: 15 auto"></div>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- State Modal  END -->
<!-- Modal Total Schools -->
<div class="modal fade none-border" id="total-schools">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--<div class="modal-header">
                <h4 class="modal-title"><strong>Total No. of Schools</strong></h4>
            </div>-->
            <div class="modal-body">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-xxl-6 col-sm-6">
                        <div id="external-events" class="my-3">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                            <div class="external-event ui-draggable ui-draggable-handle" data-class="bg-success" style="position: relative;"><i class="fa fa-move"></i>Total Schools :3660</div>
                            <div class="external-event ui-draggable ui-draggable-handle" data-class="bg-primary" style="position: relative;"><i class="fa fa-move"></i>Male Schools :2330</div>
                            <div class="external-event ui-draggable ui-draggable-handle" data-class="bg-warning" style="position: relative;"><i class="fa fa-move"></i>Female Schools :1330</div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-xxl-6 col-sm-6">
                        <figure class="highcharts-figure">
                            <div id="container1"></div>
                        </figure>
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">
                 <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                 <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
             </div>-->
        </div>
    </div>
</div>
<!-- Modal Total Enrollment -->
<div class="modal none-border" id="total-enrollment">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--<div class="modal-header">
                <h4 class="modal-title"><strong>Total No. of Schools</strong></h4>
            </div>-->
            <div class="modal-body">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-xxl-6 col-sm-6">
                        <div id="external-events" class="my-3">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                            <div class="external-event ui-draggable ui-draggable-handle" data-class="bg-success" style="position: relative;"><i class="fa fa-move"></i>Total Enrollment :3660</div>
                            <div class="external-event ui-draggable ui-draggable-handle" data-class="bg-primary" style="position: relative;"><i class="fa fa-move"></i>Male Enrollment :2330</div>
                            <div class="external-event ui-draggable ui-draggable-handle" data-class="bg-warning" style="position: relative;"><i class="fa fa-move"></i>Female Enrollment :1330</div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-xxl-6 col-sm-6">
                        <figure class="highcharts-figure">
                            <div id="total-enrollment"></div>
                        </figure>
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">
                 <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                 <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
             </div>-->
        </div>
    </div>
</div>
<!-- Modal Total TEACHERS -->
<div class="modal fade none-border" id="total-teachers">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--<div class="modal-header">
                <h4 class="modal-title"><strong>Total No. of Schools</strong></h4>
            </div>-->
            <div class="modal-body">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-xxl-6 col-sm-6">
                        <div id="external-events" class="my-3">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                            <div class="external-event ui-draggable ui-draggable-handle" data-class="bg-success" style="position: relative;"><i class="fa fa-move"></i>Total Enrollment :3660</div>
                            <div class="external-event ui-draggable ui-draggable-handle" data-class="bg-primary" style="position: relative;"><i class="fa fa-move"></i>Male Enrollment :2330</div>
                            <div class="external-event ui-draggable ui-draggable-handle" data-class="bg-warning" style="position: relative;"><i class="fa fa-move"></i>Female Enrollment :1330</div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-xxl-6 col-sm-6">
                        <figure class="highcharts-figure">
                            <div id="total-enrollment"></div>
                        </figure>
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">
                 <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                 <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
             </div>-->
        </div>
    </div>
</div>
<!-- Modal Total Trained-->
<div class="modal fade none-border" id="total-trained">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--<div class="modal-header">
                <h4 class="modal-title"><strong>Total No. of Schools</strong></h4>
            </div>-->
            <div class="modal-body">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-xxl-6 col-sm-6">
                        <div id="external-events" class="my-3">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                            <div class="external-event ui-draggable ui-draggable-handle" data-class="bg-success" style="position: relative;"><i class="fa fa-move"></i>Total Enrollment :3660</div>
                            <div class="external-event ui-draggable ui-draggable-handle" data-class="bg-primary" style="position: relative;"><i class="fa fa-move"></i>Male Enrollment :2330</div>
                            <div class="external-event ui-draggable ui-draggable-handle" data-class="bg-warning" style="position: relative;"><i class="fa fa-move"></i>Female Enrollment :1330</div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-xxl-6 col-sm-6">
                        <figure class="highcharts-figure">
                            <div id="total-enrollment"></div>
                        </figure>
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">
                 <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                 <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
             </div>-->
        </div>
    </div>
</div>
