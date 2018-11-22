<?php

namespace App\Providers;

use App\Models\{Column, Version};
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     * @throws \Exception
     */
    public function boot()
    {
        if ($version = request()->cookie('version')) version($version);

        view()->composer('*', function ($view) {
            $view->with(['currentUrl' => currentUrl()]);
        });

        view()->composer(['combiner', 'admin.rates.index', 'admin.units.index'], function($view) {
            $view->with([
                'columns' => Column::orderBy('id', 'asc')->with('rates')->get()
            ]);
        });

        view()->composer(['*.navigation'], function($view) {
            $view->with([
                'versions' => Version::cache(function($version) {
                    return $version->get();
                })
            ]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
