<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FrontendController;

// routes for frontend
Route::get('/',[FrontendController::class,'frontend'])->name('frontend');
Route::get('/post/single/{post}', [FrontendController::class,'post_show'])->name('post_show');
Route::get('/category_post/{category_id}', [FrontendController::class,'category_post'])->name('category_post');

//routes for auth users
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [FrontendController::class, 'dashboard'])->name('dashboard');
    Route::resource('post', PostController::class);
});

//default routes
Auth::routes();

