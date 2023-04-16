<?php

namespace Raajkumarpaneru\BlogPackage\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Raajkumarpaneru\BlogPackage\Events\PostWasCreated;
use Raajkumarpaneru\BlogPackage\Listeners\UpdatePostTitle;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        PostWasCreated::class => [
            UpdatePostTitle::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
