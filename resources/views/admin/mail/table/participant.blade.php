<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row no-gutters">
            <div class="col md-10">
                <h1 class="h4 mb-0 font-weight-bold text-primary">Participant Index</h1>
            </div>
            <div class="col md-2">
                <button type="button" class="btn btn-dark btn-circle float-right" title="Add New Game" data-toggle="modal"
                        data-target="#addmodal"><i class="fas fa-plus-circle"></i></button>
                @include('admin.mail.add')
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if(count($mails) > 0)
                <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                    <thead>
                    <tr class="text-center">
                        <th>Id</th>
                        <th>Team Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($mails as $mail)
                        <tr class="text-center">
                            <td>{{$mail->id}}</td>
                            <td>{{$mail->name}}</td>
                            <td>{{$mail->email}}</td>
                            <td width="150px">
                                <div class="row no-gutters">
                                    <div class="col-md-6">
                                        <button class="btn btn-info btn-circle" title="Edit Game" type="button" data-toggle="modal"
                                                data-target="#editModal-{{$mail->id}}"><i class="fas fa-edit"></i></button>
                                        @include('admin.mail.edit')
                                    </div>
                                    <div class="col-md-6">
                                        <form action="{{route('mailing.destroy', $mail->id)}}" method="POST">
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