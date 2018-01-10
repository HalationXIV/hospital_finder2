<?php

use Illuminate\Database\Seeder;
use App\Hospital;
use App\HospitalDetail;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $hospital = new Hospital;
        $hospital->hospital_name = 'Padoru hospital';
        $hospital->hospital_address = 'Gensokyo';
        $hospital->hospital_open_hours = '24 hours everyday';
        $hospital->hospital_phone = '(021) 25677888';
        $hospital->hospital_image = 'padoru1_hospital.png';
        $hospital->hospital_website = 'padoru.com';
        $hospital->hospital_email = 'padoru@padoru.com';
        $hospital->save();;

        $hospital = new Hospital;
        $hospital->hospital_name = 'Myon hospital';
        $hospital->hospital_address = 'Hakugokyurou';
        $hospital->hospital_open_hours = '24 hours everyday';
        $hospital->hospital_phone = '(021) 12345678';
        $hospital->hospital_website = 'myon.com';
        $hospital->hospital_email = 'myon@myon2.com';
        $hospital->hospital_image = 'myon1_hospital.png';

        $hospital->save();

        //hospital detail
        $hospital_detail = new HospitalDetail;
        $hospital_detail->hospital_id = '1';
        $hospital_detail->doctor_id = '1';
        $hospital_detail->practice_hours = '06.00 - 08.00';
        $hospital_detail->desc = 'test1';

        $hospital_detail->save();

        $hospital_detail = new HospitalDetail;
        $hospital_detail->hospital_id = '1';
        $hospital_detail->doctor_id = '2';
        $hospital_detail->practice_hours = '08.00 - 10.00';
        $hospital_detail->desc = 'test2';

        $hospital_detail->save();

        $hospital_detail = new HospitalDetail;
        $hospital_detail->hospital_id = '1';
        $hospital_detail->doctor_id = '3';
        $hospital_detail->practice_hours = '10.00 - 12.00';
        $hospital_detail->desc = 'test3';

        $hospital_detail->save();

        $hospital_detail = new HospitalDetail;
        $hospital_detail->hospital_id = '2';
        $hospital_detail->doctor_id = '5';
        $hospital_detail->practice_hours = '08.00 - 18.00';
        $hospital_detail->desc = 'test6';

        $hospital_detail->save();

        $hospital_detail = new HospitalDetail;
        $hospital_detail->hospital_id = '2';
        $hospital_detail->doctor_id = '4';
        $hospital_detail->practice_hours = '08.00 - 10.00';
        $hospital_detail->desc = 'test6';

        $hospital_detail->save();

        $hospital_detail = new HospitalDetail;
        $hospital_detail->hospital_id = '2';
        $hospital_detail->doctor_id = '3';
        $hospital_detail->practice_hours = '18.00 - 20.00';
        $hospital_detail->desc = 'test7';

        $hospital_detail->save();

    }
}
