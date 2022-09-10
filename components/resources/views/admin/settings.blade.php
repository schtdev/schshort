@extends('admin.app')
@section('title', 'Site info')

@section('content')
@include('layouts.msg')
<div class="row">
  <div class="col-md-6 grid-margin">
    <div class="card mb-4">
      <div class="card-body">
        <h4 class="card-title">Site details</h4>
        <p class="card-description">
        Basic information of the site
        </p>
        <form class="forms-sample" action="{{route('updatesettings', $admin->id)}}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
              <label for="exampleInputUsername2">Site name</label>
              <input type="text" class="form-control" name="sitename" id="exampleInputUsername2" value="{{old('sitename', $admin->sitename)}}">
          </div>
          <div class="form-group">
              <label for="exampleInputEmail2">Site description</label>
              <textarea name="sitedes" class="form-control" rows="10">{{old('sitedes', $admin->sitedes)}}</textarea>
          </div>
          @can('isAdmin')
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
          @endcan
        </form>
      </div>
    </div>
  
    <div class="card mb-4">
      <div class="card-body">
        <h4 class="card-title">Footer area</h4>
        <p class="card-description">
        Footer info and column titles
        </p>
        <form class="forms-sample" action="{{route('updatesettings', $admin->id)}}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
              <label for="exampleInputMobile">Column 2 title</label>
              <input type="text" class="form-control" name="col2" id="exampleInputMobile" value="{{old('col2', $admin->col2)}}">
          </div>
          <div class="form-group">
              <label for="exampleInputMobile">Column 3 title</label>
              <input type="text" class="form-control" name="col3" id="exampleInputMobile" value="{{old('col3', $admin->col3)}}">
          </div>
          <div class="form-group">
              <label for="exampleInputMobile">Column-3 sec-1</label>
              <input type="text" class="form-control" name="col3s1" id="exampleInputMobile" value="{{old('col3s1', $admin->col3s1)}}">
          </div>
          <div class="form-group">
              <label for="exampleInputMobile">Column-3 sec-2</label>
              <input type="text" class="form-control" name="col3s2" id="exampleInputMobile" value="{{old('col3s2', $admin->col3s2)}}">
          </div>
          <div class="form-group">
            <label for="exampleInputMobile">Column-3 sec-3</label>
            <input type="text" class="form-control" name="col3s3" id="exampleInputMobile" value="{{old('col3s3', $admin->col3s3)}}">
          </div>
          @can('isAdmin')
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
          @endcan
        </form>
      </div>
    </div>
  </div>

  <div class="col-md-6 grid-margin">
    <div class="card mb-4">
      <div class="card-body">
        <h4 class="card-title">Social sites</h4>
        <p class="card-description">
            Social site links
        </p>
        <form action="{{route('updatesettings', $admin->id)}}" class="form-sample" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <div class="input-group">
              <input type="text" class="form-control" name="facebook" value="{{old('facebook', $admin->facebook)}}" placeholder="Facebook handle" aria-label="Recipient's username">
              <div class="input-group-append">
                <button class="btn btn-sm btn-facebook" type="button">
                  <i class="ti-facebook"></i>
                </button>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <input type="text" class="form-control" name="twitter" value="{{old('twitter', $admin->twitter)}}" placeholder="Twitter handle" aria-label="Recipient's username">
              <div class="input-group-append">
                <button class="btn btn-sm btn-twitter" type="button">
                  <i class="ti-twitter"></i>
                </button>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <input type="text" class="form-control" name="linkedin" value="{{old('linkedin', $admin->linkedin)}}" placeholder="Linkedin handle" aria-label="Recipient's username">
              <div class="input-group-append">
                <button class="btn btn-sm btn-linkedin" type="button">
                  <i class="ti-linkedin"></i>
                </button>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <input type="text" class="form-control" name="instagram" value="{{old('instagram', $admin->instagram)}}" placeholder="Instagram handle" aria-label="Recipient's username">
              <div class="input-group-append">
                <button class="btn btn-sm btn-instagram" type="button">
                  <i class="ti-instagram"></i>
                </button>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <input type="text" class="form-control" name="youtube" value="{{old('youtube', $admin->youtube)}}" placeholder="Youtube handle" aria-label="Recipient's username">
              <div class="input-group-append">
                <button class="btn btn-sm btn-youtube" type="button">
                  <i class="ti-youtube"></i>
                </button>
              </div>
            </div>
          </div>
          @can('isAdmin')
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
          @endcan
        </form>
      </div>
    </div>
  
    <div class="card mb-4">
      <div class="card-body">
        <h4 class="card-title">Top button</h4>
        <p class="card-description">
          A button in top menu bar
        </p>
        <form class="forms-sample" action="{{route('updatesettings', $admin->id)}}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="exampleInputMobile">Top menu button text</label>
            <input type="text" class="form-control" name="toptext" id="exampleInputMobile" value="{{old('toptext', $admin->toptext)}}">
          </div>
          <div class="form-group">
            <label for="exampleInputMobile">Top menu button link</label>
            <input type="text" class="form-control" name="toplink" id="exampleInputMobile" value="{{old('toplink', $admin->toplink)}}">
          </div>
          
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <h4 class="card-title">
          Service page description
        </h4>
        <p class="card-description">
          A short description for service page
        </p>
        <form class="forms-sample" action="{{route('updatesettings', $admin->id)}}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <textarea name="servicedes" class="form-control" rows="10">{{old('servicedes', $admin->servicedes)}}</textarea>
          </div>
          @can('isAdmin')
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
          @endcan
        </form>
      </div>
    </div>
  </div>
</div> {{-- Row close --}}
@endsection