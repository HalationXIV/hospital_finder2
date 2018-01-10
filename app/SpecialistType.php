<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialistType extends Model
{
    //
    protected $table = 'specialist_type';
    protected $fillable = [
        'specialist_name'
    ];

    public function hospital_detail(){
        return $this->belongsTo('App\HospitalDetail', 'specialist_type_id');
    }
}
