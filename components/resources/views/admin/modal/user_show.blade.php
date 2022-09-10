<!-- Modal to edit service -->
<div class="modal fade" id="show{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">User details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-borderless">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td>{{$user->name}}</td>
                    </tr>
                    <tr>
                        <th>No. of links</th>
                        <td>{{$user->shortlinks->count()}}</td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td>
                            @if (!empty($user->role))
                                {{Str::upper($user->role)}}
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Assign role</th>
                        <td>
                            <form action="{{route('assignrole', $user->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="role" class="form-control">
                                            <option value="NULL" selected>Assign a role</option>
                                            <option value="admin">Admin</option>
                                            <option value="moderator">Moderator</option>
                                            <option value="">Un-assign role</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-info btn-sm">Submit</button>
                                    </div>
                                </div>
                                
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <th>Joined at</th>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>