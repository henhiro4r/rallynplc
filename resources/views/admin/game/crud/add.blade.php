<!-- The Modal -->
<div class="modal fade" id="addmodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add New Game</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" style="text-align: left;">
                <div class="text-center py-2">
                    <img src="http://placehold.it/500x500" height="250" class="img-profile" id="qrcode">
                </div>
                <form action="{{route ('games.store')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Game Title..." required>
                    </div>
                    <div class="form-group">
                        <label for="type">Game Type</label>
                        <select name="type" class="form-control">
                            <option value="S">Single</option>
                            <option value="V">Versus</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Code</label>
                        <input type="text" name="code" class="form-control" placeholder="Code in QR Code..." required>
                    </div>
                    <div class="form-group d-flex flex-column">
                        <label for="qr">Qr Code</label>
                        <input name="qr_code" type="file" id="qrs">
                    </div>
                    <div class="form-group">
                        <label>Select PIC</label>
                        <select name="liaison_id" class="form-control">
                            @foreach($los as $lo)
                                <option value="{{$lo->id}}">{{$lo->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="location">Post Game Location</label>
                        <input type="text" name="location" class="form-control" placeholder="Game Location...">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Game</button>
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