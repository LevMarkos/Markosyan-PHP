<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {

        $permissions = [
            'create posts',
            'edit posts',
            'view posts',
            'list posts',
            'add comments',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $adminRole = Role::create(['name' => 'Администратор']);
        $editorRole = Role::create(['name' => 'Редактор']);
        $userRole = Role::create(['name' => 'Пользователь']);

        $adminRole->givePermissionTo(Permission::all());
        $editorRole->givePermissionTo(['create posts', 'edit posts', 'view posts', 'list posts']);
        $userRole->givePermissionTo(['view posts', 'list posts', 'add comments']);
    }
}

