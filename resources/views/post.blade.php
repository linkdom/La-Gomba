@extends('layouts.standard')

@section('content')
<div class="hero-image fade-in">

</div>


<div class="pd-con fade-in">
    <img class="pd-image" src="{{$post->image}}">

    <div class="pd-text">
        <h1 class="pd-title">{{$post->title}}</h1>
        <h2 class="pd-subtitle">{{$post->subtitle}}</h2>
        <br>
        <br>
        <p class="pd-paragraph">{{$post->paragraph}}</p>
    </div>

</div>


@include('inc.footer')

@endsection
