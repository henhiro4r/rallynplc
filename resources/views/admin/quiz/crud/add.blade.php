<!-- The Modal -->
<div class="modal fade" id="addmodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add New Quiz</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" style="text-align: left;">
                <form action="{{route ('quiz.store')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Quiz Title..." required>
                    </div>
                    <div class="form-group">
                        <label>Question</label>
                        <input type="text" name="question" class="form-control" placeholder="Quiz question..." required>
                    </div>
                    <div class="form-group">
                        <label>Answer</label>
                        <input type="text" name="answer" class="form-control" placeholder="Quiz answer..." required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Quiz</button>
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