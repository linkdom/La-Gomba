@extends('layouts.standard')

@section('content')
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

<div class="pd-con fade-in">
    <img class="pd-image" src="{{$product->image}}">
    <div class="pd-text">
        <h1 class="pd-title">{{$product->title}}</h1>
        <h2 class="pd-subtitle">{{$product->subtitle}}</h2>
        <p class="pd-paragraph">{{$product->description}}</p>
        <br>
        <h2 class="pd-price">{{$product->price}}€ per kg</h2>
        <form class="pd-form" method="" action="{{ route('product.addToCart', ['id' => $product->id]) }}">
            <input  style="width: 50px" class="p-1" type="number" name="quantity" id="quantity" value="1" min="1" max="{{$stockAmount}}" placeholder="Quantity" required="">
            <h1 class="unit">Kg</h1>
            @if(empty($stockAmount) || $stockAmount < 1)
                <button disabled class="btn btn-success" type="submit">Out Of Stock</button>
            @else
                <button class="btn btn-success" type="submit">Add To Cart</button>
            @endif
        </form>
        <p style="padding-bottom: 8px">Currently in Stock: {{$stockAmount}}kg</p>
        @if($harvestingPeriod !== null)
            <h2>Next Harvesting Period: from {{date('d.m.Y', strtotime($harvestingPeriod->from))}} to {{date('d.m.Y', strtotime($harvestingPeriod->to))}}</h2>
        @endif
        <div class="alert alert-danger my-4 mx-auto">ATTENTION! Delivery is only possible within the Vienna city zone!</div>
    </div>

</div>

@include('inc.footer')

@endsection