<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UserRequest;
use App\Models\Users\User;

class UserController extends Controller
{
    // Отображение списка пользователей
    public function index()
    {
        $users = User::all(); // Получаем всех пользователей
        return view('users.index', compact('users')); // Возвращаем представление со списком пользователей
    }

    // Отображение формы создания пользователя
    public function create()
    {
        return view('users.create'); // Возвращаем представление для создания пользователя
    }

    // Сохранение нового пользователя
    public function store(UserRequest $request)
{
    try {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect()->route('users.index')->with('success', 'Пользователь успешно создан!');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]); // Показать ошибку
    }
}



    // Отображение формы редактирования пользователя
    public function edit(User $user)
    {
        return view('users.create', compact('user')); // Возвращаем представление для редактирования пользователя
    }

    // Обновление информации о пользователе
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->validated()); // Обновляем информацию о пользователе с валидированными данными
        return redirect()->route('users.index')->with('success', 'Пользователь успешно обновлён!'); // Перенаправляем с сообщением об успехе
    }

    // Удаление пользователя
    public function destroy(User $user)
    {
        $user->delete(); // Удаляем пользователя
        return redirect()->route('users.index')->with('success', 'Пользователь успешно удалён!'); // Перенаправляем с сообщением об успехе
    }
}
