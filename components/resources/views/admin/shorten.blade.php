@extends('admin.app')
@section('title', 'Shorten links')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-title mb-0 d-flex justify-content-between align-items-center">
                    Shorten links ({{$shorten->count()}})
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                    <thead>
                        <tr>
                            <th>Created by</th>
                            <th>Short link</th>
                            <th>Link</th>
                            <th>Clicks</th>
                            <th>Action</th>
                        </tr>  
                    </thead>
                    <tbody>
                        @forelse ($shorten as $item)
                            <tr>
                                <td>{{$item->user->name}}</td>
                                <td>{{url('/')}}/{{$item->code}}</td>
                                <td>{!! Str::limit($item->link, 27) !!}</td>
                                <td>{{$item->clicks}}</td>
                                <td>
                                    {{-- <a class="btn btn-primary btn-sm" href="">See</a> --}}
                                    {{-- <a class="btn btn-info btn-sm" href="">Edit</a> --}}
                                    @can('isAdmin')
                                        <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#delete{{$item->id}}">Delete</a>
                                        @include('admin.modal.shorten_delete')
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                    </table>
                </div>
                {{$shorten->links()}}
            </div>
        </div>
    </div>
</div>
@endsection