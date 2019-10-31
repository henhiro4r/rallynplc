<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h1 class="h4 mb-0 font-weight-bold text-primary">History of Game Play</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if(count($historys) > 0)
                <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                    <thead>
                    <tr class="text-center">
                        <th>Id</th>
                        <th>Game Id</th>
                        <th>Game Title</th>
                        <th>Game Type</th>
                        <th>Team A</th>
                        <th>Result Team A</th>
                        <th>Team B</th>
                        <th>Result Team B</th>
                        <th>Game Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($historys as $history)
                        <tr class="text-center">
                            <td>{{$history->id}}</td>
                            <td>{{$history->game_id}}</td>
                            <td><a href="{{route('games.show', $history->game_id)}}">{{$history->game->title}}</a></td>
                            <td>@if($history->game->type == 'S') <p class="text-success">Single</p> @else <p class="text-primary">Versus</p> @endif </td>
                            <td><a href="{{ route('users.show', $history->teamA)}}">{{$history->teamName($history->teamA)}}</a></td>
                            <td>{{$history->resultA}}</td>
                            <td><a href="{{ route('users.show', $history->teamB)}}">{{$history->teamName($history->teamB)}}</a></td>
                            <td>{{$history->resultB}}</td>
                            <td>@if($history->is_done == '0') <p class="text-warning">Playing</p> @else <p class="text-success">Finished</p> @endif </td>
                            <td width="150px">
                                <div class="row no-gutters">
                                    <div class="col-md-6">
                                        <button class="btn btn-info btn-circle" title="Edit Game" type="button" data-toggle="modal"
                                                data-target="#editModal-{{$history->id}}"><i class="fas fa-edit"></i></button>
                                        @include('admin.game.crud.editHistory')
                                    </div>
                                    <div class="col-md-6">
                                        <form action="{{route('history.destroy', $history->id)}}" method="POST">
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