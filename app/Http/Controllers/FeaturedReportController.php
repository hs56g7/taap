<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\FeaturedReport;
use App\AuthorsAndReports;

class FeaturedReportController extends Controller
{
    public function show(Request $request, $slug)
    {
        $report_check = AuthorsAndReports::where('report_id', $slug)->value('status');

        if($report_check == 1)
        {
            // make this the featured report
            FeaturedReport::where('id', 1)->update([
                'report_id'         => $slug
            ]);
            
            return redirect()->route('user.index')->withSuccess('Featured Report Update Successful');
        }

        return redirect()->route('user.index')->withError('Invalid Report - Must Be Visible');
    }
}
