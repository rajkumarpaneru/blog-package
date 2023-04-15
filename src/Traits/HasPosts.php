<?php

namespace Raajkumarpaneru\BlogPackage\Traits;

use Raajkumarpaneru\BlogPackage\Models\Post;

trait HasPosts
{
    public function posts()
    {
        return $this->morphMany(Post::class, 'author');
    }
}
