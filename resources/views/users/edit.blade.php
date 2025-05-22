@extends('layouts.app')

@section('content')
    @auth
        <h1>Редактировать пользователя</h1>

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div>
                <label for="name">Имя:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
            </div>

            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
            </div>

            <div>
                <label for="password">Пароль:</label>
                <input type="password" name="password" id="password" placeholder="Оставьте пустым, если не хотите менять">
            </div>

            <button type="submit">Сохранить изменения</button>
        </form>
    @else
        <p>Для доступа к этой странице необходимо <a href="{{ route('login') }}">войти</a> в систему.</p>
    @endauth
@endsection
