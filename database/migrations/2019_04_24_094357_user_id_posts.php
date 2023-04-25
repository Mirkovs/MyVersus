<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserIdPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    //Añadimos a Posts la comlumna "user_id"
    {
        Schema::table('posts', function($table){
            $table->integer('user_id');
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function($table){
            $table->dropColumn('user_id');
        });
    }
}
