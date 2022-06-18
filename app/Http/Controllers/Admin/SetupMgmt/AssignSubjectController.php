<?php

namespace App\Http\Controllers\Admin\SetupMgmt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SetupModel\ClassMaster;
use App\Models\SetupModel\Subject;
use App\Models\SetupModel\AssignSubject;

class AssignSubjectController extends Controller
{
    public function create()
    {
        $data['allSubjects'] = Subject::all();
        $data['class_masters'] = ClassMaster::all();
        return view('admin.setupMgmt.addSubjectAssign',$data);
    }
    public function store(Request $request)
    {
        $countClass = count($request->subject_id);
        //dd($countClass);
        if($countClass != Null){
            for($i=0; $i <$countClass; $i++){
                $assign_subject = new AssignSubject();
                $assign_subject->class_id = $request->class_id;
                $assign_subject->subject_id = $request->subject_id[$i];
                $assign_subject->full_mark = $request->full_mark[$i];
                $assign_subject->pass_mark = $request->pass_mark[$i];
                $assign_subject->save();
            }
        }
        
        return redirect()->route('setups.assign.subject.view')->with('success','Data Inserted successfully');
    }
    public function show()
    {
        $data['allData'] = AssignSubject::select('class_id')->groupBy('class_id')->get();
        //$data['allData'] = AssignSubject::all();
        //dd($data);
        return view('admin.setupMgmt.viewSubjectAssign',$data);
    }
    public function edit($class_id)
    {
        $data['editData'] = AssignSubject::where('class_id',$class_id)->get();
        $data['class_masters'] = ClassMaster::all();
        $data['subject_name'] = Subject::all();
        return view('admin.setupMgmt.editSubjectAssign',$data);
    }
    public function update(Request $request, $class_id)
    {
        if($request->subject_id==Null){
            return redirect()->back()->with('error','Sorry');
        }
        else{
            AssignSubject::where('class_id',$class_id)->delete();
            $countSubject = count($request->subject_id);
            for($i=0; $i<$countSubject; $i++){
                $assign_subject = new AssignSubject();
                $assign_subject->class_id = $request->class_id;
                $assign_subject->subject_id = $request->subject_id[$i];
                $assign_subject->full_mark = $request->full_mark[$i];
                $assign_subject->pass_mark = $request->pass_mark[$i];
                $assign_subject->save();
            }
        }
        return redirect()->route('setups.assign.subject.view');
    }
    public function destroy($id)
    {
        //
    }
    public function details($class_id){
        $data['subDetails'] = AssignSubject::where('class_id',$class_id)->get();
        return view('admin.setupMgmt.detailsSubjectAssign',$data);
    }
}
