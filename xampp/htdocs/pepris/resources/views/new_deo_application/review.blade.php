@extends('new_layouts.admin')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<link rel="stylesheet" href="{{asset('/css/lightbox.css')}}">
<link rel="stylesheet" type="text/css" id="style_sheet" href="{{asset('/vendor_plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css')}}">
<style>
	span.like-btn {
    border-radius: 16px;
}
</style>
<!-- Bootstrap Select Css -->
<link href="{{asset('new_admin/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
<div class="block-header">
	<div class="font-20">Application Review</div>
</div>

<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="body">
				<div class="row clearfix">
					<div class="col-xs-12">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs tab-nav-right font-15" role="tablist">
							@if($review_count)
							<li role="presentation" class="active"><a href="#home_animation_1" data-toggle="tab"> Application Review History Log ({{$review_count}}) </a></li>
							@endif
							<li role="presentation" class=" {{(!$review_count) ? 'active' : ''}}"><a href="#profile_animation_2" data-toggle="tab"> Application Details {{ application_status($school->status) }}</a></li>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content">
							@if($review_count)
							<div role="tabpanel" class="tab-pane animated active" id="home_animation_1">
								<div class="table-responsive">
									@if (!in_array($school->status, array(0,1)))
									<small>( Please consider to re-submit your application after fixing the listed issues )</small>
									@endif

									{!! application_review_history($school->id) !!}
								</div>
							</div>
							@endif

							<div role="tabpanel" class="tab-pane animated {{(!$review_count) ? 'active' : ''}}" id="profile_animation_2">
								<div class="row">
									<div class="col-md-12 font-15">
										<form autocomplete="off" method="post" action="{{URL::to('update-application/'.md5($school->id))}}" name="registration_form_deo_review" id="registration_form_deo_review" enctype="multipart/form-data">

											@csrf
											<div class="row">
												<div class="col-md-12 font-15">
													<input class="bg-orange" type="radio" disabled  id="registered_already" name="registered" value="1"  {{(@$school->is_already_registered == 1) ? 'checked': '' }}/>
													<label for="radio_1"> Already Registered </label>
												</div>
												<div class="col-md-12 form-group">
													<div class="section_title">
														<span class="bg-blue">Basic School Profile</span>
													</div>
													<div class="row">
														<div class="col-md-3">
															<label>District <span class="astrik">*</span></label>
															<select class="form-control" name="distrit_id" id="DistrictId" disabled>
																<option value=""  selected>Select District</option>
																@foreach($districts as $district)
																<option {{@$school->district_id == $district->id ?'selected':'' }} value="{{ $district->id }}">{{ $district->DistrictName }}</option>
																@endforeach
															</select>
															<input type="hidden" name="DistrictId" value="{{@$school->district_id}}" />
														</div>

														<div class="col-md-3">
															<label class="login-label">Tehsil <span class="astrik">*</span></label>
															<select class="form-control open_other" disabled="true" name="TehsilId" id="TehsilId">
																<option value="" disabled  selected>Select Tehsil</option>
															</select>
														</div>

														<div class="col-md-3" >
															<label>School Name <span class="astrik">*</span></label>
															<div class="form-line">
																<input required  maxlength="150" id="institute_name" name="institute_name" value="{{@$school->institute_name}}" type="text" placeholder="School Name" class="form-control open_other" disabled onkeyup="this.value = this.value.toUpperCase();">
																<p style="display:none" class="school-error bg-red p-5"></p>
															</div>
														</div>                                                                               
														<div class="col-md-3">

															<?php
															$sch_type = @$school->institute_type;
															?>

															<label>Nature of School <span class="astrik">*</span></label>
															<select required  class="form-control open_other" disabled id="institute_type" name="institute_type" >
																<option value="" disabled  selected>Select</option>
																<option value="Individual" {{($sch_type== 'Individual') ?'selected':'' }}>Individual</option>
																<option value="Branch" {{($sch_type == 'Branch') ?'selected':'' }}>Branch</option>
																<option value="Franchise" {{($sch_type == 'Franchise') ?'selected':'' }}>Franchise</option> 
															</select>
														</div>                                                                                 
														<div class="col-md-3">

															<?php
															$natureOfManagement = getNatureOfManagementOptions();
															$natureOfManagementValue = @$school->nature_of_management;
															?>

															<label class="">Nature of Management<span class="astrik">*</span></label>
															<select required  class="form-control open_other" disabled id="nature_of_management" name="nature_of_management" >
																<option value="" disabled  selected>Select</option>
																@foreach($natureOfManagement as $option)
																<option value="{{$option}}" {{($natureOfManagementValue== $option) ?'selected':'' }}>{{$option}}</option>
																@endforeach
															</select>
														</div>

														<div class="col-md-3">
															<label>School Level <span class="astrik">*</span></label>
															<select required class="form-control open_other" disabled id="institute_level" name="institute_level">
																<?=instituteLevelDropDown(@$school->institute_level)?>
															</select>
														</div>
														<div class="col-md-3" id="affiliation" style="display:{{(in_array(@$school->institute_level, array(4, 3)) ? 'block' : 'none')}}">
															<label>Affiliation with BISE</label>
															<div class="form-control">
																<input type="radio" class="bg-orange open_other" disabled value="1" {{(@$school->bise_affiliation) ? 'checked' : false}} id="affilited_with_bise_yes" name="bise_affiliation" />
																<label for="affilited_with_bise_yes"> Yes</label>
																<input type="radio" class="bg-orange open_other" disabled value="0" {{(!@$school->bise_affiliation) ? 'checked' : false}} id="affilited_with_bise_no" name="bise_affiliation" />
																<label for="affilited_with_bise_no"> No</label>
															</div>
														</div>
														<div class="col-md-3">
															<label>School Gender <span class="astrik">*</span></label>
															<select class="form-control open_other" disabled name="gender" id="gender">
																<option value="" disabled  selected>Select Gender</option>
																@foreach($genders as $gender)
																<option {{@$school->gender == $gender->id ?'selected':'' }} {{(@$school->institute_level != 1 && $gender->id == 5) ? 'disabled' : ''}} value="{{ $gender->id }}">{{ $gender->school_gender }}</option>
																@endforeach
															</select>
														</div>
														<?php
														$yearDropDown = getYearDropDown();
														?>
														<div class="col-md-3">
															<label class="">Year Established<span class="astrik">*</span></label>
															<select class="form-control open_other" disabled required name="date_of_establishment" id="date_of_establishment">
																<option value="" disabled  selected>Select Year</option>
																@foreach($yearDropDown as $year)
																<option {{@$school->date_of_establishment == $year ?'selected':'' }} value="{{ $year }}">{{ $year }}</option>
																@endforeach
															</select>
														</div>
														<div class="col-md-3">
															<label>School building status <span class="astrik">*</span></label>
															<select required  class="form-control open_other" disabled id="building_status" name="building_status">
																<option value="" disabled  selected>Select</option>
																<option value="Owned" {{(@$school->building_status == 'Owned') ?'selected':'' }}>Owned</option>
																<option value="Rented" {{(@$school->building_status == 'Rented') ?'selected':'' }}>Rented</option>
															</select>
														</div>
														<div class="col-md-3">
															<label>Postal Address <span class="astrik">*</span></label>
															<div class="form-line">
																<input maxlength="255" required  type="text" class="form-control restrictCharacter open_other" disabled value="{{@$school->institute_address}}" placeholder="Postal Address" id="institute_address" name="institute_address">
															</div>
														</div>

														<div class="col-md-3">
															<label>Postal City <span class="astrik">*</span></label>
															<select required  class="form-control select2 open_other" disabled id="postal_city" name="postal_city">
																<option value="" disabled  selected>Select Postal City</option>
															</select>
														</div>

														@if($meta_fields)

														@foreach($meta_fields as $field)

														<?php
														$metaFieldData = populate_field_html_scripts($field, @$school->id);
														?>

														<?=$metaFieldData['html']?>
														<?=$metaFieldData['js']?>

														@endforeach

														@endif
														</div>
														</div>
														<div class="col-md-12 form-group">
															<div class="section_title">
																<span class="bg-blue">Contact Information</span>
															</div>
															<div class="row">

																	@include('new_school/display_owner_contacts_review_deo')
																	<div class="clearfix"></div>
																	<hr />

																	<div class="col-md-3" >
																		<label>Principal/Administrator Name</label>
																		<div class="form-line">
																			<input maxlength="60" type="text" class="form-control open_other" disabled placeholder="Name" name="principle_admin_name" value="{{@$school->getSchool->principle_admin_name}}">
																		</div>
																	</div>

																	<div class="col-md-3" >
																		<label>Principal/Administrator Designation/Job-Title</label>
																		<div class="form-line">
																			<input maxlength="60" type="text" class="form-control open_other" disabled placeholder="Designation or Job Title" name="principle_admin_job" value="{{@$school->getSchool->principle_admin_job}}">
																		</div>
																	</div>
																	<div class="col-md-3" >
																		<label>Principal/Administrator CNIC</label>
																		<div class="form-line">
																			<input maxlength="13" oninput="numberOnly(this.id);" type="text" class="form-control open_other" disabled placeholder="Enter CNIC" name="principle_admin_cnic" id="principle_admin_cnic" value="{{@$school->getSchool->principle_admin_cnic}}">
																		</div>
																	</div>

																	<div class="col-md-3" >
																		<label>Principal/Administrator Phone Number</label>
																		<div class="form-line">
																			<input maxlength="11" oninput="numberOnly(this.id);" type="text" class="form-control open_other" disabled placeholder="Enter Phone number" name="principle_admin_contact_number" id="principle_admin_contact_number" value="{{@$school->getSchool->principle_admin_contact_number}}">
																		</div>
																	</div>


																	<div class="col-md-3" >
																		<label>Principal/Administrator Email </label>
																		<div class="form-line">
																			<input maxlength="255" type="email" disabled class="form-control open_other" disabled placeholder="Email" name="principle_admin_email" value="{{@$school->getSchool->principle_admin_email}}">
																		</div>
																	</div>
																	<div class="col-md-3" >
																		<label>Contact Person Name</label>
																		<div class="form-line">
																			<input maxlength="60" type="text" class="form-control open_other" placeholder="Name" name="contact_person_name" disabled value="{{@$school->getSchool->contact_person_name}}">
																		</div>
																	</div>
																	<div class="col-md-3" >
																		<label>Contact Person Designation/Job-Title</label>
																		<div class="form-line">
																			<input maxlength="60" type="text" class="form-control open_other" placeholder="Designation or Job Title" name="contact_person_job" disabled value="{{@$school->getSchool->contact_person_job}}">
																		</div>
																	</div>

																	<div class="col-md-3" >
																		<label>Contact Person CNIC</label>
																		<div class="form-line">
																			<input maxlength="13" oninput="numberOnly(this.id);" type="text" class="form-control open_other" placeholder="Enter CNIC" name="contact_person_cnic" id="contact_person_cnic" disabled value="{{@$school->getSchool->contact_person_cnic}}">
																		</div>
																	</div>
																	<div class="clearfix"></div>
																	<div class="col-md-3" >
																		<label>Contact Person Phone Number</label>
																		<div class="form-line">
																			<input maxlength="11" oninput="numberOnly(this.id);" type="text" class="form-control open_other" placeholder="Enter Phone number" name="contact_person_contact_number" id="contact_person_contact_number" disabled value="{{@$school->getSchool->contact_person_contact_number}}">
																		</div>
																	</div>

																	<div class="col-md-3" >
																		<label>Contact Person Email </label>
																		<div class="form-line">
																			<input maxlength="255" type="email" class="form-control open_other" placeholder="Email" name="contact_person_email" disabled value="{{@$school->getSchool->contact_person_email}}">
																		</div>
																	</div>

															</div>
															</div>
