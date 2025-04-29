<?php

namespace App\User\Services;

use App\Models\User;

class UserService
{
    public function getAllUsers()
    {
        return User::all();
    }

    public function createUser ($data)
    {
        return User::create($data);
    }

    public function getUserById($id) 
    {
        return User::findOrFail($id);
    }

    public function updateUser ($id, $data)
    {
        $user = $this->getUserById($id);
        $user->update($data);
        return $user;
    }
}
