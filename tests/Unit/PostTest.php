<?php

namespace JohnDoe\BlogPackage\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Raajkumarpaneru\BlogPackage\Tests\TestCase;
use Raajkumarpaneru\BlogPackage\Models\Post;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_post_has_a_title()
    {
        $post = Post::factory()->create(['title' => 'Fake Title']);
        $this->assertEquals('Fake Title', $post->title);
    }
}
