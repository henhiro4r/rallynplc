@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        @include('inc.alert')
        @include('admin.quiz.table.history')
    </div>
@endsection