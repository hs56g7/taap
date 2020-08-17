<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;

class HeaderComposer
{
    /**
     * 
     */
    public function __construct()
    {
        //
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $x_frame = "deny";

        $view->with('x_frame', $x_frame);
    }
}