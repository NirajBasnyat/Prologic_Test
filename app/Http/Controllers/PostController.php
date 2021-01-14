<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\DataTables\PostDataTable;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PostDataTable $postDataTable)
    {
        return $postDataTable->render('post.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create', [
            'categories' => Category::all(['id', 'name'])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = Post::create($request->validated());

        if ($request->hasFile('image')) {
            $request_image = $request->file('image');
            $filename = time() . '.' . $request_image->GetClientOriginalExtension();
            $path = $request_image->storeAs('public/post_images', $filename);
            $post->image = $filename;
            $post->save();
        }

        return redirect('/post')->with('success', 'Post created suceessfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit', [
            'post' => $post,
            'categories' => Category::all(['id', 'name'])
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $old_image = $post->image;
        $post->update($request->validated());

        if ($request->is_published == null) {
            $post->is_published = 0;
            $post->save();
        }

        if ($request->hasFile('image')) {
            //deletes old file before uploading new one
            Storage::delete('public/post_images/' . $old_image);

            $request_image = $request->file('image');
            $filename = time() . '.' . $request_image->GetClientOriginalExtension();
            $path = $request_image->storeAs('public/post_images', $filename);
            $post->image = $filename;
            $post->save();
        }

        return redirect('/post')->with('success', 'Post updated suceessfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Storage::delete('public/post_images/' . $post->image);
        $post->delete();
        return redirect('/post')->with('error', 'Post deleted suceessfully.');
    }
}
