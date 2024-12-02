<?php

namespace App\Http\Controllers;
use App\Models\Post;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;



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
    $filePath = $file->store('posts', 'public');  // Store the file in the 'posts', 'public' folder in storage
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

    // app/Http/Controllers/PostController.php

    public function destroy(Post $post)
    {
        // Memastikan hanya pemilik post yang bisa menghapus
        if (auth()->id() != $post->user_id) {
            return redirect()->route('profile.index')->with('error', 'Unauthorized action');
        }

        // Hapus file terkait jika ada
        if (Storage::exists('public/' . $post->file_path)) {
            Storage::delete('public/' . $post->file_path);
        }

        // Hapus post dari database
        $post->delete();

        return redirect()->route('profile.index')->with('success', 'Post deleted successfully!');
    }




}



