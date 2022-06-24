@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Order Form') }}</div>

                <div class="card-body">
                    @if(Auth::check())
                        <div class="row">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>{{ auth()->user()->name }}</th>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <th>{{ auth()->user()->email }}</th>
                                    </tr>
                                </thead>
                            </table>
                            <hr>
                            <form method="post" action="{{ route('order.store') }}">@csrf
                                <div class="form-group">
                                <label for="">Phone Number</label>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter Your Phone Number" required>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group">
                                <label for="">Small Pizza</label>
                                <input type="text" name="small_pizza" class="form-control" value="0">
                                </div>
                                <div class="form-group">
                                <label for="">Medium Pizza</label>
                                <input type="text" name="medium_pizza" class="form-control" value="0">
                                </div>
                                <div class="form-group">
                                <label for="">Large Pizza</label>
                                <input type="text" name="large_pizza" class="form-control" value="0">
                                </div>
                                <div class="form-group">
                                <label for="">Date</label>
                                <input type="date" name="date" class="form-control">
                                </div>
                                <div class="form-group">
                                <label for="">Time</label>
                                <input type="time" name="time" class="form-control">
                                </div>
                                <div class="form-group">
                                <label for="">Message</label>
                                <textarea class="form-control" name="body" rows="3"></textarea>
                                </div>
                                <input type="hidden" name="pizza_id" value="{{ $pizza->id }}" />
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger float-end mt-3">Place Order</button>
                                </div>
                            </form>
                        </div>
                    @else 
                        <p>
                            <a href="/login">Login to make Order</a>
                        </p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pizza') }}</div>

                <div class="card-body">
                    <div class="row">
                        <img src="{{ Storage::url($pizza->image) }}" class="img-thumbnail mb-2" width="100%" />
                        <table class="table table-striped table-bordered table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>{{ $pizza->name }}</th>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <th>{{ $pizza->description }}</th>
                                </tr>
                                <tr>
                                    <th>Small Pizza Price</th>
                                    <th>${{ $pizza->small_pizza_price }}</th>
                                </tr>
                                <tr>
                                    <th>Medium Pizza Price</th>
                                    <th>${{ $pizza->medium_pizza_price }}</th>
                                </tr>
                                <tr>
                                    <th>Large Pizza Price</th>
                                    <th>${{ $pizza->large_pizza_price }}</th>
                                </tr>
                            </thead>
                        </table>
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
