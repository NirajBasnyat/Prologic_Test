@include('frontend._header')

<!-- ********************NAV - SECTION************************ -->
<div class="card mt-3">
    <div class="card-header">
        <h3 class="text-center">Post</h3>
    </div>

    <div class="card-body">
        <img src="{{$post->image_path()}}" alt="post_image" height="250px">
        <div class="card-body">
            <h3 class="">{{$post->title}}</h3><br>
            <h3>Category: <span >{{$post->category->name}}</span></h3> <br>
            <h3>Description</h3>
            <p class="card-text ">{!!$post->description!!} </p>
        </div>
    </div>
</div>

@include('frontend._footer')