<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use App\Hospital;
use App\SpecialistType;
use App\HospitalDetail;
use App\Doctor;
use PhpParser\Comment\Doc;
use Illuminate\Support\Facades\DB;
class HospitalController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $hospitals = Hospital::paginate(5);
        $doctors = DB::table('doctors', 'specialist_type')->join('specialist_type', 'doctors.specialist_id', '=', 'specialist_type.id')
            ->get(array(
                'doctors.id',
                'doctor_name',
                'doctor_email',
                'doctor_phone',
                'doctor_address',
                'doctor_image',
                'specialist_name'
            ));
        return view('admin.manageHospital', compact('hospitals', 'doctors'));
    }

    public function addHospital(Request $request){
        $valid = Validator::make($request->all(), [
            'hospital_name'=>'required|min:5|unique:hospitals,hospital_name',
            'hospital_address'=>'required',
            'hospital_phone'=>'required',
            'hospital_image'=>'required|image',
            'hospital_email'=>'required',
            'hospital_open_hours'=>'required',
        ]);

        if($valid->passes()){
            $file = $request->file('hospital_image');
            $file->move(base_path('public/hospital_images'), $file->getClientOriginalName());

            $hospital = new Hospital;
            $hospital->hospital_name = $request['hospital_name'];
            $hospital->hospital_address = $request['hospital_address'];
            $hospital->hospital_phone = $request['hospital_phone'];
            $hospital->hospital_open_hours = $request['hospital_open_hours'];
            $hospital->hospital_website = $request['hospital_website'];
            $hospital->hospital_email = $request['hospital_email'];
            $hospital->hospital_image = $file->getClientOriginalName();
            $hospital->save();

            return redirect('/manageHospital');
        } else{
            $hospitals = Hospital::paginate(5);
            $doctors = DB::table('doctors', 'specialist_type')->join('specialist_type', 'doctors.specialist_id', '=', 'specialist_type.id')
                ->get(array(
                    'doctors.id',
                    'doctor_name',
                    'doctor_email',
                    'doctor_phone',
                    'doctor_address',
                    'doctor_image',
                    'specialist_name'
                ));
            $errors = array('errors'=>$valid->errors());

            return view('admin.manageHospital')->with([
                'errors' => $valid->errors()
            ])->with(['hospitals' => $hospitals])->with(['doctors'=>$doctors]);
        }
    }

    public function updateHospitalPage(Request $request){
        $hospital = Hospital::find($request->id);

        return view('admin.updateHospitals', compact('hospital'));
    }

    public function updateHospital(Request $request){
        $valid = Validator::make($request->all(), [
            'hospital_name'=>'required|min:5|unique:hospitals,hospital_name',
            'hospital_address'=>'required',
            'hospital_phone'=>'required',
            'hospital_image'=>'required|image',
            'hospital_open_hours'=>'required',
            'hospital_website'=>'required',
            'hospital_email'=>'required'
        ]);

        $hospital = Hospital::find($request->id);

        if($valid->passes()){
            $file = $request->file('hospital_image');
            $file->move(base_path('public/hospital_images'), $file->getClientOriginalName());

            $hospital->hospital_name = $request['hospital_name'];
            $hospital->hospital_address = $request['hospital_address'];
            $hospital->hospital_phone = $request['hospital_phone'];
            $hospital->hospital_open_hours = $request['hospital_open_hours'];
            $hospital->hospital_website = $request['hospital_website'];
            $hospital->hospital_email = $request['hospital_email'];
            $hospital->hospital_image = $file->getClientOriginalName();

            $hospital->save();

            return redirect('/manageHospital');
        } else{
            return view('admin.updateHospitals')->with([
                'errors' => $valid->errors()
            ])->with(['hospital' => $hospital]);
        }
    }

    public function deleteHospital(Request $request){
        $hospital = Hospital::find($request->id);
        DB::table('hospital_detail')->where('hospital_detail.hospital_id', '=', $hospital->id)->delete();
        DB::table('hospital_insurance_details')->where('hospital_insurance_details.hospital_id', '=', $hospital->id)->delete();

        $hospital->delete();

        return redirect('/manageHospital');
    }
}
