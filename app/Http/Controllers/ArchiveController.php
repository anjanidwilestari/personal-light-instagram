<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ArchiveExport;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class ArchiveController extends Controller
{
    public function index()
    {
        // Fetch posts for the archive page (add filters for date range if needed)
        $posts = Post::all();  // Or add date range filters
        return view('archive.index', compact('posts'));
    }

    public function download(Request $request)
    {
        $format = $request->input('format'); // 'xlsx' or 'pdf'
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Apply date filter if provided
        $posts = Post::whereBetween('created_at', [$startDate, $endDate])->get();

        if ($format == 'xlsx') {
            return Excel::download(new ArchiveExport($posts), 'archive.xlsx');
        }

        if ($format == 'pdf') {
            $pdf = FacadePdf::loadView('archive.pdf', compact('posts'));
            return $pdf->download('archive.pdf');
        }

        return redirect()->route('archive.index');
    }
}

