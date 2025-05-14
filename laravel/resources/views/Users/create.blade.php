@extends('layouts.app')

@section('content')
    <h1>{{ isset($user) ? 'Редактировать пользователя' : 'Создать пользователя' }}</h1>
    <form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" method="POST">
        @csrf
        @if(isset($user))
        @method('PUT')
        @endif
        <div>
            <label for="name">Имя:</label>
            <input type="text" name="name" id="name" value="{{ isset($user) ? $user->name : '' }}" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ isset($user) ? $user->email : '' }}" required>
        </div>
        <button type="submit">{{ isset($user) ? 'Обновить' : 'Создать' }}</button>
    </form>
@endsection
