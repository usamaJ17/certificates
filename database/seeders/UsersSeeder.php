<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'super_admin']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'supervisor']);
        $user = User::create([
            'name' =>  'Super Admin',
            'email' =>  'superadmin@efs.com',
            'password' => Hash::make('efs123'),
        ]);
        $user->assignRole('super_admin');
        $user = User::create([
            'name' =>  'Admin',
            'email' =>  'admin@efs.com',
            'password' => Hash::make('efs123'),
        ]);
        $user->assignRole('admin');
        $user = User::create([
            'name' =>  'Supervisor',
            'email' =>  'supervisor@efs.com',
            'password' => Hash::make('efs123'),
        ]);
        $user->assignRole('supervisor');
    }
}
