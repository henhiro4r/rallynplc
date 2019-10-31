@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        @include('inc.alert')
        @include('admin.photo.table.photo')
    </div>
@endsection