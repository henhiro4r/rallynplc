@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-0">Dashboard - Welcome Back {{\Illuminate\Support\Facades\Auth::user()->name}}</h3>
        </div>
        <div class="row">
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-left-primary py-2">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col mr-2">
                                <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>Total Games Played</span></div>
                                <div class="text-dark font-weight-normal h5 mb-0"><span>{{ $his }}</span></div>
                            </div>
                            <div class="col-auto"><i class="fas fa-gamepad fa-2x text-gray-300"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-left-success py-2">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col mr-2">
                                <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>Total Quiz Answered</span></div>
                                <div class="text-dark font-weight-normal h5 mb-0"><span>{{ $qz }}</span></div>
                            </div>
                            <div class="col-auto"><i class="fas fa-question-circle fa-2x text-gray-300"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-left-info py-2">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col mr-2">
                                <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>Total Photo Taken</span></div>
                                <div class="text-dark font-weight h5 mb-0"><span>{{ $ph }}</span></div>
                            </div>
                            <div class="col-auto"><i class="fas fa-images fa-2x text-gray-300"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-left-warning py-2">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col mr-2">
                                <div class="text-uppercase text-warning font-weight-bold text-xs mb-1"><span>Total Participant</span></div>
                                <div class="text-dark font-weight h5 mb-0"><span>{{ $user }}</span></div>
                            </div>
                            <div class="col-auto"><i class="fas fa-user fa-2x text-gray-300"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection