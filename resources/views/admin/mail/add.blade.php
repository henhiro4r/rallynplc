<!-- The Modal -->
<div class="modal fade" id="addmodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add New Participant</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" style="text-align: left;">
                <form action="{{route ('mailing.store')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Team Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Team name..." required>
                    </div>
                    <div class="form-group">
                        <label for="title">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Email..." required>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select name="cat_id" class="custom-select">
                            <option value="1">Category 1</option>
                            <option value="2">Category 2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add</button>
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