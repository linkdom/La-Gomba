@extends('layouts.standard')

@section('content')
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="relative pt-16 pb-20 px-4 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
        <div class="absolute inset-0">
            <div class="bg-white h-1/3 sm:h-2/3"></div>
        </div>
        <div class="relative max-w-7xl mx-auto">
            <div class="text-center">
                <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl">
                    Eat more mushroom!
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    ...and feel better!
                </p>
            </div>


            <div class="mt-12 max-w-lg mx-auto grid lg:gap-64 gap-8 lg:grid-cols-2 lg:max-w-none relative z-10">
                @foreach($products as $product)
                    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                        <div class="flex-shrink-0">
                            <img class="h-48 w-full object-cover" src="{{$product->image}}" alt="">
                        </div>
                        <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-indigo-600">
                                    {{ $product->title }}
                                </p>
                                <a href="/mushroom-details/{{$product->id}}" class="block mt-2 hover:no-underline">
                                    <p class="text-xl font-semibold text-gray-900">
                                        {{$product->subtitle}}
                                    </p>
                                    <p class="mt-3 text-base font-bold text-gray-500">
                                        {{$product->price}} € per kg
                                    </p>
                                </a>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @include('inc.footer')
@endsection
