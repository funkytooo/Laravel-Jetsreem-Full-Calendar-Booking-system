<?php
  
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
  
class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
           
        
                $table->increments('id');
                $table->string('service');
                $table->dateTime('start');
                $table->dateTime('end');
                $table->string('name');
                $table->integer('phone');
                $table->string('email');
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
        Schema::dropIfExists('booking');
    }
}