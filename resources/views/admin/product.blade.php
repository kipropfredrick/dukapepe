@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-md-8">

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
                <div class="card-header">{{ __('Category') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('produc')}}" method="POST">
                        @csrf
                        <div class="form-group">
                        <select class="form-select" name="cid" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                           @foreach ($cate as $key=>$c )
                           <option value="{{$c->id}}">{{$c->category_name}}</option>
                           @endforeach
                          </select>
                          </div>
                          <div class="form-group">
                          <select class="form-select" name="subid" aria-label="Default select example">
                          </select>
                          </div>
                          <div class="form-group">
                      <select class="form-select" name="bid" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                       @foreach ($brand as $c )
                       <option value="{{$c->id}}">{{$c->name}}</option>
                       @endforeach

                      </select>
                          </div>
                          <div class="form-group">
                            <label for="email">Product Name</label>
                            <input type="text" class="form-control" placeholder="Enter email" name="name">
                          </div>
                          <div class="form-group">
                            <label for="email">Price</label>
                            <input type="text" class="form-control" placeholder="Enter email" name="price">
                          </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="cid"]').on('change', function() {

            var stateID = $(this).val();
        //alert(stateID);
            if(stateID) {
                $.ajax({
                    url: '/sub/cat/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        //alert(data);
                        $('select[name="subid"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="subid"]').append('<option value="">-- Select Subcategory --</option>');
                            $('select[name="subid"]').append('<option value="'+ value.id +'">'+ value.subcat_name +'</option>');
                        });


                    }
                });
            }else{
                $('select[name="subid"]').empty();
            }
        });
    });
</script>
@endsection
