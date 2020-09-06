<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function show(Request $request, $slug)
    {
        if($slug == "TAAP_FullLogo.png")
        {
            $title = "TAAP Logo";

            $headers = [
                'Content-Type'              => 'image/png',
                'Content-disposition'       => "attachment; filename='$title'",
            ];

            return response()->download('/var/www/public/img/TAAP_FullLogo.png', $title, $headers);
        }
    }
}
