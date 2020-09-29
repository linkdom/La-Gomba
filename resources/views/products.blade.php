<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LaGomba</title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
</head>
<body>
<div class="hero-image">
@include('inc.navbar')
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
<!-- SCRIPTS -->
<script type="text/javascript" src="/js/app.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
