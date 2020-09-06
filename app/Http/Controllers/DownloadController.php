<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Report;

class DownloadController extends Controller
{
    public function show(Request $request, $slug)
    {
        // check for valid report_id
        $report_id = Report::where('id', $slug)->value('id');
        
        if($slug != $report_id)
        {
            return redirect()->route('report.index');
        }

        $pdf_path = Report::where('id', $report_id)->value('pdf');

        $title = Report::where('id', $report_id)->value('title');

        $headers = [
            'Content-Type'              => 'application/pdf',
            'Content-disposition'       => "attachment; filename='$title'",
        ];

        return Storage::disk('azure')->download($pdf_path, $title, $headers);
    }
}
