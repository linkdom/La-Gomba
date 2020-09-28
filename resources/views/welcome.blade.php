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
                <li class="nav-item">
                    <a class="nav-link" href="/products">Products </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/blog">Blog </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact </a>
                </li>
            </ul>
            <a style="color: rgba(0,0,0,.5)" class="nav-link" href="/login">Login </a>
            <a style="color: #f7d10a;border-color: #f7d10a" href="/register" class="btn btn-outline-success my-2 my-sm-0">Join us!</a>

        </div>
    </nav>
</div>
<div class="container">
    <img class="container-image-right" src="/img/nora.png">
    <div class="container-text-left">
        <h1 class="container-heading">WHO IS NORA?</h1>
        <p class="container-paragraph">Nora decided to act on her Climate Grief and started looking for
            solutions that are doing good for the environment and somewhat
            profitable. She wanted to help lowering meat consumption and at the
            same time clean the environment. Months of research has started and
            finally the answer was: A Vienna based company called Hut&Stiel that
            recycles coffee waste and turns it into delicious Oyster mushroom. Nora started her internship at the company right away.</p>
    </div>
</div>

<div class="container">
    <img class="container-image-left" src="/img/markhof-map.png">
    <div class="container-text-right">
        <h1 class="container-heading">HOW IT ALL STARTED?</h1>
        <p class="container-paragraph">In the 3rd district of Vienna in Markhofgasse there is a coworking space
            full of vibrant people with life and energy. Apart from the many people
            there are many spaces also. At the end of 2019 in one of the basements
            that is not too big and not too small renewal working has started.
            <br>
            Viennese people like to drink coffee. They like to drink coffee a lot and
            there are thousands of kilograms of coffee grounds ending up in the
            trash day by day.</p>
    </div>
</div>

<div class="container">
    <img class="container-image-right" src="/img/shrooms.png">
    <div class="container-text-left">
        <h1 class="container-heading">HOW DOES IT WORK?</h1>
        <p class="container-paragraph">Instead of going to the garbage the daily collected
            coffee grounds go to Hut & Stiel's production site
            where they are carefully turned in to mushroom
            substrate. The substrate goes in to bags and the
            bags go in to the incubational room. After 3 weeks
            of incubating they go to Nora's basement to fruit
            and to be harvested.</p>
    </div>
</div>

<div id="contact" class="container">
    <img class="coffee" src="/img/coffee.png">
    <div class="container-paragraph contact-form">
        <h1 class="text-center mb-3">Contact Me!</h1>
        <form method="POST" action="">
            <div class="input-group mb-3 email">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">E-Mail</span>
                </div>
                <input type="text" class="form-control" name="email" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>
            <br>
            <div class="input-group mb-3 subject">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Subject</span>
                </div>
                <input type="text" class="form-control" name="email" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>
            <br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Message</span>
                </div>
                <textarea class="form-control" aria-label="With textarea" rows="10"></textarea>
            </div>

        </form>
    </div>

</div>

<!-- Footer -->
<footer style="background-color: rgba(0,0,0,0.5) !important; margin-top: 10%; color: white;" class="page-footer font-small pt-4">

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
    <div class="footer-copyright text-center py-3">
        © 2020 Copyright: LaGomba
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
