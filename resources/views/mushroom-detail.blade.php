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

<div class="pd-con">
    <img class="pd-image" src="/img/oysterQB.jpeg">
    <div class="pd-text">
        <h1 class="pd-title">{{$product->title}}</h1>
        <h2 class="pd-subtitle">{{$product->subtitle}}</h2>
        <p class="pd-paragraph">{{$product->description}}</p>
        <br>
        <h2 class="pd-price">{{$product->price}} per kg</h2>
        <form class="pd-form" method="POST" action="{{ action('App\Http\Controllers\OrderController@addToCart') }}">
            <input  style="width: 50px" class="p-1" type="number" name="quantity" id="quantity" value="1" min="1" max="{{$stockAmount}}" placeholder="Quantity" required="">
            <h1 class="unit">Kg</h1>
            @if($stockAmount < 1)
                <button disabled class="btn btn-success" type="submit">Out Of Stock</button>
            @else
                <button class="btn btn-success" type="submit">Add To Cart</button>
            @endif
        </form>
        <p style="padding-bottom: 8px">Currently in Stock: {{$stockAmount}}kg</p>
        @if($harvestingPeriod !== null)
            <h2>Next Harvesting Period: from {{$harvestingPeriod->from}} to {{$harvestingPeriod->to}}</h2>
        @endif
        <div class="alert alert-danger my-4 mx-auto">ATTENTION! Delivery is only possible within the Vienna city zone!</div>
    </div>

</div>

@include('inc.footer')

<!-- SCRIPTS -->
<script type="text/javascript" src="/js/app.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
