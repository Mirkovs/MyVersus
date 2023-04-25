<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Gps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lugar');
            $table->string('url');
            $table->decimal('gps1', 10,8);
            $table->decimal('gps2', 10,8);
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
        Schema::dropIfExists('Gps');
    }
}
