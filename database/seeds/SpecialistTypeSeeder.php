<?php

use Illuminate\Database\Seeder;

Use App\SpecialistType;

class SpecialistTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $specialistType = new SpecialistType;
        $specialistType->specialist_name = 'Spesialis Anak';
        $specialistType->save();

        $specialistType = new SpecialistType;
        $specialistType->specialist_name = 'Dokter Umum';
        $specialistType->save();

        $specialistType = new SpecialistType;
        $specialistType->specialist_name = 'Spesialis Telinga Hidung Tenggorokan(THT)';
        $specialistType->save();

        $specialistType = new SpecialistType;
        $specialistType->specialist_name = 'Spesialis Bedah';
        $specialistType->save();

        $specialistType = new SpecialistType;
        $specialistType->specialist_name = 'Spesialis Bedah Saraf';
        $specialistType->save();

        $specialistType = new SpecialistType;
        $specialistType->specialist_name = 'Spesialis Jantung dan Pembuluh Darah';
        $specialistType->save();

        $specialistType = new SpecialistType;
        $specialistType->specialist_name = 'Spesialis Mata';
        $specialistType->save();

        $specialistType = new SpecialistType;
        $specialistType->specialist_name = 'Spesialis Penyakit Dalam';
        $specialistType->save();

        $specialistType = new SpecialistType;
        $specialistType->specialist_name = 'Spesialis Saraf';
        $specialistType->save();

        $specialistType = new SpecialistType;
        $specialistType->specialist_name = 'Spesialis Kedokteran Jiwa atau Psikiatri';
        $specialistType->save();

        $specialistType = new SpecialistType;
        $specialistType->specialist_name = 'Dokter Kandungan';
        $specialistType->save();

    }
}
