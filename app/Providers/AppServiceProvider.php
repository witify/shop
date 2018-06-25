<?php

namespace App\Providers;

use Breadcrumbs;
use Illuminate\Support\ServiceProvider;
use App\Breadcrumbs\BreadcrumbsGenerator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Breadcrumbs::macro('resource', function (string $prefix, string $modelClass, $label) {
            BreadcrumbsGenerator::resource($prefix, $modelClass, $label);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('shopViewComposer', 'App\ViewComposers\ShopViewComposer');
    }
}
