@extends('layouts.master')

@section('content')

<div class="card mt-3">

    <div class="card-body table-responsive">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Post Title</th>
                    <th>Created At</th>
                    <th>
                        <a href="{{route('post.create')}}"><i class="fas fa-plus text-info"></i> Add Post</a>
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                @forelse($posts as $post)
                <tr>
                    <td><a href="{{route('post.show',$post->slug)}}">{{$post->title}}</a></td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>
                        <a href="{{route('post.edit',$post->slug)}}"><i class="far fa-edit text-info"></i></a>
                    </td>
                    <td>
                        <form action="{{ route('post.destroy', $post->slug) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-sm btn-default"><i class="fas fa-trash-alt text-danger"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <p class="mt-5 text-center mb-5">You don't have any post post</p>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection