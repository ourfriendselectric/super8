@extends('layouts.admin')

@section('body_class', 'admin_body')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">Discounts</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <a href="{{ route('discount.create') }}" class="btn btn-primary small">Add New</a>
                        </div>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Discount Code</th>
                                <th>Amount</th>
                                <th>Active</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($discounts as $discount)
                                <tr>
                                    <td>{{ $discount->code }}</td>
                                    <td>{{ $discount->amount }}</td>
                                    <td>{{ $discount->active }}</td>
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