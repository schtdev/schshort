@extends('layouts.app')
@section('title')
    Member's dashboard
@endsection

@section('content')
<div class="page-section banner-seo-check">
    <div class="wrap bg-image" style="background-image: url(../assets/img/bg_pattern.svg);">
      <div class="container text-center">
        <div class="row justify-content-center wow fadeInUp">
          <div class="col-lg-8">
            <h2 class="mb-4">Put the URL to shorten</h2>
            <form action="{{route('generate')}}" method="POST">
              @csrf
              <input type="text" class="form-control" name="link" placeholder="E.g https://google.com/services/web/20-22-09-76-1000-ZxcVwvtuOpmklJGH">
              <button type="submit" class="btn btn-success">Shorten Now</button>
            </form>
            {{-- {{$shotLink->code ?? ''}} --}}
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .wrap -->
</div> <!-- .page-section -->
@include('layouts.msg')
<div class="container">
    
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row align-items-center">
        <div class="col-lg-12 py-3">
          <span class="subhead">{{ __('Dashboard') }}</span>
          <div class="text-center mb-4">
            @if (!empty($admin->advertise))
              {!! $admin->advertise !!}
            @else
              <a href="https://www.wall-spot.com/likes/hostinger" target="_blank"><img src="/image/hostingeren-728x90.png" class="img-fluid" alt="Reliable web hosting service"></a>
            @endif
          </div>
          <h2 class="title-section">Latest links</h2>
          <div class="divider"></div>

          <div class="table-responsive">
            <table class="table">
              <tr>
                  <th>Links</th>
                  <th>Short links</th>
                  <th>Created</th>
                  <th>Delete</th>
              </tr>
              @forelse ($shortLinks as $item)
                  <tr>
                      <td>{!! Str::limit($item->link, 27) !!}</td>
                      <td>{{url('/')}}/{{$item->code}}</td>
                      <td>{{$item->created_at->diffForHumans()}}</td>
                      <td>
                        <div class="link2u-btn">
                          <a href="#" data-toggle="modal" data-target="#delete{{$item->id}}"><i class="mai-trash-bin"></i></a>
                        </div>
                        @include('layouts.modal.shorten_delete')
                      </td>
                  </tr>
              @empty
                  <p class="text-danger px-3">You have not created any short links yet!</p>
              @endforelse
            </table>
            {{$shortLinks->links()}}
          </div>
        </div>
    </div>
</div>
@endsection
