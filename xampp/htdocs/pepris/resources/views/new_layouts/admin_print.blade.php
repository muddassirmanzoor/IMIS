<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>PEPRIS
            @if(isset($title))
            - {{$title}}
            @endif</title>

        <!-- Favicon-->
        <link rel="icon" href="{{asset('new_admin/images/favicon.ico')}}" type="image/x-icon">


        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="{{asset('new_admin/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="{{asset('new_admin/plugins/node-waves/waves.css')}}" rel="stylesheet" />

        <!-- Animation Css -->
        <link href="{{asset('new_admin/plugins/animate-css/animate.css')}}" rel="stylesheet" />

        <!-- Preloader Css -->
        <link href="{{asset('new_admin/plugins/material-design-preloader/md-preloader.css')}}" rel="stylesheet" />

        <!-- Custom Css -->
        <link href="{{asset('new_admin/css/style.css')}}" rel="stylesheet">

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="{{asset('new_admin/css/themes/all-themes.css')}}" rel="stylesheet" />
        <link href="{{asset('new_admin/css/custom.css')}}" rel="stylesheet" />

        <!-- Jquery Core Js -->
        <script src="{{asset('new_admin/plugins/jquery/jquery.min.js')}}"></script>

        <!-- Bootstrap Core Js -->
        <script src="{{asset('new_admin/plugins/bootstrap/js/bootstrap.js')}}"></script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <!--<script async src="https://www.googletagmanager.com/gtag/js?id=G-HHZRXHJF45"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'G-HHZRXHJF45');
        </script>-->

    </head>

    <body class="theme-blue">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="md-preloader pl-size-md">
                    <svg viewbox="0 0 75 75">
                    <circle cx="37.5" cy="37.5" r="33.5" class="pl-red" stroke-width="4" />
                    </svg>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- #END# Page Loader -->

        <section class="content">
            <div class="container-fluid">
                @yield('content')
                <div class="row m-t-15 information">
                    <div class="col align-center font-bold">
                        <p>Powered by School Education Department</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Slimscroll Plugin Js -->
        <script src="{{asset('new_admin/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="{{asset('new_admin/plugins/node-waves/waves.js')}}"></script>

        <!-- Custom Js -->
        <script src="{{asset('new_admin/js/admin.js')}}"></script>
    </body>
</html>
