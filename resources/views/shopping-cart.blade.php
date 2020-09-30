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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="hero-image">
@include('inc.navbar')

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
<!-- SCRIPTS -->
<script type="text/javascript" src="/js/app.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
