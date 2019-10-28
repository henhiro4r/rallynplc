<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row no-gutters">
            <div class="col md-10">
                <h1 class="h4 mb-0 font-weight-bold text-primary" style="margin-top: 0.2em;">Game List</h1>
            </div>
            <div class="col md-2">
                <button type="button" class="btn btn-dark btn-circle float-right" title="Add New Game" data-toggle="modal"
                        data-target="#addmodal"><i class="fas fa-plus-circle"></i></button>
                @include('admin.game.crud.add')
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if(count($games) > 0)
                <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                    <thead>
                    <tr class="text-center">
                        <th>Id</th>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Code</th>
                        <th>Qr Code</th>
                        <th>PIC</th>
                        <th>Location</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($games as $game)
                        <tr class="text-center">
                            <td>{{$game->id}}</td>
                            <td><a href="{{route('games.show', $game->id)}}">{{ucwords($game->title)}}</a></td>
                            <td>@if($game->type == 'S') <p class="text-success">Single</p> @else <p class="text-primary">Versus</p> @endif </td>
                            <td>{{$game->code}}</td>
                            <td><button class="btn btn-info" title="Show QR Code" type="button" data-toggle="modal" data-target="#qrModal-{{$game->id}}">Show QR Code</button>
                                @include('admin.game.qrcode')
                            </td>
                            <td>{{ucwords($game->user->name)}}</td>
                            <td>{{ucwords($game->location)}}</td>
                            <td width="150px">
                                <div class="row no-gutters">
                                    <div class="col-md-6">
                                        <button class="btn btn-info btn-circle" title="Edit Game" type="button" data-toggle="modal"
                                                data-target="#editModal-{{$game->id}}"><i class="fas fa-edit"></i></button>
                                        @include('admin.game.crud.edit')
                                    </div>
                                    <div class="col-md-6">
                                        <form action="{{route('games.destroy', $game->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger btn-circle" title="Delete Game" type="submit"><i class="fas fa-trash"></i></button>
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