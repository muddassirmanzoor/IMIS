@extends('layouts.master')

@section('title', 'Edit User')

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
                            <h4>Edit User</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">User</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Edit User</a></li>
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
												<h3 class="mb-1 text-white">Edit User
											</div>
										</div>
									</div>
									<div class="card-body">
                                <form action="#" method="post">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Name</label>
												<input type="text" class="form-control">
											</div>
										</div>																			
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Type</label>
												<select class="form-control"  name="tupe">
													<option value="Administrator">Administrator</option>
													<option value="Editor">Editor</option>
													<option value="Author">Author</option>
													<option value="Contributor">Contributor</option>
													<option value="Subscriber">Subscriber</option>
												</select>
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Districts</label>
												<select class="districts form-control" name="districts">
													<option value="">All Districts</option>
													<option value="1">ATTOCK</option>
													<option value="2">BAHAWALNAGAR</option>
													<option value="3">BAHAWALPUR</option>
													<option value="4">BHAKKAR</option>
													<option value="5">CHAKWAL</option>
													<option value="6">CHINIOT</option>
													<option value="7">D.G. KHAN</option>
													<option value="8">FAISALABAD</option>
													<option value="9">GUJRANWALA</option>
													<option value="10">GUJRAT</option>
													<option value="11">HAFIZABAD</option>
													<option value="12">JHANG</option>
													<option value="13">JHELUM</option>
													<option value="14">KASUR</option>
													<option value="15">KHANEWAL</option>
													<option value="16">KHUSHAB</option>
													<option value="17">LAHORE</option>
													<option value="18">LAYYAH</option>
													<option value="19">LODHRAN</option>
													<option value="20">MANDI BAHA UD DIN</option>
													<option value="21">MIANWALI</option>
													<option value="22">MULTAN</option>
													<option value="23">MUZAFFARGARH</option>
													<option value="24">NANKANA SAHIB</option>
													<option value="25">NAROWAL</option>
													<option value="26">OKARA</option>
													<option value="27">PAKPATTAN</option>
													<option value="28">RAHIMYAR KHAN</option>
													<option value="29">RAJANPUR</option>
													<option value="30">RAWALPINDI</option>
													<option value="31">SAHIWAL</option>
													<option value="32">SARGODHA</option>
													<option value="33">SHEIKHUPURA</option>
													<option value="34">SIALKOT</option>
													<option value="35">T.T.SINGH</option>
													<option value="36">VEHARI</option>
												</select>
											</div>
										</div>	
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Email</label>
												<input type="text" class="form-control"  name="email">
											</div>
										</div>										
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Password</label>
												<input type="password" class="form-control"  name="password">
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Confirm Password</label>
												<input type="password" class="form-control" name="password">
											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12">
											<button type="submit" class="btn btn-primary">Update User</button>
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
