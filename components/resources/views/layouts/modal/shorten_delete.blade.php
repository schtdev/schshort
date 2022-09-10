  <!-- Modal short link delete -->
  <div class="modal fade" id="delete{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLongTitle">Delete</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
          <p><i class="mai-trash text-danger" style="font-size: 58px;"></i></p>
          <p>Delete this URL and the short link from the database?</p>
          <strong>{{$item->link}}</strong>
        </div>
        <div class="modal-footer">
          <form action="{{route('shortdelete', $item->code)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-warning" data-dismiss="modal">Don't</button>
            <button type="submit" class="btn btn-danger">Yes, please!</button>
          </form>
        </div>
      </div>
    </div>
  </div>