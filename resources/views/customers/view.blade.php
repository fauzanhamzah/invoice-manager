@extends('layouts.master')

@section('title','View Customer')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><b>{{ $customer->name }}</b></h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th>Customer Name: </th>
                                <td>{{ $customer->name }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>
                                    <address>
                                        {{ $customer->addressline1}}<br>
                                        {{$customer->addressline2}}<br>
                                        {{$customer->town}}
                                        {{ $customer->zipcode }} <br>
                                    </address>
                                </td>
                            </tr>
                            <tr>
                                <th>Phone: </th>
                                <td>{{ $customer->phone }}</td>
                            </tr>
                            <tr>
                                <th>Fax</th>
                                <td>{{ $customer->fax }}<br></td>
                            </tr>
                            <tr>
                                <th>Email: </th>
                                <td>@can('manage-CRUD')<a href="mailto:{{ $customer->email }}">@endcan{{ $customer->email }}</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <a href="/customers" class="btn btn-primary btn-sm ">
                << Back</a> </div> </div> </div> @endsection