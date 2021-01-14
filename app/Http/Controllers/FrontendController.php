<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function dashboard()
    {
        return view(
            'dashboard',
            [
                'user_count' => User::all()->count(),
                'post_count' => Post::all()->count(),
                'category_count' => Category::all()->count()
            ]
        );
    }

    public function frontend()
    {
        return view('frontend', [
            'categories' => Category::all(['id', 'name'])
        ]);
    }

    //post based on the category
    public function category_post($category_id)
    {
        return view('category_post', [
            'category_posts' => Post::where('category_id', $category_id)->get()
        ]);
    }
}
