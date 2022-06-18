@extends('admin.base')
@section('content')
<main id="main" class="main">
        <div class="card">
            <div class="card-body">  
              <h5 class="card-title">
              @if(!isset($editData->id))  
              Add User
              @else
              Update User
              @endif
              <a href="{{route('admin.users.view')}}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"></i> List Users</a>
              </h5>
                <!-- Floating Labels Form -->
                <form class="row g-4" method="POST" action="{{(@$editData->id)?route('admin.users.update',$editData->id):route('admin.users.store')}}" id="addUsers">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input name="name" type="text" class="form-control" id="floatingName" placeholder="Full Name" value="{{$editData->name}}">
                            <label for="floatingName">Full Name</label>
                            <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input name="email" type="email" class="form-control" id="floatingEmail" placeholder="Email" value="{{$editData->email}}">
                            <label for="floatingEmail">Email</label>
                            <font style="color: red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input name="mobile" type="number" class="form-control" id="floatingNumber" placeholder="Mobile No" value="{{$editData->mobile}}">
                            <label for="floatingNumber">Mobile No</label>
                            <font style="color: red">{{($errors->has('mobile'))?($errors->first('mobile')):''}}</font>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <select name="gender" class="form-select" id="floatingSelect" aria-label="Gender">
                            <option value="">..Gender..</option>
                            <option value="Male" {{($editData->gender=="Male")?"selected":""}}>Male</option>
                            <option value="Female" {{($editData->gender=="Female")?"selected":""}}>Female</option>
                            <option value="Others" {{($editData->gender=="Others")?"selected":""}}>Others</option>
                            </select>
                            <label for="floatingSelect">Gender</label>
                        </div>
                    </div>    
                    <div class="col-md-12">
                        <div class="form-floating">
                            <textarea name="address" class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;">{{$editData->address}}</textarea>
                            <label for="floatingTextarea">Address</label>
                        </div>
                    </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <select name="usertype" class="form-select" id="floatingSelect" aria-label="Role">
                            <option value="">..Select Role..</option>
                            <option value="Admin" {{($editData->usertype=="Admin")?"selected":""}}>Admin</option>
                            <option value="User" {{($editData->usertype=="User")?"selected":""}}>User</option>
                        </select>
                        <label for="floatingSelect">Role</label>
                    </div>
                </div>
                    <div class="text-center">
                        <button type="submit" value="submit" class="btn btn-primary">
                        @if(isset($editData))
                        Submit
                        @else
                        Update
                        @endif
                        </button>
                    </div>
                </form><!-- End floating Labels Form -->

            </div>
        </div>
</main><!-- End #main -->
<script>
  $(function () {
    $('#addUsers').validate({
      rules: {
        name: {
          required: true,
        },
        email: {
          required: true,
          email: true,
        },
        mobile: {
          required: true,
        },
        gender: {
          required: true,
        },
        address: {
          required: true,
        },
        usertype: {
          required: true,
        },
      },
      messages: {
        name: {
          required: "Please enter a name",
          name: "Please enter a <em>valid</em> name"
        },
        email: {
          required: "Please enter a email address",
          email: "Please enter a <em>valid</em> email address"
        },
        gender: {
          required: "Please enter a gender",
          gender: "Please enter a <em>valid</em> gender"
        },
        usertype: {
          required: "Please enter a ser Type",
          usertype: "Please enter a <em>valid</em> name"
        },
        address: {
          required: "Please enter address",
        },
        mobile: {
          required: "Please enter mobile no",
        },
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
</script>

@endsection