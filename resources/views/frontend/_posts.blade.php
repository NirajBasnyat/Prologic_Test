<h3 class="text-center title">posts</h3>
<div class="container-fluid mx-4">
    <div class="row mb-3">

        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header">
                    <h4> Our Posts</h4>
                </div>
                <div class="card-body">
                    @foreach ($posts as $post)
                    <div class="card mb-3">

                        <div class="card-body">
                            <p class="small" >
                                <img src="{{$post->image_path()}}" class="img-responsive rounded-circle" height="200px"
                                width="200px" alt="image">
                                <br>
                                <h4><span class="text-success">Title</span>: {{$post->title}}</h4>
                                <br>
                                <h4><span class="text-success"> Category: 
                                    </span>{{$post->category->name}}</h4>
                                <br>
                                <span><span class="text-success">
                                    </span> {!! $post->sub_description !!}</span>
                                <br>

                                <a href="{{route('post_show',$post->slug)}}" class="btn btn-sm btn-outline-info mt-5">View Post</a>
                            </p>
                        </div>

                    </div>
                    @endforeach
                </div>

                <div class="card-footer d-flex justify-content-center m-0">
                    {!! $posts->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>