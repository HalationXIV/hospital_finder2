<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableInsurances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurances', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('insurance_name');
            $table->string('insurance_phone');
            $table->string('insurance_email');
            $table->string('insurance_address');
            $table->string('insurance_image');
            $table->string('insurance_website');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('insurances');
    }
}
