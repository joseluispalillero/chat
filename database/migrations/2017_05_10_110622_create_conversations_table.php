<?php

use Illuminate\Database\Migrations\Migration;

class CreateConversationsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('Conversations', function ($tbl) {
            $tbl->increments('id');
            $tbl->integer('user_one');
            $tbl->integer('user_two');
            $tbl->boolean('status');
            $tbl->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('Conversations');
    }
}
