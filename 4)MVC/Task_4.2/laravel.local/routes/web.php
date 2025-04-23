<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AddPostController;
use App\Http\Controllers\PostsController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get(uri: '/', action: [MainController::class, 'action']);

Route::get(uri: '/addPost', action: [AddPostController::class, 'action']);

Route::get(uri: '/responseAdd', action: [PostsController::class, 'showResponseAdd']);

Route::get(uri: '/allPosts', action: [PostsController::class, 'getPosts']);