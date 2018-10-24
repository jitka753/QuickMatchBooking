<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_events', function (Blueprint $table) {
            $table->increments('id_company_event');
            $table->nullableTimestamps();
            $table->unsignedInteger('id_company');
            $table->unsignedInteger('id_event');
            $table->unsignedInteger('companyEventTimeStart');
            $table->unsignedInteger('companyEventTimeEnd');
            $table->boolean('virtual_meeting');
            $table->string('danish_international', 50);
            $table->string('study_field', 50);
            $table->mediumText('internshipDescription')->nullable();

        });
            //foreign keys
            Schema::table('company_events', function($table) {
            $table->foreign('id_company')->references('id_company')->on('companies');
            $table->foreign('companyEventTimeStart')->references('id_time_slot')->on('time_slots');
            $table->foreign('companyEventTimeEnd')->references('id_time_slot')->on('time_slots');
            $table->foreign('id_event')->references('id_event')->on('events');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_events');
    }
}
