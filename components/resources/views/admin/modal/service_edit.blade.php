<!-- Modal to edit service -->
<div class="modal fade" id="edit{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Update service</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            
                <form action="{{route('serviceupdate', $item->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                    <div class="modal-body row">
                        <div class="form-group col-md-5">
                            <label for="title">Service title: <small>Minimum 4 character is required</small></label>
                            <input type="text" class="form-control" name="title" value="{{$item->title}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="link">Service Link: <small></small></label>
                            <input type="text" class="form-control" name="link" value="{{$item->link}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="link">Service Icon: <small></small></label>
                            <select name="icon" class="form-control">
                                <option value="link.svg">Link</option>
                                <option value="coins.svg">Coins</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="body">Body: <small>Minimum 10 character is required</small></label>
                            <textarea class="form-control" name="body" rows="7">{{$item->body}}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    
                </form>
            
            
        </div>
    </div>
</div>