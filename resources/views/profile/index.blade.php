@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container mt-5">
    <!-- Profile Section -->
    <div class="profile text-center mb-5">
        <div class="d-flex justify-content-center align-items-center">
            <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="rounded-circle border border-light" width="150">
        </div>
        <h3 class="mt-3">{{ $user->username }}</h3>
        <p>{{ $user->bio }}</p>

        <!-- Stats Section (Posts, Followers, Following) -->
        <div class="d-flex justify-content-center mb-4">
            <div class="mx-4">
                <h5>{{ $user->posts->count() }}</h5>
                <small>Posts</small>
            </div>
            <div class="mx-4">
                <h5>0</h5> <!-- Placeholder for followers -->
                <small>Followers</small>
            </div>
            <div class="mx-4">
                <h5>0</h5> <!-- Placeholder for following -->
                <small>Following</small>
            </div>
        </div>

        <!-- Create Post Button -->
        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-4">Create Post</a>
        <a href="{{ route('profile.edit') }}" class="btn btn-warning mb-4">Edit Profile</a>
        <a href="{{ route('archive.index') }}" class="btn btn-success mb-4">Archive</a>
    </div>

    <!-- Feed Per Row Section -->
    <div class="mb-4">
        <label for="feeds_per_row" class="form-label">Feeds per Row:</label>
        <select id="feeds_per_row" class="form-select" onchange="adjustFeedLayout()">
            <option value="3" selected>3</option>
            <option value="6">6</option>
            <option value="9">9</option>
            <option value="12">12</option>
        </select>
    </div>

    <!-- Gallery Section (Posts) -->
    <h4 class="text-center mb-4">Posts</h4>
    <div class="row" id="post-gallery" style="display: grid; gap: 1rem; grid-template-columns: repeat(3, 1fr);">
        @foreach ($user->posts as $post)
            <div class="post-item">
                <a href="{{ route('posts.show', $post) }}" class="card gallery-item position-relative" style="aspect-ratio: 1; overflow: hidden;">
                    <img src="{{ asset('storage/' . $post->file_path) }}" class="card-img-top" alt="Post Image" style="object-fit: cover;">
                    <div class="gallery-item-info position-absolute w-100 h-100 d-flex justify-content-center align-items-center text-white">
                        <div class="text-center">
                            <p>{{ $post->caption }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

@endsection

@section('scripts')
<script>
    // Function to adjust feed layout based on the dropdown value
    function adjustFeedLayout() {
        const feedCount = document.getElementById('feeds_per_row').value;  // Get selected number of feeds per row
        const postGallery = document.getElementById('post-gallery');

        // Set the grid template columns to create the specified number of columns
        postGallery.style.gridTemplateColumns = `repeat(${feedCount}, 1fr)`;  // Adjust columns for grid layout
    }

    // Call the function once to apply the initial layout when the page loads
    adjustFeedLayout();
</script>
@endsection
