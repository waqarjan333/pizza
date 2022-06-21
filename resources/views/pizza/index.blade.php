@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Menu') }}</div>

                <div class="card-body">
                    <ul class="list-group">
                        <a href="" class="list-group-item list-group-item-action">View</a>
                        <a href="" class="list-group-item list-group-item-action">Create</a>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Pizza') }}</div>

                <div class="card-body">
                    <div class="form-group mb-3">
                      <label for="name">Name : </label>
                      <input type="text" class="form-control" name="name" placeholder="Enter Pizza Name">
                    </div>

                    <div class="form-group mb-3">
                      <label for="description">Description : </label>
                      <textarea class="form-control" name="description" rows="3"></textarea>
                    </div>

                    <div class="form-group mb-3">
                      <label for="small_pizza">Pizza Price: </label>
                      <div class="input-group">
                        <input type="number" class="form-control" name="small_pizza" placeholder="Enter Small Pizza Price">
                        <input type="number" class="form-control" name="medium_pizza" placeholder="Enter Small Pizza Price">
                        <input type="number" class="form-control" name="large_pizza" placeholder="Enter Small Pizza Price">
                      </div>
                    </div>

                    <div class="form-group mb-3">
                      <label for="category">Category</label>
                      <select class="form-control" name="category">
                        <option value="vegetarian">Vegetarian Pizza</option>
                        <option value="nonvegetarian">Non Vegetarian Pizza</option>
                        <option value="traditional">Traditional Pizza</option>
                      </select>
                    </div>

                    <div class="form-group mb-3">
                        <label form="image">Image</label>
                        <input type="file" name="image"class="form-controll">
                    </div>

                    <button class="btn btn-primary btn-block float-right" type="submit" style="float: right">Save Pizza</button>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
