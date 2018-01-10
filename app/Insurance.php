<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    //
    protected $table = 'insurances';
    protected $fillable = [
        'insurance_name', 'insurance_email','insurance_phone', 'insurance_address', 'insurance_image', 'insurance_website'
    ];
}
