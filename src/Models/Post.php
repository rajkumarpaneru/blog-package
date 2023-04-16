<?php

namespace Raajkumarpaneru\BlogPackage\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function author()
    {
        return $this->morphTo();
    }

    protected static function newFactory()
    {
        return \Raajkumarpaneru\BlogPackage\Database\Factories\PostFactory::new();
    }
}
