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
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="nav-opacity">
        <a class="navbar-brand" href="/"><img style="height: 60px" src="/img/LaGomba_logo_transparent_bg.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/products">Products <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/blog">Blog </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/#contact">Contact </a>
                </li>
            </ul>
            <a style="color: rgba(0,0,0,.5)" class="nav-link" href="/login">Login </a>
            <a style="color: #f7d10a;border-color: #f7d10a" href="/register" class="btn btn-outline-success my-2 my-sm-0">Join us!</a>

        </div>
    </nav>
</div>

<div class="pd-con">
    <img class="pd-image" src="/img/oysterQB.jpeg">
    <div class="pd-text">
        <h1 class="pd-title">Oyster Mushroom</h1>
        <h2 class="pd-subtitle">Quality A</h2>
        <p class="pd-paragraph">Oyster mushrooms are a type of edible fungi.
            They are one of the most widely consumed mushrooms in the world.
            They get their name from their oyster-shaped cap and very short (or completely absent) stem.
            When cooked, oyster mushrooms have a smooth oyster-like texture and a some say a slight hint of seafood flavor.
            This may also contribute to their name.
            <br>
        </p>
        <h2 class="pd-price">20€ per kg</h2>
        <form class="pd-form" method="POST" action="{{ action('App\Http\Controllers\OrderController@addToCart') }}">
            <input  style="width: 50px" class="p-1" type="number" name="quantity" id="quantity" value="1" min="1" max="6" placeholder="Quantity" required="">
            <h1 class="unit">Kg</h1>
            <button class="btn btn-success" type="submit">Add To Cart</button>
        </form>
        <p style="padding-bottom: 8px">Currently in Stock: 8kg</p>
        <h2>Next Harvesting Period: from Harvesting to Period</h2>

        <div class="alert alert-danger my-4 mx-auto">ATTENTION! Delivery is only possible within the Vienna city zone!</div>
    </div>

</div>

<!-- Footer -->
<footer style="background-color: rgba(0,0,0,0.5) !important; margin-top: 50px; color: white;" class="page-footer font-small pt-4">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">

        <div class="text-center">
            <!-- Content -->
            <p>
                Markhofgasse 19
                <br>
                1030 Wien
                <br>
                rr.noar@gmail.com
            </p>
        </div>

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright: LaGomba
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->


<!-- SCRIPTS -->
<script type="text/javascript" src="/js/app.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
