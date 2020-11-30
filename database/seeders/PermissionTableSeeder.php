<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['name' => 'user_list'],
            ['name' => 'user_show'],
            ['name' => 'user_create'],
            ['name' => 'user_edit'],
            ['name' => 'user_delete'],
            ['name' => 'role_list'],
            ['name' => 'role_show'],
            ['name' => 'role_create'],
            ['name' => 'role_edit'],
            ['name' => 'role_delete'],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}