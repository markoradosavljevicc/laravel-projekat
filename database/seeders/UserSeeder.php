<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $userRoleId = Role::where('name', 'user')->first()->id;
        $editorRoleId = Role::where('name', 'editor')->first()->id;
        $adminRoleId = Role::where('name', 'admin')->first()->id;

        User::create([
            'name' => 'User',
            'email' => 'user@pwa.rs',
            'password' => bcrypt('user'),
            'role_id' => $userRoleId,
        ]);

        User::create([
            'name' => 'Editor',
            'email' => 'editor@pwa.rs',
            'password' => bcrypt('editor'),
            'role_id' => $editorRoleId,
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@pwa.rs',
            'password' => bcrypt('admin'),
            'role_id' => $adminRoleId,
        ]);
    }
}
