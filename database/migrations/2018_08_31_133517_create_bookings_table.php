<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id_booking');
            $table->unsignedInteger('id_event');
            $table->unsignedInteger('id_company');
            $table->unsignedInteger('id_time_slot');
            $table->unsignedInteger('id_student')->nullable();
            $table->timestamps();
        });
            //foreign keys
        Schema::table('bookings', function($table) {
            $table->foreign('id_event')->references('id_event')->on('events');
            $table->foreign('id_company')->references('id_company')->on('companies');
            $table->foreign('id_time_slot')->references('id_time_slot')->on('time_slots');
            $table->foreign('id_student')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
