@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')
    <h2>Список постов</h2>
    <div class="posts">
        @foreach ($posts as $post)
            <div class="post">
                <h3>{{ $post->title }}</h3>
                <p>{{ $post->content }}</p>
                <div class="comments">
                    <h4>Комментарии:</h4>
                    @foreach ($post->comments as $comment)
                        <div class="comment">
                            <strong>{{ $comment->user->name }}:</strong>
                            <p>{{ $comment->content }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection
