<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

// app/Http/Controllers/PostController.php

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'file' => 'required|file|mimes:jpg,jpeg,png,gif,mp4,mov,avi',
        'caption' => 'nullable|string|max:255',
    ]);

    // Handle the file upload
    $file = $request->file('file');
    $filePath = $file->store('posts');  // Store the file in the 'posts' folder in storage
    $fileType = $file->getClientMimeType();  // Get the MIME type of the file

    // Create a new post
    $post = new Post();
    $post->file_path = $filePath;
    $post->file_type = $fileType;  // Assign the file type
    $post->caption = $request->input('caption');
    $post->user_id = auth()->id();  // Assuming the user is authenticated
    $post->save();

    return redirect()->route('profile.index')->with('success', 'Post created successfully!');
}

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}

