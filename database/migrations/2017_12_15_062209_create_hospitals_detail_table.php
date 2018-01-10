<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalsDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('hospital_id');
            $table->string('doctor_id');
            $table->string('practice_hours');
            $table->string('desc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hospital_detail');
    }
}
