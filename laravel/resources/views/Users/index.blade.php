@extends('layouts.app')

@section('content')
    <h1>Список пользователей</h1>
    <a href="{{ route('users.create') }}">Создать пользователя</a>
    <ul>
        @foreach($users as $user)
            <li>{{ $user->name }} - <a href="{{ route('users.edit', $user->id) }}">Редактировать</a></li>
        @endforeach
    </ul>
@endsection
