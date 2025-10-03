<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\UserStatus;

class UserStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_statuses')->insert([
            [
                'status' => 'Pending',
                'description' => 'User awaiting admin approval before accessing the system',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'status' => 'Approved',
                'description' => 'User has been approved and can access the system',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'status' => 'Suspended',
                'description' => 'User is temporarily suspended due to violation or admin decision',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
