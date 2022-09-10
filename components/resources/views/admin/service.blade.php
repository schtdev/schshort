@extends('admin.app')
@section('title', 'Service links')

@section('content')
@include('layouts.msg')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-title mb-0 d-flex justify-content-between align-items-center">
                    Services
                    <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#serviceadd">Add new</a>
                    @include('admin.modal.service_add')
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                    <thead>
                        <tr>
                            <th>Icon</th>
                            <th>Title</th>
                            <th>Link</th>
                            <th>Action</th>
                        </tr>  
                    </thead>
                    <tbody>
                        @forelse ($services as $item)
                            <tr>
                                <td><img src="{{asset('image')}}/{{$item->icon}}" alt=""></td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->link}}</td>
                                <td>
                                    @canany(['isAdmin', 'isModerator'])
                                        <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#edit{{$item->id}}">Edit</a>
                                        @include('admin.modal.service_edit')
                                    @endcanany
                                    @can('isAdmin')
                                        <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#delete{{$item->id}}">Delete</a>
                                        @include('admin.modal.service_delete')
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