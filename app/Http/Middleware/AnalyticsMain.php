<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;

class AnalyticsMain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        View::share('APP_ENV', config('app.env'));

        return $next($request);
    }
}

