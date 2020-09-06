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

            $logo = Storage::disk('azure')->get($path);

            return response($logo, 200)->header('Content-Type', 'image/png');
        }

        return redirect()->route('home');
    }
}
