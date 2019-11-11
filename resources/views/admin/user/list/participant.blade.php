@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        @include('inc.alert')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row no-gutters">
                    <div class="col-md-11">
                        <h1 class="h4 mb-0 font-weight-bold text-primary" style="margin-top: 0.2em;">Participant</h1>
                    </div>
                    <div class="col-md-1 d-flex flex-md-wrap">
                        <form action="{{route('userAll.deactivate')}}" method="POST" style="margin-right: 1em; margin-left: 1.5em;">
                            {{ csrf_field() }}
                            <button class="btn btn-warning btn-circle" title="Deactivate User" type="submit"><i class="fas fa-exclamation-triangle"></i></button>
                        </form>
                        <form action="{{route('userAll.activate')}}" method="POST">
                            {{ csrf_field() }}
                            <button class="btn btn-success btn-circle" title="Activate User" type="submit"><i class="fas fa-check"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if(count($par) > 0)
                        <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                            <thead>
                            <tr class="text-center">
                                <th>Id</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Current Point</th>
                                <th>Used Point</th>
                                <th>Login Status</th>
                                <th>Last Login</th>
                                <th>Last Logout</th>
                                <th>Account Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($par as $user)
                                <tr class="text-center">
                                    <td>{{$user->id}}</td>
                                    <td><a href="{{route('users.edit', $user->id)}}">{{ucwords($user->name)}}</a></td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->point_now ? $user->point_now : '0'}}</td>
                                    <td>{{$user->point_used ? $user->point_used : '0'}}</td>
                                    <td>@if($user->is_login == '1') <p class="text-success">Logged in</p> @else <p>Logged Out</p> @endif </td>
                                    <td>{{$user->last_login ? $user->last_login : '-' }}</td>
                                    <td>{{$user->last_logout ? $user->last_logout : '-'}}</td>
                                    <td>@if($user->status == 'E') <p class="text-success">Enabled</p> @else <p class="text-danger">Disabled</p> @endif</td>
                                    <td width="150px">
                                        <div class="row no-gutters">
{{--                                            @if($user->detail_id != null)--}}
                                            <div class="col-md-4">
                                                <button class="btn btn-info btn-circle" title="Details User" type="button" data-toggle="modal"
                                                        data-target="#editModal-{{$user->id}}"><i class="fas fa-edit"></i></button>
                                                @include('admin.user.crud.editModal')
                                            </div>
{{--                                            @endif--}}
                                            <div class="col-md-4">
                                                @if($user->status == 'E')
                                                    <form action="{{route('user.deactivate')}}" method="POST">
                                                        {{ csrf_field() }}
                                                        <input name="id" type="hidden" value="{{$user->id}}">
                                                        <button class="btn btn-warning btn-circle" title="Deactivate User" type="submit"><i class="fas fa-exclamation-triangle"></i></button>
                                                    </form>
                                                @else
                                                    <form action="{{route('user.activate')}}" method="POST">
                                                        {{ csrf_field() }}
                                                        <input name="id" type="hidden" value="{{$user->id}}">
                                                        <button class="btn btn-success btn-circle" title="Activate User" type="submit"><i class="fas fa-check"></i></button>
                                                    </form>
                                                @endif
                                            </div>
                                            <div class="col-md-4">
                                                <form action="{{route('users.destroy', $user->id)}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="btn btn-danger btn-circle" title="Delete User" type="submit"><i class="fas fa-trash"></i></button>
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
    </div>
@endsection