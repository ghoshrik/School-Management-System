<?php

namespace App\Http\Controllers\Admin\SetupMgmt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SetupModel\Year;
use DB;
use Illuminate\Database\Console\DbCommand;
use Illuminate\Support\Facades\DB as FacadesDB;

class YearController extends Controller
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
        $editData = new Year();
        return view('admin.setupMgmt.addYear',compact('editData'));
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
            'year'=>'required|unique:years,year',
        ]);
        $data = new Year();
        $data->year = $request->year;
        $data->save();
        return redirect()->route('setups.year.view')->with('success','Data Inserted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data['allData'] = Year::all();
        return view('admin.setupMgmt.viewYear',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editData = Year::where(['year_id'=>$id])->first();
        return view('admin.setupMgmt.addYear',compact('editData'));
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
        $data = new Year();
        $data = Year::where('year_id', $id)->update(['year'=>$request->year]);
        return redirect()->route('setups.year.view');
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
