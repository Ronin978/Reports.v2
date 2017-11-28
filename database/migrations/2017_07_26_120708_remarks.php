<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Remarks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remark', function (Blueprint $table) 
        {
         $table->increments('id');
         $table->date('date'); 
         $table->string('timer', 30);
         $table->string('no_card', 10);
         $table->string('subdiv');
         $table->string('other')->nullable();
         $table->timestamps();
         $table->string('users');
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('remark');
    }
}
