@extends('layouts.standard')

@section('content')
<div class="hero-image fade-in">
</div>
<div class="page-container">
    <div class="content-wrap">
        <div class="container mobile-container fade-in">
            <img class="container-image-right" src="/img/nora.png">
            <div class="container-text-left">
                <h1 class="container-heading">Who is nora?</h1>
                <p class="container-paragraph">Nora decided to act on her Climate Grief and started looking for
                    solutions that are doing good for the environment and somewhat
                    profitable. She wanted to help lowering meat consumption and at the
                    same time clean the environment. Months of research has started and
                    finally the answer was: A Vienna based company called Hut&Stiel that
                    recycles coffee waste and turns it into delicious Oyster mushroom. Nora started her internship at the company right away.</p>
            </div>
        </div>

        <div class="container mobile-container hideme">
            <img style="height: 80px; margin-bottom: -10px" src="/img/mushroom-drawn-2.png" alt="">
            <img class="container-image-left" src="/img/markhof-map.png">
            <div class="container-text-right">
                <h1 class="container-heading">How it all started?</h1>
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

        <div class="container mobile-container hideme">
            <img class="container-image-right" src="/img/shrooms.png">
            <div class="container-text-left">
                <h1 class="container-heading">How does it work?</h1>
                <p class="container-paragraph">Instead of going to the garbage the daily collected
                    coffee grounds go to Hut & Stiel's production site
                    where they are carefully turned in to mushroom
                    substrate. The substrate goes in to bags and the
                    bags go in to the incubational room. After 3 weeks
                    of incubating they go to Nora's basement to fruit
                    and to be harvested.</p>
            </div>
        </div>

        <div id="contact" class="container mobile-container hideme">
            <img class="coffee" src="/img/coffee.png">
            <div class="container-paragraph contact-form">
                <h1 class="text-center mb-3 contact-heading">Contact Me!</h1>
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
    </div>
    @include('inc.footer')
</div>

@endsection
