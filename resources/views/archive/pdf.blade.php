<!DOCTYPE html>
<html>
<head>
    <title>Archive</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h1>Archive</h1>
    <table>
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
</body>
</html>
