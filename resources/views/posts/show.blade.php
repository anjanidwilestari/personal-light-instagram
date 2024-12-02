@extends('layouts.app')

@section('title', 'View Post')

@section('content')
<div class="card">
    <div class="card-header">{{ $post->user->username }}</div>
    <div class="card-body">
        <img src="{{ asset('storage/' . $post->file_path) }}" alt="Post Image/Video" class="img-fluid mb-3">
        <p>{{ $post->caption }}</p>
        <hr>
        
        <!-- Form untuk menambahkan komentar -->
        <form action="{{ route('comments.store', $post) }}" method="POST">
            @csrf
            <div class="mb-3">
                <textarea class="form-control" name="content" rows="3" placeholder="Add a comment..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Comment</button>
        </form>

        <h5 class="mt-4">Comments</h5>
        @foreach ($post->comments as $comment)
            <div class="mb-2">
                <strong>{{ $comment->user->username }}</strong>
                <p>{{ $comment->content }}</p>
            </div>
        @endforeach

        <!-- Tombol Delete hanya muncul jika user yang login adalah pemilik post -->
        @if(auth()->id() == $post->user_id)
            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="mt-3">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Post</button>
            </form>
        @endif
        <a href="{{ url('/') }}" class="btn btn-primary btn-lg">Back to Home</a>
    </div>
</div>
@endsection
