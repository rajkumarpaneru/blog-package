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

            // Export the migration
            if (! class_exists('CreatePostsTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_posts_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_posts_table.php'),
                    // you can add any number of migrations here
                ], 'migrations');
            }
        }

    }
}
