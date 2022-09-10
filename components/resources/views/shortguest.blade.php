@extends('layouts.app')
@section('title', 'Anonymouse links')

@section('content')
<div class="page-section banner-seo-check">
    <div class="wrap bg-image" style="background-image: url(../assets/img/bg_pattern.svg);">
      <div class="container text-center">
        <div class="row justify-content-center wow fadeInUp">
          <div class="col-lg-8">
            <h2 class="mb-4">Put the URL to shorten</h2>
            <form action="{{route('generate')}}" method="POST">
              @csrf
              <input type="text" class="form-control" name="link" placeholder="E.g google.com/services/web/20-22-09-76-1000-ZxcVwvtuOpmklJGH">
              <button type="submit" class="btn btn-success">Shorten Now</button>
            </form>
            <div class="mt-4">
              <strong>Your shorten link:</strong> {{url('/')}}/{{$shortlink->code}}
            </div>
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .wrap -->
  </div> <!-- .page-section -->
  
  <div class="text-center img-fluid">
    {{$admin->advertise}}
  </div>

  <div class="page-section" id="about">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 py-3 wow fadeInUp">
          <span class="subhead">Generated links</span>
          <h2 class="title-section">Recent short links</h2>
          <div class="divider"></div>
          <table class="table">
            @foreach ($lastfive as $item)
              <tr>
                <td>{{url('/')}}/{{$item->code}}</td>
                <td>{{$item->link}}</td>
              </tr>
            @endforeach
          </table>
          <p>No guarantee of links stored into our database. Best way to keep it live, is joining us.</p>
          <a href="{{route('register')}}" class="btn btn-primary mt-3">Sign up</a>
        </div>
        <div class="col-lg-6 py-3 wow fadeInRight">
          <div class="img-fluid py-3 text-center">
            <img src="../assets/img/about_frame.png" alt="">
          </div>
        </div>
      </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->

  <div class="text-center img-fluid">
    {{$admin->advertise}}
  </div>

  <div class="page-section">
    <div class="container">
    <div class="text-center wow fadeInUp">
      <div class="subhead">Servicdes we recommend</div>
      <h2 class="title-section">We offer</h2>
      <div class="divider mx-auto"></div>
      <a href="{{route('welcomeservices')}}">See more</a>
    </div>
      <div class="row">
        @foreach ($service as $item)
          <div class="col-lg-4">
            <div class="card-service wow fadeInUp">
              <div class="header">
                <img src="../assets/img/services/service-1.svg" alt="">
              </div>
              <div class="body">
                <h5 class="text-secondary">{{$item->title}}</h5>
                <p>{{$item->body}}</p>
                <a href="{{$item->link}}" target="_blank" class="btn btn-primary">Read More</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->
@endsection