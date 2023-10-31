@extends('new_layouts.admin')
@section('content')
<style>
    tr.bg-light-red{
        background-color: #f57979 !important;
        color: #fff !important;
    }
    tr.bg-light-red:hover{
        background-color: #ff0000 !important;
        color: #fff !important;
    }
    div.dataTables_wrapper div.dataTables_length select{
        width: 50px !important;
    }
</style>
<!-- JQuery DataTable Css -->
<link href="{{asset('new_admin/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" id="style_sheet" href="{{asset('/vendor_plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css')}}">
<div class="block-header">
    <div class="font-20 font-bold">
        Fee Challans
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group m-b-0">
        <div class="card m-b-0">
            <div class="body">
                <div class="row clearfix">
                    <form autocomplete="off" method="post" action="{{route('ceo-feechallans')}}" name="summary_form" id="summary_form" enctype="multipart/form-data">
                        @csrf
                        <div class="col-sm-2">
                            <label>Challan Fee Status</label>
                            <div class="form-line">
                                <select class="form-control" name="fee_status">
                                    <option value="">Select Status</option>
                                    <option value="2" <?= (request('fee_status') == '2' ? 'selected' : '') ?>>Fee Paid</option>
                                    <option value="1" <?= (request('fee_status') == '1' ? 'selected' : '') ?>>Fee Pending</option>
                                </select>
                            </div>
                        </div>
                        <!--<div class="col-sm-2">
                            <label>Challan Expiry</label>
                            <div class="form-line">
                                <select class="form-control" name="pending_challan">
                                    <option value="">Select Expiry</option>
                                    <option value="valid" <?= (request('pending_challan') == 'valid' ? 'selected' : '') ?>>Valid Unpaid</option>
                                    <option value="expired" <?= (request('pending_challan') == 'expired' ? 'selected' : '') ?>>Expired Unpaid</option>
                                </select>
                            </div>
                        </div>-->
                        <div class="col-sm-2 overdue-hide">
                            <label>Start Date</label>
                            <div class="form-line dateStart_wrap">
                                <input type="text" id="dateStart" class="form-control aap-form-fields datepicker" placeholder="Start Date" value="{{$start_date}}" name="dateStart">
                            </div>
                        </div>

                        <div class="col-sm-2 overdue-hide">
                            <label>End Date</label>
                            <div class="form-line dateEnd_wrap">
                                <input type="text" id="dateEnd" class="form-control aap-form-fields datepicker" placeholder="End Date" value="{{$end_date}}" name="dateEnd">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-1 m-t-25">
                            <button type="button" class="btn btn-warning btn-block waves-effect" onclick="location.href ='{{URL::to('/ceo-feechallans')}}'">
                                Reset
                            </button>
                        </div>

                        <div class="col-md-2 m-t-25">
                            <button type="submit" class="btn btn-info btn-block waves-effect">Apply Filter (s)</button>
                            <a href="javascript:void(0)" target="_blank" class="hidden new_tab"></a>
                        </div>
                        

                        <div class="col-md-10 m-t-25">
                            <a href="javascript:void(0)" style="width:150px;" class="download_report pull-right btn btn-primary btn-block waves-effect" data-url="{{route('download_feechallans')}}" class="new_tab">Download</a>
                        </div>
                        
                    </form>

                </div>
                <div class="row clearfix">
                    <div class="content-area" style="padding: 10px; margin-top: 25px;">
                        <table class="table table-striped table-hover app-tbl" id="myTable">

                            <thead>

                                <tr>

                                    <th class="text-left">Application Type</th>
                                    <th class="text-left">Tehsil</th>
                                    <th class="text-left" style="width: 150px">Institute Name</th>
                                    <th class="text-left">School Level</th>
                                    <th class="text-left" style="width: 120px">Status</th>
                                    <th class="text-left">PSID</th>
                                    <th class="text-left">Total Fee</th>
                                    <th class="text-left">Expiry Date</th>
                                    <th class="text-left">Challan Status</th>

                                </tr>

                            </thead>

                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Jquery DataTable Plugin Js -->
<script src="{{asset('new_admin/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
<script src="{{asset('new_admin/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('new_admin/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('new_admin/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>

<script src="{{asset('/vendor_plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('/js/jquery.validate.min.js')}}"></script>
<script>
                                                            function loadDataTable()
                                                            {
                                                                $('table#myTable').DataTable(
                                                                        {
                                                                            "pageLength": 50,
                                                                            "processing": true,
                                                                            "searching": true,
                                                                            "search": {
                                                                                "regex": true
                                                                            },
                                                                            "serverSide": true,
                                                                            "ajax": {
                                                                                url: "<?= URL::to('get_ceo_fee_challans') ?>",
                                                                                type: 'POST',
                                                                                data: {
                                                                                    'post_params': '<?= json_encode($_POST) ?>',
                                                                                    'get_params': '<?= json_encode($_GET) ?>'
                                                                                }
                                                                            },
                                                                            "order": [[10, "desc"]],
                                                                            "columns": [
                                                                                {"searchable": false, "orderable": false},
                                                                                {"searchable": false, "orderable": false},
                                                                                {"name": 'institute_name', "searchable": true, "orderable": true},
                                                                                {"searchable": false, "orderable": false},
                                                                                {"searchable": false, "orderable": false},
                                                                                {"searchable": false, "orderable": false},
                                                                                {"searchable": false, "orderable": false},
                                                                                {"searchable": false, "orderable": false},
                                                                                {"searchable": false, "orderable": false},
                                                                                {"searchable": false, "orderable": false, 'visible': false},
                                                                                {"searchable": false, "orderable": false, 'visible': false}
                                                                            ],
                                                                            "fnDrawCallback": function (settings, json) {
                                                                                $('[data-toggle="tooltip"]').tooltip();
                                                                            },
                                                                            "rowCallback": function (row, data, index) {

                                                                            }
                                                                        });
                                                            }
                                                            $(document).ready(function () {
                                                                loadDataTable();
                                                                $('[data-toggle="tooltip"]').tooltip();
                                                            });
</script>
<script type="text/javascript">
    $(document).ready(function () {

        $('#dateStart').datepicker({
            format: 'dd-mm-yyyy',
            endDate: '+0d',
            autoclose: true,
            orientation: "bottom",
            container: ".dateStart_wrap",
            clearBtn: "true"
                    // update "toDate" defaults whenever "fromDate" changes
        }).on('changeDate', function () {
            // set the "toDate" start to not be later than "fromDate" ends:
            $('#dateEnd').datepicker('setStartDate', new Date($(this).val()));
        });

        $('#dateEnd').datepicker({
            format: 'dd-mm-yyyy',
            endDate: '+0d',
            autoclose: true,
            orientation: "bottom",
            container: ".dateEnd_wrap",
            clearBtn: "true"
                    // update "fromDate" defaults whenever "toDate" changes
        }).on('changeDate', function () {
            // set the "fromDate" end to not be later than "toDate" starts:
            $('#dateStart').datepicker('setEndDate', new Date($(this).val()));
        });

        $('a.download_report').click(function () {
            reqUrl = $(this).attr('data-url');
            $.ajax({
                url: reqUrl,
                method: 'GET',
                dataType: 'JSON',
                data: {
                    'post_params': '<?= json_encode($_POST) ?>',
                    'get_params': '<?= json_encode($_GET) ?>'
                },
                success: function (response) {
                    $('div.page-loader-wrapper').hide();
                    if (response.success) {
                        window.location.href = '{{URL::to("upload/reports/")}}/' + response.filename;
                    }
                }
            });
        });

    });

</script>
@endsection