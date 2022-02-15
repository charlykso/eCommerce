@extends('layout.base')
@section('content')
<div class="main">
    <div class="container">
        <div class="row product">
            <div class="col-sm-12">
                <h3 class="text-center">Order Now</h3>
                <div class="row">
                    <div class="col-sm-6">
                        <table class="table table-responsive mytable table-hover" style="width: 100%">
                            <tr>
                                <th>
                                    Amount
                                </th>

                                <td>
                                    <h5>${{$total}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Tax
                                </th>

                                <td>
                                    <h5>$0</h5>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Delivery
                                </th>

                                <td>
                                    <h5>$15</h5>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Total Amount
                                </th>

                                <td>
                                    <h5>${{$total + 15}} </h5>

                                </td>
                            </tr>
                        </table>

                    </div>
                    <div class="col-sm-6">
                        <form action="/placeOrder" method="POST">
                            @csrf
                            <div class="form-group">
                                <textarea name="address" class="form-control" placeholder="Enter your address" cols="20" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="payment_method">Payment Method</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" value="Online Payment" >
                                    <label class="form-check-label" for="exampleRadios1">
                                        Online Payment
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" value="Pay On Delivery">
                                    <label class="form-check-label" for="payOnDelivery">
                                        Payment on delivery
                                    </label>
                                </div>

                            </div>
                            <button type="submmit" class="btn btn-primary">Order Now</button>
                        </form>

                    </div>

                </div>
                
            </div>

        </div>
    </div>

</div>

@endsection

