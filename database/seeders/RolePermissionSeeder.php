<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Create Roles
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $valuatorRole = Role::firstOrCreate(['name' => 'Valuator']);
        $userRole = Role::firstOrCreate(['name' => 'User']);

        // Create Permissions
        $createPostPermission = Permission::firstOrCreate(['name' => 'create-post']);
        $editPostPermission = Permission::firstOrCreate(['name' => 'edit-post']);
        $viewPostPermission = Permission::firstOrCreate(['name' => 'view-post']);
        $registerUserPermission = Permission::firstOrCreate(['name' => 'register-user']);
        $generateReportPermission = Permission::firstOrCreate(['name' => 'generate-report']);

        // Assign Permissions to Roles
        $adminRole->permissions()->sync([
            $createPostPermission->id,
            $editPostPermission->id,
            $viewPostPermission->id,
            $registerUserPermission->id,
        ]);

        $valuatorRole->permissions()->sync([
            $createPostPermission->id,
            $editPostPermission->id,
            $viewPostPermission->id,
            $generateReportPermission->id,
        ]);

        $userRole->permissions()->sync([
            $viewPostPermission->id,
        ]);

        // Create Users and Assign Roles
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('0123456789'),
            ]
        );
        $adminUser->roles()->sync([$adminRole->id]);

        $valuatorUser = User::firstOrCreate(
            ['email' => 'valuator@gmail.com'],
            [
                'name' => 'Valuator User',
                'password' => bcrypt('123456789'),
            ]
        );
        $valuatorUser->roles()->sync([$valuatorRole->id]);

        $regularUser = User::firstOrCreate(
            ['email' => 'user@gmail.com'],
            [
                'name' => 'Regular User',
                'password' => bcrypt('12345678'),
            ]
        );
        $regularUser->roles()->sync([$userRole->id]);
    }
}
