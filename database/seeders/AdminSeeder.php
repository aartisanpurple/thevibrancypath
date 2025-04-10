<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash; // ✅ Missing import added

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'], // Prevent duplicate entries
            [
                'name' => 'Admin',
                'user_name' => 'admin',
                'mobile_no' => '9876543210',
                'email' => 'admin@example.com',
                'password' => Hash::make('password123'),
                'address' => '123 Admin Street',
                'city' => 'Admin City',
                'state' => 'Admin State',
                'country' => 'Adminland',
                'postal_code' => '123456',
                'user_type' => 'admin',
                'status' => 'active',
            ]
        );
    }
}
