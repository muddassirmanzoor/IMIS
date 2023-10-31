<!--Logout Modal Start -->
<div class="modal user-logout-model" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="main-logo-logout"><img src="{{asset('assets/images/image/logo.svg')}}"> </div>
        <h3 class="logout-heading">Do you want to logout?</h3>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-logout-no" data-bs-dismiss="modal">No</button>
        <a href="{{route('dealer.logout')}}">
    <button type="button" class="btn btn-logout-yes" >Yes</button>
        </a>
    </div>
    </div>
    </div>
    </div>
    <!--Logout Modal Start -->
