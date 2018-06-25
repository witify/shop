<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class ValidationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /** Register all custom validations **/
        Validator::extend('is_current_password', 'App\Validations\CustomValidations@isCurrentPassword');
        Validator::extend('is_own_model', 'App\Validations\CustomValidations@isOwnModel');
        Validator::extend('unique_json', 'App\Validations\CustomValidations@isUniqueJson');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
