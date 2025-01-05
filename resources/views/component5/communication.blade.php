@extends('layouts.master')

@section('title', 'Communication')

@section('content')

 <!-- Datatable -->
 <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
<style>
        path#Kasur,path#Layyah,path#Muzaffargarh,path#Mianwali,path#Jhelum,path#Bhakkar,path#Khushab,path#Hafizabad,path#Chiniot,path#Shaikhupura,path#Jhang,path#Nankana_Sahab,path#Okara,path#Pakpattan,path#Vehari,path#Lodhran,path#Bahawalnagar,path#Bahawalpur,path#Rahimyar_Khan,path#Rajanpur,path#Dera_Ghazi_Khan,path#Attock,path#Rawalpindi, path#Chakwal, path#Gujrat, path#Mandi_Bahauddin, path#Sargodha, path#Sialkot, path#Gujranwala, path#Narowal, path#Lahore, path#Faisalabad, path#Toba_Tek_Singh, path#Sahiwal, path#Khanewal, path#Multan {
            fill: #5d9649 !important;
        }

        path#Kasur:hover,path#Layyah:hover,path#Muzaffargarh:hover,path#Mianwali:hover,path#Jhelum:hover,path#Bhakkar:hover,path#Khushab:hover,path#Hafizabad:hover,path#Chiniot:hover,path#Shaikhupura:hover,path#Jhang:hover,path#Nankana_Sahab:hover,path#Okara:hover,path#Pakpattan:hover,path#Vehari:hover,path#Lodhran:hover,path#Bahawalnagar:hover,path#Bahawalpur:hover,path#Rahimyar_Khan:hover,path#Rajanpur:hover,path#Dera_Ghazi_Khan:hover,path#Attock:hover,path#Rawalpindi:hover, path#Chakwal:hover, path#Gujrat:hover, path#Mandi_Bahauddin:hover, path#Sargodha:hover, path#Sialkot:hover, path#Gujranwala:hover, path#Narowal:hover, path#Lahore:hover, path#Faisalabad:hover, path#Toba_Tek_Singh:hover, path#Sahiwal:hover, path#Khanewal:hover, path#Multan:hover {
            fill: #cddc39 !important;
        }
        .all-district-data-table tr th {
            color: #ffffff;
            background: #f5d26f;
            font-weight: 300;
            font-size: 12px;
            text-align: center;
        }
        .all-district-data-table td {
            font-size: 14px;
            text-align: center;
        }
    </style>
<script>
    jQuery(function ($) {
    //< !--fund_allocation chart  chart start here-- >
    $('#districts_enrollement').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: '',
            align: 'left'
        },
        xAxis: {
            categories: ['LAYYAH','HAFIZABAD','GUJRANWALA','KHANEWAL','SAHIWAL','OKARA','KASUR','NANKANA SAHIB','NAROWAL','SHEIKHUPURA','CHINIOT','SARGODHA','VEHARI','RAJANPUR','BAHAWALNAGAR','BAHAWALPUR','KHUSHAB','MUZAFFARGARH','JHELUM','MULTAN','SIALKOT','MIANWALI','ATTOCK','FAISALABAD','BHAKKAR','LODHRAN','GUJRAT','D.G. KHAN','PAKPATTAN','RAWALPINDI','T.T.SINGH','MANDI BAHA UD DIN','RAHIMYAR KHAN','LAHORE','JHANG','CHAKWAL'],
            crosshair: true
        },
        yAxis: {
            /*min: 0,
            max: 10000,
            tickInterval: 150,*/
            title: {
                text: 'Total'
            }
        },
        tooltip: {
            headerFormat: '{point.key}<table><br>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} Total</b></td></tr>',
            footerFormat: '</table>'
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Baseline (Census 2022-23)',
            data: [284316,151719, 429025, 393377 , 341665 , 368565 , 401149 , 177664 , 230196 , 335996 , 180220 , 471921 , 324143 , 181456 , 388500 , 296402 , 160358 , 367116 , 162223 , 346556 , 397209 , 231907 , 252703 , 842748 , 233484 , 152944 , 339090 , 296344 , 221053 , 394530 , 341064 , 210061 , 565706 , 636957 , 358106 , 179168]



            ,
            color: "#459c48"

        }, {
            name: 'Current (SIS)',
            data: [298755, 157892,  445531, 409513, 356580, 383524, 415751, 183106, 233214, 349587, 185909, 485693, 337758,  201912,  404547, 322809, 166658, 393408,  164300,  369344,  404355,  237450,  257484 , 863812,  240614, 163081,  342145 , 312345 , 227614 , 402902 , 345216 , 212655 , 586311 , 651224 , 359963, 175056],
            color: "#f1cf23"

        }]
    });
    /******************District Class Enrollment END******************* */
	//< !--fund_allocation chart  chart start here-- >
    $('#districts_enrollement-total').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: '',
            align: 'left'
        },
        xAxis: {
            categories: ['Campaign Status'],
            crosshair: true
        },
        yAxis: {
            /*min: 0,
            max: 10000,
            tickInterval: 150,*/
            title: {
                text: 'Total'
            }
        },
        tooltip: {
            headerFormat: '{point.key}<table><br>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} Total</b></td></tr>',
            footerFormat: '</table>'
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Baseline (Census 2022-23)',
            data: [11646616]



            ,
            color: "#459c48"

        }, {
            name: 'Current (SIS)',
            data: [11880247],
            color: "#f1cf23"

        }]
    });
    /******************District Class Enrollment END******************* */
});

</script>
 <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				<!--------Filter  bar START--------->
{{--				<div class="row filter-label-row  justify-content-end">--}}
{{--					<div class="col-sm-12 col-md-3">--}}
{{--						<div class="mb-3">--}}
{{--							<label>Year Wise Report</label>--}}
{{--							<select class="form-select" id="report-type-select">--}}
{{--								<option>Year 1</option>--}}
{{--								<option>Year 2</option>--}}
{{--								<option>Year 3</option>--}}
{{--								<option>Year 4</option>--}}
{{--								<option>Year 5</option>--}}
{{--							</select>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</div>--}}
                <!-----row  End----->

				<div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mx-0">
                                    <div class="col-sm-8  mb-3">
                                        <div class="welcome-text">
                                            <h4>Changing Mindset Through Effective Communication </h4>
                                            <p style="text-align: justify;">The Component 5 of the TALEEM Programme, titled "Changing Behavior Through Effective Communication" focuses on communication and advocacy activities to improve demand and awareness for quality public education, leading to more children in school, staying longer and learning more.
