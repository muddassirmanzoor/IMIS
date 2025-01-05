<html lang="en">
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>
      Student Profile Print
    </title>
	<style type="text/css">
	a:hover { text-decoration: none !important; }
	.header h1 {color: #000000 !important; font: normal 33px Georgia, serif; margin: 0; padding: 0; line-height: 33px;}
	.header p {color: #000000; font: normal 11px Georgia, serif; margin: 0; padding: 0; line-height: 11px; letter-spacing: 2px}
	.sidebar ul  { color: #000000; margin: 0 0 0 10px; padding: 0 0 0 5px; font-size: 12px;font-family: Georgia, serif }
	.sidebar ul li {padding: 0 0 5px; margin: 0;}
	.sidebar h4{color:#000000 !important; font-size: 11px;line-height: 16px;font-family: Georgia, serif; margin: 0; padding: 0;}
	.sidebar p {line-height: 16px; font-family: Georgia, serif;}
	.sidebar p a{color: #d18648; text-decoration: none;}
	.content h2 {color:#000000 !important; font-weight: normal; margin: 0; padding: 0; font-style: italic; line-height: 30px; font-size: 30px;font-family: Georgia, serif; }
	.content p {color:#767676; font-weight: normal; margin: 0; padding: 0; line-height: 20px; font-size: 12px;font-family: Georgia, serif;}
	.content a {color: #d18648; text-decoration: none;}
	.footer p {padding: 0; font-size: 11px; color:#000000; margin: 0; font-family: Georgia, serif;}
	.footer a {color: #f7a766; text-decoration: none;}
    body {
        font-family: Arial, sans-serif;
    }
	</style>
  </head>
  <body style="margin: 0; padding: 0;">
  	<table cellpadding="0" cellspacing="0" border="0" align="top" width="700px">
		  <tr>
		  	<td valign="top" style="margin: 0; padding: 0;padding: 25px 0; vertical-align: top;">
			    <table cellpadding="0" cellspacing="0" border="0" align="center" width="700px" style="font-family: Georgia, serif;border: 1px solid;" class="header">
			      <tr>
			        <td  height="115" align="center">
						<p><img src="http://192.168.100.26/images/imis-images/governmentofpunjab.png" style="width: 100px;padding: 15px;"></p>
			        </td>
					<td  height="115" align="center">
						<h1 style="color: #000000; font: normal 25px Georgia, serif; margin: 0; padding: 0; line-height: 25px;">School Education Department,<br> Government of the Punjab</h1>
						<p style="color: #000000; font: normal 11px Georgia, serif; margin: 0; padding: 0; line-height: 11px; letter-spacing: 2px">Student School Profile</p>
			        </td>
					<td  height="115" align="center">
						<p style="color: #000000; font: normal 11px Georgia, serif; margin: 0; padding: 0; line-height: 11px; letter-spacing: 2px">Date :{{date('d-m-Y')}}</p>
			        </td>
			      </tr>
				</table><!-- header-->
				<table cellpadding="0" cellspacing="0" border="0" align="top"  width="700px" style="font-family: Georgia, serif;border: 1px solid;" class="header">
			      <tr>
			        <td align="left" valign="top">
						<!----Student info----->
						<table cellpadding="0" cellspacing="0" border="0" width="186px"  style="color: #000000; font: normal 11px Georgia, serif; margin: 0; padding: 0; background: #fff;"  bgcolor="#ffffff">
							<tr>
								<td style="padding: 15px;"  valign="top" align="left">
									<p><img src="http://192.168.100.26/images/theme/avatar/avatar.jpg" style="width: 115px;"></p>
									<br>
									<h4><b>Name:</b> {{$student->s_name}}</h4>
									<h4><b> Enrollment No #:</b> {{$student->s_enrollment_number}} </h4>
									<h4><b> B-form No:</b>  {{$student->s_form_b}}</h4>
								</td>
							</tr>
							<tr>
								<td style="padding-top: 15px; padding-bottom: 5px;padding-left: 15px; border-bottom: 2px solid #d2b49b;"  valign="top" align="left">
									<h3 style="color:#000000; font-weight: normal; margin: 0; padding: 0; font-style: italic; line-height: 13px; font-size: 16px;font-family: Georgia, serif;">Student info</h3>
								</td>
							</tr>
							<tr>
								<td style="padding-top: 15px; padding-bottom: 0px;padding-left: 15px;"  valign="top" align="left">
									<ul style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;">
										<li style="padding: 0 0 5px; margin: 0;"><span style="margin-right: 10px;">Father Name :</span> {{$student->s_father_name}}</li>
										<li style="padding: 0 0 5px; margin: 0;"><span style="margin-right: 10px;">Gender :</span>  {{$student->s_gender}}</li>
										<li style="padding: 0 0 5px; margin: 0;"><span style="margin-right: 10px;">DOB :</span>  {{$student->s_dob}}</li>
										<li style="padding: 0 0 5px; margin: 0;"><span style="margin-right: 10px;">Religion :</span>  {{$student->s_religion}}</li>
										<li style="padding: 0 0 5px; margin: 0;"><span style="margin-right: 10px;">Nationality :</span>  {{$student->s_nationality}}</li>
{{--										<li style="padding: 0 0 5px; margin: 0;"><span style="margin-right: 10px;">Contact# :</span>  1234567</li>--}}
										<li style="padding: 0 0 5px; margin: 0;"><span style="margin-right: 10px;">Distance :</span>  {{$student->s_school_distance}}</li>
									</ul>
								</td>
							</tr>
							<tr>
								<td style="padding-top: 15px; padding-bottom: 5px;padding-left: 15px;border-bottom: 2px solid #d2b49b;"  valign="top" align="left">
									<h3 style="color:#000000; font-weight: normal; margin: 0; padding: 0; font-style: italic; line-height: 13px; font-size: 16px; font-family: Georgia, serif; ">Medical Issues</h3>
								</td>
							</tr>
							<tr>
								<td style="padding-top: 15px; padding-bottom: 0px; padding-left: 15px;"  valign="top" align="left">
									<ul style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;">
										<li style="padding: 0 0 5px; margin: 0;"><span style="margin-right: 10px;">Seeing :</span> {{$student->s_seeing_difficulty}}</li>
										<li style="padding: 0 0 5px; margin: 0;"><span style="margin-right: 10px;">Hearing :</span> {{$student->s_hearing_difficulty}}</li>
										<li style="padding: 0 0 5px; margin: 0;"><span style="margin-right: 10px;">Walking :</span> {{$student->s_walking_difficulty}}</li>
										<li style="padding: 0 0 5px; margin: 0;"><span style="margin-right: 10px;">Readwrite :</span> {{$student->s_readwrite_difficulty}}</li>
										<li style="padding: 0 0 5px; margin: 0;"><span style="margin-right: 10px;">Remembering :</span> {{$student->s_remembering_difficulty}}</li>
										<li style="padding: 0 0 5px; margin: 0;"><span style="margin-right: 10px;">Concentrating :</span> {{$student->s_concentrating_difficulty}}</li>
									</ul>
								</td>
							</tr>
							<tr>
								<td style="padding-top: 15px; padding-bottom: 5px;padding-left: 15px;border-bottom: 2px solid #d2b49b;"  valign="top" align="left">
									<h3 style="color:#000000; font-weight: normal; margin: 0; padding: 0; font-style: italic; line-height: 13px; font-size: 16px; font-family: Georgia, serif; ">Guardian Info</h3>
								</td>
							</tr>
							<tr>
								<td style="padding-top: 15px; padding-bottom: 0px;padding-left: 15px;" valign="top" align="left">
									<ul style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;">
										<li style="padding: 0 0 5px; margin: 0;"><span style="margin-right: 10px;">Name:</span>  {{$student->s_student_guardian_name}} </li>
										<li style="padding: 0 0 5px; margin: 0;"><span style="margin-right: 10px;">CNIC No :</span>  {{$student->s_student_guardian_cnic}}</li>
										<li style="padding: 0 0 5px; margin: 0;"><span style="margin-right: 10px;">Relation: </span>  {{$student->s_fg_relation}}</li>
										<li style="padding: 0 0 5px; margin: 0;"><span style="margin-right: 10px;">Income:</span>  {{($student->s_income_bracket)}}</li>
									</ul>
								</td>
							</tr>
						</table>
						<!----Student info----->
			        </td>
					<td valign="top">
						<table cellpadding="0" cellspacing="0" border="0" width="400px" style="color: #717171; font: normal 11px Georgia, serif; margin: 0; padding: 0;">
							<tr>
								<td style="padding: 15px 0 0;" align="left">
									<h2 style="color:#000000; font-weight: normal; margin: 0; padding: 0; font-style: italic; line-height: 25px; font-size: 25px;font-family: Georgia, serif; ">Enrollment Info</h2>
								</td>
							</tr>
							<tr>
								<td style="padding: 15px 0 15px; border-bottom: 2px solid #d2b49b;"  valign="top">
									<!------------------->
									<table class="session-result-table" width="450px" >
										<tbody>
											<tr style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;">
												<th  align="left">School Name:</th>
												<td colspan="3"  align="left">{{$student->school_name}}</td>
											</tr>
											<tr style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">
												<th>EMIS Code:</th>
												<td>{{$student->s_emis_code}} </td>
												<th>Enrollment Date:</th>
												<td> {{$student->s_school_enrollment_date}}</td>
											</tr>
											<tr style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">
												<th>Current Class:</th>
												<td> {{$student->c_name}}</td>
												<th>Section: </th>
												<td> {{$student->scs_name}}</td>
											</tr>
											<tr style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">
												<th>Medium: </th>
												<td> {{$student->s_medium}}</td>
												<th>Major Subjects: </th>
												<td> {{$student->s_major}}</td>
											</tr>

										</tbody>
									</table>
									<!------------------->
								</td>
							</tr>
							<tr>
								<td style="padding: 15px 0 0;" align="left">
									<h2 style="color:#000000; font-weight: normal; margin: 0; padding: 0; font-style: italic; line-height: 25px; font-size: 25px;font-family: Georgia, serif; ">Transfer History</h2>
								</td>
							</tr>
							<tr>
								<td style="padding: 15px 0 15px; border-bottom: 2px solid #d2b49b;"  valign="top">
									<!------------------->
									<table width="444px">
										<tbody>
											<tr style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">
											  <th>Sr #</th>
											   <th>Transfer From</th>
											  <th>EMIS Code</th>
											  <th>Transfer Date</th>
											</tr>
                                            @foreach($transfer_logs as $index=> $transfer)
                                                <tr style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">
												<td>{{$index+1}}</td>
											  <td>{{$transfer->from_school_name}} </td>
											  <td>{{$transfer->from_school_emis_code}}</td>
											  <td>{{$transfer->stl_transfer_date}}</td>
											</tr>
                                            @endforeach
										</tbody>
									</table>
									<!------------------->
								</td>
							</tr>
							<tr>
								<td style="padding: 15px 0 0;" align="left">
									<h2 style="color:#000000; font-weight: normal; margin: 0; padding: 0; font-style: italic; line-height: 25px; font-size: 25px;font-family: Georgia, serif; ">Rejoin History</h2>
								</td>
							</tr>
							<tr>
								<td style="padding: 15px 0 15px; border-bottom: 2px solid #d2b49b;"  valign="top">
									<!------------------->
									<table width="444px">
										<tbody>
											<tr  style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">
											  <th>Sr #</th>
											   <th>Drop Date</th>
											  <th>Rejoin Date</th>
											</tr>
                                            @foreach($rejoin_logs as $index=> $rejoin)
											<tr  style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">
                                                <td>{{$index+1}}</td>
                                                <td>{{$transfer->stl_transfer_date}}</td>
                                                <td>{{$transfer->stl_transfer_in_date}}</td>
											</tr>
                                            @endforeach
										</tbody>
									</table>
									<!------------------->
								</td>
							</tr>
							<tr>
								<td style="padding: 15px 0 0;" align="left">
									<h2 style="color:#000000; font-weight: normal; margin: 0; padding: 0; font-style: italic; line-height: 25px; font-size: 25px;font-family: Georgia, serif; ">Availed Interventions</h2>
								</td>
							</tr>
							<tr>
								<td style="padding: 15px 0 15px; border-bottom: 2px solid #d2b49b;"  valign="top">
									<!------------------->
									<table width="444px">
										<tbody>
											<tr  style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">
											  <td>{!! $student->s_is_insaaf_student == 1 ? 'Y' : 'X' !!} Afternoon Schools Programme(ASP)</td>
											</tr>
											<tr  style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">
											  <td>@if(in_array($student->d_name, $ztp_districts) && $student->s_gender == 'Female')
                                                      Y
                                                  @else
                                                      X
                                                  @endif Girls' Stipend Programme (GSP)</td>
											</tr>
{{--											<tr  style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">--}}
{{--											  <td>✓ Benazir Income Support Programme (BISP)</td>--}}
{{--											</tr>--}}
{{--											<tr  style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">--}}
{{--											  <td>✓ Early School Childhood Education Programme (ECE)</td>--}}
{{--											</tr>--}}
{{--											<tr  style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">--}}
{{--											  <td>☓ Free Text Books</td>--}}
{{--											</tr>--}}
{{--											<tr  style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">--}}
{{--											  <td>☓ Free Bags</td>--}}
{{--											</tr>--}}
										</tbody>
									</table>
									<!------------------->
								</td>
							</tr>
							<!----------------------->
							<tr>--}}
{{--								<td style="padding: 15px 0 0;" align="left">			--}}
{{--									<h2 style="color:#000000; font-weight: normal; margin: 0; padding: 0; font-style: italic; line-height: 25px; font-size: 25px;font-family: Georgia, serif; ">Assessment </h2>--}}
{{--								</td>--}}
{{--							</tr>--}}
{{--							<tr>--}}
{{--								<td style="padding: 15px 0 15px; border-bottom: 1px solid #d2b49b;"  valign="top">--}}
{{--									<!------------------->--}}
{{--									<table style="width: 100%;">--}}
{{--										<tbody>--}}
{{--											<tr  style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">--}}
{{--												  <th>Term </th>--}}
{{--												  <th>Total Marks</th>--}}
{{--												  <th>Obtained  Marks </th>--}}
{{--												  <th>Percentage </th>--}}
{{--												  <th>Remarks</th>--}}
{{--											</tr>--}}
{{--											<tr  style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">--}}
{{--												  <td>1<sup>st</sup></td>--}}
{{--												  <td>600</td>--}}
{{--												  <td>480</td>--}}
{{--												  <td>83 % </td>--}}
{{--												  <td>Pass</td>--}}
{{--											</tr>--}}
{{--											<tr  style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">--}}
{{--												<td>2<sup>nd</sup></td>--}}
{{--												<td>600</td>--}}
{{--												<td>500</td>--}}
{{--											  <td>80 % </td>--}}
{{--												<td>Pass</td>--}}
{{--											  </tr>--}}
{{--											  <tr  style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">--}}
{{--												<td>3<sup>rd</sup></td>--}}
{{--												<td>600</td>--}}
{{--												<td>580</td>--}}
{{--												<td>97 % </td>--}}
{{--												<td>Pass</td>--}}
{{--											  </tr>--}}
{{--										</tbody>--}}
{{--									</table>--}}
{{--									<!------------------->--}}
{{--								</td>--}}
{{--							</tr>--}}

							<!----------------------->

						</table>
			        </td>
			      </tr>
				</table><!-- header-->
				<?php /*
				<table cellpadding="0" cellspacing="0" border="0" align="center" width="650px" style="font-family: Georgia, serif; background: #fff; border: 1px solid;" bgcolor="#ffffff">
			      <tr>
			        <td width="14" style="font-size: 0px;" bgcolor="#ffffff">&nbsp;</td>
					<td width="186" valign="top" align="left" bgcolor="#ffffff"style="font-family: Georgia, serif; background: #fff;" class="sidebar">
						<table cellpadding="0" cellspacing="0" border="0"  style="color: #717171; font: normal 11px Georgia, serif; margin: 0; padding: 0; background: #fff;" width="186" bgcolor="#ffffff">
						<tr>
							<td style="padding: 25px 0 5px;"  valign="top" align="left">
								<p><img src="http://192.168.100.26/images/imis-images/profile/profile.png" style="width: 115px;"></p>
								<br>
								<h4><b>Name:</b> Fatima Ali</h4>
								<h4><b> Student Id:</b> 0200122</h4>
								<h4><b> Enrollment No #:</b> 0200122</h4>
								<h4><b> B-form No:</b>  37340-3335036-1</h4>
							</td>
						</tr>
						<tr>
							<td style="padding: 15px 0 5px; border-bottom: 2px solid #d2b49b;"  valign="top" align="left">
								<h3 style="color:#767676; font-weight: normal; margin: 0; padding: 0; font-style: italic; line-height: 13px; font-size: 13px;font-family: Georgia, serif;">Student info</h3>
							</td>
						</tr>
						<tr>
							<td style="padding: 15px 0 0;">
								<ul style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;">
									<li style="padding: 0 0 5px; margin: 0;"><span style="margin-right: 10px;">Father Name :</span> Ali</li>
									<li style="padding: 0 0 5px; margin: 0;"><span style="margin-right: 10px;">Gender :</span>  Female</li>
									<li style="padding: 0 0 5px; margin: 0;"><span style="margin-right: 10px;">DOB :</span>  13-04-2018</li>
									<li style="padding: 0 0 5px; margin: 0;"><span style="margin-right: 10px;">Religion :</span>  Muslim</li>
									<li style="padding: 0 0 5px; margin: 0;"><span style="margin-right: 10px;">Nationality :</span>  Pakistani</li>
									<li style="padding: 0 0 5px; margin: 0;"><span style="margin-right: 10px;">Contact# :</span>  +92 123 456 7890</li>
									<li style="padding: 0 0 5px; margin: 0;"><span style="margin-right: 10px;">Distance :</span>  15km</li>
								</ul>
							</td>
						</tr>
						<tr>
							<td style="padding: 15px 0 5px; border-bottom: 2px solid #d2b49b;"  valign="top" align="left">
								<h3 style="color:#767676; font-weight: normal; margin: 0; padding: 0; font-style: italic; line-height: 13px; font-size: 13px; font-family: Georgia, serif; ">Physical Profile</h3>
							</td>
						</tr>
						<tr>
							<td style="padding: 15px 0 0;">
								<ul style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;">
									<li style="padding: 0 0 5px; margin: 0;"><span style="margin-right: 10px;">Age :</span> 16</li>
									<li style="padding: 0 0 5px; margin: 0;"><span style="margin-right: 10px;">Height :</span>  4.5 ft</li>
									<li style="padding: 0 0 5px; margin: 0;"><span style="margin-right: 10px;">Weight :</span>  45Kg</li>
									<li style="padding: 0 0 5px; margin: 0;"><span style="margin-right: 10px;">Blood Group :</span>  B<sup>+</sup></li>
									<li style="padding: 0 0 5px; margin: 0;"><span style="margin-right: 10px;">Medical Issues :</span>  Medical Issues</li>
								</ul>
							</td>
						</tr>
						<tr>
							<td style="padding: 15px 0 5px; border-bottom: 2px solid #d2b49b;"  valign="top" align="left">
								<h3 style="color:#767676; font-weight: normal; margin: 0; padding: 0; font-style: italic; line-height: 13px; font-size: 13px; font-family: Georgia, serif; ">Guardian Info</h3>
							</td>
						</tr>
						<tr>
							<td style="padding: 15px 0 0;">
								<ul style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;">
									<li style="padding: 0 0 5px; margin: 0;"><span style="margin-right: 10px;">Name:</span>  Ali Raza </li>
									<li style="padding: 0 0 5px; margin: 0;"><span style="margin-right: 10px;">CNIC No :</span>  37340-3335036-1</li>
									<li style="padding: 0 0 5px; margin: 0;"><span style="margin-right: 10px;">Relation: </span>  Uncle</li>
									<li style="padding: 0 0 5px; margin: 0;"><span style="margin-right: 10px;">Income:</span>  120,000/-</li>
								</ul>
							</td>
						</tr>
						</table>
					</td>
					<td width="24" bgcolor="#ffffff" style="font-size: 0px; font-family: Georgia, serif; background: #fff;">&nbsp;</td>
					<td width="510" valign="top" align="left" bgcolor="#ffffff"style="font-family: Georgia, serif; background: #fff;" class="content">
						<table cellpadding="0" cellspacing="0" border="0"  style="color: #717171; font: normal 11px Georgia, serif; margin: 0; padding: 0;" width="510">
							<tr>
								<td style="padding: 15px 0 0;" align="left">
									<h2 style="color:#000000; font-weight: normal; margin: 0; padding: 0; font-style: italic; line-height: 25px; font-size: 25px;font-family: Georgia, serif; ">Enrollment Info</h2>
								</td>
							</tr>
							<tr>
								<td style="padding: 15px 0 15px; border-bottom: 1px solid #d2b49b;"  valign="top">
									<!------------------->
									<table class="session-result-table" style="width: 100%;">
										<tbody>
											<tr style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;">
												<th  align="left">School Name:</th>
												<td colspan="3"  align="left">Govt. Pilot Secondary School for Girls</td>
											</tr>
											<tr style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">
												<th>EMIS Code:</th>
												<td>1122334</td>
												<th>Enrollment Date:</th>
												<td> 13-04-2018</td>
											</tr>
											<tr style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">
												<th>Current Class:</th>
												<td> 5rd</td>
												<th>Section: </th>
												<td> A</td>
											</tr>
											<tr style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">
												<th>Medium: </th>
												<td> Urdu</td>
												<th>Major Subjects: </th>
												<td> Biology</td>
											</tr>

										</tbody>
									</table>
									<!------------------->
								</td>
							</tr>
							<tr>
								<td style="padding: 15px 0 0;" align="left">
									<h2 style="color:#000000; font-weight: normal; margin: 0; padding: 0; font-style: italic; line-height: 25px; font-size: 25px;font-family: Georgia, serif; ">Transfer History</h2>
								</td>
							</tr>
							<tr>
								<td style="padding: 15px 0 15px; border-bottom: 1px solid #d2b49b;"  valign="top">
									<!------------------->
									<table style="width: 100%;">
										<tbody>
											<tr style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">
											  <th>Sr #</th>
											   <th>Transfer From</th>
											  <th>EMIS Code</th>
											  <th>Transfer Date</th>
											</tr>
											<tr style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">
												<td>1</td>
											  <td>Govt.Pilot Higher Secondary School for Boys </td>
											  <td>122312</td>
											  <td>12-4-2019</td>
											</tr>
											<tr style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">
												<td>2</td>
												<td>Govt.Pilot Higher Secondary School for Boys2</td>
												<td>122312</td>
												<td>12-4-2013</td>
											  </tr>
											  <tr style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">
												<td>3</td>
												<td>Govt.Pilot Higher Secondary School for Boys3</td>
												<td>122312</td>
												<td>12-4-2013</td>
											  </tr>
										</tbody>
									</table>
									<!------------------->
								</td>
							</tr>
							<tr>
								<td style="padding: 15px 0 0;" align="left">
									<h2 style="color:#000000; font-weight: normal; margin: 0; padding: 0; font-style: italic; line-height: 25px; font-size: 25px;font-family: Georgia, serif; ">Rejoin History</h2>
								</td>
							</tr>
							<tr>
								<td style="padding: 15px 0 15px; border-bottom: 1px solid #d2b49b;"  valign="top">
									<!------------------->
									<table style="width: 100%;">
										<tbody>
											<tr  style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">
											  <th>Sr #</th>
											   <th>Drop Date</th>
											  <th>Rejoin Date</th>
											</tr>
											<tr  style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">
												<td>1</td>
												<td>12-4-2019</td>
												<td>12-4-2019</td>
											</tr>
											<tr  style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">
												<td>2</td>
												<td>12-4-2019</td>
												<td>12-4-2019</td>
											</tr>
											<tr  style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">
												<td>3</td>
												<td>12-4-2019</td>
												<td>12-4-2019</td>
											</tr>
										</tbody>
									</table>
									<!------------------->
								</td>
							</tr>
							<tr>
								<td style="padding: 15px 0 0;" align="left">
									<h2 style="color:#000000; font-weight: normal; margin: 0; padding: 0; font-style: italic; line-height: 25px; font-size: 25px;font-family: Georgia, serif; ">Availed Interventions</h2>
								</td>
							</tr>
							<tr>
								<td style="padding: 15px 0 15px; border-bottom: 1px solid #d2b49b;"  valign="top">
									<!------------------->
									<table style="width: 100%;">
										<tbody>
											<tr  style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">
											  <td>✓ Afternoon Schools Programme(ASP)</td>
											</tr>
											<tr  style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">
											  <td>✓ Girls' Stipend Programme (GSP)</td>
											</tr>
{{--											<tr  style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">--}}
{{--											  <td>✓ Benazir Income Support Programme (BISP)</td>--}}
{{--											</tr>--}}
{{--											<tr  style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">--}}
{{--											  <td>✓ Early School Childhood Education Programme (ECE)</td>--}}
{{--											</tr>--}}
{{--											<tr  style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">--}}
{{--											  <td>☓ Free Text Books</td>--}}
{{--											</tr>--}}
{{--											<tr  style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">--}}
{{--											  <td>☓ Free Bags</td>--}}
{{--											</tr>--}}
										</tbody>
									</table>
									<!------------------->
								</td>
							</tr>

{{--							<tr>--}}
{{--								<td style="padding: 15px 0 0;" align="left">			--}}
{{--									<h2 style="color:#000000; font-weight: normal; margin: 0; padding: 0; font-style: italic; line-height: 25px; font-size: 25px;font-family: Georgia, serif; ">Assessment </h2>--}}
{{--								</td>--}}
{{--							</tr>--}}
{{--							<tr>--}}
{{--								<td style="padding: 15px 0 15px; border-bottom: 1px solid #d2b49b;"  valign="top">--}}
{{--									<!------------------->--}}
{{--									<table style="width: 100%;">--}}
{{--										<tbody>--}}
{{--											<tr  style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">--}}
{{--												  <th>Term </th>--}}
{{--												  <th>Total Marks</th>--}}
{{--												  <th>Obtained  Marks </th>--}}
{{--												  <th>Percentage </th>--}}
{{--												  <th>Remarks</th>--}}
{{--											</tr>--}}
{{--											<tr  style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">--}}
{{--												  <td>1<sup>st</sup></td>--}}
{{--												  <td>600</td>--}}
{{--												  <td>480</td>--}}
{{--												  <td>83 % </td>--}}
{{--												  <td>Pass</td>--}}
{{--											</tr>--}}
{{--											<tr  style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">--}}
{{--												<td>2<sup>nd</sup></td>--}}
{{--												<td>600</td>--}}
{{--												<td>500</td>--}}
{{--											  <td>80 % </td>--}}
{{--												<td>Pass</td>--}}
{{--											  </tr>--}}
{{--											  <tr  style="color: #000000;font-size: 12px;font-family: Georgia, serif;list-style: none;padding: 0px;margin: 0px;"  align="left">--}}
{{--												<td>3<sup>rd</sup></td>--}}
{{--												<td>600</td>--}}
{{--												<td>580</td>--}}
{{--												<td>97 % </td>--}}
{{--												<td>Pass</td>--}}
{{--											  </tr>--}}
{{--										</tbody>--}}
{{--									</table>--}}
{{--									<!------------------->--}}
{{--								</td>--}}
{{--							</tr>--}}
						</table>
					</td>
					<td width="16" bgcolor="#ffffff" style="font-size: 0px;font-family: Georgia, serif; background: #fff;">&nbsp;</td>
			      </tr>
				</table><!-- body -->*/?>
				<table cellpadding="0" cellspacing="0" border="0" align="center" width="700px" style="font-family: Georgia, serif; line-height: 10px;" bgcolor="#1d3768" class="footer">
			      <tr>
			        <td bgcolor="#1d3768"  align="center" style="padding: 15px 0 10px; font-size: 11px; color:#fff; margin: 0; line-height: 1.2;font-family: Georgia, serif;" valign="top">
						<p style="padding: 0; font-size: 11px; color:#fff; margin: 0; font-family: Georgia, serif;">© 2023 PMIU-PESRP. All Rights Reserved</p>
					</td>
			      </tr>
				</table><!-- footer-->
		  	</td>
		</tr>
    </table>
  </body>
</html>
