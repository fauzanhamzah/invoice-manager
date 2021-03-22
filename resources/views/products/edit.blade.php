@extends('layouts.master')

@section('title','Edit Product')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                <form action="/products/{{ $product->id }}" method="post">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $product->name }}">
                        @error('name')
                        <div class="alert alert-danger sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" cols="10" rows="10" class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}" value="{{ $product->description}}"><?= $product['description']; ?></textarea>
                        <p class="text-danger">{{ $errors->first('description') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="price">Stock</label>
                        <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" id="stock" value="{{ $product->stock }}">
                        @error('stock')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price" value="{{ $product->price }}">
                        @error('price')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        <a href="{{Route('products.index')}}" class="btn btn-danger btn-sm ">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection