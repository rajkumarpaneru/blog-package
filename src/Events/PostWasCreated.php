<?php

namespace Raajkumarpaneru\BlogPackage\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Raajkumarpaneru\BlogPackage\Models\Post;

class PostWasCreated
{
    use Dispatchable, SerializesModels;

    public $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }
}
