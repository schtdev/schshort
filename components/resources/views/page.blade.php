@extends('layouts.app')
@section('title', $page->name)

@section('content')
<div class="container">
    <div class="page-banner">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-md-6">
          <h1 class="text-center">{{$page->name}}</h1>
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
    <div class="row align-items-center">
      <div class="col-lg-12 py-2">
        <span class="subhead">{{$page->name}}</span>
        <h2 class="title-section">{{$page->title}}</h2>
        <div class="divider"></div>
        {{$page->body}}
      </div>
      {{-- <div class="col-lg-6 py-3 wow fadeInRight">
        <div class="img-fluid py-3 text-center">
          <img src="../assets/img/about_frame.png" alt="">
        </div>
      </div> --}}
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