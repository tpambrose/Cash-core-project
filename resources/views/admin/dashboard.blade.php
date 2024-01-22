@extends('admin.layouts.app')

<x-assets.datatables />

@push('page-css')
    <link rel="stylesheet" href="{{asset('assets/plugins/chart.js/Chart.min.css')}}">
@endpush

@push('page-header')
    <div class="col-sm-12">
        <h3 class="page-title">Welcome {{ auth()->user()->name }}!</h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item active">Dashboard</li>
        </ul>
    </div>
@endpush

@section('content')
<div class="row">
    <div class="col-xl-4 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
                    <span class="dash-widget-icon text-success border-success">
                        <i class="fe fe-money"></i>
                    </span>
                    <div class="dash-count">
                        <h4>{{$balance}} Rwf</h4>
                    </div>
                </div>
                <div class="dash-widget-info">
                    <h6 class="text-muted">Balance</h6>
                    <!-- <div class="progress progress-sm">
                        <div class="progress-bar bg-success w-50"></div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
                    <span class="dash-widget-icon text-info">
                        <i class="fa fa-th-large"></i>
                    </span>
                    <div class="dash-count">
                        <h4>{{$totalIncome}} Rwf</h4>
                    </div>
                </div>
                <div class="dash-widget-info">

                    <h6 class="text-muted">Total Income</h6>
                    <!-- <div class="progress progress-sm">
                        <div class="progress-bar bg-info w-50"></div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
                    <span class="dash-widget-icon text-danger border-danger">
                        <i class="fe fe-folder"></i>
                    </span>
                    <div class="dash-count">
                        <h4>{{$totalExpenses}} Rwf</h4>
                    </div>
                </div>
                <div class="dash-widget-info">

                    <h6 class="text-muted">Total Expenses</h6>
                    <!-- <div class="progress progress-sm">
                        <div class="progress-bar bg-danger w-50"></div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <!-- Incomes Table -->
        <div class="card card-table p-3">
            <div class="card-header">
                <h4 class="card-title">Incomes</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="incomes-table" class="datatable table table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Amount</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($incomes as $index => $income)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $income['title'] }}</td>
                                    <td>{{ $income['amount'] }} Rwf</td>
                                    <td>{{ $income['date'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <!-- Expenses Table -->
        <div class="card card-table p-3">
            <div class="card-header">
                <h4 class="card-title">Expenses</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="expenses-table" class="datatable table table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Amount</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($expenses as $index => $expense)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $expense['title'] }}</td>
                                    <td>{{ $expense['amount'] }} Rwf</td>
                                    <td>{{ $expense['date'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
