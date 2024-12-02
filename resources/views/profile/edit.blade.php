@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="container mt-5">
    <h3 class="text-center mb-4">Edit Profile</h3>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Profile Picture -->
        <div class="form-group text-center mb-4">
            <label for="profile_picture" class="d-block">Profile Picture</label>
            <input type="file" name="profile_picture" id="profile_picture" class="form-control-file" onchange="previewImage(event)">
            <img id="profile_picture_preview" src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="rounded-circle mt-3" width="150" style="display: {{ $user->profile_picture ? 'block' : 'none' }}">
        </div>

        <!-- Username -->
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="{{ old('username', $user->username) }}" required>
        </div>

        <!-- Bio -->
        <div class="form-group">
            <label for="bio">Bio</label>
            <textarea name="bio" id="bio" class="form-control">{{ old('bio', $user->bio) }}</textarea>
        </div>

        <!-- Feed Per Row -->
        <div class="form-group">
            <label for="feeds_per_row">Feeds Per Row</label>
            <input type="number" name="feeds_per_row" id="feeds_per_row" class="form-control" value="{{ old('feeds_per_row', 3) }}" min="1" max="5">
        </div>

        <!-- Submit Button -->
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </form>
</div>

@endsection

@section('scripts')
<script>
    // Preview image before uploading
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('profile_picture_preview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection
