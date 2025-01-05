
        <!-- Student Search Modal  Start -->
        <div class="modal fade" id="studentSearchModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header card-header bg-primary ">
                        <h3 class="mb-1 text-white">Search SED Student</h3>
                        <button type="button" class="close" data-dismiss="modal"><span style="color: #ffffff;">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{'/search-sed-student'}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 ">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="cnic" placeholder="Father CNIC No">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                    <div class="form-group">
                                        <label class="form-label">OR</label>
                                        <input type="text" class="form-control" name="b_form" placeholder="B-Form">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                    <div class="form-group">
                                        <label class="form-label">OR</label>
                                        <input type="text" class="form-control" name="emis_code" placeholder="EMIS Code">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 text-right">
                                    <button type="submit" class="btn btn-primary">Search Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Student Search Modal  END -->
<!--**********************************
    Footer start
***********************************-->
<div class="footer">
    <div class="copyright">
        <p>Copyright © Designed &amp; Developed by PMIU Data Center 2023</p>
    </div>
</div>
<!--**********************************
    Footer end
***********************************-->
