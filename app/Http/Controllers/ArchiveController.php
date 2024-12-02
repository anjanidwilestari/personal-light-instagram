<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ArchiveExport;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Carbon\Carbon;

class ArchiveController extends Controller
{
    public function index()
    {
        // Fetch posts for the archive page (you can add filters here)
        $posts = Post::all();  // Or apply additional filters
        return view('archive.index', compact('posts'));
    }

    public function download(Request $request)
    {
        // Validate and get format
        $format = $request->input('format'); // 'xlsx' or 'pdf'
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Validate dates
        $startDate = Carbon::parse($startDate)->startOfDay();  // Ensure the time is set to the start of the day
        $endDate = Carbon::parse($endDate)->endOfDay();  // Ensure the time is set to the end of the day

        // Fetch posts within the date range
        $posts = Post::whereBetween('created_at', [$startDate, $endDate])->get();

        // Check if there are any posts found
        if ($posts->isEmpty()) {
            return redirect()->route('archive.index')->with('error', 'No posts found for the selected date range.');
        }

        // Export based on format
        if ($format == 'xlsx') {
            return Excel::download(new ArchiveExport($posts), 'archive.xlsx');
        }

        if ($format == 'pdf') {
            $pdf = FacadePdf::loadView('archive.pdf', compact('posts'));
            return $pdf->download('archive.pdf');
        }

        // Redirect back if format is not valid
        return redirect()->route('archive.index')->with('error', 'Invalid format selected.');
    }
}
