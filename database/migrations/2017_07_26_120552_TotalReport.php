<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TotalReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('total_reports', function (Blueprint $table) 
        {
         $table->increments('id');
         $table->date('date');                  
         $table->integer('type');         
         $table->integer('day');
         $table->integer('night');
         $table->string('chergovy');
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
        Schema::drop('total_reports');
    }
}
