<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    //
    protected $table = 'Hospitals';
    protected $fillable = [
        'hospital_name', 'hospital_address', 'hospital_open_hours', 'hospital_phone', 'hospital_image', 'hospital_detail_id', 'hospital_email',
        'hospital_website'
    ];

    public function hospital_detail(){
        return $this->hasMany('App\HospitalDetail', 'hospital_id');
    }
}
