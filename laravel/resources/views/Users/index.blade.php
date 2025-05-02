@extends('layouts.app')

@section('content')

<h1>Список постов</h1>

@can('create', App\Models\Post::class)
    <a href="{{ route('posts.create') }}">Создать пост</a>
@endcan

<ul>
    @foreach($posts as $post)
        <li>
            <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
            @can('update', $post)
                - <a href="{{ route('posts.edit', $post->id) }}">Редактировать</a>
            @endcan
        </li>
    @endforeach
</ul>

@if(auth()->user()->can('comment', App\Models\Post::class))
    <h2>Добавить комментарий</h2>
@endif

@endsection
