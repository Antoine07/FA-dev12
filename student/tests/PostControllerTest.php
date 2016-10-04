<?php

use Hash;
use App\User;
use App\Post;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostControllerTest extends TestCase {

    public function setUp() {
        parent::setUp();
    }

    /**
     * @before
     */
    public function runDatabaseMigrations() {
        $this->artisan('migrate', [
                '--path'     => './tests/migrations',
                '--database' => 'sqlite_testing'
        ]);

        User::create([
                        'name'     => 'Tony',
                        'email'    => 'tony@tony.fr',
                        'password' => Hash::make('Tony')]
        );

        $this->beforeApplicationDestroyed(function () {
            $this->artisan('migrate:rollback');
        });

    }

    public function testPostCreate() {
        Post::create([
                'title'        => 'Title test',
                'slug'         => 'title',
                'content'      => 'blabla',
                'published_at' => \Carbon\Carbon::now(),
                'user_id'      => 1
        ]);

        $post = Post::find(1);
        $this->assertEquals($post->title, 'Title test');
        $this->assertEquals($post->user->id, 1);
    }

    public function testUcfirstPost() {
        Post::create([
                'title'   => 'title test',
                'slug'    => 'title',
                'content' => 'blabla',
                'published_at' => \Carbon\Carbon::now(),
        ]);

        $post = Post::find(1);
        $this->assertEquals($post->title, 'Title test');
    }

}
