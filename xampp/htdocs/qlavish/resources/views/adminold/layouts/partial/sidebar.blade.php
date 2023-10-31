<div class="container-fluid">
    <div class="row">
        <div class="col-md-side-menu sticky-top sidebar-menu" id="navbarToggleExternalContent">
            <div class="align-items-center sticky-top">
                <ul class="side-menu-nav">
                    <li class="nav-item {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
                        <a href="{{route('admin.dashboard')}}" class="nav-link" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                                <img class="menu-icon on-hover" src="{{(request()->is('admin/dashboard')) ? asset('assets/admin/image/home-b.svg') : asset('assets/admin/image/home.svg')}}">
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin/user*')) ? 'active' : '' }} ">
                        <a href="{{route('admin.user.detail')}}" class="nav-link" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Users">
                            <img class="menu-icon" src="{{(request()->is('admin/user*')) ? asset('assets/admin/image/usersgroup-b.png') : asset('assets/admin/image/usersgroup.png')}}">
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin/add*')) ? 'active' : '' }}">
                        <a href="{{route('admin.new.record')}}" class="nav-link " title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Addition">
                            <img  class="menu-icon" src="{{(request()->is('admin/add*')) ? asset('assets/admin/image/addition-b.svg') : asset('assets/admin/image/addition.svg')}}">
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin/car*')) ? 'active' : '' }}">
                        <a href="{{route('admin.car.rental.discount.detail')}}" class="nav-link" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Renting Deals">
                            <img  class="menu-icon" src="{{(request()->is('admin/car*')) ? asset('assets/admin/image/renting-deals-b.svg') : asset('assets/admin/image/renting-deals.svg')}}">
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin/earning*')) ? 'active' : '' }}">
                        <a href="{{route('admin.earning')}}" class="nav-link" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Earnings">
                            <img   class="menu-icon" class="menu-icon" src="{{(request()->is('admin/earning*')) ? asset('assets/admin/image/earnings-b.svg') : asset('assets/admin/image/earnings.svg')}}">
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin/setting')) ? 'active' : '' }}">
                        <a href="{{route('admin.setting')}}" class="nav-link" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Setting">
                            <img  class="menu-icon" src="{{(request()->is('admin/setting')) ? asset('assets/admin/image/setting-b.svg') : asset('assets/admin/image/setting.svg')}}">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Logout" >
                            <img  class="menu-icon" src="{{asset('assets/admin/image/logout.svg')}}"  data-bs-toggle="modal" data-bs-target="#logoutModal">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
