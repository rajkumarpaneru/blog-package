<?php

namespace Raajkumarpaneru\BlogPackage\Listeners;

use Raajkumarpaneru\BlogPackage\Events\PostWasCreated;

class UpdatePostTitle
{
    public function handle(PostWasCreated $event)
    {
        $event->post->update([
            'title' => 'New: ' . $event->post->title
        ]);
    }
}
