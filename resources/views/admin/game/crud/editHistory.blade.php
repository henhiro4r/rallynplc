<!-- The Modal -->
<div class="modal fade" id="editModal-{{$history->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit History {{$history->id.' - '.$history->game->title}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" style="text-align: left;">
                <form action="{{route ('history.update', $history->id)}}" method="post">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="form-group">
                        <label for="title">Game Title</label>
                        <input type="text" name="title" class="form-control" value="{{$history->game->title}}">
                    </div>
                    <div class="form-group">
                        <label for="type">Result Team A</label>
                        <select name="resultA" class="custom-select">
                            <option value="W" {{$history->resultA == 'W' ? 'selected' : ''}}>Win</option>
                            <option value="L" {{$history->resultA == 'L' ? 'selected' : ''}}>Lose</option>
                            <option value="D" {{$history->resultA == 'D' ? 'selected' : ''}}>Draw</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="type">Result Team B</label>
                        <select name="resultB" class="custom-select">
                            <option value="W" {{$history->resultB == 'W' ? 'selected' : ''}}>Win</option>
                            <option value="L" {{$history->resultB == 'L' ? 'selected' : ''}}>Lose</option>
                            <option value="D" {{$history->resultB == 'D' ? 'selected' : ''}}>Draw</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update History</button>
                    </div>
                </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>