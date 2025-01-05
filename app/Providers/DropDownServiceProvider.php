<?php

namespace App\Providers;

use App\View\Composers\DropDownComposer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class DropDownServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
//        View::composer(['*'], DropDownComposer::class);
        View::composer('*', function ($view) {
            $excludedRoutes = ['district-enrollment-list', 'OOSC_2024', 'camps-listing','district-wise-enrollment','camps-attendance','camps-complaints','oosc-enrollment-list'];

            // Check if current route exists and is not in the excluded routes
            if (Route::current() && !in_array(Route::current()->getName(), $excludedRoutes)) {
                app(DropDownComposer::class)->compose($view);
            }
        });
    }
}
