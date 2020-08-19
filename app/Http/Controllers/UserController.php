<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Report;
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

    public function store(Request $request)
    {
        // validate request
        $validate = $this->validateRequest($request->all());

        if($validate->fails())
        {
            $msg = $validate->messages()->first();
            return redirect()->back()->withErrors(['error' => $msg]);
        }

        if(!$request->hasFile('pdf_file'))
        {
            $msg = "Must upload a PDF version of the file";
            return redirect()->back()->withErrors(['error' => $msg]);
        }

        $pdf_path = $request->file('pdf_file')->store('public/report_pdf');

        Report::insert([
            'user_id'           => Auth::id(),
            'title'             => $request['title'],
            'description'       => $request['description'],
            'category_id'       => $request['category'],
            'text'              => $request['trumbowyg'],
            'pdf'               => $pdf_path,
        ]);

        return redirect()->route('user.index')->withSuccess('Upload Successful');
    }

    protected function validateRequest(array $data)
    {
        return Validator::make($data, [
            'title'             => 'required|string|max:100',
            'description'       => 'required|string|max:254',
            'category'          => 'required|integer|exists:categories,id',
            'pdf_file'          => 'required|file|mimetypes:application/pdf',
        ]);
    }
}
