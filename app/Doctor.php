<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //
    protected $table = 'doctors';

    protected $fillable = [
      'doctor_name', 'doctor_address', 'doctor_phone', 'doctor_email', 'specialist_id', 'doctor_gender'
    ];

}
