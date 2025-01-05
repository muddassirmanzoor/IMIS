<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/theme/favicon.png') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body class="h-100">
<div class="authincation h-100">
    <div class="container-fluid h-100 p-5">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-7">
				<div class="row">
					<div class="col-md-10 ml-5">
						<h2 class="text-white"><b>IMIS</b> <span>(Transformation in Access, Learning, Equity and Education Management )</span></h2>
						<p class="text-white">Development of IMIS is listed as a strategy to ensure evidence-based decision making in the education sector. The creation of IMIS is a sector level initiative that will not only bring all the departments and their attached entities under one umbrella but will also foster inclusive and effective delivery of services at provincial level.</p>
						<p  class="text-white">IMIS has focused on integration of data streams of attached departments of the School Education Department i.e., SED, PMIU, SpED, L&NFBED, ASP, PEC, PEF, QAED, etc., to facilitate reporting and decision making for all stakeholders. </p>
					</div>
				</div>
			</div>
			<div class="col-md-5">
                <div class="authincation-content11  pr-5">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">
								<div class="taleem-logo text-center pb-2">
								<img src="{{ asset('images/imis-images/Taleem-Logo-IMIS.png') }}" style="width: 189px;margin: 0 auto;">
								</div>
                                <h4 class="text-center mb-4">Sign In Your Account</h4>
                                <form id="loginForm" method="POST" action="{{ url('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label><strong>User Name</strong></label>
                                        <input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Password</strong></label>
                                        <input name="password" type="password" class="form-control" value="" placeholder="Password">
                                    </div>
                                    @if($errors->any())
                                        <div class="alert alert-danger error">{{ $errors->first('email') }}</div>
                                    @endif
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary" style=" float: right;">Sign in</button>
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


<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->
@include('partials.js._footer_scripts');
<script>
    $(document).ready(function () {
        $('#email').on('input', function () {
            $('.error').remove(); // Clear the error message
        });
    });
</script>
</body>

</html>
