<?php

use App\Http\Controllers\Comments\CommentController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Posts\PostController;


Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/', [UserController::class, 'store'])->name('store');
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
    Route::put('/{user}', [UserController::class, 'update'])->name('update');
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
});

    Route::prefix('posts')->name('posts.')->group(function () {
    Route::get('/head', [PostController::class, 'head'])->name('head');
    Route::resource('/', PostController::class)->except(['create', 'edit']); // Используем ресурсный контроллер

    Route::get('/create', [PostController::class, 'create'])->name('create');
    Route::get('/{post}/edit', [PostController::class, 'edit'])->name('edit');

    Route::post('/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
});

    Route::middleware('auth')->group(function () {
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
