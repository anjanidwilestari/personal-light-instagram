@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="card">
    <div class="card-header">Profile</div>
    <div class="card-body">
        <div class="text-center mb-3">
            <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="rounded-circle" width="150">
            <h3>{{ $user->username }}</h3>
            <p>{{ $user->bio }}</p>
        </div>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>
        <h4 class="mt-4">Posts</h4>
        <div class="row">
            @foreach ($user->posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $post->file_path) }}" class="card-img-top" alt="Post Image">
                        <div class="card-body">
                            <p>{{ $post->caption }}</p>
                            <a href="{{ route('posts.show', $post) }}" class="btn btn-link">View</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
