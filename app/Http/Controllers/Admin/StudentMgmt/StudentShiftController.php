<?php

namespace App\Http\Controllers\Admin\StudentMgmt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentModel\StudentRegistration;
use App\Models\StudentModel\AssignStudent;
use App\Models\SetupModel\ClassMaster;
use App\Models\SetupModel\Year;
use DB;

class StudentShiftController extends Controller
{
    public function show(){
        $allData['years'] = Year::orderBy('year_id','asc')->get();
        $allData['year_id'] = Year::orderBy('year_id','desc')->first()->year_id;
        $allData['classes'] = ClassMaster::all();
        $allData['class_id'] = ClassMaster::orderBy('class_id','asc')->first()->class_id;
        $allData['regStudents'] = StudentRegistration::all();
        $allData['allStudent'] = AssignStudent::where('year_id',$allData['year_id'])->where('class_id',$allData['class_id'])->get();
        return view('admin.studentsMgmt.shiftStudent',$allData);
    }
    public function getStudent(Request $request)
    {
        $allData['years'] = Year::orderBy('year_id','asc')->get();
        $allData['classes'] = ClassMaster::all();
        $allData['year_id'] = Year::where('year_id',$request->year_id)->get();
        $allData['class_id'] = ClassMaster::where('class_id',$request->class_id)->get();
        $allData = AssignStudent::with(['student'])->where('year_id',$allData['year_id'])->where('class_id',$allData['class_id'])->get();
        //return response()->json($allData);
        view('admin.studentsMgmt.shiftStudent',$allData);
    }
    public function store(Request $request){
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        if($request->reg_id != null){
            for($i=0; $i<count($request->reg_id); $i++){
                AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->where('reg_id',$request->reg_id[$i])->update(['roll'=>$request->roll[$i]]);
            }
        }else{
            return redirect()->back()->with('error','Sorry');
        }
        return redirect()->route('students.shift.view')->with('success','Shifted');
    }
}
