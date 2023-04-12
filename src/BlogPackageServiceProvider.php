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
        // Register the command if we are using the application via the CLI
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallBlogPackage::class,
            ]);
        }
    }
}
