@extends('layouts.master')

@section('title','Product')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">

        </div>
        <div class="pull-right">
            <a href="{{Route('products.create')}}" class="btn btn-primary">
                <i class="fas fa-plus-square nav-icon"></i> Add Product
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
        <h3 class="card-title">
            <b>PRODUCTS</b>
        </h3>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Product Number</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Stock</th>
                    <th>Unit Price</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{ $product->product_number }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <form action="/products/{{ $product->id }}" method="post">
                            @method('delete')
                            @csrf
                            <a href="/products/{{ $product->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection