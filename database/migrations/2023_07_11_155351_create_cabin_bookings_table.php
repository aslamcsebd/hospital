<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabinBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabin_bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->dateTime('check_in')->nullable()->comment('Start day');
            $table->dateTime('check_out')->nullable()->comment('End day');
            $table->string('room_no')->nullable();
            $table->integer('rent')->nullable();
            $table->string('tran_id')->nullable();
            $table->string('card_type')->nullable();            
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
        Schema::dropIfExists('cabin_bookings');
    }
}
