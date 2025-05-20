<?php

use App\Http\Controllers\Comments\CommentController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Posts\PostController;
use Illuminate\Support\Facades\Route;


Route::resource('users', UserController::class)->names([
    'index' => 'users.index',
    'create' => 'users.create',
    'store' => 'users.store',
    'show' => 'users.show', 
    'edit' => 'users.edit',
    'update' => 'users.update',
    'destroy' => 'users.destroy',
]);


Route::resource('posts', PostController::class)->names([
    'index' => 'posts.index',
    'create' => 'posts.create',
    'store' => 'posts.store',
    'show' => 'posts.show',
    'edit' => 'posts.edit',
    'update' => 'posts.update',
    'destroy' => 'posts.destroy',
]);


Route::get('posts/head', [PostController::class, 'head'])->name('posts.head');


Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('posts.comments.store');


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
