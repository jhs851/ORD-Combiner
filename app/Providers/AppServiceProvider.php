<?php

namespace App\Providers;

use App\Models\{Column, Formula, Unit, Version};
use App\Observers\{FormulaObserver, UnitObserver};
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

        $this->registerViewComposers();

        $this->registerObservers();
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

    protected function registerViewComposers() : void
    {
        view()->composer('*', function($view) {
            $view->with(['currentUrl' => currentUrl()]);
        });

        view()->composer([
            'combiner',
            'admin.rates.index',
            'admin.units.index'
        ], function($view) {
            $view->with([
                'columns' => Column::orderBy('id', 'asc')->with('rates')->get()
            ]);
        });

        view()->composer(['*.navigation', 'layouts.partial.combiner-navigation'], function($view) {
            $view->with([
                'versions' => Version::cache(function($version) {
                    return $version->get();
                })
            ]);
        });
    }

    protected function registerObservers()
    {
        Unit::observe(UnitObserver::class);

        Formula::observe(FormulaObserver::class);
    }
}
