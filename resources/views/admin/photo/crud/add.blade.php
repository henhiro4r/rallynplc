<!-- The Modal -->
<div class="modal fade" id="addmodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add New Photo</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" style="text-align: left;">
                <div class="row no-gutters mb-2">
                    <div class="col-md-6 text-center">
                        <img src="http://placehold.it/500x500" height="200" class="img-profile" id="photos">
                    </div>
                    <div class="col-md-6 text-center">
                        <img src="http://placehold.it/500x500" height="200" class="img-profile" id="qrcode">
                    </div>
                </div>
                <form action="{{route ('photo.store')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Photo Title..." required>
                    </div>
                    <div class="form-group d-flex flex-column">
                        <label for="qr">Photo</label>
                        <input name="photo_path" type="file" id="ppt">
                    </div>
                    <div class="form-group">
                        <label>Code</label>
                        <input type="text" name="code" class="form-control" placeholder="Code inside QR Code..." required>
                    </div>
                    <div class="form-group d-flex flex-column">
                        <label for="qr">Qr Code</label>
                        <input name="qr_code" type="file" id="qrs">
                    </div>
                    <div class="form-group">
                        <label for="location">Value of photo</label>
                        <input type="text" name="value" class="form-control" placeholder="Photo value..." required>
                    </div>
                    <div class="form-group">
                        <label for="location">Badge</label>
                        <input type="text" name="badge" class="form-control" placeholder="Badge..." required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Photo</button>
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