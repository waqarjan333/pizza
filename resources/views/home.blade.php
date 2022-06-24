@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Your Orders') }}</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">User</th>
                                <th scope="col">Phone/Email</th>
                                <th scope="col">Date/Time</th>
                                <th scope="col">Pizza</th>
                                <th scope="col">Small Pizza</th>
                                <th scope="col">Medium Pizza</th>
                                <th scope="col">Large Pizza</th>
                                <th scope="col">Total</th>
                                <th scope="col">Message</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($userOrders) > 0)
                                @foreach ($userOrders as $key => $order)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>{{ $order->user->email }} <br> {{ $order->phone }}</td>
                                        <td>{{ $order->date }} / {{ $order->time }}</td>
                                        <td>{{ $order->pizza->name }}</td>
                                        <td>{{ $order->small_pizza }}</td>
                                        <td>{{ $order->medium_pizza }}</td>
                                        <td>{{ $order->large_pizza }}</td>
                                        <td>
                                           $ {{ ($order->pizza->small_pizza_price * $order->small_pizza) + ($order->pizza->medium_pizza_price * $order->medium_pizza) + ($order->pizza->large_pizza_price * $order->large_pizza) }}
                                        </td>
                                        <td>{{ $order->body }}</td>
                                        <td>{{ $order->status }}</td>
                                    </tr>
                                @endforeach
                            @else
                            <tr>
                                <th colspan="14" class="text-center text-danger">No Order Found</th>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    {{-- {{ $userOrders->links(); }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .card-header{
        background: red;
        color: #fff;
    }
</style>
@endsection
