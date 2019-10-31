@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h4 mb-0 font-weight-bold text-primary">Photo {{$photo->title}} Detail</h1>
            </div>
            <div class="card body">
                <div class="col-md-12" style="margin-top: 1em;">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Photo Title</label>
                        </div>
                        <div class="col-md-8">
                            : <b>{{$photo->title}}</b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Photo</label>
                        </div>
                        <div class="col-md-8">
                            : <button class="btn btn-info" title="Show Photo" type="button" data-toggle="modal" data-target="#picModal-{{$photo->id}}">Show Photos</button>
                            @include('admin.photo.photos')
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-md-4">
                            <label>Qr Code</label>
                        </div>
                        <div class="col-md-8">
                            : <button class="btn btn-info" title="Show QR Code" type="button" data-toggle="modal" data-target="#qrModal-{{$photo->id}}">Show QR Code</button>
                            @include('admin.photo.qrcode')
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Value (Point)</label>
                        </div>
                        <div class="col-md-8">
                            : <b>{{$photo->value}}</b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Badge</label>
                        </div>
                        <div class="col-md-8">
                            : <b>{{$photo->badge}}</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection