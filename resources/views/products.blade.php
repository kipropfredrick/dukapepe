@extends('layouts.app')

@section('content')
<div class="row">
    <div class="class-md-6" style="margin-lext: -100px;">
        <p align="left" style="color:red">Brands</p>
        @foreach ($brands as $br)
        <a href="/productsbr/{{$br->id}}" align="center">{{$br->name}}</a>
        @endforeach
    </div>
    <div class="class-md-6">
        <p align="center" style="color:red">Products</p>
    </div>
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
                    {{-- <p class="btn-holder"><a delid="{{$product->id}}" quan="{{$product->id}}" href="" class="btn btn-warning btn-block text-center dd" data-id="{{ $product->id }}"role="button">Add to cart</a> </p> --}}
                    <a href="javascript:" delid="{{$product->id}}" class="add-card"><i class="flaticon-bag" ><span>ADD TO CART</span></i></a>
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
      $(document).on('click','.add-card',function(e){
        e.preventDefault();
        var id=$(this).attr('delid');
        //alert(id);
        addtocart(id);
        });
    function addtocart(id){
    if(id != ""){
        $.ajaxSetup({
      headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        $.ajax({
            url:'{{ route('add.to.cart')}}',
            type:'POST',
            dataType:'json',
            data:{
                'id' : id
            },

            success: function(data) {
                //alert(data);
                $('#count').html(data.count);
                //location.reload();
            }
        });
    } else {
        return false;
    }

    return false;
}
})
</script>
@endsection

