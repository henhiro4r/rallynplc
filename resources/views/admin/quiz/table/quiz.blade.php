<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row no-gutters">
            <div class="col md-10">
                <h1 class="h4 mb-0 font-weight-bold text-primary" style="margin-top: 0.2em;">Quiz List</h1>
            </div>
            <div class="col md-2">
                <button type="button" class="btn btn-dark btn-circle float-right" title="Add New Game" data-toggle="modal"
                        data-target="#addmodal"><i class="fas fa-plus-circle"></i></button>
                @include('admin.quiz.crud.add')
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if(count($quizzes) > 0)
                <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                    <thead>
                    <tr class="text-center">
                        <th>Id</th>
                        <th>Title</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($quizzes as $quiz)
                        <tr class="text-center">
                            <td>{{$quiz->id}}</td>
                            <td>{{ucwords($quiz->title)}}</td>
                            <td>{{$quiz->question}}</td>
                            <td>{{$quiz->answer}}</td>
                            <td width="150px">
                                <div class="row no-gutters">
                                    <div class="col-md-6">
                                        <button class="btn btn-info btn-circle" title="Edit Game" type="button" data-toggle="modal"
                                                data-target="#editModal-{{$quiz->id}}"><i class="fas fa-edit"></i></button>
                                        @include('admin.quiz.crud.editQuiz')
                                    </div>
                                    <div class="col-md-6">
                                        <form action="{{route('quiz.destroy', $quiz->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger btn-circle" title="Delete Quiz" type="submit"><i class="fas fa-trash"></i></button>
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