<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Gks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_gks', function (Blueprint $table) 
        {
         $table->increments('id');
         $table->date('date'); 
         $table->string('timer', 20);
         $table->string('no_card', 10); 
         $table->string('adress');
         $table->string('viddil');
         $table->string('pib');
         $table->integer('age');
         $table->string('diagnoz');
         $table->string('brig');
         $table->string('tromb');
         $table->string('stent');
         $table->string('gospital');
         $table->string('support');
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
        Schema::drop('report_gks');
    }
}
