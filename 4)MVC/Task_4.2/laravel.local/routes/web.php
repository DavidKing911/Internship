<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\FormPostController;
use App\Http\Controllers\PostController;

Route::get(uri: '/', action: [MainController::class, 'action']);

Route::get(uri: '/posts/form', action: [FormPostController::class, 'action']);

Route::controller(PostController::class)->group(function (): void {
    Route::post(uri: '/posts/add', action: 'addPost');
    Route::get(uri: '/posts', action: 'getPosts');
});