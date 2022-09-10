@extends('admin.app')
@section('title', 'Users')

@section('content')
<div class="row">
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-title mb-1 d-flex justify-content-between align-items-center">
                    Registered members ({{$count}})
                    <a href="{{route('team')}}">Team</a>
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
                                <td>
                                    {{$user->name}}
                                    @if ($user->role == 'admin')
                                        <i class="mdi mdi-star-circle text-success"></i>
                                    @elseif ($user->role == 'moderator')
                                        <i class="mdi mdi-star text-info"></i>
                                    @endif
                                </td>
                                <td>{{$user->shortlinks->count()}}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#show{{$user->id}}">See</a>
                                    @include('admin.modal.user_show')

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