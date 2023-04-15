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
        include_once __DIR__ . '/../database/migrations/create_posts_table.php.stub';
        include_once __DIR__ . '/../database/migrations/create_users_table.php.stub';

        // run the up() method (perform the migration)
        (new \CreatePostsTable)->up();
        (new \CreateUsersTable)->up();
    }
}
