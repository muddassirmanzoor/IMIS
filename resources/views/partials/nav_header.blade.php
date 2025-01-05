<!--**********************************
        Nav header start
    ***********************************-->
<div class="nav-header">
    <?php
    if(auth()->user()->hasRole(['District'])){
        $redirect = '/OOSC_2024';
    }else{
        $redirect = '/dashboard';
    }
    ?>
    <a href="{{url($redirect)}}" class="brand-logo">
        <!--IMIS Dashboard-->
        <img src="{{ asset('images/imis-images/SED_new_logo.svg') }}" style="padding: 4px; width: 100%;" />
        <!--<img class="logo-abbr" src="images/logo-white.png" alt="">
        <img class="logo-compact" src="images/logo-white-text.png" alt="">
        <img class="brand-title" src="images/logo-white-text.png" alt="">-->
    </a>

    <div class="nav-control">
        <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
    </div>
</div>
<!--**********************************
    Nav header end
***********************************-->
