@extends('layouts.standard')

@section('content')
    <script src="https://www.paypal.com/sdk/js?client-id=AXFdUcNxHTyYdgpOu6R2-7S2zoB-cjOp4z27-cG_AcnUYSMxbelAK6h0VbeFcmveQCaYcrRcdLBUwJj_&currency=EUR"> // Replace YOUR_SB_CLIENT_ID with your sandbox client ID
    </script>
{{--<div class="hero-image">--}}

{{--</div>--}}
@if(Session::has('cart'))
    <div class="cart-wrapper fade-in">
        <div style="width: 100%" class="row checkout-list">
            <div class="col-md-6">
                <ul style="box-shadow: 0 20px 36px -28px rgba(0,0,0,0.75);" class="list-group">
                    @foreach($products as $product)

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $product['qty'] }} kg {{ $product['item']['title'] }} {{ $product['item']['subtitle'] }}
                            <span class="float-right">{{ $product['price'] }}€</span>
                        </li>
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><strong>Total: </strong></span>
                        <span style="float: right"><strong>{{ $totalPrice }}€</strong></span>
                    </li>
                </ul>
            </div>
        </div>


        <div style="width: 100%" class="row text-center checkout-list mt-10">
            <div class="col-md-6">
                <div id="paypal-button-container"></div>
                <!-- Add the checkout buttons, set up the order and approve the order -->
                <script>
                    paypal.Buttons({
                        createOrder: function(data, actions) {
                            return actions.order.create({
                                purchase_units: [{
                                    amount: {
                                        value: {{$totalPrice}}
                                    }
                                }]
                            });
                        },
                        onApprove: function(data, actions) {
                            return actions.order.capture().then(function(details) {
                                alert('Transaction completed by ' + details.payer.name.given_name);
                            });
                        }
                    }).render('#paypal-button-container'); // Display payment options on your web page
                </script>
            </div>
        </div>
    </div>

@else
    <div class="m-10 text-center">
        <div class="alert alert-primary" >
            You have no items in the shopping cart yet. <br><br><br>
            <a href="/products" class="btn btn-primary">See my products here</a>
        </div>
    </div>

@endif


<div style="position: absolute; width: 100%; bottom: 0;">

    @include('inc.footer')
</div>

@endsection
