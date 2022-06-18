<?php

namespace App\Http\Controllers\Admin\SetupMgmt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SetupModel\ClassMaster;
use App\Models\SetupModel\Fee;
use App\Models\SetupModel\FeeAmmount;

class FeeAmmountController extends Controller
{
    public function create()
    {
        $data['fee_catagories'] = Fee::all();
        $data['class_masters'] = ClassMaster::all();
        return view('admin.setupMgmt.addFeeAmmt',$data);
    }
    public function store(Request $request)
    {
        $countClass = count($request->class_id);
        if($countClass != Null){
            for($i=0; $i <$countClass; $i++){
                $fee_ammount = new FeeAmmount();
                $fee_ammount->fee_cat_id = $request->fee_cat_id;
                $fee_ammount->class_id = $request->class_id[$i];
                $fee_ammount->ammount = $request->ammount[$i];
                $fee_ammount->save();
            }
        }
        
        return redirect()->route('setups.fee.ammount.view')->with('success','Data Inserted successfully');
    }
    public function show()
    {
        $data['allData'] = FeeAmmount::select('fee_cat_id')->groupBy('fee_cat_id')->get();
        //$data['allData'] = FeeAmmount::all();
        //dd($data);
        return view('admin.setupMgmt.viewFeeAmmt',$data);
    }
    public function edit($fee_cat_id)
    {
        $data['editData'] = FeeAmmount::where('fee_cat_id',$fee_cat_id)->get();
        $data['fee_catagories'] = Fee::all();
        $data['class_masters'] = ClassMaster::all();
        return view('admin.setupMgmt.editFeeAmmt',$data);
    }
    public function update(Request $request, $fee_cat_id)
    {
        if($request->class_id==Null){
            return redirect()->back()->with('error','Sorry');
        }
        else{
            FeeAmmount::where('fee_cat_id',$fee_cat_id)->delete();
            $countClass = count($request->class_id);
            for($i=0; $i<$countClass; $i++){
                $fee_ammount= new FeeAmmount();
                $fee_ammount->fee_cat_id = $request->fee_cat_id;
                $fee_ammount->class_id = $request->class_id[$i];
                $fee_ammount->ammount = $request->ammount[$i];
                $fee_ammount->save();
            }
        }
        return redirect()->route('setups.fee.ammount.view');
    }
    public function destroy($id)
    {
        //
    }
    public function details($fee_cat_id){
        $data['feeDetails'] = FeeAmmount::where('fee_cat_id',$fee_cat_id)->get();
        return view('admin.setupMgmt.detailsFeeAmmt',$data);
    }
}
