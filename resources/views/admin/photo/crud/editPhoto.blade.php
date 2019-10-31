<!-- The Modal -->
<div class="modal fade" id="editModal-{{$photo->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Photo - {{$photo->title}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" style="text-align: left;">
                <div class="row no-gutters mb-2">
                    <div class="col-md-6 text-center">
                        <img src="{{asset('images/photo/'.$photo->photo_path)}}" height="200" class="img-profile" id="photos2">
                    </div>
                    <div class="col-md-6 text-center">
                        <img src="{{asset('images/photo/'.$photo->qr_code)}}" height="200" class="img-profile" id="qrcode2">
                    </div>
                </div>
                <form action="{{route ('photo.update', $photo->id)}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{$photo->title}}">
                    </div>
                    <div class="form-group d-flex flex-column">
                        <label for="qr">Photo</label>
                        <input name="photo_path" type="file" id="ppt2">
                    </div>
                    <div class="form-group">
                        <label>Code</label>
                        <input type="text" name="code" class="form-control" value="{{$photo->code}}">
                    </div>
                    <div class="form-group d-flex flex-column">
                        <label for="qr">Qr Code</label>
                        <input name="qr_code" type="file" id="qrs2">
                    </div>
                    <div class="form-group">
                        <label for="location">Value of photo</label>
                        <input type="text" name="value" class="form-control" value="{{$photo->value}}">
                    </div>
                    <div class="form-group">
                        <label for="location">Badge</label>
                        <input type="text" name="badge" class="form-control" value="{{$photo->badge}}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Edit Photo</button>
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