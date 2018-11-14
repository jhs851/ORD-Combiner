<?php

namespace App\Providers;

use App\Models\Column;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['combiner', 'admin.rates.index', 'admin.units.index'], function($view) {
            $view->with([
                'columns' => Column::cache(function($column) {
                    return $column->orderBy('id', 'asc')->with('rates')->get();
                })]
            );
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
