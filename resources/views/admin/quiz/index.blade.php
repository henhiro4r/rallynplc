@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        @include('inc.alert')
        @include('admin.quiz.table.quiz')
    </div>
@endsection