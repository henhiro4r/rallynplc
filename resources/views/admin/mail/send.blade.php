@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        @include('inc.alert')
        <!-- Content Row -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h4 mb-0 font-weight-bold text-primary">Broadcast an email</h1>
            </div>
            <div class="card body">
                <div class="col-md-12" style="margin-top: 1em;">
                    <form action="{{ route('mail.send') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" name="subject" class="form-control" required placeholder="Email Subject...">
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea name="message" class="form-control" rows="5" placeholder="Message..." style="resize: none;"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Send Mail</button>
                            <button class="btn btn-danger" type="reset">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection