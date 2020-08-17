<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Report;
use App\Categories;
use App\AuthorsAndReports;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $categories = Categories::get();

        $reports = AuthorsAndReports::get();

        $authors = User::select('id', 'name')->get();

        $author_name = "";

        if(isset($request['author_id']))
        {
            $reports = AuthorsAndReports::where('user_id', $request['author_id'])->get();
            $author_name = User::where('id', $request['author_id'])->value('name');
        }

        return view('reports', compact('categories', 'reports', 'authors', 'author_name'));
    }
}
