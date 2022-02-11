@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-md-8">

                <a class="active" href="#home">Home</a>
                <a class="active" href="#home">Home</a>
                <a href="{{route('add.brand')}}">Add Brand</a>
                <a href="{{route('categories')}}">Add Category</a>
                <a href="{{route('subcategory')}}">Add subcategory</a>
                <a href="{{route('products')}}">Add Product</a>
    </div>
</div>
    <div class="row ">


        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('brand')}}" method="POST">
                        @csrf
                      <div class="form-group">
                        <label for="email">Brand Name</label>
                        <input type="text" class="form-control" placeholder="Enter email" name="name">
                      </div>
                      {{-- <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" placeholder="Enter password" id="pwd">
                      </div> --}}
                      {{-- <div class="form-group form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox"> Remember me
                        </label>
                      </div> --}}
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
