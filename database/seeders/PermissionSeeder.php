<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            "report",
            "items",
            "categories",
            "types",
            "departments",
            "roles",
            "permissions",
            "users",
        ];

        array_map(function($permission){
            Permission::create([
                'name' => $permission,
                'guard_name' => 'sanctum'
            ]);
        },$permissions);
    }
}
