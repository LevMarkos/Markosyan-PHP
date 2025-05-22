<?php

use App\Http\Controllers\Comments\CommentController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Posts\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LogoutController;

// Группировка маршрутов для администраторов
Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class)->except(['show']);
});

// Группировка маршрутов для редакторов
Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class)->except(['show']);
});

// Маршруты аутентификации
Auth::routes();
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

// Главная страница
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Страница без доступа
Route::view('/no-access', 'no-access')->name('no-access');

// Маршруты для комментариев
Route::middleware(['auth'])->group(function () {
    Route::get('posts/{post}/comments/create', [CommentController::class, 'create'])->name('posts.comments.create');
    Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('posts.comments.store');
    Route::get('posts/{post}/comments', [CommentController::class, 'index'])->name('comments.index');
});

// Нестандартные маршруты постов
Route::get('posts/head', [PostController::class, 'head'])->name('posts.head');
Route::get('/posts/created/{post}', [PostController::class, 'postCreated'])->name('post.created');