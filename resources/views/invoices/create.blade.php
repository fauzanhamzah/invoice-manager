@extends('layouts.master')

@section('title','Add Invoice')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> Add Invoice</h3>
                </div>
                <div class="card-body">
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    <form action="{{ route('invoices.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Customer</label>
                            <select name="customer_id" class="form-control" required>
                                <option value="">Choose</option>
                                @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }} - {{ $customer->email }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary"><i class="fas fa-plus"></i> Invoice</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection