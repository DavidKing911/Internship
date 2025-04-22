<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AddPostController;
use App\Http\Controllers\PostsController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MainController::class, 'action']);

Route::get('/addPost', [AddPostController::class, 'action']);

Route::get('/responseAdd', [PostsController::class, 'showResponseAdd']);

Route::get('/allPosts', [PostsController::class, 'getPosts']);

Route::get('/user', [UserController::class, 'show']);