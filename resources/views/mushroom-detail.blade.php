@extends('layouts.standard')

@section('content')
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="relative bg-white py-16 sm:py-24 mt-10">
        <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:gap-24 lg:items-start">
            <div class="relative sm:py-16 lg:py-0">
                <div aria-hidden="true" class="hidden sm:block lg:absolute lg:inset-y-0 lg:right-0 lg:w-screen">
                    <div class="absolute inset-y-0 right-1/2 w-full bg-gray-50 rounded-r-3xl lg:right-72"></div>
                    <svg class="absolute top-8 left-1/2 -ml-3 lg:-right-8 lg:left-auto lg:top-12" width="404" height="392" fill="none" viewBox="0 0 404 392">
                        <defs>
                            <pattern id="02f20b47-fd69-4224-a62a-4c9de5c763f7" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                            </pattern>
                        </defs>
                        <rect width="404" height="392" fill="url(#02f20b47-fd69-4224-a62a-4c9de5c763f7)" />
                    </svg>
                </div>
                <div class="relative mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-0 lg:max-w-none lg:py-20">
                    <!-- Testimonial card-->
                    <div class="relative pt-64 pb-10 rounded-2xl shadow-xl overflow-hidden">
                        <img class="absolute inset-0 h-full w-full object-cover rounded-md" src="{{ $product->image }}" alt="">
                    </div>
                </div>
            </div>

            <div class="relative mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-0">
                <!-- Content area -->
                <div class="pt-12 sm:pt-16 lg:pt-20">
                    <h2 class="text-3xl text-gray-900 font-extrabold tracking-tight sm:text-4xl">
                        {{$product->title}} - {{$product->subtitle}}
                    </h2>
                    <div class="mt-6 text-gray-500 space-y-6">
                        <p class="text-lg">
                            {{$product->description}}
                        </p>
                        <form class="pd-form" method="" action="{{ route('product.addToCart', ['id' => $product->id]) }}">
                            <input  style="width: 50px" class="p-1" type="number" name="quantity" id="quantity" value="1" min="1" max="{{$stockAmount}}" placeholder="Quantity" required="">
                            <h1 class="unit">Kg</h1>
                            @if(empty($stockAmount) || $stockAmount < 1)
                                <button disabled class="btn btn-success" type="submit">Out Of Stock</button>
                            @else
                                <button class="btn btn-success" type="submit">Add To Cart</button>
                            @endif
                        </form>
                    </div>
                </div>

                <!-- Stats section -->
                <div class="mt-10">
                    <dl class="grid grid-cols-2 gap-x-4 gap-y-8">
                        <div class="border-t-2 border-gray-100 pt-6">
                            <dt class="text-base font-medium text-gray-500">Price</dt>
                            <dd class="text-3xl font-extrabold tracking-tight text-gray-900">{{$product->price}}€ per kg</dd>
                        </div>

                        <div class="border-t-2 border-gray-100 pt-6">
                            <dt class="text-base font-medium text-gray-500">In Stock</dt>
                            <dd class="text-3xl font-extrabold tracking-tight text-gray-900">{{$stockAmount}} kg</dd>
                        </div>
                    </dl>
                    <div class="mt-10">
                        <p class="text-base font-medium text-red-600">ATTENTION! Delivery is only possible within the Vienna city zone!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('inc.footer')

@endsection