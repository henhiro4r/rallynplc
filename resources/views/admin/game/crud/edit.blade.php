<!-- The Modal -->
<div class="modal fade" id="editModal-{{$game->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Game {{$game->title}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" style="text-align: left;">
                <div class="text-center py-2">
                    <img src="{{asset('images/'.$game->qr_code)}}" height="250" class="img-profile" id="qrcode2">
                </div>
                <form action="{{route ('games.update', $game->id)}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{$game->title}}">
                    </div>
                    <div class="form-group">
                        <label for="type">Game Type</label>
                        <select name="type" class="custom-select">
                            <option value="S">Single</option>
                            <option value="V">Versus</option>
                        </select>
                    </div>
                    <div class="form-group d-flex flex-column">
                        <label for="qr">Qr Code</label>
                        <input name="qr_code" type="file" id="qrs2">
                    </div>
                    <div class="form-group">
                        <label>Select PIC</label>
                        <select name="liaison_id" class="custom-select">
                            @foreach($los as $lo)
                                <option value="{{$lo->id}}">{{$lo->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="location">Post Game Location</label>
                        <input type="text" name="location" class="form-control" value="{{$game->location}}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Edit Game</button>
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