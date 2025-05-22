@extends('layouts.app')

@section('content')
    @auth
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>

        <h2>Комментарии</h2>
        <form action="{{ route('comments.store', $post) }}" method="POST">
            @csrf
            <textarea name="content" required placeholder="Добавьте комментарий"></textarea>
            <button type="submit">Добавить комментарий</button>
        </form>

        <ul>
            @foreach ($post->comments as $comment)
                <li>{{ $comment->content }} - {{ $comment->user->name }}</li>
            @endforeach
        </ul>
    @else
        <p>Для доступа к этой странице необходимо <a href="{{ route('login') }}">войти</a> в систему.</p>
    @endauth
@endsection


