@extends('layouts.master')

@section('title', 'Show Role')

@section('content')
<div class="container-fluid">
    <div class="col">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Show Role {{ $role->name }}</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
                </div>
            </div>
        </div>
        <br>
        <hr>
        <div class="card" style="width: auto;">
            <div class="card-header">
                <b>{{ $role->name }}</b> Permissions:
            </div>
            <ul class="list-group list-group-flush">
                @if(!empty($rolePermissions))
                @foreach($rolePermissions as $v)
                <li class="list-group-item">{{ $v->name }}</li>
                @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>
@endsection