@extends('layouts.app')

@section('title', 'Создать пользователя')

@section('content')
    <h1>Создать новый пост</h1>

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="title">Заголовок:</label>
        <input type="text" id="title" name="title" required>

        <label for="content">Содержимое:</label>
        <textarea id="content" name="content" required></textarea>

        <label for="image">Изображение:</label>
        <input type="file" id="image" name="image" accept="image/*">

        <button type="submit">Создать пост</button>
    </form>
@endsection
