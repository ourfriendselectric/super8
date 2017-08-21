@extends('layouts.admin')

@section('body_class', 'admin_body')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">Registered Users</div>

                <div class="panel-body">
                    <Users :users="{{ json_encode($users) }}" />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection