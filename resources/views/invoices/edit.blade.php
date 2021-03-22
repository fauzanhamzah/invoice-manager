@extends('layouts.master')

@section('title','Edit Invoice')

@section('content')
<!-- DataTales Example -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <div class="text-center">
                                <img src="/img/Logo-EnerrenTech.png" alt="" width="300px" height="100px">
                            </div>

                        </center>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-striped">
                            <tr>
                                <td width="30%">Customer</td>
                                <td>{{ $invoices->customer->name }}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>{{ $invoices->customer->addressline1 }}
                                    {{ $invoices->customer->addressline2 }} <br>
                                    {{ $invoices->customer->town }}
                                    {{ $invoices->customer->zipcode }}
                                </td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>{{ $invoices->customer->phone }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $invoices->customer->email }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-12 mt-3">
                        <form action="{{ route('invoices.update', ['id' => $invoices->id]) }}" method="post">
                            @csrf
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Product</td>
                                        <td>Qty</td>
                                        <td>Unit Price</td>
                                        <td>Sub total Product</td>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1 @endphp
                                    @foreach ($invoices->detail as $detail)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $detail->product->name }}</td>
                                        <td>{{ $detail->qty }}</td>
                                        <td>Rp {{ number_format($detail->price_detail) }}</td>
                                        <td>Rp {{ $detail->subtotal }}</td>
                                        <td>
                                            <form action="{{ route('invoices.delete_product', ['id' => $detail->id]) }}" method="post">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE" class="form-control">
                                                <button class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="hidden" name="_method" value="PUT" class="form-control">
                                            <select name="product_id" class="form-control">
                                                <option value="">Choose Product</option>
                                                @foreach ($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" min="1" value="1" name="qty" class="form-control" required>
                                        </td>
                                        <td colspan="3">
                                            <button class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i></button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </form>
                    </div>
                    <div class="col-md-4 offset-md-8">
                        <table class="table table-hover table-bordered">
                            <tr>
                                <td>Sub Total</td>
                                <td>:</td>
                                <td>Rp {{ number_format($invoices->total) }}</td>
                            </tr>
                            <tr>
                                <td>Tax ( 10% )</td>
                                <td>:</td>
                                <td>Rp {{ number_format($invoices->tax) }}</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>:</td>
                                <td>Rp {{ number_format($invoices->total_price) }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <a href="{{ route('invoices.index') }}" class="btn btn-primary btn-sm">List Invoice</a>
            </div>
        </div>
    </div>
</div>
@endsection