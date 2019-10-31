@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h4 mb-0 font-weight-bold text-primary">Participant Detail</h1>
            </div>
            <div class="card body">
                <div class="col-md-12" style="margin-top: 1em;">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Full Name</label>
                            </div>
                            <div class="col-md-8">
                                : <b>{{$user->name}}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Username</label>
                            </div>
                            <div class="col-md-8">
                                : <b>{{$user->username}}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>School Name</label>
                            </div>
                            <div class="col-md-8">
                                : <b>{{$user->detail->school_name}}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>From (City Name)</label>
                            </div>
                            <div class="col-md-8">
                                : <b>{{$user->detail->city_name}}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>School Address</label>
                            </div>
                            <div class="col-md-8">
                                : <b>{{$user->detail->address}}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Coach Name</label>
                            </div>
                            <div class="col-md-8">
                                : <b>{{$user->detail->coach_name}}</b>
                            </div>
                        </div>
                        <div class="form-group">
                            <a class="btn btn-danger" href="{{ route('history.index') }}">Back</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection