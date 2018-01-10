<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use App\SpecialistType;

class SpecialistTypeController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $specialist_types = SpecialistType::all();
        return view('admin.manageSpecialistType', compact('specialist_types'));
    }

    public function addNewType(Request $request){
        $valid = Validator::make($request->all(), [
            'specialist_name' => 'required|unique:specialist_type,specialist_name'
        ]);
        if($valid->passes()){
            $specialist_type = new SpecialistType;
            $specialist_type->specialist_name = $request['specialist_name'];
            $specialist_type->save();
            return redirect('/manageSpecialistType');
        } else{
            $specialist_type = SpecialistType::all();
            return view('admin.manageSpecialistType')->with([
                'errors' => $valid->errors()
            ])->with(['specialist_types' => $specialist_type]);
        }
    }

    public function deleteSpecialistType(Request $request){
        $specialist_type = SpecialistType::find($request->id);

        $doctors = DB::table('doctors')->where('doctors.specialist_id', '=', $specialist_type->id)->update(['doctors.specialist_id' => null]);
        $specialist_type->delete();

        return redirect('/manageSpecialistType');
    }
}
