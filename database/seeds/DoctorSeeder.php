<?php

use Illuminate\Database\Seeder;

use App\Doctor;
class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $doctor = new Doctor;
        $doctor->doctor_name = "Reisen";
        $doctor->doctor_email = "reisen@reisen.com";
        $doctor->doctor_phone= "1234567890";
        $doctor->doctor_address = "Moon";
        $doctor->doctor_gender = "female";
        $doctor->specialist_id = "2";
        $doctor->doctor_image = "reisen.png";

        $doctor->save();

        $doctor = new Doctor;
        $doctor->doctor_name = "patchy";
        $doctor->doctor_email = "patchy@patchy.com";
        $doctor->doctor_phone= "1234567890";
        $doctor->doctor_address = "Scarlet Devil Mansion";
        $doctor->specialist_id = "1";
        $doctor->doctor_gender = "female";
        $doctor->doctor_image = "patchy.png";

        $doctor->save();

        $doctor = new Doctor;
        $doctor->doctor_name = "Satori";
        $doctor->doctor_email = "satori@satori.com";
        $doctor->doctor_phone= "1234567890";
        $doctor->doctor_address = "Book?";
        $doctor->specialist_id = "7";
        $doctor->doctor_gender = "female";
        $doctor->doctor_image = "satori.png";

        $doctor->save();

        $doctor = new Doctor;
        $doctor->doctor_name = "Sanae";
        $doctor->doctor_email = "sanae@sanae.com";
        $doctor->doctor_phone= "1234567890";
        $doctor->doctor_address = "Moriya Shrine";
        $doctor->specialist_id = "5";
        $doctor->doctor_gender = "female";
        $doctor->doctor_image = "sanae.png";

        $doctor->save();

        $doctor = new Doctor;
        $doctor->doctor_name = "Yuyuko";
        $doctor->doctor_email = "yuyuko@yuyuko.com";
        $doctor->doctor_phone= "1234567890";
        $doctor->doctor_address = "Hakugokyurou";
        $doctor->specialist_id = "3";
        $doctor->doctor_gender = "female";
        $doctor->doctor_image = "yuyuko.png";

        $doctor->save();
    }
}
