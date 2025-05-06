<?php

namespace AppHttpControllersUsers;

use AppHttpControllersController;
use AppHttpRequestsStoreUserRequest;
use AppHttpRequestsUpdateUserRequest;
use AppHttpRequestsAssignRoleRequest; // Создайте этот запрос для валидации
use AppModelsUser; // Убедитесь, что у вас есть модель User
use SpatiePermissionModelsRole; // Импортируйте модель Role

class UserController extends Controller
{
    protected $userService;

    public function __construct(AppUserServicesUserService $userService)
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
        $this->userService->createUser($request->validated());
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = $this->userService->getUserById($id);
        $roles = Role::all(); // Получаем все роли
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(UpdateUserRequest $request, $id) 
    {
        $this->userService->updateUser($id, $request->validated());
        return redirect()->route('users.index');
    }

    // Новый метод для назначения ролей
    public function assignRole($id)
    {
        $user = $this->userService->getUserById($id);
        $roles = Role::all(); // Получаем все роли
        return view('users.assign-role', compact('user', 'roles'));
    }

    public function storeRole(AssignRoleRequest $request, $id)
    {
        $user = $this->userService->getUserById($id);
        
        // Удаляем все предыдущие роли (если нужно)
        $user->syncRoles($request->input('roles')); // Назначаем новые роли
        
        return redirect()->route('users.index')->with('success', 'Роли успешно назначены.');
    }
}
