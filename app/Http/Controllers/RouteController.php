<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Categories;

class RouteController extends Controller
{
    public function index(Request $request)
    {
        return view('home');
    }

    public function hash(Request $request)
    {
        User::where('id', 1)->update([
            'password'      => password_hash('TAAP2020', PASSWORD_DEFAULT),
        ]);
    }
}
