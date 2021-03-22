@extends('layouts.master')

@section('title', 'Home')

@section('content')
<!-- Info boxes -->
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fab fa-product-hunt"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Product</span>
                <span class="info-box-number">

                    <small><b>{{ $counts }}</b></small>
                </span>
            </div>

        </div>

    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fab fa-intercom"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Customer</span>
                <span class="info-box-number"><b>{{ $c_customers }}</b></span>
            </div>

        </div>

    </div>



    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">User</span>
                <span class="info-box-number">{{ $c_users }}</span>
            </div>

        </div>

    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-file-invoice-dollar"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Invoice</span>
                <span class="info-box-number">{{ $c_invoice }}</span>
            </div>

        </div>

    </div>

</div>

<div class="card">
    <div class="card-header">{{ __('Welcome') }}</div>

    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        {{ __('') }}
        <div class="card-body">
            <center>
                <img src="/img/Logo-EnerrenTech.png" alt="logo" height="300" width="700">
                <h3>Selamat Datang Di Sistem Informasi Penagihan Penjualan</h3>
            </center>
        </div>
    </div>
</div>
@endsection