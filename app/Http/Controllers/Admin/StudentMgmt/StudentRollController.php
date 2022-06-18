<?php

namespace App\Http\Controllers\Admin\StudentMgmt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentModel\StudentRegistration;
use App\Models\StudentModel\AssignStudent;
use App\Models\SetupModel\ClassMaster;
use App\Models\SetupModel\Year;
use DB;

class StudentRollController extends Controller
{
    public function show(){
        $data['years'] = Year::orderBy('year_id','asc')->get();
        $data['classes'] = ClassMaster::all();
        return view('admin.studentsMgmt.rollGennerate',$data);
    }
    public function getStudent(Request $request)
    {
        $allData = AssignStudent::with(['student'])->where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();
        return response()->json($allData);
    }
    public function store(Request $request){
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        if($request->reg_id != null){
            for($i=0; $i<count($request->reg_id); $i++){
                //dd(count($request->reg_id));
                AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->where('reg_id',$request->reg_id[$i])->update(['roll'=>$request->roll[$i]]);
            }
        }else{
            return redirect()->back()->with('error','Sorry');
        }
        return redirect()->route('students.roll.view')->with('success','Roll Generated');
    }
}
