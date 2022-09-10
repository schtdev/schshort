<!-- Modal to add new page -->
<div class="modal fade" id="pageadd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Add new page</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            
                <form action="{{route('pageadd')}}" method="POST">
                        @csrf
                    <div class="modal-body row">
                        <div class="form-group col-md-4">
                            <label for="title">Page name: <small>Minimum 4 character is required</small></label>
                            <input type="text" class="form-control" name="name" placeholder="Enter display page name">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="title">Page title: <small>Minimum 4 character is required</small></label>
                            <input type="text" class="form-control" name="title" placeholder="Enter the title">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="footer">Visibility: <small class="text-warning">Show page in footer menu?</small></label>
                            <select name="footer" class="form-control">
                              <option selected>Select one</option>
                              
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                              
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="body">Body: <small>Minimum 50 character is required</small></label>
                            <textarea class="form-control" name="body" rows="10" placeholder="Description here..."></textarea>
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