<!-- The Modal -->
<div class="modal fade" id="editModal-{{$history->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit History {{$history->id.' - '.$history->quiz->title}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" style="text-align: left;">
                <form action="{{route ('historyQuiz.update', $history->id)}}" method="post">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="form-group">
                        <label for="title">Quiz Title</label>
                        <p><b>{{$history->quiz->title}}</b></p>
                    </div>
                    <div class="form-group">
                        <label for="title">Team Name</label>
                        <p><b>{{$history->user->name}}</b></p>
                    </div>
                    <div class="form-group">
                        <label for="title">Team Name</label>
                        <input type="number" min="0" max="3" step="1" name="try" value="{{$history->try}}" class="form-control">
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