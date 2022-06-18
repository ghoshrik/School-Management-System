@extends('admin.base')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Student Data</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item">Manage Students</li>
          <li class="breadcrumb-item active">Student Registration</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Student List</h5>
              <a href="{{route('students.registration.add')}}" class="btn btn-success float-right btn-sm"><i class="fa fa-plus-circle"></i>Add Student</a>
              <!-- Table with stripped rows -->
              <div class="card-body">
                <form class="row g-3"  method="GET" action="{{route('students.class.year.wise')}}">
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
              @if(!@$search)
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Sl. No</th>
                    <th scope="col">Student ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Class</th>
                    <th scope="col">Roll</th>
                    <th scope="col">Year</th>
                    <th scope="col">Gender</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Religion</th>
                    <th scope="col">Father's Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($allStudent as $key=> $student)
                  <tr>
                    <th scope="row">{{$key+1}}</th>
                    <th scope="row">{{$student['student']['student_id']}}</th>
                    <th scope="row">{{$student['student']['student_name']}}</th>
                    <th scope="row">{{$student['class_name']['class_name']}}</th>
                    <th scope="row">{{$student->roll}}</th>
                    <th scope="row">{{$student['year']['year']}}</th>
                    <th scope="row">{{$student['student']['gender']}}</th>
                    <th scope="row">{{$student['student']['dob']}}</th>
                    <th scope="row">{{$student['student']['religion']}}</th>
                    <th scope="row">{{$student['student']['father_name']}}</th>
                    <td>
                        <a title="Edit" class="btn btn-sm btn-primary" href="{{route('students.registration.edit',[$student->reg_id,$student->id])}}"><i class="fa fa-edit"></i></a>
   <!--                     <a title="Shift" class="btn btn-sm btn-success" href="{{route('students.registration.shift',[$student->reg_id,$student->id])}}"><i class="fa fa-check"></i></a>    -->
                        <a target="_blank" title="Details" class="btn btn-sm btn-info" href="{{route('students.registration.details',[$student->reg_id,$student->id])}}"><i class="fa fa-eye"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              @else
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Sl. No</th>
                    <th scope="col">Student ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Class</th>
                    <th scope="col">Roll</th>
                    <th scope="col">Year</th>
                    <th scope="col">Gender</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Religion</th>
                    <th scope="col">Father's Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($allStudent as $key=> $student)
                  <tr>
                    <th scope="row">{{$key+1}}</th>
                    <th scope="row">{{$student['student']['student_id']}}</th>
                    <th scope="row">{{$student['student']['student_name']}}</th>
                    <th scope="row">{{$student['class_name']['class_name']}}</th>
                    <th scope="row">{{$student->roll}}</th>
                    <th scope="row">{{$student['year']['year']}}</th>
                    <th scope="row">{{$student['student']['gender']}}</th>
                    <th scope="row">{{$student['student']['dob']}}</th>
                    <th scope="row">{{$student['student']['religion']}}</th>
                    <th scope="row">{{$student['student']['father_name']}}</th>
                    <td>
                        <a title="Edit" class="btn btn-sm btn-primary" href="{{route('students.registration.edit',[$student->reg_id,$student->id])}}"><i class="fa fa-edit"></i></a>
             <!--           <a title="Shift" class="btn btn-sm btn-success" href="{{route('students.registration.shift',[$student->reg_id,$student->id])}}"><i class="fa fa-check"></i></a>   -->
                        <a target="_blank" title="Details" class="btn btn-sm btn-info" href="{{route('students.registration.details',[$student->reg_id,$student->id])}}"><i class="fa fa-eye"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              @endif
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
</main><!-- End #main -->
@endsection