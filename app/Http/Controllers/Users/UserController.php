<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UserRequest;
use App\Models\Users\User;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function store(UserRequest $request)
{
    $data = $request->validated();
    $data['password'] = bcrypt($data['password']);
    $user = User::create($data);
    return redirect()->route('users.index')->with('success', 'Пользователь успешно создан!');
}

    public function update(UserRequest $request, User $user)
    {
        $user->update($request->validated());
        return new UserResource($user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'Пользователь успешно удалён!'], 200);
    }
}
