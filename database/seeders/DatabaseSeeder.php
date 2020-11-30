<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create(['email' => 'admin@admin.com']);
        \App\Models\User::factory()->create(['email' => 'user@user.com']);
        \App\Models\User::factory(10)->create();

        $this->call([
            PermissionTableSeeder::class,
            RoleTableSeeder::class,
            PermissionRoleTableSeeder::class,
            RoleUserTableSeeder::class,
        ]);
    }
}