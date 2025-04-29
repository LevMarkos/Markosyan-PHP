@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <h2>Комментарии</h2>
    <form action="{{ route('comments.store', $post->id) }}" method="POST">
        @csrf
        <div>
            <label for="comment">Ваш комментарий:</label>
            <textarea name="comment" id="comment" required></textarea>
        </div>
        <button type="submit">Добавить комментарий</button>
    </form>
    <ul>
        @foreach($post->comments as $comment)
            <li>{{ $comment->content }}</li>
        @endforeach
    </ul>
@endsection
