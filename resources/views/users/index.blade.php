@extends('layouts.master')

@section('title', 'User Management')

@section('content')
<div class="container-fluid">
    <div class="col">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">

                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('users.create') }}"> Create New User</a>
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
                <h3 class="card-title"><b>USERS</b></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th width="250px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $user)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-info btn-sm" href="{{ route('users.show',$user->id) }}">Show</a>
                                <a class="btn btn-warning btn-sm" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy',
                                $user->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->


        {!! $data->render() !!}
    </div>
</div>
@endsection