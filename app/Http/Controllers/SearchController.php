<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\SpecialistType;
use App\Hospital;
class SearchController extends Controller
{
    //


    public function index(){
        $specialist_types = SpecialistType::all();
        $hospitals = Hospital::all();
        return view('search', compact('specialist_types', 'hospitals'));
    }

    //search hospital by specialist type
    public function search(Request $request){
        $specialist_types = SpecialistType::all();

        //display all hospital if the specialist type request is empty
        if($request['specialist_type'] == []){
            $specialist_types = SpecialistType::all();
            $hospitals = Hospital::all();
            return view('search', compact('specialist_types', 'hospitals'));
        } else{
            $hospitals = DB::table('hospitals')
                ->join('hospital_detail', 'hospitals.id', '=', 'hospital_detail.hospital_id')
                ->join('doctors', 'hospital_detail.doctor_id', '=', 'doctors.id')
                ->join('specialist_type', 'specialist_type.id', '=', 'doctors.specialist_id')
                ->whereIn('doctors.specialist_id', $request['specialist_type'])
                ->get(
                    [   'id'=>'hospitals.id',
                        'hospital_name'=>'hospitals.hospital_name',
                        'hospital_image'=>'hospitals.hospital_image',
                        'hospital_address'=>'hospitals.hospital_address',
                        'hospital_open_hours'=>'hospitals.hospital_open_hours',
                        'hospital_phone'=>'hospitals.hospital_phone',
                        'hospital_email'=>'hospitals.hospital_email',
                        'hospital_website'=>'hospitals.hospital_website'
                    ]);
            //dd($hospitals);
            return view('search', compact('specialist_types', 'hospitals'));
        }

    }

    //go to hospital detail page
    public function hospital_detail($id){
        $hospital = Hospital::find($id);
        $doctors = DB::table('hospitals')
            ->join('hospital_detail', 'hospitals.id', '=', 'hospital_detail.hospital_id')
            ->join('doctors', 'hospital_detail.doctor_id', '=', 'doctors.id')
            ->join('specialist_type', 'specialist_type.id', '=', 'doctors.specialist_id')
            ->where('hospitals.id', $id)
            ->get();

        //dd($doctors);

        $insurances = DB::table('insurances')
            ->join('hospital_insurance_details', 'insurances.id', '=', 'hospital_insurance_details.insurance_id')
            ->where('hospital_insurance_details.hospital_id', '=', $id)
            ->get();

       // dd($insurances);
        return view('hospitalDetails', compact('hospital', 'doctors', 'insurances'));

    }

}
