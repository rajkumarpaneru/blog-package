<?php

namespace Raajkumarpaneru\BlogPackage;

use Illuminate\Support\ServiceProvider;
use Raajkumarpaneru\BlogPackage\Console\InstallBlogPackage;

class BlogPackageServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'blogpackage');
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallBlogPackage::class,
            ]);

            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('blogpackage.php'),
            ], 'config');
        }

    }
}
