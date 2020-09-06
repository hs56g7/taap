<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Storage;

class ImageController extends Controller
{
    public function show(Request $request, $slug)
    {
        if($slug == "TAAP_FullLogo.png")
        {
            $path = "TAAP_FullLogo.PNG";

            $title = "TAAP Logo";

            $headers = [
                'Content-Type'              => 'image/png',
                'Content-disposition'       => "attachment; filename='$title'",
            ];

            return Storage::disk('azure')->download($path, $title, $headers);
        }

        return redirect()->route('home');
    }
}
