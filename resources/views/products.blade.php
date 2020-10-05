@extends('layouts.standard')

@section('content')
<div class="hero-image fade-in">
    <div class="p-10 mobile-jumbo">
        <div class="jumbotron">
            <h1 class="display-4">Upcoming Harvesting Periods!</h1>
            <hr class="my-4">
            @foreach($harvestingPeriods as $hp)
                @if($hp->to > $today)

                    <p>{{$hp->product->title}} from {{date('d.m.Y', strtotime($hp->from))}} to {{date('d.m.Y', strtotime($hp->to))}}</p>
                    <hr>
                @endif
            @endforeach
        </div>
    </div>
</div>

<div style="width: 100%" class="row mt-10 mobile-card fade-in">
        @foreach($products as $product)
            <div class="col-md-3">
                <div class="card">
                    <img style="max-height: 200px" class="card-img-top" src="{{$product->image}}" alt="Card image cap">
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
            </div>

        @endforeach
    </div>
</div>


@include('inc.footer')

@endsection
