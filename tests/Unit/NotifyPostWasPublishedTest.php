<?php

namespace Raajkumarpaneru\BlogPackage\Tests\Unit;

use Illuminate\Support\Facades\Notification;
use Raajkumarpaneru\BlogPackage\Models\Post;
use Raajkumarpaneru\BlogPackage\Notifications\PostWasPublishedNotification;
use Raajkumarpaneru\BlogPackage\Tests\TestCase;
use Raajkumarpaneru\BlogPackage\Tests\User;

//class NotifyPostWasPublishedTest extends TestCase
class NotifyPostWasPublishedTest
{
    /** @test */
    public function it_can_notify_a_user_that_a_post_was_published()
    {
        Notification::fake();

        $post = Post::factory()->create();

        // the User model has the 'Notifiable' trait
        $user = User::factory()->create();

        Notification::assertNothingSent();

        $user->notify(new PostWasPublishedNotification($post));

        Notification::assertSentTo(
            $user,
            PostWasPublishedNotification::class,
            function ($notification) use ($post) {
                return $notification->post->id === $post->id;
            }
        );
    }
}
