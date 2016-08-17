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
        Schema::create('votes', function(Blueprint $votes)) {
            $votes->increments('id');
            $votes->foreign('user_id')->references('users')->unsigned();
            $votes->foreign('post_id')->references('posts');
            $votes->integer('vote');
            $votes->timestamps();
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
         Schema::drop('votes');
    }
}
