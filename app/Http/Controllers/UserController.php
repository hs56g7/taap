<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Categories;
use App\AuthorsAndReports;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user_id = Auth::id();

        $reports = AuthorsAndReports::where('user_id', $user_id)->select('report_id', 'title', 'name')->get();

        return view('user.dashboard', compact('reports'));
    }

    public function create(Request $request)
    {
        $categories = Categories::select('id', 'name')->get();

        return view('user.createReport', compact('categories'));
    }
}
