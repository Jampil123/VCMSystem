<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call your roles and statuses seeders first
        $this->call([
            RolesTableSeeder::class,
            UserStatusesSeeder::class,
        ]);

        // Create a default Admin account
        User::create([
            'f_name' => 'System',
            'l_name' => 'Admin',
            'enforcer_id' => 'ENF-ADMIN-001',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'phone' => '09123456789',
            'role_id' => 1,   // assuming ID 1 = Admin in RolesSeeder
            'status_id' => 2, // assuming ID 2 = Approved in UserStatusesSeeder
            'password' => Hash::make('admin123'), // 🔑 Default password
        ]);

        // ✅ Default Enforcer Account
        User::create([
            'f_name' => 'Juan',
            'l_name' => 'Dela Cruz',
            'enforcer_id' => 'ENF-0001',
            'username' => 'enforcer1',
            'email' => 'enforcer1@example.com',
            'phone' => '09987654321',
            'role_id' => 2,   
            'status_id' => 2,
            'password' => Hash::make('enforcer123'),
        ]);
        
    }
}
