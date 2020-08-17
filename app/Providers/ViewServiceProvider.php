<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Adds svg files as valid views
         * The php engine renders them (just returns the text)
         */
        View::addExtension('svg', 'php');

        /**
         * Attach headers to all views
         */
        View::composer(
            '*', 'App\Http\View\Composers\HeaderComposer'
        );
    }
}