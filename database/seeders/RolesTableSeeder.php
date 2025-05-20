<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            'create-post',
            'edit-post',
            'list-posts',
            'view-post',
            'add-comment',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $adminRole = Role::create(['name' => 'administrator']);
        $editorRole = Role::create(['name' => 'editor']);
        $userRole = Role::create(['name' => 'user']);

        $adminRole->givePermissionTo(Permission::all());
        $editorRole->givePermissionTo(['create-post', 'edit-post', 'list-posts', 'view-post']);
        $userRole->givePermissionTo(['list-posts', 'view-post', 'add-comment']);
    }
}
