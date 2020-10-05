@extends('layouts.standard')

@section('content')
<div class="hero-image fade-in">
    <div class="p-10 mobile-jumbo">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to my blog!</h1>
            <hr class="my-4">
            <p>Here you can follow my latest news! I am not yet sure about this container and might will remove it later, let me know nora :)</p>
        </div>
    </div>
</div>
<div style="width: 100%" class="row mt-10 mobile-card fade-in">
    @foreach($posts as $post)
    <div class="col-md-3">
        <div class="card">
            <div class="blog-image-container">
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
    @endforeach
</div>

@include('inc.footer')

@endsection