@if($school->is_already_registered >= 1)
															<div class="col-md-12 form-group" <?php if(@$school->is_already_registered == 0){?>style="display:none;" <?php }?>>
															<div class="section_title">
																<span class="bg-blue">Registration Information</span>
															</div>

															<div class="row">

																<div class="col-md-4" >
																	<label>Registration Number  <span class="astrik">*</span></label>
																	<div class="form-line">
																		<input required maxlength="60" type="text" class="form-control open_other" disabled="true" placeholder="Registration Number" id="registration_number" name="registration_number" value="{{@$school->registration_number}}" required>
																	</div>
																</div>

																<div class="col-md-4">
																	<label>Registration Date  <span class="astrik">*</span></label>
																	<div class="form-line">
																		<input required maxlength="10" type="text" class="form-control reg_date_from open_other" disabled="true" placeholder="Registration Date" id="registration_date" name="registration_date" value="{{date('m/d/Y', strtotime(@$school->registration_date))}}" required>
																	</div>
																</div>

																<div class="col-md-4">
																	<label>eLicense valid till  <span class="astrik">*</span></label>
																	<div class="form-line m-b-10">
																		<input maxlength="10" type="text" class="form-control reg_date_to open_other" disabled="true" placeholder="eLicense valid till" id="registration_valid_till" name="registration_valid_till" value="{{(strtotime($school->registration_valid_till) >= strtotime($regimeEnd)) ? date('m/d/Y', strtotime($regimeEnd)) : date('m/d/Y', strtotime(@$school->registration_valid_till))}}">
																	</div>

																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<label class="registration_document">Upload Registration Certificate <b>(Only for already registered school)</b> <span class="astrik">*</span></label>
																		<input type="file" name="certificate" class="form-control open_other" disabled="true" style="height: auto;" id="certificate" onChange="validateFileExtesntion(this)" >
																	</div>


																	@if(!is_null(@$school->certificate))

																	<?php
																	$csource = read_file('/uploads', @$school->certificate);
																	$cert = @$school->certificate;

																	$attributes = 'data-lightbox="certificate" data-title="Registration Certificate"';

																	if(strpos($cert, '.pdf')){
																		$csource = URL::to('/img/iconn_pdf.png');
																		$attributes = 'target="_blank"';
																	}
																	?>
																	<div class="col-md-3">
																		<a <?=$attributes?> class="lightbox_image" data-toggle="tooltip" href="{{read_file('/uploads', @$school->certificate)}}"><img style="max-width: 100%" class="lightbox_image img-responsive thumbnail" data-toggle="tooltip" id="certificate_picture" src="{{ $csource }}" /></a>
																	</div>
																	@else
																	<div class="col-md-3" style="display: none">
																		<a data-lightbox="certificate" data-title="Registration Certificate" class="lightbox_image" data-toggle="tooltip" href="{{URL::to('/uploads/no-certificate.png')}}"><img style="max-width: 100%" class="lightbox_image img-responsive thumbnail" data-toggle="tooltip" id="certificate_picture"  src="{{URL::to('/uploads/no-certificate.png')}}" /></a>
																	</div>
																	@endif
																</div>


															</div>
															</div>
															@endif
															<!---->
															<div class="col-md-12 form-group">
																<div class="section_title">
																	<span class="bg-blue">Building Fitness/Hygenic Information</span>
																</div>
																<div class="row">
																	<div class="col-md-3" >
																		<label>Building Fitness Certificate Number <span class="astrik">*</span></label>
																		<div class="form-line">
																			<input required maxlength="60" type="text" class="form-control open_other" placeholder="Building Fitness Certificate Number" id="building_certificate_number" disabled="true" name="building_certificate_number" value="{{@$school->building_certificate_number}}" required>
																		</div>
																	</div>

																	<div class="col-md-3">
																		<label>Building Fitness Certificate Issuance Date <span class="astrik">*</span></label>
																		<div class="form-line">
																			<input required maxlength="10" type="text" class="form-control cert_date_from open_other" placeholder="Building Fitness Certificate Issuance Date" id="building_certificate_issue_date" name="building_certificate_issue_date" value="{{date('m/d/Y', strtotime(@$school->building_certificate_issue_date))}}" disabled="true" required>
																		</div>
																	</div>

																	<div class="col-md-3">
																		<label>Building Fitness Certificate Valid Till <span class="astrik">*</span></label>
																		<div class="form-line">
																			<input maxlength="10" type="text" class="form-control cert_date_to open_other" placeholder="Building Fitness Certificate Valid Till" id="building_certificate_valid_date" disabled="true" name="building_certificate_valid_date" value="{{date('m/d/Y', strtotime(@$school->building_certificate_valid_date))}}" required>
																		</div>
																	</div>

																	<div class="col-md-3">
																		<label>Issued By</label>
																		<div class="form-line">
																			<input maxlength="150" type="text" disabled="true" class="form-control open_other" placeholder="Issued By" id="issued_by" name="issued_by" value="{{@$school->issued_by}}">
																		</div>
																	</div>

																	<div class="col-md-4">
																		<div class="form-group">
																			<label>Upload Building Certificate <span class="astrik">*</span></label>
																			<input type="file" name="building_certificate" class="form-control open_other" disabled="true" style="height: auto;" id="building_certificate" onChange="validateFileExtesntion(this)" >
																		</div>


																		@if(!is_null(@$school->building_certificate))

																		<?php
																		$source = read_file('/uploads/building_certificates', @$school->building_certificate);
																		$build_cert = @$school->building_certificate;

																		$attributes = 'data-lightbox="certificate" data-title="Building Certificate"';

																		if(strpos($build_cert, '.pdf')){
																			$source = URL::to('/img/iconn_pdf.png');
																			$attributes = 'target="_blank"';
																		}
																		?>
																		<div class="col-md-3">
																			<a <?=$attributes?> class="lightbox_image" data-toggle="tooltip" href="{{read_file('/uploads/building_certificates', @$school->building_certificate)}}"><img style="max-width: 100%" class="lightbox_image img-responsive thumbnail" data-toggle="tooltip" id="building_certificate_picture" src="{{ $source }}" /></a>
																		</div>
																		@else
																		<div class="col-md-3" style="display: none">
																			<a data-lightbox="certificate" data-title="Building Certificate" class="lightbox_image" data-toggle="tooltip" href="{{URL::to('/uploads/no-certificate.png')}}"><img style="max-width: 100%" class="lightbox_image img-responsive thumbnail" data-toggle="tooltip" id="building_certificate_picture"  src="{{URL::to('/uploads/no-certificate.png')}}" /></a>
																		</div>
																		@endif



																	</div>

																	<div class="clearfix"></div>
																	<div class="col-md-3" >
																		<label>Hygenic Certificate Number <span class="astrik">*</span></label>
																		<div class="form-line">
																			<input maxlength="60" type="text" class="form-control open_other" disabled placeholder="Hygenic Certificate Number" id="hygenic_certificate_number" name="hygenic_certificate_number" value="{{@$school->hygenic_certificate_number}}" required>
																		</div>
																	</div>

																	<div class="col-md-3">
																		<label>Hygenic Certificate Issuance Date <span class="astrik">*</span></label>
																		<div class="form-line">
																			<input maxlength="10" type="text" class="form-control hygenic_cert_date_from open_other" disabled placeholder="Hygenic Certificate Issuance Date" id="hygenic_certificate_issue_date" name="hygenic_certificate_issue_date" value="{{date('m/d/Y', strtotime(@$school->hygenic_certificate_issue_date))}}" required>
																		</div>
																	</div>

																	<div class="col-md-3">
																		<label>Hygenic Certificate Valid Till <span class="astrik">*</span></label>
																		<div class="form-line">
																			<input maxlength="10" type="text" class="form-control hygenic_cert_date_to open_other" disabled placeholder="Hygenic Certificate Valid Till" id="hygenic_certificate_valid_date" name="hygenic_certificate_valid_date" value="{{date('m/d/Y', strtotime(@$school->hygenic_certificate_valid_date))}}" required>
																		</div>
																	</div>

																	<div class="col-md-3">
																		<label>Hygenic Certificate Issued By <span class="astrik">*</span></label>
																		<div class="form-line">
																			<input maxlength="150" type="text" class="form-control open_other" disabled placeholder="Hygenic Certificate Issued By" id="hygenic_certificate_issued_by" name="hygenic_certificate_issued_by" value="{{@$school->hygenic_certificate_issued_by}}" required>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<div class="form-group">
																			<label>Upload Hygenic Certificate  <span class="astrik">*</span></label>
																			<input type="file" name="hygenic_certificate" class="form-control open_other" style="height: auto;" id="hygenic_certificate" onChange="validateFileExtesntion(this)" disabled>
																		</div>


																		@if(!is_null(@$school->building_certificate))


																		<?php
																		$source = read_file('/uploads/hygenic_certificates', @$school->hygenic_certificate);
																		$build_cert = @$school->hygenic_certificate;
																		$attributes = 'data-lightbox="certificate" data-title="Hygenic Certificate"';

																		if(strpos($build_cert, '.pdf')){
																			$source = URL::to('/img/iconn_pdf.png');
																			$attributes = 'target="_blank"';
																		}
																		?>
																		<div class="col-md-3">
																			<a <?=$attributes?> class="lightbox_image" data-toggle="tooltip" href="{{read_file('/uploads/hygenic_certificates', @$school->hygenic_certificate)}}"><img style="max-width: 100%" class="lightbox_image img-responsive thumbnail" data-toggle="tooltip" id="hygenic_certificate_picture" src="{{ $source }}" /></a>
																		</div>
																		@else
																		<div class="col-md-3" style="display: none">
																			<a data-lightbox="certificate" data-title="Building Certificate" class="lightbox_image" data-toggle="tooltip" href="{{URL::to('/uploads/no-certificate.png')}}"><img style="max-width: 100%" class="lightbox_image img-responsive thumbnail" data-toggle="tooltip" id="hygenic_certificate_picture"  src="{{URL::to('/uploads/no-certificate.png')}}" /></a>
																		</div> 
																		@endif

																	</div>

																</div>

															</div>
															
														<div class="col-md-12 form-group">
															<div class="section_title">
																<span class="bg-blue">School Stats</span>
															</div>
															<div class="row">
																<div class="col-md-4">
																	<label>Total Enrollment <span class="astrik">*</span></label>
																	<div class="form-line">
																		<input required maxlength="6" required min="1"   type="number" class="form-control open_other" disabled placeholder="Total Enrollment" id="institute_enrollment" oninput="value > 0||(value=1);" name="institute_enrollment" value="{{@$school->institute_enrollment}}">
																	</div>
																</div>

																<div class="col-md-5">
																	<label>Total Teaching Staff <span class="astrik">*</span></label>
																	<div class='clearfix'></div>
																	<div class='col-md-4'>
																		<div class="form-line">
																			<input required maxlength="6" required  type="number" class="form-control" placeholder="Total Teaching Staff" id="teacher_count" oninput="value > 0||(value=1);" name="teacher_count" value="{{@$school->teacher_count}}">
																		</div>
																	</div>
																</div>

															<div class="col-md-3">
																	<label>Total Non Teaching Staff <span class="astrik">*</span></label>
																	<div class="form-line">
																		<input required maxlength="6" required  type="number" min="0" class="form-control open_other" disabled placeholder="Total Non Teaching Staff" id="non_teaching_staff" oninput="value > 0||(value=0);" name="non_teaching_staff" value="{{@$school->non_teaching_staff}}">

																	</div>

																</div>

															</div>
															</div>

															@if(@$school->status == 6)

															<div class="row">                   

																<div class="col-md-12" >
																	<div class="divider"><span></span><span>School Geolocation</span><span></span></div>
																</div>

																<div class="col-md-12 p-t-20">
																	<div class="col-md-6">
																		<label>Latitude <span class="astrik"></span></label>
																		<div class="form-line">
																			<input type="number" step="any" class="form-control open_other" id="latbox" name="latbox" value="{{@$school->GPS_North}}" >
																		</div>
																	</div>

																	<div class="col-md-6">
																		<label>Longitude <span class="astrik"></span></label>
																		<div class="form-line">
																			<input type="number" step="any" class="form-control open_other" id="lngbox" name="lngbox" value="{{@$school->GPS_East}}">
																		</div>
																	</div>
																</div>

																<div class="col-md-12">
																	<div id="map" style="width: 100%;height: 250px;" class="googlemapimage"></div>
																</div>
															</div>
															@endif
															<div class="row">
																<div class="col-md-12 align-center">
																	<button class="btn btn-success open_other" disabled>Save Changes</button>
																</div>
															</div>
															</form>
														</div>
													</div>
												</div>
											</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="{{asset('/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('/vendor_plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('/js/lightbox.js')}}"></script>
