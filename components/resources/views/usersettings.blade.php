@extends('layouts.app')
@section('title', 'User settings')

@section('content')
<div class="container">
    <div class="page-banner">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-md-6">
          <h2 class="text-center">Update personal details</h2>
        </div>
      </div>
    </div>
</div>

<div class="text-center mb-4">
  @if (!empty($admin->advertise))
    {!! $admin->advertise !!}
  @else
    <a href="https://www.wall-spot.com/likes/hostinger" target="_blank"><img src="/image/hostingeren-728x90.png" class="img-fluid" alt="Reliable web hosting service"></a>
  @endif
</div>

<div class="page-section" id="about">
  <div class="container">
    <div class="">
      @include('layouts.msg')
    </div>
    <div class="row justify-content-center my-4">
      <div class="col-sm-12 col-md-6 mb-2">
          <div class="card">
              <div class="card-body">
                  <p class="p-2">
                      Note: All fields are required. If you do not want to change the email id, keep the old mail id filled.
                  </p>
                  <form action="{{route('userupdate', $user->id)}}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="row">
                          <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                  <strong>Display Name:</strong>
                                  <input type="text" name="name" id="" class="form-control" value="{{old('name', $user->name)}}">
                              </div>
                          </div>
                          {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                  <strong>Site:</strong>
                                  <input type="text" name="site" id="" class="form-control" placeholder="Site with http:// or https://">
                              </div>
                          </div> --}}
                          <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                  <strong>Email:</strong>
                                  <input type="text" name="email" id="" class="form-control" value="{{old('email', $user->email)}}">
                              </div>
                          </div>
                          <div class="text-center mt-2">
                              <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
      <div class="col-sm-12 col-md-6 mb-2">
              <div class="card border border-danger">
                  <div class="card-body">
                      <form method="POST" action="{{ route('userupdatepass', $user->id) }}">
                          @csrf
    
                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>
    
                              <div class="col-md-6">
                                  <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                              </div>
                          </div>
    
                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
    
                              <div class="col-md-6">
                                  <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                              </div>
                          </div>
    
                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>
      
                              <div class="col-md-6">
                                  <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                              </div>
                          </div>
     
                          <div class="form-group row mb-0">
                              <div class="col-md-8 offset-md-4">
                                  <button type="submit" class="btn btn-danger">
                                      Change Password
                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
      </div>
  </div>
  </div> <!-- .container -->
</div> <!-- .page-section -->

<div class="page-section">
  <div class="container">
    <div class="text-center wow fadeInUp img-fluid">
      @if (!empty($admin->advertise))
        {!! $admin->advertise !!}
      @else
        <a href="https://www.wall-spot.com/likes/hostinger" target="_blank"><img src="/image/hostingeren-728x90.png" class="img-fluid" alt="Reliable web hosting service"></a>
      @endif
    </div>
  </div>
</div>

@endsection