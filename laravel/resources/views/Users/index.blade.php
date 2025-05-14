@extends('layouts.app')

@section('content')
<h1>Список постов</h1>

@if(auth()->user()->isAdmin() || auth()->user()->isEditor())
    <a href="{{ route('posts.create') }}">Создать пост</a>
@endif

<ul>
@foreach($posts as $post)
    <li>
        <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
        @if(auth()->user()->isAdmin() || auth()->user()->isEditor())
            - <a href="{{ route('posts.edit', $post->id) }}">Редактировать</a>
        @endif
    </li>
@endforeach
</ul>

@if(auth()->user()->isUser () || auth()->user()->isEditor() || auth()->user()->isAdmin())
    <h2>Добавить комментарий</h2>
@endif
@endsection

