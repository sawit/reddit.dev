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
        Schema::create('posts', function(Blueprint $posts)) {
            $posts->increments('id');
            $posts->string('title', 100);
            $posts->string('url')->nullable();
            $posts->longText('content');
            $posts->foreign('created_by')->references('users');
            $posts->timestamps();
        }
        //
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
