@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('All Pizza') }}</div>

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
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Small Pizza Price</th>
                                <th scope="col">Medium Pizza Price</th>
                                <th scope="col">Large Pizza Price</th>
                                <th scope="col">Category</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($pizzas) > 0)
                                @foreach ($pizzas as $key   => $pizza)
                                    <tr>
                                        <th scope="row">{{ $key+1 }}</th>
                                        <td> <img src="{{ Storage::url($pizza->image) }}" width="80"> </td>
                                        <td>{{ $pizza->name }}</td>
                                        <td>{{ $pizza->description }}</td>
                                        <td>{{ $pizza->small_pizza_price }}</td>
                                        <td>{{ $pizza->medium_pizza_price }}</td>
                                        <td>{{ $pizza->large_pizza_price }}</td>
                                        <td>{{ $pizza->category }}</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">Edit</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        </table>
                </div>
            </div>
        </div>

        
    </div>
</div>
@endsection
