<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categories;

class RouteController extends Controller
{
    public function index(Request $request)
    {
        $categories = Categories::get();

        return view('home', compact('categories'));
    }
}
