<!-- The Modal -->
<div class="modal fade" id="editModal-{{$mail->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Participant - {{$mail->name}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" style="text-align: left;">
                <form action="{{route ('mailing.update', $mail->id)}}" method="post">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="form-group">
                        <label for="title">Team Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $mail->name }}">
                    </div>
                    <div class="form-group">
                        <label for="title">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ $mail->email }}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Edit</button>
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