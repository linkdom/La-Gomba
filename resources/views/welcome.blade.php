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
    <div style="width: 100%" class="row mt-10 mobile-card fade-in">
        @foreach($posts as $post)
            <a class="blog-box" href="/post/{{$post->id}}">
                <div class="col-md-3">
                    <div class="card">
                        <div class="blog-image-container">
                            {{--<iframe width="420" height="315"
                                    src="https://www.youtube.com/embed/tgbNymZ7vqY">
                            </iframe>--}}
                            <img class="card-img-top blog-image" src="{{$post->image}}" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$post->title}}</h5>
                            <p class="card-text pb-2">{{$post->subtitle}}</p>
                            <p class="card-text pb-4"><small class="text-muted">Last updated: {{$post->created_at}}</small></p>
                            <a class="btn btn-info" href="/post/{{$post->id}}">Read More</a>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    @include('inc.footer')

@endsection
