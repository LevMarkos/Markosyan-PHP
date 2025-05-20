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
        </div>
    @endforeach

    @if($posts->isEmpty())
        <p>Нет доступных постов.</p>
    @endif
@endsection