Under the said component, project specific messages are transmitted to target audience through print, electronic and social media. Furthermore, strong communication campaigns are launched to promote field activities, outreach interventions and social mobilization events.
By employing these communication strategies, Component 5 seeks to bring about a positive change in behavior, encouraging communities to prioritize education and actively participate in initiatives that promote quality public education. Through effective communication, the TALEEM Programme aims to create a supportive environment for education, fostering a community that values and invests in the educational development of its members.</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4  mb-3">
                                        <div class="welcome-text">
                                            <img src="{{ asset('images/imis-images/Component-5-img.jpg') }}" style="width: 100%;height: auto;">
                                        </div>
                                    </div>
                                </div>
                                <!--------Tiles bar – Component 1.1  START--------->
                                <!-- row -->
                                <div class="row">
                                    <div class="col-xl-2 col-xxl-2 col-sm-2">
                                        <div class="widget-stat card bg-left-line-green">
                                            <div class="card-body1">
                                                <div class="media">
                                                    <div class="media-body text-white">
                                                        <h3 class="tiles-bar-value" style="padding: 16px;"><a href="{{url('component5/back-to-school')}}" style="color: #1d3768;">Back-To-School Campaign</a></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-xxl-2 col-sm-2">
                                        <div class="widget-stat card bg-left-line-yellow">
                                            <div class="card-body1">
                                                <div class="media">
                                                    <div class="media-body text-white">
                                                        <h3 class="tiles-bar-value" style="padding: 16px;"><a href="{{url('component5/policy-dialogue')}}" style="color: #1d3768;">Policy Dialogue</a> </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-xxl-2 col-sm-2">
                                        <div class="widget-stat card bg-left-line-green">
                                            <div class="card-body1">
                                                <div class="media">
                                                    <div class="media-body text-white">
                                                        <h3 class="tiles-bar-value" style="padding: 16px;"><a href="{{url('component5/community-mobilization')}}" style="color: #1d3768;">Community Mobilization</a></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-xxl-2 col-sm-2">
                                        <div class="widget-stat card bg-left-line-purple">
                                            <div class="card-body1">
                                                <div class="media">
                                                    <div class="media-body text-white">
                                                        <h3 class="tiles-bar-value" style="padding: 16px;"><a href="{{url('component5/school-council-campaign')}}" style="color: #1d3768;"> School Council Campaign</a></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- row -->
                                <div class="row  justify-content-center">
{{--                                    <div class="col-xl-6 col-xxl-6 col-sm-6">--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-xl-12 col-xxl-12 col-sm-12">--}}
{{--                                                <div class="card">--}}
{{--                                                    <div class="card-header">--}}
{{--                                                        <div id="external-events" class="districts-asp my-3">--}}
{{--                                                            <div class="external-event ui-draggable ui-draggable-handle districts-asp-label" data-class="bg-aps" style="position: relative;"><i class="fa fa-move"></i>36 Districts of Punjab</div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="card-body text-center">--}}
{{--                                                        <!-------------SVG MAP PUNJAB START-------------->--}}
{{--                                                        <div class="punjab-map">--}}
{{--                                                            <svg id="map" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="840 350 650 800" style="display: inline;">--}}

{{--                                                                <g class="model-green" id="Punjab" fill="#ffffd0" stroke="#d0c0a0" transform="translate(-27.1,-28.1)">--}}

{{--                                                                    <a id="state_Vehari" class="state" xlink:href="" href="javascript:void()" data-target="#Vehari-Modal" data-toggle="modal">--}}
{{--                                                                        <path id="Vehari" class="shape" d="m 1123.8,847.1 3.6,2.6 7.6,-1.2 27.6,33 6,-0.4 8,-25.2 17.2,-5.6 12.6,3.8 15.4,-13.8 12.6,-0.8 3,-28 -8.6,-12.4 -35.6,22.8 -6.8,-6.4 -18.2,7.2 -6.6,11.2 -13.2,-5.4 -9.8,11.8 -11.4,1 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <a id="state_Toba_Tek_Singh" class="state" xlink:href="" href="javascript:void()" data-target="#Toba_Tek_Singh_Modal" data-toggle="modal">--}}
{{--                                                                        <path id="Toba_Tek_Singh" class="shape" d="m 1219.8,762.3 -7.2,-3.4 2,-9.4 -5,-7.6 10,-12.8 -3.4,-8.4 9.4,-19.8 -4.8,-6.2 -16.2,10.8 -18.2,2.4 -23.2,36.8 8.4,12.8 -12.2,4.8 -5.2,13.8 40.8,-2 19.6,0.4 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <a id="state_Sialkot" class="state" xlink:href="" href="#Sialkot-details" data-toggle="modal">--}}
{{--                                                                        <path id="Sialkot" class="shape" d="m 1381.6,541.9 3,-20.8 8.4,9.2 16.6,-11.4 -4.8,14 -1.6,14.4 6.4,12.4 12,-1.2 8,2.8 -6.8,9.2 -4,9.2 -8.6,8.4 1.4,8.4 -8.4,3 -3.4,8.2 -5.8,0.4 -6.8,-8.8 -9,-2.2 -11.6,-9.6 -3.8,-13.8 -3.8,-6.4 0,-11.4 13.2,-2.8 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <a id="state_Shaikhupura" class="state" xlink:href="" href="#Shaikhupura-details" data-toggle="modal">--}}
{{--                                                                        <path id="Shaikhupura" class="shape" d="m 1368,660.3 -7.4,19.4 -9.8,10.6 -4.4,0.6 -1,-8.2 -6.6,-0.2 -0.8,-7 -22.6,-9.8 -2.8,-31.4 9.8,-10.2 8.2,-1 -2.4,11.2 25,-1.8 3.4,5.2 4.2,-6.6 18,-2.6 16,-15 -0.8,-5.4 5.8,-0.4 3.4,8 7.6,4.6 -19.4,22.8 -5.2,14.6 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <a id="state_Sargodha" class="state" xlink:href="" href="#Sargodha-details" data-toggle="modal">--}}
{{--                                                                        <path id="Sargodha" class="shape" d="m 1221.4,636.9 11.4,-14.8 23.2,9.2 12.2,-22.2 -5.2,-14.2 -8.4,-1.4 -8.4,-10.2 3.4,-6.4 -6.2,-4.8 17.2,-9.6 0,-7.6 -60.6,15 -27.8,23 -11.6,53 13.4,4.4 -12.4,15.8 21.2,-10.6 10.8,-10.8 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <a id="state_Sahiwal" class="state" xlink:href="" href="#Sahiwal-details" data-toggle="modal">--}}
{{--                                                                        <path id="Sahiwal" class="shape" d="m 1266.6,781.3 9.8,3.8 -0.8,-16.6 2.6,-8.6 -7,-5.4 -4.8,-12.6 -38.6,22.8 -8,-2.4 -5.2,12.2 -19.6,-0.4 -6.8,21.4 -1.8,20 6.8,6.4 35.6,-22.8 19.4,-2 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <a id="state_Rawalpindi" class="state" xlink:href="" href="#Rawalpindi-details" data-toggle="modal">--}}
{{--                                                                        <path id="Rawalpindi" class="shape" d="m 1278,390.2 13.2,-6 8.6,35.9 -3,8.6 6.2,11.2 -6.2,17.8 6.6,17.8 -17.6,8.4 -9.8,-2.2 -3.2,11 -18.2,3.8 -11.8,3.2 -13.8,-11.2 -30,-7.6 8.8,-18.2 17.6,-11.6 -7.8,-18.2 -9,-2.8 3.6,-6.6 -8.2,-9.6 5.8,-5.2 3.8,3.2 12,-3 -5.2,4.8 10.8,4.2 -11.8,3.6 6.4,13.8 18,-8.8 6.8,10.2 -3.8,3 6,4.8 11.2,-7.2 1.6,-9 7.8,-7.8 -3.2,-4.2 -2.8,0.2 -10.6,-7.8 16.6,-9.2 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <a id="state_Rajanpur" class="nav-link state" href="#Rajanpur-details" data-toggle="modal">--}}
{{--                                                                        <path id="Rajanpur" class="shape" d="m 972.2,870.9 -17.8,-3.2 -10.4,21 3.4,27.4 -13,26.6 -9.2,10.8 1.6,20.4 -14.4,23.2 -6.6,1 5.8,23.4 36.8,-15.2 0,-19.6 14.4,2.8 17.4,-10.2 -4.4,-12.2 15.8,-2.8 7.4,-23.8 -5,-6.8 15,-30.8 1.6,-23.4 -11.6,-8.6 -14.6,18.2 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <a id="state_Rahimyar_Khan" class="state" xlink:href="" href="#Rahimyar-Khan-details" data-toggle="modal">--}}
{{--                                                                        <path id="Rahimyar_Khan" class="shape" d="m 1020.4,944.3 -3,11.8 -25.8,8.2 -15.8,2.8 4.4,12.2 -17.4,10.2 -14.4,-2.8 0,19.6 -36.8,15.2 11.6,16.8 6.2,24.6 13,17.8 18,8.4 16,-14.4 19.6,-1.2 11,12 3.2,13.2 5.4,9.6 12.8,1.2 35.8,-16.4 -27.2,-89.8 11,-53.8 -8.4,4 -5.4,-18.6 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <a id="state_Pakpattan" class="state" xlink:href="" href="#Pakpattan-details" data-toggle="modal">--}}
{{--                                                                        <path id="Pakpattan" class="shape" d="m 1266.6,781.3 -18.4,15.8 -19.4,2 8.6,12.4 -3,28 10.8,4.4 4.6,-8 30.2,-10 26.2,-18.4 -1,-20.6 -18.2,-11.8 -10.6,10 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <a id="state_Okara" class="state" xlink:href="" href="#Okara-details" data-toggle="modal">--}}
{{--                                                                        <path id="Okara" class="shape" d="m 1278.2,759.9 -2.6,8.6 0.8,16.6 10.6,-10 18.2,11.8 1,20.6 21.2,-3.4 5.6,-11.2 10.8,-8.8 3.8,1.6 2.2,-10 13.2,-12.8 -14,-3.8 -10.8,-9.6 -12.6,-1.8 -17.8,-21.2 0,-10.8 -16.8,6 -12.4,11.8 -4.4,-0.4 -7.8,8.8 4.8,12.6 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <a id="state_Narowal" class="state" xlink:href="" href="#Narowal-details" data-toggle="modal">--}}
{{--                                                                        <path id="Narowal" class="shape" d="m 1422.8,570.5 6.8,-9.2 7.4,2.8 7.8,-5.2 7.8,8.2 6,-0.4 12.4,9.2 7,9.6 -14.8,20.4 -2.2,-4 -21.4,10.4 -6.6,-3.6 -13,13 -9.2,-1.4 -7.6,-4.6 -3.4,-8 3.4,-8.2 8.4,-3 -1.4,-8.4 8.6,-8.4 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <a id="state_Nankana_Sahab" class="state" xlink:href="" href="#Nankana-Sahab-details" data-toggle="modal">--}}
{{--                                                                        <path id="Nankana_Sahab" class="shape" d="m 1285,665.1 8,20.8 8.6,-3.8 8.6,8.8 -4,10.2 -20.8,13.8 -10,9.6 -1.2,8.6 4.4,0.4 12.4,-11.8 16.8,-6 9.2,-5.4 12,-3 5.4,-5.6 9.6,-2.4 2.4,-8.4 -1,-8.2 -6.6,-0.2 -0.8,-7 -22.6,-9.8 -2.8,-31.4 -13.2,1.8 -8.6,6.2 -22.4,7.8 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <a id="state_Muzaffargarh" class="state" xlink:href="" href="#Muzaffargarh-details" data-toggle="modal">--}}
{{--                                                                        <path id="Muzaffargarh" class="shape" d="m 1010.6,879.5 -1.6,23.4 -15,30.8 5,6.8 -7.4,23.8 25.8,-8.2 3,-11.8 13.8,-9.4 13.8,-25 0.8,-24.8 13.4,-6.6 -1.6,-27 30,-54 -6.4,-2 8.6,-17.4 -33.4,-21 -7,12.8 -32.6,1.6 3.8,25 -4,24.4 6.4,33 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <a id="state_Multan" class="state" xlink:href="" href="#Multan-details" data-toggle="modal">--}}
{{--                                                                        <path id="Multan" class="shape" d="m 1067.6,904.3 12.8,6.4 5.4,-41.2 21.8,-25.6 16.6,-27.6 -33.6,-18.8 -30,54 1.6,27 -13.4,6.6 -0.8,24.8 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <a id="state_Mianwali" class="state" xlink:href="" href="#Mianwali-details" data-toggle="modal">--}}
{{--                                                                        <path id="Mianwali" class="shape" d="m 1127,556.1 -11.6,10.4 4,7.6 -9.2,12.8 1,10.8 -58.8,1 11,-21.8 10,-3.8 0.6,-18.8 -9.6,3.6 0.2,-10.6 -7.6,0 -6.4,-19 3.6,-19.6 12.8,-8 15.2,-1.6 2.2,-7.4 -6.2,-18.4 18.4,2.2 4.8,12.6 10.8,4.6 -3.6,12.8 10.8,-2.2 12,19.8 -6.8,9.8 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <a id="state_Mandi_Bahauddin" class="state" xlink:href="" href="#Mandi-Bahauddin-details" data-toggle="modal">--}}
{{--                                                                        <path id="Mandi_Bahauddin" class="shape" d="m 1293.2,588.5 -9.6,13.2 -15.4,7.4 -5.2,-14.2 -8.4,-1.4 -8.4,-10.2 3.4,-6.4 -6.2,-4.8 17.2,-9.6 0,-7.6 9.2,-4.2 5.4,3 20,-12.8 3.4,-5.8 29.2,36 -17.6,9.6 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <a id="state_Lodhran" class="state" xlink:href="" href="#Lodhran-details" data-toggle="modal">--}}
{{--                                                                        <path id="Lodhran" class="shape" d="m 1094.4,913.5 68.2,-32 -27.6,-33 -7.6,1.2 -3.6,-2.6 -16.2,-3.2 -21.8,25.6 -5.4,41.2 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <a id="state_Layyah" class="state" xlink:href="" href="#Layyah-details" data-toggle="modal">--}}
{{--                                                                        <path id="Layyah" class="shape" d="m 1120.6,739.5 -4.6,-28.6 -19.2,-8.2 -10.2,10.4 -14,1 -13.4,-21.6 -35.2,-7.6 -7.6,14.4 2.4,46.8 -4.2,9.2 5.2,16.2 32.6,-1.6 7,-12.8 33.4,21 3.6,6 6,-14 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <a id="state_Lahore" class="nav-link active show state" href="#Lahore-details" data-tabName="Lahore-details" data-toggle="modal">--}}
{{--                                                                        <path id="Lahore" class="shape" d="m 1346.4,690.9 4.4,-0.6 9.8,-10.6 7.4,-19.4 18.2,-2.6 5.2,-14.6 12.4,34 -9,19.6 -8.2,-2 -2.6,4.6 -18.2,6 -21.8,-6 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <a id="state_Khushab" class="state" xlink:href="" href="#Khushab-details" data-toggle="modal">--}}
{{--                                                                        <path id="Khushab" class="shape" d="m 1172.2,592.9 27.8,-23 -2,-15 -11.2,-13.2 -11.2,6.6 -24.6,-11.6 -4,8.4 -20,11 -11.6,10.4 4,7.6 -9.2,12.8 1,10.8 1.6,16 -14.6,19.8 13.2,21.2 24.6,18 16.8,-22.6 7.8,-4.2 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <a id="state_Khanewal" class="state" xlink:href="" href="#Khanewal-details" data-toggle="modal">--}}
{{--                                                                        <path id="Khanewal" class="shape" d="m 1107.6,843.9 16.2,3.2 3.4,-5.8 11.4,-1 9.8,-11.8 13.2,5.4 6.6,-11.2 18.2,-7.2 1.8,-20 6.8,-21.4 -40.8,2 5.2,-13.8 -43.6,13.8 -13.4,-6 -6,14 -3.6,-6 -8.6,17.4 6.4,2 33.6,18.8 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <a id="state_Kasur" class="state" xlink:href="" href="#Kasur-details" data-toggle="modal">--}}
{{--                                                                        <path id="Kasur" class="shape" d="m 1344,699.3 21.8,6 18.2,-6 2.6,-4.6 8.2,2 -0.4,18.6 11.8,3 2.4,4.8 -4.8,5 -8.6,-4.8 -0.6,8.2 -18.2,12.2 -13.4,19.2 -14,-3.8 -10.8,-9.6 -12.6,-1.8 -17.8,-21.2 0,-10.8 9.2,-5.4 12,-3 5.4,-5.6 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <a id="state_Jhelum" class="state" xlink:href="" href="#Jhelum-details" data-toggle="modal">--}}
{{--                                                                        <path id="Jhelum" class="shape" d="m 1252.8,539.3 10.2,-0.4 -4,-7.6 -10.2,-1.4 -1.2,-7 8.4,-10 -1.4,-16.4 18.2,-3.8 3.2,-11 9.8,2.2 17.6,-8.4 2.6,7 -3.2,7.2 17.6,9.8 -1,6.4 -19.2,20.8 -1.6,8.4 -3.4,5.8 -20,12.8 -5.4,-3 -9.2,4.2 -60.6,15 -2,-15 7,-4.2 3,5 5.8,-8 25,-4.8 5.4,1.4 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <a id="state_Jhang" class="state" xlink:href="" href="#Jhang-details" data-toggle="modal">--}}
{{--                                                                        <path id="Jhang" class="shape" d="m 1159.4,762.3 12.2,-4.8 -8.4,-12.8 23.2,-36.8 18.2,-2.4 16.2,-10.8 -1.2,-5.8 -8.8,4 -22.4,-14.8 -5.6,-22.6 -21.2,10.6 12.4,-15.8 -13.4,-4.4 -7.8,4.2 -16.8,22.6 -0.4,30 -10.6,-1.8 -9,10 4.6,28.6 -18.2,30.6 13.4,6 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <a id="state_Hafizabad" class="state" xlink:href="" href="#Hafizabad-details" data-toggle="modal">--}}
{{--                                                                        <path id="Hafizabad" class="shape" d="m 1290.8,642.3 -22.4,7.8 -8,-6.6 -4.4,-12.2 12.2,-22.2 15.4,-7.4 9.6,-13.2 17,-7.8 4.2,13.2 7.8,9.4 3.6,12 -3.4,8.8 -9.8,10.2 -13.2,1.8 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <a id="state_Gujranwala" class="state" xlink:href="" href="#Gujranwala-details" data-toggle="modal">--}}
{{--                                                                        <path id="Gujranwala" class="shape" d="m 1359,567.3 3.8,6.4 3.8,13.8 11.6,9.6 9,2.2 6.8,8.8 0.8,5.4 -16,15 -18,2.6 -4.2,6.6 -3.4,-5.2 -25,1.8 2.4,-11.2 -8.2,1 3.4,-8.8 -3.6,-12 -7.8,-9.4 -4.2,-13.2 17.6,-9.6 11,0.6 20.2,-15.8 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <a id="state_Gujrat" class="state" xlink:href="" href="#Gujrat-details" data-toggle="modal">--}}
{{--                                                                        <path id="Gujrat" class="shape" d="m 1327.8,571.1 -29.2,-36 1.6,-8.4 19.2,-20.8 1,-6.4 11.6,-3 9,10 30.8,15 12.8,-0.4 -3,20.8 -9.4,11.2 -13.2,2.8 -20.2,15.8 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <a id="state_Faisalabad" class="state" xlink:href="" href="#Faisalabad-details" data-toggle="modal">--}}
{{--                                                                        <path id="Faisalabad" class="shape" d="m 1216.2,720.7 3.4,8.4 -10,12.8 5,7.6 -2,9.4 7.2,3.4 8,2.4 38.6,-22.8 7.8,-8.8 1.2,-8.6 10,-9.6 20.8,-13.8 4,-10.2 -8.6,-8.8 -8.6,3.8 -8,-20.8 -16.6,-15 -8,-6.6 -40.8,45.4 1.2,5.8 4.8,6.2 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <a id="state_Dera_Ghazi_Khan" class="state" xlink:href="" href="#Dera-Ghazi-Khan-details" data-toggle="modal">--}}
{{--                                                                        <path id="Dera_Ghazi_Khan" class="shape" d="m 979,705.5 -13.4,6.4 0.6,10 -3,0.4 -1.2,23.4 2.2,6.2 -6.2,0.8 -12,13.2 1,9.2 -10.6,20.8 -4.2,17.4 3.6,7 9.6,-3.8 -7.6,15.2 -8.2,23.8 -15.6,22.8 -13.4,5.4 -4.2,26.8 10.6,3.4 -2.2,7 4.8,6.6 5.4,-3 -4.6,24 -21,21.8 3.8,10.8 -8.6,20.2 -11.2,6.4 5,12 9.6,-4.4 23.6,6.2 -5.8,-23.4 6.6,-1 14.4,-23.2 -1.6,-20.4 9.2,-10.8 13,-26.6 -3.4,-27.4 10.4,-21 17.8,3.2 12.2,18.2 14.6,-18.2 11.6,8.6 15.4,-25.6 -6.4,-33 4,-24.4 -3.8,-25 -5.2,-16.2 4.2,-9.2 -2.4,-46.8 -7.2,-6 -13.6,-1.6 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <a id="state_Chiniot" class="state" xlink:href="" href="#Chiniot-details" data-toggle="modal">--}}
{{--                                                                        <path id="Chiniot" class="shape" d="m 1221.4,636.9 -27.8,7.8 -10.8,10.8 5.6,22.6 22.4,14.8 8.8,-4 40.8,-45.4 -4.4,-12.2 -23.2,-9.2 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <a id="state_Chakwal" class="state" xlink:href="" href="#Chakwal-details" data-toggle="modal">--}}
{{--                                                                        <path id="Chakwal" class="shape" d="m 1184.2,490.5 -23.2,2 -5.2,-4 -6.4,5.6 -7.2,-2.6 -22.8,11.8 12,19.8 -6.8,9.8 2.4,23.2 20,-11 4,-8.4 24.6,11.6 11.2,-6.6 11.2,13.2 7,-4.2 3,5 5.8,-8 25,-4.8 5.4,1.4 8.6,-5 10.2,-0.4 -4,-7.6 -10.2,-1.4 -1.2,-7 8.4,-10 -1.4,-16.4 -11.8,3.2 -13.8,-11.2 -30,-7.6 -6.6,-1.6 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <a id="state_Bhakkar" class="state" xlink:href="" href="#Bhakkar-details" data-toggle="modal">--}}
{{--                                                                        <path id="Bhakkar" class="shape" d="m 1135.6,702.7 0.4,-30 -24.6,-18 -13.2,-21.2 14.6,-19.8 -1.6,-16 -58.8,1 -9.8,30.6 -15.8,23.2 -4.4,16.6 6,1 -4.4,14.8 35.2,7.6 13.4,21.6 14,-1 10.2,-10.4 19.2,8.2 9,-10 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <a id="state_Bahawalpur" class="state" xlink:href="" href="#Bahawalpur-details" data-toggle="modal">--}}
{{--                                                                        <path id="Bahawalpur" class="shape" d="m 1168.6,881.1 -6,0.4 -68.2,32 -14,-2.8 -12.8,-6.4 -19.6,5.6 -13.8,25 5.4,18.6 8.4,-4 -11,53.8 27.2,89.8 50.2,-7 15.4,-6.2 2.2,-17.4 26.2,-28 11.8,-35.2 9.4,-12.8 20.8,-11.6 -8,-25.8 -12.6,0 -3.6,-12.6 6,-5.8 39.8,0 4.2,-13.8 -12,-7 8.4,-27.2 -15.8,-17 -0.2,-11.6 -12.6,-3.8 -17.2,5.6 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <a id="state_Bahawalnagar" class="state" xlink:href="" href="#Bahawalnagar-details" data-toggle="modal">--}}
{{--                                                                        <path id="Bahawalnagar" class="shape" d="m 1280,825.9 -30.2,10 -4.6,8 -10.8,-4.4 -12.6,0.8 -15.4,13.8 0.2,11.6 15.8,17 -8.4,27.2 12,7 -4.2,13.8 -39.8,0 -6,5.8 3.6,12.6 12.6,0 8,25.8 34.6,-19.6 30.8,-55.2 13.8,-47.4 40.8,-15.2 16.2,-13.8 -2.2,-13.2 -6.8,-6.4 -21.2,3.4 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <a id="state_Attock" class="state" xlink:href="" href="#Attock-details" data-toggle="modal">--}}
{{--                                                                        <path id="Attock" class="shape" d="m 1207.8,462.7 -8.8,18.2 -6.6,-1.6 -8.2,11.2 -23.2,2 -5.2,-4 -6.4,5.6 -7.2,-2.6 -22.8,11.8 -10.8,2.2 3.6,-12.8 4.2,-12.8 -5.6,-10.4 2.4,-9.4 14,-6.4 9.2,-14 7.8,-25.2 21,-2.2 0,-18.7 20.4,-9.4 17.2,9.4 -2.6,5.4 7.2,2.5 7,-7.3 8.6,5.8 2.6,8.9 -12,3 -3.8,-3.2 -5.8,5.2 8.2,9.6 -3.6,6.6 9,2.8 7.8,18.2 z" />--}}
{{--                                                                    </a>--}}

{{--                                                                    <path id="Punjab_Border" fill="none" stroke="#a08070" d="m 1303,439.9 -6.2,-11.2 3,-8.6 -8.6,-35.9 -13.2,6 -4.6,9.3 -16.6,9.2 10.6,7.8 2.8,-0.2 3.2,4.2 -7.8,7.8 -1.6,9 -11.2,7.2 -6,-4.8 3.8,-3 -6.8,-10.2 -18,8.8 -6.4,-13.8 11.8,-3.6 -10.8,-4.2 5.2,-4.8 -2.6,-8.9 -8.6,-5.8 -7,7.3 -7.2,-2.5 2.6,-5.4 -17.2,-9.4 -20.4,9.4 0,18.7 -21,2.2 -7.8,25.2 -9.2,14 -14,6.4 -2.4,9.4 5.6,10.4 -4.2,12.8 -10.8,-4.6 -4.8,-12.6 -18.4,-2.2 6.2,18.4 -2.2,7.4 -15.2,1.6 -12.8,8 -3.6,19.6 6.4,19 7.6,0 -0.2,10.6 9.6,-3.6 -0.6,18.8 -10,3.8 -11,21.8 -9.8,30.6 -15.8,23.2 -4.4,16.6 6,1 -4.4,14.8 -7.6,14.4 -7.2,-6 -13.6,-1.6 -16.6,13.8 -13.4,6.4 0.6,10 -3,0.4 -1.2,23.4 2.2,6.2 -6.2,0.8 -12,13.2 1,9.2 -10.6,20.8 -4.2,17.4 3.6,7 9.6,-3.8 -7.6,15.2 -8.2,23.8 -15.6,22.8 -13.4,5.4 -4.2,26.8 10.6,3.4 -2.2,7 4.8,6.6 5.4,-3 -4.6,24 -21,21.8 3.8,10.8 -8.6,20.2 -11.2,6.4 5,12 9.6,-4.4 23.6,6.2 11.6,16.8 6.2,24.6 13,17.8 18,8.4 16,-14.4 19.6,-1.2 11,12 3.2,13.2 5.4,9.6 12.8,1.2 35.8,-16.4 50.2,-7 15.4,-6.2 2.2,-17.4 26.2,-28 11.8,-35.2 9.4,-12.8 20.8,-11.6 34.6,-19.6 30.8,-55.2 13.8,-47.4 40.8,-15.2 16.2,-13.8 -2.2,-13.2 -6.8,-6.4 5.6,-11.2 10.8,-8.8 3.8,1.6 2.2,-10 13.2,-12.8 13.4,-19.2 18.2,-12.2 0.6,-8.2 8.6,4.8 4.8,-5 -2.4,-4.8 -11.8,-3 0.4,-18.6 9,-19.6 -12.4,-34 19.4,-22.8 9.2,1.4 13,-13 6.6,3.6 21.4,-10.4 2.2,4 14.8,-20.4 -7,-9.6 -12.4,-9.2 -6,0.4 -7.8,-8.2 -7.8,5.2 -7.4,-2.8 -8,-2.8 -12,1.2 -6.4,-12.4 1.6,-14.4 4.8,-14 -16.6,11.4 -8.4,-9.2 -12.8,0.4 -30.8,-15 -9,-10 -11.6,3 -17.6,-9.8 3.2,-7.2 -2.6,-7 -6.6,-17.8 z" />--}}
{{--                                                                </g>--}}

{{--                                                                <g id="Labels" font-size="10" font-family="DejaVu Sans" transform="translate(-27.1,-28.1)">--}}
{{--                                                                    <text y="974.3457" x="1085.092">BAHAWALPUR</text>--}}
{{--                                                                    <text y="904.82227" x="1151.7288">BAHAWALNAGAR •</text>--}}
{{--                                                                    <text y="955.50684" x="937.28442">RAJANPUR</text>--}}
{{--                                                                    <text y="792.50684" x="977.92017">• DERA GHAZI KHAN</text>--}}
{{--                                                                    <text y="852.76074" x="1079.0706">• MULTAN</text>--}}
{{--                                                                    <text y="788.75977" x="1204.928">SAHIWAL</text>--}}
{{--                                                                    <text y="800.25977" x="1117.8713">KHANEWAL</text>--}}
{{--                                                                    <text y="766.84277" x="1294.844">OKARA</text>--}}
{{--                                                                    <text y="706.75879" x="1230.5881">FAISALABAD</text>--}}
{{--                                                                    <text y="679.79395" x="1231.2582">NAKANA SAHAB •</text>--}}
{{--                                                                    <text y="654.79297" x="1343.3733">• SHAIKHUPURA</text>--}}
{{--                                                                    <text y="599.49219" x="1275.1819">GUJRANWALA •</text>--}}
{{--                                                                    <text y="538.46094" x="1322.6311">GUJRAT</text>--}}
{{--                                                                    <text y="575.12598" x="1370.1799">SIALKOT</text>--}}
{{--                                                                    <text y="592.45996" x="1417.3508">NAROWAL</text>--}}
{{--                                                                    <text y="623.12598" x="1265.9055">HAFIZABAD</text>--}}
{{--                                                                    <text y="573.46289" x="1190.178">MANDI BAHAUDDIN •</text>--}}
{{--                                                                    <text y="680.88281" x="1377.5959">• LAHORE</text>--}}
{{--                                                                    <text y="730.09277" x="1337.5393">KASUR</text>--}}
{{--                                                                    <text y="699.42773" x="1149.1526">JHANG</text>--}}
{{--                                                                    <text y="658.76172" x="1200.8772">CHINIOT</text>--}}
{{--                                                                    <text y="610.76172" x="1186.8147">SARGODHA</text>--}}
{{--                                                                    <text y="751.4082" x="1106.1428">TOBA TEK SINGH •</text>--}}
{{--                                                                    <text y="882.09375" x="1092.3186">LODHRAN</text>--}}
{{--                                                                    <text y="844.75977" x="1166.1506">VEHARI</text>--}}
{{--                                                                    <text y="810.75977" x="1239.0375">PAKPATTAN</text>--}}
{{--                                                                    <text y="842.42773" x="959.29517">MUZAFFARGARH •</text>--}}
{{--                                                                    <text y="739.42773" x="1047.0354">LAYYAH</text>--}}
{{--                                                                    <text y="666.09375" x="1050.2034">BHAKKAR</text>--}}
{{--                                                                    <text y="603.42676" x="1116.595">KHUSHAB</text>--}}
{{--                                                                    <text y="526.76062" x="1064.0432">MIANWALI</text>--}}
{{--                                                                    <text y="520.09375" x="1166.0393">CHAKWAL</text>--}}
{{--                                                                    <text y="463.59277" x="1145.1545">ATTOCK</text>--}}
{{--                                                                    <text y="470.09277" x="1224.9846">RAWALPINDI</text>--}}
{{--                                                                    <text y="512.76172" x="1264.0969">JHELUM</text>--}}
{{--                                                                    <text y="1034.8398" x="944.83813">RAHIM YAR KHAN</text>--}}
{{--                                                                </g>--}}
{{--                                                            </svg>--}}
{{--                                                        </div>--}}
{{--                                                        <!-------------SVG MAP PUNJAB END -------------->--}}
{{--                                                    </div>--}}
{{--                                                </div><!---Card end---->--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="col-xl-12 col-xxl-12 col-sm-12">
                                    <div class="card">
                                            <div class="card-body">
												<div class="component-content-wrapper">
													<h4 class="sub-component-title">Enrollment Campaign Status</h4>
												</div>
												<br>
                                                <div id="districts_enrollement"></div>
                                            </div>
                                        </div>
                                    </div>
									<div class="col-xl-12 col-xxl-12 col-sm-12">
                                    <div class="card">
                                            <div class="card-body">
												<div class="component-content-wrapper">
													<h4 class="sub-component-title">Overall Enrollment Campaign Status</h4>
												</div>
												<br>
                                                <div id="districts_enrollement-total"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-xxl-12 col-sm-12">
                                        <!--<div class="row">
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table id="myTable11" class="display all-district-data-table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Rank</th>
                                                                        <th>District <br> (A)</th>
                                                                        <th>Baseline (Census 2022-23) <br> (B)</th>
                                                                        <th>Campaign Target <br> (C)</th>
                                                                        <th>Overall Target (Baseline+Target) <br> (D)</th>
                                                                        <th>Current (SIS) <br> (E)</th>
                                                                        <th>Current - Baseline <br> (F = E-B)</th>
                                                                        <th>Increase/Decrease <br> (G = F-C)</th>
                                                                        <th>%Age <br> (H = F/C%)</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>LAYYAH</td>
                                                                        <td>284,316</td>
                                                                        <td>7,661</td>
                                                                        <td>291,977</td>
                                                                        <td>296,434</td>
                                                                        <td>12,118</td>
                                                                        <td>4,457</td>
                                                                        <td><strong>158</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>HAFIZABAD</td>
                                                                        <td>151,719</td>
                                                                        <td>4,594</td>
                                                                        <td>156,313</td>
                                                                        <td>157,833</td>
                                                                        <td>6,114</td>
                                                                        <td>1,520</td>
                                                                        <td><strong>133</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3</td>
                                                                        <td>GUJRANWALA</td>
                                                                        <td>429,025</td>
                                                                        <td>14,199</td>
                                                                        <td>443,224</td>
                                                                        <td>446,057</td>
                                                                        <td>17,032</td>
                                                                        <td>2,833</td>
                                                                        <td><strong>120</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>4</td>
                                                                        <td>BAHAWALNAGAR</td>
                                                                        <td>388,500</td>
                                                                        <td>17,942</td>
                                                                        <td>406,442</td>
                                                                        <td>407,093</td>
                                                                        <td>18,593</td>
                                                                        <td>651</td>
                                                                        <td><strong>104</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>5</td>
                                                                        <td>KHANEWAL</td>
                                                                        <td>394,352</td>
                                                                        <td>14,176</td>
                                                                        <td>408,528</td>
                                                                        <td>408,304</td>
                                                                        <td>13,952</td>
                                                                        <td>(224)</td>
                                                                        <td><strong>98</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>6</td>
                                                                        <td>BAHAWALPUR</td>
                                                                        <td>296,402</td>
                                                                        <td>30,720</td>
                                                                        <td>327,122</td>
                                                                        <td>322,918</td>
                                                                        <td>26,516</td>
                                                                        <td>(4,204)</td>
                                                                        <td><strong>86</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>7</td>
                                                                        <td>VEHARI</td>
                                                                        <td>324,143</td>
                                                                        <td>14,704</td>
                                                                        <td>338,847</td>
                                                                        <td>335,099</td>
                                                                        <td>10,956</td>
                                                                        <td>(3,748)</td>
                                                                        <td><strong>75</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>8</td>
                                                                        <td>RAJANPUR</td>
                                                                        <td>181,456</td>
                                                                        <td>22,649</td>
                                                                        <td>204,105</td>
                                                                        <td>197,714</td>
                                                                        <td>16,258</td>
                                                                        <td>(6,391)</td>
                                                                        <td><strong>72</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>9</td>
                                                                        <td>NANKANA SAHIB</td>
                                                                        <td>177,664</td>
                                                                        <td>5,400</td>
                                                                        <td>183,064</td>
                                                                        <td>181,499</td>
                                                                        <td>3,835</td>
                                                                        <td>(1,565)</td>
                                                                        <td><strong>71</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>10</td>
                                                                        <td>SAHIWAL</td>
                                                                        <td>341,665</td>
                                                                        <td>14,056</td>
                                                                        <td>355,721</td>
                                                                        <td>351,548</td>
                                                                        <td>9,883</td>
                                                                        <td>(4,173)</td>
                                                                        <td><strong>70</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>11</td>
                                                                        <td>MUZAFFARGARH</td>
                                                                        <td>367,116</td>
                                                                        <td>32,390</td>
                                                                        <td>399,506</td>
                                                                        <td>387,142</td>
                                                                        <td>20,026</td>
                                                                        <td>(12,364)</td>
                                                                        <td><strong>62</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>12</td>
                                                                        <td>LODHRAN</td>
                                                                        <td>152,944</td>
                                                                        <td>14,672</td>
                                                                        <td>167,616</td>
                                                                        <td>161,729</td>
                                                                        <td>8,785</td>
                                                                        <td>(5,887)</td>
                                                                        <td><strong>60</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>13</td>
                                                                        <td>D.G. KHAN</td>
                                                                        <td>296,344</td>
                                                                        <td>25,773</td>
                                                                        <td>322,117</td>
                                                                        <td>311,145</td>
                                                                        <td>14,801</td>
                                                                        <td>(10,972)</td>
                                                                        <td><strong>57</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>14</td>
                                                                        <td>KASUR</td>
                                                                        <td>401,149</td>
                                                                        <td>14,299</td>
                                                                        <td>415,448</td>
                                                                        <td>409,319</td>
                                                                        <td>8,170</td>
                                                                        <td>(6,129)</td>
                                                                        <td><strong>57</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>15</td>
                                                                        <td>MULTAN</td>
                                                                        <td>346,556</td>
                                                                        <td>29,382</td>
                                                                        <td>375,938</td>
                                                                        <td>362,678</td>
                                                                        <td>16,122</td>
                                                                        <td>(13,260)</td>
                                                                        <td><strong>55</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>16</td>
                                                                        <td>SHEIKHUPURA</td>
                                                                        <td>335,996</td>
                                                                        <td>14,056</td>
                                                                        <td>350,052</td>
                                                                        <td>343,399</td>
                                                                        <td>7,403</td>
                                                                        <td>(6,653)</td>
                                                                        <td><strong>53</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>17</td>
                                                                        <td>BHAKKAR</td>
                                                                        <td>233,484</td>
                                                                        <td>10,235</td>
                                                                        <td>243,719</td>
                                                                        <td>238,256</td>
                                                                        <td>4,772</td>
                                                                        <td>(5,463)</td>
                                                                        <td><strong>47</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>18</td>
                                                                        <td>RAHIMYAR KHAN</td>
                                                                        <td>565,706</td>
                                                                        <td>47,849</td>
                                                                        <td>613,555</td>
                                                                        <td>586,343</td>
                                                                        <td>20,637</td>
                                                                        <td>(27,212)</td>
                                                                        <td><strong>43</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>19</td>
                                                                        <td>KHUSHAB</td>
                                                                        <td>160,358</td>
                                                                        <td>7,729</td>
                                                                        <td>168,087</td>
                                                                        <td>163,189</td>
                                                                        <td>2,831</td>
                                                                        <td>(4,898)</td>
                                                                        <td><strong>37</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>20</td>
                                                                        <td>LAHORE</td>
                                                                        <td>636,957</td>
                                                                        <td>38,254</td>
                                                                        <td>675,211</td>
                                                                        <td>650,744</td>
                                                                        <td>13,787</td>
                                                                        <td>(24,467)</td>
                                                                        <td><strong>36</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>21</td>
                                                                        <td>FAISALABAD</td>
                                                                        <td>842,748</td>
                                                                        <td>29,883</td>
                                                                        <td>872,631</td>
                                                                        <td>852,862</td>
                                                                        <td>10,114</td>
                                                                        <td>(19,769)</td>
                                                                        <td><strong>34</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>22</td>
                                                                        <td>NAROWAL</td>
                                                                        <td>230,196</td>
                                                                        <td>3,000</td>
                                                                        <td>233,196</td>
                                                                        <td>231,048</td>
                                                                        <td>852</td>
                                                                        <td>(2,148)</td>
                                                                        <td><strong>28</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>23</td>
                                                                        <td>OKARA</td>
                                                                        <td>368,565</td>
                                                                        <td>14,240</td>
                                                                        <td>382,805</td>
                                                                        <td>370,738</td>
                                                                        <td>2,173</td>
                                                                        <td>(12,067)</td>
                                                                        <td><strong>15</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>24</td>
                                                                        <td>MBD</td>
                                                                        <td>210,061</td>
                                                                        <td>5,486</td>
                                                                        <td>215,547</td>
                                                                        <td>210,657</td>
                                                                        <td>596</td>
                                                                        <td>(4,890)</td>
                                                                        <td><strong>11</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>25</td>
                                                                        <td>RAWALPINDI</td>
                                                                        <td>394,530</td>
                                                                        <td>15,284</td>
                                                                        <td>409,814</td>
                                                                        <td>394,901</td>
                                                                        <td>371</td>
                                                                        <td>(14,913)</td>
                                                                        <td><strong>2</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>26</td>
                                                                        <td>SARGODHA</td>
                                                                        <td>471,921</td>
                                                                        <td>14,784</td>
                                                                        <td>486,705</td>
                                                                        <td>471,973</td>
                                                                        <td>52</td>
                                                                        <td>(14,732)</td>
                                                                        <td><strong>0</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>27</td>
                                                                        <td>PAKPATTAN</td>
                                                                        <td>221,053</td>
                                                                        <td>10,812</td>
                                                                        <td>231,865</td>
                                                                        <td>220,499</td>
                                                                        <td>(554)</td>
                                                                        <td>(11,366)</td>
                                                                        <td><strong>(5)</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>28</td>
                                                                        <td>JHANG</td>
                                                                        <td>358,106</td>
                                                                        <td>13,021</td>
                                                                        <td>371,127</td>
                                                                        <td>357,418</td>
                                                                        <td>(688)</td>
                                                                        <td>(13,709)</td>
                                                                        <td><strong>(5)</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>29</td>
                                                                        <td>ATTOCK</td>
                                                                        <td>252,703</td>
                                                                        <td>6,778</td>
                                                                        <td>259,481</td>
                                                                        <td>251,816</td>
                                                                        <td>(887)</td>
                                                                        <td>(7,665)</td>
                                                                        <td><strong>(13)</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>30</td>
                                                                        <td>GUJRAT</td>
                                                                        <td>339,090</td>
                                                                        <td>4,424</td>
                                                                        <td>343,514</td>
                                                                        <td>338,129</td>
                                                                        <td>(961)</td>
                                                                        <td>(5,385)</td>
                                                                        <td><strong>(22)</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>31</td>
                                                                        <td>T.T.SINGH</td>
                                                                        <td>341,064</td>
                                                                        <td>8,192</td>
                                                                        <td>349,256</td>
                                                                        <td>338,853</td>
                                                                        <td>(2,211)</td>
                                                                        <td>(10,403)</td>
                                                                        <td><strong>(27)</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>32</td>
                                                                        <td>MIANWALI</td>
                                                                        <td>231,907</td>
                                                                        <td>7,668</td>
                                                                        <td>239,575</td>
                                                                        <td>229,678</td>
                                                                        <td>(2,229)</td>
                                                                        <td>(9,897)</td>
                                                                        <td><strong>(29)</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>33</td>
                                                                        <td>SIALKOT</td>
                                                                        <td>397,209</td>
                                                                        <td>9,874</td>
                                                                        <td>407,083</td>
                                                                        <td>392,621</td>
                                                                        <td>(4,588)</td>
                                                                        <td>(14,462)</td>
                                                                        <td><strong>(46)</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>34</td>
                                                                        <td>CHINIOT</td>
                                                                        <td>180,220</td>
                                                                        <td>6,074</td>
                                                                        <td>186,294</td>
                                                                        <td>176,609</td>
                                                                        <td>(3,611)</td>
                                                                        <td>(9,685)</td>
                                                                        <td><strong>(59)</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>35</td>
                                                                        <td>JHELUM</td>
                                                                        <td>162,223</td>
                                                                        <td>2,599</td>
                                                                        <td>164,822</td>
                                                                        <td>155,137</td>
                                                                        <td>(7,086)</td>
                                                                        <td>(9,685)</td>
                                                                        <td><strong>(273)</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>36</td>
                                                                        <td>CHAKWAL</td>
                                                                        <td>179,168</td>
                                                                        <td>2,595</td>
                                                                        <td>181,763</td>
                                                                        <td>168,865</td>
                                                                        <td>(10,303)</td>
                                                                        <td>(12,898)</td>
                                                                        <td><strong>(397)</strong></td>
                                                                    </tr>

                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th><strong>---</strong></th>
                                                                        <th><strong>Total</strong></th>
                                                                        <th><strong>11,646,616</strong></th>
                                                                        <th><strong>535,454</strong></th>
                                                                        <th><strong>12,182,070</strong></th>
                                                                        <th><strong>11,880,247</strong></th>
                                                                        <th><strong>233,631</strong></th>
                                                                        <th><strong>(301,823)</strong></th>
                                                                        <th><strong>44</strong></th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>-- row END -->
{{--                                        <div class="row">--}}
{{--                                            <div class="col-sm-12">--}}
{{--                                                <div class="card">--}}
{{--                                                    <div class="card-body">--}}
{{--                                                        <table class="table table-striped table-bordered table-hover table-highlight table-checkable sanctioned-post-quota-table str_table">--}}
{{--                                                            <tbody>--}}
{{--                                                                <tr>--}}
{{--                                                                    <td colspan="2" style="color: #ffffff;background: #1d3768; font-weight: bold;">Policy Dialogue</td>--}}
{{--                                                                </tr>--}}
{{--                                                                <tr>--}}
{{--                                                                    <th style=" background: #1d376826;">Activity</th>--}}
{{--                                                                    <th style=" background: #1d376826;">Description</th>--}}
{{--                                                                </tr>--}}
{{--                                                                <tr style="font-family: 'Roboto', sans-serif;font-weight: 200;font-size: 13px;">--}}
{{--                                                                    <th>Policy Dialogue on Pyscho-Social Support</th>--}}
{{--                                                                    <th>--}}
{{--                                                                        <p>PMIU organized a policy dialogue on Psycho-Social Support to raise awareness on emotional well-being and curtail bullying at school level.</p>--}}
{{--                                                                    </th>--}}
{{--                                                                </tr>--}}
{{--                                                                <tr style="font-family: 'Roboto', sans-serif;font-weight: 200;font-size: 13px;">--}}
{{--                                                                    <th>Policy Dialogue on Recalibrating  Focus on The Quality of Education</th>--}}
{{--                                                                    <th>--}}
{{--                                                                        <p>Planed for Mid December 2023</p>--}}
{{--                                                                    </th>--}}
{{--                                                                </tr>--}}
{{--                                                            </tbody>--}}
{{--                                                        </table>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div><!-- row END -->--}}
                                    </div>
                                </div>
                                <!-- row END -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!-- State Modal Start -->
        <div class="modal bd-example-modal-lg" id="Attock-details" tabindex="-1" role="dialog" aria-labelledby="VehariModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><strong>Attock</strong></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
						<div class="row align-items-center">
                            <div class="col-xl-12 col-xxl-12 col-sm-12">
                            <table class="table table-striped table-bordered table-hover table-highlight table-checkable sanctioned-post-quota-table str_table">
                                <tbody>
                                    <tr style="color: #ffffff;background: #7195cf;font-weight: bold;">
                                        <td>Baseline(2022-23)</td>
                                        <td>Campaign Target</td>
                                        <td>Overall Target</td>
                                    </tr>
                                    <tr>
                                        <th>252,703</th>
                                        <th>6,778</th>
                                        <th>259,481</th>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
						<div class="row align-items-center">
                            <div class="col-xl-12 col-xxl-12 col-sm-12">
                            <table class="table table-striped table-bordered table-hover table-highlight table-checkable sanctioned-post-quota-table str_table">
                                <tbody>
                                    <tr style="color: #ffffff;background: #7195cf;font-weight: bold;">
                                        <td>Baseline(2022-23)</td>
                                        <td>Campaign Target</td>
                                        <td>Overall Target</td>
                                    </tr>
                                    <tr>
                                        <th>394,530</th>
                                        <th>15,284</th>
                                        <th>409,814</th>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!-- State Modal Start -->
        <div class="modal bd-example-modal-lg" id="Attock-details" tabindex="-1" role="dialog" aria-labelledby="VehariModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><strong>Attock</strong></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
						<div class="row align-items-center">
                            <div class="col-xl-12 col-xxl-12 col-sm-12">
                            <table class="table table-striped table-bordered table-hover table-highlight table-checkable sanctioned-post-quota-table str_table">
                                <tbody>
                                    <tr style="color: #ffffff;background: #7195cf;font-weight: bold;">
                                        <td>Baseline(2022-23)</td>
                                        <td>Campaign Target</td>
                                        <td>Overall Target</td>
                                    </tr>
                                    <tr>
                                        <th>252,703</th>
                                        <th>6,778</th>
                                        <th>259,481</th>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
						<div class="row align-items-center">
                            <div class="col-xl-12 col-xxl-12 col-sm-12">
                            <table class="table table-striped table-bordered table-hover table-highlight table-checkable sanctioned-post-quota-table str_table">
                                <tbody>
                                    <tr style="color: #ffffff;background: #7195cf;font-weight: bold;">
                                        <td>Baseline(2022-23)</td>
                                        <td>Campaign Target</td>
                                        <td>Overall Target</td>
                                    </tr>
                                    <tr>
                                        <th>394,530</th>
                                        <th>15,284</th>
                                        <th>409,814</th>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection



