@extends('layouts.app')

@section('content')
    <h1>Добавить комментарий к посту: {{ $post->title }}</h1>

    <form action="{{ route('posts.comments.store', $post->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <textarea name="content" rows="5" placeholder="Введите ваш комментарий" required></textarea>
        </div>
        <button type="submit" class="btn">Отправить</button>
    </form>

    <a href="{{ route('posts.index') }}">Назад к списку постов</a>
@endsection
