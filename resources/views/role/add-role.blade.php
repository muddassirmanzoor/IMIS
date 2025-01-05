@extends('layouts.master')

@section('title', 'Add Role')

@section('content')
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">

                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Add Role</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">User</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Add Role</a></li>
                        </ol>
                    </div>
                </div>

				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-lg-12">
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header bg-primary">
										<div class="row">
											<div class="col-lg-8">
												<h3 class="mb-1 text-white">Add Role
											</div>
										</div>
									</div>
									<div class="card-body">
                                <form action="#" method="post">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">User Role</label>
												<input type="text" class="form-control">
											</div>
										</div>																			
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Role</label>
												<select class="form-control"  name="tupe">
													<option value="Administrator">Administrator</option>
													<option value="Editor">Editor</option>
													<option value="Author">Author</option>
													<option value="Contributor">Contributor</option>
													<option value="Subscriber">Subscriber</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12">
											<button type="submit" class="btn btn-primary">Add Role</button>
										</div>
									</div>
								</form>
                            </div>
								</div> <!-----Card End----->
							</div> <!-----col-lg-12 End----->
						</div>
					</div>
				</div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
@endsection
