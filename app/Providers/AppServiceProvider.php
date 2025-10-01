<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
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
        // Comparte categories en todas las vistas
        View::share('categories', Category::orderBy('name')->get());

        // Compartir categorías en todas las vistas
        View::composer('partials.footer', function ($view) {
            $view->with('categories', Category::all());
        });
    }
}
