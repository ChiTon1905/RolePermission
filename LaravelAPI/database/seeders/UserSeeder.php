<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_list = Permission::create(['name' => 'user.list']);
        $user_view = Permission::create(['name' => 'user.view']);
        $user_create = Permission::create(['name' => 'user.create']);
        $user_update = Permission::create(['name' => 'user.update']);
        $user_delete = Permission::create(['name' => 'user.delete']);

        $admin_role = Role::create(['name'=>'admin']);
        $admin_role->givePermissionto([
            $user_create,
            $user_delete,
            $user_list,
            $user_update,
            $user_view
        ]);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);
        $admin->assignRole($admin_role);
        $admin->givePermissionto([
            $user_create,
            $user_delete,
            $user_list,
            $user_update,
            $user_view
        ]);


        $user = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('password')
        ]);

        $user_role = Role::create(['name'=>'user']);

        $user->assignRole($user_role);
        $user->givePermissionto([
            $user_create,
            $user_delete,
            $user_list,
            $user_update,
            $user_view
        ]);
        $user_role->givePermissionto([
            $user_create,
            $user_delete,
            $user_list,
            $user_update,
            $user_view
        ]);

    }
}
