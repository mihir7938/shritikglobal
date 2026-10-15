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
                            <h1 class="m-0">Loan Type (Calls)</h1>
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
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-block text-center border border-dark py-1 dashboard-heading mb-2">
                        <h1 class="m-0">Loan Type (Customers)</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <h3>{{ $all_customers }}</h3>
                            <p>All Customers</p>
                        </div>
                        <a href="{{route('telecallers.customers')}}" class="small-box-footer py-3">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                @if($secureLoansCust)
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $secureLoansCust }}</h3>
                                <p>Total Secure</p>
                            </div>
                            <a href="{{route('telecallers.customers')}}?type=1" class="small-box-footer py-3">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                @endif
                @if($unsecureLoansCust)
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $unsecureLoansCust }}</h3>
                                <p>Total UnSecure</p>
                            </div>
                            <a href="{{route('telecallers.customers')}}?type=0" class="small-box-footer py-3">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-block text-center border border-dark py-1 dashboard-heading mb-2">
                        <h1 class="m-0">Loan Status</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @php
                    $bgClasses = [
                        'bg-success',
                        'bg-secondary',
                        'bg-danger',
                        'bg-dark',
                        'bg-primary',
                        'bg-warning',
                        'bg-info',
                        'bg-success',
                        'bg-danger',
                        'bg-dark',
                    ];
                @endphp
                @foreach($statusCounts as $key => $status)
                    <div class="col-lg-3 col-6">
                        <div class="small-box {{ $bgClasses[$key % count($bgClasses)] }}">
                            <div class="inner">
                                <h3>{{ $status['count'] }}</h3>
                                <p>{{ $status['name'] }}</p>
                            </div>
                            <a href="{{ route('telecallers.customers', ['status' => $status['name']]) }}" class="small-box-footer py-3">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('footer')
@endsection