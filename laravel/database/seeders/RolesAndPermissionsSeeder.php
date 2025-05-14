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
            if (!Permission::where('name', $permission)->exists()) {
                Permission::create(['name' => $permission]);
            }
        }

        $adminRole = Role::firstOrCreate(['name' => 'Администратор']);
        $editorRole = Role::firstOrCreate(['name' => 'Редактор']);
        $userRole = Role::firstOrCreate(['name' => 'Пользователь']);

        $adminRole->givePermissionTo(Permission::all());
        $editorRole->givePermissionTo(['create posts', 'edit posts', 'view posts', 'list posts']);
        $userRole->givePermissionTo(['view posts', 'list posts', 'add comments']);
    }
}
