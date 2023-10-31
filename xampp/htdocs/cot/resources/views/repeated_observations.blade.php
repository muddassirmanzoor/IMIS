@extends('layouts.dashboard')

@section('content')
{{--
<style type="text/css">
  .font-15{
    font-size: 15px !important;
  }

  .font-13{
    font-size: 16px !important;
  }

  .txt-bold{
    font-weight: bold !important;
  }

  .txt-normal{
    font-weight: normal !important;
  }
</style> --}}
@php
  /* avoid java script code break for filters */
if($selected_district_id == '')
    $selected_district_id = 0;
  if($selected_tehsil_id == '')
    $selected_tehsil_id = 0;
  if($selected_school_id == '')
    $selected_school_id = 0;
  if($selected_teacher_id == '')
    $selected_teacher_id = 0;
@endphp
            <div class="container-fluid">



                    <!-- *************
                            ************ Main container start *************
                    ************* -->
                    <div class="main-container">


                            <!-- Page header start -->
                            <div class="page-header">
                              <div class="container-fluid">
                                <div class="row">
                                  <div class="col-sm-2 pt-2">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active">COT Dashboard</li>
                                    </ol>
                                  </div>
                                  <form method="post" action="{{ route('repeated_observations') }}" enctype="multipart/form-data">
                                    <div class="form-row align-items-center">
                                  {{ csrf_field() }}
                                    <div class="col-auto">
                                      <select style="width: 185px;" name="month_filter" id="month_filter" class="form-control">
                                            @php
                                              echo $month_drop_down;
                                            @endphp
                                      </select>
                                    </div>
                                  @if (Auth::user()->type == 'super_admin' || Auth::user()->type=='admin')
                                    <div class="col-auto">
                                      <select style="width: 145px;" id="district_filter" name="district_id" class="form-control">
                                        <option value="">Select District</option>
                                        @if($districts_data)
                                          @foreach($districts_data as $district)
                                            @php
                                              $selected = "";
                                              if($selected_district_id != '' && $district->district_id == $selected_district_id){
                                                $selected = "selected";
                                              }
                                            @endphp
                                            <option {{$selected}} value="{{$district->district_id}}">{{$district->district_name}}</option>
                                          @endforeach
                                        @endif
                                      </select>
                                    </div>
                                    @endif

                                    @if (Auth::user()->type == 'ceo')
                                    <div class="col-auto">
                                      <select style="width: 145px;" id="tehsil_filter" name="tehsil_id" class="form-control">
                                        <option value="">Select Tehsil</option>
                                        @if($tehsils_data)
                                          @foreach($tehsils_data as $tehsil)
                                            @php
                                              $selected = "";
                                              if($selected_tehsil_id != '' && $tehsil->tehsil_id == $selected_tehsil_id){
                                                $selected = "selected";
                                              }
                                            @endphp
                                            <option {{$selected}} value="{{$tehsil->tehsil_id}}">{{$tehsil->tehsil_name}}</option>
                                          @endforeach
                                        @endif
                                      </select>
                                    </div>
                                    @endif

                                  @if (Auth::user()->type == 'aeo' || Auth::user()->type == 'headteacher')

                                    {{-- <form method="post" action="{{ ( $action == 'index' ? route('home') : $action == 'lnd_performance' ? route('lnd') : $action == 'non_lnd_performance' ? route('non_lnd'): '' ) }}" enctype="multipart/form-data"> --}}
                                     @if (Auth::user()->type == 'aeo')
                                      {{-- <div class="col-auto">
                                        <select style="width: 145px;" id="school_filter" name="school_id" class="form-control">
                                          <option value="">Select School</option>

                                           @foreach($assigned_and_visited_schools as $school)
                                              @php
                                              $selected = "";
                                              if($selected_school_id != '' && $school->school_id == $selected_school_id){
                                                $selected = "selected";
                                              }
                                              @endphp
                                              <option {{$selected}} {{($school->visited == 1?'':'disabled')}} style="background-color:{{($school->visited == 1?'#00887A':'White')}}" value="{{$school->school_id}}">{{$school->s_name}}</option>
                                            @endforeach
                                        </select>
                                      </div> --}}
                                    @endif
                                    {{-- <div class="col-auto">
                                      <select style="width: 145px;" id="teacher_filter" name="teacher_id" class="form-control">
                                        <option value="">Select Teacher</option>
                                        @if($school_teachers_observed)
                                          @foreach($school_teachers_observed as $teacher)
                                            @php
                                              $selected = "";
                                              if($selected_teacher_id != '' && $teacher->teacher_id == $selected_teacher_id){
                                                $selected = "selected";
                                              }
                                            @endphp
                                            <option {{$selected}} value="{{$teacher->teacher_id}}">{{$teacher->teacher_name}}</option>
                                          @endforeach
                                        @endif
                                      </select>
                                    </div> --}}
                                  @endif

                                    <div class="col-auto">
                                      <button type="submit" class="btn btn-primary"><i class="fa fa-filter"></i> Filter</button>
                                    </div>
                                  </div>
                                </form>
                               </div>
                              </div>
                            </div>
                            <!-- Page header end -->


                            <!-- Content wrapper start -->
                            <div class="content-wrapper">

                                    <!-- Row start -->
                                    <div class="row gutters">


                                    </div>
                                    <!-- Row end -->


                                    <!-- Row start -->
                                    <div class="row gutters">

                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                              <div class="card">
                                                  <div class="card-header">
                                                          <div class="card-title">Classroom Observation Tool District Report</div>
                                                  </div>
                                                  <div class="card-body m-0 pt-0">
                                                    <div class="row">
                                                      <div class="col-md-12">
                                                         <div id="ver-bar-chart" style="width: 100%; display: block; height: 500px;"></div>
                                                      </div>
                                                    </div>
                                                  </div>
                                              </div>
                                            </div>


                                    </div>
                                    <!-- Row end -->



                            </div>
                            <!-- Content wrapper end -->


                    </div>
                    <!-- *************
                            ************ Main container end *************
                    ************* -->
		</div>
