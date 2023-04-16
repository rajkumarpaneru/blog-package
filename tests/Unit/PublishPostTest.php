<?php

namespace Raajkumarpaneru\BlogPackage\Tests\Unit;

use Illuminate\Support\Facades\Bus;
use Raajkumarpaneru\BlogPackage\Jobs\PublishPost;
use Raajkumarpaneru\BlogPackage\Models\Post;
use Raajkumarpaneru\BlogPackage\Tests\TestCase;

class PublishPostTest extends TestCase
{
    /** @test */
    public function it_publishes_a_post()
    {
        Bus::fake();

        $post = Post::factory()->create();

        $this->assertNull($post->published_at);

        PublishPost::dispatch($post);

        Bus::assertDispatched(PublishPost::class, function ($job) use ($post) {
            return $job->post->id === $post->id;
        });
    }
}
