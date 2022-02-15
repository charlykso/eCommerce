@extends('layout.base')
@section('content')
<div class="main">
    <div class="container">
        <div class="row product">
            <div class="col-sm-12">
                <a class="btn btn-success" href="/orderNow">Order Now</a>
                <h3 class="text-center">My Items</h3>
                <div class="col-sm-9 offset-sm-2 table-responsive-lg">
                    <table class="table table-responsive mytable table-hover" style="width: 100%">
                        <thead class="thead-light" >
                            <tr>
                                <th>Item</th>
                                <th>Description</th>
                                <th>Pice</th>
                                <th>Qty</th>
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

                                <td>
                                    <h4>1</h4>
                                </td>

                                <td><a class="btn btn-warning" href="/removeItem/{{$item->cart_id}}">Remove from cart</a></td>

                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                    
                </div>
                <a class="btn btn-success" href="/orderNow">Order Now</a>
            </div>

        </div>
    </div>

</div>

@endsection

