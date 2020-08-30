<?php

namespace App\Http\Middleware;

use App\Categories;
use App\AuthorsAndReports;

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

        $category_ids = AuthorsAndReports::where('status', 1)->pluck('category_id');
        
        $categories = Categories::whereIn('id', $category_ids)->select('short_name', 'name')->get();
        
        View::share('report_categories', $categories);
        
        return $next($request);
    }
}

