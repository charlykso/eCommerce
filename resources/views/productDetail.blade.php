@extends('layout.base')
@section('content')
<div class="main">
    <div class="container">
        <div class="row product">
            <div class="col-sm-6">
                <img class="detail-img" src="/storage/products/{{$product['gallery']}}" alt="Not showing">
            </div>
            <div class="col-sm-6 second">
                {{-- <a class="back" href="/">Go Back</a> --}}
                <h2 style="padding-top: 70px">{{$product['name']}}</h2>
                <h3>Price: ${{$product['price']}}</h3>
                <h5>Description: {{$product['description']}}</h5>
                <br>
                <form action="/detail/{{$product['id']}}/add_to_cart" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$product['id']}}">
                    <button type="submit" class="btn btn-primary">Add to cart</button>
                    <button class="btn btn-info back"><a href="/">Go Back</a></button>
                    <br>

                </form>
                <button class="btn btn-secondry checkout"><a href="#">Check out</a></button>
                
            </div>

        </div>
    </div>

</div>

@endsection
