<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all users
        $users = User::all();

        foreach ($users as $user) {
            // Create dummy posts for each user
            Post::create([
                'user_id' => $user->id,
                'file_path' => 'uploads/photos/photo1.jpg', // Path to dummy image
                'file_type' => 'image', // Tambahkan file_type
                'caption' => 'A beautiful view!',
            ]);

            Post::create([
                'user_id' => $user->id,
                'file_path' => 'uploads/videos/video1.mp4', // Path to dummy video
                'file_type' => 'video', // Tambahkan file_type
                'caption' => 'Check out this video!',
            ]);
        }
    }

}
