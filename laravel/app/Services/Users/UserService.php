<?php

namespace App\User\Services;

use App\Models\User;
use Log;

class UserService
{
    public function getAllUsers()
    {
        return User::all();
    }

    public function createUser ($data)
    {
        Log::channel('sevenchanges')->info('Создан новый пользователь'.json_encode($data));
        return User::create($data);
    }

    public function getUserById($id) 
    {
        Log::channel('sevenchanges')->info('Поиск пользователя по ID: ' . $id);
        return User::findOrFail($id);
    }

    public function updateUser ($id, $data)
    {
        $user = $this->getUserById($id);
        $user->update($data);
        Log::channel('sevenchanges')->info('Пользователь изменён: ' . json_encode($user));
        return $user;
    }
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }
    
}
