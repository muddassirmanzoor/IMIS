@extends('layouts.master')

@section('title', 'Back to School')

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
    $('#fund_allocation').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Total Fund Allocation',
            align: 'left'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            name: 'Total',
            colorByPoint: true,
            data: [{
                name: 'Total Allocation',
                y: 1245,
                sliced: true,
                selected: true,
                color: "#ffea01"
            }, {
                name: 'Released to Districts',
                y: 1652,
                color: "#2ea762"
            }]
        }]
    });
    //< !----------------districts chart  chart Start here-------------------->
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
            data: [11646616],
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
                                <div class="row mx-0 align-items-center">
                                    <div class="col-sm-12  mb-3">
											<div class="component-content-wrapper">
												<h4 class="sub-component-title">Launch of Back-To-School 2023 Campaign</h4>
											</div>
												<p style="text-align: justify;">Programme Monitoring and Implementation Unit (PMIU) launched Back-To-School Campaign 2023 on 21st August 2023 under TALEEM Programme. As part of the campaign enrollment target of 10% OOSC was given to each district across punjab to improve enrollment rate in public schools.  A large number of government officials, academia, NGOs, development partners and students attended the launch event.</p>
									
											</div>
                                    </div>
                                    <div class="col-sm-12  mb-3">
                                        <div class="welcome-text" style="text-align: center;">
                                            <img src="{{ asset('images/imis-images/back-to-school-banner.jpeg') }}" style="width: 100%;height: auto;">
                                        </div>
                                    </div>
                                </div>
								<div class="row mx-0 align-items-center">
								
									<div class="col-sm-3  mb-3">
                                        <div class="welcome-text" style="text-align: center;">
                                            <img src="{{ asset('images/imis-images/back-to-school-banner3.jpeg') }}" style="width: 100%;height: auto;">
                                        </div>
                                    </div>
                                    <div class="col-sm-3  mb-3">
                                        <div class="welcome-text" style="text-align: center;">
                                            <img src="{{ asset('images/imis-images/back-to-school-banner4.jpeg') }}" style="width: 100%;height: auto;">
                                        </div>
                                    </div>
                                    <div class="col-sm-3  mb-3">
                                        <div class="welcome-text" style="text-align: center;">
                                            <img src="{{ asset('images/imis-images/back-to-school-banner5.jpeg') }}" style="width: 100%;height: auto;">
                                        </div>
                                    </div>
									<div class="col-sm-3  mb-3">
                                        <div class="welcome-text" style="text-align: center;">
                                            <img src="{{ asset('images/imis-images/back-to-school-banner2.jpeg') }}" style="width: 100%;height: auto;">
                                        </div>
                                    </div>
                                </div>
                                <!-- row -->
                                <div class="row">
                                    <div class="col-xl-12 col-xxl-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
												<div class="component-content-wrapper">
													<h4 class="sub-component-title">Progress Review of 09 Divisions on Back-To-School</h4>
												</div>
												<p style="text-align: justify;">Programme Monitoring and Implementation Unit (PMIU) under TALEEM Programme organized a series of Progress Reviews of all 09 divisions on Back-To-School Campaign. Programme Director PMIU Muhammad Farooq Rasheed chaired the progress reviews and inquired about the status of enrollment at divisional level. The CEOs, DMOs and SMDPs of respective districts attended the review and apprised the chair about progress on the campaign. </p>
												<ul class="divisions-list">
													<li>Bhawalpur</li>
													<li>Dera Ghazi Khan</li>
													<li>Faisalabad</li>
													<li>Gujranwala</li>																										
													<li>Lahore</li>
													<li>Multan</li>													
													<li>Rawalpindi</li>
													<li>Sahiwal</li>													
													<li>Sargodha</li>													
												</ul>
											</div>											
                                        </div>
                                    </div>									
									<div class="col-sm-12  mb-3">
                                        <div class="welcome-text" style="text-align: center;">
                                            <img src="{{ asset('images/imis-images/Progress-Review-banner.jpg') }}" style="width: 70%;height: auto;">
                                        </div>
                                    </div>
                                </div>
                                <!-- row END -->
                               
								<div class="row mx-0 align-items-center">								
									<div class="col-sm-3  mb-3">
                                        <div class="welcome-text" style="text-align: center;">
                                            <img src="{{ asset('images/imis-images/Progress-Review-banner1.jpeg') }}" style="width: 100%;height: auto;">
                                        </div>
                                    </div>
                                    <div class="col-sm-3  mb-3">
                                        <div class="welcome-text" style="text-align: center;">
                                            <img src="{{ asset('images/imis-images/Progress-Review-banner2.jpeg') }}" style="width: 100%;height: auto;">
                                        </div>
                                    </div>
                                    <div class="col-sm-3  mb-3">
                                        <div class="welcome-text" style="text-align: center;">
                                            <img src="{{ asset('images/imis-images/Progress-Review-banner3.jpeg') }}" style="width: 100%;height: auto;">
                                        </div>
                                    </div>
									<div class="col-sm-3  mb-3">
                                        <div class="welcome-text" style="text-align: center;">
                                            <img src="{{ asset('images/imis-images/Progress-Review-banner4.jpeg') }}" style="width: 100%;height: auto;">
                                        </div>
                                    </div>
                                </div>
								 <!-- row -->
								 <!-- row -->
                                <div class="row">
                                    <div class="col-xl-12 col-xxl-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
												<div class="component-content-wrapper">
												<h4 class="sub-component-title">Awards</div>
                                                <p style="text-align: justify;">On the conclusion of Back-To-School Campaign 2023, Minister School Education Department Punjab presented awards to the top 10 districts of Back-To-School Campaign 2023..</p>
											</div>											
                                        </div>
                                    </div>									
									<div class="col-sm-3  mb-3">
                                        <div class="welcome-text" style="text-align: center;">
                                            <img src="{{ asset('images/imis-images/awards-image-1.jpeg') }}" style="width: 100%;height: auto;">
                                        </div>
                                    </div>
									<div class="col-sm-3  mb-3">
                                        <div class="welcome-text" style="text-align: center;">
                                            <img src="{{ asset('images/imis-images/awards-image-2.jpeg') }}" style="width: 100%;height: auto;">
                                        </div>
                                    </div>
									
									<div class="col-sm-3  mb-3">
                                        <div class="welcome-text" style="text-align: center;">
                                            <img src="{{ asset('images/imis-images/awards-image-6.jpeg') }}" style="width: 100%;height: auto;">
                                        </div>
                                    </div><div class="col-sm-3  mb-3">
                                        <div class="welcome-text" style="text-align: center;">
                                            <img src="{{ asset('images/imis-images/awards-image-4.jpeg') }}" style="width: 100%;height: auto;">
                                        </div>
                                    </div>
									<div class="col-sm-3  mb-3">
                                        <div class="welcome-text" style="text-align: center;">
                                            <img src="{{ asset('images/imis-images/awards-image-5.jpeg') }}" style="width: 100%;height: auto;">
                                        </div>
                                    </div>
									
									<div class="col-sm-3  mb-3">
                                        <div class="welcome-text" style="text-align: center;">
                                            <img src="{{ asset('images/imis-images/awards-image-11.jpeg') }}" style="width: 100%;height: auto;">
                                        </div>
                                    </div><div class="col-sm-3  mb-3">
                                        <div class="welcome-text" style="text-align: center;">
                                            <img src="{{ asset('images/imis-images/awards-image-7.jpeg') }}" style="width: 100%;height: auto;">
                                        </div>
                                    </div>
									<div class="col-sm-3  mb-3">
                                        <div class="welcome-text" style="text-align: center;">
                                            <img src="{{ asset('images/imis-images/awards-image-8.jpeg') }}" style="width: 100%;height: auto;">
                                        </div>
                                    </div>
									<div class="col-sm-3  mb-3">
                                        <div class="welcome-text" style="text-align: center;">
                                            <img src="{{ asset('images/imis-images/awards-image-9.jpeg') }}" style="width: 100%;height: auto;">
                                        </div>
                                    </div>
									<div class="col-sm-3  mb-3">
                                        <div class="welcome-text" style="text-align: center;">
                                            <img src="{{ asset('images/imis-images/awards-image-12.jpeg') }}" style="width: 100%;height: auto;">
                                        </div>
                                    </div><div class="col-sm-3  mb-3">
                                        <div class="welcome-text" style="text-align: center;">
                                            <img src="{{ asset('images/imis-images/awards-image-10.jpeg') }}" style="width: 100%;height: auto;">
                                        </div>
                                    </div>
									<div class="col-sm-3  mb-3">
                                        <div class="welcome-text" style="text-align: center;">
                                            <img src="{{ asset('images/imis-images/awards-image-3.jpeg') }}" style="width: 100%;height: auto;">
                                        </div>
                                    </div>
									
                                </div>
                                <!-- row END -->
                                <div class="row">
                                    <div class="col-xl-12 col-xxl-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
												<div class="component-content-wrapper">
													<h4 class="sub-component-title">Status Of Enrollment</h4>
												</div>
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
                                </div>
                                <!-- row END -->
								<div class="row">
									<div class="col-xl-12 col-xxl-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
												<div class="component-content-wrapper">
													<h4 class="sub-component-title">IEC Material on BTS Campaign </h4>
												</div>
												<div class="row">
													<div class="col-xl-4 col-xxl-4 col-sm-4 mt-3"  style="text-align: center;">
														<a class="cta-material" href="{{ asset('images/imis-images/CEOs-Enrolment-Drive-2023-Notification.pdf') }}" target="_blank">
															<span class="cta-image">
																<svg fill="#000000" height="800px" width="800px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 611.999 611.999" xml:space="preserve">
																<g>
																	<g>
																		<g>
																			<path d="M570.107,500.254c-65.037-29.371-67.511-155.441-67.559-158.622v-84.578c0-81.402-49.742-151.399-120.427-181.203
																				C381.969,34,347.883,0,306.001,0c-41.883,0-75.968,34.002-76.121,75.849c-70.682,29.804-120.425,99.801-120.425,181.203v84.578
																				c-0.046,3.181-2.522,129.251-67.561,158.622c-7.409,3.347-11.481,11.412-9.768,19.36c1.711,7.949,8.74,13.626,16.871,13.626
																				h164.88c3.38,18.594,12.172,35.892,25.619,49.903c17.86,18.608,41.479,28.856,66.502,28.856
																				c25.025,0,48.644-10.248,66.502-28.856c13.449-14.012,22.241-31.311,25.619-49.903h164.88c8.131,0,15.159-5.676,16.872-13.626
																				C581.586,511.664,577.516,503.6,570.107,500.254z M484.434,439.859c6.837,20.728,16.518,41.544,30.246,58.866H97.32
																				c13.726-17.32,23.407-38.135,30.244-58.866H484.434z M306.001,34.515c18.945,0,34.963,12.73,39.975,30.082
																				c-12.912-2.678-26.282-4.09-39.975-4.09s-27.063,1.411-39.975,4.09C271.039,47.246,287.057,34.515,306.001,34.515z
																				 M143.97,341.736v-84.685c0-89.343,72.686-162.029,162.031-162.029s162.031,72.686,162.031,162.029v84.826
																				c0.023,2.596,0.427,29.879,7.303,63.465H136.663C143.543,371.724,143.949,344.393,143.97,341.736z M306.001,577.485
																				c-26.341,0-49.33-18.992-56.709-44.246h113.416C355.329,558.493,332.344,577.485,306.001,577.485z"/>
																			<path d="M306.001,119.235c-74.25,0-134.657,60.405-134.657,134.654c0,9.531,7.727,17.258,17.258,17.258
																				c9.531,0,17.258-7.727,17.258-17.258c0-55.217,44.923-100.139,100.142-100.139c9.531,0,17.258-7.727,17.258-17.258
																				C323.259,126.96,315.532,119.235,306.001,119.235z"/>
																		</g>
																	</g>
																</g>
																</svg>  
															</span> Notification</a>
														</div>
														<div class="col-xl-4 col-xxl-4 col-sm-4 mt-3" style="text-align: center;">
															<a class="cta-material" href="{{ asset('images/imis-images/Special-Enrollment-Campaign-Guidelines.pdf') }}" target="_blank">
																<span class="cta-image">
																	<svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path fill-rule="evenodd" clip-rule="evenodd" d="M4 5.5H9C10.1046 5.5 11 6.39543 11 7.5V16.5C11 17.0523 10.5523 17.5 10 17.5H4C3.44772 17.5 3 17.0523 3 16.5V6.5C3 5.94772 3.44772 5.5 4 5.5ZM14 19.5C13.6494 19.5 13.3128 19.4398 13 19.3293V19.5C13 20.0523 12.5523 20.5 12 20.5C11.4477 20.5 11 20.0523 11 19.5V19.3293C10.6872 19.4398 10.3506 19.5 10 19.5H4C2.34315 19.5 1 18.1569 1 16.5V6.5C1 4.84315 2.34315 3.5 4 3.5H9C10.1947 3.5 11.2671 4.02376 12 4.85418C12.7329 4.02376 13.8053 3.5 15 3.5H20C21.6569 3.5 23 4.84315 23 6.5V16.5C23 18.1569 21.6569 19.5 20 19.5H14ZM13 7.5V16.5C13 17.0523 13.4477 17.5 14 17.5H20C20.5523 17.5 21 17.0523 21 16.5V6.5C21 5.94772 20.5523 5.5 20 5.5H15C13.8954 5.5 13 6.39543 13 7.5ZM5 7.5H9V9.5H5V7.5ZM15 7.5H19V9.5H15V7.5ZM19 10.5H15V12.5H19V10.5ZM5 10.5H9V12.5H5V10.5ZM19 13.5H15V15.5H19V13.5ZM5 13.5H9V15.5H5V13.5Z" fill="#000000"/>
																		</svg>
																</span> Guidelines</a>
														</div>
														<div class="col-xl-4 col-xxl-4 col-sm-4 mt-3"  style="text-align: center;">
															<a class="cta-material" href="{{url('component5/resource-material')}}">
																<span class="cta-image">
																	<svg width="800px" height="800px" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<rect width="48" height="48" fill="#1d3768" fill-opacity="0.01"/>
																	<path d="M4 8H44" stroke="#ffffff" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
																	<path fill-rule="evenodd" clip-rule="evenodd" d="M8 8H40V34H8L8 8Z" fill="#2F88FF" stroke="#ffffff" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
																	<path d="M22 16L27 21L22 26" stroke="#1d3768" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
																	<path d="M16 42L24 34L32 42" stroke="#ffffff" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
																	</svg>
																</span> PPTs</a> 
														</div>
													</div>
												</div>
											</div>											
                                        </div>
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
@endsection



