<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            "Admin",
            "User"
        ];

        array_map(function($role){
            $data = Role::create([
                'name' => $role,
                'guard_name' => 'sanctum'
            ]);

            if($role == 'Admin'){
                $permissions = Permission::pluck('name');
                $data->syncPermissions($permissions);
            }
        },$roles);
    }
}
