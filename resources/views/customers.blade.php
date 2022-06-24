@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('All Customers') }}</div>

                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Customer Since</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($customers) > 0)
                                @foreach ($customers as $key   => $customer)
                                    <tr>
                                        <td scope="row">{{ $key+1 }}</td>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ \Carbon\Carbon::parse($customer->created_at)->format('M d Y') }}</td>
                                    </tr>
                                @endforeach
                                @else 
                                <tr>
                                    <td colspan="5" class="text-danger text-center">No Customers Found</td>
                                </tr>
                            @endif
                        </tbody>
                        </table>
                </div>
            </div>
        </div>

        
    </div>
</div>
@endsection