<!-- Select Plugin Js -->
<script src="{{asset('new_admin/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

<script src="{{asset('/assets/js/jquery-confirm.min.js')}}"></script>
<script src="{{asset('/form_validation/applicant_form.js')}}"></script>
<script type="text/javascript">
	
	
	var duplication = false;
	function check_school_duplication(){
		duplication = false;
		$('p.school-error').html('').hide();
		reqUrl = "<?= URL::to('search-school-duplication') ?>";

		$.ajax({
			url: reqUrl,
			method: 'POST',
			dataType: 'JSON',
			data: {
				'district': $('#DistrictId').val(),
				'school_name': $('#institute_name').val(),
				'cnic': $('#owner_cnic').val(),
				'id': '<?= md5(@$school->id) ?>'
			},
			success: function (responses) {
				if(responses.error){
					duplication = true;
					$('p.school-error').html(responses.error).show();
				}
			}
		});
	}
		
<?php
if($school->status == 2){

	if($review_count > 0){
		?>
			
		$("form#registration_form_deo_review :input[name='_token']").removeAttr("disabled");
		$("form#registration_form_deo_review .btn-success").removeAttr("disabled");
		$("form#registration_form_deo_review .open_other").removeAttr("disabled");
			<?php
		$denail_pics = ['', 'building_certificate', 'certificate', 'hygenic_certificate'];
		$denial_details = @explode(',', $review->denial_details);
		
		if(isset($denial_details[0]) && $denial_details[0]){
			foreach($denial_details as $detail){
			?>
				$("form#registration_form_deo_review input#<?= $denail_pics[$detail] ?>").removeAttr("disabled");
			<?php } ?>
				$('#registration_form_deo_review').on('submit', function (event) {
				<?php foreach($denial_details as $detail){
			?>
					$(document).find("form#registration_form_deo_review input#<?= $denail_pics[$detail] ?>").each(function () {
							$(this).rules("add", {required: true});
						});
			<?php } ?>
					
					
						
					});

			<?php
		}
	}
}
?>
					
                                        $('#registered').click(function () {
                                        if ($(this).is(':checked')) {
                                        $("#registrationDiv").show();
                                        } else {
                                        $("#registrationDiv").hide();
                                        }
                                        });
                                        function ShowHideDiv() {
                                        var registered = document.getElementById("registered");
                                        var registrationDiv = document.getElementById("registrationDiv");
                                        registrationDiv.style.display = registered.value == "1" ? "block" : "none";
                                        }
