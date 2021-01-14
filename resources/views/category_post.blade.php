<!-- ********************HEADER - SECTION************************ -->

@include('frontend._header')

<!-- *******************CATEGORY_Post-SECTION************************ -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card my-5 ">
                <div class="card-header text-center h4 py-5">All Posts</div>

                <div class="card-body mt-2">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-green">
                                <tr>
                                    <th>Post</th>
                                    <th>Created at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category_posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->created_at->diffForHumans()}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- *******************FOOTER-SECTION************************ -->

@include('frontend._footer')