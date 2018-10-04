<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribers', function ( $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->integer('line_id')->unsigned();
            $table->foreign('line_id')->references('id')->on('lines');
            $table->integer('broadcaster_id')->unsigned();
            $table->foreign('broadcaster_id')->references('id')->on('broadcasters');
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
        Schema::dropIfExists('subscribers');
    }
}
