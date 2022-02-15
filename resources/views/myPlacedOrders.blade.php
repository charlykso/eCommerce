@extends('layout.base')
@section('content')
<div class="main">
    <div class="container">
        <div class="row product">
            <div class="col-sm-12">
                
                <h3 class="text-center">Placed Orders</h3>
                <div class="col-sm-12  table-responsive-lg">
                    @if ($myCount > 0)
                        <table class="table table-responsive mytable table-hover" style="width: 100%">
                            <thead class="thead-light">
                                <tr>
                                    <th>Item</th>
                                    <th>Name</th>
                                    <th>Pice</th>
                                    <th>Description</th>
                                    <th>Payment Method</th>
                                    <th>Payment Status</th>
                                    <th>Order Status</th>
                                    <th>DateOrdered</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($myOders as $item)

                                <tr>
                                    <td><img src="/storage/products/{{$item->gallery}}" alt=""></td>
                                    <td>
                                        <h4>{{$item->name}}</h4>
                                    </td>

                                    <td>
                                        <h4>${{$item->price}}</h4>
                                    </td>

                                    <td>
                                        <h4>{{$item->description}}</h4>
                                    </td>

                                    <td>
                                        <h4>{{$item->payment_method}}</h4>
                                    </td>
                                    <td>
                                        <h4>{{$item->payment_status}}</h4>
                                    </td>
                                    <td>
                                        <h4>{{$item->status}}</h4>
                                    </td>

                                    <td>
                                        <h6>{{$item->order_date}}</h6>

                                    </td>

                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                      
                    @else
                        <h4 class="text-center"> No Order Placed</h4>
                    @endif
                    

                </div>
                
            </div>

        </div>
    </div>

</div>

@endsection