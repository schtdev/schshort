@extends('admin.app')
@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-3 mb-4 stretch-card transparent">
      <div class="card card-tale">
        <div class="card-body">
          <p class="mb-4">Members (30 days)</p>
          <p class="fs-30 mb-2">{{$this_month_mem}}</p>
          <p>{{$ucount}} (Total Members)</p>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-4 stretch-card transparent">
      <div class="card card-dark-blue">
        <div class="card-body">
          <p class="mb-4">Links (30 days)</p>
          <p class="fs-30 mb-2">{{$this_month_links}}</p>
          <p>{{$lcount}} (Total links)</p>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-4 stretch-card transparent">
        <div class="card card-light-blue">
          <div class="card-body">
            <p class="mb-4">Shorten by members (30 days)</p>
            <p class="fs-30 mb-2">{{$this_month_links_mem}}</p>
            <p>{{$ulcount}} (Members links)</p>
          </div>
        </div>
    </div>
    <div class="col-md-3 mb-4 stretch-card transparent">
        <div class="card card-light-danger">
          <div class="card-body">
            <p class="mb-4">Shorten by anonym (30 days)</p>
            <p class="fs-30 mb-2">{{$this_month_links_anonym}}</p>
            <p>{{$alcount}} (Anonym links)</p>
          </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3 mb-4 stretch-card transparent">
        <div class="card bg-success">
            <div class="card-body text-light">
                <p class="mb-4">Short links today</p>
                <p class="fs-30 mb-2">{{$daylinks}}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4 stretch-card transparent">
        <div class="card bg-success">
            <div class="card-body text-light">
                <p class="mb-4">Short links (7 days)</p>
                <p class="fs-30 mb-2">{{$weeklinks}}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4 stretch-card transparent">
        <div class="card bg-success">
            <div class="card-body text-light">
                <p class="mb-4">Short links (15 days)</p>
                <p class="fs-30 mb-2">{{$fifteenlinks}}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4 stretch-card transparent">
        <div class="card bg-success">
            <div class="card-body text-light">
                <p class="mb-4">Short links (60 days)</p>
                <p class="fs-30 mb-2">{{$amonthlinks}}</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title mb-0">Members</p>
                <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                        <thead>
                            <th>Name</th>
                            <th>Joined</th>
                        </thead>
                        <tbody>
                            @forelse ($users as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->created_at->diffForHumans()}}</td>
                                </tr>
                            @empty
                                
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title mb-0">Recent links</p>
                <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                    <thead>
                        <tr>
                        <th>Shorten</th>
                        <th>Links</th>
                        </tr>  
                    </thead>
                    <tbody>
                        @forelse ($shorten as $item)
                            <tr>
                                <td>{{url('/')}}/{{$item->code}}</td>
                                <td>{!! Str::limit($item->link, 27) !!}</td>
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