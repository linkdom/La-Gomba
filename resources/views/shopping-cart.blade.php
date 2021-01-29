@extends('layouts.standard')

@section('content')

@if(Session::has('cart'))
    <div class="cart-wrapper fade-in">
        <div style="width: 100%" class="row checkout-list">
            <div class="col-md-6">
                <ul style="box-shadow: 0 20px 36px -28px rgba(0,0,0,0.75);" class="list-group">
                    @foreach($products as $product)

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $product['qty'] }} kg {{ $product['item']['title'] }} {{ $product['item']['subtitle'] }}

                            <span style="display: inline-block; font-size: 1.3em">
                                <a style="display: inline-block" href="{{ route('product.reduceByOne', ['id' => $product['item']['id']]) }}">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bag-dash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M8 1a2.5 2.5 0 0 0-2.5 2.5V4h5v-.5A2.5 2.5 0 0 0 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V5H2z"/>
                                  <path fill-rule="evenodd" d="M5.5 10a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/>
                                </svg>
                                </a>

                                <a style="display: inline-block" href="{{ route('product.add', ['id' => $product['item']['id']]) }}">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bag-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M8 1a2.5 2.5 0 0 0-2.5 2.5V4h5v-.5A2.5 2.5 0 0 0 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V5H2z"/>
                                      <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z"/>
                                    </svg>
                                </a>

                                <a style="display: inline-block" href="{{ route('product.remove', ['id' => $product['item']['id']]) }}">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bag-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M8 1a2.5 2.5 0 0 0-2.5 2.5V4h5v-.5A2.5 2.5 0 0 0 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V5H2z"/>
                                      <path fill-rule="evenodd" d="M6.146 8.146a.5.5 0 0 1 .708 0L8 9.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </a>
                            </span>

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
                <a class="btn btn-primary" href="/checkout">Proceed to checkout</a>
        </div>
    </div>
    </div>

@else
    <div class="hero-image fade-in">
        @if($text->status === 1)
            <div class="p-10 mobile-jumbo">
                <div class="jumbotron">
                    <h1 class="display-4">{{$text->title}}</h1>
                    <hr class="my-4">
                    <p>{{$text->subtitle}}</p>
                </div>
            </div>
        @endif
    </div>
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
