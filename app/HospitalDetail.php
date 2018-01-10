<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalDetail extends Model
{
    //
    protected $table = 'hospital_detail';
    protected $fillable = [
        'desc', 'hospital_id', 'specialist_type_id', 'created_at', 'updated_at'];

    public function hospital(){
        return $this->belongsTo('App\Hospital', 'hospital_id');
    }

    public function specialist_type(){
        return $this->hasMany('App\SpecialistType', 'specialist_type_id');
    }

}
