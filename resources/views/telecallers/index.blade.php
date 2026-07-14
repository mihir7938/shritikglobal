@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-block text-center border border-dark py-1 dashboard-heading mb-2">
                        <h1 class="m-0">Calls</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>{{ $total_calls }}</h3>
                            <p>Total Calls</p>
                        </div>
                        <a href="{{route('telecallers.calls')}}" class="small-box-footer py-3">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $total_open_calls }}</h3>
                            <p>Open Calls</p>
                        </div>
                        <a href="{{route('telecallers.calls')}}?status=Open" class="small-box-footer py-3">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $total_closed_calls }}</h3>
                            <p>Closed Calls</p>
                        </div>
                        <a href="{{route('telecallers.calls')}}?status=Closed" class="small-box-footer py-3">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($secureLoans || $unsecureLoans)
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="d-block text-center border border-dark py-1 dashboard-heading mb-2">
                            <h1 class="m-0">Loan Type</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @if($secureLoans)
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3>{{ $secureLoans }}</h3>
                                    <p>Total Secure</p>
                                </div>
                                <a href="{{route('telecallers.calls')}}?type=1" class="small-box-footer py-3">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    @endif
                    @if($unsecureLoans)
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-dark">
                                <div class="inner">
                                    <h3>{{ $unsecureLoans }}</h3>
                                    <p>Total UnSecure</p>
                                </div>
                                <a href="{{route('telecallers.calls')}}?type=0" class="small-box-footer py-3">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
@endsection
@section('footer')
@endsection