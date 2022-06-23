@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('User Orders') }}</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
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
                                <th scope="col">Message</th>
                                <th scope="col">Status</th>
                                <th scope="col">Accept</th>
                                <th scope="col">Reject</th>
                                <th scope="col">Complete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($orders) > 0)
                                @foreach ($orders as $key => $order)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>{{ $order->user->email }}</td>
                                        <td>{{ $order->date }} / {{ $order->time }}</td>
                                        <td>{{ $order->pizza->name }}</td>
                                        <td>{{ $order->small_pizza }}</td>
                                        <td>{{ $order->medium_pizza }}</td>
                                        <td>{{ $order->large_pizza }}</td>
                                        <td>{{ $order->body }}</td>
                                        <td>{{ $order->status }}</td>
                                        <form method="post" action="{{ route('order.status',$order->id) }}">@csrf
                                            @method('PUT')
                                        <td>
                                            <input type="submit" name="status" value="accepted" class="btn btn-secondary btn-sm" />
                                        </td>
                                        <td>
                                            <input type="submit" name="status" value="rejected" class="btn btn-danger btn-sm" />
                                        </td>
                                        <td>
                                            <input type="submit" name="status" value="completed" class="btn btn-primary btn-sm" />
                                        </td>
                                        </form>
                                    </tr>
                                @endforeach
                            @else
                            <tr>
                                <th colspan="13" class="text-center text-danger">No Order Found</th>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    {{ $orders->links(); }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
