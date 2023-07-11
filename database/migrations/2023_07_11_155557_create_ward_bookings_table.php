<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWardBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ward_bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->date('check_in')->nullable()->comment('Start day');
            $table->date('check_out')->nullable()->comment('End day');
            $table->string('room_no')->nullable();
            $table->string('ward_no')->nullable();
            $table->integer('rent')->nullable();
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
        Schema::dropIfExists('ward_bookings');
    }
}