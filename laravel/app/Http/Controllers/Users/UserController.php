<?php
namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest; 
use App\Services\Users\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return $this->userService->getAllUsers(); 
    }

    public function store(StoreUserRequest $request) 
    {
        return $this->userService->createUser($request->validated());
    }

    public function show($id)
    {
        return $this->userService->getUserById($id); 
    }

    public function update(UpdateUserRequest $request, $id) 
    {
        return $this->userService->updateUser($id, $request->validated());
    }

    public function destroy($id)
    {
        $this->userService->deleteUser($id);
        return response()->json(null, 204);
    }
}