@extends('layouts.app')

@section('content')
<div class="class-md-12">
    <p align="center" style="color:red">Products</p>
</div>
<div class="row">
    @foreach($products as $product)
        <div class="col-xs-18 col-sm-6 col-md-3">
            <a href="/products/{{$product->id}}">
            <div class="product_box">
                <img src="{{ $product->email }}" alt="">
                <div class="caption">
                    <h4>{{ $product->name }}</h4>
                    {{-- <p>{{ $product->id }}</p> --}}
                    <p><strong>Price: </strong> {{ $product->price }}$</p>
                    <input id="product" value="{{ $product->id}}"type="hidden"/>
                    <p class="btn-holder"><a delid="{{$product->id}}" quan="{{$product->id}}" href="" class="btn btn-warning btn-block text-center dd" data-id="{{ $product->id }}"role="button">Add to cart</a> </p>
                </div>
            </div>
            </a>
        </div>
    @endforeach
</div>
<script>
$(document).ready(function(){
    $(".dd").click(function (e) {
        e.preventDefault();
        var id=$(this).attr('delid');
        var quan=$(this).attr('quan');
        //var ele = $(this);
        //alert(id + quan)
        $.ajaxSetup({
      headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        $.ajax({
            url: '{{ route('add.to.cart')}}',
            method: "post",
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
               // quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
})
</script>
@endsection

