@extends('layout.base')
@section('content')
<div class="main">
    <div class="container">
        <div class="row product">
            <div class="col-sm-12">
                @if ($myCartNo > 0)
                    <a class="btn btn-success" href="/orderNow">Order Now</a>
                @endif
                <h3 class="text-center">My Items</h3>
                <div class="col-sm-9 offset-sm-3 table-responsive-lg">
                    @if ($myCartNo > 0)
                        <table class="table table-responsive mytable table-hover" style="">
                            <thead class="thead-light">
                                <tr>
                                    <th>Item</th>
                                    <th>Name</th>
                                    <th>Pice</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($myProducts as $item)
                                <tr>
                                    <td><img src="/storage/products/{{$item->gallery}}" alt=""></td>
                                    <td>
                                        <h4>{{$item->name}}</h4>
                                    </td>

                                    <td>
                                        <h4>${{$item->price}}</h4>
                                    </td>

                                    <td><a class="btn btn-warning" href="/removeItem/{{$item->cart_id}}">Remove from cart</a></td>

                                </tr>

                                @endforeach

                            </tbody>
                        </table>                        
                    @else
                        <h5><i>No Item in the cart</i></h5>
                    @endif
                </div>
                @if ($myCartNo > 0)
                    <a class="btn btn-success" href="/orderNow">Order Now</a>
                @endif
            </div>

        </div>
    </div>

</div>

@endsection
