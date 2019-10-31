<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row no-gutters">
            <div class="col md-10">
                <h1 class="h4 mb-0 font-weight-bold text-primary" style="margin-top: 0.2em;">Photo List</h1>
            </div>
            <div class="col md-2">
                <button type="button" class="btn btn-dark btn-circle float-right" title="Add New Game" data-toggle="modal"
                        data-target="#addmodal"><i class="fas fa-plus-circle"></i></button>
                @include('admin.photo.crud.add')
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if(count($photos) > 0)
                <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                    <thead>
                    <tr class="text-center">
                        <th>Id</th>
                        <th>Title</th>
                        <th>Photo</th>
                        <th>Code</th>
                        <th>Qr Code</th>
                        <th>Value</th>
                        <th>Badge</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($photos as $photo)
                        <tr class="text-center">
                            <td>{{$photo->id}}</td>
                            <td>{{ucwords($photo->title)}}</td>
                            <td><button class="btn btn-info" title="Show Photo" type="button" data-toggle="modal" data-target="#picModal-{{$photo->id}}">Show Photos</button>
                                @include('admin.photo.photos')
                            </td>
                            <td>{{$photo->code}}</td>
                            <td><button class="btn btn-info" title="Show QR Code" type="button" data-toggle="modal" data-target="#qrModal-{{$photo->id}}">Show QR Code</button>
                                @include('admin.photo.qrcode')
                            </td>
                            <td>{{$photo->value}}</td>
                            <td>{{$photo->badge}}</td>
                            <td width="150px">
                                <div class="row no-gutters">
                                    <div class="col-md-6">
                                        <button class="btn btn-info btn-circle" title="Edit Game" type="button" data-toggle="modal"
                                                data-target="#editModal-{{$photo->id}}"><i class="fas fa-edit"></i></button>
                                        @include('admin.photo.crud.editPhoto')
                                    </div>
                                    <div class="col-md-6">
                                        <form action="{{route('photo.destroy', $photo->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger btn-circle" title="Delete Photo" type="submit"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h1 class="h4 mb-0 font-weight-bold text-primary">No Records</h1>
            @endif
        </div>
    </div>
</div>