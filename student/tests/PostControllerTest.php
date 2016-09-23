<?php

use App\Post;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostControllerTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();
    }
    /**
     * @before
     */
    public function runDatabaseMigrations()
    {
        $this->artisan('migrate', [
                '--path' => './tests/migrations',
        ]);
        Post::create([
                'id' => 1,
                'title' => 'test product',

        ]);
        Post::create([
                'id' => 2,

        ]);

        $this->beforeApplicationDestroyed(function () {
            $this->artisan('migrate:rollback');
        });
    }

    public function testPostCreate()
    {
        var_dump(Post::find(1)->title);
    }
}
