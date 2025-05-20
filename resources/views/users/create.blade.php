@extends('layouts.app')

@section('title', 'Создать пользователя')

@section('content')
    <h1>Создать нового пользователя</h1>

    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <label for="name">Логин:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Электронная почта:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Создать пользователя</button>
    </form>
@endsection
