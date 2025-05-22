@extends('layouts.app')

@section('content')
    <h1>Список постов</h1>

    @foreach($posts as $post)
        <div class="post">
            <h2>{{ $post->title }}</h2>
            @if($post->getFirstMedia('images'))
                <img src="{{ $post->getFirstMediaUrl('images') }}" alt="Изображение поста" style="max-width: 100%;">
            @endif
            <p>{{ $post->content }}</p>
            <a href="{{ route('posts.comments.create', $post->id) }}" class="btn">Добавить комментарий</a>

            <h3>Комментарии:</h3>
            @if($post->comments->isEmpty())
                <p>Комментариев нет.</p>
            @else
                <ul>
                    @foreach($post->comments as $comment)
                        <li>
                            <strong>{{ $comment->user->name }}</strong>: {{ $comment->content }}
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    @endforeach

    @if($posts->isEmpty())
        <p>Нет доступных постов.</p>
    @endif
@endsection

