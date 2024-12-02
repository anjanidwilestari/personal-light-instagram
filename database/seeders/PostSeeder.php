<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    public function run()
    {
        $dummyImages = [
            'image1.jpg',
            'image2.jpg',
            'image3.jpg',
        ];

        // Ambil ID pengguna pertama (pastikan UserSeeder telah dijalankan)
        $userId = User::inRandomOrder()->first()->id;

        foreach ($dummyImages as $image) {
            $dummyPath = public_path('dummy-images/' . $image);

            // Generate a new file name to avoid conflicts
            $newFileName = Str::random(10) . '_' . $image;

            // Copy the dummy image to storage
            $storagePath = 'posts/' . $newFileName;
            Storage::disk('public')->put($storagePath, file_get_contents($dummyPath));

            // Save post data to database
            Post::create([
                'user_id' => $userId, // Masukkan user_id
                'file_path' => $storagePath,
                'file_type' => 'image',
                'caption' => 'This is a dummy caption for ' . $image,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
