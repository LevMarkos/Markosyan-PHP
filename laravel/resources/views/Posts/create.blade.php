@extends('layouts.app')

@section('content')
    <h1>{{ isset($post) ? 'Редактировать пост' : 'Создать пост' }}</h1>
    <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST">
        @csrf
        @if(isset($post))
            @method('PUT')
        @endif
        <div>
            <label for="title">Заголовок:</label>
            <input type="text" name="title" id="title" value="{{ isset($post) ? $post->title : '' }}" required>
        </div>
        <div>
            <label for="content">Содержание:</label>
            <textarea name="content" id="content" required>{{ isset($post) ? $post->content : '' }}</textarea>
        </div>
        <button type="submit">{{ isset($post) ? 'Обновить' : 'Создать' }}</button>
    </form>
@endsection
