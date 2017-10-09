<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ToLate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_to_late', function (Blueprint $table) 
        {
         $table->increments('id');
         $table->date('date');                  
         $table->string('punkt');         
         $table->string('no_card', 10);
         $table->string('adress');
         $table->string('brig');
         $table->string('time');
         $table->string('support');
         $table->string('cause');
         $table->string('call');
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
        Schema::drop('report_to_late');
    }
}
