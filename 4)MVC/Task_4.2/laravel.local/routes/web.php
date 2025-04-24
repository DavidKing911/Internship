<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AddPostController;
use App\Http\Controllers\PostController;

Route::get(uri: '/', action: [MainController::class, 'action']);

Route::get(uri: '/posts/add', action: [AddPostController::class, 'action']);

Route::controller(PostController::class)->group(function (): void {
    Route::get('/posts/response', 'showResponseAdd');
    Route::get('/posts', 'getPosts');
});