@extends('layouts.master')

@section('content')

<div class="card mt-3">

    <img src="{{$post->image_path()}}" class="card-img-top" alt="post_image" height="250px">
    <div class="card-body">
        <h1 class="">{{$post->title}}</h1><br>
        <h2>Category: <span class="badge badge-secondary">{{$post->category->name}}</span></h2> <br>
        <p class="card-text h4">{{$post->description}} </p>
    </div>
</div>
@endsection