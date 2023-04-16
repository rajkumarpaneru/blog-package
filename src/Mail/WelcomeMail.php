<?php

namespace Raajkumarpaneru\BlogPackage\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Raajkumarpaneru\BlogPackage\Models\Post;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function build()
    {
        return $this->view('blogpackage::emails.welcome');
    }
}
