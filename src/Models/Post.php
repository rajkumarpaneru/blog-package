<?php

namespace Raajkumarpaneru\BlogPackage\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Disable Laravel's mass assignment protection
    protected $guarded = [];
}
