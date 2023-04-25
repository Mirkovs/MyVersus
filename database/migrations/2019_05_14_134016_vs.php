<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('users1');
            $table->string('users2')->nullable();
            $table->string('users3')->nullable();
            $table->string('users4');
            $table->string('gps_vs');
            $table->date('date_vs');
            $table->time('time_vs');
            $table->string('text');
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
        Schema::dropIfExists('vs');
    }
}
