<?php

namespace App\Services\Users;

use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Log;


class UserService
{
    public function getAllUsers()
    {
        $users = User::all();
        return UserResource::collection($users);
    }

    public function createUser($data)
    {
        Log::channel('sevenchanges')->info('Создан новый пользователь' . json_encode($data));
        $user = User::create($data);
        return new UserResource($user);
    }

    public function getUserById($id) 
    {
        Log::channel('sevenchanges')->info('Поиск пользователя по ID: ' . $id);
        $user = User::findOrFail($id);
        return new UserResource($user);
    }

    public function updateUser ($id, $data)
{
    $user = User::findOrFail($id);
    $user->update($data);
    Log::channel('sevenchanges')->info('Пользователь изменён: ' . json_encode($user));
    return new UserResource($user);
}


    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }
}