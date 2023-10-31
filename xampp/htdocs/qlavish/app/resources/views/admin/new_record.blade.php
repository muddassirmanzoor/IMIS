@include('admin.layouts.header')
@include('admin.layouts.partial.header')
@include('admin.layouts.partial.sidebar')
<div class="col-11 deshbord-inner-body min-vh-100" id ="uiNavbar">
    <!-- content -->
    <div class="main-content">
        <!--------------page-title-wrapper------------>
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-wrapper">
                    <h3 class="page-title">New Record</h3>
                </div>
            </div>
        </div>
                <!---------------------------->
        <div class="row new-record-card-row">
            <div class="col-md-3">
                <div class="new-record-card-card">
                    <a class="new-record-card-card-link" href="{{route('admin.car.rental')}}">
                        <div class="new-record-card-body">
                            <div class="new-record-card-header-image"><img class="new-record-card-admin-icons" src="{{asset('assets/admin/image/admin-icons/car_rental_office.png')}}"> </div>
                            <div class="card-heading"><h4 class="new-record-card-admin-heading">Car Rental</h4></div>
                        </div>
                    </a>
                </div>
            </div><!---------new-record-card col End----------->
            <div class="col-md-3">
                <div class="new-record-card-card">
                    <a class="new-record-card-card-link" href="{{route('admin.car.company.record')}}">
                        <div class="new-record-card-body">
                            <div class="new-record-card-header-image"><img class="new-record-card-admin-icons" src="{{asset('assets/admin/image/admin-icons/company.png')}}"> </div>
                            <div class="card-heading"><h4 class="new-record-card-admin-heading">Car Company</h4></div>
                        </div>
                    </a>
                </div>
            </div><!---------new-record-card col End----------->
            <div class="col-md-3">
                <div class="new-record-card-card">
                    <a class="new-record-card-card-link" href="{{route('admin.new.city.record')}}">
                        <div class="new-record-card-body">
                            <div class="new-record-card-header-image"><img class="new-record-card-admin-icons" src="{{asset('assets/admin/image/admin-icons/location.png')}}"> </div>
                            <div class="card-heading"><h4 class="new-record-card-admin-heading">City</h4></div>
                        </div>
                    </a>
                </div>
            </div><!---------new-record-card col End----------->
            <div class="col-md-3">
                <div class="new-record-card-card">
                    <a class="new-record-card-card-link" href="{{route('admin.external.discount')}}">
                        <div class="new-record-card-body">
                            <div class="new-record-card-header-image"><img class="new-record-card-admin-icons" src="{{asset('assets/admin/image/admin-icons/external_discounts.png')}}"> </div>
                            <div class="card-heading"><h4 class="new-record-card-admin-heading">External Discounts</h4></div>
                        </div>
                    </a>
                </div>
            </div><!---------new-record-card col End----------->
            <div class="col-md-3">
                <div class="new-record-card-card">
                    <a class="new-record-card-card-link" href="{{route('admin.car.discount')}}">
                        <div class="new-record-card-body">
                            <div class="new-record-card-header-image"><img class="new-record-card-admin-icons" src="{{asset('assets/admin/image/admin-icons/car_discounts.png')}}"> </div>
                            <div class="card-heading"><h4 class="new-record-card-admin-heading">Car Discounts</h4></div>
                        </div>
                    </a>
                </div>
            </div><!---------new-record-card col End----------->
        </div>
        <!---------------------------->
    </div>
</div>
</div>
</div>
<footer>
<div class="main-footer">All rights reserved by the QLavish.</div>
</footer>

<!--Logout Modal Start -->
@include('admin.layouts.partial.logout')
<!--Logout Modal Start -->
</main>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="{{asset('assets/admin/js/bootstrap.bundle.min.js')}}"></script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<script src="{{asset('assets/admin/js/popper.min.js')}}"></script>
<script>
function openNav() {

var myNav = document.getElementById("navbarToggleExternalContent");

myNav.style.display = myNav.style.display === 'none' ? '' : 'none';

document.getElementById("demo").onclick = closeNav;

var element = document.getElementById("uiNavbar");

var x = window.matchMedia("(max-width: 700px)");

if (x.matches) {

element.classList.remove("col-12");

element.classList.remove("col-md-12");

element.classList.add("col-6");

element.classList.add("col-6");


} else{

element.classList.remove("col-md-12");

element.classList.remove("col-12");

element.classList.add("col-md-10");

element.classList.add("col-6");


}

}

function closeNav() {

document.getElementById("navbarToggleExternalContent").style.display = "none";

document.getElementById("demo").onclick = openNav;

var element = document.getElementById("uiNavbar");

var x = window.matchMedia("(max-width: 700px)");

if (x.matches) {

element.classList.remove("col-md-10");

element.classList.remove("col-6");

element.classList.add("col-12");

element.classList.add("col-md-12");


} else{

element.classList.remove("col-sm-10");

element.classList.remove("col-md-10");

element.classList.add("col-md-12");

element.classList.add("col-12");

}


}

</script>

</body>
</html>
