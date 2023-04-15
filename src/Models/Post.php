<?php

namespace Raajkumarpaneru\BlogPackage\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Raajkumarapaneru\BlogPackage\Database\Factories\PostFactory;

class Post extends Model
{
    use HasFactory;

    // Disable Laravel's mass assignment protection
    protected $guarded = [];

    protected static function newFactory()
    {
        PostFactory::new();
    }

    public function author()
    {
        return $this->morphTo();
    }
}
