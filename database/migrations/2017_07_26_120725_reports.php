<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Reports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) 
        {
         $table->increments('id');
         $table->string('pidtype');
         $table->date('date'); 
         $table->string('timer', 20);                 
         $table->string('title');         
         $table->string('adress');
         $table->string('pib');
         $table->string('no_card', 10);
         $table->string('brig');
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
        Schema::drop('reports');
    }
}
