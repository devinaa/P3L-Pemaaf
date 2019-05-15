<?php

namespace App\Providers;
use Validator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
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
        //  Schema::defaultStringLength(191);
        //  Validator::extend('phone_number', function($attribute, $value, $parameters)
        // {
        //     return substr($value, 0, 2) == '08';
        // });
    }
}
