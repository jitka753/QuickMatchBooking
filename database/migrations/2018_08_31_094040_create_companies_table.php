<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id_company');
            $table->timestamps();
            $table->string('companyName', 50);
            $table->string('companyEmail', 64)->unique();
            $table->string('companyPhone', 17);
            $table->string('companyMobile', 17);
            $table->string('companyAddress', 100);
            $table->mediumText('companyDescription');
            $table->string('companyWebLink', 50)->nullable();
            $table->string('password', 50)->nullable();
            $table->string('companyResPerson', 70);
            //responsible person phone
            $table->string('companyPhoneRP', 13);
            //responsible person email
            $table->string('companyEmailRP', 64);
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
