<?php

namespace Aloko\PersianDatepicker;

// use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\ServiceProvider;

class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Laravel\Nova\Nova::serving(function (ServingNova $event) {
        //     Laravel\Nova\Nova::script('persian-datepicker', __DIR__.'/../dist/js/field.js');
        //     Laravel\Nova\Nova::style('persian-datepicker', __DIR__.'/../dist/css/field.css');
        // });
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
