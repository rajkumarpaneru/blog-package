<?php

namespace Raajkumarapaneru\BlogPackage\Database\Factories;

use Raajkumarpaneru\BlogPackage\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'title' => $this->faker->words(3, true),
            'body' => $this->faker->paragraph,
            'author_id' => 999,
        ];
    }
}

