<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Hospitals', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('hospital_name');
            $table->string('hospital_address');
            $table->string('hospital_open_hours');
            $table->string('hospital_phone');
            $table->string('hospital_image');
            $table->string('hospital_website');
            $table->string('hospital_email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Hospitals');
    }
}
