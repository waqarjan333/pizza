@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <div class="card">
                <div class="card-header">{{ __('Menu') }}</div>

                <div class="card-body">
                    <ul class="list-group">
                        <a href="{{ route('pizza.index') }}" class="list-group-item list-group-item-action">View</a>
                        <a href="{{ route('pizza.create') }}" class="list-group-item list-group-item-action">Create</a>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Add Pizza') }}</div>
                <form action="{{ route('pizza.store') }}" method="post" enctype="multipart/form-data">@csrf

                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="name">Name : </label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter Pizza Name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="description">Description : </label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3"></textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="small_pizza">Pizza Price: </label>
                            <div class="input-group">
                                <input type="number" class="form-control @error('small_pizza_price') is-invalid @enderror" name="small_pizza_price" placeholder="Enter Small Pizza Price">
                                <input type="number" class="form-control @error('medium_pizza_price') is-invalid @enderror" name="medium_pizza_price" placeholder="Enter Small Pizza Price">
                                <input type="number" class="form-control @error('large_pizza_price') is-invalid @enderror" name="large_pizza_price" placeholder="Enter Small Pizza Price">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="category">Category</label>
                            <select class="form-control @error('category') is-invalid @enderror" name="category">
                                <option value="vegetarian">Vegetarian Pizza</option>
                                <option value="nonvegetarian">Non Vegetarian Pizza</option>
                                <option value="traditional">Traditional Pizza</option>
                            </select>
                            @error('category')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label form="image">Image</label>
                            <input type="file" name="image"class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <button class="btn btn-primary btn-block float-right" type="submit" style="float: right">Save Pizza</button>

                </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
