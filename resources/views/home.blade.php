@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-md-8">

                <a class="active" href="#home">Home</a>
                <a href="{{route('add.brand')}}">Add Brand</a>
                <a href="#contact">Add Category</a>
                <a href="#about">Add subcategory</a>
                <a href="#about">Add Product</a>

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

                    <table class="table">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Total</th>
                            <th>Price</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($order as $ord)
                          <tr>
                            <td>{{$ord->name}}</td>
                            <td>{{$ord->order->total}}</td>
                            <td>{{$ord->price}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
