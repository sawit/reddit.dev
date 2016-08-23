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
        Schema::create('posts', function(Blueprint $posts) {
            $posts->increments('id');
            $posts->string('title', 100);
            $posts->string('url');
            $posts->longText('content');
            $posts->integer('created_by')->unsigned();
            $posts->foreign('created_by')
                ->references('id')
                ->on('users');
            $posts->timestamps();
            $posts->softDeletes();
        });
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
