@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h4 mb-0 font-weight-bold text-primary">Quiz Detail</h1>
            </div>
            <div class="card body">
                <div class="col-md-12" style="margin-top: 1em;">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Quiz Title</label>
                        </div>
                        <div class="col-md-8">
                            : <b>{{$quiz->title}}</b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Question</label>
                        </div>
                        <div class="col-md-8">
                            : <b>{{$quiz->question}}</b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Quiz Answer</label>
                        </div>
                        <div class="col-md-8">
                            : <b>{{$quiz->answer}}</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection