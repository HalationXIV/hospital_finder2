<?php

use Illuminate\Database\Seeder;
use App\Insurance;
use App\HospitalInsurance;

class InsuranceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $insurance = new Insurance;

        $insurance->insurance_name = "Prudential";
        $insurance->insurance_phone = "123456789";
        $insurance->insurance_email = "prudential@prudential.com";
        $insurance->insurance_address = "123 street";
        $insurance->insurance_image = "prudential.jpg";
        $insurance->insurance_website = "prudential.com";
        $insurance->save();

        $insurance = new Insurance;

        $insurance->insurance_name = "CAR";
        $insurance->insurance_phone = "123456789";
        $insurance->insurance_email = "car@car.com";
        $insurance->insurance_address = "12345 street";
        $insurance->insurance_image = "car.jpg";
        $insurance->insurance_website = "car.com";
        $insurance->save();

        $insurance = new Insurance;

        $insurance->insurance_name = "Hakurei";
        $insurance->insurance_phone = "123456789";
        $insurance->insurance_email = "hakurei@hakurei.com";
        $insurance->insurance_address = "genskoyo street";
        $insurance->insurance_image = "hakurei.jpg";
        $insurance->insurance_website = "hakurei.com";
        $insurance->save();

        $hospital_insurance = new HospitalInsurance;

        $hospital_insurance->hospital_id = "1";
        $hospital_insurance->insurance_id = "1";
        $hospital_insurance->save();

        $hospital_insurance = new HospitalInsurance;

        $hospital_insurance->hospital_id = "1";
        $hospital_insurance->insurance_id = "2";
        $hospital_insurance->save();

        $hospital_insurance = new HospitalInsurance;

        $hospital_insurance->hospital_id = "2";
        $hospital_insurance->insurance_id = "3";
        $hospital_insurance->save();

        $hospital_insurance = new HospitalInsurance;

        $hospital_insurance->hospital_id = "2";
        $hospital_insurance->insurance_id = "2";
        $hospital_insurance->save();

    }
}
