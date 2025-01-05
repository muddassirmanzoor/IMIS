@extends('layouts.master')

@section('title', 'Policy Dialogue')

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
            name: 'Baseline(Census 2022-23)',
            data: [284316,151719, 429025, 393377 , 341665 , 368565 , 401149 , 177664 , 230196 , 335996 , 180220 , 471921 , 324143 , 181456 , 388500 , 296402 , 160358 , 367116 , 162223 , 346556 , 397209 , 231907 , 252703 , 842748 , 233484 , 152944 , 339090 , 296344 , 221053 , 394530 , 341064 , 210061 , 565706 , 636957 , 358106 , 179168]



            ,
            color: "#E91E63"

        }, {
            name: 'Current (SIS)',
            data: [298755, 157892,  445531, 409513, 356580, 383524, 415751, 183106, 233214, 349587, 185909, 485693, 337758,  201912,  404547, 322809, 166658, 393408,  164300,  369344,  404355,  237450,  257484 , 863812,  240614, 163081,  342145 , 312345 , 227614 , 402902 , 345216 , 212655 , 586311 , 651224 , 359963, 175056],
            color: "#3F51B5"

        }]
    });

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
												<h4 class="sub-component-title">Policy Dialogue</h4>
											</div>
												<p style="text-align: justify;">Within the TALEEM Programme, engaging Policy Dialogues on crucial education topics serve as a dynamic forum. Designed to bring together education experts, development partners, and policy makers, these dialogues facilitate in-depth discussions on key aspects of education. The primary objective is to foster collaborative insights that will contribute to the formulation of informed and impactful future policies, plans, and strategies in the realm of education.</p>
											</div>
                                    </div>
                                <!-- row -->
                                <div class="row">
                                    <div class="col-xl-12 col-xxl-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
												<div class="component-content-wrapper">
													<h4 class="sub-component-title">Policy Dialogue on Socio Emotional Wellbeing of Students in Schools</h4>
												</div>
												<p style="text-align: justify;">TALEEM hosted a Policy Dialogue on Socio Emotional Wellbeing of Students in Schools.<br>
Diverse panel with representation from UNICEF, Private Schools, Legal Experts along with Government Officers and  Minister School Education Department being the Chief Guest joined the discussion.</br>The dialogue concluded with very fruitful opinions from the panel followed by directives from Minister SED to draft a policy for the socio emotional well being of students which can be taken forward.</p>
											</div>											
                                        </div>
                                    </div>									
									<div class="col-sm-12  mb-3">
                                        <div class="welcome-text" style="text-align: center;">
                                            <img src="{{ asset('images/imis-images/Policy Dialogue-banner-2.jpg') }}" style="width: 70%;height: auto;">
                                        </div>
                                    </div>
                                </div>
                                <!-- row END -->
                               
								<div class="row mx-0 align-items-center">								
									<div class="col-sm-4  mb-3">
                                        <div class="welcome-text" style="text-align: center;">
                                            <img src="{{ asset('images/imis-images/Policy Dialogue-banner-3.jpeg') }}" style="width: 100%;height: auto;">
                                        </div>
                                    </div>
                                    <div class="col-sm-4  mb-3">
                                        <div class="welcome-text" style="text-align: center;">
                                            <img src="{{ asset('images/imis-images/Policy Dialogue-banner-4.jpeg') }}" style="width: 100%;height: auto;">
                                        </div>
                                    </div>
                                    <div class="col-sm-4  mb-3">
                                        <div class="welcome-text" style="text-align: center;">
                                            <img src="{{ asset('images/imis-images/Policy Dialogue-banner-5.jpeg') }}" style="width: 100%;height: auto;">
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
												<h4 class="sub-component-title">TALEEM orchestrated a thought-provoking Policy Dialogue centered on Foundational </div>
                                                <p style="text-align: justify;">Literacy and Numeracy (FLN) Camps and Afternoon School Programme (ASP). This impactful event comprised two dedicated dialogue sessions, attracting representatives from academia, policymakers, non-governmental organizations (NGOs), civil society organizations (CSOs), and education experts. The dialogue served as a vibrant platform for comprehensive discussions, fostering collaborative insights to shape the future trajectory of FLN Camps and ASP, with a collective vision for enhancing foundational education.</p>
											</div>											
                                        </div>
                                    </div>									
									<div class="col-sm-12  mb-3">
                                        <div class="welcome-text" style="text-align: center;">
                                            <img src="{{ asset('images/imis-images/KEW-banner.jpg') }}" style="width: 70%;height: auto;">
                                        </div>
                                    </div>
									<div class="col-sm-3  mb-3">
                                        <div class="welcome-text" style="text-align: center;">
                                            <img src="{{ asset('images/imis-images/KEW-banner1.jpg') }}" style="width: 100%;height: auto;">
                                        </div>
                                    </div>									
									<div class="col-sm-3  mb-3">
                                        <div class="welcome-text" style="text-align: center;">
                                            <img src="{{ asset('images/imis-images/KEW-banner2.jpg') }}" style="width: 100%;height: auto;">
                                        </div>
                                    </div><div class="col-sm-3  mb-3">
                                        <div class="welcome-text" style="text-align: center;">
                                            <img src="{{ asset('images/imis-images/KEW-banner3.jpg') }}" style="width: 100%;height: auto;">
                                        </div>
                                    </div>
									<div class="col-sm-3  mb-3">
                                        <div class="welcome-text" style="text-align: center;">
                                            <img src="{{ asset('images/imis-images/KEW-banner4.jpg') }}" style="width: 100%;height: auto;">
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

@endsection




											