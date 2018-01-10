<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDoctors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('doctor_name');
            $table->string('doctor_email');
            $table->string('doctor_phone');
            $table->string('doctor_address');
            $table->string('specialist_id');
            $table->string('doctor_gender');
            $table->string('doctor_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('doctors');
    }
}
