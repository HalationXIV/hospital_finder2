<?php

namespace App\Http\Controllers;

//use Dotenv\Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Doctor;
use App\SpecialistType;
use PhpParser\Comment\Doc;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){

        $specialist_types = SpecialistType::all();

        $doctors = DB::table('doctors')->paginate(4);
        $doctor_specialist = DB::table('specialist_type')->join('doctors', 'doctors.specialist_id', '=', 'specialist_type.id')->get();

        return view('admin.manageDoctor', compact('specialist_types', 'doctors', 'doctor_specialist'));
    }

    public function addDoctor(Request $request){
        $valid = Validator::make($request->all(), [
            'doctor_name' => 'required',
            'doctor_email'=>'required',
            'doctor_gender'=>'required',
            'doctor_address' => 'required',
            'doctor_phone'=>'required',
            'specialist_type'=>'required|notIn:0',
            'doctor_image'=>'required'
        ]);

        if($valid->passes()){
            $doctor = new Doctor;

            $file = $request->file('doctor_image');
            $file->move(base_path('public/doctor_images'), $file->getClientOriginalName());

            $doctor->doctor_name = $request['doctor_name'];
            $doctor->doctor_email = $request['doctor_email'];
            $doctor->doctor_gender = $request['doctor_gender'];
            $doctor->doctor_phone= $request['doctor_phone'];
            $doctor->doctor_address = $request['doctor_address'];
            $doctor->specialist_id = $request['specialist_type'];
            $doctor->doctor_image = $file->getClientOriginalName();

            $doctor->save();
            return redirect('/manageDoctors');
        } else{
            //dd($valid->errors());
            $specialist_types = SpecialistType::all();

            $doctors = DB::table('doctors')->paginate(4);
            $doctor_specialist = DB::table('specialist_type')->join('doctors', 'doctors.specialist_id', '=', 'specialist_type.id')->get();

            //return view('admin.manageDoctor', compact('specialist_types', 'doctors', 'doctor_specialist'));
            return view('admin.manageDoctor')->with(['errors'=>$valid->errors()])
                                                ->with(['doctors'=>$doctors])
                                                ->with(['specialist_types'=>$specialist_types])
                                                ->with(['doctor_specialist'=>$doctor_specialist]);
        }

    }

    //go to update page
    public function updateDoctorPage($id, Request $request){
        $doctor = Doctor::find($id);
        $specialist_types = SpecialistType::all();

        return view('admin.updateDoctors', compact('doctor', 'specialist_types'));
    }

    public function updateDoctor($id, Request $request){
        $doctor = Doctor::find($id);

        $valid = Validator::make($request->all(), [
            'doctor_name' => 'required',
            'doctor_email'=>'required',
            'doctor_gender'=>'required',
            'doctor_address' => 'required',
            'doctor_phone'=>'required',
            'specialist_type'=>'required|notIn:0',
            'doctor_image'=>'required'
        ]);
        if($valid->passes()){
            $file = $request->file('doctor_image');
            $file->move(base_path('public/doctor_images'), $file->getClientOriginalName());

            $doctor->doctor_name = $request['doctor_name'];
            $doctor->doctor_email = $request['doctor_email'];
            $doctor->doctor_gender = $request['doctor_gender'];
            $doctor->doctor_phone= $request['doctor_phone'];
            $doctor->doctor_address = $request['doctor_address'];
            $doctor->specialist_id = $request['specialist_type'];
            $doctor->doctor_image = $file->getClientOriginalName();

            $doctor->save();
            return redirect('/manageDoctors');
        } else{

            $specialist_types = SpecialistType::all();
            return view('admin.updateDoctors')->with(['errors'=>$valid->errors()])
                                                ->with(['specialist_types'=>$specialist_types])
                                                ->with(['doctor'=>$doctor]);
        }
    }

    public function deleteDoctor(Request $request){
        $doctor = Doctor::find($request->id);

        $hospital_detail = DB::table('hospital_detail')->where('doctor_id', '=', $doctor->id)->delete();
        $doctor->delete();

        return redirect('/manageDoctors');
    }
}
