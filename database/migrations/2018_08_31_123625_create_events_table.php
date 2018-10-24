<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id_event');
            $table->timestamps();
            $table->string('eventName', 70);
            $table->string('eventAddress', 100);
            $table->date('eventDate');
            $table->mediumText('eventDescription');
            $table->string('eventWebLink', 100);
            $table->unsignedInteger('eventTimeStart');
            $table->unsignedInteger('eventTimeEnd')->nullable();
            //event responsible person
            $table->string('eventResPerson', 100);
            //responsible person phone
            $table->string('eventPhoneRP')->nullable();
            $table->string('eventEmailRP', 64);
            $table->unsignedInteger('timeSlotDuration')->nullable();
        });
            //foreign keys
            Schema::table('events', function($table) {
                $table->foreign('eventTimeStart')->references('id_time_slot')->on('time_slots');
                $table->foreign('eventTimeEnd')->references('id_time_slot')->on('time_slots');

                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
