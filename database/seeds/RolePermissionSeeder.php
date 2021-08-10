<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Roles
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        $roleEditor = Role::create(['name' => 'student']);
        $roleUser = Role::create(['name' => 'guardian']);

        //Permissions list as Array
        $permissions = [

            [
                'group_name' => "dashboard",
                'permissions' => [
                    'dashboard.view',
                    'dashboard.edit'
                ]
            ],
            [
                'group_name' => "blog",
                'permissions' => [
                    'blog.create',
                    'blog.view',
                    'blog.edit',
                    'blog.delete',
                    'blog.approve',

                ]
            ],

            [
                'group_name' => "admin",
                'permissions' => [
                    'admin.create',
                    'admin.view',
                    'admin.edit',
                    'admin.delete',
                    'admin.approve',

                ]
            ],
            [
                'group_name' => "Role",
                'permissions' => [
                    'role.create',
                    'role.view',
                    'role.edit',
                    'role.delete',
                    'role.approve',

                ]
            ],

            [
                'group_name' => "profile",
                'permissions' => [
                    'profile.view',
                    'profile.edit',

                ]
            ],
        ];

        //Create  and Assign Permissions to superAdmin
//        $permission = Permission::create(['name' => 'edit articles']);
        for ($i=0;$i<count($permissions);$i++){
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j=0;$j<count($permissions[$i]['permissions']);$j++){
                $permission = Permission::create([
                    'name' => $permissions[$i]['permissions'][$j],
                    'group_name' => $permissionGroup
                ]);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }

        }
    }
}
