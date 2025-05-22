<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
{
    return [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $this->user->id,
        'password' => 'nullable|string|min:8|confirmed',
        'role' => 'required|string|in:admin,editor,user',
    ];
}


    public function messages()
    {
        return [
            'name.required' => 'Имя обязательно для заполнения.',
            'email.required' => 'Email обязателен для заполнения.',
            'email.email' => 'Введите корректный email.',
            'email.unique' => 'Этот email уже занят.',
            'password.required' => 'Пароль обязателен для заполнения.',
            'password.min' => 'Пароль должен содержать минимум 8 символов.',
            'password.confirmed' => 'Подтверждение пароля не совпадает.',
            'role.required' => 'Роль обязательна для заполнения.',
            'role.in' => 'Роль должна быть одной из следующих: admin, editor, user.',
        ];
    }
}
