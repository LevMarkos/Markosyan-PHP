<?php
namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest; 

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
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUserRequest $request) 
    {
        $this->userService->createUser ($request->validated());
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = $this->userService->getUserById($id);
        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, $id) 
    {
        $this->userService->updateUser ($id, $request->validated());
        return redirect()->route('users.index');
    }
}
