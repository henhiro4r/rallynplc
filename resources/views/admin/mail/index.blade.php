@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        @include('inc.alert')
        @include('admin.mail.table.participant')
    </div>
@endsection