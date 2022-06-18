@extends('admin.base')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Student Data</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item">Manage Students</li>
          <li class="breadcrumb-item active">Student Shift</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Student List</h5>
              <!-- Table with stripped rows -->
              <div class="card-body">
                <form class="row g-3"  method="GET" action="{{route('students.shift.class.year.wise')}}">
                  <div class="col-md-3">
                      <div class="form-floating">
                          <select name="class_id" class="form-select" id="floatingSelect" aria-label="Class">
                              <option value="">Select Class</option>
                              @foreach($classes as $class)
                              <option value="{{$class->class_id}}" {{(@$class_id==$class->class_id)?"selected":""}}>{{$class->class_name}}</option>
                              @endforeach
                          </select>
                              <label for="floatingSelect">Select Class <font style="color: red">*</font></label>
                          <font style="color: red">{{($errors->has('class_id'))?($errors->first('class_id')):''}}</font>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-floating">
                          <select name="year_id" class="form-select" id="floatingSelect" aria-label="Year">
                              <option value="">Select Year</option>
                              @foreach($years as $year)
                              <option value="{{$year->year_id}}" {{(@$year_id==$year->year_id)?'selected':''}}>{{$year->year}}</option>
                              @endforeach
                          </select>
                              <label for="floatingSelect">Year <font style="color: red">*</font></label>
                          <font style="color: red">{{($errors->has('year_id'))?($errors->first('year_id')):''}}</font>
                      </div>
                  </div>
                  <div class="col-md-2" style="padding-top: 10px;">
                    <input class="btn btn-success" type="submit" name="search" value="Search">
                  </div>
                </form>
              </div>
              <form action="{{route('students.shift.shiftClassStore')}}" method="post" id="shiftClass">
                @csrf
                
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Sl. No</th>
                    <th scope="col">Student ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Class</th>
                    <th scope="col">Roll</th>
                    <th scope="col">Year</th>
                    <th scope="col">Father's Name</th>
                    <th scope="col">Shift Class</th>
                    <th scope="col">Shift Year</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($allStudent as $key=> $student)
                  <tr>
                    <th scope="row">{{$key+1}}<input type="hidden" name="reg_id[]" value="{{$student->reg_id}}"></th>
                    <th scope="row">{{$student['student']['student_id']}}</th>
                    <th scope="row">{{$student['student']['student_name']}}</th>
                    <th scope="row">{{$student['class_name']['class_name']}}</th>
                    <th scope="row">{{$student->roll}}</th>
                    <th scope="row">{{$student['year']['year']}}</th>
                    <th scope="row">{{$student['student']['father_name']}}</th>
                    <td scope="row">
                        <select name="class_id[]" id="" class="form-select">
                            <option value="">Shift class</option>
                            @foreach($classes as $cls)
                            <option value="{{$cls->class_id}}">{{$cls->class_name}}</option>
                            @endforeach
                        </select>
                        <font style="color: red">{{($errors->has('class_id[]'))?($errors->first('class_id[]')):''}}</font>
                    </td>
                    <td scope="row">
                    <select name="year_id[]" id="" class="form-select">
                            <option value="">Shift Year</option>
                            @foreach($years as $year)
                            <option value="{{$year->year_id}}">{{$year->year}}</option>
                            @endforeach
                        </select>
                        <font style="color: red">{{($errors->has('year_id[]'))?($errors->first('year_id[]')):''}}</font>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
                <div class="col-md-12" style="padding-top: 10px;">
                    <input class="btn btn-success" type="submit" name="Submit" value="Shift">
                  </div>
              </form>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
</main><!-- End #main -->
<script>
  $(function () {
    $('#shiftClass').validate({
      rules: {
        "class_id[]": {
          required: true,
        },
        "year_id[]": {
          required: true,
        },
      },
      messages: {
        "class_id[]": {
          required: "Please enter a class_id",
        },
        "year_id[]": {
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
</script>@endsection