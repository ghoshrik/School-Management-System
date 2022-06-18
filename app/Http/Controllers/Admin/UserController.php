<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Auth\LoginController;
use App\Models\StudentModel\StudentRegistration;

class UserController extends Controller
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
        $editData = new User();
        return view('admin.userMgmt.addUsers',compact('editData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'mobile'=>'required',
            'gender'=>'required',
            'address'=>'required',
            'usertype'=>'required'
        ]);
        $otp = rand(100000,999999);
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($otp);
        $data->mobile = $request->mobile;
        $data->gender = $request->gender;
        $data->address = $request->address;
        $data->otp = $otp;
        $data->usertype = $request->usertype;
        $data->save();
        return redirect()->route('admin.users.view');
    }
//Admin Store
    public function adminStore(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'mobile'=>'required',
            'gender'=>'required',
            'address'=>'required',
            'password'=>'required',
            'usertype'=>'required'
        ]);
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->mobile = $request->mobile;
        $data->gender = $request->gender;
        $data->address = $request->address;
        $data->usertype = $request->usertype;
        $data->save();
        return redirect()->route('login');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data['allData'] = User::all();
        return view('admin.userMgmt.showUsers',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editData = User::find($id);
        return view('admin.userMgmt.addUsers',compact('editData'));
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
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->gender = $request->gender;
        $data->address = $request->address;
        $data->usertype = $request->usertype;
        $data->save();
        return redirect()->route('admin.users.view');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return redirect()->route('admin.users.view');
    }
    public function changePassword(){
        return view('admin.userMgmt.changePassword');
    }
}
