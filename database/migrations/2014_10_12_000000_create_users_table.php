<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('email', 64)->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('studentLastName', 30);
            $table->string('studentMobile', 30)->nullable();
            $table->string('studyProgram', 50);
            $table->mediumText('studentDescription');
            $table->string('studentPortfolioLink', 128)->nullable();
            $table->unsignedInteger('status')->nullable();
        });

        //Schema::rename('users', 'students');
    }
    //gfgfgfg

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
