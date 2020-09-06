<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Author;
use App\Report;
use App\Categories;
use App\AuthorsAndReports;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $category_ids = AuthorsAndReports::where('status', 1)->pluck('category_id');
        
        $categories = Categories::whereIn('id', $category_ids)->get();
        
        $reports = AuthorsAndReports::where('status', 1)->get();

        $authors = Author::select('id', 'first_name', 'last_name')->get();

        $filter = "";

        if(isset($request['filter']))
        {
            $filter_check = Categories::where('short_name', $request['filter'])->value('id');

            if($filter_check > 0 && isset($filter_check))
            {
                $filter = Categories::where('short_name', $request['filter'])->value('short_name');
            }
        }

        return view('reports', compact('categories', 'reports', 'filter'));
    }

    public function show(Request $request, $slug)
    {
        // check for valid report_id
        $report_id = Report::where('id', $slug)->value('id');
        
        if($slug != $report_id)
        {
            return redirect()->route('report.index');
        }

        $text = Report::where('id', $report_id)->value('text');

        $title = Report::where('id', $report_id)->value('title');

        $description = Report::where('id', $report_id)->value('description');

        return view('viewReport', compact('text', 'title', 'report_id', 'description'));
    }
}
