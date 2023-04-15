<?php

namespace Raajkumarpaneru\BlogPackage\Tests;

use CreatePostsTable;
use Raajkumarpaneru\BlogPackage\BlogPackageServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        // additional setup
    }

    protected function getPackageProviders($app)
    {
        return [
            BlogPackageServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // import the CreatePostsTable class from the migration
        include_once __DIR__ . '/../database/migrations/create_posts_table.php.stub';

        // run the up() method of that migration class
        (new CreatePostsTable)->up();
    }
}
