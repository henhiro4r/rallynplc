@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h4 mb-0 font-weight-bold text-primary">Games Detail</h1>
            </div>
            <div class="card body">
                <div class="col-md-12" style="margin-top: 1em;">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Game Name</label>
                        </div>
                        <div class="col-md-8">
                            : <b>{{$game->title}}</b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Game Type</label>
                        </div>
                        <div class="col-md-8">
                            : @if($game->type == 'S') <b class="text-success">Single</b> @else <b class="text-primary">Versus</b> @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Game QRCode</label>
                        </div>
                        <div class="col-md-8">
                            : <button class="btn btn-info" title="Show QR Code" type="button" data-toggle="modal" data-target="#qrModal-{{$game->id}}">Show QR Code</button>
                              @include('admin.game.qrcode')
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Liaison Officer Name</label>
                        </div>
                        <div class="col-md-8">
                            : <b>{{ucwords($game->user->name)}}</b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Game Location</label>
                        </div>
                        <div class="col-md-8">
                            : <b>{{ucwords($game->location)}}</b>
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