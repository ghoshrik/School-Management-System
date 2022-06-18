<?php

namespace App\Http\Controllers\Admin\SetupMgmt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SetupModel\ClassMaster;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.setupMgmt.addClasses');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request,[
            'class_name'=>'required|unique:class_masters,class_name',
            'class_symbol'=>'required|unique:class_masters,class_symbol'
        ]);
        $data = new ClassMaster();
        $data->class_name = $request->class_name;
        $data->class_symbol = $request->class_symbol;
        $data->save();
        return redirect()->route('setups.class.view')->with('success','Data Inserted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $class['allClasses'] = ClassMaster::all();
        return view('admin.setupMgmt.viewClasses',$class);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
