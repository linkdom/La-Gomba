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
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div style="min-height: 55vh" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 lg:mt-40">
        <!-- We've used 3xl here, but feel free to try other max-widths based on your needs -->
        <div class="max-w-3xl mx-auto">
            <!-- This example requires Tailwind CSS v2.0+ -->
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="bg-white shadow-lg sm:rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Empty shopping cart
                            </h3>
                            <div class="mt-2 max-w-xl text-sm text-gray-500">
                                <p>
                                    Your shopping cart is empty. Visit my pricing page to add mushrooms!
                                </p>
                            </div>
                            <div class="mt-5 ">
                                <a style="width: 200px !important;" href="/products" class="hover:no-underline inline-flex items-center justify-center px-4 py-2 border border-transparent font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:text-sm">
                                    Go to pricing page
                                </a>
                            </div>
                        </div>
                    </div>

        </div>
    </div>



@endif


    @include('inc.footer')

@endsection
