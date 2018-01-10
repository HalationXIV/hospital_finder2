<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Hospital;
use App\Insurance;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\HospitalInsurance;
use App\HospitalDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class MappingController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('admin');
    }

    //mapping hospital with available doctor
    public function mapHospitalDoctorAvailable($id){
        $hospital = Hospital::find($id);

        $activated = $hospital->id;

        $doctors = DB::select('Select distinct
                                  doctors.id, doctors.doctor_name, doctors.doctor_email, doctors.doctor_phone, specialist_type.specialist_name
                                  from doctors join specialist_type
                                  on doctors.specialist_id = specialist_type.id
                                  where doctors.id not in (select b.id from hospital_detail a
                                                            join doctors b on a.doctor_id = b.id 
                                                            where a.hospital_id = :param)
                                 ', ['param'=>$activated, ]);
        return view('admin.mapHospitalDoctor', compact('doctors', 'hospital'));
    }

    //add doctor and hospital available mapping
    public function addHospitalDoctorAvailableMapping($idHospital, Request $request){
        $hospital = Hospital::find($idHospital);

//        $valid = Validator::make($request->all(),[
//            'practice_hours[]'=>'required'
//        ]);

        //if($valid->passes()){
            $practice_hours = array_filter($request['practice_hours']);
            //dd($request->all());
            foreach (array_combine($practice_hours, $request['doctor_list']) as $d1 => $d2){
                $hospital_detail = new HospitalDetail;
                $hospital_detail->hospital_id = $hospital->id;
                $hospital_detail->practice_hours = $d1;
                $hospital_detail->doctor_id = $d2;
                $hospital_detail->save();
            }
            return redirect('manageHospital');
        //} else{
            //dd($request->all());
//            $activated = $hospital->id;
//
//            $doctors = DB::select('Select distinct
//                                  doctors.id, doctors.doctor_name, doctors.doctor_email, doctors.doctor_phone, specialist_type.specialist_name
//                                  from doctors join specialist_type
//                                  on doctors.specialist_id = specialist_type.id
//                                  where doctors.id not in (select b.id from hospital_detail a
//                                                            join doctors b on a.doctor_id = b.id
//                                                            where a.hospital_id = :param)
//                                 ', ['param'=>$activated, ]);
//            return view('admin.mapHospitalDoctor', compact('doctors', 'hospital'));
        //}

    }

    //update doctors that have been mapped with hospital
    public function editMappedDoctors($id, Request $request){
        $hospital = Hospital::find($id);

        $activated = $hospital->id;

        $doctors = DB::select('Select distinct
                                  hospital_detail.id as transaction_id, hospital_Detail.practice_hours, doctors.id, doctors.doctor_name, doctors.doctor_email, doctors.doctor_phone, specialist_type.specialist_name
                                  from doctors join specialist_type
                                  on doctors.specialist_id = specialist_type.id
                                  join hospital_detail
                                  on doctors.id =hospital_detail.doctor_id
                                  join hospitals
                                  on hospitals.id = hospital_detail.hospital_id
                                  where hospital_detail.hospital_id = :param 
                                 ', ['param'=>$id]);

        return view('admin.updateMappedDoctors', compact('hospital', 'doctors'));
    }


    //delete existing hospital and doctor mapping
    public function deleteHospitalDoctorMapping($idTransaction, Request $request){
        $hospital_detail = HospitalDetail::find($idTransaction);

        $hospital_detail->delete();

        return redirect()->back();
        //return redirect('manageHospital');
    }

    //update existing hospital and doctor mapping
    public function updateHospitalDoctorMapping($idHospital, $idTransaction, Request $request){
        $hospital_detail = HospitalDetail::find($idTransaction);

        foreach ($request['practice_hours'] as $practice_hour){
            $hospital_detail->practice_hours = $practice_hour;
        }
        $hospital_detail->save();

        return redirect()->back();
    }

    //mapping hospital with available insurance
    public function mapHospitalInsuranceAvailable($id){
        $hospital = Hospital::find($id);

        $hospital_insuraces = DB::select('select a.id, a.insurance_name, a.insurance_email, a.insurance_phone, a.insurance_address
                                          from insurances a 
                                          where a.id not in (select b.id from hospital_insurance_details a
                                                            join insurances b on a.insurance_id = b.id 
                                                            where a.hospital_id = :param)',
            ['param'=>$id,]);

        return view('admin.mapHospitalInsurance', compact('hospital', 'hospital_insuraces'));
    }

    //add hospital and available insurance mapping
    public function addHospitalInsuranceAvailableMapping($idHospital, Request $request){
        $hospital = Hospital::find($idHospital);
        foreach ($request['insurance_list'] as $insurance){
            $hospital_insurance = new HospitalInsurance;
            $hospital_insurance->hospital_id = $hospital->id;
            $hospital_insurance->insurance_id = $insurance;
            $hospital_insurance->save();
        }
        return redirect()->back();
        //return redirect('manageHospital');
    }

    //update existing hospital and insurance mapping
    public function editMappedInsurances($id, Request $request){
        $hospital = Hospital::find($id);

        $insurances = DB::select('Select distinct
                                  hospital_insurance_details.id as transaction_id, insurances.id as insurance_id, insurances.insurance_name, insurances.insurance_phone, 
                                  insurances.insurance_email, insurances.insurance_address
                                  from insurances
                                  join hospital_insurance_details
                                  on insurances.id =hospital_insurance_details.insurance_id
                                  join hospitals
                                  on hospitals.id = hospital_insurance_details.hospital_id
                                  where hospital_insurance_details.hospital_id = :param', ['param'=>$id]);
        return view('admin.updateMappedInsurances', compact('hospital', 'insurances'));
    }

    //delete existing hospital and insurance mapping
    public function deleteHospitalInsuranceMapping($idTransaction, Request $request){
        $hospital_insurance = HospitalInsurance::find($idTransaction);
        $hospital_insurance->delete();

        return redirect()->back();
        return redirect('manageHospital');
    }


}
