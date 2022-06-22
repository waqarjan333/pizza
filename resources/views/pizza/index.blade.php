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
                                        <td scope="row">{{ $key+1 }}</td>
                                        <td> <img src="{{ Storage::url($pizza->image) }}" width="80"> </td>
                                        <td>{{ $pizza->name }}</td>
                                        <td>{{ $pizza->description }}</td>
                                        <td>{{ $pizza->small_pizza_price }}</td>
                                        <td>{{ $pizza->medium_pizza_price }}</td>
                                        <td>{{ $pizza->large_pizza_price }}</td>
                                        <td>{{ $pizza->category }}</td>
                                        <td>
                                            <a href="{{ route('pizza.edit', $pizza->id) }}"><button class="btn btn-primary btn-sm">Edit</button></a>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $pizza->id }}">
                                                Delete
                                            </button>
                                        </td>
                                        
                                        <div class="modal fade" id="exampleModal{{ $pizza->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <form action="{{ route('pizza.destroy', $pizza->id) }}" method="post">@csrf 
                                                @method('DELETE');
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        Are you sure ?
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </tr>
                                        
                                @endforeach

                                @else 
                                <tr>
                                    <td colspan="10" class="text-danger text-center">No Pizza Found</td>
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
