@extends('layouts.app')
@section('content')
@include('layouts.header')

<style type="text/css">
     .navbar-light .navbar-nav .nav-link {
        color: #92919f !important;
    }
</style>

   <div class="main-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">                    
                    <div class="main-content">        
    
    <div class="row">
        <div class="col-md-12" style="text-align:center;">
            <div style="width:980px; margin:0 auto; margin-top: 100px;" class="slip-body">
               
                
        <div class="row login-box-12">          
                <div class="col-md-12">
                    <h3 class="login-heading">Pay Your Challan Fee </h3>
                </div>
            <div class="col-md-12">
            @include('layouts.alert')
            </div>
            
                <div class="col-md-12">
                    <p>
                        Finally you got it, Now you can pay using PSID through ATM, Internet Banking and Over The Counter.
                    </p>
                    <p>PSID: {{$result[0]->PSID}}</p>
                </div>
                
                <form target="_blank" action="{{URL::to('ecertificate')}}" method="get">
                    @csrf
                    <div class="row" style="padding:20px;">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="text" class="form-control" style="width:200px; float: left; margin: 5px;" placeholder="Enter PSID" id="psid" name="psid" value="" >
                            
                            <button type="submit" title="Process" class="btn btn-success" style="width:55px; float: left; margin: 5px;">Pay</button>
                            <input type="hidden" id="user_id" name="user_id" value="{{$user_id}}" >
                            <input type="hidden" id="app_id" name="app_id" value="{{$app_id}}" >
                        </div>
                    </div>
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
</div>
