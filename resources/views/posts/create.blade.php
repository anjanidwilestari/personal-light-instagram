@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
<div class="card">
    <div class="card-header">Create New Post</div>
    <div class="card-body">
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="file" class="form-label">Upload Image/Video</label>
                <input type="file" class="form-control" id="file" name="file" required>
            </div>
            <div class="mb-3">
                <label for="caption" class="form-label">Caption</label>
                <textarea class="form-control" id="caption" name="caption" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Post</button>
        </form>
    </div>
</div>
@endsection
