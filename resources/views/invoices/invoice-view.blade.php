@extends('layouts.master')

@section('title','View Invoice')

@section('content')
<div class="row">
    <div class="col-12">
        <!-- Main content -->
        <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h4>
                        <i class="fas fa-globe"></i> PT. Enerren Technologies
                        <small class="float-right">Date: {{ $invoices->created_at->format('D, d M Y') }}</small>
                    </h4>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    From
                    <address>
                        <strong>PT. Enerren Technologies</strong><br>
                        Gedung Graha Kapital Lt.1 Suite 101<br>
                        Jl. Kemang Raya No.4<br>
                        Jakarta Selatan 12780 <br>
                        Phone: +62 21 7198634<br>
                        Email: purchasing@enerren.com
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    To
                    <address>
                        <strong>{{ $invoices->customer->name }}</strong><br>
                        {{ $invoices->customer->addressline1 }}<br>
                        {{ $invoices->customer->addressline2 }}
                        {{ $invoices->customer->town }} , {{ $invoices->customer->zipcode }} <br>
                        Phone: {{ $invoices->customer->phone }}<br>
                        Email: {{ $invoices->customer->email }}
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Invoice:</b> {{ $invoices->invoice_number }}<br>
                    <br>
                    <b>Terms:</b> Due Upon Receipt<br>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Unit Price</th>
                                <th>Qty</th>
                                <th>Subtotal Product</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoices->detail as $row)
                            <tr>
                                <td>{{ $row->product->name }}</td>
                                <td>Rp {{ number_format($row->price_detail) }}</td>
                                <td>{{ $row->qty }}</td>
                                <td>Rp {{ $row->subtotal }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-5">
                </div>
                <!-- /.col -->
                <div class="col-7">

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td>Rp {{ number_format($invoices->total) }}</td>
                            </tr>
                            <tr>
                                <th>Tax (10 %)</th>
                                <td>Rp {{ number_format($invoices->tax) }}</td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td>Rp {{ number_format($invoices->total_price) }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <!-- <div class="row no-print">
                <div class="col-12">
                    <a href="{{ route('invoices.index') }}" class="btn btn-primary btn-sm">List Invoice</a>
                </div>
            </div> -->
            <!-- /.invoice -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">

        </div>
        <div class="pull-right">
            <a href="{{ route('invoices.index') }}" class="btn btn-primary">
                <i class="fas fa-chevron-left nav-icon"></i> Back
            </a>
        </div>
    </div>
</div>
<hr>
@endsection