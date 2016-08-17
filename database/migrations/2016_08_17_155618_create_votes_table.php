<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function(Blueprint $votes) {
            $votes->increments('id');
            $votes->integer('user_id')->unsigned();
            $votes->foreign('user_id')->references('id')->on('users');
            $votes->integer('post_id')->unsigned();
            $votes->foreign('post_id')->references('id')->on('posts');
            $votes->integer('vote');
            $votes->timestamps();
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
         Schema::drop('votes');
    }
}
