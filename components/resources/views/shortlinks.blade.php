@extends('layouts.app')
@section('title')
    {{$username}}'s links
@endsection

@section('content')
    
    <div class="bg-light py-2">
      <div class="container">
        <span class="subhead mt-2">{{ __('Links') }} ({{$lcount}})</span>
        <h2 class="title-section">Shorten by you</h2>
        <div class="divider"></div>
      </div>
    </div>

    <div class="container">
      <div class="text-center img-fluid my-4">
        {!! $admin->advertise !!}
      </div>

    <div class="container">
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
                    <td>{{$item->link}}</td>
                    <td>{{url('/')}}/{{$item->code}}</td>
                    <td>{{$item->created_at->diffForHumans()}}</td>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#delete{{$item->id}}"><i class="mai-trash-bin text-danger"></i></a>
                      @include('layouts.modal.shorten_delete')
                    </td>
                </tr>
            @empty
                <p class="text-danger px-3">You have not created any short links yet!</p>
            @endforelse
          </table>
          {{$shortLinks->links()}}
        </div>
      </div> <!-- .container -->

      <div class="text-center img-fluid my-4">
        {!! $admin->advertise !!}
      </div>
    </div>

@endsection