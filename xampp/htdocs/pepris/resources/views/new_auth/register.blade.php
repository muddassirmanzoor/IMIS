@extends('new_layouts.logreg_fp_layout')
@section('content')
<form method="post" action="{{ URL::to('sign-up') }}<?= isset($_GET['_q']) ? '?_q=' . $_GET['_q'] : '' ?>" id="applicant_form">
    @csrf
    <div class="msg font-bold">CREATE ACCOUNT</div>
    <div class="input-group">
        <span class="input-group-addon">
            <i class="material-icons">person</i>
        </span>
        <div class="form-line">
            <input required type="text" class="form-control" placeholder="School Owner CNIC" name="cnic" id="cnic" value="{{old('cnic')}}" maxlength="13" autofocus="">
        </div>
    </div>
    <div class="input-group">
        <span class="input-group-addon">
            <i class="material-icons">phone_iphone</i>
        </span>
        <div class="form-line">
            <input required type="text" class="form-control" placeholder="Registered Mobile Number" name="cell_number"
                   id="cell_number" value="{{old('cell_number')}}" maxlength="11">
        </div>
        <span><b>Disclaimer :</b> DO NOT give your ported mobile number (which is converted from one network to another) so that SMS delivery is ensured.</span>
    </div>
    <div class="input-group">
        <span class="input-group-addon">
            <i class="material-icons">email</i>
        </span>
        <div class="form-line">
            <input type="text" class="form-control" placeholder="Your email address (required)" name="email"
                   id="email" value="{{old('email')}}" minlength="5">
        </div>
    </div>

    @include('new_layouts/captcha')

    <div class="row">
        <div class="col-xs-12">
            <button class="btn btn-block bg-orange waves-effect" type="submit">Send Verification Pin and Set Password</button>
        </div>
    </div>
    <div class="row m-t-15 m-b-20 font-11">
        <div class="col-xs-12">
            Already have an account?<a href="{{URL::to('/login')}}" class="back-login-btn1">Login Here</a>
        </div>
    </div>
</form>


<!-- Validation Plugin Js -->
<script src="{{asset('new_admin/plugins/jquery-validation/jquery.validate.js')}}"></script>

<script src="{{asset('new_admin/js/pages/user/register.js')}}"></script>

@endsection