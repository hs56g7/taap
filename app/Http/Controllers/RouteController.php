<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Categories;

use Mail;

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

    public function testEmail(Request $request)
    {
        $info = [];
        Mail::send('emails.blank', ['info' => $info], function($message)
        {
            $message->from('do_not_reply@taap2020.com', 'Email Test');
            $message->to('hs56g7@gmail.com');
            $message->subject("Email Test");
        });
    }
}
