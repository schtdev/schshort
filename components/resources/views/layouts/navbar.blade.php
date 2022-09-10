<nav class="navbar navbar-expand-lg navbar-light bg-white sticky" data-offset="500">
    <div class="container">
        {{-- <a href="#" class="navbar-brand">Seo<span class="text-primary">Gram.</span></a> --}}
        <a class="navbar-brand" href="{{ route('welcome') }}">
            {{ config('app.name', 'Link2U') }}
        </a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{Request::is('/') ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('welcome')}}">Home</a>
                </li>
                @auth
                    <li class="nav-item {{Request::is('home') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('home')}}">Dashboard</a>
                    </li>
                @endauth
                <li class="nav-item {{Request::is('services') ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('welcomeservices')}}">Services</a>
                </li>
                @canany(['isAdmin', 'isModerator'])
                <li class="nav-item">
                    <a class="btn btn-success ml-lg-2" href="{{route('admin')}}">{{Str::upper(Auth::user()->role)}}</a>
                </li>
                @endcanany
                <li class="nav-item">
                    <a class="btn btn-primary ml-lg-2" href="{{$admin->toplink}}">{{$admin->toptext}}</a>
                </li>
                @guest
                    <li class="nav-item {{Request::is('login') ? 'active' : ''}}">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item {{Request::is('register') ? 'active' : ''}}">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="{{route('useredit')}}" class="dropdown-item">
                                User settings
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
        </ul>
      </div>

    </div>
  </nav>