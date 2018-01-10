<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Insurance;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class InsuranceController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $insurances = Insurance::paginate(3);

        return view('admin.manageInsurance', compact('insurances'));
    }

    public function addInsurance(Request $request){
        $valid = Validator::make($request->all(), [
            'insurance_name'=>'required|min:5|unique:insurances,insurance_name',
            'insurance_address'=>'required',
            'insurance_phone'=>'required',
            'insurance_image'=>'required|image',
            'insurance_email'=>'required'
        ]);

        if($valid->passes()){
            $file = $request->file('insurance_image');
            $file->move(base_path('public/insurance_images'), $file->getClientOriginalName());

            $insurance = new Insurance;
            $insurance->insurance_name = $request['insurance_name'];
            $insurance->insurance_address = $request['insurance_address'];
            $insurance->insurance_phone = $request['insurance_phone'];
            $insurance->insurance_website = $request['insurance_website'];
            $insurance->insurance_email = $request['insurance_email'];
            $insurance->insurance_image = $file->getClientOriginalName();
            $insurance->save();

            return redirect('/manageInsurance');
        } else{
            $insurances = Insurance::paginate(3);
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

            return view('admin.manageInsurance')->with([
                'errors' => $valid->errors()
            ])->with(['insurances' => $insurances]);
        }
    }

    //go to update page
    public function updateInsurancePage(Request $request){
        $insurance = Insurance::find($request->id);

        return view('admin.updateInsurances', compact('insurance'));
    }

    public function updateInsurance(Request $request){
        $valid = Validator::make($request->all(), [
            'insurance_name'=>'required|min:5|unique:insurances,insurance_name',
            'insurance_address'=>'required',
            'insurance_phone'=>'required',
            'insurance_image'=>'required|image',
            'insurance_website'=>'required',
            'insurance_email'=>'required'
        ]);

        $insurance = Insurance::find($request->id);

        if($valid->passes()){
            $file = $request->file('insurance_image');
            $file->move(base_path('public/insurance_images'), $file->getClientOriginalName());
            $insurance->insurance_name = $request['insurance_name'];
            $insurance->insurance_address = $request['insurance_address'];
            $insurance->insurance_phone = $request['insurance_phone'];
            $insurance->insurance_website = $request['insurance_website'];
            $insurance->insurance_email = $request['insurance_email'];
            $insurance->insurance_image = $file->getClientOriginalName();

            $insurance->save();

            return redirect('/manageInsurance');
        } else{
            return view('admin.updateInsurances')->with([
                'errors' => $valid->errors()
            ])->with(['insurance' => $insurance]);
        }
    }

    public function deleteInsurance(Request $request){
        $insurance = Insurance::find($request->id);

        $insurance_detail = DB::table('hospital_insurance_details')
                            ->where('hospital_insurance_details.insurance_id', '=', $insurance->id)
                            ->delete();

        $insurance->delete();

        return redirect('/manageInsurance');
    }
}
