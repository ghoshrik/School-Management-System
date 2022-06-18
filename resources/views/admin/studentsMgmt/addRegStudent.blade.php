@extends('admin.base')
@section('content')
<main id="main" class="main">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
              @if(!isset($editData))  
              Add Student
              @else
              Edit Student
              @endif
              <a href="{{route('students.registration.view')}}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"></i> List Students</a>
            </h5>
            <form class="row g-3" method="POST" action="{{(@$editData)?route('students.registration.update',$editData->reg_id):route('students.registration.store')}}" id="studentReg">
            @csrf
            <input type="hidden" name="id" value="{{@$editData->id}}">
                <div class="col-md-4">
                    <div class="form-floating">
                        <input name="student_name" type="text" value="{{@$editData['student']['student_name']}}" class="form-control" id="floatingStudentName" placeholder="Student's Name">
                        <label for="floatingStudentName">Student's Name <font style="color: red">*</font></label>
                        <font style="color: red">{{($errors->has('student_name'))?($errors->first('student_name')):''}}</font>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <select name="class_id" class="form-select" id="floatingSelect" aria-label="Class">
                            <option value="">Select Class</option>
                            @foreach($classes as $class)
                            <option value="{{$class->class_id}}" {{(@$editData->class_id==$class->class_id)?'selected':''}}>{{$class->class_name}}</option>
                            @endforeach
                        </select>
                            <label for="floatingSelect">Select Class <font style="color: red">*</font></label>
                        <font style="color: red">{{($errors->has('class_id'))?($errors->first('class_id')):''}}</font>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <select name="year_id" class="form-select" id="floatingSelect" aria-label="Year">
                            <option value="">Select Year</option>
                            @foreach($years as $year)
                            <option value="{{$year->year_id}}" {{(@$editData->year_id==$year->year_id)?'selected':''}}>{{$year->year}}</option>
                            @endforeach
                        </select>
                            <label for="floatingSelect">Year <font style="color: red">*</font></label>
                        <font style="color: red">{{($errors->has('year_id'))?($errors->first('year_id')):''}}</font>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <select name="gender" class="form-select" id="floatingSelect" aria-label="Gender">
                            <option value="">Gender</option>
                            <option value="Male" {{(@$editData['student']['gender']=="Male")?'selected':''}} >Male</option>
                            <option value="Female" {{(@$editData['student']['gender']=="Female")?'selected':''}}>Female</option>
                            <option value="Others" {{(@$editData['student']['gender']=="Others")?'selected':''}}>Others</option>
                        </select>
                            <label for="floatingSelect">Gender <font style="color: red">*</font></label>
                        <font style="color: red">{{($errors->has('gender'))?($errors->first('gender')):''}}</font>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input name="dob" type="date" value="{{@$editData['student']['dob']}}" class="form-control" id="floatingDOB" placeholder="Date Of Birth">
                        <label for="floatingDOB">Date Of Birth <font style="color: red">*</font></label>
                        <font style="color: red">{{($errors->has('dob'))?($errors->first('dob')):''}}</font>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input name="father_name" type="text" value="{{@$editData['student']['father_name']}}" class="form-control" id="floatingFatherName" placeholder="Father's Name">
                        <label for="floatingFatherName">Father's Name <font style="color: red">*</font></label>
                        <font style="color: red">{{($errors->has('father_name'))?($errors->first('father_name')):''}}</font>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input name="mother_name" type="text" value="{{@$editData['student']['mother_name']}}" class="form-control" id="floatingMotherName" placeholder="Mother's Name">
                        <label for="floatingMotherName">Mother's Name <font style="color: red">*</font></label>
                        <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input name="religion" type="text" value="{{@$editData['student']['religion']}}" class="form-control" id="floatingReligion" placeholder="Religion">
                        <label for="floatingReligion">Religion <font style="color: red">*</font></label>
                        <font style="color: red">{{($errors->has('religion'))?($errors->first('religion')):''}}</font>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <textarea name="address" class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;">{{@$editData['student']['address']}}</textarea>
                        <label for="floatingTextarea">Address <font style="color: red">*</font></label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input name="image" type="file" value="" class="form-control" id="image" placeholder="Image">
                        <label for="image">Image</label>
                        <font style="color: red">{{($errors->has('image'))?($errors->first('image')):''}}</font>
                    </div>
                </div>
                <div class="col-md-4">
                    <img id="showImage" src="{{url('/admin/upload/no_image.jpg')}}" alt="" style="width: 100px;height: 110px;border:1px solid #000;">
                </div>
                <div class="col-md-12">
                    <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary">
                      @if(!isset($editData))
                        Submit
                        @else
                        Update
                        @endif
                      </button>
                    </div>
                </div>
            </form><!-- End floating Labels Form -->
        </div>
    </div>
</main><!-- End #main -->
<script type="text/javascript">
  $(document).ready(function(){
    $('#image').change(function(e){
      var reader = new FileReader();
      reader.onload = function(e){
        $('#showImage').attr('src',e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    });
  });
</script>
<script>
  $(function () {
    $('#studentReg').validate({
      rules: {
        name: {
          required: true,
        },
        gender: {
          required: true,
        },
        dob: {
          required: true,
        },
        religion: {
          required: true,
        },
        father_name: {
          required: true,
        },
        mother_name: {
          required: true,
        },
        address: {
          required: true,
        },
        class_id: {
          required: true,
        },
        year_id: {
          required: true,
        },
      },
      messages: {
        name: {
          required: "Please enter a name ",
        },
        gender: {
          required: "Please enter a gender ",
        },
        dob: {
          required: "Please enter a dob ",
        },
        religion: {
          required: "Please enter a religion ",
        },
        father_name: {
          required: "Please enter a father_name ",
        },
        mother_name: {
          required: "Please enter a mother_name ",
        },
        address: {
          required: "Please enter a address",
        },
        class_id: {
          required: "Please enter a class_id",
        },
        year_id: {
          required: "Please enter a year_id",
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