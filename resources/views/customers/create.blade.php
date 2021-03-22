@extends('layouts.master')

@section('title','Add Customer')

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

                <form action="/customers" method="post">
                    @csrf
                    <div class="form-row">
                        @csrf
                        <div class="form-group col-md-6">
                            <label for="name">Customer Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                            <div class="alert alert-danger sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                            <div class="alert alert-danger sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{ old('phone') }}">
                        @error('phone')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fax">Fax (* opsional)</label>
                        <input type="text" name="fax" class="form-control @error('fax') is-invalid @enderror" id="fax" value="{{ old('fax') }}">
                        @error('fax')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="addressline1">Address Line 1</label>
                        <input type="text" class="form-control @error('addressline1') is-invalid @enderror" id="addressline1" name="addressline1" value="{{ old('addressline1') }}">
                        @error('addressline1')
                        <div class="alert alert-danger sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="addressline2">Address Line 2 (*opsional)</label>
                        <input type="text" class="form-control @error('addressline2') is-invalid @enderror" id="addressline2" name="addressline2" value="{{ old('addressline2') }}">
                        @error('addressline2')
                        <div class="alert alert-danger sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="town">Town</label>
                            <input type="text" class="form-control @error('town') is-invalid @enderror" id="town" name="town" value="{{ old('town') }}">
                            @error('town')
                            <div class="alert alert-danger sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-2">
                            <label for="zipcode">Zip Code</label>
                            <input type="text" class="form-control @error('zipcode') is-invalid @enderror" id="zipcode" name="zipcode" value="{{ old('zipcode') }}">
                            @error('zipcode')
                            <div class="alert alert-danger sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Add Customer</button>
                        <a href="/customers" class="btn btn-danger btn-sm ">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection