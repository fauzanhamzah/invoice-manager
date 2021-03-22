@extends('layouts.master')

@section('title', 'Roles Management')

@section('content')
<div class="container-fluid">
    <div class="col">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">

                </div>
                <div class="pull-right">
                    @can('role-create')
                    <a class="btn btn-primary" href="{{ route('roles.create') }}"> Create New Role</a>
                    @endcan
                </div>
            </div>
        </div>
        <hr>

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <p>{{ $message }}</p>
        </div>
        @endif


        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><b>ROLES</b></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th width="250px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a class="btn btn-info btn-sm" href="{{ route('roles.show',$role->id) }}">Show</a>
                                @can('role-edit')
                                <a class="btn btn-warning btn-sm" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                                @endcan
                                @can('role-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        {!! $roles->render() !!}
    </div>
</div>
@endsection