@extends('admin.app')
@section('title', 'Team')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title mb-1 d-flex justify-content-between align-items-center">
                    Team ({{$count}})
                    <a href="{{route('users')}}">Members</a>
                </div>
                @include('layouts.msg')
                <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>No. of Links</th>
                            <th>Action</th>
                        </tr>  
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->shortlinks->count()}}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#show{{$user->id}}">See</a>
                                    @include('admin.modal.user_show')
                                    {{-- <a class="btn btn-info btn-sm" href="">Edit</a> --}}
                                    {{-- @if ($user->id == 1 || $user->id == 2 || $user->id == Auth::user()->id) --}}
                                    @can('isAdmin', $user)
                                        <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#delete{{$user->id}}">Delete</a>
                                        @include('admin.modal.user_delete')
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                    </table>
                </div>
                {{$users->links()}}
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="card-title mb-2">
                    Roles & Permissions
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                        <thead>
                            <tr>
                                <th>Available roles</th>
                                <th>Permissions allowed</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Admin <i class="mdi mdi-star-circle text-success"></i>
                                </td>
                                <td>
                                    Create <i class="mdi mdi-check-circle-outline text-success"></i>
                                    Edit <i class="mdi mdi-check-circle-outline text-success"></i>
                                    Delete <i class="mdi mdi-check-circle-outline text-success"></i>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Moderator <i class="mdi mdi-star text-warning"></i>
                                </td>
                                <td>
                                    <p>
                                        Create <i class="mdi mdi-check-circle-outline text-success"></i>
                                        Edit <i class="mdi mdi-check-circle-outline text-success"></i>
                                        Delete <i class="mdi mdi-close-circle-outline text-danger"></i>
                                    </p>
                                    <p>
                                        Change settings <i class="mdi mdi-close-circle-outline text-danger"></i>
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @include('admin.include')
            </div>
        </div>
    </div>
</div>
@endsection