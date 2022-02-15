@extends('layout.base')
@section('content')
<div class="main">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{asset('images/carusel.jpg')}}" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Image 1.</h5>
                    <p>First Image</p>
                </div>

            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('images/carusel02.jpg')}}" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Image 2</h5>
                    <p>Second Image</p>
                </div>

            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('images/carusel03.jpg')}}" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Image 3</h5>
                    <p>Third Image</p>
                </div>

            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="trending_wrapper">
        <h3>Trending Products</h3>
        @include('inc.messages')

        <div class="row">
            @foreach ($products as $item)
            <div class="trend_product col-md-4">
                <div class="inner_row">
                    <img src="storage/products/{{$item['gallery']}}" alt="">
                    <div class="content">
                        <h4><a href="detail/{{$item['id']}}">{{$item['name']}}</a></h4>

                        <h6>Price: ${{$item['price']}}</h6>
                        
                        <form action="/detail/{{$item['id']}}/add_to_cart" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$item['id']}}">
                            <button type="submit" class="btn btn-primary"><span>Add to cart<i class="fa fa-cart-plus light"></i></span></button>
                            <br>
                        </form>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>

@endsection