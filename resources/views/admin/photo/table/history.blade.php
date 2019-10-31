<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h1 class="h4 mb-0 font-weight-bold text-primary">History of Photo Taken</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if(count($historys) > 0)
                <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                    <thead>
                    <tr class="text-center">
                        <th>Id</th>
                        <th>Photo Id</th>
                        <th>Photo Title</th>
                        <th>Team Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($historys as $history)
                        <tr class="text-center">
                            <td>{{$history->id}}</td>
                            <td>{{$history->photo_id}}</td>
                            <td><a href="{{route('photo.show', $history->photo_id)}}">{{$history->photo->title}}</a></td>
                            <td><a href="{{ route('users.show', $history->user_id)}}">{{$history->user->name}}</a></td>
                            <td width="150px">
                                <div class="row no-gutters">
                                    <div class="col-md-12">
                                        <form action="{{route('historyPhoto.destroy', $history->id)}}" method="POST">
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