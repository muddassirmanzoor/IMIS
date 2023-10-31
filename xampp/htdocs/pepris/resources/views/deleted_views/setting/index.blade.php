@extends('layouts.app')
@section('content')
    <style>.error {
            color: #fc4b6c;
        }</style>

    <div class="content-wrapper">
        <section class="content">
            @include('layouts.alert')
            <form method="post" action="{{URL::to('admin/setting/'.base64url_encode($setting->id))}}" name="addRole" id="addSubjects" enctype="multipart/form-data">
               @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="box  box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo $page_title; ?></h3>

                        <div class="pull-right">
                            <a href="javascript:void(0);" onclick="window.location='<?php echo URL::to('home'); ?>'" class="btn btn-bordered btn-info btn-sm mb5 col-md-12">
                                <span class="fa fa-reply"></span>&nbsp;Go Back
                            </a>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <h5 class="control-label"><b>Sms Setting</b></h5>
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="incorrect_question" class="control-label">Incorrect Question</label>
                            </div>
                            <div class="col-sm-1">
                                <div class="checkbox" >
                                    <input class="correctAns" type="checkbox" name="incorrect_question" <?=($setting->incorrect_question == 1) ? 'checked' : ''?> value="1" id="incorrect_question">
                                    <label for="incorrect_question"></label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <label for="assign_question" class="control-label">Assign Question</label>
                            </div>
                            <div class="col-sm-1">
                                <div class="checkbox" >
                                    <input class="correctAns" type="checkbox" name="assign_question" <?=($setting->assign_question == 1) ? 'checked' : ''?> value="1" id="assign_question">
                                    <label for="assign_question"></label>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <label for="approve_question" class="control-label">Approve Question</label>
                            </div>
                            <div class="col-sm-1">
                                <div class="checkbox" >
                                    <input class="correctAns" type="checkbox" name="approve_question" <?=($setting->approve_question == 1) ? 'checked' : ''?> value="1" id="approve_question">
                                    <label for="approve_question"></label>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <label for="reject_question" class="control-label">Reject Question</label>
                            </div>
                            <div class="col-sm-1">
                                <div class="checkbox" >
                                    <input class="correctAns" type="checkbox" name="reject_question" <?=($setting->reject_question == 1) ? 'checked' : ''?>  value="1" id="reject_question">
                                    <label for="reject_question"></label>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="incorrect_question" class="control-label">Create User</label>
                            </div>
                            <div class="col-sm-1">
                                <div class="checkbox" >
                                    <input class="correctAns" type="checkbox" name="user_creation" <?=($setting->user_creation == 1) ? 'checked' : ''?> value="1" id="create_user">
                                    <label for="create_user"></label>
                                </div>
                            </div>
                        </div>


                        <h5 class="control-label"><b>E-mail Setting</b></h5>
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="email_incorrect_question" class="control-label">Incorrect Question</label>
                            </div>
                            <div class="col-sm-1">
                                <div class="checkbox" >
                                    <input class="correctAns" type="checkbox" name="email_incorrect_question" <?=($setting->email_incorrect_question == 1) ? 'checked' : ''?> value="1" id="email_incorrect_question">
                                    <label for="email_incorrect_question"></label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <label for="email_assign_question" class="control-label">Assign Question</label>
                            </div>
                            <div class="col-sm-1">
                                <div class="checkbox" >
                                    <input class="correctAns" type="checkbox" name="email_assign_question" <?=($setting->email_assign_question == 1) ? 'checked' : ''?> value="1" id="email_assign_question">
                                    <label for="email_assign_question"></label>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <label for="email_approve_question" class="control-label">Approve Question</label>
                            </div>
                            <div class="col-sm-1">
                                <div class="checkbox" >
                                    <input class="correctAns" type="checkbox" name="email_approve_question" <?=($setting->email_approve_question == 1) ? 'checked' : ''?> value="1" id="email_approve_question">
                                    <label for="email_approve_question"></label>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <label for="email_reject_question" class="control-label">Reject Question</label>
                            </div>
                            <div class="col-sm-1">
                                <div class="checkbox" >
                                    <input class="correctAns" type="checkbox" name="email_reject_question" <?=($setting->email_reject_question == 1) ? 'checked' : ''?>  value="1" id="email_reject_question">
                                    <label for="email_reject_question"></label>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="email_incorrect_question" class="control-label">Create User</label>
                            </div>
                            <div class="col-sm-1">
                                <div class="checkbox" >
                                    <input class="correctAns" type="checkbox" name="email_user_creation" <?=($setting->email_user_creation == 1) ? 'checked' : ''?> value="1" id="email_create_user">
                                    <label for="email_create_user"></label>
                                </div>
                            </div>
                        </div>



                        <h5 class="control-label"><b>Question Setting</b></h5>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="demo-radio-button">
                                    <h6>Question Marks</h6>
                                    <input name="question_marks" type="radio" class="with-gap" id="question_marks_readonly" value="readonly" <?=($setting->question_marks == 'readonly') ? 'checked' : ''?>/>
                                    <label for="question_marks_readonly">Read only</label>
                                    <input name="question_marks" type="radio" class="with-gap" id="question_marks_editable" value="editable" <?=($setting->question_marks == 'editable') ? 'checked' : ''?>/>
                                    <label for="question_marks_editable">Editable</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="demo-radio-button">
                                    <h6>Question Negative Marks</h6>
                                    <input name="question_negative_marks" type="radio" class="with-gap" id="question_negative_marks_readonly" value="readonly" <?=($setting->question_negative_marks == 'readonly') ? 'checked' : ''?> />
                                    <label for="question_negative_marks_readonly">Read only</label>
                                    <input name="question_negative_marks" type="radio" class="with-gap" id="question_negative_marks_editable" value="editable" <?=($setting->question_negative_marks == 'editable') ? 'checked' : ''?> />
                                    <label for="question_negative_marks_editable">Editable</label>
                                </div>
                            </div>
                        </div>

                        <div class="row no-print box-footer">
                            <div class="col-md-6">
                                <input  name="post_setting" type="submit" id="submit" value=" Save" class="btn btn-success pull-right "/>&nbsp;
                            </div>
                        </div>

                    </div><!-- /.box-body -->
                </div>
            </form>
        </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
    <!-- jQuery 3 -->
@endsection