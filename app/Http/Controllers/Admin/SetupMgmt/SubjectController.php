<?php

namespace App\Http\Controllers\Admin\SetupMgmt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SetupModel\Year;
use App\Models\SetupModel\ClassMaster;
use App\Models\SetupModel\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $editData = new Subject();
        return view('admin.setupMgmt.addSubject',compact('editData'));
    }

    public function store(Request $request)
    {
        $this -> validate($request,[
            'name'=>'required|unique:subjects,name',
        ]);
        $data = new Subject();
        $data->name = $request->name;
        $data->save();
        return redirect()->route('setups.subject.view')->with('success','Data Inserted successfully');
    }

    public function show()
    {
        $data['allData'] = Subject::all();
        return view('admin.setupMgmt.viewSubject',$data);
    }

    public function edit($id)
    {
        $editData = Subject::find($id);
        return view('admin.setupMgmt.addSubject',compact('editData'));
    }

    public function update(Request $request, $id)
    {
        $data = Subject::find($id);
        $data->name = $request->name;
        $data->save();
        return redirect()->route('setups.subject.view');
    }

    public function destroy($id)
    {
        //
    }
}
