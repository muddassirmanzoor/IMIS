<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title') </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/theme/favicon.png') }}">

    <!-- Include CSS Files -->
    @include('partials.css._styles')

    <!-- Include Js Files -->
    @include('partials.js._scripts')

</head>

<body>
<!--**** Preloader start *****-->
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!--**** Preloader end *****-->

<!--**** Main wrapper start ****-->

<div id="main-wrapper">

    <!-- Include Nav Header -->
    @include('partials.nav_header')

    <!-- Include Header -->
    @include('partials.header')

    <!-- Include Sidebar -->
    @include('partials.sidebar')

    <!--**** Content body start ****-->

        @yield('content')
    <!--**** Content body End  ****-->

    <!-- Include Footer -->
    @include('partials.footer')

</div>
<!--****** Main wrapper end *************-->
@stack('scripts')
@include('partials.js._footer_scripts');
</body>
</html>