@endsection
@push('scripts')
<script type="text/javascript">

        Highcharts.chart('ver-bar-chart', {

            chart: {
                type: 'column'
            },
            title: {
                text: 'School Level Repeated Observations'
            },
            subtitle: {
                text: '(Total School Visits = <?php echo $graph_data['total_visits']?>)'
            },
            colors: [
                '#9c8847','#008000','#1a476f'
              ],
            credits: {
              enabled: false
            },
            xAxis: {
                categories: [
                    'Visits'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Number of Schools'
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Low Range (1-4 visits)',
                data: [<?php echo $graph_data['low_percentage']?>]

            }, {
                name: 'Required Range (5-7 visits)',
                data: [<?php echo $graph_data['required_percentage']?>]

            }, {
                name: 'High Range (>8 visits)',
                data: [<?php echo $graph_data['high_percentage']?>]

            }]
        });

        var selected_school_id = {{$selected_school_id}};
        var selected_teacher_id = {{$selected_teacher_id}};

        if(selected_school_id != '' && selected_teacher_id!= ''){
          @if (Auth::user()->type == 'aeo')
            get_teachers({{$login_id}},selected_school_id, selected_teacher_id, {{$month}}, {{$year}});
          @endif
        }else if(selected_school_id != ''){
          @if (Auth::user()->type == 'aeo')
            get_teachers({{$login_id}},selected_school_id, false, {{$month}}, {{$year}});
          @endif
        }

        $('#school_filter').change(function(){
          if($(this).val() != ''){
            selected_teacher_id = 0;
            @php
              $selected_teacher_id = 0;
            @endphp
            var month_year = $('#month_filter').val().split(",");
            get_teachers({{$login_id}},$(this).val(), {{$selected_teacher_id}}, month_year[0], month_year[1]);
          }else{
            $('#teacher_filter').html('<option value="">Select Teacher</option>');
          }
        });


        $('#month_filter').change(function(){
          /* Only AEO need to show teachers list */
          @if (Auth::user()->type == 'aeo')
            if($(this).val() != ''){
              selected_teacher_id = 0;
              selected_school_id = 0;
              @php
                $selected_teacher_id = 0;
                $selected_school_id = 0;
              @endphp

              var month_year = $('#month_filter').val().split(",");
              get_assigned_and_visited_schools({{$login_id}},month_year[1], month_year[0]);
              $('#teacher_filter').html('<option value="">Select Teacher</option>');
            }else{
              $('#teacher_filter').html('<option value="">Select Teacher</option>');
            }
          @elseif (Auth::user()->type == 'headteacher')
            if($(this).val() != ''){
              selected_teacher_id = 0;
              @php
                $selected_school_id = 0;
                $type = '';
                if($action == 'lnd_performance'){
                  $type = 'lnd';
                }else if($action == 'non_lnd_performance'){
                  $type = 'non_lnd';
                }
              @endphp
              var month_year = $('#month_filter').val().split(",");
              $.ajax({
                type: "POST",
                data: { "_token": "{{ csrf_token() }}",school_id: {{Auth::user()->school_id_Fk}}, s_month: month_year[0], s_year: month_year[1], type: '{{$type}}'},
                url:"{{ route('get_teachers_for_head') }}",
                success: function(data) {
                  if (parseInt(data) == 0) {
                    alert('Something went wrong while fething teacher information.');
                    $('#teacher_filter').html('<option value="">Select Teacher</option>');
                  } else {
                    $('#teacher_filter').html(data);
                  }
                }
              });
            }else{
              $('#teacher_filter').html('<option value="">Select Teacher</option>');
            }
          @endif
        });



        function get_teachers(a_id, s_id, t_id, month, year){

          var aeo_id_Fk  = a_id;
          var school_id_Fk  = s_id;
          var teacher_id_Fk  = t_id;
          $.ajax({
            type: "POST",
            //async: false,
            //cache: false,
            data: { "_token": "{{ csrf_token() }}",aeo_id : aeo_id_Fk, school_id: school_id_Fk, teacher_id: teacher_id_Fk, s_month: month, s_year: year},
            url:"{{ route('get_teachers') }}",
            success: function(data) {
              if (parseInt(data) == 0) {
                alert('Something went wrong while fething teacher information.');
                $('#teacher_filter').html('<option value="">Select Teacher</option>');
              } else {
                $('#teacher_filter').html(data);
              }
            }
          });
        }

        function get_assigned_and_visited_schools(aeo_id, year, month){

          $.ajax({
            type: "POST",
            //async: false,
            //cache: false,
            data: { "_token": "{{ csrf_token() }}", a_id: aeo_id, s_year: year, s_month: month},
            url:"{{ route('aeo_assigned_and_visited_schools') }}",
            success: function(data) {
              if (parseInt(data) == 0) {
                alert('Something went wrong while fething teacher information.');
                $('#teacher_filter').html('<option value="">Select Teacher</option>');
              } else {
                $('#school_filter').html(data);
                $('#teacher_filter').html('<option value="">Select Teacher</option>');
              }
            }
          });
        }
</script>
@endpush