<?php

namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromCollection;

class ArchiveExport implements FromCollection
{
    protected $posts;

    public function __construct($posts)
    {
        $this->posts = $posts;
    }

    public function collection()
    {
        return $this->posts->map(function ($post) {
            return [
                'Foto/Video' => $post->file_path,  // Adjusted to file_path
                'File Type' => $post->file_type,  // Adjusted to file_type
                'Tanggal' => $post->created_at->format('d-m-Y'),
                'Caption' => $post->caption,
            ];
        });
    }
}
