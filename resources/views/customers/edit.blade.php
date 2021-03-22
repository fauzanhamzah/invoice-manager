@extends('layouts.master')

@section('title','Edit Customer')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add New Customer</h3>
                </div>
                <div class="card-body">
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    <form action="/customers/{{$customer->id}}" method="post">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $customer->name }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="addressline1">Address Line 1</label>
                            <input type="text" class="form-control @error('addressline1') is-invalid @enderror" id="addressline1" name="addressline1" value="{{ $customer->addressline1}}">
                            @error('addressline1')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="addressline2">Address Line 2 (* opsional)</label>
                            <input type="text" class="form-control @error('addressline2') is-invalid @enderror" id="addressline2" name="addressline2" value="{{ $customer->addressline2}}">
                            @error('addressline2')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="town">Town</label>
                            <input type="text" class="form-control @error('town') is-invalid @enderror" id="town" name="town" value="{{ $customer->town }}">
                            @error('town')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="zipcode">Zip Code</label>
                            <input type="number" class="form-control @error('zipcode') is-invalid @enderror" id="zipcode" name="zipcode" value="{{ $customer->zipcode }}">
                            @error('zipcode')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Phone</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{ $customer->phone }}">
                            @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="stock">Fax (* opsional)</label>
                            <input type="text" name="fax" class="form-control @error('fax') is-invalid @enderror" id="fax" value="{{ $customer->fax }}">
                            @error('fax')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="stock">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ $customer->email}}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                            <a href="/customers" class="btn btn-danger btn-sm ">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection