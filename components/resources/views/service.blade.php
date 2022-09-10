@extends('layouts.app')
@section('title', 'Services')

@section('content')
<div class="container">
    <div class="page-banner">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-md-6">
          <h1 class="text-center">Services</h1>
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

<div class="container">
  {{$admin->servicedes}}
</div>

{{-- <div class="page-section" id="about"> --}}
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-12 py-2">
        {{-- <span class="subhead">Services</span>
        <h2 class="title-section">title</h2>
        <div class="divider"></div> --}}
        <div class="page-section">
            <div class="container">
              <div class="row">
                @foreach ($services as $item)
                  <div class="col-lg-4">
                    <div class="card-service wow fadeInUp">
                      <div class="header">
                        <img src="{{asset('image')}}/{{$item->icon}}" alt="{{$item->title}}" width="150px">
                      </div>
                      <div class="body">
                        <h5 class="text-secondary">{{$item->title}}</h5>
                        <p>{{$item->body}}</p>
                        <a href="{{$item->link}}" target="_blank" class="btn btn-primary">Open it!</a>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div> <!-- .container -->
          </div> <!-- .page-section -->
      </div>
    </div>
  </div> <!-- .container -->
{{-- </div> <!-- .page-section --> --}}

  <div class="container mb-4">
    <div class="text-center img-fluid">
      @if (!empty($admin->advertise))
        {!! $admin->advertise !!}
      @else
        <a href="https://www.wall-spot.com/likes/hostinger" target="_blank"><img src="/image/hostingeren-728x90.png" class="img-fluid" alt="Reliable web hosting service"></a>
      @endif
    </div>
  </div>

@endsection