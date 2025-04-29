@extends('layouts.app')

@section('content')
    <h1>Список постов</h1>
    <a href="{{ route('posts.create') }}">Создать пост</a>
    <ul>
        @foreach($posts as $post)
            <li>{{ $post->title }} - <a href="{{ route('posts.show', $post->id) }}">Просмотреть</a></li>
        @endforeach
    </ul>
@endsection
