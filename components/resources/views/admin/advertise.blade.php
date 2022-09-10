@extends('admin.app')
@section('title', 'Advertise settings')

@section('content')
@include('layouts.msg')
<div class="row">
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Site ad places</h4>
                <p class="card-description">
                Setup the ad places. You are free to use scripts (like Google Adsense) or just the banner ad or link (HTML) code. For a list of popular ad netwroks <a href="https://www.wall-spot.com/popular-ad-network-for-publishers" target="_blank" rel="noopener noreferrer">visit here <i class="mdi mdi-open-in-new"></i></a>.
                </p>
                <form class="forms-sample" action="{{route('updatead', $admin->id)}}" method="POST">
                  @csrf
                  @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputUsername2">Ad details here</label>
                        <textarea class="form-control" name="advertise" id="" cols="30" rows="10">{{$admin->advertise}}</textarea>
                    </div>
                    @canany(['isAdmin', 'isModerator'])
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    @endcanany
                </form>
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