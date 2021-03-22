@extends('layouts.master')

@section('title','Invoice')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">

        </div>
        <div class="pull-right">
            <a href="{{ Route('invoices.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-square nav-icon"></i> Add Invoice
            </a>
        </div>
    </div>
</div>
<hr>
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show">
    {{session('success')}}
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
</div>
@endif
@if (session('error'))
<div class="alert alert-warning alert-dismissible fade show">
    {{session('error')}}
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
</div>
@endif
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><b>INVOICES</b></h3>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>INV Number</th>
                    <th>Customer Name</th>
                    <th>Date</th>
                    <th>Total Item</th>
                    <!-- <th>Subtotal</th> -->
                    <!-- <th>tax</th> -->
                    <th>Total</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoices as $row)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{ $row->invoice_number }}</td>
                    <td>{{ $row->customer->name }}</td>
                    <td>{{ $row->created_at->format('D, d M Y') }}</td>
                    <td>
                        <center><span class="badge badge-success">{{ $row->detail->count() }} Item</span></center>
                    </td>
                    <!-- <td>Rp {{ number_format($row->total) }}</td> -->
                    <!-- <td>Rp {{ number_format($row->tax) }}</td> -->
                    <td>Rp {{ number_format($row->total_price) }}</td>
                    <!-- <td>
                        <a href="{{ route('invoices.print', $row->id) }}" class="btn btn-secondary btn-sm">Print</a>
                    </td> -->
                    <td>
                        <a href="{{ route('invoices.view', $row->id) }}" class="btn btn-primary float-left btn-sm">View</a>
                        <a href="{{ route('invoices.printpdf', $row->id) }}" class="btn btn-secondary float-left btn-sm">Print</a>
                        <a href="{{ route('invoices.edit', $row->id) }}" class="btn btn-warning float-left btn-sm">Edit</a>
                        <form action="{{ route('invoices.destroy', $row->id) }}" method="POST" class="float-left">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <!-- <tfoot>
                <tr>
                    <th>No</th>
                    <th>Customer Name</th>
                    <th>Date</th>
                    <th>Total Item</th>
                    <th>Subtotal</th>
                    <th>tax</th>
                    <th>Total</th>
                    <th colspan="2">Action</th>
                </tr>
            </tfoot> -->
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection