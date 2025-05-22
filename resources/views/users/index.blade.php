@extends('layouts.app')

@section('content')
    @auth
        <h1>Список пользователей</h1>
        <a href="{{ route('users.create') }}">Создать пользователя</a>
        <ul>
            @foreach ($users as $user)
                <li>
                    {{ $user->name }} - {{ $user->email }} - 
                    <strong>Роль:</strong> {{ $user->role }}
                    <a href="{{ route('users.edit', $user) }}">Редактировать</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>Для доступа к этой странице необходимо <a href="{{ route('login') }}">войти</a> в систему.</p>
    @endauth
@endsection
