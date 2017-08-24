@extends('layouts.admin')

@section('body_class', 'admin_body')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">Users</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <a href="{{ route('register') }}" class="btn btn-primary small">Add New</a>
                        </div>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection