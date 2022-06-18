@extends('admin.base')
@section('content')
<main id="main" class="main">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Change Password</h5>
            <form class="row g-3" method="POST" action="" id="changePass">
            @csrf
            <input type="hidden" name="id" value="">
                <div class="col-md-4">
                    <div class="form-floating">
                        <input name="old_pass" type="text" value="" class="form-control" id="floatingOldpass" placeholder="Enter Old Password">
                        <label for="floatingOldpass">Enter Old Password<font style="color: red">*</font></label>
                        <font style="color: red">{{($errors->has('old_pass'))?($errors->first('old_pass')):''}}</font>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input name="new_pass" type="text" value="" class="form-control" id="floatingpass" placeholder="Enter New Password">
                        <label for="floatingpass">Enter New Password <font style="color: red">*</font></label>
                        <font style="color: red">{{($errors->has('new_pass'))?($errors->first('new_pass')):''}}</font>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input name="conf_new_pass" type="text" value="" class="form-control" id="floatingConf" placeholder="Confirm Password">
                        <label for="floatingConf">Confirm Password <font style="color: red">*</font></label>
                        <font style="color: red">{{($errors->has('conf_new_pass'))?($errors->first('conf_new_pass')):''}}</font>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary">Change Password</button>
                    </div>
                </div>
            </form><!-- End floating Labels Form -->
        </div>
    </div>
</main><!-- End #main -->
@endsection