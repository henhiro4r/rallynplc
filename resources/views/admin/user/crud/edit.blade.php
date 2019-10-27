<!-- The Modal -->
<div class="modal fade" id="editModal-{{$user->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Team {{$user->name}} Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" style="text-align: left;">
                <form method="POST" action="{{ route('users.update', $user->id) }}">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="form-group">
                        <label for="school">School Name</label>
                        <input type="text" name="school" class="form-control" value="{{$user->detail->school_name}}" placeholder="School Name...">
                    </div>
                    <div class="form-group">
                        <label for="city">City Name</label>
                        <input type="text" name="city" class="form-control" value="{{$user->detail->city_name}}" placeholder="City Name...">
                    </div>
                    <div class="form-group">
                        <label for="address">School Address</label>
                        <textarea name="address" class="form-control" placeholder="School address..." rows="3" style="resize: none;">{{$user->detail->address}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="coach">Coach Name</label>
                        <input type="text" name="coach" class="form-control" value="{{$user->detail->coach_name}}" placeholder="Coach Name...">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Edit Details</button>
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