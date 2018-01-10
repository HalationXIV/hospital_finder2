<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalInsurance extends Model
{
    //
    protected $table = 'hospital_insurance_details';

    protected $fillable = [
        'hospital_id', 'insurance_id'
    ];
}
