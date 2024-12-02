@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Archive</h1>

    <!-- Filter Form -->
    <form action="{{ route('archive.download') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="format">Select Format</label>
            <select name="format" class="form-control" required>
                <option value="xlsx">Excel (XLSX)</option>
                <option value="pdf">PDF</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Download Archive</button>
    </form>

    <!-- Data Table -->
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Foto/Video</th>
                <th>File Type</th>
                <th>Tanggal</th>
                <th>Caption</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td><img src="{{ asset('storage/' . $post->file_path) }}" width="100" /></td>
                    <td>{{ $post->file_type }}</td>
                    <td>{{ $post->created_at->format('d-m-Y') }}</td>
                    <td>{{ $post->caption }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
