@extends('layouts.standard')

@section('content')

<div class="hero-image">

</div>
@if(Session::has('cart'))
    <div style="margin-top: 5%; margin-left: 35%" class="row checkout-list">
        <div class="col-md-6">
            <ul class="list-group">
                @foreach($products as $product)
                    <li class="list-group-item">
                        <strong>{{ $product['qty'] }}</strong>
                        <strong>{{ $product['item']['title'] }}</strong>
                        <br>
                        <span class="pl-3">{{ $product['item']['subtitle'] }}</span>
                        <span class="label label-success pl-10">{{ $product['price'] }}€</span>

                        <div style="float: right; font-size: 20px; margin-top: -15px" class="btn-group">
                            <a href=""><i style="color: grey" class="fa fa-minus-circle pr-1" aria-hidden="true"></i></a>
                            <a href=""><i style="color: grey" class="fa fa-plus-circle pr-1" aria-hidden="true"></i></a>
                            <a href=""><i style="color: darkred" class="fa fa-times-circle" aria-hidden="true"></i></a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>
    <div style="margin-top: 2%; margin-left: 35%" class="row text-center checkout-list">
        <div class="col-md-6">
            <strong>Total: {{ $totalPrice }}€</strong>
            <hr>
        </div>
    </div>

    <div style="margin-top: 2%; margin-left: 35%" class="row text-center checkout-list">
        <div class="col-md-6">
            <button type="button" class="btn btn-success">Checkout</button>
        </div>
    </div>
@else

@endif



@include('inc.footer')

@endsection
