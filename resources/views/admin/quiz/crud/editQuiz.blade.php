<!-- The Modal -->
<div class="modal fade" id="editModal-{{$quiz->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Quiz - {{$quiz->title}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" style="text-align: left;">
                <form action="{{route ('quiz.update', $quiz->id)}}" method="post">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{$quiz->title}}">
                    </div>
                    <div class="form-group">
                        <label>Question</label>
                        <input type="text" name="question" class="form-control" value="{{$quiz->question}}">
                    </div>
                    <div class="form-group">
                        <label>Answer</label>
                        <input type="text" name="answer" class="form-control" value="{{$quiz->answer}}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Edit Quiz</button>
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