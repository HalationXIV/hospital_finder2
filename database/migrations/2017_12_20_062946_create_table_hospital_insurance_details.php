<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHospitalInsuranceDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_insurance_details', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('hospital_id');
            $table->string('insurance_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hospital_insurance_details');
    }
}
