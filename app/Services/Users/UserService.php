<?php

namespace App\Services;

use App\Models\Users\User;

class UserService
{
    public function index()
    {
        return User::all();
    }

    public function create(array $validatedData)
    {
        try {
            if (isset($validatedData['password'])) {
                $validatedData['password'] = bcrypt($validatedData['password']);
            }
            return User::create($validatedData);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function update(array $validatedData, User $user)
    {
        if (isset($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }
        $user->update($validatedData);
    }

    public function destroy(User $user)
    {
        $user->delete();
    }
}
