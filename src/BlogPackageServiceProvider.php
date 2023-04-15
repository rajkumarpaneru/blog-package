<?php

namespace Raajkumarpaneru\BlogPackage;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Raajkumarpaneru\BlogPackage\Console\InstallBlogPackage;
use Raajkumarpaneru\BlogPackage\View\Components\Alert;

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

            // Publish views
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/blogpackage'),
            ], 'views');

            // Publish view components
            $this->publishes([
                __DIR__.'/../src/View/Components/' => app_path('View/Components'),
                __DIR__.'/../resources/views/components/' => resource_path('views/components'),
            ], 'view-components');

            // Publish assets
            $this->publishes([
                __DIR__.'/../resources/assets' => public_path('blogpackage'),
            ], 'assets');

            // Export the migration
            if (! class_exists('CreatePostsTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_posts_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_posts_table.php'),
                    // you can add any number of migrations here
                ], 'migrations');
            }
        }

        $this->registerRoutes();

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'blogpackage');
        $this->loadViewComponentsAs('blogpackage', [
            Alert::class,
        ]);
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
    }

    protected function routeConfiguration()
    {
        return [
            'prefix' => config('blogpackage.prefix'),
            'middleware' => config('blogpackage.middleware'),
        ];
    }
}
