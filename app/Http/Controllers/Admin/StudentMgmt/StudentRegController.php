<?php

namespace App\Http\Controllers\Admin\StudentMgmt;

use App\Http\Controllers\Controller;
use App\Models\StudentModel\StudentRegistration;
use App\Models\StudentModel\AssignStudent;
use App\Models\SetupModel\ClassMaster;
use App\Models\SetupModel\Year;
use App\Models\StudentModel\MinorityDiscount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use niklasravnsborg\LaravelPdf\Facades\Pdf as FacadesPdf;
use PhpParser\Builder\Class_;
use Barryvdh\DomPDF\Facade\Pdf;

class StudentRegController extends Controller
{
    public function show(){
        $data['years'] = Year::orderBy('year_id','asc')->get();
        $data['year_id'] = Year::orderBy('year_id','desc')->first()->year_id;
        $data['classes'] = ClassMaster::all();
        $data['class_id'] = ClassMaster::orderBy('class_id','asc')->first()->class_id;
        $data['regStudents'] = StudentRegistration::all();
        $data['allStudent'] = AssignStudent::where('year_id',$data['year_id'])->where('class_id',$data['class_id'])->get();
        return view('admin.studentsMgmt.viewRegStudent',$data);
    }
    public function classYearWise(Request $request){
        $data['years'] = Year::orderBy('year_id','asc')->get();
        $data['classes'] = ClassMaster::all();
        $data['year_id'] = $request->year_id;
        $data['class_id'] = $request->class_id;
        $data['allStudent'] = AssignStudent::where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();
        //dd($data);
        return view('admin.studentsMgmt.viewRegStudent',$data);
    }
    public function create(){
        $data['years'] = Year::all();
        $data['classes'] = ClassMaster::all();
        return view('admin.studentsMgmt.addRegStudent',$data);
    }
    public function store(Request $request){
        DB::transaction(function() use($request){
            $checkYear = DB::table('years')->where('year_id',$request->year_id)->first();
            $checkYear = $checkYear->year;
            //dd($checkYear);
            $student = StudentRegistration::all()->groupBy('id','DESC')->first();
            if($student == null){
                $firstReg = 0;
                $studentId = $firstReg+1;
                if($studentId<10){
                    $id_no = '000'.$studentId;
                }elseif($studentId<100){
                    $id_no = '00'.$studentId;
                }elseif($studentId<1000){
                    $id_no = '0'.$studentId;
                }
            }
            else{
                $student = StudentRegistration::orderBy('id','desc')->first();
                //$student = DB::table('student_registrations')->groupBy('id','desc')->first();
                $student = $student->id;
                //dd($student);
                $studentId = $student+1;
                if($studentId<10){
                    $id_no = '000'.$studentId;
                }elseif($studentId<100){
                    $id_no = '00'.$studentId;
                }elseif($studentId<1000){
                    $id_no = '0'.$studentId;
                }
            }
            $final_id = $checkYear.$id_no;
            $reg = new StudentRegistration();
            $reg->student_id =$final_id;
            $reg->student_name = $request->student_name;
            $reg->gender = $request->gender;
            $reg->dob = date('Y-m-d',strtotime($request->dob));
            $reg->religion = $request->religion;
            $reg->father_name = $request->father_name;
            $reg->mother_name = $request->mother_name;
            $reg->address = $request->address;
            $reg->doR = date('Y-m-d');
            if($request->file('image')){
                $file = $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('/admin/upload'),$filename);
                $reg['image']= $filename;
            }
            $reg->save();
            $assign_student = new AssignStudent();
            $assign_student->reg_id = $reg->id;
            $assign_student->class_id = $request->class_id;
            $assign_student->year_id = $request->year_id;
            $assign_student->save();
        });
        return redirect()->route('students.registration.view');
    }
    public function edit($reg_id,$id){
        $data['years'] = Year::all();
        $data['classes'] = ClassMaster::all();
        $data['editData'] = AssignStudent::with(['student'])->where('id',$id)->first();
        //dd($data['editData']->toArray());
        return view('admin.studentsMgmt.addRegStudent',$data);
    }
    public function update(Request $request,$reg_id){
        //dd($reg_id);
        DB::transaction(function() use($request,$reg_id){
            $reg = StudentRegistration::where('id',$reg_id)->first();
            $reg->student_name = $request->student_name;
            $reg->gender = $request->gender;
            $reg->dob = date('Y-m-d',strtotime($request->dob));
            $reg->religion = $request->religion;
            $reg->father_name = $request->father_name;
            $reg->mother_name = $request->mother_name;
            $reg->address = $request->address;
            $reg->doR = date('Y-m-d');
            $reg->save();
            $assign_student = AssignStudent::where('id',$request->id)->where('reg_id',$reg_id)->first();
            $assign_student->class_id = $request->class_id;
            $assign_student->year_id = $request->year_id;
            $assign_student->save();
        });
        return redirect()->route('students.registration.view');
    }
    public function stdShift($reg_id,$id){
        $data['years'] = Year::all();
        $data['classes'] = ClassMaster::all();
        $data['editData'] = AssignStudent::with(['student'])->where('id',$id)->first();
        //dd($data['editData']->toArray());
        return view('admin.studentsMgmt.shiftRegStudent',$data);
    }
    public function updateStdShift(Request $request,$reg_id){
        DB::transaction(function() use($request,$reg_id){
            $assign_student = new AssignStudent();
            $assign_student->reg_id = $reg_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->year_id = $request->year_id;
            $assign_student->save();
        });
        return redirect()->route('students.registration.view');
    }

    public function details($reg_id,$id){
        //dd('ok');
        $data['details'] = AssignStudent::with(['student'])->where('id',$id)->first();
        $pdf = PDF::loadView('admin.studentsMgmt.studentDetails-pdf', $data);
        return $pdf->stream('document.pdf');
    }

    public function shiftclassYearWise(Request $request){
        $data['years'] = Year::orderBy('year_id','asc')->get();
        $data['classes'] = ClassMaster::all();
        $data['year_id'] = $request->year_id;
        $data['class_id'] = $request->class_id;
        $data['allStudent'] = AssignStudent::where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();
        //dd($data);
        return view('admin.studentsMgmt.shiftStudent',$data);
    }
    public function shiftClassStore(Request $request){
        //dd($request->reg_id)->toArray();
            if($request->reg_id != null){
               for($i=0; $i<count($request->reg_id); $i++){
                //dd(count($request->reg_id));
                $shift_student = new AssignStudent();
                $shift_student->reg_id = $request->reg_id[$i];
                $shift_student->class_id = $request->class_id[$i];
                $shift_student->year_id = $request->year_id[$i];
                $shift_student->save();
                //dd($shift_student);
               } 
            }
        return redirect()->route('students.shift.class.year.wise')->with('success','Roll Generated');
    }
}
