<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h1 class="h4 mb-0 font-weight-bold text-primary">History of Quiz Play</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if(count($historys) > 0)
                <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                    <thead>
                    <tr class="text-center">
                        <th>Id</th>
                        <th>Quiz Id</th>
                        <th>Quiz Title</th>
                        <th>Team Name</th>
                        <th>Chance Remaining</th>
                        <th>Is Right</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($historys as $history)
                        <tr class="text-center">
                            <td>{{$history->id}}</td>
                            <td>{{$history->quiz_id}}</td>
                            <td><a href="{{route('quiz.show', $history->quiz_id)}}">{{$history->quiz->title}}</a></td>
                            <td><a href="{{ route('users.show', $history->user_id)}}">{{$history->user->name}}</a></td>
                            <td>{{$history->try}}</td>
                            <td>@if($history->is_right == '0') <p class="text-danger">False</p> @else <p class="text-success">True</p> @endif </td>
                            <td width="150px">
                                <div class="row no-gutters">
                                    <div class="col-md-6">
                                        <button class="btn btn-info btn-circle" title="Edit Game" type="button" data-toggle="modal"
                                                data-target="#editModal-{{$history->id}}"><i class="fas fa-edit"></i></button>
                                        @include('admin.quiz.crud.editHistory')
                                    </div>
                                    <div class="col-md-6">
                                        <form action="{{route('historyQuiz.destroy', $history->id)}}" method="POST">
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