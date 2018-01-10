<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(SpecialistTypeSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(HospitalSeeder::class);
        $this->call(DoctorSeeder::class);
        $this->call(InsuranceSeeder::class);
    }
}