</script>
@if(@$school->status == 6)
<script async defer
				src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRQXgNTdtYtKzWq6_1sPWibFVAEkCx1I8&callback=initMap">
		<script type="text/javascript">
      var map;
      function initMap() {
              var latitude = <?php
			if(empty($school)){
				echo '31.54972';
			}
			else{
				echo round(@$school->GPS_North, 6);
			}
			?>;
      var longitude = <?php
			if(empty($school)){
				echo '74.34361';
			}
			else{
				echo round(@$school->GPS_East, 6);
			}
			?>;
        var myLatLng = {lat: latitude, lng: longitude};
                              map = new google.maps.Map(document.getElementById('map'), {
              center: myLatLng,
              zoom: 12
                                });                                 var marker = new google.maps.Marker({
              position: myLatLng,
              map: map,
              title: 'Set lat/lon values for this school',
              draggable: false
        });
                              google.maps.event.addListener(marker, 'dragend', function (event) {
              document.getElementById("latbox").value = this.getPosition().lat();
        document.getElementById("lngbox").value = this.getPosition().lng();
                                });
                                }
                                </script>
												@endif
							<script>
							$(document).ready(function () {
							
							check_school_duplication();
			$('#institute_name').change(function(){
				check_school_duplication();
			});
							
								var parameters = {'DistrictId':<?=$school->district_id?>};
								$.get('<?=URL::to('get-tehsils')?>', parameters, function (data) {
				var tehsilsList = $('#TehsilId');
tehsilsList.empty();
var PostalList = $('#postal_city');
PostalList.empty();
$.each(data, function (key, value) {
selectedTehsil = ('<?=@$school->tehsil_id?>' == value.id) ? 'selected' : '';
tehsilsList.append("<option value='" + value.id + "'  " + selectedTehsil + " >" + value.TehsilName + "</option>");
selectedPostal = ('<?=@$school->getSchool->postal_city?>' == value.id) ? 'selected' : '';
	PostalList.append("<option value='" + value.id + "' " + selectedPostal + ">" + value.TehsilName + "</option>");
	});
	tehsilsList.selectpicker('refresh');
	PostalList.selectpicker('refresh');
									});
									});
                                
                                
									$(document).ready(function () {

				$('select#institute_level').change(function(){
$('div#affiliation').hide(); $('select#gender option[value=5]').prop('disabled', true);
	if ($(this).val() == 3 || $(this).val() == 4){                
		$('div#affiliation').show();
	}else if($(this).val() == 1){
	$('select#gender option[value=5]').prop('disabled', false);
								}
								if($(this).val() != 1 && $('select#gender option:selected').val() == 5){
				$('select#gender').val('');
									}
									});
									$('input[name=permanently_registered]').change(function(){
	$('input#registration_valid_till').removeAttr('disabled');
	if ($(this).is(':checked')){
$('input#registration_valid_till').val('');
$("input#registration_valid_till").next("label[for=registration_valid_till]").remove();
$('input#registration_valid_till').prop('disabled', true);
	}
									});
                
								$(document).on('click', '.school', function () {

				var id = $(this).data('id');
$('#institute_name').val($(this).text());
$('#institute_id').val(id);
$('#schoolList').fadeOut();
								});
								});
                              
								function readURL(input, preview_box) {

				if (input.files && input.files[0]) {
var reader = new FileReader();
reader.onload = function (event) {

const name = input.files[0].name;
const lastDot = name.lastIndexOf('.');
	const fileName = name.substring(0, lastDot);
	const ext = name.substring(lastDot + 1);
if (ext == 'pdf') {
	$('#' + preview_box).attr('src', '<?php echo URL::to('/img/iconn_pdf.png')?>');
$('#' + preview_box).parent().attr('target', '_blank');
									} else {

				$('#' + preview_box).attr('src', event.target.result);
									}
									$('#' + preview_box).parent().attr('href', event.target.result);
									}
		reader.readAsDataURL(input.files[0]);
							}
							}
							function numberOnly(id) {
		// Get element by id which passed as parameter within HTML element event                       var element = document.getElementById(id);
		// Use numbers only pattern, from 0 to 9
				var regex = /[^0-9]/gi;
// This removes any other character but numbers as entered by user
element.value = element.value.replace(regex, "");
		}
                                
								function is_future_year(id) {
				var element = document.getElementById(id);
		currentYear = {{date('Y')}};
								if (element.value > currentYear || element.value < 1700) {
				element.value = "";
		}
									}
                                
									$(document).ready(function () {


		$(".reg_date_from").datepicker({
				endDate: new Date(2020, 11, 31),
				startDate: new Date(1947, 7, 15),
				autoclose: true
		});
		$(".reg_date_to").datepicker({
				endDate: new Date(2020, 11, 31),
				startDate: new Date(1947, 7, 15),
				autoclose: true
		});
		$(".cert_date_from").datepicker({
				endDate: new Date(),
				startDate: new Date(1947, 7, 15),
				autoclose: true
		});
		$(".cert_date_to").datepicker({
				endDate: new Date(<?=date('Y') + 11?>, 11, 31),
				startDate: new Date(1947, 7, 15),
				autoclose: true
		});
                              
							$(".hygenic_cert_date_from").datepicker({
					endDate: new Date(),
				startDate: new Date(1947, 7, 15),
			autoclose: true
							});
							$(".hygenic_cert_date_to").datepicker({
				endDate: new Date(<?=date('Y') + 11?>, 11, 31),
				startDate: new Date(1947, 7, 15),
			autoclose: true
								});
                              
									$("#hygenic_certificate").change(function () {
				readURL(this, 'hygenic_certificate_picture');
									});
                                
									$("#certificate").change(function () {
				readURL(this, 'certificate_picture');
											});
                                    
											$("#building_certificate").change(function () {
				readURL(this, 'building_certificate_picture');
												});
                                      
												});
                                  
				</script>




				@endsection