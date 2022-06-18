<?php

namespace App\Http\Controllers\Admin\SetupMgmt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SetupModel\Fee;

class FeeController extends Controller
{
    public function create()
    {
        $editData = new Fee();
        return view('admin.setupMgmt.addFeeCat',compact('editData'));
    }
    public function store(Request $request)
    {
        $this -> validate($request,[
            'name'=>'required|unique:fees,name',
        ]);
        $data = new Fee();
        $data->name = $request->name;
        $data->save();
        return redirect()->route('setups.fee.catagory.view')->with('success','Data Inserted successfully');
    }
    public function show()
    {
        $data['allData'] = Fee::all();
        return view('admin.setupMgmt.viewFeeCat',$data);
    }
    public function edit($id)
    {
        $editData = Fee::find($id);
        return view('admin.setupMgmt.addFeeCat',compact('editData'));
    }
    public function update(Request $request, $id)
    {
        $data = Fee::find($id);
        $this -> validate($request,[
            'name'=>'required|unique:fees,name',
        ]);
        $data->name = $request->name;
        $data->save();
        return redirect()->route('setups.fee.catagory.view');
    }
    public function destroy($id)
    {
        //
    }
}
