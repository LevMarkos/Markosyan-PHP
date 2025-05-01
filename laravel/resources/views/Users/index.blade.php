@extends('layouts.app')

@section('content')
<h1>Список постов</h1>

@if(auth()->user()->role === 'admin' || auth()->user()->role === 'editor')
    <a href="{{ route('posts.create') }}">Создать пост</a>
@endif

<ul>
@foreach($posts as $post)
    <li>
        <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
        @if(auth()->user()->role === 'admin' || auth()->user()->role === 'editor')
            - <a href="{{ route('posts.edit', $post->id) }}">Редактировать</a>
        @endif
    </li>
@endforeach
</ul>

@if(auth()->user()->role === 'user' || auth()->user()->role === 'editor' || auth()->user()->role === 'admin')
    <h2>Добавить комментарий</h2>
@endif
@endsection
