@extends('layouts.app')

@section('content')
<div class="class-md-12">
    <p align="center" style="color:red">Categories</p>
</div>
<div class="row">
    @foreach($category as $cat)
        <div class="col-xs-18 col-sm-6 col-md-3">
            <div class="product_box">
                <a href="/products/{{$cat->id}}">
                    <img src="{{ $cat->email }}" alt="">
                <div class="caption">
                    <h4>{{ $cat->category_name }}</h4>
                    {{-- <p>{{ $cat->id }}</p>
                    <p><strong>Price: </strong> {{ $cat->id }}$</p> --}}
                    {{-- <p class="btn-holder"><a href="" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p> --}}
                </div>
                </a>
            </div>
        </div>
    @endforeach
</div>

@endsection
