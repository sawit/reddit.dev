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
        Schema::create('contacts', function(Blueprint $votes)) {
            $votes->increments('id');
            $votes->string('title');
            $votes->string('url')->nullable();
            $votes->longText('content');
            $votes->string('created_by');
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
