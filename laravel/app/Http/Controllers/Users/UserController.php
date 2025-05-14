<?php
namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest; 
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    protected $userService;

    public function __construct(\App\User\Services\UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAllUsers();
        return UserResource::collection($users);
    }

    public function store(StoreUserRequest $request) 
    {
        $user = $this->userService->createUser ($request->validated());
        return new UserResource($user);
    }

    public function show($id)
    {
        $user = $this->userService->getUserById($id);
        return new UserResource($user);
    }

    public function update(UpdateUserRequest $request, $id) 
    {
        $user = $this->userService->updateUser ($id, $request->validated());
        return new UserResource($user);
    }

    public function destroy($id)
    {
        $this->userService->deleteUser ($id);
        return response()->json(null, 204);
    }
}
