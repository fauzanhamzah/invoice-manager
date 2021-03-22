@extends('layouts.master')

@section('title','Customer')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">

        </div>
        <div class="pull-right">
            <a href="{{Route('customers.create')}}" class="btn btn-primary">
                <i class="fas fa-plus-square nav-icon"></i> Add Customer
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
        <h3 class="card-title">Customer </h3>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Customer Number</th>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th width="220px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{ $customer->customer_number }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->addressline1 }},<br>
                        {{ $customer->town }}
                        {{ $customer->zipcode }}

                    </td>
                    <td>
                        <a href="/customers/{{ $customer->id }}/view" class="btn btn-info float-left btn-sm">View</a>
                        <a href="/customers/{{ $customer->id }}/edit" class="btn btn-warning float-left btn-sm">Edit</a>
                        <form action="/customers/{{ $customer->id }}" method="post" class="float-left">
                            @method('delete')
                            @csrf
                            <button type=" submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <!-- <tfoot>
                <tr>
                    <th>No</th>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </tfoot> -->
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection