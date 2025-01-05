@extends('layouts.master')

@section('title', 'Resource Material')

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
 <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				<div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body"> 
								<div class="component-content-wrapper">
									<h4 class="sub-component-title">Resource Material</h4>
								</div>
                                    <table class="table table-striped table-bordered table-hover table-highlight table-checkable sanctioned-post-quota-table str_table">
                                        <tbody>
                                            <tr>
                                                <td colspan="3" style="color: #ffffff;background: #7195cf; font-weight: bold;">PROGRESS REVIEW OF ALL DIVISIONS ON SPECIAL ENROLLMENT CAMPAIGN 2023</td>
                                            </tr>
                                            <tr>
                                                <th style=" background: #bac9e3;">Sr#</th>
                                                <th style=" background: #bac9e3;">Activity</th>
                                                <th style=" background: #bac9e3;">Description</th>
                                            </tr>
                                            <tr style="font-family: 'Roboto', sans-serif;font-weight: 200;font-size: 13px;">
                                                <th>1</th>
                                                <th> Progress Review of Gujranwala Division</th>
                                                <th><a href="{{ asset('ppt/Progress-Review-Gujranwala.pptx') }}" target=_blank"> Status of School Enrollment, Target, Status (PowerPoint)</a></th>
                                            </tr>
                                            <tr style="font-family: 'Roboto', sans-serif;font-weight: 200;font-size: 13px;">
                                                <th>2</th>
                                                <th>Progress Review of Faisalabad Division</th>
                                                <th> <a href="{{ asset('ppt/Progress-Review-Faisalabad.pptx') }}" target=_blank">Status of School Enrollment, Target, Status (PowerPoint)</a></th>
                                            </tr>
                                            <tr style="font-family: 'Roboto', sans-serif;font-weight: 200;font-size: 13px;">
                                                <th>3</th>
                                                <th>Progress Review of Lahore Division</th>
                                                <th><a href="{{ asset('ppt/Progress-Review-Lahore.pptx') }}" target=_blank"> Status of School Enrollment, Target, Status (PowerPoint)</a></th>
                                            </tr>
                                            <tr style="font-family: 'Roboto', sans-serif;font-weight: 200;font-size: 13px;">
                                                <th>4</th>
                                                <th>Progress Review of Rawalpindi Division</th>
                                                <th><a href="{{ asset('ppt/Progress-Review-Rawalpindi.pptx') }}" target=_blank"> Status of School Enrollment, Target, Status (PowerPoint)</a></th>
                                            </tr>
                                            <tr style="font-family: 'Roboto', sans-serif;font-weight: 200;font-size: 13px;">
                                                <th>5</th>
                                                <th>Progress Review of Sahiwal Division</th>
                                                <th><a href="{{ asset('ppt/Progress-Review-Sahiwal.pptx') }}" target=_blank"> Status of School Enrollment, Target, Status (PowerPoint)</a></th>
                                            </tr>
                                            <tr style="font-family: 'Roboto', sans-serif;font-weight: 200;font-size: 13px;">
                                                <th>6</th>
                                                <th>Progress Review of Multan Division</th>
                                                <th><a href="#" target=_blank"> Status of School Enrollment, Target, Status (PowerPoint)</a></th>
                                            </tr>
                                            <tr style="font-family: 'Roboto', sans-serif;font-weight: 200;font-size: 13px;">
                                                <th>7</th>
                                                <th>Progress Review of DG Khan Division</th>
                                                <th><a href="{{ asset('ppt/Progress-Review-DG-Khan.pptx') }}" target=_blank"> Status of School Enrollment, Target, Status (PowerPoint)</a></th>
                                            </tr>
                                            <tr style="font-family: 'Roboto', sans-serif;font-weight: 200;font-size: 13px;">
                                                <th>8</th>
                                                <th>Progress Review of Sargodha Division</th>
                                                <th><a href="#" target=_blank"> Status of School Enrollment, Target, Status (PowerPoint)</a></th>
                                            </tr>
                                            <tr style="font-family: 'Roboto', sans-serif;font-weight: 200;font-size: 13px;"> 
                                                <th>9</th>
                                                <th>Progress Review of Bahawalpur Division</th>
                                                <th><a href="#" target=_blank"> Status of School Enrollment, Target, Status (PowerPoint)</a></th>
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



