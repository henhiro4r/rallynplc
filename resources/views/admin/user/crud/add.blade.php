@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <!-- Content Row -->
        @include('inc.alert')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h4 mb-0 font-weight-bold text-primary">Add New User</h1>
            </div>
            <div class="card body">
                <div class="col-md-12" style="margin-top: 1em;">
                    <form action="{{ route('users.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" class="form-control" required placeholder="Full Name..">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" required placeholder="Username..">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required placeholder="Password..">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required placeholder="Retype Password..">
                        </div>
                        <div class="form-group d-flex flex-column">
                            <label>User Role</label>
                            <select name="role_id" class="custom-select" id="role" required>
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}" title="{{$role->description}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" id="sch">
                            <label for="school">School Name</label>
                            <input id="schid" type="text" name="school_name" class="form-control" placeholder="School Name...">
                        </div>
                        <div class="form-group" id="cty">
                            <label for="city">City Name</label>
                            <input id="ctyid" type="text" name="city_name" class="form-control" placeholder="City Name...">
                        </div>
                        <div class="form-group" id="address">
                            <label for="address">School Address</label>
                            <textarea id="addressid" name="address" class="form-control" placeholder="School address..." rows="3" style="resize: none;"></textarea>
                        </div>
                        <div class="form-group" id="coach">
                            <label for="coach">Coach Name</label>
                            <input id="coachid" name="coach_name" class="form-control" placeholder="Coach Name...">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Create New User</button>
                            <button class="btn btn-danger" type="reset">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection