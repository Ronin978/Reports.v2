<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Transfer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_transfer', function (Blueprint $table) 
        {
         $table->increments('id');
         $table->date('date');                  
         $table->string('timer', 20);                  
         $table->string('no_card', 10);         
         $table->string('pib');
         $table->string('at');
         $table->string('from');
         $table->string('direct');
         $table->string('who_direct');
         $table->string('diagnoz');
         $table->string('brig');
         $table->string('other')->nullable();
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
        Schema::drop('report_transfer');
    }
}
