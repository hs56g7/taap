<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use App\JWT;
use App\Report;
use App\Author;
use App\Categories;
use App\ReportToStatus;
use App\AuthorsToReports;
use App\AuthorsAndReports;

use League\HTMLToMarkdown\HtmlConverter;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user_id = Auth::id();
        
        $reports = AuthorsAndReports::where('user_id', $user_id)->select('report_id', 'title', 'name', 'status')->get();

        return view('user.dashboard', compact('reports'));
    }

    public function create(Request $request)
    {
        $categories = Categories::select('id', 'name')->get();

        $authors = Author::select('id', 'first_name', 'last_name')->get();
        
        return view('user.createReport', compact('categories', 'authors'));
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
        
        $pdf_path = $request->file('pdf_file')->store('report_pdf', 'azure');
        
        $report_id = Report::insertGetId([
            'user_id'           => Auth::id(),
            'title'             => $request['title'],
            'description'       => $request['description'],
            'category_id'       => $request['category'],
            'author_id'         => $request['author'],
            'text'              => $request['trumbowyg'],
            'pdf'               => $pdf_path,
        ]);

        AuthorsToReports::insert([
            'report_id'         => $report_id,
            'author_id'         => $request['author'],
        ]);

        ReportToStatus::insert([
            'report_id'         => $report_id,
            'status'            => 1,
        ]);

        return redirect()->route('user.index')->withSuccess('Upload Successful');
    }

    public function show(Request $request, $slug)
    {
        $user_id = Auth::id();

        // check for ownership of the report
        $ownership_check = Report::where([
            ['id', $slug],
            ['user_id', $user_id],
        ])->value('id');

        if($ownership_check == $slug)
        {
            $status = ReportToStatus::where('report_id', $slug)->value('status');

            if($status == 1)
            {
                $status = 0;
            }
            else
            {
                $status = 1;
            }

            ReportToStatus::where('report_id', $slug)->update([
                'status'        => $status,
            ]);

            return redirect()->route('user.index')->withSuccess('Update Successful');
        }
        else
        {
            return redirect()->route('user.index')->withError('An error occurred');
        }
    }

    public function edit(Request $request, $slug)
    {
        $info = AuthorsAndReports::where('report_id', $slug)->get();
        
        if(!isset($info[0]))
        {
            return redirect()->route('user.index');
        }

        $info = $info[0];

        $JWT = new JWT;
        $report_id = $JWT->encode(array('report_id' => $slug));

        $categories = Categories::select('id', 'name')->get();

        $authors = Author::select('id', 'first_name', 'last_name')->get();

        $report_text = Report::where('id', $slug)->value('text');

        return view('user.editReport', compact('info', 'report_id', 'categories', 'authors', 'report_text', 'slug'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'report_id'         => 'required|string',
            'title'             => 'required|string|max:100',
            'description'       => 'required|string|max:254',
            'category'          => 'required|integer|exists:categories,id',
            'author'            => 'required|integer|exists:authors,id',
            'trumbowyg'         => 'required|string',
        ]);

        $JWT = new JWT;
        $report_id = $JWT->decode($request['report_id']);
        
        if(!isset($report_id->report_id))
        {
            return redirect()->route('user.index');
        }

        // this is a valid request
        $report_id = $report_id->report_id;

        Report::where('id', $report_id)->update([
            'user_id'           => Auth::id(),
            'title'             => $request['title'],
            'description'       => $request['description'],
            'category_id'       => $request['category'],
            'author_id'         => $request['author'],
            'text'              => $request['trumbowyg'],
        ]);

        AuthorsToReports::where('report_id', $report_id)->update([
            'author_id'         => $request['author'],
        ]);

        if($request->hasFile('pdf_file'))
        {
            $old_path = Report::where('id', $report_id)->value('pdf');

            $pdf_path = $request->file('pdf_file')->store('report_pdf', 'azure');

            Report::where('id', $report_id)->update([
                'pdf'           => $pdf_path,
            ]);

            Storage::delete($old_path);
        }

        return redirect()->route('user.index')->withSuccess('Update Successful');
    }

    protected function validateRequest(array $data)
    {
        return Validator::make($data, [
            'title'             => 'required|string|max:100',
            'description'       => 'required|string|max:254',
            'category'          => 'required|integer|exists:categories,id',
            'author'            => 'required|integer|exists:authors,id',
            'trumbowyg'         => 'required|string',
            'pdf_file'          => 'required|file|mimetypes:application/pdf',
        ]);
    }
}
