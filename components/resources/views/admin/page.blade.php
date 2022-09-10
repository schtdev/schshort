@extends('admin.app')
@section('title', 'Pages')

@section('content')
@include('layouts.msg')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-0 d-flex justify-content-between align-items-center">
                Manage pages
                <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#pageadd">Add new</a>
                    @include('admin.modal.page_add')
            </h4>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Title</th>
                  <th>Slug</th>
                  <th>Visibily</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($pages as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{url('/')}}/{{$item->slug}}</td>
                        <td>
                          @if ($item->footer == true)
                            <i class="mdi mdi-eye text-success"></i>
                          @else
                            <i class="mdi mdi-eye-off text-secondary"></i>
                          @endif</td>
                        <td>
                          <a class="btn btn-success btn-sm" href="{{route('pageshow', $item->slug)}}" target="_blank">See</a>
                          @canany(['isAdmin', 'isModerator'])
                            <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#edit{{$item->id}}">Edit</a>
                            @include('admin.modal.page_edit')
                          @endcanany
                          @can('isAdmin')
                            <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#delete{{$item->id}}">Delete</a>
                            @include('admin.modal.page_delete')
                          @endcan
                        </td>
                    </tr>
                @empty
                    
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection