@extends('layouts.app')

@section('title', '404 ERROR')

@section('content')
<div class="container">
  <div class="page-banner">
    <div class="row justify-content-center align-items-center h-100">
      <div class="row align-items-center d-flex flex-row">
        <div class="col-lg-6 text-lg-right pr-lg-4">
          <h1 class="display-1 mb-0">404</h1>
        </div>
        <div class="col-lg-6 pl-lg-4">
          <h2>SORRY!</h2>
          <h3 class="font-weight-light">The page you’re looking for was not found.</h3>
        </div>
      </div>
    </div>
  </div>

  <div class="text-center my-5">
    <a href="{{route('welcome')}}" class="btn btn-primary">Back to Home</a>
  </div>
</div>
@endsection