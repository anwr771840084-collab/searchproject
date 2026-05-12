<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        if (!Role::where('name', 'admin')->exists()) {
            Role::create(['name' => 'admin']);
        }

        $admin = User::updateOrCreate(
            ['username' => 'ahmed'],
            [
                'password' => Hash::make('ahmed123'),
            ]
        );

        if (method_exists($admin, 'hasRole') && !$admin->hasRole('admin')) {
            $admin->assignRole('admin');
        }

        echo "Admin account created successfully!\n";
        echo "Username: ahmed\n";
        echo "Password: ahmed123\n";
    }
}
