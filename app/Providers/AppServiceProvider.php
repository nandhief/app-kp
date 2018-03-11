<?php

namespace App\Providers;

use Illuminate\Contracts\Validation\Factory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @param Factory $validator
     */
    public function boot(Factory $validator)
    {
        $validator->extend(
            'float',
            function ($attribute, $value, $parameters)
            {
                return preg_match('/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/', $value);
            },
            'The :attribute must be float'
        );
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
