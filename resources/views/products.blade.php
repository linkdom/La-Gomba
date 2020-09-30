@extends('layouts.standard')

@section('content')
<div class="hero-image">

</div>

<div class="card-deck">
    <div class="card hp">
        <div class="harvesting-info">
            <h1 class="harvesting-header">Upcoming Harvesting Periods:</h1>
            @foreach($harvestingPeriods as $hp)
                @if($hp->to > $today)
                    <p class="mushroom-type">{{$hp->product->title}}</p>
                    <p class="harvesting-period">from {{$hp->from}} to {{$hp->to}}</p>
                    <hr class="harvesting">
                @endif
            @endforeach
        </div>
    </div>

    @foreach($products as $product)
        <div class="card">
            <img class="card-img-top" src="{{$product->image}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$product->title}}</h5>
                <p class="card-text">{{$product->subtitle}}</p>
                <br>
                <p class="card-text"><b>{{$product->price}}€ per kg</b></p>
            </div>
            <div class="card-footer text-center">
                <a href="/mushroom-details/{{$product->id}}"><p class="card-text">View Product</p></a>
            </div>
        </div>
    @endforeach
</div>

@include('inc.footer')

@endsection
