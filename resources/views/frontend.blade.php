@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Menu') }}</div>

                <div class="card-body">
                    <form method="get" action="{{ route('frontpage') }}">
                        <input type="submit" name="category" class="list-group-item list-group-item-action" style="text-transform: uppercase;" value="all">
                        <input type="submit" name="category" class="list-group-item list-group-item-action" style="text-transform: uppercase;" value="vegetarian">
                        <input type="submit" name="category" class="list-group-item list-group-item-action" style="text-transform: uppercase;" value="nonvegetarian">
                        <input type="submit" name="category" class="list-group-item list-group-item-action" style="text-transform: uppercase;" value="traditional">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> ({{ count($pizzas) }} Pizzas)</div>

                <div class="card-body">
                    <div class="row">
                        @forelse ($pizzas as $pizza)
                            <div class="col-md-4 mt-2 text-center border">
                                <img src="{{ Storage::url($pizza->image) }}" class="img-thumbnail" width="100%" />
                                <p>{{ $pizza->name }}</p>
                                <p>{{ $pizza->description }}</p>
                                <a href="{{ route('pizza.show', $pizza->id) }}">
                                    <button class="btn btn-danger mb-1"> Order Now </button>
                                </a>
                            </div>
                        @empty
                            <p>No Pizza Found</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    a.list-group-item {
        font-size: 18px;
    }
    a.list-group-item:hover {
        background: red;
        color: #fff;
    }
    .card-header{
        background: red;
        color: #fff;font-size: 20px;
    }
</style>
@endsection
