@extends('layouts.master')

@section('title', 'Show User')


@section('content')
<div class="container-fluid">
    <div class="col">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Show User</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                </div>
            </div>
        </div>
        <br>
        <hr>
        <div class="card" style="width: auto;">
            <div class="card-header">
                <b>{{ $user->name }}</b>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><i class="fas fa-envelope-square"></i> Email: {{ $user->email }}</li>
                <li class="list-group-item"><i class="fas fa-user-md"></i> Role: @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                    @endforeach
                    @endif</li>
            </ul>
        </div>

        <!-- 
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $user->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    {{ $user->email }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Staff / Position:</strong>
                    {{ $user->staff }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Roles:</strong>
                    @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                    @endforeach
                    @endif
                </div>
            </div>
        </div> -->
    </div>
</div>
@endsection