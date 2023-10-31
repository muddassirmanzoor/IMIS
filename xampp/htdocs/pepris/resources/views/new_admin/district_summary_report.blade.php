@extends('new_layouts.admin')
@section('content')

<style>
    .info-box .content .text {
        font-size: 12px;
        margin-top: 4px;
    }
</style>

<!-- JQuery DataTable Css -->
<link href="{{asset('new_admin/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" id="style_sheet" href="{{asset('/vendor_plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css')}}">
<div class="block-header">
    <div class="font-20 font-bold">
        District Summary Report
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
        <div class="card">
            <div class="body">
                <div class="row clearfix">
                    <form autocomplete="off" method="post" action="{{route('stats')}}" name="summary_form" id="summary_form" enctype="multipart/form-data">

                        @csrf
                        <div class="row clearfix">
                            <div class="col-md-12 card pt-30 pb-15">
                                <div class="col-md-3 col-sm-4 plr-8">
                                    <div class="cus_card bg_1">
                                        <div class="card_icon">
                                            <img src="{{asset('/new_admin/images')}}/icon_1.png" alt="">
                                        </div>
                                        <div class="cus_card_info">
                                            <div class="amount">{{ number_format($totalValidLicenses) }}</div>
                                            <div class="title">Valid eLicenses</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 plr-8">
                                    <div class="cus_card bg_4">
                                        <div class="card_icon">
                                            <img src="{{asset('/new_admin/images')}}/icon_4.png" alt="">
                                        </div>
                                        <div class="cus_card_info two_lines">
                                            <div class="amount">{{ number_format($totalPending) }}</div>
                                            <div class="title">Pending Applications <br>(for CEO Approval)</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 plr-8">
                                    <div class="cus_card bg_8">
                                        <div class="card_icon">
                                            <img src="{{asset('/new_admin/images')}}/icon_7.png" alt="">
                                        </div>
                                        <div class="cus_card_info two_lines">
                                            <div class="amount">{{ number_format($totalPendingObjections) }}</div>
                                            <div class="title">Pending Objections <br>(from CEO)</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 plr-8">
                                    <div class="cus_card bg_6">
                                        <div class="card_icon">
                                            <img src="{{asset('/new_admin/images')}}/icon_4.png" alt="">
                                        </div>
                                        <div class="cus_card_info two_lines">
                                            <div class="amount">{{ number_format($totalPendingVerificatios) }}</div>
                                            <div class="title">Pending Verifications <br>(from school owners)</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-18 table-responsive">
                                <table id="example" class="table table-striped table-hover app-tbl">

                                    <thead>
                                        <tr>
                                            <th style="text-align: left;">Tehsil <br /><small>Name</small></th>
                                            <th style="text-align: center;">Total <br /><small>Schools</small></th>
                                            <th style="text-align: center;">Valid eLicense <br /><small>Schools</small></th>
                                            <th style="text-align: center;">Expired eLicense <br /><small>Schools</small></th>
                                            <th style="text-align: center;">Pending Approval <br /><small>New Registrations</small></th>
                                            <th style="text-align: center;">Pending Approval <br /><small>Already Registered</small></th>
                                            <th style="text-align: center;">Pending Approval <br /><small>Renewal</small></th>
                                            <th style="text-align: center;">Pending Approval <br /><small>Fee Already Paid</small></th>
                                            <!--<th style="text-align: center;">Pending Approval <br /><small>From CEO</small></th>
                                            <th style="text-align: center;">Pending Approval <br /><small>School Applications</small></th>
                                            <th style="text-align: center;">Pending Approval <br /><small>Department Applications</small></th>-->
                                            <th style="text-align: center;">Pending Objections <br /><small>Raised by Schools</small></th>
                                            <th style="text-align: center;">Pending Verifications <br /><small>From School Owners</small></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?= $tableTDs ?>
                                    </tbody>
                                    <tfoot>
                                        <?= $tableFooter ?>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div>


</div>


</div>

@endsection