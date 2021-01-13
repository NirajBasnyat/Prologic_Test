@extends('layouts.master')

@section('content')

{{-- errors --}}
@if($errors->any())
<div class="alert alert-danger my-4">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card card-info mt-3">
    <div class="card-header">
        <h3 class="card-title">Update Post</h3>
    </div>
    <!-- form start -->
    <form role="form" action="{{route('post.update',$post->slug)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" value="{{$post->title}}" name="title">
            </div>

            <div class="form-group">
                <label>Select category</label>
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}"
                        @if($category->id == $post->category_id)
                        selected 
                        @endif
                        >{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" rows="3" name="description">{{$post->description}}</textarea>
            </div>

            <div class="form-group">
                <label for="image">File input</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="image" id="image">
                    </div>
                </div>
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-sm btn-outline-info">Update</button>
        </div>
    </form>
</div>
@endsection