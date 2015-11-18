<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuoteCountersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quote_counters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ship_id', 15);
            $table->string('lang', 5);
            $table->integer('accepted');
            $table->integer('pending');
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
        Schema::drop('quote_counters');
    }
}
