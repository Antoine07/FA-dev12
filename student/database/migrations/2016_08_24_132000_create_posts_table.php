<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->unsignedInteger('category_id')->nullable();
            $table->text('content');
            $table->string('author', 100);
            $table->dateTime('published_at');
            $table->enum('status', ['published', 'unpublished', 'draft']);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('SET NULL');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
