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
        $categories = Categories::get();

        $reports = AuthorsAndReports::where('status', 1)->get();

        $authors = Author::select('id', 'first_name', 'last_name')->get();

        $author_name = "";

        if(isset($request['author_id']))
        {
            $reports = AuthorsAndReports::where([
                ['author_id', $request['author_id']],
                ['status', 1],
            ])->get();
            
            $fname = Author::where('id', $request['author_id'])->value('first_name');
            $lname = Author::where('id', $request['author_id'])->value('last_name');

            $author_name = "$fname $lname";
        }

        return view('reports', compact('categories', 'reports', 'authors', 'author_name'));
    }
}
