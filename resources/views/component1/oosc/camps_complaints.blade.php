@extends('layouts.master')

@section('title', 'Camps Complaints')

@section('content')
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">


				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-lg-12">
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header bg-primary">
										<div class="row">
											<div class="col-lg-12">
                                                <h3 class="mb-1 text-white">{{' Complaints ('.number_format(count($complaints)).')'}}</h3>
                                            </div>
										</div>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-md-12 p-2">
												<div class="table-responsive">
													<table id="example3" class="student-list-tb">
														<thead>
															<tr>
																<th>#</th>
																<th>District</th>
																<th>Tehsil</th>
																<th>Markaz</th>
																<th>EMIS</th>
																<th>School Name</th>
																<th>Teacher Name</th>
																<th>ContactNo</th>
																<th>Page</th>
																<th>Status</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody>
                                                        @foreach($complaints as $index => $complaint)
															<tr>
																<td><strong>{{$index+1}}</strong></td>
																<td>{{$complaint['District']}}</td>
																<td>{{$complaint['Tehsil']}}</td>
																<td>{{$complaint['Markaz']}}</td>
																<td>{{$complaint['EMISCODE']}}</td>
																<td>{{$complaint['SchoolName']}}</td>
																<td>{{$complaint['TeacherName']}}</td>
																<td>{{$complaint['ContactNo']}}</td>
																<td>{{$complaint['PageName']}}</td>
																<td class="status"  @if ($complaint['ComplaintStatus'] == 'Resolved') style="color: seagreen" @endif>{{$complaint['ComplaintStatus']}}</td>
																<td><input class="resolve-checkbox" type="checkbox" value="{{$complaint['Id']}}"
                                                                           @if ($complaint['ComplaintStatus'] == 'Resolved') disabled checked @endif></td>
{{--																<td>--}}
{{--																	<a href="{{url('class-list/'.encrypt($school['s_id']))}}" class="btn btn-sm btn-primary"><i class="la la-eye"></i></a>--}}
{{--																</td>--}}
															</tr>
                                                        @endforeach
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div> <!-----Card End----->
							</div> <!-----col-lg-12 End----->
						</div>
					</div>
				</div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('.resolve-checkbox').on('click', function() {
                    var checkbox = $(this);
                    var complaintId = checkbox.val();
                    var statusCell = checkbox.closest('tr').find('.status');

                    if (confirm('Are you sure you want to resolve this complaint?')) {
                        checkbox.prop('disabled', true); // Disable the checkbox
                        $.ajax({
                            url: '{{ route("resolve-complaint") }}',
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: complaintId
                            },
                            success: function(response) {
                                if (response.success) {
                                    statusCell.text('Resolved');
                                } else {
                                    alert('Error: ' + response.message);
                                    checkbox.prop('checked', false);
                                    checkbox.prop('disabled', false); // Re-enable the checkbox in case of error
                                }
                            },
                            error: function(xhr, status, error) {
                                alert('An error occurred while resolving the complaint.');
                                checkbox.prop('checked', false);
                                checkbox.prop('disabled', false); // Re-enable the checkbox in case of error
                            }
                        });
                    } else {
                        checkbox.prop('checked', false);
                    }
                });
            });
        </script>


@endsection
