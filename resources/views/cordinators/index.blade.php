@extends('layouts.app')
@section('content')
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
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <h3>{{ $all_customers }}</h3>
                            <p>All Customers</p>
                        </div>
                        <a href="{{route('cordinators.customers')}}" class="small-box-footer py-3">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                @if($secureLoans)
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $secureLoans }}</h3>
                                <p>Total Secure</p>
                            </div>
                            <a href="{{route('cordinators.customers')}}?type=1" class="small-box-footer py-3">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                @endif
                @if($unsecureLoans)
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $unsecureLoans }}</h3>
                                <p>Total UnSecure</p>
                            </div>
                            <a href="{{route('cordinators.customers')}}?type=0" class="small-box-footer py-3">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                            <a href="{{ route('cordinators.customers', ['status' => $status['name']]) }}" class="small-box-footer py-3">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('footer')
@endsection