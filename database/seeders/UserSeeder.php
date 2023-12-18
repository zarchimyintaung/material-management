<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        $admin = User::create([
            'name' => 'Zar Chi',
            'slug' => 'zar-chi',
            'email' => 'htetmyatsoe492@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $admin->assignRole('Admin');
        $permissions = Permission::pluck('name')->all();
        $admin->givePermissionTo($permissions);

        $user = User::create([
            'name' => 'Htet Myat',
            'slug' => 'htet-myat',
            'email' => 'htetmyatsoe578@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $user->assignRole('User');

    }
}
