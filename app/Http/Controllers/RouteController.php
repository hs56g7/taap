<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Report;
use App\Categories;
use App\FeaturedReport;

use Mail;

class RouteController extends Controller
{
    public function index(Request $request)
    {
        dfghj
        $report_id = FeaturedReport::where('id', 1)->value('report_id');

        $title = Report::where('id', $report_id)->value('title');

        $category_id = Report::where('id', $report_id)->value('category_id');

        $category = Categories::where('id', $category_id)->value('name');

        return view('home', compact('title', 'category', 'report_id'));
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
