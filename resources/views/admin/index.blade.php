@extends('layouts.admin')

@section('body_class', 'admin_body')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">Registrations</div>

                <div class="panel-body">
                    <Registrations :registrations="{{ json_encode($registrations) }}" />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection