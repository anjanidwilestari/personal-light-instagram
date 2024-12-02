<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post;

// app/Http/Controllers/CommentController.php

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $data = $request->validate([
            'content' => 'required|string|max:500',
        ]);

        $post->comments()->create([
            'content' => $data['content'],
            'user_id' => auth()->id(),
        ]);

        return back();
    }
}

