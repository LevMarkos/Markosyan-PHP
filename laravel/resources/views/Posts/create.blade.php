@extends('layouts.app')

@section('content')
    <h1>{{ isset($post) ? 'Редактировать пост' : 'Создать пост' }}</h1>
    <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($post))
            @method('PUT')
        @endif
        
        <div>
            <label for="title">Название поста:</label>
            <input type="text" name="title" id="title" value="{{ isset($post) ? $post->title : '' }}" required>
        </div>
        
        <div>
            <label for="content">Содержание поста:</label>
            <textarea name="content" id="content" required>{{ isset($post) ? $post->content : '' }}</textarea>
        </div>
        
        <div>
            <label for="image">Загрузить изображение:</label>
            <input type="file" name="image" id="image" accept="image/*">
        </div>
        
        <button type="submit">{{ isset($post) ? 'Обновить пост' : 'Создать пост' }}</button>
    </form>
@endsection
