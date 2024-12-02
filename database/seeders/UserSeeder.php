<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed dummy users
        User::create([
            'username' => 'johndoe',
            'email' => 'johndoe@example.com',
            'bio' => 'Hi, I am John!',
            'profile_picture' => 'default.jpg', // Path to a default profile picture
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'username' => 'janedoe',
            'email' => 'janedoe@example.com',
            'bio' => 'Jane here, nice to meet you!',
            'profile_picture' => 'default.jpg', // Path to a default profile picture
            'password' => Hash::make('password123'),
        ]);
    }
}
