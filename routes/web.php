<?php

use App\Http\Controllers\Comments\CommentController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Posts\PostController;
use Illuminate\Support\Facades\Route;

// Пользователи
Route::resource('users', UserController::class)->names([
    'index' => 'users.index',
    'create' => 'users.create',
    'store' => 'users.store',
    'show' => 'users.show', 
    'edit' => 'users.edit',
    'update' => 'users.update',
    'destroy' => 'users.destroy',
]);

// Посты
Route::resource('posts', PostController::class)->names([
    'index' => 'posts.index',
    'create' => 'posts.create',
    'store' => 'posts.store',
    'show' => 'posts.show',
    'edit' => 'posts.edit',
    'update' => 'posts.update',
    'destroy' => 'posts.destroy',
]);

// Заголовки постов
Route::get('posts/head', [PostController::class, 'head'])->name('posts.head');

// Комментарии
Route::get('posts/{post}/comments', [CommentController::class, 'index'])->name('posts.comments.index'); // Получение комментариев к посту
Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('posts.comments.store'); // Создание нового комментария

Auth::routes();
// Главная страница
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');