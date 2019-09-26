@extends('layouts.theme')
@section('title','User Dashboard')
@section('main-wrapper')
  <!-- main wrapper -->
  <section id="main-wrapper" class="main-wrapper home-page user-account-section">
    <div class="container-fluid">
      <h4 class="heading">Dashboard</h4>
      
      <div class="panel-setting-main-block">
        <div class="panel-setting">
          <div class="row">
            <div class="col-md-6">
              <h4 class="panel-setting-heading">Your Details</h4>
              <p>Change your Name, Email, Mobile Number, Password, and more.</p>
            </div>
            <div class="col-md-3">
              <p class="info">Your Email: {{$auth->email}}</p>
            </div>
            <div class="col-md-3">
              <div class="panel-setting-btn-block text-right">
                <a href="{{url('account/profile')}}" class="btn btn-setting">Edit Details</a>
              </div>
            </div>
          </div>
        </div>
      
       
        {{-- <div class="panel-setting">
          <div class="row">
            <div class="col-md-6">
              <h4 class="panel-setting-heading">Parent Controll</h4>
              <p>Change your parent controll settings.</p>
            </div>
            <div class="col-md-offset-3 col-md-3">
              <div class="panel-setting-btn-block text-right">
                <a href="#" class="btn btn-setting"><i class="fa fa-edit"></i>Change Settings</a>
              </div>
            </div>
          </div>
        </div> --}}
      </div>
    </div>
  </section>
  <!-- end main wrapper -->
@endsection