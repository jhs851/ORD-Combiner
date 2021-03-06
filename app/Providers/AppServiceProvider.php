<?php

namespace App\Providers;

use App\Models\{Avatar, Column, Formula, Unit, Version};
use App\Observers\{AvatarObserver, FormulaObserver, UnitObserver, VersionObserver};
use Carbon\Carbon;
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

        $this->setCarbonLocaleWithTimezone();

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

        view()->composer('*.navigation', function($view) {
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

        Version::observe(VersionObserver::class);

        Avatar::observe(AvatarObserver::class);
    }

    protected function setCarbonLocaleWithTimezone()
    {
        Carbon::setLocale('ko');

        date_default_timezone_set('Asia/Seoul');
    }
}
