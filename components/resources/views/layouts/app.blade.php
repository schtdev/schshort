
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="copyright" content="https://www.wall-spot.com">
  <meta name="distributor" content="https://webfuelcode.wall-spot.com">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Link2U') }} | @yield('title')</title>
  <link rel="shortcut icon" href="{{asset('image/favicon.png')}}" />
  
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <title>SeoGram - SEO Agency Template</title>

  <link rel="stylesheet" href="{{asset('assets/css/maicons.css')}}">

  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">

  <link rel="stylesheet" href="{{asset('assets/vendor/animate/animate.css')}}">

  <link rel="stylesheet" href="{{asset('assets/css/theme.css')}}">

</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    @include('layouts.navbar')

    {{-- <div class="container">
      <div class="page-banner home-banner">
        <div class="row align-items-center flex-wrap-reverse h-100">
          <div class="col-md-6 py-5 wow fadeInLeft">
            <h1 class="mb-4">Let's Check and Optimize your website!</h1>
            <p class="text-lg text-grey mb-5">Ignite the most powerfull growth engine you have ever built for your company</p>
            <a href="#" class="btn btn-primary btn-split">Watch Video <div class="fab"><span class="mai-play"></span></div></a>
          </div>
          <div class="col-md-6 py-5 wow zoomIn">
            <div class="img-fluid text-center">
              <img src="../assets/img/banner_image_1.svg" alt="">
            </div>
          </div>
        </div>
        <a href="#about" class="btn-scroll" data-role="smoothscroll"><span class="mai-arrow-down"></span></a>
      </div>
    </div> --}}
  </header>

  @yield('content')

  <footer class="page-footer bg-image" style="background-image: url(../assets/img/world_pattern.svg);">
    <div class="container">
      <div class="row mb-5">
        <div class="col-lg-5 py-3">
          <h3>{{config('app.name', $admin->sitename) }}</h3>
          <p>{{$admin->sitedes}}</p>

          <div class="social-media-button">
            @if (!empty($admin->facebook))
              <a href="https://www.facebook.com/{{$admin->facebook}}"><span class="mai-logo-facebook-f"></span></a>
            @endif
            @if (!empty($admin->twitter))
              <a href="https://twitter.com/{{$admin->twitter}}"><span class="mai-logo-twitter"></span></a>
            @endif
            @if (!empty($admin->linkedin))
              <a href="https://linkedin.com/{{$admin->linkedin}}"><span class="mai-logo-linkedin"></span></a>
            @endif
            @if (!empty($admin->instagram))
              <a href="https://instagram.com/{{$admin->instagram}}"><span class="mai-logo-instagram"></span></a>
            @endif
            @if (!empty($admin->youtube))
              <a href="https://youtube.com/{{$admin->youtube}}"><span class="mai-logo-youtube"></span></a>
            @endif
          </div>
        </div>
        <div class="col-lg-3 py-3">
          <h5>{{$admin->col2}}</h5>
          <ul class="footer-menu">
            @forelse ($pages as $item)
                <li><a href="{{route('pageshow', $item->slug)}}">{{$item->name}}</a></li>
            @empty
                <li><a href="https://www.wall-spot.com">Tech Blog</a></li>
                <li><a href="https://webfuelcode.wall-spot.com">PHP Script</a></li>
            @endforelse
          </ul>
        </div>
        <div class="col-lg-4 py-3">
          <h5>{{$admin->col3}}</h5>
          <p>{{$admin->col3s1}}</p>
          <p>{{$admin->col3s2}}</p>
          <p>{{$admin->col3s3}}</p>
        </div>
      </div>

      <p class="text-center" id="copyright">Copyright &copy; {{date('Y')}}. Develop by <a href="https://webfuelcode.wall-spot.com/" target="_blank">WebFuelCode</a></p>
    </div>
  </footer>

<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>

<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('assets/js/google-maps.js')}}"></script>

<script src="{{asset('assets/vendor/wow/wow.min.js')}}"></script>

<script src="{{asset('assets/js/theme.js')}}"></script>
  
</body>
</html>